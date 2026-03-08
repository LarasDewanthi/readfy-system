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

// Proses tambah member
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->create([
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
    <h1>Add Member</h1>

    <div style="margin-bottom:20px;">
        <a href="index.php" class="btn back"><i class="fas fa-sign-out-alt"></i> Back</a>
    </div>

    <form method="POST" class="form-book">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="phone" placeholder="Phone" required>
        <button type="submit" class="btn add">Save Member</button>
    </form>
</div>