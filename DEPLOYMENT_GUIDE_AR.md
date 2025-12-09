# دليل استضافة مشروع Foodie Admin Panel

## 🌐 توصيات الدومينات (Domains)

### الدومينات المقترحة:

1. **للإدارة (Admin Panel):**
   - `foodie-admin.com`
   - `admin-foodie.com`
   - `foodie-management.com`
   - `myfoodie-admin.com`

2. **بدائل أخرى:**
   - `foodiecontrol.com`
   - `foodie-dashboard.com`
   - `foodiepanel.com`

### مواقع شراء الدومينات:
- **Namecheap** (موصى به - سهل الاستخدام)
- **GoDaddy** (شائع جداً)
- **Cloudflare Registrar** (أرخص وأكثر أماناً)
- **Google Domains** (بسيط وموثوق)

---

## 📋 متطلبات الاستضافة

### المتطلبات الأساسية:
- **PHP:** 8.1 أو أحدث
- **MySQL:** 5.7+ أو MariaDB 10.3+
- **Composer:** لأدارة الحزم
- **Node.js & NPM:** لبناء الواجهة الأمامية
- **SSL Certificate:** (HTTPS) - ضروري جداً
- **Web Server:** Apache أو Nginx

### الموارد المطلوبة:
- **RAM:** 512MB على الأقل (1GB موصى به)
- **Storage:** 2GB على الأقل
- **Bandwidth:** حسب عدد المستخدمين

---

## 🚀 خطوات تحضير المشروع للاستضافة

### 1. تحديث ملف `.env` للإنتاج

```env
APP_NAME="Foodie Admin"
APP_ENV=production
APP_KEY=base64:YOUR_GENERATED_KEY_HERE
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_db_username
DB_PASSWORD=your_secure_password

SESSION_DRIVER=database
CACHE_DRIVER=file
QUEUE_CONNECTION=database

MAIL_MAILER=smtp
MAIL_HOST=your_smtp_host
MAIL_PORT=587
MAIL_USERNAME=your_email
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@yourdomain.com
MAIL_FROM_NAME="${APP_NAME}"
```

### 2. إنشاء مفتاح التطبيق (APP_KEY)
```bash
php artisan key:generate
```

### 3. بناء الأصول (Assets)
```bash
npm install
npm run build
# أو
npm run production
```

### 4. تحديث التبعيات (Dependencies)
```bash
composer install --optimize-autoloader --no-dev
```

### 5. تحسين الأداء
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 6. إنشاء قاعدة البيانات
```bash
php artisan migrate --force
php artisan db:seed --force  # إذا كان لديك بيانات أولية
```

### 7. إعداد الصلاحيات
```bash
# على Linux/Unix
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

---

## 📦 خطوات الرفع على الاستضافة

### أ. اختيار مزود الاستضافة

#### خيارات موصى بها:

1. **DigitalOcean** (موصى به للمبتدئين)
   - سهل الإعداد
   - $6/شهر للخطة الأساسية
   - دعم ممتاز

2. **Linode** (جيد للأداء)
   - أداء عالي
   - $5/شهر

3. **Vultr** (مرن)
   - خيارات متعددة
   - $6/شهر

4. **AWS Lightsail** (موثوق)
   - من Amazon
   - $3.50/شهر للخطة الأساسية

5. **Shared Hosting** (للبداية)
   - **Hostinger** - $2.99/شهر
   - **A2 Hosting** - $2.99/شهر
   - **SiteGround** - $3.99/شهر

### ب. خطوات الرفع

#### الطريقة 1: استخدام Git (موصى به)

```bash
# على الخادم
git clone https://github.com/yourusername/your-repo.git
cd your-repo
composer install --optimize-autoloader --no-dev
cp .env.example .env
php artisan key:generate
# تحديث .env بالمعلومات الصحيحة
php artisan migrate --force
npm install && npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

#### الطريقة 2: رفع الملفات عبر FTP/SFTP

1. ضغط المشروع (استثناء `node_modules`, `.git`, `vendor`)
2. رفع الملفات عبر FileZilla أو أي عميل FTP
3. فك الضغط على الخادم
4. تنفيذ الأوامر أعلاه

### ج. إعداد Web Server

#### لـ Nginx:
```nginx
server {
    listen 80;
    listen [::]:80;
    server_name yourdomain.com www.yourdomain.com;
    root /path/to/your/project/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

#### لـ Apache (.htaccess موجود في public):
تأكد من تفعيل `mod_rewrite`

---

## 🔒 الأمان (Security)

### 1. تحديث `.env`:
- `APP_DEBUG=false`
- `APP_ENV=production`
- استخدام كلمات مرور قوية

### 2. SSL Certificate:
- استخدم **Let's Encrypt** (مجاني)
- أو اشتر شهادة من الاستضافة

### 3. حماية الملفات:
```bash
# لا ترفع هذه الملفات:
.env
.git/
node_modules/
vendor/ (يمكن رفعه أو تثبيته على الخادم)
```

---

## ✅ قائمة التحقق قبل الإطلاق (Checklist)

- [ ] تحديث `.env` بإعدادات الإنتاج
- [ ] `APP_DEBUG=false`
- [ ] `APP_ENV=production`
- [ ] إنشاء `APP_KEY`
- [ ] تحديث `APP_URL` بالدومين الصحيح
- [ ] إعداد قاعدة البيانات
- [ ] تشغيل `php artisan migrate`
- [ ] بناء الأصول (`npm run build`)
- [ ] `composer install --no-dev`
- [ ] تفعيل SSL (HTTPS)
- [ ] اختبار الموقع بالكامل
- [ ] إعداد النسخ الاحتياطي (Backup)
- [ ] إعداد المراقبة (Monitoring)

---

## 🔧 حل المشاكل الشائعة

### خطأ 500:
- تحقق من صلاحيات `storage` و `bootstrap/cache`
- تحقق من `APP_KEY`
- تحقق من سجلات الأخطاء: `storage/logs/laravel.log`

### مشاكل قاعدة البيانات:
- تحقق من بيانات الاتصال في `.env`
- تأكد من إنشاء قاعدة البيانات

### مشاكل الصلاحيات:
```bash
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

---

## 📞 الدعم

إذا واجهت أي مشاكل:
1. راجع سجلات Laravel: `storage/logs/laravel.log`
2. راجع سجلات الخادم
3. تأكد من متطلبات PHP والإضافات

---

## 🎯 ملخص سريع

1. **اشتري دومين** من Namecheap أو GoDaddy
2. **اختر استضافة** (DigitalOcean موصى به)
3. **حدث `.env`** بإعدادات الإنتاج
4. **ارفع الملفات** عبر Git أو FTP
5. **شغل الأوامر** (composer, npm, migrate)
6. **فعّل SSL** (HTTPS)
7. **اختبر الموقع**

**بالتوفيق! 🚀**

