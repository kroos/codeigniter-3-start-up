<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MYF extends FPDF{
	// Page header
	function Header(){
		// Logo
		$this->Image(base_url().'images/logo.png',10,6,30);
		// Arial bold 15
		$this->SetFont('Arial','B',15);
		// Move to the right
		$this->Cell(80);
		// Title
		$this->Cell(30,10,'Title',1,0,'C');
		// Line break
		$this->Ln(20);
	}

	// Page footer
	function Footer(){
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Page number
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
}

$this->myfpdf = new MYF();
$this->myfpdf->AliasNbPages();	//page number
$this->myfpdf->AddPage();
$this->myfpdf->SetFont('Arial', '', 12);

for($i=0; $i<40; $i++) {
	$this->myfpdf->MultiCell(0, 5, $txt, 0, 'J');
}
$this->myfpdf->Output();

?>