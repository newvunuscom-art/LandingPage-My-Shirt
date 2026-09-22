# WORAPHAT MOTO COLLECTION

Landing page สำหรับแบรนด์เสื้อผ้า พร้อมระบบสมัครสมาชิก/เข้าสู่ระบบด้วย PHP และ MySQL

## วิธีติดตั้งบน hosting

1. อัปโหลดไฟล์ทั้งหมดรวมโฟลเดอร์ `banner` และ `assets` ไปยัง `public_html` หรือ document root ของโดเมน
2. สร้างฐานข้อมูล MySQL แล้วนำเข้าไฟล์ [`database.sql`](./database.sql) ผ่าน phpMyAdmin
3. แก้ค่าฐานข้อมูลใน [`config.php`](./config.php) ให้ตรงกับ hosting:
   - `DB_HOST`
   - `DB_NAME`
   - `DB_USER`
   - `DB_PASS`
4. เปิดเว็บไซต์ผ่าน HTTPS เพื่อให้ session cookie ปลอดภัย

หน้าเนื้อหาและสินค้าอยู่ใน [`index.php`](./index.php) และสามารถแก้ข้อความ/รูปภาพได้โดยตรง ส่วนสไตล์อยู่ใน [`assets/css/style.css`](./assets/css/style.css)

## ข้อกำหนด

- PHP 7.4 ขึ้นไป (แนะนำ PHP 8.1+)
- PHP extensions: `PDO`, `pdo_mysql`, `mbstring`
- MySQL 5.7+ หรือ MariaDB 10.4+

ระบบใช้ `password_hash`, prepared statements, CSRF token และ session cookie ที่ตั้งค่า `HttpOnly`/`SameSite` ให้แล้ว
