<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

#############################################################################################
//Website
$config['title'] = 'Welcome to Codeigniter Initial';

#############################################################################################
//Website
//Mailer Configurations
//pop3 server
$config['pop3_server'] = 'pop.gmail.com';
$config['pop3_port'] = 995;

//smtp server
//$config['smtp_server'] = 'smtp.gmail.com';
$config['smtp_server'] = 'localhost';
//$config['smtp_port'] = 465;
$config['smtp_port'] = 1024;
//$config['smtp_secure'] = 'ssl';						//Set the encryption system to use - ssl (deprecated) or tls

//debugging
$config['mailer_debug'] = 2;						//debug = 0 (no debug), 1 = errors and messages, 2 = messages only

//email account from sender associated to the pop3 and smtp server settings.
$config['mailer_username'] = 'krooitnot@gmail.com';	//gmail username or hosting username
$config['mailer_password'] = 'Dh14udd1n';			//gmail password or hosting password

#############################################################################################
//TCPDF configuartion
$config['tcpdftitle'] = 'E-tcpdftitle';
$config['tcpdftitlecompany'] = 'E-tcpdftitlecompany';

#############################################################################################


/* End of file ci-initial.php */
/* Location: ./application/config/ci3.php */
