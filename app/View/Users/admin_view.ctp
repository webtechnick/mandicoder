<div class="users view">
<h2><?php  echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Billing Address'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['BillingAddress']['id'], array('controller' => 'addresses', 'action' => 'view', $user['BillingAddress']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shipping Address'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['ShippingAddress']['id'], array('controller' => 'addresses', 'action' => 'view', $user['ShippingAddress']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Verified'); ?></dt>
		<dd>
			<?php echo h($user['User']['verified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($user['User']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo h($user['User']['group']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Billing Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Orders'); ?></h3>
	<?php if (!empty($user['Order'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Billing Address Id'); ?></th>
		<th><?php echo __('Shipping Address Id'); ?></th>
		<th><?php echo __('CC Number'); ?></th>
		<th><?php echo __('CC Code'); ?></th>
		<th><?php echo __('CC Type'); ?></th>
		<th><?php echo __('CC Exp Month'); ?></th>
		<th><?php echo __('CC Exp Year'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Phone2'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Isnew'); ?></th>
		<th><?php echo __('Special Request'); ?></th>
		<th><?php echo __('Shipping Price Dollars'); ?></th>
		<th><?php echo __('Shipping Id'); ?></th>
		<th><?php echo __('Discount Dollars'); ?></th>
		<th><?php echo __('Tax Dollars'); ?></th>
		<th><?php echo __('Total Dollars'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Order'] as $order): ?>
		<tr>
			<td><?php echo $order['id']; ?></td>
			<td><?php echo $order['user_id']; ?></td>
			<td><?php echo $order['first_name']; ?></td>
			<td><?php echo $order['last_name']; ?></td>
			<td><?php echo $order['billing_address_id']; ?></td>
			<td><?php echo $order['shipping_address_id']; ?></td>
			<td><?php echo $order['CC_number']; ?></td>
			<td><?php echo $order['CC_code']; ?></td>
			<td><?php echo $order['CC_type']; ?></td>
			<td><?php echo $order['CC_exp_month']; ?></td>
			<td><?php echo $order['CC_exp_year']; ?></td>
			<td><?php echo $order['phone']; ?></td>
			<td><?php echo $order['phone2']; ?></td>
			<td><?php echo $order['email']; ?></td>
			<td><?php echo $order['isnew']; ?></td>
			<td><?php echo $order['special_request']; ?></td>
			<td><?php echo $order['shipping_price_dollars']; ?></td>
			<td><?php echo $order['shipping_id']; ?></td>
			<td><?php echo $order['discount_dollars']; ?></td>
			<td><?php echo $order['tax_dollars']; ?></td>
			<td><?php echo $order['total_dollars']; ?></td>
			<td><?php echo $order['created']; ?></td>
			<td><?php echo $order['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'orders', 'action' => 'view', $order['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'orders', 'action' => 'edit', $order['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'orders', 'action' => 'delete', $order['id']), null, __('Are you sure you want to delete # %s?', $order['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
