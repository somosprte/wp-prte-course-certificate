<?php
require_once('fpdf.php');

$course_name = "Curso Teste";
$student_name = "Pedro";

$pdf = new FPDF();
$pdf->AddPage('L');
$pdf->SetFont('Arial','B',16);
$pdf->SetXY(100, 90);
$pdf->Cell(0,0,$student_name);
$pdf->AddPage('L');
$pdf->Output('doc.pdf', 'I');