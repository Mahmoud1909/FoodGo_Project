const admin = require('firebase-admin');
const fs = require('fs');
const path = require('path');

// قراءة ملف credentials.json
const credentialsPath = path.join(__dirname, 'credentials.json');
const collectionsPath = path.join(__dirname, 'jsons', 'collections.json');

// التحقق من وجود ملف credentials
if (!fs.existsSync(credentialsPath)) {
  console.error('❌ ملف credentials.json غير موجود!');
  console.log('📝 يرجى ملء بيانات Firebase Admin SDK في ملف credentials.json');
  process.exit(1);
}

const credentials = JSON.parse(fs.readFileSync(credentialsPath, 'utf8'));

// التحقق من أن بيانات credentials مملوءة
if (!credentials.project_id || !credentials.private_key) {
  console.error('❌ ملف credentials.json فارغ أو غير مكتمل!');
  console.log('📝 يرجى إضافة بيانات Firebase Admin SDK:');
  console.log('   - project_id');
  console.log('   - private_key');
  console.log('   - client_email');
  process.exit(1);
}

// تهيئة Firebase Admin
try {
  admin.initializeApp({
    credential: admin.credential.cert(credentials)
  });
  console.log('✅ تم الاتصال بـ Firebase بنجاح');
} catch (error) {
  console.error('❌ خطأ في الاتصال بـ Firebase:', error.message);
  process.exit(1);
}

const db = admin.firestore();

// دالة لتحويل البيانات الخاصة (timestamps, etc.)
function convertSpecialTypes(obj) {
  if (obj === null || obj === undefined) {
    return null;
  }
  if (typeof obj !== 'object') {
    return obj;
  }

  // التحقق من timestamp
  if (obj.__datatype__ === 'timestamp' && obj.value) {
    const seconds = obj.value._seconds || obj.value.seconds || 0;
    const nanoseconds = obj.value._nanoseconds || obj.value.nanoseconds || 0;
    return admin.firestore.Timestamp.fromMillis(seconds * 1000 + nanoseconds / 1000000);
  }

  // التحقق من geopoint
  if (obj.__datatype__ === 'geopoint' && obj.value) {
    return new admin.firestore.GeoPoint(
      obj.value._latitude || obj.value.latitude,
      obj.value._longitude || obj.value.longitude
    );
  }

  // التحقق من reference
  if (obj.__datatype__ === 'reference' && obj.value) {
    return db.doc(obj.value);
  }

  // إذا كان array
  if (Array.isArray(obj)) {
    return obj.map(item => convertSpecialTypes(item));
  }

  // إذا كان object عادي
  const result = {};
  for (const key in obj) {
    if (key === '__collections__') {
      // نتخطى __collections__ هنا، سنتعامل معها بشكل منفصل
      continue;
    }
    result[key] = convertSpecialTypes(obj[key]);
  }
  return result;
}

// دالة لاستيراد collection
async function importCollection(collectionName, collectionData, batchSize = 500) {
  console.log(`\n📦 جاري استيراد collection: ${collectionName}`);
  
  const documents = Object.keys(collectionData);
  const totalDocs = documents.length;
  let imported = 0;
  let errors = 0;

  // تقسيم المستندات إلى batches
  for (let i = 0; i < documents.length; i += batchSize) {
    const batch = db.batch();
    const batchDocs = documents.slice(i, i + batchSize);
    let batchCount = 0;

    for (const docId of batchDocs) {
      try {
        const docData = collectionData[docId];
        
        // تحويل البيانات الخاصة
        const convertedData = convertSpecialTypes(docData);
        
        // إزالة __collections__ من البيانات الرئيسية
        if (convertedData && convertedData.__collections__) {
          delete convertedData.__collections__;
        }

        const docRef = db.collection(collectionName).doc(docId);
        batch.set(docRef, convertedData, { merge: true });
        batchCount++;

        // استيراد subcollections إذا وجدت
        if (docData.__collections__) {
          for (const subCollectionName in docData.__collections__) {
            const subCollectionData = docData.__collections__[subCollectionName];
            for (const subDocId in subCollectionData) {
              const subDocData = subCollectionData[subDocId];
              const convertedSubData = convertSpecialTypes(subDocData);
              
              if (convertedSubData && convertedSubData.__collections__) {
                delete convertedSubData.__collections__;
              }

              const subDocRef = docRef.collection(subCollectionName).doc(subDocId);
              batch.set(subDocRef, convertedSubData, { merge: true });
              batchCount++;
            }
          }
        }
      } catch (error) {
        console.error(`  ⚠️  خطأ في المستند ${docId}:`, error.message);
        errors++;
      }
    }

    // تنفيذ batch
    if (batchCount > 0) {
      try {
        await batch.commit();
        imported += batchDocs.length;
        const progress = ((imported / totalDocs) * 100).toFixed(1);
        console.log(`  📊 التقدم: ${imported}/${totalDocs} (${progress}%)`);
      } catch (error) {
        console.error(`  ❌ خطأ في batch:`, error.message);
        errors += batchDocs.length;
      }
    }
  }

  console.log(`✅ تم استيراد ${imported} مستند من ${collectionName}`);
  if (errors > 0) {
    console.log(`⚠️  ${errors} أخطاء`);
  }
}

// الدالة الرئيسية
async function main() {
  try {
    console.log('🚀 بدء عملية الاستيراد...\n');

    // قراءة ملف collections.json
    if (!fs.existsSync(collectionsPath)) {
      console.error('❌ ملف collections.json غير موجود!');
      console.log(`📁 المسار المتوقع: ${collectionsPath}`);
      process.exit(1);
    }

    const collectionsData = JSON.parse(fs.readFileSync(collectionsPath, 'utf8'));

    if (!collectionsData.__collections__) {
      console.error('❌ تنسيق الملف غير صحيح! يجب أن يحتوي على __collections__');
      process.exit(1);
    }

    const collections = collectionsData.__collections__;
    const collectionNames = Object.keys(collections);

    console.log(`📋 تم العثور على ${collectionNames.length} collection:`);
    collectionNames.forEach(name => {
      const docCount = Object.keys(collections[name]).length;
      console.log(`   - ${name}: ${docCount} مستند`);
    });

    // استيراد كل collection
    for (const collectionName of collectionNames) {
      await importCollection(collectionName, collections[collectionName]);
    }

    console.log('\n🎉 تم الانتهاء من الاستيراد بنجاح!');
    process.exit(0);
  } catch (error) {
    console.error('\n❌ خطأ عام:', error);
    process.exit(1);
  }
}

// تشغيل البرنامج
main();

