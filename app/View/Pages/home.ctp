<?php if (!empty($output)): ?>
	<div class="notice monospace"><?php echo $output; ?></div>
<?php endif; ?>

<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Decode</a></li>
    <li><a href="#tabs-2">Encode</a></li>
  </ul>
  <div id="tabs-1">
    <?php
		echo $this->Form->create('Decode');
		echo $this->Form->input('data', array(
			'type' => 'textarea',
			'rows' => 10,
			'label' => 'Enter Mandi code to decode.'
		));
		echo $this->Form->input('engine', array(
			'label' => 'Choose Coding Engine',
			'type' => 'select',
			'options' => $engines
		));
		echo $this->Form->input('reverse', array(
			'label' => 'Reverse Result',
			'type' => 'checkbox',
		));
		echo $this->Form->end('Decode Mandi Code!');
		?>
  </div>
  <div id="tabs-2">
  	<?php
		echo $this->Form->create('Encode');
		echo $this->Form->input('data', array(
			'type' => 'textarea',
			'rows' => 10,
			'label' => 'Enter plain text to encode to Mandi code.'
		));
		echo $this->Form->input('engine', array(
			'label' => 'Choose Coding Engine',
			'type' => 'select',
			'options' => $engines
		));
		echo $this->Form->input('reverse', array(
			'label' => 'Reverse Result',
			'type' => 'checkbox',
		));
		echo $this->Form->end('Encode Text To Mandi Code!');
		?>
  </div>
</div>
<?php $this->Js->buffer('
	$("#tabs").tabs();
'); ?>