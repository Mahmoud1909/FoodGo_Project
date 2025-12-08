# ⚡ حل سريع للخطأ 500 - خطوات سريعة

## 🎯 الأسباب الأكثر شيوعاً (بترتيب الأولوية):

### 1. ملف `.env` مفقود ❌
**الحل:** أنشئ ملف `.env` على السيرفر وانسخ محتوى `.env.example` ثم عدّل البيانات

### 2. `APP_KEY` مفقود ❌
**الحل:** شغّل `php artisan key:generate`

### 3. مكتبات Composer غير مثبتة ❌
**الحل:** شغّل `composer install --no-dev`

### 4. صلاحيات Storage خاطئة ❌
**الحل:** شغّل `chmod -R 775 storage bootstrap/cache`

---

## 🚀 سكربت سريع (انسخ والصق في SSH):

```bash
# 1. انتقل لمجلد المشروع
cd /path/to/your/project

# 2. أنشئ ملف .env من المثال
cp .env.example .env

# 3. عدّل ملف .env (استخدم nano أو vi)
nano .env
# عدّل: APP_URL, DB_DATABASE, DB_USERNAME, DB_PASSWORD

# 4. أنشئ APP_KEY
php artisan key:generate

# 5. ثبت المكتبات
composer install --optimize-autoloader --no-dev

# 6. أصلح الصلاحيات
chmod -R 775 storage
chmod -R 775 bootstrap/cache

# 7. نظف الكاش
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# 8. أنشئ مجلد Firebase وارفع service-account.json
mkdir -p storage/app/firebase
# ثم ارفع service-account.json إلى storage/app/firebase/

# 9. تحقق من الإعداد
php artisan firebase:check
```

---

## 📝 ملاحظات مهمة:

1. **ملف `.env`** - يجب أن يكون موجوداً على السيرفر (لا يُرفع على GitHub)
2. **Service Account** - يجب رفعه يدوياً إلى `storage/app/firebase/service-account.json`
3. **قاعدة البيانات** - تأكد من إنشاء قاعدة البيانات وإضافة بيانات الاتصال في `.env`
4. **APP_URL** - يجب أن يكون مطابقاً لعنوان السيرفر الفعلي

---

## 🔍 إذا استمر الخطأ:

```bash
# شغّل وضع التصحيح مؤقتاً
# في .env: APP_DEBUG=true

# ثم تحقق من السجلات
tail -f storage/logs/laravel.log
```

---

**راجع `DEPLOYMENT_FIX_500_ERROR.md` للتفاصيل الكاملة**

