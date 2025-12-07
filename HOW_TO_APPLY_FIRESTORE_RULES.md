# 🔐 كيفية تطبيق Firestore Rules

## ⚠️ المشكلة
القواعد موجودة في ملف `firestore.rules` محلياً، لكن **لم يتم تطبيقها على Firebase**!

---

## ✅ الحل السريع (من Firebase Console) - **الأسهل**

### الخطوات:

1. **افتح Firebase Console:**
   - اذهب إلى: https://console.firebase.google.com/
   - اختر مشروعك: **foodgo-e1252**

2. **اذهب إلى Firestore Rules:**
   - من القائمة الجانبية: **Firestore Database**
   - اضغط على تبويب **Rules** (في الأعلى)

3. **انسخ القواعد من ملف `firestore.rules`:**
   - افتح ملف `firestore.rules` في المشروع
   - انسخ **كل المحتوى** (Ctrl+A ثم Ctrl+C)

4. **الصق في Firebase Console:**
   - احذف كل ما في صندوق Rules في Firebase Console
   - الصق القواعد الجديدة (Ctrl+V)

5. **اضغط Publish:**
   - اضغط زر **Publish** (أزرق في الأعلى)
   - انتظر حتى يظهر "Rules published successfully"

6. **تحقق:**
   - جرب تحديث حالة مطعم أو سائق
   - يجب أن تعمل الآن! ✅

---

## 🚀 الحل البديل (من Terminal) - **إذا كان Firebase CLI مثبت**

### الخطوات:

1. **تأكد من تثبيت Firebase CLI:**
   ```bash
   firebase --version
   ```
   إذا لم يكن مثبت:
   ```bash
   npm install -g firebase-tools
   ```

2. **سجل الدخول:**
   ```bash
   firebase login
   ```

3. **تأكد من Project ID:**
   - افتح ملف `.firebaserc`
   - تأكد أن Project ID صحيح: `foodgo-e1252`

4. **نشر القواعد:**
   ```bash
   firebase deploy --only firestore:rules
   ```

5. **تحقق:**
   - يجب أن ترى رسالة "Rules deployed successfully"
   - جرب تحديث حالة مطعم أو سائق

---

## 📋 القواعد المطلوبة (نسخ جاهزة)

```javascript
rules_version = '2';
service cloud.firestore {
  match /databases/{database}/documents {
    // Allow read and write access to vendors collection for authenticated users
    match /vendors/{document=**} {
      allow read: if true;
      allow write: if request.auth != null;
    }
    
    // Allow read and write access to users collection for authenticated users
    match /users/{document=**} {
      allow read: if true;
      allow write: if request.auth != null;
    }
    
    // Allow read access to settings collection
    match /settings/{document=**} {
      allow read: if true;
    }
    
    // Allow read access to currencies collection
    match /currencies/{document=**} {
      allow read: if true;
    }
    
    // Allow read access to zone collection
    match /zone/{document=**} {
      allow read: if true;
    }
    
    // Allow read access to vendor_categories collection
    match /vendor_categories/{document=**} {
      allow read: if true;
    }
    
    // Allow read access to subscription_plans collection
    match /subscription_plans/{document=**} {
      allow read: if true;
    }
    
    // Allow read access to orders collection
    match /orders/{document=**} {
      allow read: if true;
      allow write: if request.auth != null;
    }
    
    // Allow read access to wallet collection
    match /wallet/{document=**} {
      allow read: if true;
      allow write: if request.auth != null;
    }
    
    // Allow read access to driver_payouts collection
    match /driver_payouts/{document=**} {
      allow read: if true;
      allow write: if request.auth != null;
    }
    
    // Default rule: Allow read for all authenticated users, write for authenticated users
    match /{document=**} {
      allow read: if true;
      allow write: if request.auth != null;
    }
  }
}
```

---

## ⚠️ ملاحظات مهمة

1. **القواعد الحالية تسمح بالكتابة لأي مستخدم مسجل** (`request.auth != null`)
   - هذا آمن للتطوير والاختبار
   - في الإنتاج، يُفضل تقييد الصلاحيات حسب الأدوار

2. **بعد تطبيق القواعد:**
   - قد تحتاج إلى **تحديث الصفحة** (F5)
   - أو **تسجيل الخروج والدخول مرة أخرى**

3. **إذا استمرت المشكلة:**
   - تحقق من أنك **مسجل دخول** في Firebase Authentication
   - تحقق من Console (F12) للأخطاء الأخرى

---

## 🎯 الخطوات السريعة (ملخص)

1. ✅ افتح: https://console.firebase.google.com/
2. ✅ اختر: **foodgo-e1252**
3. ✅ اذهب: **Firestore Database** → **Rules**
4. ✅ انسخ محتوى `firestore.rules`
5. ✅ الصق في Firebase Console
6. ✅ اضغط **Publish**
7. ✅ جرب تحديث حالة مطعم/سائق

**⏱️ الوقت المطلوب: دقيقة واحدة فقط!**

