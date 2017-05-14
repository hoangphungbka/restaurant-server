<?php

require_once(ROOT.DS.'src/Libraries/FPDF/fpdf.php');

$pdf = new FPDF('L', 'mm', 'A5');
$pdf->AddPage();
$pdf->SetFont('Times', 'BIU', 18);
$pdf->Cell(0, 10, iconv('utf-8', 'cp1258', 'HOA ĐON'), 0, 1, 'C');
$pdf->Ln();
// Header
$pdf->SetFont('Times', 'BI', 14);
$pdf->Cell(12, 10, 'STT', 1, 0, 'C');
$pdf->Cell(70, 10, 'Ten Mon', 1, 0, 'C');
$pdf->Cell(30, 10, 'So Luong', 1, 0, 'C');
$pdf->Cell(32, 10, 'Gia', 1, 0, 'C');
$pdf->Cell(37, 10, 'Thanh Tien', 1, 0, 'C');
$pdf->Ln();
// Data
$pdf->SetFont('Times', 'I', 14);
foreach ($orderDetails as $key => $orderDetail)
{
    $pdf->Cell(12, 10, $key + 1, 1, 0, 'C');
    $pdf->Cell(70, 10, iconv('utf-8', 'cp1258', $orderDetail['item_name']), 1);
    $pdf->Cell(30, 10, $orderDetail['quantity'], 1, 0, 'C');
    $pdf->Cell(32, 10, $orderDetail['item_price'], 1, 0, 'C');
    $pdf->Cell(37, 10, $orderDetail['amount'], 1, 0, 'C');
    $pdf->Ln();
}
$pdf->SetFont('Times', 'BI', 14);
$pdf->Cell(12, 10, '', 1);
$pdf->Cell(70, 10, '', 1);
$pdf->Cell(30, 10, '', 1);
$pdf->Cell(32, 10, '', 1);
$pdf->Cell(37, 10, 'Tong: '.$totalAmount, 1);
$pdf->Ln();
$pdf->Output();
