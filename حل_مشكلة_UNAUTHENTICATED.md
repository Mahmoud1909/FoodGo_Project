# 🔧 حل مشكلة UNAUTHENTICATED Error

## ❌ المشكلة

```
Error Code: 16
Error Message: 16 UNAUTHENTICATED: Request had invalid authentication credentials
```

## 🔍 السبب

Service Account **لا يملك الصلاحيات الكافية** للوصول إلى Firestore.

**Service Account الخاص بك:**
```
firebase-adminsdk-fbsvc@foodgo-e1252.iam.gserviceaccount.com
```

---

## ✅ الحل (خطوة بخطوة)

### الخطوة 1: فتح Google Cloud Console
1. اذهب إلى: https://console.cloud.google.com/iam-admin/iam?project=foodgo-e1252
2. تأكد من اختيار المشروع: **foodgo-e1252**

### الخطوة 2: البحث عن Service Account
1. في صفحة **IAM & Admin → IAM**
2. ابحث في القائمة عن:
   ```
   firebase-adminsdk-fbsvc@foodgo-e1252.iam.gserviceaccount.com
   ```

### الخطوة 3: تعديل الصلاحيات
1. اضغط على **"Edit" (أيقونة القلم ✏️)** بجانب Service Account
2. في قسم **"Roles"**، اضغط على **"ADD ANOTHER ROLE"**

### الخطوة 4: إضافة الأدوار المطلوبة

#### الدور الأول: Firebase Admin SDK Administrator Service Agent
1. في حقل البحث، اكتب: `Firebase Admin SDK Administrator Service Agent`
2. اختر الدور من القائمة
3. اضغط **"ADD"**

#### الدور الثاني: Cloud Datastore User
1. اضغط **"ADD ANOTHER ROLE"** مرة أخرى
2. في حقل البحث، اكتب: `Cloud Datastore User`
3. اختر الدور من القائمة
4. اضغط **"ADD"**

### الخطوة 5: حفظ التغييرات
1. اضغط على **"SAVE"** في أسفل الصفحة
2. **انتظر 2-3 دقائق** حتى يتم تطبيق التغييرات

### الخطوة 6: اختبار الحل
```bash
node show-restaurant-data.js
```

إذا ظهرت البيانات، فالمشكلة تم حلها! ✅

---

## 📸 صورة توضيحية للخطوات

```
Google Cloud Console
├── IAM & Admin
    └── IAM
        └── Members (قائمة)
            └── firebase-adminsdk-fbsvc@foodgo-e1252.iam.gserviceaccount.com
                └── Edit (✏️)
                    └── Roles
                        ├── ADD ANOTHER ROLE
                        │   └── Firebase Admin SDK Administrator Service Agent ✅
                        └── ADD ANOTHER ROLE
                            └── Cloud Datastore User ✅
                                └── SAVE
```

---

## 🔄 إذا لم يعمل الحل

### الحل البديل: استخدام Application Default Credentials

إذا كان لديك `gcloud` CLI مثبت:

```bash
# تسجيل الدخول
gcloud auth application-default login

# تعيين المشروع
gcloud config set project foodgo-e1252

# اختبار
node show-restaurant-data.js
```

---

## ✅ التحقق من الصلاحيات

بعد إضافة الصلاحيات، يمكنك التحقق:

```bash
# اختبار 1: عرض معلومات Service Account
node check-service-account.js

# اختبار 2: جلب بيانات المطعم
node show-restaurant-data.js
```

---

## 📝 ملاحظات مهمة

1. **Service Account Email**: يجب أن يكون مطابق تماماً:
   ```
   firebase-adminsdk-fbsvc@foodgo-e1252.iam.gserviceaccount.com
   ```

2. **Project ID**: يجب أن يكون:
   ```
   foodgo-e1252
   ```

3. **الانتظار**: بعد إضافة الصلاحيات، انتظر **2-3 دقائق** قبل الاختبار

4. **Firestore Rules**: تأكد من أن Firestore Rules تسمح بالقراءة:
   ```javascript
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

## 🆘 إذا استمرت المشكلة

1. تأكد من أن Service Account موجود في Google Cloud Console
2. تأكد من أن الأدوار تم إضافتها بشكل صحيح
3. انتظر 5 دقائق إضافية
4. جرب إنشاء Service Account جديد (راجع `FIX_UNAUTHENTICATED_ERROR.md`)



## ❌ المشكلة

```
Error Code: 16
Error Message: 16 UNAUTHENTICATED: Request had invalid authentication credentials
```

## 🔍 السبب

Service Account **لا يملك الصلاحيات الكافية** للوصول إلى Firestore.

**Service Account الخاص بك:**
```
firebase-adminsdk-fbsvc@foodgo-e1252.iam.gserviceaccount.com
```

---

## ✅ الحل (خطوة بخطوة)

### الخطوة 1: فتح Google Cloud Console
1. اذهب إلى: https://console.cloud.google.com/iam-admin/iam?project=foodgo-e1252
2. تأكد من اختيار المشروع: **foodgo-e1252**

### الخطوة 2: البحث عن Service Account
1. في صفحة **IAM & Admin → IAM**
2. ابحث في القائمة عن:
   ```
   firebase-adminsdk-fbsvc@foodgo-e1252.iam.gserviceaccount.com
   ```

### الخطوة 3: تعديل الصلاحيات
1. اضغط على **"Edit" (أيقونة القلم ✏️)** بجانب Service Account
2. في قسم **"Roles"**، اضغط على **"ADD ANOTHER ROLE"**

### الخطوة 4: إضافة الأدوار المطلوبة

#### الدور الأول: Firebase Admin SDK Administrator Service Agent
1. في حقل البحث، اكتب: `Firebase Admin SDK Administrator Service Agent`
2. اختر الدور من القائمة
3. اضغط **"ADD"**

#### الدور الثاني: Cloud Datastore User
1. اضغط **"ADD ANOTHER ROLE"** مرة أخرى
2. في حقل البحث، اكتب: `Cloud Datastore User`
3. اختر الدور من القائمة
4. اضغط **"ADD"**

### الخطوة 5: حفظ التغييرات
1. اضغط على **"SAVE"** في أسفل الصفحة
2. **انتظر 2-3 دقائق** حتى يتم تطبيق التغييرات

### الخطوة 6: اختبار الحل
```bash
node show-restaurant-data.js
```

إذا ظهرت البيانات، فالمشكلة تم حلها! ✅

---

## 📸 صورة توضيحية للخطوات

```
Google Cloud Console
├── IAM & Admin
    └── IAM
        └── Members (قائمة)
            └── firebase-adminsdk-fbsvc@foodgo-e1252.iam.gserviceaccount.com
                └── Edit (✏️)
                    └── Roles
                        ├── ADD ANOTHER ROLE
                        │   └── Firebase Admin SDK Administrator Service Agent ✅
                        └── ADD ANOTHER ROLE
                            └── Cloud Datastore User ✅
                                └── SAVE
```

---

## 🔄 إذا لم يعمل الحل

### الحل البديل: استخدام Application Default Credentials

إذا كان لديك `gcloud` CLI مثبت:

```bash
# تسجيل الدخول
gcloud auth application-default login

# تعيين المشروع
gcloud config set project foodgo-e1252

# اختبار
node show-restaurant-data.js
```

---

## ✅ التحقق من الصلاحيات

بعد إضافة الصلاحيات، يمكنك التحقق:

```bash
# اختبار 1: عرض معلومات Service Account
node check-service-account.js

# اختبار 2: جلب بيانات المطعم
node show-restaurant-data.js
```

---

## 📝 ملاحظات مهمة

1. **Service Account Email**: يجب أن يكون مطابق تماماً:
   ```
   firebase-adminsdk-fbsvc@foodgo-e1252.iam.gserviceaccount.com
   ```

2. **Project ID**: يجب أن يكون:
   ```
   foodgo-e1252
   ```

3. **الانتظار**: بعد إضافة الصلاحيات، انتظر **2-3 دقائق** قبل الاختبار

4. **Firestore Rules**: تأكد من أن Firestore Rules تسمح بالقراءة:
   ```javascript
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

## 🆘 إذا استمرت المشكلة

1. تأكد من أن Service Account موجود في Google Cloud Console
2. تأكد من أن الأدوار تم إضافتها بشكل صحيح
3. انتظر 5 دقائق إضافية
4. جرب إنشاء Service Account جديد (راجع `FIX_UNAUTHENTICATED_ERROR.md`)



