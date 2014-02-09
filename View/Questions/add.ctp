<div class="questions form">
<?php echo $this->Form->create('Question'); ?>
	<fieldset>
		<legend><?php echo __('Add Question'); ?></legend>
	<?php
		echo $this->Form->input('content');
		echo $this->Form->input('type');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
