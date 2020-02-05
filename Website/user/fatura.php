<?php
include('../server.php');
require('fpdf/fpdf.php');
require('fpdf_barcode.php');

$pdf = new PDF_BARCODE('L','mm','A5');
date_default_timezone_set("America/New_York");//
 
$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130	,5,'PARABELLUM.CO',0,0);
$pdf->Cell(59	,5,'PAYMENT BILL',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130	,5,'Albania',0,0);
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(130	,5,'Tirana',0,0);
$pdf->Cell(25	,5,'Date',0,0);
$pdf->Cell(34	,5, date("d-m-Y"),0,1);//end of line

$pdf->Cell(130	,5,'Phone [+355 1111111]',0,0);
$pdf->Cell(25	,5,'Bill ID',0,0);
$pdf->Cell(34	,5, rand(100000,999999),0,1);//end of line

$pdf->Cell(130	,5,'Fax [+355 1111111]',0,0);
$pdf->Cell(25	,5, 'Client ID',0,0);
$pdf->Cell(34	,5,$_SESSION['data']['id'],0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//billing address
$pdf->Cell(100	,5,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$_SESSION['data']['name'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$_SESSION['data']['address'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$_SESSION['data']['date_birth'],0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130	,5,'Description',1,0);
$pdf->Cell(25	,5,'Taxable',1,0);
$pdf->Cell(34	,5,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(130	,5,'Parabellum',1,0);
$pdf->Cell(25	,5,'-',1,0);
$pdf->Cell(34	,5,'29.99$',1,1,'R');//end of line

//summary
$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Subtotal',0,0);
$pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,'29.99$',1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Taxable',0,0);
$pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,'2.999$',1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Tax Rate',0,0);
$pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,'10%',1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Total Due',0,0);
$pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,'32.989$',1,1,'R');//end of line

$pdf->EAN13(141,36,rand(100000000000,999999999999),5,0.35,9);

$pdf->Output();
?>
