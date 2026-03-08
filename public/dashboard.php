<?php
/*
|--------------------------------------------------------------------------
| DASHBOARD PAGE
|--------------------------------------------------------------------------
| Halaman utama setelah pengguna berhasil login.
| Menampilkan statistik data sistem perpustakaan:
| - total buku
| - total member
| - total peminjaman
|
*/

session_start();

// Proteksi login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

// Memanggil class database
require_once __DIR__ . '/../App/Config/Database.php';

// Membuat koneksi database
$database = new App\Config\Database();
$conn = $database->connect();

/*
|--------------------------------------------------------------------------
| MENGAMBIL DATA STATISTIK
|--------------------------------------------------------------------------
| Menghitung jumlah data dari setiap tabel
|
*/

$totalBooks   = $conn->query("SELECT COUNT(*) FROM books")->fetchColumn();
$totalMembers = $conn->query("SELECT COUNT(*) FROM members")->fetchColumn();
$totalLoans   = $conn->query("SELECT COUNT(*) FROM loans")->fetchColumn();

?>

<!DOCTYPE html>
<html lang="en">
<head>

<!-- pengaturan karakter dan tampilan responsive -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- judul halaman -->
<title>Readify Dashboard</title>

<!-- library icon dari fontawesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<style>

/* style dasar halaman */
body { 
margin:0; 
font-family: Arial, sans-serif; 
background:#f4f6f8; 
}
    
/* ================= NAVBAR ================= */

.navbar{
position:fixed;
top:0;
left:0;
width:100%;
height:60px;
background:#ffffff;
display:flex;
justify-content:space-between;
align-items:center;
padding:0 25px;
box-shadow:0 2px 10px rgba(0,0,0,0.1);
z-index:1000;
}

/* logo sistem */
.nav-left h2{
color:#007bff;
font-size:20px;
margin:0;
}

/* bagian kanan navbar (user + logout) */
.nav-right{
display:flex;
align-items:center;
padding: 90px;
gap:15px;
}

/* nama user */
.user{
font-weight:bold;
color:#333;
}

/* tombol logout */
.logout-btn{
background:#dc3545;
color:white;
padding:8px 12px;
border-radius:6px;
text-decoration:none;
}

/* efek hover logout */
.logout-btn:hover{
background:#b02a37;
}

/* ================= SIDEBAR ================= */

/* sidebar menu kiri */
.sidebar { 
width:225px; 
height:100vh; 
position:fixed; 
padding-top:70px;
background:linear-gradient(to bottom, #007bff, #a0c4ff); 
color:#fff; 
}

/* judul sidebar */
.sidebar h2 { 
text-align:center; 
margin-bottom:20px; 
}

/* menu sidebar */
.sidebar a { 
display:block; 
color:#fff; 
padding:15px 20px; 
text-decoration:none; 
transition:0.2s; 
}

/* hover menu */
.sidebar a:hover { 
background: rgba(255,255,255,0.2); 
border-radius:5px; 
}

/* ================= MAIN CONTENT ================= */

/* container utama */
.main { 
margin-left:220px;
margin-top:70px;
padding:30px;
}

/* dashboard utama */
.maindash { 
margin-left:220px; 
padding:57px;
}

/* judul halaman */
h1 { 
color: #000; 
margin-bottom:30px; 
}

/* ================= DASHBOARD CARDS ================= */

/* container card */
.cards { 
display:flex; 
gap:20px; 
flex-wrap:wrap; 
}

/* card statistik */
.card { 
flex:1; 
min-width:150px; 
padding:20px; 
border-radius:10px; 
color:#fff; 
text-align:center; 
font-weight:bold; 
box-shadow:0 4px 10px rgba(0,0,0,0.1); 
}

/* warna card */
.card.books { background:#4caf50; }       /* total buku */
.card.members { background:#ff9800; }     /* total anggota */
.card.loans { background:#9c27b0; }       /* total pinjaman */

/* judul card */
.card h2 { 
margin-bottom:10px; 
font-size:18px; 
}

/* angka statistik */
.card p { 
font-size:24px; 
margin:0; 
}

/* ================= TABEL DASHBOARD ================= */

.dashboard-section{
margin-top:55px;
}

/* judul tabel */
.dashboard-section h2{
margin-bottom:15px;
color:#333;
font-size:20px;
}

/* tabel */
.dashboard-section table{
width:100%;
border-collapse:collapse;
background:#fff;
border-radius:8px;
overflow:hidden;
box-shadow:0 4px 10px rgba(0,0,0,0.08);
}

/* header tabel */
.dashboard-section th{
background:#b1b1b1;
color:white;
padding:10px;
font-size:14px;
}

/* isi tabel */
.dashboard-section td{
padding:10px;
border:1px solid #ddd;
text-align:center;
font-size:14px;
}

/* efek hover baris tabel */
.dashboard-section tr:hover{
background:#f5faff;
}

</style>
</head>

<body>

<!-- ================= NAVBAR ================= -->

<div class="navbar">

    <!-- logo sistem -->
    <div class="nav-left">
        <h2><span>📚</span>  Readify Sistem</h2>
    </div>

    <!-- informasi user dan tombol logout -->
    <div class="nav-right">

        <!-- menampilkan nama user dari session -->
        <span class="user">
            <i class="fa-solid fa-user"></i> <?= $_SESSION['user']['name'] ?>
        </span>

        <!-- tombol logout -->
        <a href="logout.php" class="logout-btn">
            <i class="fa-solid fa-right-from-bracket"></i></a>

    </div>

</div>

<!-- ================= SIDEBAR MENU ================= -->

<div class="sidebar">

    <h2><i class="fa-solid fa-dashboard"></i> Dashboard</h2>

    <!-- menu manajemen buku -->
    <a href="bookdata/index.php"> 
        <i class="fa-solid fa-book"></i> Manage Books
    </a>

    <!-- menu manajemen anggota -->
    <a href="members/index.php">
        <i class="fa-solid fa-users"></i> Manage Members
    </a>

    <!-- menu manajemen peminjaman -->
    <a href="loans/index.php">
        <i class="fa-regular fa-address-card"></i> Manage Loans
    </a>

</div>

<!-- ================= MAIN DASHBOARD ================= -->

<div class="maindash">

    <!-- pesan selamat datang -->
    <h1>Welcome, <?= $_SESSION['user']['name'] ?></h1>

    <!-- statistik sistem -->
    <div class="cards">

        <!-- total buku -->
        <div class="card books">
            <h2><i class="fa-solid fa-book"></i> Total Books</h2>
            <p><?= $totalBooks ?></p>
        </div>

        <!-- total anggota -->
        <div class="card members">
            <h2><i class="fa-solid fa-users"></i> Total Members</h2>
            <p><?= $totalMembers ?></p>
        </div>

        <!-- total peminjaman -->
        <div class="card loans">
            <h2><i class="fa-regular fa-address-card"></i> Total Loans</h2>
            <p><?= $totalLoans ?></p>
        </div>

    </div>

<!-- ================= TABEL PINJAMAN TERBARU ================= -->

<div class="dashboard-section">

<h2>Recent Loans</h2>

<table class="table-books">

<tr>
<th>Member</th>
<th>Book</th>
<th>Loan Date</th>
<th>Return Date</th>
</tr>

<!-- data contoh peminjaman -->
<tr>
<td>Laras Dewanthi</td>
<td>Harry Potter and the Sorcerer's Stone</td>
<td>2026-03-01</td>
<td>2026-03-10</td>
</tr>

<tr>
<td>Made</td>
<td>Design Patterns</td>
<td>2026-03-02</td>
<td>2026-03-12</td>
</tr>

</table>

</div>
</div>

</body>
</html>