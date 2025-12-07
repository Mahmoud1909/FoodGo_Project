# 🔍 كود Terminal لاستدعاء بيانات المطعم

## 📋 Restaurant ID:
```
5KjbF2LDaEe19ttEFClo
```

---

## 🚀 الطريقة 1: استخدام Firebase CLI (موصى بها)

### الأمر:
```bash
firebase firestore:get vendors/5KjbF2LDaEe19ttEFClo
```

### إذا لم يكن Firebase CLI مثبت:
```bash
npm install -g firebase-tools
firebase login
firebase firestore:get vendors/5KjbF2LDaEe19ttEFClo
```

---

## 🚀 الطريقة 2: استخدام PowerShell Script

### الأمر:
```powershell
powershell -ExecutionPolicy Bypass -File get-restaurant-powershell.ps1
```

### أو:
```powershell
.\get-restaurant-powershell.ps1
```

---

## 🚀 الطريقة 3: استخدام gcloud CLI

### الأمر:
```bash
gcloud firestore documents get vendors/5KjbF2LDaEe19ttEFClo --project=foodgo-e1252
```

---

## 🚀 الطريقة 4: استخدام curl (REST API)

### 1. الحصول على Access Token:
```bash
gcloud auth print-access-token
```

### 2. استدعاء البيانات:
```bash
curl -X GET "https://firestore.googleapis.com/v1/projects/foodgo-e1252/databases/(default)/documents/vendors/5KjbF2LDaEe19ttEFClo" -H "Authorization: Bearer $(gcloud auth print-access-token)"
```

---

## 🚀 الطريقة 5: استخدام Node.js (بعد إصلاح credentials)

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

## ✅ الأوامر السريعة:

### Windows PowerShell:
```powershell
.\get-restaurant-powershell.ps1
```

### إذا كان Firebase CLI مثبت:
```bash
firebase firestore:get vendors/5KjbF2LDaEe19ttEFClo
```

### إذا كان gcloud CLI مثبت:
```bash
gcloud firestore documents get vendors/5KjbF2LDaEe19ttEFClo --project=foodgo-e1252
```

---

**الطريقة الموصى بها:** `firebase firestore:get vendors/5KjbF2LDaEe19ttEFClo`



## 📋 Restaurant ID:
```
5KjbF2LDaEe19ttEFClo
```

---

## 🚀 الطريقة 1: استخدام Firebase CLI (موصى بها)

### الأمر:
```bash
firebase firestore:get vendors/5KjbF2LDaEe19ttEFClo
```

### إذا لم يكن Firebase CLI مثبت:
```bash
npm install -g firebase-tools
firebase login
firebase firestore:get vendors/5KjbF2LDaEe19ttEFClo
```

---

## 🚀 الطريقة 2: استخدام PowerShell Script

### الأمر:
```powershell
powershell -ExecutionPolicy Bypass -File get-restaurant-powershell.ps1
```

### أو:
```powershell
.\get-restaurant-powershell.ps1
```

---

## 🚀 الطريقة 3: استخدام gcloud CLI

### الأمر:
```bash
gcloud firestore documents get vendors/5KjbF2LDaEe19ttEFClo --project=foodgo-e1252
```

---

## 🚀 الطريقة 4: استخدام curl (REST API)

### 1. الحصول على Access Token:
```bash
gcloud auth print-access-token
```

### 2. استدعاء البيانات:
```bash
curl -X GET "https://firestore.googleapis.com/v1/projects/foodgo-e1252/databases/(default)/documents/vendors/5KjbF2LDaEe19ttEFClo" -H "Authorization: Bearer $(gcloud auth print-access-token)"
```

---

## 🚀 الطريقة 5: استخدام Node.js (بعد إصلاح credentials)

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

## ✅ الأوامر السريعة:

### Windows PowerShell:
```powershell
.\get-restaurant-powershell.ps1
```

### إذا كان Firebase CLI مثبت:
```bash
firebase firestore:get vendors/5KjbF2LDaEe19ttEFClo
```

### إذا كان gcloud CLI مثبت:
```bash
gcloud firestore documents get vendors/5KjbF2LDaEe19ttEFClo --project=foodgo-e1252
```

---

**الطريقة الموصى بها:** `firebase firestore:get vendors/5KjbF2LDaEe19ttEFClo`

