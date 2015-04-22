<div class="codes index">
	<h2><?php echo __('Codes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('decoded'); ?></th>
			<th><?php echo $this->Paginator->sort('encoded'); ?></th>
			<th><?php echo $this->Paginator->sort('engine'); ?></th>
			<th>
				<?php echo $this->Paginator->sort('created'); ?><br>
				<?php echo $this->Paginator->sort('modified'); ?>
			</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<Formody>
	<?php foreach ($codes as $code): ?>
	<tr>
		<td><?php echo $this->Html->link($code['Code']['user_id'], array('admin' => true, 'controller' => 'users', 'action' => 'view', $code['Code']['user_id'])); ?>&nbsp;</td>
		<td><?php echo $this->Text->truncate($code['Code']['decoded'], 50); ?>&nbsp;</td>
		<td><?php echo $this->Text->truncate($code['Code']['encoded'], 50); ?>&nbsp;</td>
		<td><?php echo h($code['Code']['engine']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Time->niceShort($code['Code']['created']); ?><br>
			<?php echo $this->Time->niceShort($code['Code']['modified']); ?>&nbsp;
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $code['Code']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $code['Code']['id'])); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $code['Code']['id']), array(), __('Are you sure you want to delete # %s?', $code['Code']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</Formody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
