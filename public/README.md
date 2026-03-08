Readify System 

1. Deskripsi Sistem
Readify System  merupakan aplikasi berbasis web yang digunakan untuk mengelola data perpustakaan secara 
digital. Sistem ini membantu admin dalam mengelola data buku, anggota perpustakaan, serta proses peminjaman 
buku secara lebih terstruktur dan efisien.
Dengan adanya sistem ini, proses pencatatan yang sebelumnya dilakukan secara manual dapat dilakukan 
secara otomatis melalui aplikasi sehingga memudahkan dalam pengelolaan data.
Sistem ini dikembangkan menggunakan bahasa pemrograman PHP dan menggunakan MySQL sebagai database 
untuk menyimpan data. Selain itu sistem juga menggunakan library eksternal seperti Font Awesome 
untuk menampilkan ikon pada tampilan antarmuka agar lebih menarik dan mudah dipahami oleh pengguna.

2. Tujuan Sistem
- Mempermudah pengelolaan data buku di perpustakaan.
- Mempermudah pencatatan data anggota perpustakaan.
- Mengelola proses peminjaman buku dengan lebih terstruktur.
- Mengurangi kesalahan pencatatan yang sering terjadi pada sistem manual.

3. Fitur Utama Sistem
Sistem ini memiliki beberapa fitur utama, yaitu:

    1. Login System
    Fitur login digunakan untuk membatasi akses ke dalam sistem sehingga hanya admin yang memiliki 
    akun yang dapat mengelola data perpustakaan.

    2. Dashboard
    Dashboard merupakan halaman utama setelah pengguna berhasil login ke dalam sistem.
    Informasi yang ditampilkan pada dashboard antara lain:
    Kelola data buku
    Kelola data anggota
    Kelola data peminjaman
    Recent loans (data peminjaman terbaru)

    3. Manajemen Data Buku
    Fitur ini digunakan untuk mengelola seluruh data buku yang tersedia dalam perpustakaan.
    Operasi yang tersedia pada fitur ini meliputi:
    Menambahkan data buku
    Mengedit data buku
    Menghapus data buku
    Melihat daftar buku

    Informasi yang disimpan dalam data buku antara lain:
    Id
    Judul buku
    Pengarang
    Stok buku

    4. Manajemen Data Member
    Fitur yang tersedia:
    Menambahkan data anggota
    Mengedit data anggota
    Menghapus data anggota
    Melihat daftar anggota

    Data anggota yang disimpan meliputi:
    Nama anggota
    Email
    Nomor telepon

    5. Manajemen Peminjaman Buku (Loans)
    Fitur ini digunakan untuk mencatat transaksi peminjaman buku oleh anggota.
    Fitur yang tersedia:
    Menambahkan data peminjaman
    Mengedit data peminjaman
    Menghapus data peminjaman
    Melihat daftar peminjaman

    Informasi yang dicatat pada peminjaman meliputi:
    Id
    Nama anggota
    Judul buku
    Tanggal peminjaman
    Tanggal pengembalian

4. Alur Sistem (System Flow)
Berikut adalah alur kerja sistem secara umum:
Admin membuka halaman login sistem.
Admin memasukkan username dan password.
Sistem melakukan verifikasi data login.
Jika login berhasil, admin akan diarahkan ke halaman dashboard.
Dari dashboard admin dapat mengakses menu: Books, Members, Loans
Admin dapat melakukan operasi CRUD (Create, Read, Update, Delete) pada masing-masing data.
Setiap perubahan data akan disimpan ke dalam database MySQL.


5. Struktur Sistem
Struktur program pada sistem ini terdiri dari beberapa bagian utama, yaitu:

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
│   └─ vidbu9.mp4              → Video latar belakang halaman cover