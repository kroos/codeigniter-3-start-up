<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	//contructor => default utk semua function dlm controller nih...
	public function __construct() {
		parent::__construct();

		$this->load->config('ci3');
		$this->load->helper(array('url','template_inheritance'));
	}

	public function index() {
		$this->load->view('welcome_message');
	}

	public function tcpdf() {
		//load tcpdf library
		$this->load->library('mytcpdf');
		$data['txt'] = <<<EOD
						TCPDF Example 003
						Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.

						
EOD;
		$this->load->view('tcpdf', $data);
	}

	public function fpdf() {
		//load fpdf library
		$this->load->library('myfpdf');

		$data['txt'] = "FPDF is a PHP class which allows to generate PDF files with pure PHP, that is to say ".
						"without using the PDFlib library. F from FPDF stands for Free: you may use it for any ".
						"kind of usage and modify it to suit your needs.\n\n";
		$this->load->view('fpdf', $data);
	}
 
	public function phpmailer() {
		$data['info'] = NULL;
		$this->load->library(array('myckeditor', 'form_validation'));
		$this->load->helper('form');
		if ($this->form_validation->run() == TRUE) {
			if($this->input->post('send', TRUE)) {
				$name = $this->input->post('name', TRUE);
				$email = $this->input->post('email', TRUE);
				$subject = $this->input->post('subject', TRUE);
				$message = $this->input->post('editor', TRUE);

				//load pop3 (optional)
				$this->load->library('mypop3mailer');
				$this->load->library('myphpmailer');

				$this->myphpmailer->IsSMTP();
				$this->myphpmailer->SMTPAuth = TRUE;									//Set the encryption system to use - ssl (deprecated) or tls
				$this->myphpmailer->SMTPSecure = $this->config->item('smtp_secure');	//tls or ssl (deprecated)
				$this->myphpmailer->Host = $this->config->item('smtp_server');			//smtp server
				$this->myphpmailer->Port = $this->config->item('smtp_port');			//change this port if you are using different port than mine
				$this->myphpmailer->Username = $this->config->item('mailer_username');	//email account username
				$this->myphpmailer->Password = $this->config->item('mailer_password');	//email account password
				$this->myphpmailer->SMTPDebug = $this->config->item('mailer_debug');	//debug = 0 (no debug), 1 = errors and messages, 2 = messages only
				$this->myphpmailer->Debugoutput = 'html';								//Ask for HTML-friendly debug output
				$this->myphpmailer->IsHTML(TRUE);

				//Set who the message is to be sent from
				$this->myphpmailer->setFrom('email@email.com', 'naem'); 

				//Set an alternative reply-to address
				$this->myphpmailer->addReplyTo('email@email.com', 'naem');

				//process myphpmailer
				$this->myphpmailer->AddAddress($email, $name);														//recipient
 				$this->myphpmailer->Subject = $subject;
				$this->myphpmailer->MsgHTML($message);
				$this->myphpmailer->AltBody = "To view the message, please use an HTML compatible email viewer!";	// optional, comment out and test

				if (!$this->myphpmailer->Send()) {
					$data['info'] = $this->myphpmailer->ErrorInfo;
				}else{
					$data['info'] = 'Success sending email';
				}
			}
		}
		$this->load->view('emailer', $data);
	}

	public function jpgraph () {
		//load graph library
		$this->load->library('myjpgraph');

		//data to be pass on to view
		$data['data1y'] = array(-8,8,9,3,5,6);
		$data['data2y'] = array(18,2,1,7,5,4);

		$this->load->view('graf', $data);
	}

	public function dual_form() {
		$this->load->library(array('myfaker', 'table')); 

		
		$data['info1'] = NULL;
		$data['info2'] = NULL;

		//load database
		$this->load->database();

		//load model
		$this->load->model('sqlitedb');


		$this->load->library('form_validation');
		//load helper form
		$this->load->helper('form');

		//initialize faker
		$this->myfaker = Faker\Factory::create();

		$data['query'] = $this->sqlitedb->GetAll(NULL, NULL);

		if($this->input->post('send1', TRUE)) {
			$this->form_validation->set_rules('name1', 'Nama', 'trim|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('email1', 'Email', 'trim|required|valid_email|is_unique[sqlitedb.email]');
		} else {
			if($this->input->post('send11', TRUE)) {
				$this->form_validation->set_rules('name11', 'Nama', 'trim|required|alpha_numeric_spaces');
				$this->form_validation->set_rules('email11', 'Email', 'trim|required|valid_email|is_unique[sqlitedb.email]');
			}
		}

		if($this->form_validation->run() == TRUE) {
			if($this->input->post('send1', TRUE)) {
				$nama1 = ucwords(strtolower($this->input->post('name1', TRUE)));
				$email1 = strtolower($this->input->post('email1', TRUE));
				$res = $this->sqlitedb->insert(array('nama' => $nama1, 'email' => $email1));
				if($res) {
					$data['info1'] = 'database inserted';
				}else{
					$data['info1'] = 'please try again later........';
				}
			}else{
				if($this->input->post('send11', TRUE)) {
					$nama11 = ucwords(strtolower($this->input->post('name11', TRUE)));
					$email11 = strtolower($this->input->post('email11', TRUE));
					$res = $this->sqlitedb->insert(array('nama' => $nama11, 'email' => $email11));
					if($res) {
						$data['info2'] = 'database inserted';
					}else{
						$data['info2'] = 'please try again later........';
					}
				}
			}
		}
		$this->load->view('dual_form', $data);
		$this->db->close();
	}

	public function edit() {
		//load database
		$this->load->database();
		//load model
		$this->load->model('sqlitedb');
		$this->load->library('form_validation');
		//load helper form
		$this->load->helper('form');

		$id = $this->uri->segment(3, 0);

		if (is_numeric($id)) {
			if($this->form_validation->run() == TRUE) {
				if ($this->input->post('update', TRUE)) {
					$nama = ucwords(strtolower($this->input->post('name1', TRUE)));
					$email = strtolower($this->input->post('email1', TRUE));

					$res = $this->sqlitedb->update(array('nama' => $nama, 'email' => $email), array('id' => $id));
					if ($res) {
						$data['info'] = 'Success update data';
					} else {
						$data['info'] = 'Please try again later';
					}
				}
			}
			$data['qu'] = $this->sqlitedb->GetWhere(array('id' => $id), NULL, NULL);
			$this->load->view('edit', $data);
		}
	}

	public function emailto() {
		$data['info'] = NULL;
		//load database
		$this->load->database();
		//load model
		$this->load->model('sqlitedb');
		$this->load->library(array('myckeditor', 'form_validation'));

		//load helper form
		$this->load->helper('form');

		$id = $this->uri->segment(3, 0);
		if (is_numeric($id)) {
			if($this->form_validation->run() == TRUE) {
				if ($this->input->post('send', TRUE)) {

					$subject = $this->input->post('subject', TRUE);
					$message = $this->input->post('editor', TRUE);

					//load pop3 (optional)
					$this->load->library('mypop3mailer');
					$this->load->library('myphpmailer');

					$res = $this->sqlitedb->GetWhere(array('id' => $id), NULL, NULL);

					$this->myphpmailer->IsSMTP();
					$this->myphpmailer->SMTPAuth = TRUE;									//Set the encryption system to use - ssl (deprecated) or tls
					$this->myphpmailer->SMTPSecure = $this->config->item('smtp_secure');	//tls or ssl (deprecated)
					$this->myphpmailer->Host = $this->config->item('smtp_server');			//smtp server
					$this->myphpmailer->Port = $this->config->item('smtp_port');			//change this port if you are using different port than mine
					$this->myphpmailer->Username = $this->config->item('mailer_username');	//email account username
					$this->myphpmailer->Password = $this->config->item('mailer_password');	//email account password
					$this->myphpmailer->SMTPDebug = $this->config->item('mailer_debug');	//debug = 0 (no debug), 1 = errors and messages, 2 = messages only
					$this->myphpmailer->Debugoutput = 'html';								//Ask for HTML-friendly debug output
					$this->myphpmailer->IsHTML(TRUE);

					//process myphpmailer
					$this->myphpmailer->AddAddress($res->row()->email, $res->row()->nama);														//recipient
 					$this->myphpmailer->Subject = $subject;
					$this->myphpmailer->MsgHTML($message);
					$this->myphpmailer->AltBody = "To view the message, please use an HTML compatible email viewer!";	// optional, comment out and test

					if (!$this->myphpmailer->Send()) {
						$data['info'] = $this->myphpmailer->ErrorInfo;
					}else{
						$data['info'] = 'Success sending email';
					}
				}
			}
			$this->load->view('emailto', $data);
		}
	}
	
	public function image() {
		//http://phpimageworkshop.com
		$this->load->library(array('myimage', 'form_validation'));
		$this->load->helper('form');

		$norwayLayer = Myimage::initFromPath('images/double-kurv.jpg');

		// need absolute path for font file
		$font = realpath('fonts').'/YanoneKaffeesatz-Regular.ttf';

		//// This is the text layer
		$textLayer = Myimage::initTextLayer('Ayus Line Sdn Bhd', $font, 100, '000000', 35);

		// We add the text layer 12px from the Left and 12px from the Bottom ("LB") of the norway layer:
		$norwayLayer->addLayerOnTop($textLayer, 100, 500, "LB");
		$data['image'] = $norwayLayer->getResult();
		$this->load->view('image_manipulate', $data);
	}

	public function password() {
		$this->load->library('mypassword');
		$this->load->view('password');
	}

	public function faker() {
		$this->load->helper(array('form'));
		$this->load->library(array('myfaker', 'myphpmailer', 'form_validation'));
		//$this->Myfaker->create();
		$this->myfaker = Faker\Factory::create();

		$data['info'] = NULL;

		if($this->form_validation->run() == TRUE) {
			if ($this->input->post('send', TRUE)) {

				$this->myphpmailer->IsSMTP();
				$this->myphpmailer->SMTPAuth = TRUE;					//Set the encryption system to use - ssl (deprecated) or tls
				$this->myphpmailer->SMTPSecure = $this->config->item('smtp_secure');	//tls or ssl (deprecated)
				$this->myphpmailer->Host = $this->config->item('smtp_server');		//smtp server
				$this->myphpmailer->Port = $this->config->item('smtp_port');		//change this port if you are using different port than mine
				$this->myphpmailer->Username = $this->config->item('mailer_username');	//email account username
				$this->myphpmailer->Password = $this->config->item('mailer_password');	//email account password
				$this->myphpmailer->SMTPDebug = $this->config->item('mailer_debug');	//debug = 0 (no debug), 1 = errors and messages, 2 = messages only
				$this->myphpmailer->Debugoutput = 'html';				//Ask for HTML-friendly debug output
				$this->myphpmailer->IsHTML(TRUE);
				//$this->myphpmailer->XMailer = 'Microsoft Outlook Express 6.00.2900.3138';

				$count = $this->input->post('count', TRUE);
				//echo $count;

				$name = $this->input->post('name', TRUE);
				$email = $this->input->post('email', TRUE);

				$this->myphpmailer->AltBody = "To view the message, please use an HTML compatible email viewer!";	// optional, comment out and test


				for ($i = 1; $i <= $count; $i++) {

					//Set who the message is to be sent from
					$this->myphpmailer->setFrom($this->myfaker->email, $this->myfaker->name);

					//Set an alternative reply-to address
					$this->myphpmailer->addReplyTo($this->myfaker->email, $this->myfaker->name);

					$this->myphpmailer->AddAddress($email, $name);							//recipient

 					$this->myphpmailer->Subject = $this->myfaker->sentence($nbWords = 6);
					$this->myphpmailer->MsgHTML($this->myfaker->text(400));

					if (!$this->myphpmailer->Send()) {
						$data['info'] = $this->myphpmailer->ErrorInfo;
					}else{
						$data['info'] = 'Success bombing email';
					}
					$this->myphpmailer->clearAddresses();
					//$this->myphpmailer->clearAttachments();
					$this->myphpmailer->clearReplyTos();
					$this->myphpmailer->clearAllRecipients();
				}
			}
		}
		$this->load->view('faker', $data);
	}
}
