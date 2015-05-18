<? extend('welcome_message') ?>

	<? startblock('body') ?>

<h2>This is a form on update database</h2>

		<?=form_open()?>
		<p>Form</p>
		<p><?=@$info?></p>
		<p><?=form_label('Name : ', 'name2')?><?=form_input('name1', (empty($qu->row()->nama)) ? set_value('name1') : $qu->row()->nama, 'id="name2"')?><br /><?=form_error('name1')?></p>
		<p><?=form_label('Email : ', 'email2')?><?=form_input('email1', (empty($qu->row()->email)) ? set_value('email1') : $qu->row()->email, 'id="email2"')?><br /><?=form_error('email1')?></p>
		<div class="ln"><?=form_submit('update', 'Update')?></div>
		<?=form_close()?>
	<? endblock() ?>

<?end_extend()?>