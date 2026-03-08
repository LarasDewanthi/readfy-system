```
📚 Readify System

Readify adalah sistem manajemen perpustakaan berbasis web yang memungkinkan admin mengelola data buku, anggota, dan peminjaman secara mudah melalui dashboard terintegrasi.
Aplikasi ini dibangun menggunakan PHP dengan konsep Object Oriented Programming (OOP) serta menggunakan MySQL sebagai database untuk menyimpan data sistem.

📋 Daftar Isi
-Tentang Aplikasi
-Fitur Utama
-Teknologi yang Digunakan
-Cara Menjalankan
-Akun Demo
-Struktur Project
-Alur Penggunaan
-Aturan Sistem
-Struktur Database

📖 Tentang Aplikasi
Readify adalah sistem perpustakaan digital berbasis web yang dirancang untuk membantu pengelolaan perpustakaan secara lebih efisien.
Sistem ini memungkinkan admin untuk:

-Mengelola data buku
-Mengelola data anggota
-Mengelola peminjaman buku
-Membuat Laporan
-Melihat ringkasan statistik pada dashboard

Aplikasi ini menerapkan konsep Object Oriented Programming (OOP) seperti:
-Class
-Object
-Inheritance
-Encapsulation
Selain itu, sistem juga menggunakan session login untuk mengatur hak akses pengguna.

⭐ Fitur Utama
Fitur utama yang tersedia dalam sistem Readify antara lain:

1️⃣ Login Sistem
Admin harus login terlebih dahulu sebelum dapat mengakses dashboard sistem.

2️⃣ Dashboard
Menampilkan informasi statistik seperti:
-Total Books
-Total Members
-Total Loans
-Recent Loans

3️⃣ Manage Books
Admin dapat:
-Menambah buku
-Mengedit buku
-Menghapus buku
-Melihat daftar buku
-Membuat Laporan Buku

4️⃣ Manage Members
Admin dapat:
-Menambah anggota
-Mengedit anggota
-Menghapus anggota
-Melihat daftar anggota
-Membuat Laporan anggota

5️⃣ Manage Loans
Admin dapat:
-Mencatat peminjaman buku
-Mengatur tanggal pinjam
-Mengatur tanggal pengembalian
-Membuat Laporan peminjaman

6️⃣ Logout
User dapat keluar dari sistem dengan aman menggunakan fitur logout.

🛠 Teknologi yang Digunakan
Project ini dibangun menggunakan teknologi berikut:
Frontend
-HTML5
-CSS3
-Font Awesome (icon)

Backend
-PHP

Database
-MySQL

Konsep Pemrograman
-Object Oriented Programming (OOP)
-Session Authentication

▶️ Cara Menjalankan
Ikuti langkah berikut untuk menjalankan project:

1️⃣ Clone repository
git clone https://github.com/username/readify-library.git

2️⃣ Pindahkan ke folder server
Jika menggunakan XAMPP:
htdocs/readify

3️⃣ Import database
Buka phpMyAdmin lalu import file database:
database/readify.sql

4️⃣ Jalankan aplikasi
Buka browser:
http://localhost/readify

👤 Akun Demo
Gunakan akun berikut untuk mencoba sistem:

Email : admin@gmail.com
Password : admin123
Role : Admin

📂 Struktur Project
Struktur folder utama project:

LIBRARY/
│
├─ App/
│   ├─ Config/
│   │   ├─ Database.php      → Mengatur koneksi database menggunakan PDO
│   │   └─ book.sql          → File SQL untuk membuat tabel perpustakaan (struktur database)
│   │
│   ├─ Controllers/
│   │   ├─ BookController.php   → Controller untuk operasi CRUD buku
│   │   ├─ LoanController.php   → Controller untuk operasi CRUD pinjaman
│   │   └─ MemberController.php → Controller untuk operasi CRUD anggota
│   │
│   ├─ Interfaces/
│   │   └─ CrudInterface.php    → Interface standar CRUD (Create, Read, Update, Delete)
│   │
│   └─ Models/
│       ├─ Admin.php          → Model untuk data admin dan autentikasi
│       ├─ User.php           → Model user umum
│       └─ UserModel.php      → Model tambahan untuk manajemen data user/anggota
│
├─ public/
│   ├─ bookdata/              → Halaman CRUD buku
│   ├─ loans/                 → Halaman CRUD pinjaman
│   ├─ members/               → Halaman CRUD anggota
│   ├─ fpdf/                  → Library eksternal untuk export PDF
│   ├─ cover.php               → Halaman landing page / cover sistem
│   ├─ dashboard.php           → Halaman dashboard admin
│   ├─ login.php               → Halaman login
│   ├─ logout.php              → Proses logout
│   ├─ style.css               → File CSS untuk tampilan halaman


🔄 Alur Penggunaan
Alur penggunaan sistem:

1️⃣ User membuka halaman cover Readify
2️⃣ User menekan tombol Login
3️⃣ User memasukkan email dan password

4️⃣ Jika login berhasil:
Sistem menyimpan session user
User diarahkan ke dashboard

5️⃣ Dari dashboard user dapat:
Mengelola buku
Mengelola anggota
Mengelola peminjaman

6️⃣ User dapat keluar menggunakan Logout
⚙️ Aturan Sistem

Beberapa aturan dalam sistem:
-User harus login sebelum mengakses dashboard
-Hanya admin yang dapat mengelola data
-Data buku, anggota, dan peminjaman disimpan dalam database
-Sistem menggunakan session untuk autentikasi login

Struktur Database
Database utama yang digunakan:

Tabel users
+----+-------------+---------------------+-------------+---------+
| id | name        | email               | password    | role    |
+----+-------------+---------------------+-------------+---------+
| PK | varchar     | varchar             | varchar     | varchar |
+----+-------------+---------------------+-------------+---------+
Keterangan

-id → Primary Key
-name → Nama pengguna
-email → Email login
-password → Password yang sudah di-hash
-role → Hak akses (admin / user)

Tabel books
+----+----------------------+----------------------+-------------+
| id | title                | author               | stock       |
+----+----------------------+----------------------+-------------+
| PK | varchar              | varchar              | int         |
+----+----------------------+----------------------+-------------+
Keterangan

-id → Primary Key
-title → Judul buku
-author → Penulis buku
-stock → Stock buku

Tabel members
+----+----------------------+----------------------+-------------+
| id | name                 | phone                | email       |
+----+----------------------+----------------------+-------------+
| PK | varchar              | varchar              | varchar     |
+----+----------------------+----------------------+-------------+
Keterangan

-id → Primary Key
-name → Nama anggota
-phone → Telepon anggota
-email → Email anggota

Tabel loans
+----+-----------+---------+------------+-------------+
| id | member_id | book_id | loan_date  | return_date |
+----+-----------+---------+------------+-------------+
| PK | FK        | FK      | date       | date        |
+----+-----------+---------+------------+-------------+
Keterangan

-id → Primary Key
-member_id → Foreign Key dari tabel members
-book_id → Foreign Key dari tabel books
-loan_date → Tanggal peminjaman
-return_date → Tanggal pengembalian
```
