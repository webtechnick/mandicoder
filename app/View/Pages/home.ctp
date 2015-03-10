<?php if (!empty($output)): ?>
	<div class="notice"><?php echo $output; ?></div>
<?php endif; ?>

<?php
echo $this->Form->create('Decode');
echo $this->Form->input('data', array(
	'type' => 'textarea',
	'label' => 'Enter Mandi code to decode.'
));
echo $this->Form->end('Decode Mandi Code!');
?>

<?php
echo $this->Form->create('Encode');
echo $this->Form->input('data', array(
	'type' => 'textarea',
	'label' => 'Enter plain text to encode to Mandi code.'
));
echo $this->Form->end('Encode Text To Mandi Code!');
?>