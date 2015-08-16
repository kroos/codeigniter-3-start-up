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

		// set document information
		$this->mytcpdf->SetCreator(PDF_CREATOR);
		$this->mytcpdf->SetAuthor('Nicola Asuni');
		$this->mytcpdf->SetTitle('Tcpdf Example 001');
		$this->mytcpdf->SetSubject('TCPDF Tutorial');
		$this->mytcpdf->SetKeywords('TCPDF, PDF, example, test, guide');



		// set default header data
		$this->mytcpdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
		$this->mytcpdf->setFooterData($tc=array(0,64,0), $lc=array(0,64,128));

		// set header and footer fonts
		$this->mytcpdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$this->mytcpdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$this->mytcpdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		//set margins
		$this->mytcpdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$this->mytcpdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$this->mytcpdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		//set auto page breaks
		$this->mytcpdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		//set image scale factor
		$this->mytcpdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		//set some language-dependent strings
		//$this->mytcpdf->setLanguageArray($l);

		// ---------------------------------------------------------

		// set default font subsetting mode
		$this->mytcpdf->setFontSubsetting(true);

		// Set font
		// dejavusans is a UTF-8 Unicode font, if you only need to
		// print standard ASCII chars, you can use core fonts like
		// helvetica or times to reduce file size.
		$this->mytcpdf->SetFont('dejavusans', '', 14, '', true);

		// Add a page
		// This method has several options, check the source code documentation for more information.
		$this->mytcpdf->AddPage();
		// set text shadow effect
		$this->mytcpdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

		// Set some content to print
		$html = <<<EOD
		<h1>Welcome to <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;">&nbsp;<span style="color:black;">TC</span><span style="color:white;">PDF</span>&nbsp;</a>!</h1>
		<i>This is the first example of TCPDF library.</i>
		<p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use: <i>Multicell(), writeHTML(), Write(), Cell() and Text()</i>.</p>
		<p>Please check the source code documentation and other examples for further information.</p>
		<p style="color:#CC0000;">TO IMPROVE AND EXPAND TCPDF I NEED YOUR SUPPORT, PLEASE <a href="http://sourceforge.net/donate/index.php?group_id=128076">MAKE A DONATION!</a></p>
EOD;

		// Print text using writeHTMLCell()
		$this->mytcpdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

		// ---------------------------------------------------------

		// Close and output PDF document
		// This method has several options, check the source code documentation for more information.
		$this->mytcpdf->Output('example_001.pdf', 'I');
		//============================================================+
		// END OF FILE
		//============================================================+
	}

	public function fpdf() {
		//load fpdf library
		$this->load->library('myfpdf');

		$this->myfpdf->AddPage();
		$this->myfpdf->SetFont('Arial', '', 12);
		$txt="FPDF is a PHP class which allows to generate PDF files with pure PHP, that is to say ".
			"without using the PDFlib library. F from FPDF stands for Free: you may use it for any ".
			"kind of usage and modify it to suit your needs.\n\n";
		for($i=0;$i<25;$i++) {
			$this->myfpdf->MultiCell(0, 5, $txt, 0, 'J');
		}
		$this->myfpdf->Output();
	}

	public function phpmailer() {
		$data['info'] = NULL;
		$this->load->library(array('myckeditor', 'form_validation'));
		$this->load->helper('form');
		$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
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

	public function jpgraph() {
		$this->load->library('myjpgraph');
		echo $this->myjpgraph->barchart();
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

		$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');

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
		$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');

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
		$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');

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
		$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');

		$norwayLayer = Myimage::initFromPath('images/double-kurv.jpg');

		//// This is the text layer
		$textLayer = Myimage::initTextLayer('Ayus Line Sdn Bhd', 'fonts/YanoneKaffeesatz-Regular.ttf', 48, '000000', 0);

		// We add the text layer 12px from the Left and 12px from the Bottom ("LB") of the norway layer:
		$norwayLayer->addLayerOnTop($textLayer, 12, 12, "LB");
		$image = $norwayLayer->getResult();
		header('Content-type: image/jpeg');
		imagejpeg($image, null, 95); // We chose to show a JPG with a quality of 95%
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
		$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');

		if($this->form_validation->run() == TRUE) {
			if ($this->input->post('send', TRUE)) {

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
				$this->myphpmailer->XMailer = 'Microsoft Outlook Express 6.00.2900.3138';

				$count = $this->input->post('count', TRUE);
				//echo $count;

				for ($i = 1; $i <= $count; $i++) {
					
					$name = $this->input->post('name', TRUE);
					$email = $this->input->post('email', TRUE);

					//Set who the message is to be sent from
					$this->myphpmailer->setFrom($this->myfaker->email, $this->myfaker->name);

					//Set an alternative reply-to address
					$this->myphpmailer->addReplyTo($this->myfaker->email, $this->myfaker->name);
					
					$this->myphpmailer->AddAddress($email, $name);														//recipient
 					$this->myphpmailer->Subject = $this->myfaker->sentence($nbWords = 6);
					$this->myphpmailer->MsgHTML($this->myfaker->text(400));
					$this->myphpmailer->AltBody = "To view the message, please use an HTML compatible email viewer!";	// optional, comment out and test

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
