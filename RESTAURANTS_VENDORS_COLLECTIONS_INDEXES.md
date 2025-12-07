# Collections و Indexes المسؤولة عن Restaurants & Vendors

## 📋 Collections المتعلقة بـ Restaurants & Vendors

### 1. **vendors** (المطاعم/البائعون)
Collection رئيسي يحتوي على بيانات المطاعم والبائعين

### 2. **restaurant_orders** (طلبات المطاعم)
Collection يحتوي على طلبات المطاعم

### 3. **vendor_orders** (طلبات البائعين)
Collection يحتوي على طلبات البائعين

### 4. **vendor_products** (منتجات البائعين)
Collection يحتوي على منتجات/أطباق البائعين

### 5. **vendor_categories** (فئات البائعين)
Collection يحتوي على فئات/تصنيفات المطاعم

### 6. **favorite_restaurant** (المطاعم المفضلة)
Collection يحتوي على المطاعم المفضلة للمستخدمين

### 7. **chat_restaurant** (محادثات المطاعم)
Collection يحتوي على محادثات المطاعم

---

## 🔍 Indexes المتعلقة بـ Restaurants & Vendors

### 📌 Collection: **vendors**

#### Index 1:
- `categoryID` (ASCENDING)
- `createdAt` (ASCENDING)

#### Index 2:
- `categoryID` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 3:
- `categoryID` (ASCENDING)
- `g.geohash` (ASCENDING)

#### Index 4:
- `categoryID` (ASCENDING)
- `subscriptionExpiryDate` (ASCENDING)

#### Index 5:
- `categoryID` (ASCENDING)
- `zoneId` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 6:
- `categoryID` (ASCENDING)
- `zoneId` (ASCENDING)
- `subscriptionExpiryDate` (ASCENDING)

#### Index 7:
- `categoryID` (CONTAINS - Array)
- `zoneId` (ASCENDING)
- `g.geohash` (ASCENDING)

#### Index 8:
- `createdAt` (ASCENDING)
- `title` (ASCENDING)

#### Index 9:
- `enabledDiveInFuture` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 10:
- `enabledDiveInFuture` (ASCENDING)
- `g.geohash` (ASCENDING)

#### Index 11:
- `id` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 12:
- `title` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 13:
- `vendorID` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 14:
- `zoneId` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 15:
- `zoneId` (ASCENDING)
- `g.geohash` (ASCENDING)

#### Index 16:
- `zoneId` (ASCENDING)
- `subscriptionExpiryDate` (ASCENDING)

#### Index 17:
- `zoneId` (ASCENDING)
- `title` (ASCENDING)

---

### 📌 Collection: **restaurant_orders**

#### Index 1:
- `author.id` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 2:
- `authorID` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 3:
- `authorID` (ASCENDING)
- `createdAt` (DESCENDING)
- `driver.firstName` (ASCENDING)

#### Index 4:
- `authorID` (ASCENDING)
- `createdAt` (DESCENDING)
- `status` (ASCENDING)

#### Index 5:
- `authorID` (ASCENDING)
- `createdAt` (DESCENDING)
- `vendor.title` (ASCENDING)

#### Index 6:
- `authorID` (ASCENDING)
- `driverID` (ASCENDING)
- `status` (ASCENDING)
- `vendor.categoryID` (ASCENDING)
- `vendorID` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 7:
- `createdAt` (DESCENDING)
- `status` (ASCENDING)

#### Index 8:
- `createdAt` (DESCENDING)
- `vendor.title` (ASCENDING)

#### Index 9:
- `driverID` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 10:
- `driverID` (ASCENDING)
- `status` (ASCENDING)

#### Index 11:
- `driverID` (ASCENDING)
- `status` (ASCENDING)
- `vendor.categoryID` (ASCENDING)
- `vendorID` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 12:
- `id` (ASCENDING)
- `status` (ASCENDING)

#### Index 13:
- `order_type` (ASCENDING)
- `vendorID` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 14:
- `status` (ASCENDING)
- `createdAt` (ASCENDING)

#### Index 15:
- `status` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 16:
- `status` (ASCENDING)
- `orderAutoCancelAt` (ASCENDING)

#### Index 17:
- `status` (ASCENDING)
- `scheduleTime` (ASCENDING)

#### Index 18:
- `status` (ASCENDING)
- `vendor.author` (ASCENDING)

#### Index 19:
- `status` (ASCENDING)
- `vendor.author` (ASCENDING)
- `author.firstName` (ASCENDING)

#### Index 20:
- `status` (ASCENDING)
- `vendor.author` (ASCENDING)
- `author.lastName` (ASCENDING)

#### Index 21:
- `status` (ASCENDING)
- `vendor.author` (ASCENDING)
- `id` (ASCENDING)

#### Index 22:
- `status` (ASCENDING)
- `vendor.author` (ASCENDING)
- `Status` (ASCENDING)

#### Index 23:
- `status` (ASCENDING)
- `vendor.categoryID` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 24:
- `status` (ASCENDING)
- `vendor.categoryID` (ASCENDING)
- `vendorID` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 25:
- `status` (ASCENDING)
- `vendor.title` (ASCENDING)

#### Index 26:
- `status` (ASCENDING)
- `zoneId` (ASCENDING)
- `createdAt` (ASCENDING)

#### Index 27:
- `vendor.author` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 28:
- `vendor.author` (ASCENDING)
- `createdAt` (DESCENDING)
- `id` (ASCENDING)

#### Index 29:
- `vendor.author` (ASCENDING)
- `id` (ASCENDING)

#### Index 30:
- `vendor.author` (ASCENDING)
- `status` (ASCENDING)

#### Index 31:
- `vendorID` (ASCENDING)
- `author.firstName` (ASCENDING)

#### Index 32:
- `vendorID` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 33:
- `vendorID` (ASCENDING)
- `createdAt` (DESCENDING)
- `status` (ASCENDING)

#### Index 34:
- `vendorID` (ASCENDING)
- `driver.firstName` (ASCENDING)

#### Index 35:
- `vendorID` (ASCENDING)
- `status` (ASCENDING)

---

### 📌 Collection: **vendor_orders**

#### Index 1:
- `status` (ASCENDING)
- `vendorID` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 2:
- `vendor.author` (ASCENDING)
- `createdAt` (DESCENDING)

---

### 📌 Collection: **vendor_products**

#### Index 1:
- `categoryID` (ASCENDING)
- `name` (ASCENDING)

#### Index 2:
- `categoryID` (ASCENDING)
- `publish` (ASCENDING)
- `id` (ASCENDING)

#### Index 3:
- `categoryID` (ASCENDING)
- `publish` (ASCENDING)
- `takeawayOption` (ASCENDING)
- `id` (ASCENDING)

#### Index 4:
- `categoryID` (ASCENDING)
- `publish` (ASCENDING)
- `takeawayOption` (ASCENDING)
- `vendorID` (ASCENDING)
- `name` (ASCENDING)

#### Index 5:
- `categoryID` (ASCENDING)
- `publish` (ASCENDING)
- `vendorID` (ASCENDING)
- `name` (ASCENDING)

#### Index 6:
- `categoryID` (ASCENDING)
- `vendorID` (ASCENDING)
- `name` (ASCENDING)

#### Index 7:
- `id` (ASCENDING)
- `createdAt` (ASCENDING)

#### Index 8:
- `publish` (ASCENDING)
- `takeawayOption` (ASCENDING)
- `vendorID` (ASCENDING)
- `createdAt` (ASCENDING)

#### Index 9:
- `publish` (ASCENDING)
- `takeawayOption` (ASCENDING)
- `vendorID` (ASCENDING)
- `id` (ASCENDING)

#### Index 10:
- `publish` (ASCENDING)
- `takeawayOption` (ASCENDING)
- `vendorID` (ASCENDING)
- `name` (ASCENDING)

#### Index 11:
- `publish` (ASCENDING)
- `vendorID` (ASCENDING)
- `createdAt` (ASCENDING)

#### Index 12:
- `publish` (ASCENDING)
- `vendorID` (ASCENDING)
- `id` (ASCENDING)

#### Index 13:
- `vendorID` (ASCENDING)
- `categoryID` (ASCENDING)

#### Index 14:
- `vendorID` (ASCENDING)
- `createdAt` (ASCENDING)

#### Index 15:
- `vendorID` (ASCENDING)
- `name` (ASCENDING)

---

### 📌 Collection: **vendor_categories**

#### Index 1:
- `publish` (ASCENDING)
- `createdAt` (ASCENDING)

#### Index 2:
- `publish` (ASCENDING)
- `name` (ASCENDING)

#### Index 3:
- `publish` (ASCENDING)
- `title` (ASCENDING)

#### Index 4:
- `show_in_homepage` (ASCENDING)
- `id` (ASCENDING)

---

### 📌 Collection: **favorite_restaurant**

#### Index 1:
- `user_id` (ASCENDING)
- `expiresAt` (ASCENDING)

---

### 📌 Collection: **chat_restaurant**

#### Index 1:
- `customerId` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 2:
- `restaurantId` (ASCENDING)
- `createdAt` (DESCENDING)

---

## 🔑 Fields المهمة المستخدمة في Indexes

### Fields المتعلقة بـ Vendors:
- `vendorID` / `vendorId` - معرف البائع
- `categoryID` - معرف الفئة
- `zoneId` - معرف المنطقة
- `g.geohash` - Geohash للموقع الجغرافي
- `createdAt` - تاريخ الإنشاء
- `title` - العنوان
- `subscriptionExpiryDate` - تاريخ انتهاء الاشتراك
- `enabledDiveInFuture` - تفعيل Dine-in في المستقبل

### Fields المتعلقة بـ Restaurant Orders:
- `authorID` / `author.id` - معرف المستخدم/العميل
- `vendorID` - معرف البائع
- `driverID` - معرف السائق
- `status` - حالة الطلب
- `createdAt` - تاريخ الإنشاء
- `order_type` - نوع الطلب
- `vendor.author` - مؤلف البائع
- `vendor.title` - عنوان البائع
- `vendor.categoryID` - فئة البائع

### Fields المتعلقة بـ Vendor Products:
- `vendorID` - معرف البائع
- `categoryID` - معرف الفئة
- `publish` - حالة النشر
- `takeawayOption` - خيار Takeaway
- `name` - الاسم
- `id` - المعرف
- `createdAt` - تاريخ الإنشاء

---

## 📝 ملاحظات مهمة:

1. **vendors** Collection هو الأساس ويحتوي على بيانات المطاعم/البائعين
2. **restaurant_orders** و **vendor_orders** كلاهما يستخدمان لنفس الغرض (طلبات المطاعم)
3. معظم Indexes تعتمد على `vendorID` للربط بين البيانات
4. Indexes تستخدم `g.geohash` للبحث الجغرافي
5. Indexes متعددة للبحث حسب `status` و `createdAt` للطلبات
6. `categoryID` يستخدم بكثرة للتصنيف والبحث




## 📋 Collections المتعلقة بـ Restaurants & Vendors

### 1. **vendors** (المطاعم/البائعون)
Collection رئيسي يحتوي على بيانات المطاعم والبائعين

### 2. **restaurant_orders** (طلبات المطاعم)
Collection يحتوي على طلبات المطاعم

### 3. **vendor_orders** (طلبات البائعين)
Collection يحتوي على طلبات البائعين

### 4. **vendor_products** (منتجات البائعين)
Collection يحتوي على منتجات/أطباق البائعين

### 5. **vendor_categories** (فئات البائعين)
Collection يحتوي على فئات/تصنيفات المطاعم

### 6. **favorite_restaurant** (المطاعم المفضلة)
Collection يحتوي على المطاعم المفضلة للمستخدمين

### 7. **chat_restaurant** (محادثات المطاعم)
Collection يحتوي على محادثات المطاعم

---

## 🔍 Indexes المتعلقة بـ Restaurants & Vendors

### 📌 Collection: **vendors**

#### Index 1:
- `categoryID` (ASCENDING)
- `createdAt` (ASCENDING)

#### Index 2:
- `categoryID` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 3:
- `categoryID` (ASCENDING)
- `g.geohash` (ASCENDING)

#### Index 4:
- `categoryID` (ASCENDING)
- `subscriptionExpiryDate` (ASCENDING)

#### Index 5:
- `categoryID` (ASCENDING)
- `zoneId` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 6:
- `categoryID` (ASCENDING)
- `zoneId` (ASCENDING)
- `subscriptionExpiryDate` (ASCENDING)

#### Index 7:
- `categoryID` (CONTAINS - Array)
- `zoneId` (ASCENDING)
- `g.geohash` (ASCENDING)

#### Index 8:
- `createdAt` (ASCENDING)
- `title` (ASCENDING)

#### Index 9:
- `enabledDiveInFuture` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 10:
- `enabledDiveInFuture` (ASCENDING)
- `g.geohash` (ASCENDING)

#### Index 11:
- `id` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 12:
- `title` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 13:
- `vendorID` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 14:
- `zoneId` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 15:
- `zoneId` (ASCENDING)
- `g.geohash` (ASCENDING)

#### Index 16:
- `zoneId` (ASCENDING)
- `subscriptionExpiryDate` (ASCENDING)

#### Index 17:
- `zoneId` (ASCENDING)
- `title` (ASCENDING)

---

### 📌 Collection: **restaurant_orders**

#### Index 1:
- `author.id` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 2:
- `authorID` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 3:
- `authorID` (ASCENDING)
- `createdAt` (DESCENDING)
- `driver.firstName` (ASCENDING)

#### Index 4:
- `authorID` (ASCENDING)
- `createdAt` (DESCENDING)
- `status` (ASCENDING)

#### Index 5:
- `authorID` (ASCENDING)
- `createdAt` (DESCENDING)
- `vendor.title` (ASCENDING)

#### Index 6:
- `authorID` (ASCENDING)
- `driverID` (ASCENDING)
- `status` (ASCENDING)
- `vendor.categoryID` (ASCENDING)
- `vendorID` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 7:
- `createdAt` (DESCENDING)
- `status` (ASCENDING)

#### Index 8:
- `createdAt` (DESCENDING)
- `vendor.title` (ASCENDING)

#### Index 9:
- `driverID` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 10:
- `driverID` (ASCENDING)
- `status` (ASCENDING)

#### Index 11:
- `driverID` (ASCENDING)
- `status` (ASCENDING)
- `vendor.categoryID` (ASCENDING)
- `vendorID` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 12:
- `id` (ASCENDING)
- `status` (ASCENDING)

#### Index 13:
- `order_type` (ASCENDING)
- `vendorID` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 14:
- `status` (ASCENDING)
- `createdAt` (ASCENDING)

#### Index 15:
- `status` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 16:
- `status` (ASCENDING)
- `orderAutoCancelAt` (ASCENDING)

#### Index 17:
- `status` (ASCENDING)
- `scheduleTime` (ASCENDING)

#### Index 18:
- `status` (ASCENDING)
- `vendor.author` (ASCENDING)

#### Index 19:
- `status` (ASCENDING)
- `vendor.author` (ASCENDING)
- `author.firstName` (ASCENDING)

#### Index 20:
- `status` (ASCENDING)
- `vendor.author` (ASCENDING)
- `author.lastName` (ASCENDING)

#### Index 21:
- `status` (ASCENDING)
- `vendor.author` (ASCENDING)
- `id` (ASCENDING)

#### Index 22:
- `status` (ASCENDING)
- `vendor.author` (ASCENDING)
- `Status` (ASCENDING)

#### Index 23:
- `status` (ASCENDING)
- `vendor.categoryID` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 24:
- `status` (ASCENDING)
- `vendor.categoryID` (ASCENDING)
- `vendorID` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 25:
- `status` (ASCENDING)
- `vendor.title` (ASCENDING)

#### Index 26:
- `status` (ASCENDING)
- `zoneId` (ASCENDING)
- `createdAt` (ASCENDING)

#### Index 27:
- `vendor.author` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 28:
- `vendor.author` (ASCENDING)
- `createdAt` (DESCENDING)
- `id` (ASCENDING)

#### Index 29:
- `vendor.author` (ASCENDING)
- `id` (ASCENDING)

#### Index 30:
- `vendor.author` (ASCENDING)
- `status` (ASCENDING)

#### Index 31:
- `vendorID` (ASCENDING)
- `author.firstName` (ASCENDING)

#### Index 32:
- `vendorID` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 33:
- `vendorID` (ASCENDING)
- `createdAt` (DESCENDING)
- `status` (ASCENDING)

#### Index 34:
- `vendorID` (ASCENDING)
- `driver.firstName` (ASCENDING)

#### Index 35:
- `vendorID` (ASCENDING)
- `status` (ASCENDING)

---

### 📌 Collection: **vendor_orders**

#### Index 1:
- `status` (ASCENDING)
- `vendorID` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 2:
- `vendor.author` (ASCENDING)
- `createdAt` (DESCENDING)

---

### 📌 Collection: **vendor_products**

#### Index 1:
- `categoryID` (ASCENDING)
- `name` (ASCENDING)

#### Index 2:
- `categoryID` (ASCENDING)
- `publish` (ASCENDING)
- `id` (ASCENDING)

#### Index 3:
- `categoryID` (ASCENDING)
- `publish` (ASCENDING)
- `takeawayOption` (ASCENDING)
- `id` (ASCENDING)

#### Index 4:
- `categoryID` (ASCENDING)
- `publish` (ASCENDING)
- `takeawayOption` (ASCENDING)
- `vendorID` (ASCENDING)
- `name` (ASCENDING)

#### Index 5:
- `categoryID` (ASCENDING)
- `publish` (ASCENDING)
- `vendorID` (ASCENDING)
- `name` (ASCENDING)

#### Index 6:
- `categoryID` (ASCENDING)
- `vendorID` (ASCENDING)
- `name` (ASCENDING)

#### Index 7:
- `id` (ASCENDING)
- `createdAt` (ASCENDING)

#### Index 8:
- `publish` (ASCENDING)
- `takeawayOption` (ASCENDING)
- `vendorID` (ASCENDING)
- `createdAt` (ASCENDING)

#### Index 9:
- `publish` (ASCENDING)
- `takeawayOption` (ASCENDING)
- `vendorID` (ASCENDING)
- `id` (ASCENDING)

#### Index 10:
- `publish` (ASCENDING)
- `takeawayOption` (ASCENDING)
- `vendorID` (ASCENDING)
- `name` (ASCENDING)

#### Index 11:
- `publish` (ASCENDING)
- `vendorID` (ASCENDING)
- `createdAt` (ASCENDING)

#### Index 12:
- `publish` (ASCENDING)
- `vendorID` (ASCENDING)
- `id` (ASCENDING)

#### Index 13:
- `vendorID` (ASCENDING)
- `categoryID` (ASCENDING)

#### Index 14:
- `vendorID` (ASCENDING)
- `createdAt` (ASCENDING)

#### Index 15:
- `vendorID` (ASCENDING)
- `name` (ASCENDING)

---

### 📌 Collection: **vendor_categories**

#### Index 1:
- `publish` (ASCENDING)
- `createdAt` (ASCENDING)

#### Index 2:
- `publish` (ASCENDING)
- `name` (ASCENDING)

#### Index 3:
- `publish` (ASCENDING)
- `title` (ASCENDING)

#### Index 4:
- `show_in_homepage` (ASCENDING)
- `id` (ASCENDING)

---

### 📌 Collection: **favorite_restaurant**

#### Index 1:
- `user_id` (ASCENDING)
- `expiresAt` (ASCENDING)

---

### 📌 Collection: **chat_restaurant**

#### Index 1:
- `customerId` (ASCENDING)
- `createdAt` (DESCENDING)

#### Index 2:
- `restaurantId` (ASCENDING)
- `createdAt` (DESCENDING)

---

## 🔑 Fields المهمة المستخدمة في Indexes

### Fields المتعلقة بـ Vendors:
- `vendorID` / `vendorId` - معرف البائع
- `categoryID` - معرف الفئة
- `zoneId` - معرف المنطقة
- `g.geohash` - Geohash للموقع الجغرافي
- `createdAt` - تاريخ الإنشاء
- `title` - العنوان
- `subscriptionExpiryDate` - تاريخ انتهاء الاشتراك
- `enabledDiveInFuture` - تفعيل Dine-in في المستقبل

### Fields المتعلقة بـ Restaurant Orders:
- `authorID` / `author.id` - معرف المستخدم/العميل
- `vendorID` - معرف البائع
- `driverID` - معرف السائق
- `status` - حالة الطلب
- `createdAt` - تاريخ الإنشاء
- `order_type` - نوع الطلب
- `vendor.author` - مؤلف البائع
- `vendor.title` - عنوان البائع
- `vendor.categoryID` - فئة البائع

### Fields المتعلقة بـ Vendor Products:
- `vendorID` - معرف البائع
- `categoryID` - معرف الفئة
- `publish` - حالة النشر
- `takeawayOption` - خيار Takeaway
- `name` - الاسم
- `id` - المعرف
- `createdAt` - تاريخ الإنشاء

---

## 📝 ملاحظات مهمة:

1. **vendors** Collection هو الأساس ويحتوي على بيانات المطاعم/البائعين
2. **restaurant_orders** و **vendor_orders** كلاهما يستخدمان لنفس الغرض (طلبات المطاعم)
3. معظم Indexes تعتمد على `vendorID` للربط بين البيانات
4. Indexes تستخدم `g.geohash` للبحث الجغرافي
5. Indexes متعددة للبحث حسب `status` و `createdAt` للطلبات
6. `categoryID` يستخدم بكثرة للتصنيف والبحث


