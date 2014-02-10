<div class="countries index">
	<h2><?php echo __d('address', 'Countries'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('country'); ?></th>
			<th><?php echo $this->Paginator->sort('abbr'); ?></th>
			<th class="actions"><?php echo __d('address', 'Actions'); ?></th>
	</tr>
	<?php foreach ($countries as $country): ?>
	<tr>
		<td><?php echo h($country['Country']['id']); ?>&nbsp;</td>
		<td><?php echo h($country['Country']['country']); ?>&nbsp;</td>
		<td><?php echo h($country['Country']['abbr']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__d('address', 'View'), array('action' => 'view', $country['Country']['id'])); ?>
			<?php echo $this->Html->link(__d('address', 'Edit'), array('action' => 'edit', $country['Country']['id'])); ?>
			<?php echo $this->Form->postLink(__d('address', 'Delete'), array('action' => 'delete', $country['Country']['id']), null, __d('address', 'Are you sure you want to delete # %s?', $country['Country']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __d('address', 'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __d('address', 'previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__d('address', 'next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __d('address', 'Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__d('address', 'New Country'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__d('address', 'List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
	</ul>
</div>
