<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'logo_example.jpg';
        $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
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

// create new PDF document
$this->mytcpdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$this->mytcpdf->SetCreator(PDF_CREATOR);
$this->mytcpdf->SetAuthor('Nicola Asuni');
$this->mytcpdf->SetTitle('TCPDF Example 003');
$this->mytcpdf->SetSubject('TCPDF Tutorial');
$this->mytcpdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$this->mytcpdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$this->mytcpdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$this->mytcpdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$this->mytcpdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$this->mytcpdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$this->mytcpdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$this->mytcpdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$this->mytcpdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$this->mytcpdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $this->mytcpdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$this->mytcpdf->SetFont('times', 'BI', 12);

// add a page
$this->mytcpdf->AddPage();

for ($i = 0; $i <= 40; $i++) {
	// print a block of text using Write()
	$this->mytcpdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

}

// ---------------------------------------------------------

//Close and output PDF document
$this->mytcpdf->Output('example_003.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

?>