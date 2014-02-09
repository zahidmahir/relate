<div class="quizzes view">
<h2><?php echo __('Quiz'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($quiz['Quiz']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Score'); ?></dt>
		<dd>
			<?php echo h($quiz['Quiz']['score']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($quiz['Quiz']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($quiz['Quiz']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($quiz['User']['id'], array('controller' => 'users', 'action' => 'view', $quiz['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Quiz'), array('action' => 'edit', $quiz['Quiz']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Quiz'), array('action' => 'delete', $quiz['Quiz']['id']), null, __('Are you sure you want to delete # %s?', $quiz['Quiz']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Quizzes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quiz'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
