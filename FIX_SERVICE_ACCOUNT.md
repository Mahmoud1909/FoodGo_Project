# 🔧 حل مشكلة UNAUTHENTICATED في استيراد Collections

## ❌ المشكلة
```
16 UNAUTHENTICATED: Request had invalid authentication credentials
```

## ✅ الحل

### الخطوة 1: التحقق من Service Account في Firebase Console

1. اذهب إلى [Firebase Console](https://console.firebase.google.com/)
2. اختر المشروع: **foodgo-e1252**
3. اذهب إلى **Project Settings** (⚙️) → **Service Accounts**
4. تأكد من وجود Service Account: `firebase-adminsdk-fbsvc@foodgo-e1252.iam.gserviceaccount.com`

### الخطوة 2: إعطاء صلاحيات Firestore لـ Service Account

#### من Google Cloud Console:

1. اذهب إلى [Google Cloud Console](https://console.cloud.google.com/)
2. اختر المشروع: **foodgo-e1252**
3. اذهب إلى **IAM & Admin** → **IAM**
4. ابحث عن: `firebase-adminsdk-fbsvc@foodgo-e1252.iam.gserviceaccount.com`
5. اضغط على **Edit** (✏️)
6. أضف هذه الأدوار (Roles):
   - ✅ **Firebase Admin SDK Administrator Service Agent**
   - ✅ **Cloud Datastore User** (أو **Cloud Firestore User**)
   - ✅ **Service Account User**

#### أو من Firebase Console:

1. اذهب إلى **Firebase Console** → **Project Settings** → **Service Accounts**
2. تأكد من أن Service Account لديه صلاحيات **Firebase Admin SDK**

### الخطوة 3: إنشاء Service Account جديد (إذا لزم الأمر)

إذا لم يكن Service Account موجود أو لا يعمل:

1. اذهب إلى [Google Cloud Console](https://console.cloud.google.com/)
2. اختر المشروع: **foodgo-e1252**
3. اذهب إلى **IAM & Admin** → **Service Accounts**
4. اضغط **Create Service Account**
5. املأ البيانات:
   - **Service account name**: `firebase-admin`
   - **Service account ID**: `firebase-admin`
6. اضغط **Create and Continue**
7. أضف الأدوار:
   - **Firebase Admin SDK Administrator Service Agent**
   - **Cloud Datastore User**
8. اضغط **Continue** ثم **Done**
9. اضغط على Service Account الجديد
10. اذهب إلى **Keys** → **Add Key** → **Create new key**
11. اختر **JSON** ثم **Create**
12. سيتم تحميل ملف JSON جديد
13. انسخ محتوى الملف إلى `credentials.json`

### الخطوة 4: التحقق من Project ID

تأكد من أن `project_id` في `credentials.json` مطابق للمشروع:
```json
{
  "project_id": "foodgo-e1252"
}
```

### الخطوة 5: إعادة تشغيل الاستيراد

بعد إصلاح الصلاحيات:
```bash
node import-firestore.js
```

---

## 🔍 التحقق من الصلاحيات

### من Terminal:
```bash
# اختبار الاتصال بـ Firebase
node -e "const admin = require('firebase-admin'); const cred = require('./credentials.json'); admin.initializeApp({credential: admin.credential.cert(cred)}); const db = admin.firestore(); db.collection('test').limit(1).get().then(() => console.log('✅ Success')).catch(e => console.error('❌ Error:', e.message));"
```

---

## 📝 ملاحظات مهمة

1. **Private Key**: تأكد من أن `private_key` في `credentials.json` صحيح وكامل
2. **Project ID**: يجب أن يكون `project_id` مطابق تماماً
3. **Service Account**: يجب أن يكون موجود في Google Cloud Console
4. **الأدوار**: Service Account يحتاج أدوار محددة للوصول إلى Firestore

---

## 🎯 الحل السريع

1. اذهب إلى [Google Cloud Console](https://console.cloud.google.com/iam-admin/iam?project=foodgo-e1252)
2. ابحث عن Service Account
3. أضف الأدوار المطلوبة
4. أعد تشغيل `node import-firestore.js`

---

**بعد إصلاح الصلاحيات، يجب أن يعمل الاستيراد بنجاح!** ✅




## ❌ المشكلة
```
16 UNAUTHENTICATED: Request had invalid authentication credentials
```

## ✅ الحل

### الخطوة 1: التحقق من Service Account في Firebase Console

1. اذهب إلى [Firebase Console](https://console.firebase.google.com/)
2. اختر المشروع: **foodgo-e1252**
3. اذهب إلى **Project Settings** (⚙️) → **Service Accounts**
4. تأكد من وجود Service Account: `firebase-adminsdk-fbsvc@foodgo-e1252.iam.gserviceaccount.com`

### الخطوة 2: إعطاء صلاحيات Firestore لـ Service Account

#### من Google Cloud Console:

1. اذهب إلى [Google Cloud Console](https://console.cloud.google.com/)
2. اختر المشروع: **foodgo-e1252**
3. اذهب إلى **IAM & Admin** → **IAM**
4. ابحث عن: `firebase-adminsdk-fbsvc@foodgo-e1252.iam.gserviceaccount.com`
5. اضغط على **Edit** (✏️)
6. أضف هذه الأدوار (Roles):
   - ✅ **Firebase Admin SDK Administrator Service Agent**
   - ✅ **Cloud Datastore User** (أو **Cloud Firestore User**)
   - ✅ **Service Account User**

#### أو من Firebase Console:

1. اذهب إلى **Firebase Console** → **Project Settings** → **Service Accounts**
2. تأكد من أن Service Account لديه صلاحيات **Firebase Admin SDK**

### الخطوة 3: إنشاء Service Account جديد (إذا لزم الأمر)

إذا لم يكن Service Account موجود أو لا يعمل:

1. اذهب إلى [Google Cloud Console](https://console.cloud.google.com/)
2. اختر المشروع: **foodgo-e1252**
3. اذهب إلى **IAM & Admin** → **Service Accounts**
4. اضغط **Create Service Account**
5. املأ البيانات:
   - **Service account name**: `firebase-admin`
   - **Service account ID**: `firebase-admin`
6. اضغط **Create and Continue**
7. أضف الأدوار:
   - **Firebase Admin SDK Administrator Service Agent**
   - **Cloud Datastore User**
8. اضغط **Continue** ثم **Done**
9. اضغط على Service Account الجديد
10. اذهب إلى **Keys** → **Add Key** → **Create new key**
11. اختر **JSON** ثم **Create**
12. سيتم تحميل ملف JSON جديد
13. انسخ محتوى الملف إلى `credentials.json`

### الخطوة 4: التحقق من Project ID

تأكد من أن `project_id` في `credentials.json` مطابق للمشروع:
```json
{
  "project_id": "foodgo-e1252"
}
```

### الخطوة 5: إعادة تشغيل الاستيراد

بعد إصلاح الصلاحيات:
```bash
node import-firestore.js
```

---

## 🔍 التحقق من الصلاحيات

### من Terminal:
```bash
# اختبار الاتصال بـ Firebase
node -e "const admin = require('firebase-admin'); const cred = require('./credentials.json'); admin.initializeApp({credential: admin.credential.cert(cred)}); const db = admin.firestore(); db.collection('test').limit(1).get().then(() => console.log('✅ Success')).catch(e => console.error('❌ Error:', e.message));"
```

---

## 📝 ملاحظات مهمة

1. **Private Key**: تأكد من أن `private_key` في `credentials.json` صحيح وكامل
2. **Project ID**: يجب أن يكون `project_id` مطابق تماماً
3. **Service Account**: يجب أن يكون موجود في Google Cloud Console
4. **الأدوار**: Service Account يحتاج أدوار محددة للوصول إلى Firestore

---

## 🎯 الحل السريع

1. اذهب إلى [Google Cloud Console](https://console.cloud.google.com/iam-admin/iam?project=foodgo-e1252)
2. ابحث عن Service Account
3. أضف الأدوار المطلوبة
4. أعد تشغيل `node import-firestore.js`

---

**بعد إصلاح الصلاحيات، يجب أن يعمل الاستيراد بنجاح!** ✅


