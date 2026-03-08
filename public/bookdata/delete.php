<?php
session_start();

// 🔹 Proteksi halaman
if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit;
}

// 🔹 Require dependencies
require_once '../../App/Interfaces/CrudInterface.php';
require_once '../../App/Config/Database.php';
require_once '../../App/Controllers/BookController.php';

use App\Controllers\BookController;

// 🔹 Inisialisasi controller
$controller = new BookController();

// 🔹 Ambil ID buku dari URL
$id = $_GET['id'] ?? null;
if ($id) {
    // 🔹 Panggil method delete
    $controller->delete($id);
}

// 🔹 Redirect kembali ke daftar buku
header("Location: index.php");
exit;