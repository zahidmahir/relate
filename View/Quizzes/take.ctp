<?php echo $this->Form->create('Quiz', array('controller' => 'quizzes','action' => 'take')); ?>
	<fieldset>
		<legend><?php echo __('Take Quiz'); ?></legend>
	</fieldset>
	<?php //foreach($questions as $question): ?>
		<?php //$options = array(); ?>
		<?php //foreach($question['Choice'] as $choice): ?>
			<?php //$options[$choice['value']] = $choice['content']; ?>
		<? //endforeach; ?>
		<?php
			// echo $this->Form->input($question['Question']['content'], array('type' => 'radio', 'options' => $options, 'separator' => '<br />'));
		?>
	<?php //endforeach; ?>
	<?php echo $this->Form->submit(); ?>
<?php echo $this->Form->end(); ?>
