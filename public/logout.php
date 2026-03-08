<?php
/*
|--------------------------------------------------------------------------
| LOGOUT SYSTEM
|--------------------------------------------------------------------------
| File ini digunakan untuk menghapus session user
| sehingga pengguna keluar dari sistem.
|
*/

session_start();

// Menghapus semua session
session_destroy();

// Mengarahkan kembali ke halaman cover
header("Location: cover.php");
exit;