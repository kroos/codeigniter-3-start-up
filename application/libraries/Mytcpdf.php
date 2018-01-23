<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// require_once('tcpdf/Tcpdf.php');
require(dirname(__dir__, 2).'/vendor/laurentbrieu/tcpdf/src/TCPDF/TCPDF.php');
// vendor\laurentbrieu\tcpdf\src\TCPDF

class Mytcpdf extends TCPDF {
	function __construct() {
		// Call parent constructor
		parent::__construct();

		//callback config from Codeigniter
		$CI =& get_instance();	}
}
?>