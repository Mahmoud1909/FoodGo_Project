# 🔧 حل مشكلة قاعدة البيانات - دليل سريع

## ✅ ما تم إصلاحه تلقائياً:

1. ✅ تم تحديث ملف `.env` - قاعدة البيانات الآن `foodgo` بدلاً من `myproject`
2. ✅ تم تنظيف كاش Laravel
3. ✅ تم إنشاء سكربتات SQL و PowerShell جاهزة للاستخدام

---

## 🚀 الحل السريع (اختر طريقة واحدة):

### **الطريقة 1: استخدام سكربت PowerShell (الأسهل)**

```powershell
.\create_database.ps1
```

سيطلب منك كلمة مرور MySQL root، ثم ينشئ قاعدة البيانات تلقائياً.

---

### **الطريقة 2: تنفيذ SQL يدوياً**

1. افتح MySQL:
```bash
mysql -u root -p
```

2. انسخ والصق هذا الكود:

```sql
CREATE DATABASE IF NOT EXISTS foodgo CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER IF NOT EXISTS 'laravel'@'localhost' IDENTIFIED BY '123456';
GRANT ALL PRIVILEGES ON foodgo.* TO 'laravel'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

---

### **الطريقة 3: استخدام ملف SQL مباشرة**

```bash
mysql -u root -p < setup_database_quick.sql
```

---

## ✅ بعد إنشاء قاعدة البيانات:

### 1. شغّل Migrations:

```bash
php artisan migrate
```

### 2. اختبر الاتصال:

```bash
php test_db_connection.php
```

أو:

```bash
php artisan tinker
>>> DB::connection()->getPdo();
>>> exit
```

---

## 📋 الإعدادات الحالية في `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=foodgo
DB_USERNAME=laravel
DB_PASSWORD=123456
```

---

## ❓ إذا استمرت المشكلة:

1. **تأكد من أن MySQL يعمل:**
   ```bash
   # Windows
   Get-Service MySQL*
   
   # أو تحقق من Task Manager
   ```

2. **تحقق من وجود قاعدة البيانات:**
   ```sql
   mysql -u root -p
   SHOW DATABASES;
   ```

3. **تحقق من صلاحيات المستخدم:**
   ```sql
   SHOW GRANTS FOR 'laravel'@'localhost';
   ```

4. **إذا كان المستخدم موجوداً لكن بدون صلاحيات:**
   ```sql
   GRANT ALL PRIVILEGES ON foodgo.* TO 'laravel'@'localhost';
   FLUSH PRIVILEGES;
   ```

---

## 🎯 الملفات المتوفرة:

- `setup_database_quick.sql` - سكربت SQL سريع
- `setup_database.sql` - سكربت SQL مفصل
- `create_database.ps1` - سكربت PowerShell تلقائي
- `fix_database.ps1` - سكربت إصلاح شامل
- `test_db_connection.php` - اختبار الاتصال

---

**🎉 بعد تنفيذ الخطوات أعلاه، يجب أن يعمل التطبيق بشكل صحيح!**

