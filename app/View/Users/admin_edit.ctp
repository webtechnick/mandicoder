<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id', array('label' => false));
		echo $this->Form->input('email');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('verified');
		echo $this->Form->input('code');
		echo $this->Form->input('group', array('options' => array('user' => 'user', 'admin' => 'admin',), 'type' => 'select', 'default' => 'user'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Save User')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), array('class' => 'btn'), __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Change Password'), array('action' => 'change_password', $this->request->data['User']['id']), array('class' => 'btn')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index'), array('class' => 'btn')); ?></li>
	</ul>
</div>
