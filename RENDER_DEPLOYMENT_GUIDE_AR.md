# 🚀 دليل استضافة المشروع على Render.com

## 📋 نظرة عامة

هذا الدليل يشرح كيفية استضافة مشروع **Foodie Admin Panel** (Laravel) على [Render.com](https://dashboard.render.com/).

---

## ✅ المتطلبات الأساسية

1. حساب على [Render.com](https://render.com) (مجاني)
2. حساب على GitHub (لرفع الكود)
3. المشروع موجود على GitHub

---

## 📝 خطوات الإعداد

### الخطوة 1: رفع المشروع على GitHub

إذا لم يكن المشروع على GitHub بعد:

```bash
# في مجلد المشروع
git init
git add .
git commit -m "Initial commit"
git branch -M main
git remote add origin https://github.com/YOUR_USERNAME/YOUR_REPO.git
git push -u origin main
```

### الخطوة 2: إنشاء Web Service على Render

1. اذهب إلى [Render Dashboard](https://dashboard.render.com/)
2. اضغط على **"New +"** ثم اختر **"Web Service"**
3. اربط حساب GitHub الخاص بك
4. اختر المستودع (Repository) الخاص بك

### الخطوة 3: إعدادات Web Service

املأ البيانات التالية في نموذج Render:

#### **Source Code (الكود المصدري):**
- **Repository:** اختر المستودع الخاص بك
- **Branch:** `main` (أو الفرع الذي تريد استخدامه)

#### **Name (الاسم):**
```
Foodie Admin Panel
```
أو أي اسم تفضله

#### **Project (المشروع):**
- اختر "My project" أو أنشئ مشروع جديد
- اختر **Production**

#### **Language (اللغة):**
```
Docker
```
⚠️ **مهم:** اختر **Docker** لأن Laravel يحتاج PHP وليس متوفر مباشرة في Render

#### **Region (المنطقة):**
اختر أقرب منطقة للمستخدمين:
- **Frankfurt (EU Central)** - لأوروبا
- **Oregon (US West)** - لأمريكا
- **Singapore (AP Southeast)** - لآسيا
- **Mumbai (AP South)** - للهند والشرق الأوسط

#### **Root Directory (المجلد الجذر):**
اتركه فارغاً (إذا كان المشروع في الجذر)
أو ضع المسار إذا كان في مجلد فرعي

#### **Dockerfile Path:**
```
Dockerfile
```
(يجب أن يكون الملف موجوداً في الجذر)

### الخطوة 4: Instance Type (نوع الخادم)

#### للبداية (Hobby):
- **Free:** $0/شهر - 512 MB RAM, 0.1 CPU
  - ⚠️ **ملاحظة:** Free tier قد يكون بطيء وقد يتوقف بعد عدم الاستخدام

#### للإنتاج (Professional):
- **Starter:** $7/شهر - 512 MB RAM, 0.5 CPU ✅ **موصى به للبداية**
- **Standard:** $25/شهر - 2 GB RAM, 1 CPU
- **Pro:** $85/شهر - 4 GB RAM, 2 CPU

**نوصي بـ Starter ($7/شهر)** للبداية.

### الخطوة 5: Environment Variables (متغيرات البيئة)

اضغط على **"+ Add Environment Variable"** وأضف:

#### متغيرات أساسية:

```
APP_NAME=Foodie Admin
APP_ENV=production
APP_DEBUG=false
APP_URL=https://FoodGO.SAdmin.com
```

#### مفتاح التطبيق (APP_KEY):

**مهم جداً:** يجب إنشاء `APP_KEY`:

1. على جهازك المحلي، شغل:
```bash
php artisan key:generate --show
```

2. انسخ المفتاح وأضفه في Render:
```
APP_KEY=base64:base64:YnAD5MEYUBdEnjQ8LwlKU9F03nm5Qt9KMH//nhUM4CI=
```

#### قاعدة البيانات:

إذا كنت تستخدم قاعدة بيانات من Render:

1. أنشئ **PostgreSQL Database** من Render:
   - اضغط **"New +"** → **"PostgreSQL"**
   - اختر Plan (Free للبداية)
   - انسخ بيانات الاتصال

2. أضف متغيرات البيئة:
```
DB_CONNECTION=pgsql
DB_HOST=your-db-host.onrender.com
DB_PORT=5432
DB_DATABASE=your_database_name
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password
```

**ملاحظة:** Render يستخدم PostgreSQL افتراضياً. إذا كنت تريد MySQL، يمكنك استخدام خدمة خارجية مثل [PlanetScale](https://planetscale.com/) أو [Railway](https://railway.app/).

#### البريد الإلكتروني:

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@yourdomain.com
MAIL_FROM_NAME="Foodie Admin"
```

#### Payment Gateways (بوابات الدفع):

```
STRIPE_KEY=your_stripe_key
STRIPE_SECRET=your_stripe_secret

PAYPAL_CLIENT_ID=your_paypal_client_id
PAYPAL_CLIENT_SECRET=your_paypal_secret
PAYPAL_MODE=live

RAZORPAY_KEY=your_razorpay_key
RAZORPAY_SECRET=your_razorpay_secret
```

#### Firebase (إذا كنت تستخدمه):

```
FIREBASE_CREDENTIALS=your_firebase_credentials_json
```

#### OpenAI (إذا كنت تستخدمه):

```
OPENAI_API_KEY=your_openai_key
```

### الخطوة 6: Advanced Settings (إعدادات متقدمة)

#### Build Command:
اتركه فارغاً (Dockerfile سيتولى البناء)

#### Start Command:
اتركه فارغاً (Dockerfile يحتوي على CMD)

#### Health Check Path:
```
/
```

### الخطوة 7: النشر (Deploy)

1. اضغط على **"Create Web Service"**
2. انتظر حتى ينتهي البناء (قد يستغرق 5-10 دقائق)
3. بعد النشر، ستحصل على رابط مثل: `https://your-service-name.onrender.com`

---

## 🗄️ إعداد قاعدة البيانات

### إنشاء قاعدة بيانات على Render:

1. من Dashboard، اضغط **"New +"** → **"PostgreSQL"**
2. اختر:
   - **Name:** `foodie-admin-db`
   - **Database:** `foodie_admin`
   - **User:** `foodie_admin_user`
   - **Plan:** Free (للبداية) أو Starter ($7/شهر)
   - **Region:** نفس منطقة Web Service

3. بعد الإنشاء، انسخ **Internal Database URL** أو البيانات الفردية

4. أضف متغيرات البيئة في Web Service:
```
DB_CONNECTION=pgsql
DB_HOST=dpg-xxxxx-a.frankfurt-postgres.render.com
DB_PORT=5432
DB_DATABASE=foodie_admin
DB_USERNAME=foodie_admin_user
DB_PASSWORD=your_password_here
```

### تشغيل Migrations:

بعد النشر، يمكنك تشغيل migrations عبر Render Shell:

1. من Web Service، اضغط على **"Shell"**
2. شغل:
```bash
php artisan migrate --force
```

أو أضف Build Command في Render:
```bash
php artisan migrate --force
```

---

## 🔧 حل المشاكل الشائعة

### 1. خطأ 500 Internal Server Error

**الحل:**
- تحقق من `APP_KEY` موجود وصحيح
- تحقق من متغيرات قاعدة البيانات
- تحقق من الصلاحيات في `storage` و `bootstrap/cache`

### 2. خطأ في الاتصال بقاعدة البيانات

**الحل:**
- تأكد من استخدام **Internal Database URL** من Render
- تحقق من أن Database و Web Service في نفس Region
- استخدم `pgsql` بدلاً من `mysql` إذا كنت تستخدم Render Database

### 3. الموقع بطيء

**الحل:**
- ترقية Instance Type إلى Starter أو أعلى
- تفعيل Caching:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 4. الملفات المرفوعة لا تُحفظ

**الحل:**
- استخدم **S3** أو **Cloud Storage** لحفظ الملفات
- Render لا يدعم Persistent Storage في Free tier

---

## 📦 إعداد S3 لحفظ الملفات (موصى به)

لأن Render لا يحفظ الملفات بشكل دائم، استخدم AWS S3:

1. أنشئ حساب على [AWS S3](https://aws.amazon.com/s3/)
2. أنشئ Bucket جديد
3. أضف متغيرات البيئة:
```
AWS_ACCESS_KEY_ID=your_access_key
AWS_SECRET_ACCESS_KEY=your_secret_key
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=your-bucket-name
AWS_USE_PATH_STYLE_ENDPOINT=false
FILESYSTEM_DRIVER=s3
```

4. في `config/filesystems.php`، تأكد من:
```php
'default' => env('FILESYSTEM_DRIVER', 's3'),
```

---

## 🔒 الأمان

1. **APP_DEBUG=false** دائماً في الإنتاج
2. **APP_ENV=production**
3. استخدم **HTTPS** (Render يوفره تلقائياً)
4. لا تشارك `.env` أو Environment Variables
5. استخدم كلمات مرور قوية

---

## 📊 المراقبة والنسخ الاحتياطي

### المراقبة:
- Render يوفر Logs في Dashboard
- يمكنك ربط **Sentry** أو **LogRocket** للمراقبة المتقدمة

### النسخ الاحتياطي:
- Render يقوم بعمل نسخ احتياطي تلقائي لقاعدة البيانات (في Paid plans)
- يمكنك تصدير قاعدة البيانات يدوياً من Shell:
```bash
pg_dump $DATABASE_URL > backup.sql
```

---

## ✅ قائمة التحقق النهائية

- [ ] المشروع على GitHub
- [ ] Web Service منشأ على Render
- [ ] Dockerfile موجود في المشروع
- [ ] Environment Variables محدثة
- [ ] APP_KEY موجود وصحيح
- [ ] قاعدة البيانات منشأة ومتصلة
- [ ] Migrations تم تشغيلها
- [ ] APP_DEBUG=false
- [ ] APP_ENV=production
- [ ] الموقع يعمل على HTTPS
- [ ] اختبار جميع الوظائف

---

## 🎯 ملخص سريع

1. **ارفع المشروع على GitHub**
2. **أنشئ Web Service على Render** → اختر **Docker**
3. **أضف Environment Variables** (خاصة APP_KEY و DB_*)
4. **أنشئ PostgreSQL Database** على Render
5. **انتظر النشر** (5-10 دقائق)
6. **شغل Migrations** من Shell
7. **اختبر الموقع**

---

## 📞 الدعم

- [Render Documentation](https://render.com/docs)
- [Render Community](https://community.render.com/)
- [Laravel on Render](https://render.com/docs/deploy-laravel)

**بالتوفيق! 🚀**

