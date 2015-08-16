<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
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
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/magnific/magnific-popup.css" />
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/magnific/magnific-effect.css" />

	<script type="text/javascript" src="<?=base_url()?>js/jquery/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>js/magnific/jquery.magnific-popup.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>js/jquery/jquery-ui-1.10.3.custom.js"></script>
	<script type="text/javascript" src="<?=base_url()?>js/jquery/jquery-ui-timepicker-addon.js"></script>

</head>
<body>

<script>
jQuery.noConflict ();
    (function($) {
      $(document).ready(function() {

        $('a, input[type=submit], button', '.ln')
        .button();

        $("#radioset" ).buttonset();

        // Datepicker
        $('#datepicker').datetimepicker({
          dateFormat: "yy-mm-dd",
          timeFormat: "hh:mm:ss",
          showSecond: true,
          showMillisec: false,
          ampm: false,
          stepHour: 1,
          stepMinute:1,
          stepSecond: 5
        });

        $('.ajax-popup-link').magnificPopup({
          type: 'iframe'
        });

        // Inline popups
        $('#inline-popups').magnificPopup({
          type: 'iframe',
          delegate: 'a',
          removalDelay: 500, //delay removal by X to allow out-animation
          callbacks: {
            beforeOpen: function() {
               this.st.mainClass = this.st.el.attr('data-effect');
            }
          },
          midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
        });

        // Image popups
        $('#image-popups').magnificPopup({
          type: 'iframe',
          delegate: 'a',
          type: 'image',
          removalDelay: 500, //delay removal by X to allow out-animation
          callbacks: {
            beforeOpen: function() {
              // just a hack that adds mfp-anim class to markup 
               this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
               this.st.mainClass = this.st.el.attr('data-effect');
            }
          },
          closeOnContentClick: true,
          midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
        });

        // Hinge effect popup
        $('a.hinge').magnificPopup({
          type: 'iframe',
          mainClass: 'mfp-with-fade',
          removalDelay: 1000, //delay removal by X to allow out-animation
          callbacks: {
            beforeClose: function() {
                this.content.addClass('hinge');
            }, 
            close: function() {
                this.content.removeClass('hinge'); 
            }
          },
          midClick: true
        });
    
    });
})(jQuery);
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
<p><?=anchor(site_url(), 'HOME')?>&nbsp;<?=anchor('welcome/tcpdf', 'TCPDF', array('target' => '_blank'))?>&nbsp;<?=anchor('welcome/fpdf', 'FPDF', array('target' => '_blank'))?>&nbsp;<?=anchor('welcome/phpmailer', 'PHPMailer', array( 'rel' => 'moodalbox'))?>&nbsp;<?=anchor('welcome/jpgraph', 'JPGraph')?>&nbsp;<?=anchor('welcome/dual_form', 'Dual Form')?>&nbsp;<?=anchor('welcome/image', 'Image Manipulation')?>&nbsp;<?=anchor('welcome/password', 'Password Library')?>&nbsp;<?=anchor('welcome/faker', 'Fake Data')?></p>
</div>
</body>
</html>