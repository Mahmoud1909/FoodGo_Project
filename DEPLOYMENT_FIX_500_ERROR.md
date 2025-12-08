# 🔧 حل مشكلة الخطأ 500 بعد الرفع على السيرفر

## ⚠️ الأسباب الشائعة للخطأ 500:

### 1️⃣ **ملف `.env` مفقود أو غير مكتمل**
هذا هو السبب الأكثر شيوعاً! ملف `.env` لا يُرفع على GitHub لأسباب أمنية.

### 2️⃣ **مفاتيح Laravel الأساسية مفقودة**
- `APP_KEY` - مطلوب لتشفير الجلسات
- `APP_ENV` - بيئة التشغيل
- `APP_DEBUG` - وضع التصحيح

### 3️⃣ **مكتبات Composer غير مثبتة**
مجلد `vendor/` لا يُرفع على GitHub، يجب تثبيته على السيرفر.

### 4️⃣ **مجلدات Storage بدون صلاحيات**
Laravel يحتاج صلاحيات كتابة على مجلدات `storage/` و `bootstrap/cache/`.

### 5️⃣ **إعدادات Firebase مفقودة**
مفاتيح Firebase وملف Service Account.

---

## ✅ الحل خطوة بخطوة:

### **الخطوة 1: إنشاء ملف `.env` على السيرفر**

اتصل بالسيرفر عبر SSH وأنشئ ملف `.env`:

```bash
cd /path/to/your/project
cp .env.example .env  # إذا كان موجود
# أو أنشئ ملف .env جديد
nano .env
```

**أضف هذا المحتوى الأساسي:**

```env
APP_NAME="Foodie Admin"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://minpanelapp.net

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

# Firebase Configuration
FIREBASE_APIKEY=AIzaSyCkywqfrDAEwt_WpeaTQlb6WD72zT1agzk
FIREBASE_AUTH_DOMAIN=foodgo-e1252.firebaseapp.com
FIREBASE_PROJECT_ID=foodgo-e1252
FIREBASE_STORAGE_BUCKET=foodgo-e1252.firebasestorage.app
FIREBASE_MESSAAGING_SENDER_ID=173178681240
FIREBASE_APP_ID=1:173178681240:web:b869928633af6714a19ded
FIREBASE_MEASUREMENT_ID=G-1TBDGMF2YM

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"
```

**⚠️ مهم جداً:** استبدل:
- `your_database` باسم قاعدة البيانات الحقيقية
- `your_username` و `your_password` ببيانات قاعدة البيانات
- `https://minpanelapp.net` بعنوان السيرفر الفعلي

---

### **الخطوة 2: إنشاء APP_KEY**

```bash
php artisan key:generate
```

هذا الأمر سيضيف `APP_KEY` تلقائياً لملف `.env`.

---

### **الخطوة 3: تثبيت مكتبات Composer**

```bash
composer install --optimize-autoloader --no-dev
```

إذا لم يكن Composer مثبتاً:
```bash
curl -sS https://getcomposer.org/installer | php
php composer.phar install --optimize-autoloader --no-dev
```

---

### **الخطوة 4: إعداد صلاحيات المجلدات**

```bash
# إعطاء صلاحيات الكتابة للمجلدات المطلوبة
chmod -R 775 storage
chmod -R 775 bootstrap/cache

# إذا كان السيرفر يستخدم www-data
chown -R www-data:www-data storage
chown -R www-data:www-data bootstrap/cache
```

---

### **الخطوة 5: رفع ملف Service Account لـ Firebase**

```bash
# أنشئ المجلد إذا لم يكن موجوداً
mkdir -p storage/app/firebase

# ارفع ملف service-account.json إلى:
# storage/app/firebase/service-account.json
```

**كيفية الحصول على الملف:**
1. اذهب إلى [Firebase Console](https://console.firebase.google.com/)
2. اختر مشروع `foodgo-e1252`
3. Project Settings → Service Accounts
4. Generate New Private Key
5. احفظ الملف كـ `service-account.json`
6. ارفعه إلى `storage/app/firebase/` على السيرفر

---

### **الخطوة 6: تنظيف الكاش**

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan optimize:clear
```

---

### **الخطوة 7: تحسين الأداء (اختياري)**

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

---

### **الخطوة 8: التحقق من الإعداد**

```bash
php artisan firebase:check
```

يجب أن ترى ✅ بجانب كل العناصر.

---

## 🔍 فحص سجلات الأخطاء

إذا استمر الخطأ، تحقق من السجلات:

```bash
# سجلات Laravel
tail -f storage/logs/laravel.log

# سجلات Apache/Nginx
tail -f /var/log/apache2/error.log
# أو
tail -f /var/log/nginx/error.log
```

---

## 📋 قائمة فحص سريعة

- [ ] ملف `.env` موجود ومكتمل
- [ ] `APP_KEY` موجود (تم إنشاؤه بـ `php artisan key:generate`)
- [ ] `composer install` تم تنفيذه
- [ ] صلاحيات `storage/` و `bootstrap/cache/` صحيحة (775)
- [ ] ملف `service-account.json` موجود في `storage/app/firebase/`
- [ ] جميع متغيرات Firebase موجودة في `.env`
- [ ] الكاش تم تنظيفه
- [ ] قاعدة البيانات متصلة وصحيحة

---

## 🚨 حلول سريعة إضافية

### إذا كان الخطأ متعلق بـ Firebase:

```bash
# تحقق من وجود الملف
ls -la storage/app/firebase/service-account.json

# تحقق من الصلاحيات
chmod 644 storage/app/firebase/service-account.json
```

### إذا كان الخطأ متعلق بقاعدة البيانات:

```bash
# تحقق من الاتصال
php artisan tinker
>>> DB::connection()->getPdo();
```

### إذا كان الخطأ متعلق بالذاكرة:

```bash
# زيادة الذاكرة في php.ini
memory_limit = 256M
```

---

## 📞 إذا استمرت المشكلة

1. فعّل وضع التصحيح مؤقتاً في `.env`:
   ```env
   APP_DEBUG=true
   ```
   **⚠️ لا تتركه مفعلاً في الإنتاج!**

2. تحقق من السجلات في `storage/logs/laravel.log`

3. تحقق من متطلبات PHP:
   ```bash
   php -v
   php -m  # لرؤية المكتبات المثبتة
   ```

---

## ✅ بعد حل المشكلة

1. عطّل وضع التصحيح:
   ```env
   APP_DEBUG=false
   ```

2. نظف الكاش مرة أخرى:
   ```bash
   php artisan optimize:clear
   php artisan optimize
   ```

3. تحقق من أن الموقع يعمل بشكل صحيح

---

**🎉 يجب أن يعمل الموقع الآن بدون أخطاء!**

