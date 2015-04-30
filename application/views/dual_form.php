<? extend('welcome_message') ?>

	<? startblock('body') ?>

<h2>This is multiple form with sqlite database</h2>

		<?=form_open()?>
		<p>Form 1</p>
		<p><?=@$info1?></p>
		<p><?=form_label('Name : ', 'name2')?><?=form_input('name1', set_value('name1'), 'id="name2"')?><br /><?=form_error('name1')?></p>
		<p><?=form_label('Email : ', 'email2')?><?=form_input('email1', set_value('email1'), 'id="email2"')?><br /><?=form_error('email1')?></p>
		<div class="ln"><?=form_submit('send1', 'Send')?></div>
		<?=form_close()?>

		<?=form_open()?>
		<p>Form 2</p>
		<p><?=@$info2?></p>
		<p><?=form_label('Name : ', 'name3')?><?=form_input('name11', set_value('name11'), 'id="name3"')?><br /><?=form_error('name11')?></p>
		<p><?=form_label('Email : ', 'email3')?><?=form_input('email11', set_value('email11'), 'id="email3"')?><br /><?=form_error('email11')?></p>
		<div class="ln"><?=form_submit('send11', 'Send')?></div>
		<?=form_close()?>

	<? endblock() ?>

<?end_extend()?>