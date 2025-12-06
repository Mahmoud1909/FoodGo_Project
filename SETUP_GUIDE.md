# دليل إعداد المشروع - Foodie Admin Panel

## المتطلبات الأساسية

- ✅ PHP 8.1 أو أحدث (المثبت: PHP 8.3.26)
- ✅ Composer (المثبت: 2.9.2)
- ✅ MySQL 5.7+ أو MariaDB
- ✅ Node.js و npm (للموارد الأمامية - اختياري)

---

## الخطوات الأساسية لتشغيل المشروع

### 1️⃣ إنشاء قاعدة البيانات MySQL

#### الطريقة الأولى: باستخدام MySQL Command Line
```bash
mysql -u root -p
```

ثم في MySQL:
```sql
CREATE DATABASE myproject CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'laravel'@'localhost' IDENTIFIED BY '123456';
GRANT ALL PRIVILEGES ON myproject.* TO 'laravel'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

#### الطريقة الثانية: باستخدام phpMyAdmin
1. افتح phpMyAdmin (عادة: http://localhost/phpmyadmin)
2. اضغط على "New" لإنشاء قاعدة بيانات جديدة
3. اسم قاعدة البيانات: `myproject`
4. Collation: `utf8mb4_unicode_ci`
5. اضغط "Create"

#### الطريقة الثالثة: باستخدام MySQL Workbench
1. افتح MySQL Workbench
2. اتصال بـ MySQL Server
3. انقر بزر الماوس الأيمن على "Schemas" → "Create Schema"
4. اسم: `myproject`
5. Collation: `utf8mb4_unicode_ci`
6. اضغط "Apply"

---

### 2️⃣ التحقق من إعدادات ملف .env

تأكد من أن ملف `.env` يحتوي على الإعدادات التالية:

```env
APP_NAME=Foodie
APP_ENV=local
APP_KEY=base64:9wMwQDEBjAK5OVvehRlQhF5PE1dNk6xK3RRIUkcDyGA=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=myproject
DB_USERNAME=laravel
DB_PASSWORD=123456

FIREBASE_APIKEY=AIzaSyCkywqfrDAEwt_WpeaTQlb6WD72zT1agzk
FIREBASE_AUTH_DOMAIN=foodgo-e1252.firebaseapp.com
FIREBASE_PROJECT_ID=foodgo-e1252
FIREBASE_STORAGE_BUCKET=foodgo-e1252.firebasestorage.app
FIREBASE_MESSAAGING_SENDER_ID=173178681240
FIREBASE_APP_ID=1:173178681240:web:b869928633af6714a19ded
FIREBASE_MEASUREMENT_ID=G-1TBDGMF2YM
```

---

### 3️⃣ تثبيت/تحديث Dependencies

```bash
# الانتقال إلى مجلد المشروع
cd "D:\Important projects\Foodie_V8.8_Source_Code\New\Admin Panel - Restaurant Panel - Website Panel - Landing Panel\Admin Panel - Restaurant Panel - Website Panel - Landing Panel\Admin Panel"

# تثبيت PHP dependencies
php D:\composer.phar install

# أو إذا كان Composer مثبت بشكل عامي:
composer install
```

---

### 4️⃣ إنشاء Application Key (إذا لم يكن موجود)

```bash
php artisan key:generate
```

---

### 5️⃣ تشغيل Migrations (إنشاء الجداول)

```bash
php artisan migrate
```

إذا واجهت مشكلة، يمكنك إعادة تشغيل Migrations:
```bash
php artisan migrate:fresh
```

**تحذير:** `migrate:fresh` سيمحو جميع البيانات الموجودة!

---

### 6️⃣ إعداد الصلاحيات للمجلدات (مهم جداً)

#### على Windows:
```powershell
# إعطاء صلاحيات الكتابة لمجلدات التخزين
icacls "storage" /grant "Users:(OI)(CI)F" /T
icacls "bootstrap\cache" /grant "Users:(OI)(CI)F" /T
```

#### أو يدوياً:
- انقر بزر الماوس الأيمن على مجلد `storage`
- Properties → Security → Edit
- أضف صلاحيات "Full Control" للمستخدم الحالي
- كرر نفس الخطوة لمجلد `bootstrap/cache`

---

### 7️⃣ إنشاء ملف Service Account لـ Firebase (اختياري - لكن موصى به)

#### للحصول على Service Account JSON:

1. اذهب إلى [Firebase Console](https://console.firebase.google.com/)
2. اختر المشروع: `foodgo-e1252`
3. اضغط على ⚙️ (Settings) → Project Settings
4. اذهب إلى تبويب "Service Accounts"
5. اضغط على "Generate new private key"
6. احفظ الملف باسم `service-account.json`
7. انسخ الملف إلى: `storage/app/firebase/service-account.json`

**ملاحظة:** إذا لم تضيف Service Account، ستعمل بعض العمليات فقط (القراءة قد تعمل، لكن الكتابة قد تحتاج Service Account).

---

### 8️⃣ إعداد Firestore Rules في Firebase

1. اذهب إلى [Firebase Console](https://console.firebase.google.com/)
2. اختر المشروع: `foodgo-e1252`
3. اذهب إلى Firestore Database
4. اضغط على "Rules"
5. تأكد من أن القواعد تسمح بالعمليات المطلوبة:

```javascript
rules_version = '2';
service cloud.firestore {
  match /databases/{database}/documents {
    match /{document=**} {
      allow read, write: if request.auth != null;
      // أو للسماح للجميع (للتطوير فقط):
      // allow read, write: if true;
    }
  }
}
```

**تحذير:** القاعدة الثانية (`allow read, write: if true`) للاستخدام في التطوير فقط! لا تستخدمها في الإنتاج.

---

### 9️⃣ تشغيل المشروع

#### الطريقة الأولى: Laravel Development Server
```bash
php artisan serve
```

ثم افتح المتصفح على: `http://localhost:8000`

#### الطريقة الثانية: استخدام XAMPP/Laragon
1. انسخ المشروع إلى `htdocs` (XAMPP) أو `www` (Laragon)
2. افتح: `http://localhost/Admin Panel/public`

---

### 🔟 تثبيت Node Dependencies (إذا كان هناك frontend assets)

```bash
npm install
npm run dev
# أو
npm run build
```

---

## التحقق من أن كل شيء يعمل

### 1. التحقق من اتصال قاعدة البيانات:
```bash
php artisan tinker
```
ثم في Tinker:
```php
DB::connection()->getPdo();
// يجب أن يعيد معلومات الاتصال بدون أخطاء
```

### 2. التحقق من Firebase:
افتح المتصفح وانتقل إلى صفحة الإعدادات في المشروع، يجب أن تعمل Firebase بدون أخطاء في Console.

---

## حل المشاكل الشائعة

### ❌ خطأ: "SQLSTATE[HY000] [1045] Access denied"
**الحل:** تحقق من اسم المستخدم وكلمة المرور في `.env`

### ❌ خطأ: "SQLSTATE[HY000] [2002] No connection could be made"
**الحل:** تأكد من أن MySQL يعمل وأن `DB_HOST=127.0.0.1`

### ❌ خطأ: "Class 'Kreait\Firebase\Factory' not found"
**الحل:** قم بتشغيل `composer install` مرة أخرى

### ❌ خطأ: "Permission denied" في مجلد storage
**الحل:** راجع الخطوة 6️⃣ أعلاه

### ❌ خطأ: Firebase لا يعمل في المتصفح
**الحل:** 
- تحقق من أن Firebase Config صحيح في `.env`
- افتح Console في المتصفح (F12) وتحقق من الأخطاء
- تأكد من أن Firebase SDK محمل بشكل صحيح

---

## الخطوات السريعة (Quick Start)

إذا كنت تريد تشغيل المشروع بسرعة:

```bash
# 1. إنشاء قاعدة البيانات (من MySQL)
CREATE DATABASE myproject;

# 2. تثبيت Dependencies
php D:\composer.phar install

# 3. تشغيل Migrations
php artisan migrate

# 4. تشغيل المشروع
php artisan serve
```

---

## ملاحظات مهمة

1. **لا تنسى:** تأكد من أن MySQL يعمل قبل تشغيل المشروع
2. **الأمان:** لا ترفع ملف `.env` إلى Git
3. **Firebase:** Service Account مهم للعمليات الكتابية الكاملة
4. **الصلاحيات:** تأكد من صلاحيات الكتابة على `storage` و `bootstrap/cache`

---

## الدعم

إذا واجهت أي مشاكل، تحقق من:
- ملف `storage/logs/laravel.log` للأخطاء
- Console المتصفح (F12) لأخطاء JavaScript/Firebase
- MySQL logs لأخطاء قاعدة البيانات

---

**تم إنشاء هذا الدليل في:** {{ date('Y-m-d') }}
**إصدار المشروع:** Foodie V8.8


