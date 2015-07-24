<? extend('welcome_message') ?>

	<? startblock('body') ?>

<h2>Image Manipulation</h2>

		<?=form_open()?>
		<p>Form 1</p>
		<p><?=@$info1?></p>
		<p><?=form_label('Choose image : ', 'name2')?><?=form_input('image', set_value('image'), 'id="name2"')?><br /><?=form_error('image')?></p>
		<p><?=form_label('Wording : ', 'email2')?><?=form_input('wording', set_value('wording'), 'id="email2"')?><br /><?=form_error('wording')?></p>
		<div class="ln"><?=form_submit('change', 'Alter')?></div>
		<?=form_close()?>

		<?//if($this->form_validation->run() === TRUE):?>
		<p><img alt="image" src="<?=$image ?>"></p>
		<?//else: ?>
		<?//endif?>
	<? endblock() ?>

<?end_extend()?>