<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?=$this->config->item('title')?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="This is a Codeigniter Initial Template." />
	<meta name="keywords" content="codeigniter, plugin, helper" />
	<meta name="author" content="Zaugola" />
	<link rel="shortcut icon" href="<?=base_url()?>images/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/welcome.css" />

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/jquery/jquery-ui-1.10.3.custom.css" />

	<script type="text/javascript" src="<?=base_url()?>js/jquery/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="<?=base_url()?>js/jquery/jquery-ui-1.10.3.custom.js"></script>
	<script type="text/javascript" src="<?=base_url()?>js/jquery/jquery-ui-timepicker-addon.js"></script>
</head>
<body>
<script>
	$(function() {
		$( "input[type=submit], a, button", ".ln" )
			.button();
		$( "#radioset" ).buttonset();
		// Datepicker
		$('#datepicker1').datetimepicker({dateFormat: "yy-mm-dd", timeFormat: "hh:mm:ss", showSecond: true, showMillisec: false, ampm: false, stepHour: 1, stepMinute: 1, stepSecond: 5});
	});
</script>
<div id="container">
	<h1>Welcome to CodeIgniter!</h1>

	<div id="body">
		<? start_block_marker('body') ?>
		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

		<p>If you would like to edit this page you'll find it located at:</p>
		<code>application/views/welcome_message.php</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/Welcome.php</code>

		<? end_block_marker() ?>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="<?=base_url()?>user_guide/" target="_blank">User Guide</a>.</p>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds and <strong>{memory_usage}</strong>. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
<div class="ln">
<p><?=anchor(site_url(), 'HOME')?>&nbsp;<?=anchor('welcome/tcpdf', 'TCPDF', array('target' => '_blank'))?>&nbsp;<?=anchor('welcome/fpdf', 'FPDF', array('target' => '_blank'))?>&nbsp;<?=anchor('welcome/phpmailer', 'PHPMailer')?>&nbsp;<?=anchor('welcome/jpgraph', 'JPGraph')?>&nbsp;<?=anchor('welcome/dual_form', 'Dual Form')?></p>
</div>
</body>
</html>