<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// require_once('fpdf/Fpdf.php');
require(dirname(__dir__, 2).'/vendor/setasign/fpdf/fpdf.php');

class Myfpdf extends Fpdf {
	function __construct() {
		// Call parent constructor
		parent::__construct();

		//callback config from Codeigniter
		$CI =& get_instance();
	}
}
?>