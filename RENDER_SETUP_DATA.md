# 📝 بيانات إعداد Render - للنسخ واللصق

## البيانات المطلوبة لملء نموذج Render

### 1️⃣ Source Code (الكود المصدري)
```
Repository: [اختر المستودع من GitHub]
Branch: main
```

### 2️⃣ Name (الاسم)
```
Foodie Admin Panel
```
أو أي اسم تفضله

### 3️⃣ Project (المشروع)
```
My project (أو أنشئ مشروع جديد)
Production
```

### 4️⃣ Language (اللغة) ⚠️ مهم
```
Docker
```
**اختر Docker** - هذا هو الخيار الصحيح لـ Laravel

### 5️⃣ Region (المنطقة)
اختر واحدة:
- `Frankfurt (EU Central)` - لأوروبا والشرق الأوسط
- `Oregon (US West)` - لأمريكا
- `Singapore (AP Southeast)` - لآسيا
- `Mumbai (AP South)` - للهند

### 6️⃣ Root Directory (المجلد الجذر)
```
[اتركه فارغاً]
```
أو إذا كان المشروع في مجلد فرعي:
```
Admin Panel
```

### 7️⃣ Dockerfile Path
```
Dockerfile
```

### 8️⃣ Instance Type (نوع الخادم)

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

### 9️⃣ Environment Variables (متغيرات البيئة)

انسخ هذه المتغيرات وأضفها في Render:

#### متغيرات أساسية:
```env
APP_NAME=Foodie Admin
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-service-name.onrender.com
LOG_CHANNEL=stack
LOG_LEVEL=error
```

#### APP_KEY (مهم جداً):
```env
APP_KEY=base64:YOUR_GENERATED_KEY_HERE
```
**كيف تحصل على APP_KEY:**
```bash
php artisan key:generate --show
```

#### قاعدة البيانات (PostgreSQL):
```env
DB_CONNECTION=pgsql
DB_HOST=dpg-xxxxx-a.frankfurt-postgres.render.com
DB_PORT=5432
DB_DATABASE=foodie_admin
DB_USERNAME=foodie_admin_user
DB_PASSWORD=your_password_here
```

**ملاحظة:** بعد إنشاء PostgreSQL Database على Render، انسخ البيانات من **Internal Database URL**

#### البريد الإلكتروني:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@yourdomain.com
MAIL_FROM_NAME=Foodie Admin
```

#### Payment Gateways (اختياري):
```env
STRIPE_KEY=your_stripe_key
STRIPE_SECRET=your_stripe_secret

PAYPAL_CLIENT_ID=your_paypal_client_id
PAYPAL_CLIENT_SECRET=your_paypal_secret
PAYPAL_MODE=live

RAZORPAY_KEY=your_razorpay_key
RAZORPAY_SECRET=your_razorpay_secret

PAYTM_MERCHANT_ID=your_paytm_merchant_id
PAYTM_MERCHANT_KEY=your_paytm_merchant_key

BRAINTREE_MERCHANT_ID=your_braintree_merchant_id
BRAINTREE_PUBLIC_KEY=your_braintree_public_key
BRAINTREE_PRIVATE_KEY=your_braintree_private_key
```

#### Firebase (إذا كنت تستخدمه):
```env
FIREBASE_CREDENTIALS=your_firebase_credentials_json
```

#### OpenAI (إذا كنت تستخدمه):
```env
OPENAI_API_KEY=your_openai_key
```

#### AWS S3 (لحفظ الملفات - موصى به):
```env
AWS_ACCESS_KEY_ID=your_access_key
AWS_SECRET_ACCESS_KEY=your_secret_key
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=your-bucket-name
AWS_USE_PATH_STYLE_ENDPOINT=false
FILESYSTEM_DRIVER=s3
```

#### Sessions & Cache:
```env
SESSION_DRIVER=database
CACHE_DRIVER=file
QUEUE_CONNECTION=database
SESSION_LIFETIME=120
```

### 🔟 Advanced Settings (إعدادات متقدمة)

#### Build Command:
```
[اتركه فارغاً]
```

#### Start Command:
```
[اتركه فارغاً]
```

#### Health Check Path:
```
/
```

---

## 📋 خطوات سريعة

1. ✅ **Source Code:** اختر المستودع
2. ✅ **Name:** `Foodie Admin Panel`
3. ✅ **Language:** `Docker` ⚠️
4. ✅ **Region:** اختر أقرب منطقة
5. ✅ **Instance Type:** `Starter` ($7/شهر)
6. ✅ **Dockerfile Path:** `Dockerfile`
7. ✅ **Environment Variables:** أضف جميع المتغيرات أعلاه
8. ✅ **اضغط "Create Web Service"**

---

## ⚠️ ملاحظات مهمة

1. **Dockerfile موجود:** تأكد من أن ملف `Dockerfile` موجود في جذر المشروع
2. **APP_KEY:** يجب إنشاؤه قبل النشر
3. **قاعدة البيانات:** أنشئ PostgreSQL Database أولاً ثم انسخ البيانات
4. **الملفات:** استخدم S3 لحفظ الملفات لأن Render لا يحفظها بشكل دائم
5. **المنطقة:** اختر نفس المنطقة لـ Web Service و Database

---

## 🎯 بعد النشر

1. انتظر حتى ينتهي البناء (5-10 دقائق)
2. افتح Shell من Render Dashboard
3. شغل:
```bash
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
```
4. اختبر الموقع

---

**بالتوفيق! 🚀**

