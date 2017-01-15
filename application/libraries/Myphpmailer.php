<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//date_default_timezone_set('Etc/UTC');
require 'phpmailer/PHPMailerAutoload.php';

class Myphpmailer extends PHPMailer {
	function __construct() {
		// Call parent constructor
		parent::__construct();

		//callback config from Codeigniter
		$CI =& get_instance();
	}
}
?>