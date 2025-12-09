# ⚡ مرجع سريع: ملء Render Dashboard

## 🎯 البيانات الأساسية (للنسخ واللصق)

### 1️⃣ Source Code
```
Repository: [اختر من القائمة]
Branch: main
```

### 2️⃣ Name
```
foodgo-admin-panel
```

### 3️⃣ Project
```
My project
Production
```

### 4️⃣ Language ⚠️ **مهم جداً**
```
Docker
```
**اختر Docker** - هذا هو الخيار الصحيح!

### 5️⃣ Region
```
Frankfurt (EU Central)
```
أو أي منطقة قريبة منك

### 6️⃣ Root Directory
```
[اتركه فارغاً]
```

### 7️⃣ Dockerfile Path
```
Dockerfile
```

### 8️⃣ Instance Type
```
Starter ($7/month)
```
أو `Free` للاختبار فقط

---

## 🔑 متغيرات البيئة الأساسية (Environment Variables)

### متغيرات إلزامية:

```
APP_NAME=Foodie Admin
APP_ENV=production
APP_DEBUG=false
APP_URL=https://foodgo-admin-panel.onrender.com
APP_KEY=base64:base64:YnAD5MEYUBdEnjQ8LwlKU9F03nm5Qt9KMH//nhUM4CI=
LOG_CHANNEL=stack
LOG_LEVEL=error
```

### قاعدة البيانات (PostgreSQL):

```
DB_CONNECTION=pgsql
DB_HOST=[من Render Database]
DB_PORT=5432
DB_DATABASE=[من Render Database]
DB_USERNAME=[من Render Database]
DB_PASSWORD=[من Render Database]
```

### Sessions & Cache:

```
SESSION_DRIVER=database
CACHE_DRIVER=file
QUEUE_CONNECTION=database
SESSION_LIFETIME=120
```

---

## 📋 خطوات سريعة

1. ✅ **New +** → **Web Service**
2. ✅ اختر **Repository**
3. ✅ **Name:** `foodgo-admin-panel`
4. ✅ **Language:** `Docker` ⚠️
5. ✅ **Region:** `Frankfurt`
6. ✅ **Dockerfile Path:** `Dockerfile`
7. ✅ **Instance Type:** `Starter`
8. ✅ أضف **Environment Variables**
9. ✅ **Create Web Service**

---

## ⚠️ ملاحظات مهمة

- ✅ **Docker** هو الخيار الصحيح للغة
- ✅ **APP_KEY** يجب أن يكون موجوداً
- ✅ أنشئ **PostgreSQL Database** أولاً
- ✅ استخدم **S3** لحفظ الملفات
- ✅ **APP_DEBUG=false** في الإنتاج

---

## 🔧 بعد النشر

```bash
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

**بالتوفيق! 🚀**

