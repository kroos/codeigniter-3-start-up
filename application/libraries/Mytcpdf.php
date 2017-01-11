<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('tcpdf/Tcpdf.php');

class Mytcpdf extends TCPDF {
	function __construct() {
		// Call parent constructor
		parent::__construct();

		//callback config from Codeigniter
		$CI =& get_instance();	}
}
?>