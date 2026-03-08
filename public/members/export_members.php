<?php
require('../fpdf/fpdf.php');

$conn = mysqli_connect("localhost","root","","book");

if(!$conn){
    die("Database connection failed");
}

$query = "SELECT * FROM members";


$result = mysqli_query($conn,$query);

if(!$result){
    die("SQL Error: " . mysqli_error($conn));
}

$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(280,10,'Members Report',0,1,'C');

$pdf->SetFont('Arial','',10);
$pdf->Cell(280,7,'Generated: '.date("d-m-Y"),0,1,'R');

$pdf->Ln(5);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,10,'ID',1);
$pdf->Cell(80,10,'Name',1);
$pdf->Cell(80,10,'Email',1);
$pdf->Cell(80,10,'Phone',1);
$pdf->Ln();

$result = mysqli_query($conn,"SELECT * FROM members");

$pdf->SetFont('Arial','',10);

while($row = mysqli_fetch_assoc($result)){
    $pdf->Cell(30,10,$row['id'],1);
    $pdf->Cell(80,10,$row['name'],1);
    $pdf->Cell(80,10,$row['email'],1);
    $pdf->Cell(80,10,$row['phone'],1);
    $pdf->Ln();
}

$pdf->Output();
?>