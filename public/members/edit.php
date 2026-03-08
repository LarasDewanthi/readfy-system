<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit;
}

// Require interface + controller + database
require_once '../../App/Interfaces/CrudInterface.php';
require_once '../../App/Config/Database.php';
require_once '../../App/Controllers/MemberController.php';

use App\Controllers\MemberController;

$controller = new MemberController();

// Ambil data member berdasarkan ID
$id = $_GET['id'] ?? null;
$memberData = null;
if ($id) {
    $stmt = $controller->getById($id);
    $memberData = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Proses update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($id, [
        'name'  => $_POST['name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone']
    ]);

    header("Location: index.php");
    exit;
}
?>

<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<div class="container">
    <h1>Edit Member</h1>

    <div style="margin-bottom:20px;">
        <a href="index.php" class="btn back"><i class="fas fa-sign-out-alt"></i> Back</a>
    </div>

    <form method="POST" class="form-book">
        <input type="text" name="name" placeholder="Name" value="<?= $memberData['name'] ?? '' ?>" required>
        <input type="email" name="email" placeholder="Email" value="<?= $memberData['email'] ?? '' ?>" required>
        <input type="text" name="phone" placeholder="Phone" value="<?= $memberData['phone'] ?? '' ?>" required>
        <button type="submit" class="btn edit">Update Member</button>
    </form>
</div>