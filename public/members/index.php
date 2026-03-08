<?php
session_start();

// Proteksi login
if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit;
}

// Require class
require_once '../../App/Interfaces/CrudInterface.php';
require_once '../../App/Config/Database.php';
require_once '../../App/Controllers/MemberController.php';

use App\Controllers\MemberController;

$controller = new MemberController();
$result = $controller->read();
?>

<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<div class="container">
    <h1><i class="fa-solid fa-users"></i> Members</h1>

      <div class="table-header">

    <div>
        <a href="../dashboard.php" class="btn back">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="table-actions">
        <a href="create.php" class="btn add">
            <i class="fa-solid fa-plus"></i> Add Member
        </a>

        <a href="export_members.php" class="btn export">
            <i class="fa-solid fa-print"></i> Generate Laporan
        </a>
    </div>
    </div>

    <table class="table-books">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($result && $result->rowCount() > 0): ?>
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['phone'] ?></td>
                   <td class="action-icons">

<a href="edit.php?id=<?= $row['id'] ?>" class="icon-box edit">
<i class="fa-solid fa-pen"></i>
</a>

<a href="delete.php?id=<?= $row['id'] ?>"
onclick="return confirm('Delete this data?')"
class="icon-box delete">
<i class="fa-solid fa-trash"></i>
</a>

</td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="5">No Data Available</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>