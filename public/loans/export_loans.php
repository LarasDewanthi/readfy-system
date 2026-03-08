<?php
require('../fpdf/fpdf.php');

$conn = mysqli_connect("localhost","root","","book");

if(!$conn){
    die("Database connection failed");
}

$query = "
SELECT loans.id, members.name AS member_name, books.title AS book_title,
loans.loan_date, loans.return_date
FROM loans
JOIN members ON loans.member_id = members.id
JOIN books ON loans.book_id = books.id
";

$result = mysqli_query($conn,$query);

if(!$result){
    die("SQL Error: " . mysqli_error($conn));
}

$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(280,10,'Loans Report',0,1,'C');

$pdf->SetFont('Arial','',10);
$pdf->Cell(280,7,'Generated: '.date("d-m-Y"),0,1,'R');

$pdf->Ln(5);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,10,'ID',1,0,'C');
$pdf->Cell(80,10,'Member',1,0,'C');
$pdf->Cell(100,10,'Book',1,0,'C');
$pdf->Cell(40,10,'Loan Date',1,0,'C');
$pdf->Cell(40,10,'Return Date',1,1,'C');

$pdf->SetFont('Arial','',10);

while($row = mysqli_fetch_assoc($result)){
    $pdf->Cell(20,10,$row['id'],1);
    $pdf->Cell(80,10,$row['member_name'],1);
    $pdf->Cell(100,10,$row['book_title'],1);
    $pdf->Cell(40,10,$row['loan_date'],1);
    $pdf->Cell(40,10,$row['return_date'],1);
    $pdf->Ln();
}

$pdf->Output();
?>