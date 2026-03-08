<?php
session_start();

// Proteksi login
if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit;
}

// Autoload
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/../../App/'; 
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) return;
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) require $file;
});

use App\Controllers\BookController;

$controller = new BookController();
$result = $controller->read();
?>

<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<div class="container">
    <h1><i class="fa-solid fa-book"></i> Books Data</h1>

    <div class="table-header">

    <div>
        <a href="../dashboard.php" class="btn back">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="table-actions">
        <a href="create.php" class="btn add">
            <i class="fa-solid fa-plus"></i> Add Book
        </a>

        <a href="export_books.php" class="btn export">
            <i class="fa-solid fa-print"></i> Generate Laporan
        </a>
    </div>

</div>

    <table class="table-books">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($result && $result->rowCount() > 0): ?>

            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['title'] ?></td>
                    <td><?= $row['author'] ?></td>
                    <td><?= $row['stock'] ?></td>
                   <td class="action-icons">
                    <a href="edit.php?id=<?= $row['id'] ?>" class="icon-box edit">
                        <i class="fa-solid fa-pen"></i></a>
                        <a href="delete.php?id=<?= $row['id'] ?>" 
                        onclick="return confirm('Delete this data?')"
                        class="icon-box delete">
                        <i class="fa-solid fa-trash"></i></a>

</td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="5">No Data Available</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>