<?php
session_start();

// 🔹 Proteksi halaman: hanya user yang login bisa mengakses
if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit;
}

// 🔹 Require interface CRUD, konfigurasi database, dan controller
require_once '../../App/Interfaces/CrudInterface.php';
require_once '../../App/Config/Database.php';
require_once '../../App/Controllers/BookController.php';

use App\Controllers\BookController;

// 🔹 Inisialisasi controller Book
$controller = new BookController();

// 🔹 Jika form dikirim via POST, lakukan create book
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->create([
        'title' => $_POST['title'],
        'author'=> $_POST['author'],
        'stock' => $_POST['stock']
    ]);

    // 🔹 Simpan pesan sukses di session
    $_SESSION['success'] = "Book successfully added!";

    // 🔹 Redirect ke halaman daftar buku
    header("Location: index.php");
    exit;
}
?>

<!-- 🔹 Form HTML untuk menambahkan buku -->
<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<div class="container">
    <h1>Add Book</h1>
    
    <div style="margin-bottom:20px;">
        <a href="index.php" class="btn back"><i class="fas fa-sign-out-alt"></i> Back</a>
    </div>

    <form method="POST" class="form-book">
        <input type="text" name="title" placeholder="Book Title" required>
        <input type="text" name="author" placeholder="Author" required>
        <input type="number" name="stock" placeholder="Stock" required>
        <button type="submit" class="btn add">Save Book</button>
    </form>
</div>