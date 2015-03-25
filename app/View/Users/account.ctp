<div class="users form">
	<h1>My Account</h1>
	<?php echo $this->Form->create('User'); ?>
		<?php
			echo $this->Form->input('User.id', array('label' => false));
			echo $this->Form->input('User.email');
			echo $this->Form->input('User.first_name');
			echo $this->Form->input('User.last_name');
		?>
	<?php echo $this->Form->end(__('Update My Account')); ?>
</div>
