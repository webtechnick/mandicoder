<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Admin Change Password'); ?></legend>
	<?php
		echo $this->Form->input('id', array('label' => false));
		echo $this->Form->input('User.password');
	  echo $this->Form->input('User.confirm_password', array('type' => 'password'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Change Password User')); ?>
</div>
