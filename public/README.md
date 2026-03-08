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

    a. Login System
    Fitur login digunakan untuk membatasi akses ke dalam sistem sehingga hanya admin yang memiliki 
    akun yang dapat mengelola data perpustakaan.

    b. Dashboard
    Dashboard merupakan halaman utama setelah pengguna berhasil login ke dalam sistem.
    Informasi yang ditampilkan pada dashboard antara lain:
    - Kelola data buku
    - Kelola data anggota
    - Kelola data peminjaman
    - Recent loans (data peminjaman terbaru)

    c. Manajemen Data Buku
    Fitur ini digunakan untuk mengelola seluruh data buku yang tersedia dalam perpustakaan.
    Operasi yang tersedia pada fitur ini meliputi:
    - Menambahkan data buku
    - Mengedit data buku
    - Menghapus data buku
    = Melihat daftar buku

    Informasi yang disimpan dalam data buku antara lain:
    - Id
    - Judul buku
    - Pengarang
    - Stok buku

    d. Manajemen Data Member
    Fitur yang tersedia:
    - Menambahkan data anggota
    - Mengedit data anggota
    - Menghapus data anggota
    - Melihat daftar anggota

    Data anggota yang disimpan meliputi:
    - Nama anggota
    - Email
    - Nomor telepon

    e. Manajemen Peminjaman Buku (Loans)
    Fitur ini digunakan untuk mencatat transaksi peminjaman buku oleh anggota.
    Fitur yang tersedia:
    - Menambahkan data peminjaman
    - Mengedit data peminjaman
    - Menghapus data peminjaman
    - Melihat daftar peminjaman

    Informasi yang dicatat pada peminjaman meliputi:
    - Id
    - Nama anggota
    - Judul buku
    - Tanggal peminjaman
    - Tanggal pengembalian

5. Alur Sistem (System Flow)
Berikut adalah alur kerja sistem secara umum:
- Admin membuka halaman login sistem.
- Admin memasukkan username dan password.
- Sistem melakukan verifikasi data login.
- Jika login berhasil, admin akan diarahkan ke halaman dashboard.
- Dari dashboard admin dapat mengakses menu: Books, Members, Loans
- Admin dapat melakukan operasi CRUD (Create, Read, Update, Delete) pada masing-masing data.
- Setiap perubahan data akan disimpan ke dalam database MySQL.
