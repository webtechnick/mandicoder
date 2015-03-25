<div class="users form">
	<h1>Register</h1>
	<?php echo $this->Form->create('User'); ?>
	<?php echo $this->Form->input('User.email'); ?>
	<?php echo $this->Form->input('User.password'); ?>
	<?php echo $this->Form->input('User.confirm_password', array('type' => 'password')); ?>
	<?php echo $this->Form->end('Register'); ?>
</div>
