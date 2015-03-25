<div class="codes form">
<?php echo $this->Form->create('Code'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Code'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('decoded');
		echo $this->Form->input('encoded');
		echo $this->Form->input('engine');
		echo $this->Form->input('is_reverse');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Code.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Code.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Codes'), array('action' => 'index')); ?></li>
	</ul>
</div>
