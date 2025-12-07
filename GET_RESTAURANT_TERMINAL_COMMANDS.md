# 🔍 كود Terminal لاستدعاء بيانات المطعم

## 📋 Restaurant ID:
```
5KjbF2LDaEe19ttEFClo
```

---

## 🚀 الطريقة 1: استخدام Node.js Script (موصى بها)

### 1. تشغيل السكريبت:
```bash
node get-restaurant-by-id.js
```

### 2. النتيجة:
- ✅ سيطبع جميع بيانات المطعم في Terminal
- ✅ سيطبع JSON كامل
- ✅ سيطبع كل حقل على حدة

### 3. إذا ظهرت مشكلة UNAUTHENTICATED:
```bash
# تأكد من أن credentials.json موجود
# تأكد من أن Service Account لديه الصلاحيات:
# - Firebase Admin SDK Administrator Service Agent
# - Cloud Datastore User
```

---

## 🚀 الطريقة 2: استخدام Firebase CLI

### 1. الحصول على البيانات:
```bash
firebase firestore:get vendors/5KjbF2LDaEe19ttEFClo
```

### 2. أو استخدام gcloud:
```bash
gcloud firestore documents get vendors/5KjbF2LDaEe19ttEFClo --project=foodgo-e1252
```

---

## 🚀 الطريقة 3: استخدام curl (REST API)

### 1. الحصول على Access Token:
```bash
gcloud auth print-access-token
```

### 2. استدعاء البيانات:
```bash
curl -X GET \
  "https://firestore.googleapis.com/v1/projects/foodgo-e1252/databases/(default)/documents/vendors/5KjbF2LDaEe19ttEFClo" \
  -H "Authorization: Bearer $(gcloud auth print-access-token)"
```

---

## 📝 الملفات المطلوبة:

### 1. `get-restaurant-by-id.js`:
- ✅ موجود في المشروع
- ✅ يستخدم Firebase Admin SDK
- ✅ يطبع جميع البيانات

### 2. `credentials.json`:
- ✅ يجب أن يكون موجود
- ✅ يجب أن يحتوي على Service Account credentials

---

## 🔧 إصلاح مشكلة UNAUTHENTICATED:

### 1. التحقق من credentials.json:
```bash
# تأكد من أن الملف موجود
ls credentials.json
```

### 2. التحقق من الصلاحيات:
- اذهب إلى Google Cloud Console
- IAM & Admin → IAM
- ابحث عن Service Account
- تأكد من وجود:
  - Firebase Admin SDK Administrator Service Agent
  - Cloud Datastore User

---

## ✅ النتيجة المتوقعة:

```
🔍 ============================================
🔍 Fetching Restaurant Data from Firestore
🔍 ============================================
🔍 Restaurant ID: 5KjbF2LDaEe19ttEFClo
🔍 Collection: vendors
🔍 ============================================

✅ ============================================
✅ Firestore Query Completed
✅ ============================================
✅ Document exists: YES
✅ Document ID: 5KjbF2LDaEe19ttEFClo

📊 ============================================
📊 RESTAURANT DATA:
📊 ============================================

📋 Complete Restaurant Object:
{
  "id": "5KjbF2LDaEe19ttEFClo",
  "title": "...",
  "phonenumber": "...",
  ...
}

📋 Individual Fields:
  - id: 5KjbF2LDaEe19ttEFClo
  - title: ...
  - phonenumber: ...
  ...
```

---

**الطريقة الموصى بها:** `node get-restaurant-by-id.js`



## 📋 Restaurant ID:
```
5KjbF2LDaEe19ttEFClo
```

---

## 🚀 الطريقة 1: استخدام Node.js Script (موصى بها)

### 1. تشغيل السكريبت:
```bash
node get-restaurant-by-id.js
```

### 2. النتيجة:
- ✅ سيطبع جميع بيانات المطعم في Terminal
- ✅ سيطبع JSON كامل
- ✅ سيطبع كل حقل على حدة

### 3. إذا ظهرت مشكلة UNAUTHENTICATED:
```bash
# تأكد من أن credentials.json موجود
# تأكد من أن Service Account لديه الصلاحيات:
# - Firebase Admin SDK Administrator Service Agent
# - Cloud Datastore User
```

---

## 🚀 الطريقة 2: استخدام Firebase CLI

### 1. الحصول على البيانات:
```bash
firebase firestore:get vendors/5KjbF2LDaEe19ttEFClo
```

### 2. أو استخدام gcloud:
```bash
gcloud firestore documents get vendors/5KjbF2LDaEe19ttEFClo --project=foodgo-e1252
```

---

## 🚀 الطريقة 3: استخدام curl (REST API)

### 1. الحصول على Access Token:
```bash
gcloud auth print-access-token
```

### 2. استدعاء البيانات:
```bash
curl -X GET \
  "https://firestore.googleapis.com/v1/projects/foodgo-e1252/databases/(default)/documents/vendors/5KjbF2LDaEe19ttEFClo" \
  -H "Authorization: Bearer $(gcloud auth print-access-token)"
```

---

## 📝 الملفات المطلوبة:

### 1. `get-restaurant-by-id.js`:
- ✅ موجود في المشروع
- ✅ يستخدم Firebase Admin SDK
- ✅ يطبع جميع البيانات

### 2. `credentials.json`:
- ✅ يجب أن يكون موجود
- ✅ يجب أن يحتوي على Service Account credentials

---

## 🔧 إصلاح مشكلة UNAUTHENTICATED:

### 1. التحقق من credentials.json:
```bash
# تأكد من أن الملف موجود
ls credentials.json
```

### 2. التحقق من الصلاحيات:
- اذهب إلى Google Cloud Console
- IAM & Admin → IAM
- ابحث عن Service Account
- تأكد من وجود:
  - Firebase Admin SDK Administrator Service Agent
  - Cloud Datastore User

---

## ✅ النتيجة المتوقعة:

```
🔍 ============================================
🔍 Fetching Restaurant Data from Firestore
🔍 ============================================
🔍 Restaurant ID: 5KjbF2LDaEe19ttEFClo
🔍 Collection: vendors
🔍 ============================================

✅ ============================================
✅ Firestore Query Completed
✅ ============================================
✅ Document exists: YES
✅ Document ID: 5KjbF2LDaEe19ttEFClo

📊 ============================================
📊 RESTAURANT DATA:
📊 ============================================

📋 Complete Restaurant Object:
{
  "id": "5KjbF2LDaEe19ttEFClo",
  "title": "...",
  "phonenumber": "...",
  ...
}

📋 Individual Fields:
  - id: 5KjbF2LDaEe19ttEFClo
  - title: ...
  - phonenumber: ...
  ...
```

---

**الطريقة الموصى بها:** `node get-restaurant-by-id.js`

