<?php
require_once('fpdf.php');


$pdf = new FPDF();
$pdf->AddPage('L');
$pdf->SetFont('Arial','B',16);
$pdf->SetXY(100, 90);
$pdf->Cell(0,0,'Pedrro');
$pdf->AddPage('L');
$pdf->Output('doc.pdf', 'I');