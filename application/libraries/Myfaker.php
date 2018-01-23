<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// require_once('faker/autoload.php');
require(dirname(__dir__, 2).'/vendor/autoload.php');

class Myfaker {
	function __construct() {
		//parent::__construct();

		//callback config from Codeigniter
		$CI =& get_instance();
	}
}
?>