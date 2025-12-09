# 🚀 دليل شامل: استضافة Laravel على Render.com

## 🌐 اقتراحات أسماء نطاقات بالإنجليزية (Domain Names)

### خيارات موصى بها:

#### 1. **أسماء مباشرة:**
- `foodgo-admin.com`
- `foodgo-panel.com`
- `foodgo-dashboard.com`
- `foodgo-manager.com`
- `foodgo-control.com`

#### 2. **أسماء احترافية:**
- `admin-foodgo.com`
- `panel-foodgo.com`
- `dashboard-foodgo.com`
- `manage-foodgo.com`
- `control-foodgo.com`

#### 3. **أسماء إبداعية:**
- `foodgo-hub.com`
- `foodgo-central.com`
- `foodgo-studio.com`
- `foodgo-platform.com`
- `foodgo-suite.com`

#### 4. **أسماء قصيرة:**
- `fg-admin.com`
- `fg-panel.com`
- `fg-dash.com`
- `fg-mgr.com`

#### 5. **أسماء مع كلمات إضافية:**
- `foodgo-admin-panel.com`
- `foodgo-restaurant-admin.com`
- `foodgo-backend.com`
- `foodgo-cms.com`

### 💡 نصائح لاختيار النطاق:
- ✅ اختر اسم قصير وسهل التذكر
- ✅ تجنب الأرقام والشرطات الطويلة
- ✅ استخدم `.com` إذا كان متاحاً
- ✅ تأكد من أن الاسم يعكس وظيفة الموقع (Admin Panel)

### 🔗 شراء النطاق:
يمكنك شراء النطاق من:
- [Namecheap](https://www.namecheap.com/) - موصى به
- [GoDaddy](https://www.godaddy.com/)
- [Google Domains](https://domains.google/)
- [Cloudflare Registrar](https://www.cloudflare.com/products/registrar/)

---

## 📋 خطوات إعداد المشروع قبل النشر

### ✅ الخطوة 1: التحقق من الملفات المطلوبة

تأكد من وجود هذه الملفات في المشروع:

```
✅ Dockerfile
✅ .dockerignore
✅ composer.json
✅ package.json
✅ .env.example (اختياري)
```

### ✅ الخطوة 2: تحديث Dockerfile

تأكد من أن `Dockerfile` يستخدم:
- ✅ PHP 8.2 (أو أحدث)
- ✅ Node.js 20.x
- ✅ جميع التبعيات المطلوبة

### ✅ الخطوة 3: إعداد .env.example

تأكد من وجود ملف `.env.example` يحتوي على جميع المتغيرات المطلوبة.

### ✅ الخطوة 4: رفع المشروع على GitHub

```bash
# 1. تأكد من أنك في مجلد المشروع
cd "D:\Important projects\Foodie_V8.8_Source_Code\New\Admin Panel - Restaurant Panel - Website Panel - Landing Panel\Admin Panel - Restaurant Panel - Website Panel - Landing Panel\Admin Panel"

# 2. تحقق من حالة Git
git status

# 3. إذا لم يكن المشروع على Git بعد:
git init
git add .
git commit -m "Prepare for Render deployment"

# 4. أنشئ مستودع جديد على GitHub ثم:
git remote add origin https://github.com/YOUR_USERNAME/YOUR_REPO.git
git branch -M main
git push -u origin main

# 5. إذا كان المشروع موجوداً على Git:
git add .
git commit -m "Update for Render deployment"
git push
```

### ✅ الخطوة 5: إنشاء APP_KEY

```bash
php artisan key:generate --show
```

انسخ المفتاح الذي سيظهر (مثل: `base64:...`) - ستحتاجه في Render.

### ✅ الخطوة 6: التحقق من الصلاحيات

تأكد من أن المجلدات التالية قابلة للكتابة:
- `storage/`
- `bootstrap/cache/`

---

## 🎯 تعليمات ملء Render Dashboard (خطوة بخطوة)

### 📍 الخطوة 1: الوصول إلى Render

1. اذهب إلى: https://dashboard.render.com/
2. سجل دخول بحساب GitHub
3. اضغط على **"New +"** في الأعلى
4. اختر **"Web Service"**

---

### 📍 الخطوة 2: ربط المستودع (Source Code)

1. **Connect a repository:**
   - إذا لم تكن قد ربطت GitHub من قبل، اضغط **"Connect GitHub"**
   - اختر المستودع (Repository) الخاص بك
   - اختر الفرع (Branch): `main` أو `master`

---

### 📍 الخطوة 3: إعدادات الخدمة الأساسية

#### **Name (اسم الخدمة):**
```
foodgo-admin-panel
```
أو أي اسم تفضله (سيصبح جزءاً من الرابط: `foodgo-admin-panel.onrender.com`)

#### **Project (المشروع):**
- اختر **"My project"** أو أنشئ مشروع جديد
- اختر **Environment:** `Production`

---

### 📍 الخطوة 4: إعدادات البناء (Build Settings)

#### **Language (اللغة):** ⚠️ **مهم جداً**
```
Docker
```
**اختر Docker** - هذا هو الخيار الصحيح لـ Laravel

#### **Region (المنطقة):**
اختر أقرب منطقة للمستخدمين:
- `Frankfurt (EU Central)` - لأوروبا والشرق الأوسط ✅ موصى به
- `Oregon (US West)` - لأمريكا
- `Singapore (AP Southeast)` - لآسيا
- `Mumbai (AP South)` - للهند

#### **Root Directory (المجلد الجذر):**
```
[اتركه فارغاً]
```
أو إذا كان المشروع في مجلد فرعي:
```
Admin Panel
```

#### **Dockerfile Path:**
```
Dockerfile
```
(يجب أن يكون الملف موجوداً في الجذر أو في Root Directory)

---

### 📍 الخطوة 5: نوع الخادم (Instance Type)

#### للبداية (موصى به):
```
Starter
$7/month
512 MB RAM, 0.5 CPU
```

#### مجاني (للاختبار فقط):
```
Free
$0/month
512 MB RAM, 0.1 CPU
⚠️ قد يكون بطيء وقد يتوقف بعد عدم الاستخدام
```

**نوصي بـ Starter ($7/شهر)** للبداية.

---

### 📍 الخطوة 6: متغيرات البيئة (Environment Variables)

اضغط على **"+ Add Environment Variable"** وأضف المتغيرات التالية **واحدة تلو الأخرى**:

#### 1. متغيرات أساسية:

```
APP_NAME=Foodie Admin
```

```
APP_ENV=production
```

```
APP_DEBUG=false
```

```
APP_URL=https://foodgo-admin-panel.onrender.com
```
(استبدل `foodgo-admin-panel` باسم الخدمة الذي اخترته)

```
LOG_CHANNEL=stack
```

```
LOG_LEVEL=error
```

#### 2. APP_KEY (مهم جداً):

```
APP_KEY=base64:base64:YnAD5MEYUBdEnjQ8LwlKU9F03nm5Qt9KMH//nhUM4CI=
```
(استخدم المفتاح الذي أنشأته في الخطوة 5 أعلاه)

#### 3. قاعدة البيانات (PostgreSQL):

**أولاً:** أنشئ PostgreSQL Database على Render:
1. من Dashboard، اضغط **"New +"** → **"PostgreSQL"**
2. اختر:
   - **Name:** `foodgo-admin-db`
   - **Database:** `foodgo_admin`
   - **User:** `foodgo_admin_user`
   - **Plan:** `Free` (للبداية) أو `Starter` ($7/شهر)
   - **Region:** نفس منطقة Web Service
3. بعد الإنشاء، انسخ بيانات الاتصال

**ثانياً:** أضف متغيرات البيئة:

```
DB_CONNECTION=pgsql
```

```
DB_HOST=dpg-xxxxx-a.frankfurt-postgres.render.com
```
(استبدل `dpg-xxxxx-a.frankfurt-postgres.render.com` بـ Host من Render)

```
DB_PORT=5432
```

```
DB_DATABASE=foodgo_admin
```
(استبدل باسم قاعدة البيانات من Render)

```
DB_USERNAME=foodgo_admin_user
```
(استبدل باسم المستخدم من Render)

```
DB_PASSWORD=your_password_here
```
(استبدل بكلمة المرور من Render)

#### 4. البريد الإلكتروني:

```
MAIL_MAILER=smtp
```

```
MAIL_HOST=smtp.gmail.com
```

```
MAIL_PORT=587
```

```
MAIL_USERNAME=your-email@gmail.com
```

```
MAIL_PASSWORD=your-app-password
```

```
MAIL_ENCRYPTION=tls
```

```
MAIL_FROM_ADDRESS=noreply@foodgo.com
```

```
MAIL_FROM_NAME=Foodie Admin
```

#### 5. Sessions & Cache:

```
SESSION_DRIVER=database
```

```
CACHE_DRIVER=file
```

```
QUEUE_CONNECTION=database
```

```
SESSION_LIFETIME=120
```

#### 6. AWS S3 (لحفظ الملفات - موصى به):

```
AWS_ACCESS_KEY_ID=your_access_key
```

```
AWS_SECRET_ACCESS_KEY=your_secret_key
```

```
AWS_DEFAULT_REGION=us-east-1
```

```
AWS_BUCKET=your-bucket-name
```

```
AWS_USE_PATH_STYLE_ENDPOINT=false
```

```
FILESYSTEM_DRIVER=s3
```

#### 7. Payment Gateways (إذا كنت تستخدمها):

```
STRIPE_KEY=your_stripe_key
```

```
STRIPE_SECRET=your_stripe_secret
```

```
PAYPAL_CLIENT_ID=your_paypal_client_id
```

```
PAYPAL_CLIENT_SECRET=your_paypal_secret
```

```
PAYPAL_MODE=live
```

```
RAZORPAY_KEY=your_razorpay_key
```

```
RAZORPAY_SECRET=your_razorpay_secret
```

#### 8. Firebase (إذا كنت تستخدمه):

```
FIREBASE_CREDENTIALS=your_firebase_credentials_json
```

#### 9. OpenAI (إذا كنت تستخدمه):

```
OPENAI_API_KEY=your_openai_key
```

---

### 📍 الخطوة 7: إعدادات متقدمة (Advanced Settings)

#### Build Command:
```
[اتركه فارغاً]
```
Dockerfile سيتولى البناء تلقائياً.

#### Start Command:
```
[اتركه فارغاً]
```
Dockerfile يحتوي على `CMD ["apache2-foreground"]`.

#### Health Check Path:
```
/
```

---

### 📍 الخطوة 8: النشر (Deploy)

1. راجع جميع الإعدادات
2. اضغط على **"Create Web Service"**
3. انتظر حتى ينتهي البناء (قد يستغرق 5-10 دقائق)
4. راقب Logs للتأكد من عدم وجود أخطاء

---

## 🔧 بعد النشر: خطوات إضافية

### 1. تشغيل Migrations

بعد النشر الناجح:

1. من Dashboard، اضغط على Web Service
2. اضغط على **"Shell"** (في القائمة الجانبية)
3. شغل الأوامر التالية:

```bash
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 2. إنشاء مستخدم Admin (إذا لزم الأمر)

```bash
php artisan tinker
```

ثم في Tinker:
```php
$user = new App\Models\User();
$user->name = 'Admin';
$user->email = 'admin@foodgo.com';
$user->password = Hash::make('your-secure-password');
$user->save();
```

### 3. اختبار الموقع

1. افتح الرابط: `https://your-service-name.onrender.com`
2. تأكد من أن الموقع يعمل
3. اختبر تسجيل الدخول والوظائف الأساسية

---

## ⚠️ حل المشاكل الشائعة

### 1. خطأ 500 Internal Server Error

**الحل:**
- تحقق من `APP_KEY` موجود وصحيح
- تحقق من متغيرات قاعدة البيانات
- تحقق من Logs في Render Dashboard

### 2. خطأ في الاتصال بقاعدة البيانات

**الحل:**
- تأكد من استخدام **Internal Database URL** من Render
- تحقق من أن Database و Web Service في نفس Region
- استخدم `pgsql` بدلاً من `mysql`

### 3. الموقع بطيء

**الحل:**
- ترقية Instance Type إلى Starter أو أعلى
- تفعيل Caching (الأوامر أعلاه)

### 4. الملفات المرفوعة لا تُحفظ

**الحل:**
- استخدم **S3** أو **Cloud Storage** لحفظ الملفات
- Render لا يدعم Persistent Storage في Free tier

---

## 🔗 ربط النطاق المخصص (Custom Domain)

بعد النشر الناجح:

1. من Web Service Dashboard، اضغط على **"Settings"**
2. ابحث عن **"Custom Domains"**
3. اضغط **"Add Custom Domain"**
4. أدخل النطاق الذي اشتريته (مثل: `foodgo-admin.com`)
5. اتبع التعليمات لإضافة DNS records

### DNS Records المطلوبة:

```
Type: CNAME
Name: @ (أو www)
Value: your-service-name.onrender.com
```

أو:

```
Type: A
Name: @
Value: [IP Address من Render]
```

---

## ✅ قائمة التحقق النهائية

قبل النشر:
- [ ] المشروع على GitHub
- [ ] Dockerfile موجود وصحيح
- [ ] .dockerignore موجود
- [ ] APP_KEY تم إنشاؤه
- [ ] جميع Environment Variables جاهزة

بعد النشر:
- [ ] Web Service يعمل
- [ ] قاعدة البيانات متصلة
- [ ] Migrations تم تشغيلها
- [ ] الموقع يعمل على HTTPS
- [ ] جميع الوظائف تعمل بشكل صحيح

---

## 📞 الدعم والمساعدة

- [Render Documentation](https://render.com/docs)
- [Render Community](https://community.render.com/)
- [Laravel on Render](https://render.com/docs/deploy-laravel)

---

**بالتوفيق! 🚀**

