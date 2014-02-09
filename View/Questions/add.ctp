<div class="text-center">
<?php echo $this->Form->create('Question'); ?>
	<fieldset>
		<legend><?php echo __('Add Question'); ?></legend>
		
 		<div class="question-group form-group">
			<!-- <label for="QuestionContent">Content</label> -->
			<input placeholder="Content" name="data[Question][content]" type="text" id="QuestionContent">
			<!-- <label for="QuestionType">Type</label> -->
			<input placeholder="Type" name="data[Question][type]" type="text" id="QuestionType">
			<div class="choice-group"></div>
			<br />
			<button type="button" class="add_choice btn btn-info">Add Choice</button>
		</div>

	</fieldset>
	<!--<?php /*$options = array(
	    'label' => 'Submit',
	    'div' => array(
	        'class' => 'btn btn-default',
	    )
	);
	echo $this->Form->end($options); */?>-->
	<hr />
	<input type="submit" value="Submit" class="btn btn-info"></input>
	<hr />
	</div>

<script type="text/javascript">
	var current_choice = 0;
	var question_group = 0;

	$('.add_choice').click(function() {
		current_choice = $(this).parent().find('[class^=choice-group]').children().length;
		
		console.log('current_choice', current_choice);
		
		var html = $('\
			<div class="choice">\
				<h4>Choice ' + (current_choice+1) + '</h4>\
				<input placeholder="Content" name="data[Choice][' + current_choice + '][content]" type="text" id="Choice' + current_choice + 'Content">\
				<input placeholder="Value" name="data[Choice][' + current_choice + '][value]" type="text" id="Choice' + current_choice + 'Value">\
			</div>\
		');
		$(this).parent().find('.choice-group').append(html);
	});
</script>

<div class="col-md-4"></div>
<div class="actions text-center col-md-4">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-group">
		<li class="list-group-item"><?php echo $this->Html->link(__('New Question'), array('action' => 'add')); ?></li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Choices'), array('controller' => 'choices', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Choice'), array('controller' => 'choices', 'action' => 'add')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Responses'), array('controller' => 'responses', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Response'), array('controller' => 'responses', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="col-md-4"></div>