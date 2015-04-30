<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('tcpdf/Tcpdf.php');

class Mytcpdf extends TCPDF {
	function __construct($orientation = PDF_PAGE_ORIENTATION, $unit = PDF_UNIT, $format = PDF_PAGE_FORMAT, $ntah1 = true, $encode = 'UTF-8', $ntah2 = false) {
		// Call parent constructor
		parent::__construct($orientation, $unit, $format, $ntah1, $encode, $ntah2);
	}

	//Page header
	public function Header() {
		$CI =& get_instance();
		// Logo
		$image_file = K_PATH_IMAGES.'logo_example.jpg';

		$this->Image($image_file, 10, 10, 100, 48, 'JPG', '', 'M', TRUE, 300, '', FALSE, FALSE, 0, false, false, false);
		// Set font
		$this->SetFont('helvetica', 'B', 20);
		// Title
		//$this->SetY(15);
		$this->Cell(0, 15, $CI->config->item('tcpdftitle'), '', 2, 'C', FALSE, '', 0, false, 'M', 'C');
		$this->SetFont('helvetica', '', 10);
		$this->Cell(0, 15, $CI->config->item('tcpdftitlecompany'), '', 2, 'C', FALSE, '', 0, false, 'M', 'C');
		//$this->GetY();
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}
?>