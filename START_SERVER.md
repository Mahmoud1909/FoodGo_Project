# كيفية تشغيل المشروع مع عرض اللوجز

## الطريقة 1: استخدام السكريبت البسيط

```bash
start-server-with-logs.bat
```

هذا السكريبت سيقوم بـ:
1. مسح جميع الكاشات (config, cache, view, route, optimize)
2. تشغيل السيرفر على المنفذ 8001
3. عرض اللوجز في نفس النافذة

## الطريقة 2: استخدام السكريبت مع نافذة منفصلة للوجز

```bash
start-server-with-detailed-logs.bat
```

هذا السكريبت سيقوم بـ:
1. مسح جميع الكاشات
2. فتح نافذة منفصلة لعرض Laravel logs
3. تشغيل السيرفر على المنفذ 8001

## الطريقة 3: يدوياً

### 1. مسح الكاشات:
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
php artisan optimize:clear
```

### 2. تشغيل السيرفر:
```bash
php artisan serve --host=127.0.0.1 --port=8001
```

### 3. عرض اللوجز (في نافذة منفصلة):
```powershell
Get-Content storage\logs\laravel.log -Wait -Tail 50
```

## عرض اللوجز في الوقت الفعلي:

### Windows PowerShell:
```powershell
Get-Content storage\logs\laravel.log -Wait -Tail 50
```

### Windows CMD:
```cmd
powershell -Command "Get-Content storage\logs\laravel.log -Wait -Tail 50"
```

### Linux/Mac:
```bash
tail -f storage/logs/laravel.log
```

## الوصول إلى التطبيق:

بعد تشغيل السيرفر، افتح المتصفح على:
```
http://127.0.0.1:8001
```

## ملاحظات:

1. **الكاشات**: يجب مسح الكاشات بعد أي تعديل على:
   - Configuration files
   - Routes
   - Views
   - Controllers

2. **اللوجز**: Laravel logs موجودة في:
   - `storage/logs/laravel.log`

3. **البورت**: إذا كان البورت 8001 مستخدماً، يمكن تغييره في السكريبت
