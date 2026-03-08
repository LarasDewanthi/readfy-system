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

// 🔹 Ambil data buku berdasarkan ID
$id = $_GET['id'] ?? null;
$bookData = null;
if ($id) {
    $stmt = $controller->getById($id);
    $bookData = $stmt->fetch(PDO::FETCH_ASSOC);
}

// 🔹 Proses update jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($id, [
        'title' => $_POST['title'],
        'author'=> $_POST['author'],
        'stock' => $_POST['stock']
    ]);
    header("Location: index.php");
    exit;
}
?>

<!-- 🔹 Form HTML untuk edit buku -->
<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<div class="container">
    <h1>Edit Book</h1>
    
    <div style="margin-bottom:20px;">
        <a href="index.php" class="btn back"><i class="fas fa-sign-out-alt"></i> Back</a>
    </div>

    <form method="POST" class="form-book">
        <input type="text" name="title" placeholder="Book Title" 
               value="<?= $bookData['title'] ?? '' ?>" required>
        <input type="text" name="author" placeholder="Author" 
               value="<?= $bookData['author'] ?? '' ?>" required>
        <input type="number" name="stock" placeholder="Stock" 
               value="<?= $bookData['stock'] ?? '' ?>" required>
        <button type="submit" class="btn edit">Update Book</button>
    </form>
</div>