<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

date_default_timezone_set('Etc/UTC');
require 'phpmailer/PHPMailerAutoload.php';

class Myphpmailer extends PHPMailer {
	function __construct() {
		// Call parent constructor
		parent::__construct();

		//callback config from Codeigniter
		$CI =& get_instance();

		$this->IsSMTP();
		$this->SMTPAuth = TRUE;									//Set the encryption system to use - ssl (deprecated) or tls
		$this->SMTPSecure = $CI->config->item('smtp_secure');	//tls or ssl (deprecated)
		$this->Host = $CI->config->item('smtp_server');			//smtp server
		$this->Port = $CI->config->item('smtp_port');			//change this port if you are using different port than mine
		$this->Username = $CI->config->item('mailer_username');	//email account username
		$this->Password = $CI->config->item('mailer_password');	//email account password
		$this->SMTPDebug = $CI->config->item('mailer_debug');	//debug = 0 (no debug), 1 = errors and messages, 2 = messages only
		$this->Debugoutput = 'html';							//Ask for HTML-friendly debug output
		$this->IsHTML(TRUE);
	}
}
?>