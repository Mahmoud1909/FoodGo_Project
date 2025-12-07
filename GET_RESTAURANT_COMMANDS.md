# 🔍 كود Terminal لاستدعاء بيانات المطعم

## 📋 Restaurant ID:
```
5KjbF2LDaEe19ttEFClo
```

---

## 🚀 الطريقة 1: استخدام Firebase CLI

### الأمر:
```bash
firebase firestore:get vendors/5KjbF2LDaEe19ttEFClo
```

### أو باستخدام script:
```bash
bash get-restaurant-firebase-cli.sh
```

---

## 🚀 الطريقة 2: استخدام gcloud CLI

### الأمر:
```bash
gcloud firestore documents get vendors/5KjbF2LDaEe19ttEFClo --project=foodgo-e1252
```

### أو باستخدام script:
```bash
bash get-restaurant-gcloud.sh
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

## 🚀 الطريقة 4: استخدام Node.js (بعد إصلاح credentials)

### الأمر:
```bash
node get-restaurant-by-id.js
```

### إصلاح مشكلة UNAUTHENTICATED:
1. تأكد من أن `credentials.json` موجود
2. تأكد من أن Service Account لديه الصلاحيات:
   - Firebase Admin SDK Administrator Service Agent
   - Cloud Datastore User

---

## 📝 ملاحظات:

- ✅ استبدل `foodgo-e1252` بـ Project ID الخاص بك إذا كان مختلف
- ✅ تأكد من أنك مسجل دخول في Firebase CLI: `firebase login`
- ✅ تأكد من أنك مسجل دخول في gcloud: `gcloud auth login`

---

**الطريقة الموصى بها:** `firebase firestore:get vendors/5KjbF2LDaEe19ttEFClo`



## 📋 Restaurant ID:
```
5KjbF2LDaEe19ttEFClo
```

---

## 🚀 الطريقة 1: استخدام Firebase CLI

### الأمر:
```bash
firebase firestore:get vendors/5KjbF2LDaEe19ttEFClo
```

### أو باستخدام script:
```bash
bash get-restaurant-firebase-cli.sh
```

---

## 🚀 الطريقة 2: استخدام gcloud CLI

### الأمر:
```bash
gcloud firestore documents get vendors/5KjbF2LDaEe19ttEFClo --project=foodgo-e1252
```

### أو باستخدام script:
```bash
bash get-restaurant-gcloud.sh
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

## 🚀 الطريقة 4: استخدام Node.js (بعد إصلاح credentials)

### الأمر:
```bash
node get-restaurant-by-id.js
```

### إصلاح مشكلة UNAUTHENTICATED:
1. تأكد من أن `credentials.json` موجود
2. تأكد من أن Service Account لديه الصلاحيات:
   - Firebase Admin SDK Administrator Service Agent
   - Cloud Datastore User

---

## 📝 ملاحظات:

- ✅ استبدل `foodgo-e1252` بـ Project ID الخاص بك إذا كان مختلف
- ✅ تأكد من أنك مسجل دخول في Firebase CLI: `firebase login`
- ✅ تأكد من أنك مسجل دخول في gcloud: `gcloud auth login`

---

**الطريقة الموصى بها:** `firebase firestore:get vendors/5KjbF2LDaEe19ttEFClo`

