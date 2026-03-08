<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit;
}

// Require class + interface + controller
require_once '../../App/Interfaces/CrudInterface.php';
require_once '../../App/Config/Database.php';
require_once '../../App/Controllers/LoanController.php';

use App\Controllers\LoanController;

$controller = new LoanController();
$result = $controller->read();
?>

<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="container">
   
    <h1><i class="fa-regular fa-address-card"></i> Manage Loans</h1>

  <div class="table-header">

    <div>
        <a href="../dashboard.php" class="btn back">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="table-actions">
        <a href="create.php" class="btn add">
            <i class="fa-solid fa-plus"></i> Add Loan
        </a>

        <a href="export_loans.php" class="btn export">
            <i class="fa-solid fa-print"></i> Generate Laporan
        </a>
    </div>
    </div>

    <table class="table-books">
        <thead>
            <tr>
                <th>ID</th>
                <th>Member</th>
                <th>Book</th>
                <th>Loan Date</th>
                <th>Return Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->rowCount() > 0): ?>
                <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['member_name'] ?></td>
                        <td><?= $row['book_title'] ?></td>
                        <td><?= $row['loan_date'] ?></td>
                        <td><?= $row['return_date'] ?></td>
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
                <tr><td colspan="6">No Data Available</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>