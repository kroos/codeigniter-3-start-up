<? extend('welcome_message') ?>

	<? startblock('body') ?>

		<p><?=@$info?></p>

		<?=form_open()?>

		<p><?=form_label('Email Count : ', 'count')?><?=form_input('count', $this->myfaker->numberBetween($min = 10, $max = 200), 'id="count"')?><br /><?=form_error('count')?></p>
		<p><?=form_label('Victim\'s Name : ', 'name')?><?=form_input('name', $this->myfaker->name, 'id="name"')?><br /><?=form_error('name')?></p>
		<p><?=form_label('Victim\'s Email : ', 'email')?><?=form_input('email', $this->myfaker->email, 'id="email"')?><br /><?=form_error('email')?></p>


		<div class="ln"><?=form_submit('send', 'Send')?></div>

		<?=form_close()?>

	<? endblock() ?>

<?end_extend()?>