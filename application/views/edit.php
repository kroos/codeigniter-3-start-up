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

	<script type="text/javascript" src="<?=base_url()?>js/jquery/jquery-1.9.1.js"></script>
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


<h2>This is a form on update database</h2>

		<?=form_open()?>
		<p>Form</p>
		<p><?=@$info?></p>
		<p><?=form_label('Name : ', 'name2')?><?=form_input('name1', (empty($qu->row()->nama)) ? set_value('name1') : $qu->row()->nama, 'id="name2"')?><br /><?=form_error('name1')?></p>
		<p><?=form_label('Email : ', 'email2')?><?=form_input('email1', (empty($qu->row()->email)) ? set_value('email1') : $qu->row()->email, 'id="email2"')?><br /><?=form_error('email1')?></p>
		<div class="ln"><?=form_submit('update', 'Update')?></div>
		<?=form_close()?>

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds and <strong>{memory_usage}</strong>. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
</body>
</html>