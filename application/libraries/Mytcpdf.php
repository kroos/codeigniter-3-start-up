<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('tcpdf/Tcpdf.php');

class Mytcpdf extends TCPDF {
	function __construct($orientation = PDF_PAGE_ORIENTATION, $unit = PDF_UNIT, $format = PDF_PAGE_FORMAT, $ntah1 = true, $encode = 'UTF-8', $ntah2 = false) {
		// Call parent constructor
		parent::__construct($orientation, $unit, $format, $ntah1, $encode, $ntah2);
	}

/*	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}*/
}
?>