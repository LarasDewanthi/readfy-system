<?php
require('../fpdf/fpdf.php');
require_once '../../App/Config/Database.php';

use App\Config\Database;

// 🔹 Koneksi database
$database = new Database();
$conn = $database->connect();

// 🔹 Ambil semua data buku
$query = $conn->query("SELECT * FROM books");

// 🔹 Inisialisasi PDF
$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();

// 🔹 Header PDF
$pdf->SetFont('Arial','B',16);
$pdf->Cell(280,10,'Books Report',0,1,'C');

// 🔹 Tanggal generate PDF
$pdf->SetFont('Arial','',10);
$pdf->Cell(280,7,'Generated: '.date("d-m-Y"),0,1,'R');

$pdf->Ln(5);

// 🔹 Tabel header
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30,10,'ID',1);
$pdf->Cell(110,10,'Title',1);
$pdf->Cell(110,10,'Author',1);
$pdf->Cell(30,10,'Stock',1);
$pdf->Ln();

// 🔹 Data tabel
$pdf->SetFont('Arial','',12);
while($row = $query->fetch(PDO::FETCH_ASSOC)){
    $pdf->Cell(30,10,$row['id'],1);
    $pdf->Cell(110,10,$row['title'],1);
    $pdf->Cell(110,10,$row['author'],1);
    $pdf->Cell(30,10,$row['stock'],1);
    $pdf->Ln();
}

// 🔹 Output PDF
$pdf->Output();