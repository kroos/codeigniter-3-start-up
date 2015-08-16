<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends CI_Controller {
	//contructor => default utk semua function dlm controller nih...
	public function __construct() {
		parent::__construct();

		$this->load->config('ci3');
		$this->load->helper(array('url','template_inheritance'));
	}
############################################################################################################
	public function error404() {
		$this->load->view('error404');
	}
############################################################################################################
}