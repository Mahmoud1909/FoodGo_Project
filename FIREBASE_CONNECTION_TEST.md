# 🔥 اختبار الاتصال بـ Firebase - Terminal Commands

## ✅ الأوامر للتحقق من الاتصال بـ Firebase

### 1. التحقق من تثبيت Firebase CLI

```bash
firebase --version
```

**النتيجة المتوقعة:**
```
firebase-tools/14.27.0
```

---

### 2. التحقق من حالة Login

```bash
firebase login:list
```

**النتيجة المتوقعة:**
```
Logged in as: your-email@example.com
```

---

### 3. التحقق من المشروع الحالي

```bash
firebase projects:list
```

**النتيجة المتوقعة:**
```
✔ Preparing the list of your Firebase projects
┌─────────────────────┬──────────────────────┬─────────────────┐
│ Project Display Name │ Project ID          │ Project Number  │
├─────────────────────┼──────────────────────┼─────────────────┤
│ Foodie              │ foodgo-e1252         │ 123456789       │
└─────────────────────┴──────────────────────┴─────────────────┘
```

---

### 4. التحقق من المشروع المحدد

```bash
firebase use
```

**النتيجة المتوقعة:**
```
Using project foodgo-e1252
```

---

### 5. التحقق من Firestore Rules

```bash
firebase firestore:rules:get
```

**النتيجة المتوقعة:**
```
rules_version = '2';
service cloud.firestore {
  match /databases/{database}/documents {
    match /{document=**} {
      allow read: if true;
      allow write: if request.auth != null;
    }
  }
}
```

---

### 6. التحقق من Firestore Indexes

```bash
firebase firestore:indexes
```

**النتيجة المتوقعة:**
```
✔ Fetching indexes...

Indexes:
┌─────────────────────────────────────────────────────────────┐
│ Collection Group │ Query Scope │ Fields                     │
├─────────────────────────────────────────────────────────────┤
│ vendors          │ COLLECTION  │ createdAt (DESCENDING)      │
│                  │             │ id (ASCENDING)            │
└─────────────────────────────────────────────────────────────┘
```

---

### 7. اختبار الاتصال الكامل

```bash
firebase projects:list && firebase use && firebase firestore:rules:get
```

---

### 8. التحقق من Firebase Config

```bash
cat .firebaserc
```

**النتيجة المتوقعة:**
```json
{
  "projects": {
    "default": "foodgo-e1252"
  }
}
```

---

### 9. التحقق من Firebase JSON Config

```bash
cat firebase.json
```

**النتيجة المتوقعة:**
```json
{
  "firestore": {
    "rules": "firestore.rules",
    "indexes": "jsons/firestore_indexes.json"
  }
}
```

---

### 10. اختبار Firestore Connection (Node.js Script)

إنشاء ملف `test-firestore-connection.js`:

```javascript
const admin = require('firebase-admin');
const serviceAccount = require('./credentials.json');

admin.initializeApp({
  credential: admin.credential.cert(serviceAccount)
});

const db = admin.firestore();

// Test connection
db.collection('vendors').limit(1).get()
  .then((snapshot) => {
    console.log('✅ Firestore Connection: SUCCESS');
    console.log('✅ Documents found:', snapshot.size);
    console.log('✅ Project ID:', admin.app().options.projectId);
    process.exit(0);
  })
  .catch((error) => {
    console.error('❌ Firestore Connection: FAILED');
    console.error('❌ Error:', error.message);
    console.error('❌ Code:', error.code);
    process.exit(1);
  });
```

**تشغيل الاختبار:**
```bash
node test-firestore-connection.js
```

---

## 🔧 أوامر إضافية مفيدة

### إعادة Login

```bash
firebase login
```

### تغيير المشروع

```bash
firebase use foodgo-e1252
```

### التحقق من Firestore API

```bash
gcloud services list --enabled | grep firestore
```

---

## ✅ Checklist للتحقق من الاتصال

- [ ] Firebase CLI مثبت (`firebase --version`)
- [ ] تم Login (`firebase login:list`)
- [ ] المشروع محدد (`firebase use`)
- [ ] Firestore Rules موجودة (`firebase firestore:rules:get`)
- [ ] Firestore Indexes موجودة (`firebase firestore:indexes`)
- [ ] `.firebaserc` موجود وصحيح
- [ ] `firebase.json` موجود وصحيح
- [ ] `credentials.json` موجود وصحيح
- [ ] Node.js script يعمل (`node test-firestore-connection.js`)

---

## 🚨 حل المشاكل الشائعة

### مشكلة: `Error: Not in a Firebase app directory`
**الحل:**
```bash
# تأكد أنك في المجلد الصحيح
cd "D:\Important projects\Foodie_V8.8_Source_Code\New\Admin Panel - Restaurant Panel - Website Panel - Landing Panel\Admin Panel - Restaurant Panel - Website Panel - Landing Panel\Admin Panel"

# تحقق من وجود firebase.json
ls firebase.json
```

### مشكلة: `Error: Invalid project id`
**الحل:**
```bash
# تحقق من .firebaserc
cat .firebaserc

# حدد المشروع الصحيح
firebase use foodgo-e1252
```

### مشكلة: `UNAUTHENTICATED`
**الحل:**
```bash
# إعادة login
firebase login --reauth

# أو استخدام service account
export GOOGLE_APPLICATION_CREDENTIALS="./credentials.json"
```

---

**تاريخ الإنشاء:** 2025-12-07




## ✅ الأوامر للتحقق من الاتصال بـ Firebase

### 1. التحقق من تثبيت Firebase CLI

```bash
firebase --version
```

**النتيجة المتوقعة:**
```
firebase-tools/14.27.0
```

---

### 2. التحقق من حالة Login

```bash
firebase login:list
```

**النتيجة المتوقعة:**
```
Logged in as: your-email@example.com
```

---

### 3. التحقق من المشروع الحالي

```bash
firebase projects:list
```

**النتيجة المتوقعة:**
```
✔ Preparing the list of your Firebase projects
┌─────────────────────┬──────────────────────┬─────────────────┐
│ Project Display Name │ Project ID          │ Project Number  │
├─────────────────────┼──────────────────────┼─────────────────┤
│ Foodie              │ foodgo-e1252         │ 123456789       │
└─────────────────────┴──────────────────────┴─────────────────┘
```

---

### 4. التحقق من المشروع المحدد

```bash
firebase use
```

**النتيجة المتوقعة:**
```
Using project foodgo-e1252
```

---

### 5. التحقق من Firestore Rules

```bash
firebase firestore:rules:get
```

**النتيجة المتوقعة:**
```
rules_version = '2';
service cloud.firestore {
  match /databases/{database}/documents {
    match /{document=**} {
      allow read: if true;
      allow write: if request.auth != null;
    }
  }
}
```

---

### 6. التحقق من Firestore Indexes

```bash
firebase firestore:indexes
```

**النتيجة المتوقعة:**
```
✔ Fetching indexes...

Indexes:
┌─────────────────────────────────────────────────────────────┐
│ Collection Group │ Query Scope │ Fields                     │
├─────────────────────────────────────────────────────────────┤
│ vendors          │ COLLECTION  │ createdAt (DESCENDING)      │
│                  │             │ id (ASCENDING)            │
└─────────────────────────────────────────────────────────────┘
```

---

### 7. اختبار الاتصال الكامل

```bash
firebase projects:list && firebase use && firebase firestore:rules:get
```

---

### 8. التحقق من Firebase Config

```bash
cat .firebaserc
```

**النتيجة المتوقعة:**
```json
{
  "projects": {
    "default": "foodgo-e1252"
  }
}
```

---

### 9. التحقق من Firebase JSON Config

```bash
cat firebase.json
```

**النتيجة المتوقعة:**
```json
{
  "firestore": {
    "rules": "firestore.rules",
    "indexes": "jsons/firestore_indexes.json"
  }
}
```

---

### 10. اختبار Firestore Connection (Node.js Script)

إنشاء ملف `test-firestore-connection.js`:

```javascript
const admin = require('firebase-admin');
const serviceAccount = require('./credentials.json');

admin.initializeApp({
  credential: admin.credential.cert(serviceAccount)
});

const db = admin.firestore();

// Test connection
db.collection('vendors').limit(1).get()
  .then((snapshot) => {
    console.log('✅ Firestore Connection: SUCCESS');
    console.log('✅ Documents found:', snapshot.size);
    console.log('✅ Project ID:', admin.app().options.projectId);
    process.exit(0);
  })
  .catch((error) => {
    console.error('❌ Firestore Connection: FAILED');
    console.error('❌ Error:', error.message);
    console.error('❌ Code:', error.code);
    process.exit(1);
  });
```

**تشغيل الاختبار:**
```bash
node test-firestore-connection.js
```

---

## 🔧 أوامر إضافية مفيدة

### إعادة Login

```bash
firebase login
```

### تغيير المشروع

```bash
firebase use foodgo-e1252
```

### التحقق من Firestore API

```bash
gcloud services list --enabled | grep firestore
```

---

## ✅ Checklist للتحقق من الاتصال

- [ ] Firebase CLI مثبت (`firebase --version`)
- [ ] تم Login (`firebase login:list`)
- [ ] المشروع محدد (`firebase use`)
- [ ] Firestore Rules موجودة (`firebase firestore:rules:get`)
- [ ] Firestore Indexes موجودة (`firebase firestore:indexes`)
- [ ] `.firebaserc` موجود وصحيح
- [ ] `firebase.json` موجود وصحيح
- [ ] `credentials.json` موجود وصحيح
- [ ] Node.js script يعمل (`node test-firestore-connection.js`)

---

## 🚨 حل المشاكل الشائعة

### مشكلة: `Error: Not in a Firebase app directory`
**الحل:**
```bash
# تأكد أنك في المجلد الصحيح
cd "D:\Important projects\Foodie_V8.8_Source_Code\New\Admin Panel - Restaurant Panel - Website Panel - Landing Panel\Admin Panel - Restaurant Panel - Website Panel - Landing Panel\Admin Panel"

# تحقق من وجود firebase.json
ls firebase.json
```

### مشكلة: `Error: Invalid project id`
**الحل:**
```bash
# تحقق من .firebaserc
cat .firebaserc

# حدد المشروع الصحيح
firebase use foodgo-e1252
```

### مشكلة: `UNAUTHENTICATED`
**الحل:**
```bash
# إعادة login
firebase login --reauth

# أو استخدام service account
export GOOGLE_APPLICATION_CREDENTIALS="./credentials.json"
```

---

**تاريخ الإنشاء:** 2025-12-07


