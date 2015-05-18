<? extend('welcome_message') ?>

	<? startblock('body') ?>

		<p><?=@$info?></p>

		<?=form_open()?>

		<p><?=form_label('Subject : ', 'subject')?><?=form_input('subject', set_value('subject'), 'id="subject"')?><br /><?=form_error('subject')?></p>
		<p>
		<?php
			// Create a textarea element and attach CKEditor to it.
			$this->myckeditor->editor('editor', set_value('editor'), array('toolbar' => 'Basic'));
		?>
		<br /><?=form_error('editor')?>
		</p>

		<div class="ln"><?=form_submit('send', 'Send')?></div>

		<?=form_close()?>

	<? endblock() ?>

<?end_extend()?>