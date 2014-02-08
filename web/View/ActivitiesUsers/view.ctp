<div class="activitiesUsers view">
<h2><?php echo __('Activities User'); ?></h2>
	<dl>
		<dt><?php echo __('Activity'); ?></dt>
		<dd>
			<?php echo $this->Html->link($activitiesUser['Activity']['name'], array('controller' => 'activities', 'action' => 'view', $activitiesUser['Activity']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($activitiesUser['User']['id'], array('controller' => 'users', 'action' => 'view', $activitiesUser['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Activities User'), array('action' => 'edit', $activitiesUser['ActivitiesUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Activities User'), array('action' => 'delete', $activitiesUser['ActivitiesUser']['id']), null, __('Are you sure you want to delete # %s?', $activitiesUser['ActivitiesUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Activities Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Activities User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Activities'), array('controller' => 'activities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Activity'), array('controller' => 'activities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
