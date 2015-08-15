<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('ckeditor/ckeditor.php');

class Myckeditor extends CKEditor {
	function __construct() {
		// Call parent constructor
		parent::__construct();

		//callback config from Codeigniter
		$CI =& get_instance();

		//$CKEditor->basePath = '/ckeditor/'
		//$this->basePath = base_url().'js/ckeditor/';
	}
}
?>