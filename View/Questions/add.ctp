<div class="questions form">
<?php echo $this->Form->create('Question'); ?>
	<fieldset>
		<legend><?php echo __('Add Question'); ?></legend>
		
 		<div class="question-group">
			<label for="QuestionContent">Content</label>
			<input name="data[Question][content]" type="text" id="QuestionContent">
			<br />
			<div class="choice-group"></div>
			
			<button type="button" class="add_choice btn btn-info">Add Choice</button>
			<hr />
		</div>

	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<script type="text/javascript">
	var current_choice = 0;
	var question_group = 0;

	$('.add_choice').click(function() {
		current_choice = $(this).parent().find('[class^=choice-group]').children().length;
		
		console.log('current_choice', current_choice);
		
		var html = $('\
			<div class="choice">\
				<h4>Choice ' + current_choice + '</h4>\
				<label for="Choice' + current_choice + 'Content">Content</label>\
				<input name="data[Choice][' + current_choice + '][content]" type="text" id="Choice' + current_choice + 'Content">\
				<label for="Choice' + current_choice + 'Value">Value</label>\
				<input name="data[Choice][' + current_choice + '][value]" type="text" id="Choice' + current_choice + 'Value">\
			</div>\
		');
		$(this).parent().find('.choice-group').append(html);
	});
</script>


<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Question'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Choices'), array('controller' => 'choices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Choice'), array('controller' => 'choices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Responses'), array('controller' => 'responses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Response'), array('controller' => 'responses', 'action' => 'add')); ?> </li>
	</ul>
</div>
