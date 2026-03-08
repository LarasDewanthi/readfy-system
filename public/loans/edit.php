<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit;
}

// Require
require_once '../../App/Interfaces/CrudInterface.php';
require_once '../../App/Config/Database.php';
require_once '../../App/Controllers/LoanController.php';

use App\Controllers\LoanController;
use App\Config\Database;

// Objek
$controller = new LoanController();
$database = new Database();
$conn = $database->connect();

// Ambil list buku & member
$books = $conn->query("SELECT id, title FROM books")->fetchAll(PDO::FETCH_ASSOC);
$members = $conn->query("SELECT id, name FROM members")->fetchAll(PDO::FETCH_ASSOC);

// Ambil data loan berdasarkan ID
$id = $_GET['id'] ?? null;
$loanData = null;
if ($id) {
    $stmt = $controller->getById($id);
    $loanData = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Proses POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($id, [
        'book_id'     => $_POST['book_id'],
        'member_id'   => $_POST['member_id'],
        'loan_date'   => $_POST['loan_date'],
        'return_date' => $_POST['return_date']
    ]);
    header("Location: index.php");
    exit;
}
?>

<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<div class="container">
    <h1>Edit Loan</h1>

    <div style="margin-bottom:20px;">
        <a href="index.php" class="btn back"><i class="fas fa-sign-out-alt"></i> Back</a>
    </div>

    <form method="POST" class="form-crud">
        <label>Book:</label>
        <select name="book_id" required>
            <?php foreach ($books as $book): ?>
                <option value="<?= $book['id'] ?>" <?= ($loanData['book_id'] ?? '') == $book['id'] ? 'selected' : '' ?>>
                    <?= $book['title'] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Member:</label>
        <select name="member_id" required>
            <?php foreach ($members as $member): ?>
                <option value="<?= $member['id'] ?>" <?= ($loanData['member_id'] ?? '') == $member['id'] ? 'selected' : '' ?>>
                    <?= $member['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Loan Date:</label>
        <input type="date" name="loan_date" value="<?= $loanData['loan_date'] ?? '' ?>" required>

        <label>Return Date:</label>
        <input type="date" name="return_date" value="<?= $loanData['return_date'] ?? '' ?>" required>

        <button type="submit" class="btn edit">Update Loan</button>
    </form>
</div>