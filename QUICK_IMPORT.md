# ⚡ استيراد Collections - دليل سريع

## 🚀 الخطوات السريعة

### 1. تثبيت Dependencies
```bash
npm install
```

### 2. إنشاء ملف credentials.json

#### من Firebase Console:
1. اذهب إلى [Firebase Console](https://console.firebase.google.com/)
2. اختر المشروع: **foodgo-e1252**
3. **Project Settings** → **Service Accounts**
4. اضغط **Generate New Private Key**
5. انسخ محتوى الملف إلى `credentials.json` في المجلد الرئيسي

### 3. تشغيل الاستيراد
```bash
node import-firestore.js
```

---

## ⚠️ تحذير

- ⚠️ **Backup البيانات الموجودة** قبل الاستيراد
- ⚠️ الملف كبير جداً (81K+ سطر) - قد يستغرق وقتاً طويلاً
- ⚠️ الـ script يستخدم `merge: true` - البيانات الموجودة ستُحدث

---

## 📋 Collections التي سيتم استيرادها

- `vendors` ⭐ (مهم لصفحة Restaurants)
- `users`
- `restaurant_orders`
- `vendor_products`
- `vendor_categories`
- `zone`
- `currencies`
- `subscription_plans`
- وغيرها...

---

## ✅ بعد الاستيراد

1. تحقق من Firebase Console → Firestore → Data
2. تأكد من وجود الـ Collections
3. جرب صفحة Restaurants - يجب أن تعمل الآن! 🎉

---

**للمزيد من التفاصيل**: راجع `IMPORT_COLLECTIONS_GUIDE.md`




## 🚀 الخطوات السريعة

### 1. تثبيت Dependencies
```bash
npm install
```

### 2. إنشاء ملف credentials.json

#### من Firebase Console:
1. اذهب إلى [Firebase Console](https://console.firebase.google.com/)
2. اختر المشروع: **foodgo-e1252**
3. **Project Settings** → **Service Accounts**
4. اضغط **Generate New Private Key**
5. انسخ محتوى الملف إلى `credentials.json` في المجلد الرئيسي

### 3. تشغيل الاستيراد
```bash
node import-firestore.js
```

---

## ⚠️ تحذير

- ⚠️ **Backup البيانات الموجودة** قبل الاستيراد
- ⚠️ الملف كبير جداً (81K+ سطر) - قد يستغرق وقتاً طويلاً
- ⚠️ الـ script يستخدم `merge: true` - البيانات الموجودة ستُحدث

---

## 📋 Collections التي سيتم استيرادها

- `vendors` ⭐ (مهم لصفحة Restaurants)
- `users`
- `restaurant_orders`
- `vendor_products`
- `vendor_categories`
- `zone`
- `currencies`
- `subscription_plans`
- وغيرها...

---

## ✅ بعد الاستيراد

1. تحقق من Firebase Console → Firestore → Data
2. تأكد من وجود الـ Collections
3. جرب صفحة Restaurants - يجب أن تعمل الآن! 🎉

---

**للمزيد من التفاصيل**: راجع `IMPORT_COLLECTIONS_GUIDE.md`














