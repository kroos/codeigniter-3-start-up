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

<?php
$template = array(
        'table_open'            => '<table border="1" cellpadding="4" cellspacing="0" width="80%">',

        //'thead_open'            => '<thead>',
        //'thead_close'           => '</thead>',

        //'heading_row_start'     => '<tr>',
        //'heading_row_end'       => '</tr>',
        //'heading_cell_start'    => '<th>',
        //'heading_cell_end'      => '</th>',

        //'tbody_open'            => '<tbody>',
        //'tbody_close'           => '</tbody>',

        //'row_start'             => '<tr>',
        //'row_end'               => '</tr>',
        //'cell_start'            => '<td>',
        //'cell_end'              => '</td>',

        'row_alt_start'         => '<tr style="background-color: rgb(204, 204, 204);">',
        'row_alt_end'           => '</tr>',
        //'cell_alt_start'        => '<td>',
        //'cell_alt_end'          => '</td>',

        //'table_close'           => '</table>'
);
$this->table->set_template($template);

$this->table->set_heading('id', 'name', 'email');

$atts = array(
        'width'       => 800,
        'height'      => 600,
        'scrollbars'  => 'yes',
        'status'      => 'yes',
        'resizable'   => 'yes',
        'screenx'     => 0,
        'screeny'     => 0,
        'window_name' => '_blank'
);

foreach($query->result() AS $qr){
	$this->table->add_row(anchor('welcome/edit/'.$qr->id, 'Edit'), $qr->nama, anchor_popup('welcome/emailto/'.$qr->id, 'Send email to '.$qr->nama));
}
echo $this->table->generate();

endblock();
end_extend();
?>