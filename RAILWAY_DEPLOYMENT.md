# 🚂 دليل النشر على Railway.app

## ✅ الخطوات السريعة:

### 1. إعداد المشروع على Railway:
- اربط GitHub repository
- اختر "Deploy from GitHub repo"
- اختر المشروع والفرع (main/master)

### 2. إعداد Environment Variables:
في Railway Dashboard → Service → Variables، أضف:

```env
APP_NAME="Foodie Admin"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-service-name.up.railway.app
APP_KEY=base64:YOUR_APP_KEY_HERE

DB_CONNECTION=mysql
DB_HOST=your-db-host
DB_PORT=3306
DB_DATABASE=your-database
DB_USERNAME=your-username
DB_PASSWORD=your-password

# Firebase Configuration
FIREBASE_APIKEY=your-firebase-api-key
FIREBASE_AUTH_DOMAIN=your-firebase-auth-domain
FIREBASE_PROJECT_ID=your-firebase-project-id
FIREBASE_STORAGE_BUCKET=your-firebase-storage-bucket
FIREBASE_MESSAAGING_SENDER_ID=your-sender-id
FIREBASE_APP_ID=your-app-id
FIREBASE_MEASUREMENT_ID=your-measurement-id

# AWS S3 (إذا كنت تستخدمه)
AWS_ACCESS_KEY_ID=your-access-key
AWS_SECRET_ACCESS_KEY=your-secret-key
AWS_DEFAULT_REGION=your-region
AWS_BUCKET=your-bucket-name

# Payment Gateways (إذا كنت تستخدمها)
STRIPE_KEY=your-stripe-key
STRIPE_SECRET=your-stripe-secret
PAYPAL_CLIENT_ID=your-paypal-client-id
PAYPAL_CLIENT_SECRET=your-paypal-secret

# Session & Cache
SESSION_DRIVER=database
CACHE_DRIVER=file
QUEUE_CONNECTION=database
SESSION_LIFETIME=120
```

### 3. إعداد قاعدة البيانات:
- أنشئ MySQL أو PostgreSQL service في Railway
- اربطه مع service الرئيسي
- Railway سيعطي متغيرات DB_* تلقائياً

### 4. إعداد Firebase:
- ارفع `service-account.json` إلى Railway Volume أو استخدم Firebase Admin SDK مع environment variables

### 5. النشر:
- Railway سيبني المشروع تلقائياً من Dockerfile
- راقب Build Logs و Deploy Logs

## 🔧 ملاحظات مهمة:

1. **PORT**: Railway يمرر PORT تلقائياً - السكربت يتعامل معه
2. **APP_KEY**: إذا لم يكن موجوداً، السكربت سينشئه تلقائياً
3. **Storage**: تأكد من إعداد Volume لـ `storage/` إذا كنت تحتاج ملفات دائمة
4. **Logs**: تحقق من Deploy Logs في Railway Dashboard

## 🐛 حل المشاكل:

### التطبيق لا يستجيب:
1. تحقق من Deploy Logs
2. تأكد من أن Environment Variables موجودة
3. تحقق من أن قاعدة البيانات متصلة
4. تأكد من أن APP_KEY موجود

### خطأ 500:
1. تحقق من Laravel logs في Railway
2. تأكد من صلاحيات storage/
3. تحقق من .env variables

### مشكلة في PORT:
- السكربت يتعامل مع PORT تلقائياً
- إذا استمرت المشكلة، تحقق من Deploy Logs

