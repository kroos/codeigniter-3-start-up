<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
##################################################################################################

//form validation through controller
//format
/*
$config = array	( 
					'controller/function' => array
					( 
						array
							(
								'field' => 'login',
								'label' => 'Login',
								'rules' => 'trim|required|min_length[6]|max_length[12]|xss_clean'
							)
					)
				);
*/
##################################################################################################
$config = array	( 
					'welcome/phpmailer' => array
					( 
						array
							(
								'field' => 'name',
								'label' => 'Name',
								'rules' => 'trim|required|max_length[50]'
							),
						array
							(
								'field' => 'email',
								'label' => 'Email',
								'rules' => 'trim|required|valid_email|max_length[50]'
							),
						array
							(
								'field' => 'subject',
								'label' => 'Subject',
								'rules' => 'trim|required|max_length[255]'
							),
						array
							(
								'field' => 'editor',
								'label' => 'Email Text',
								'rules' => 'trim|required'
							),
					),
					'welcome/edit' => array
					(
						array
							(
								'field' => 'name1',
								'label' => 'Name',
								'rules' => 'trim|required|max_length[12]'
							),
						array
							(
								'field' => 'email1',
								'label' => 'Email',
								'rules' => 'trim|required|valid_email'
							),
					),
					'welcome/emailto' => array
					(
						array
							(
								'field' => 'subject',
								'label' => 'Subject',
								'rules' => 'trim|required|max_length[255]'
							),
						array
							(
								'field' => 'editor',
								'label' => 'Message',
								'rules' => 'trim|required'
							),
					),
					'welcome/image' => array
					(
						array
							(
								'field' => 'image',
								'label' => 'Choose Image',
								'rules' => 'trim|required|max_length[255]'
							),
						array
							(
								'field' => 'wording',
								'label' => 'Wording',
								'rules' => 'trim|required|max_length[255]'
							),
					)
				);
/* End of file form_validator.php */
/* Location: ./application/config/form_validator.php */
