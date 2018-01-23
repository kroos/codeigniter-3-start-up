<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use PHPMailer\PHPMailer\POP3;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//date_default_timezone_set('Etc/UTC');
// require 'phpmailer/PHPMailerAutoload.php';
require(dirname(__dir__, 2).'/vendor/autoload.php');

class Myphpmailer extends PHPMailer {
	function __construct() {
		// Call parent constructor
		parent::__construct();

		//callback config from Codeigniter
		$CI =& get_instance();
	}
}
?>