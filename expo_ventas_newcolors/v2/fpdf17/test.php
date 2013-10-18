<?php
require('fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('img/pleca.png',0,0,216,30);
    $this->Image('img/flower.png',0,0,80,30);
    // Arial bold 15
    // Move to the right
    // Title
    $this->SetFont('Arial','B',30);
    $this->Cell(110);
    $this->SetTextColor(255,255,255);
    $this->Cell(58,0,'new colors');
    $this->SetTextColor(80,80,80);
    $this->Cell(0,0,'shoes');
    $this->Ln(10);
    $this->SetFont('Arial','B',15);
    $this->SetTextColor(255,255,255);
    $this->Cell(109);
    $this->Cell(0,0,'Coleccion 2013, primavera - verano');
    
    // Line break
    $this->Ln(15);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
//	$this->Image('img/pleca.png',0,0,216,15);
    // Arial italic 8
    $this->SetFont('Arial','',8);
    // Page number
//    $this->Cell(0,0,'Pagina '.$this->PageNo().'/{nb}',0,0,'R');
    $this->Ln(7);
    $this->SetFont('Arial','B',9);
    $this->SetTextColor(236,115,43);
    $this->Cell(0,0,'Nudo de Cempoaltepec No. 1129, Guadalajara Jalisco - +52.33.3609.2232, 3609.4304 - lauraventasnc@hotmail.com - www.newcolors.mx',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF('P','mm','Letter');
$pdf->AliasNbPages();
$pdf->SetLeftMargin(6);
$pdf->SetRightMargin(6);
$pdf->AddPage();
$pdf->SetDrawColor(236,115,43);

$pdf->Image('img/MAHOMA-04-SUEDE-PARROT.gif',$pdf->GetX(),$pdf->GetY(),40,40);
$pdf->Image('img/MAHOMA-04-SUEDE-PUMPKIN.gif',$pdf->GetX() + (41 * 1),$pdf->GetY(),40,40);
$pdf->Image('img/MAHOMA-02-SUEDE-PARROT.gif',$pdf->GetX() + (41 * 2),$pdf->GetY(),40,40);
$pdf->Image('img/MAHOMA-02-SUEDE-DUSTY-ROSE.gif',$pdf->GetX() + (41 * 3),$pdf->GetY(),40,40);
$pdf->Image('img/MAHOMA-02-SUEDE-PUMPKIN.gif',$pdf->GetX() + (41 * 4),$pdf->GetY(),40,40);
$pdf->Ln(43);
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(80,80,80);
$pdf->Cell(40,0,'Mahoma 04',0,1,'R',false);
$pdf->Cell(81,0,'Mahoma 04',0,1,'R',false);
$pdf->Cell(122,0,'Mahoma 02',0,1,'R',false);
$pdf->Cell(163,0,'Mahoma 02',0,1,'R',false);
$pdf->Cell(204,0,'Mahoma 02',0,1,'R',false);
$pdf->Ln(4);
$pdf->Cell(40,0,'Suede Parrot',0,1,'R',false);
$pdf->Cell(81,0,'Suede Pumpkin',0,1,'R',false);
$pdf->Cell(122,0,'Suede Parrot',0,1,'R',false);
$pdf->Cell(163,0,'Suede Dusty Rose',0,1,'R',false);
$pdf->Cell(204,0,'Suede Pumpkin',0,1,'R',false);
$pdf->Ln(5);
$pdf->SetFont('Arial','',16);
$pdf->SetTextColor(236,115,43);
$pdf->Cell(0,10,'Mahoma','B',1,'R',false);

$pdf->Ln(10);

$pdf->Image('img/MALVINA-01-SINTETICO-CHAROL-MANDARINA.gif',$pdf->GetX(),$pdf->GetY(),40,40);
$pdf->Image('img/MALVINA-01-SINTETICO-CHAROL-BANANA.gif',$pdf->GetX() + (41 * 1),$pdf->GetY(),40,40);
$pdf->Ln(43);
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(80,80,80);
$pdf->Cell(40,0,'Malvina 01',0,1,'R',false);
$pdf->Cell(81,0,'Malvina 01',0,1,'R',false);
$pdf->Ln(4);
$pdf->Cell(40,0,'Sintetico Charol Mandarina',0,1,'R',false);
$pdf->Cell(81,0,'Sintetico Charol Banana',0,1,'R',false);
$pdf->Ln(5);
$pdf->SetFont('Arial','',16);
$pdf->SetTextColor(236,115,43);
$pdf->Cell(0,10,'Malvina','B',1,'R',false);

$pdf->Ln(10);

$pdf->Image('img/MELANI-17-DURAZNO-MARRONE.jpg',$pdf->GetX(),$pdf->GetY(),40,40);
$pdf->Image('img/MELANI-17-DURAZNO-AZUL-CLARO.jpg',$pdf->GetX() + (41 * 1),$pdf->GetY(),40,40);
$pdf->Image('img/MELANI-17-DURAZNO-MANTA.jpg',$pdf->GetX() + (41 * 2),$pdf->GetY(),40,40);
$pdf->Image('img/MELANI-17-NEW-LINO-NEGRO.jpg',$pdf->GetX() + (41 * 3),$pdf->GetY(),40,40);
$pdf->Ln(43);
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(80,80,80);
$pdf->Cell(40,0,'Melani 17',0,1,'R',false);
$pdf->Cell(81,0,'Melani 17',0,1,'R',false);
$pdf->Cell(122,0,'Melani 17',0,1,'R',false);
$pdf->Cell(163,0,'Melani 17',0,1,'R',false);
$pdf->Ln(4);
$pdf->Cell(40,0,'Durazno Marrone',0,1,'R',false);
$pdf->Cell(81,0,'Durazno Azul Claro',0,1,'R',false);
$pdf->Cell(122,0,'Durazno Manta',0,1,'R',false);
$pdf->Cell(163,0,'New Lino Negro',0,1,'R',false);
$pdf->Ln(5);
$pdf->SetFont('Arial','',16);
$pdf->SetTextColor(236,115,43);
$pdf->Cell(0,10,'Melani','B',1,'R',false);


/*for($i=1;$i<=100;$i++)
    $pdf->Cell(0,10,'Printing line number '.$i,0,1);*/
$pdf->Output();
?>