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
$config['smtp_server'] = 'smtp.gmail.com';
$config['smtp_port'] = 587;
$config['smtp_secure'] = 'tls';						//Set the encryption system to use - ssl (deprecated) or tls

//debugging
$config['mailer_debug'] = 0;						//debug = 0 (no debug), 1 = errors and messages, 2 = messages only

//email account from sender associated to the pop3 and smtp server settings.
$config['mailer_username'] = 'a3outlaw@gmail.com';	//gmail username or hosting username
$config['mailer_password'] = '0162172420';			//gmail password or hosting password

//email behaviour
$config['addreplyto_email'] = 'admin@domain.com';	//this might probably differ from $config['username']. Example, admin@domain.com
$config['addreplyto_name'] = '[GM]Cabal';			//example, [GM]Cabal
$config['from'] = 'admin@domain.com';				//this might probably differ from $config['username']. Example, admin@domain.com
$config['from_name'] = '[GM]Cabal';					//example [GM]Cabal

#############################################################################################
//TCPDF configuartion
$config['tcpdftitle'] = 'E-tcpdftitle';
$config['tcpdftitlecompany'] = 'E-tcpdftitlecompany';

#############################################################################################


/* End of file ci-initial.php */
/* Location: ./application/config/ci3.php */
