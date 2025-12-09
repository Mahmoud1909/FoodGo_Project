# ✅ قائمة التحقق: إعداد Render.com

## 📋 قبل البدء

- [ ] المشروع موجود على GitHub
- [ ] Dockerfile موجود في جذر المشروع
- [ ] .dockerignore موجود
- [ ] APP_KEY تم إنشاؤه (شغل: `php artisan key:generate --show`)
- [ ] جميع التغييرات تم رفعها على GitHub

---

## 🌐 اختيار النطاق (Domain)

### اقتراحات أسماء نطاقات:

**اختر واحداً من:**
- [ ] `foodgo-admin.com`
- [ ] `foodgo-panel.com`
- [ ] `foodgo-dashboard.com`
- [ ] `admin-foodgo.com`
- [ ] `foodgo-hub.com`

**ملاحظة:** يمكنك شراء النطاق لاحقاً وربطه بـ Render.

---

## 🗄️ إنشاء قاعدة البيانات (قبل Web Service)

1. [ ] اذهب إلى Render Dashboard
2. [ ] اضغط **"New +"** → **"PostgreSQL"**
3. [ ] املأ البيانات:
   - **Name:** `foodgo-admin-db`
   - **Database:** `foodgo_admin`
   - **User:** `foodgo_admin_user`
   - **Plan:** `Starter` ($7/شهر) أو `Free`
   - **Region:** `Frankfurt (EU Central)`
4. [ ] انسخ بيانات الاتصال (Host, Database, Username, Password)

---

## 🚀 إنشاء Web Service

### الخطوة 1: Source Code
- [ ] اضغط **"New +"** → **"Web Service"**
- [ ] اختر المستودع (Repository) من GitHub
- [ ] اختر الفرع (Branch): `main`

### الخطوة 2: Basic Settings
- [ ] **Name:** `foodgo-admin-panel`
- [ ] **Project:** `My project` → `Production`

### الخطوة 3: Build Settings ⚠️ **مهم**
- [ ] **Language:** `Docker` ✅ **هذا هو الخيار الصحيح**
- [ ] **Region:** `Frankfurt (EU Central)`
- [ ] **Root Directory:** `[فارغ]`
- [ ] **Dockerfile Path:** `Dockerfile`

### الخطوة 4: Instance Type
- [ ] **Starter** ($7/شهر) ✅ موصى به
- [ ] أو **Free** (للاختبار فقط)

### الخطوة 5: Environment Variables

#### متغيرات أساسية:
- [ ] `APP_NAME=Foodie Admin`
- [ ] `APP_ENV=production`
- [ ] `APP_DEBUG=false`
- [ ] `APP_URL=https://foodgo-admin-panel.onrender.com`
- [ ] `APP_KEY=base64:base64:YnAD5MEYUBdEnjQ8LwlKU9F03nm5Qt9KMH//nhUM4CI=`
- [ ] `LOG_CHANNEL=stack`
- [ ] `LOG_LEVEL=error`

#### قاعدة البيانات:
- [ ] `DB_CONNECTION=pgsql`
- [ ] `DB_HOST=[من Render Database]`
- [ ] `DB_PORT=5432`
- [ ] `DB_DATABASE=[من Render Database]`
- [ ] `DB_USERNAME=[من Render Database]`
- [ ] `DB_PASSWORD=[من Render Database]`

#### Sessions & Cache:
- [ ] `SESSION_DRIVER=database`
- [ ] `CACHE_DRIVER=file`
- [ ] `QUEUE_CONNECTION=database`
- [ ] `SESSION_LIFETIME=120`

#### البريد الإلكتروني (اختياري):
- [ ] `MAIL_MAILER=smtp`
- [ ] `MAIL_HOST=smtp.gmail.com`
- [ ] `MAIL_PORT=587`
- [ ] `MAIL_USERNAME=[بريدك]`
- [ ] `MAIL_PASSWORD=[كلمة المرور]`
- [ ] `MAIL_ENCRYPTION=tls`
- [ ] `MAIL_FROM_ADDRESS=noreply@foodgo.com`
- [ ] `MAIL_FROM_NAME=Foodie Admin`

#### AWS S3 (موصى به):
- [ ] `AWS_ACCESS_KEY_ID=[مفتاحك]`
- [ ] `AWS_SECRET_ACCESS_KEY=[سرك]`
- [ ] `AWS_DEFAULT_REGION=us-east-1`
- [ ] `AWS_BUCKET=[اسم الـ bucket]`
- [ ] `AWS_USE_PATH_STYLE_ENDPOINT=false`
- [ ] `FILESYSTEM_DRIVER=s3`

### الخطوة 6: Advanced Settings
- [ ] **Build Command:** `[فارغ]`
- [ ] **Start Command:** `[فارغ]`
- [ ] **Health Check Path:** `/`

### الخطوة 7: النشر
- [ ] راجعت جميع الإعدادات
- [ ] اضغط **"Create Web Service"**
- [ ] انتظر حتى ينتهي البناء (5-10 دقائق)

---

## 🔧 بعد النشر

### 1. التحقق من النشر
- [ ] البناء نجح (Build succeeded)
- [ ] الموقع يعمل (افتح الرابط)

### 2. تشغيل Migrations
- [ ] افتح **Shell** من Render Dashboard
- [ ] شغل: `php artisan migrate --force`
- [ ] شغل: `php artisan config:cache`
- [ ] شغل: `php artisan route:cache`
- [ ] شغل: `php artisan view:cache`

### 3. اختبار الموقع
- [ ] الموقع يفتح بدون أخطاء
- [ ] تسجيل الدخول يعمل
- [ ] الوظائف الأساسية تعمل

---

## 🔗 ربط النطاق المخصص (اختياري)

- [ ] اشتريت النطاق
- [ ] من Web Service → **Settings** → **Custom Domains**
- [ ] أضفت النطاق
- [ ] حدثت DNS records
- [ ] النطاق يعمل مع HTTPS

---

## ⚠️ ملاحظات مهمة

1. ✅ **Docker** هو الخيار الصحيح للغة
2. ✅ **APP_KEY** يجب أن يكون موجوداً وصحيحاً
3. ✅ أنشئ **PostgreSQL Database** قبل Web Service
4. ✅ استخدم **S3** لحفظ الملفات (Render لا يحفظها)
5. ✅ **APP_DEBUG=false** في الإنتاج دائماً
6. ✅ اختر نفس **Region** لـ Database و Web Service

---

## 📚 ملفات المساعدة

- `RENDER_COMPLETE_GUIDE.md` - دليل شامل
- `RENDER_QUICK_REFERENCE.md` - مرجع سريع
- `RENDER_SETUP_DATA.md` - بيانات جاهزة للنسخ

---

**بالتوفيق! 🚀**

