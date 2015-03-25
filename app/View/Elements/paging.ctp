<p>
<?php
echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} of {:count} total.')
));
?>
</p>

<div class="paging">
	<?php
	echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
	echo $this->Paginator->numbers(array('separator' => ''));
	echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	<?php if($this->Paginator->hasNext()): ?>
		<?php	echo $this->Paginator->link('View All', array('viewall' => 1)); ?>
	<?php endif; ?>
</div>
