# 🔧 حل مشكلة UNAUTHENTICATED Error

## ❌ المشكلة

```
Error Code: 16
Error Message: 16 UNAUTHENTICATED: Request had invalid authentication credentials
```

## 🔍 السبب

Service Account في ملف `credentials.json` **لا يملك الصلاحيات الكافية** للوصول إلى Firestore.

## ✅ الحل (خطوة بخطوة)

### الخطوة 1: فتح Google Cloud Console
1. اذهب إلى: https://console.cloud.google.com
2. تأكد من اختيار المشروع الصحيح: **foodgo-e1252**

### الخطوة 2: فتح IAM & Admin
1. من القائمة الجانبية، اضغط على **"IAM & Admin"**
2. ثم اضغط على **"IAM"**

### الخطوة 3: العثور على Service Account
1. في قائمة الأعضاء، ابحث عن Service Account الخاص بك
2. Service Account عادة يكون اسمه مثل:
   - `firebase-adminsdk-xxxxx@foodgo-e1252.iam.gserviceaccount.com`
   - أو اسم آخر حسب ما قمت بإنشائه

### الخطوة 4: إضافة الأدوار المطلوبة
1. اضغط على **"Edit" (قلم)** بجانب Service Account
2. اضغط على **"ADD ANOTHER ROLE"**
3. أضف الأدوار التالية **واحد تلو الآخر**:

   #### الدور الأول:
   - **Role**: `Firebase Admin SDK Administrator Service Agent`
   - **Description**: يمنح صلاحيات كاملة للوصول إلى Firebase Admin SDK

   #### الدور الثاني:
   - **Role**: `Cloud Datastore User`
   - **Description**: يمنح صلاحيات القراءة والكتابة على Firestore

4. اضغط على **"SAVE"**

### الخطوة 5: الانتظار
- **انتظر 2-3 دقائق** حتى يتم تطبيق التغييرات
- Google Cloud يحتاج وقت لتحديث الصلاحيات

### الخطوة 6: اختبار الحل
```bash
node show-restaurant-data.js
```

إذا ظهرت البيانات، فالمشكلة تم حلها! ✅

---

## 🔄 إذا لم يعمل الحل

### الحل البديل 1: استخدام Application Default Credentials
إذا كان لديك `gcloud` CLI مثبت:

```bash
# تسجيل الدخول
gcloud auth application-default login

# تعيين المشروع
gcloud config set project foodgo-e1252
```

ثم عدل السكريبت ليستخدم Application Default Credentials بدلاً من Service Account.

### الحل البديل 2: إنشاء Service Account جديد
1. اذهب إلى: **IAM & Admin → Service Accounts**
2. اضغط على **"CREATE SERVICE ACCOUNT"**
3. أدخل اسم ووصف
4. اضغط **"CREATE AND CONTINUE"**
5. في **"Grant this service account access to project"**:
   - أضف الدور: `Firebase Admin SDK Administrator Service Agent`
   - أضف الدور: `Cloud Datastore User`
6. اضغط **"CONTINUE"** ثم **"DONE"**
7. اضغط على Service Account الجديد
8. اذهب إلى **"KEYS"** → **"ADD KEY"** → **"Create new key"**
9. اختر **JSON** وحمّل الملف
10. استبدل `credentials.json` بالملف الجديد

---

## 📝 ملاحظات مهمة

1. **Service Account Email**: تأكد من أن Service Account المستخدم في `credentials.json` هو نفسه الموجود في Google Cloud Console
2. **Project ID**: تأكد من أن `project_id` في `credentials.json` هو `foodgo-e1252`
3. **Firestore Rules**: تأكد من أن Firestore Rules تسمح بالقراءة (عادة تكون `allow read: if true;` في وضع التطوير)

---

## 🧪 اختبار الصلاحيات

بعد إضافة الصلاحيات، يمكنك اختبارها:

```bash
# اختبار 1: جلب بيانات مطعم
node show-restaurant-data.js

# اختبار 2: جلب بيانات مطعم آخر
node get-restaurant-by-id.js
```

إذا ظهرت البيانات بدون أخطاء، فالصلاحيات صحيحة! ✅



## ❌ المشكلة

```
Error Code: 16
Error Message: 16 UNAUTHENTICATED: Request had invalid authentication credentials
```

## 🔍 السبب

Service Account في ملف `credentials.json` **لا يملك الصلاحيات الكافية** للوصول إلى Firestore.

## ✅ الحل (خطوة بخطوة)

### الخطوة 1: فتح Google Cloud Console
1. اذهب إلى: https://console.cloud.google.com
2. تأكد من اختيار المشروع الصحيح: **foodgo-e1252**

### الخطوة 2: فتح IAM & Admin
1. من القائمة الجانبية، اضغط على **"IAM & Admin"**
2. ثم اضغط على **"IAM"**

### الخطوة 3: العثور على Service Account
1. في قائمة الأعضاء، ابحث عن Service Account الخاص بك
2. Service Account عادة يكون اسمه مثل:
   - `firebase-adminsdk-xxxxx@foodgo-e1252.iam.gserviceaccount.com`
   - أو اسم آخر حسب ما قمت بإنشائه

### الخطوة 4: إضافة الأدوار المطلوبة
1. اضغط على **"Edit" (قلم)** بجانب Service Account
2. اضغط على **"ADD ANOTHER ROLE"**
3. أضف الأدوار التالية **واحد تلو الآخر**:

   #### الدور الأول:
   - **Role**: `Firebase Admin SDK Administrator Service Agent`
   - **Description**: يمنح صلاحيات كاملة للوصول إلى Firebase Admin SDK

   #### الدور الثاني:
   - **Role**: `Cloud Datastore User`
   - **Description**: يمنح صلاحيات القراءة والكتابة على Firestore

4. اضغط على **"SAVE"**

### الخطوة 5: الانتظار
- **انتظر 2-3 دقائق** حتى يتم تطبيق التغييرات
- Google Cloud يحتاج وقت لتحديث الصلاحيات

### الخطوة 6: اختبار الحل
```bash
node show-restaurant-data.js
```

إذا ظهرت البيانات، فالمشكلة تم حلها! ✅

---

## 🔄 إذا لم يعمل الحل

### الحل البديل 1: استخدام Application Default Credentials
إذا كان لديك `gcloud` CLI مثبت:

```bash
# تسجيل الدخول
gcloud auth application-default login

# تعيين المشروع
gcloud config set project foodgo-e1252
```

ثم عدل السكريبت ليستخدم Application Default Credentials بدلاً من Service Account.

### الحل البديل 2: إنشاء Service Account جديد
1. اذهب إلى: **IAM & Admin → Service Accounts**
2. اضغط على **"CREATE SERVICE ACCOUNT"**
3. أدخل اسم ووصف
4. اضغط **"CREATE AND CONTINUE"**
5. في **"Grant this service account access to project"**:
   - أضف الدور: `Firebase Admin SDK Administrator Service Agent`
   - أضف الدور: `Cloud Datastore User`
6. اضغط **"CONTINUE"** ثم **"DONE"**
7. اضغط على Service Account الجديد
8. اذهب إلى **"KEYS"** → **"ADD KEY"** → **"Create new key"**
9. اختر **JSON** وحمّل الملف
10. استبدل `credentials.json` بالملف الجديد

---

## 📝 ملاحظات مهمة

1. **Service Account Email**: تأكد من أن Service Account المستخدم في `credentials.json` هو نفسه الموجود في Google Cloud Console
2. **Project ID**: تأكد من أن `project_id` في `credentials.json` هو `foodgo-e1252`
3. **Firestore Rules**: تأكد من أن Firestore Rules تسمح بالقراءة (عادة تكون `allow read: if true;` في وضع التطوير)

---

## 🧪 اختبار الصلاحيات

بعد إضافة الصلاحيات، يمكنك اختبارها:

```bash
# اختبار 1: جلب بيانات مطعم
node show-restaurant-data.js

# اختبار 2: جلب بيانات مطعم آخر
node get-restaurant-by-id.js
```

إذا ظهرت البيانات بدون أخطاء، فالصلاحيات صحيحة! ✅

