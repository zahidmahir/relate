<div class="col-md-3"></div>
<div class="col-md-6 text-center">
	<?php echo $this->Form->create('Quiz', array('controller' => 'quizzes', 'action' => 'take')); ?>
	<fieldset>
		<legend><?php //echo __('Take Quiz'); ?></legend>
	</fieldset>

	<?php
	foreach($activities as $activity) {
		echo '<div class="panel panel-default">' .
				'<div class="panel-heading">' .
					'<h3 class="panel-title">' . $activity['name'] . '</h3>' .
				'</div>' .
				'<div class="panel-body">' .
					'<ul class="list-group">';

		foreach($questions as $question) {
			$options = array();
			foreach($question['Choice'] as $choice) {
				$options[$choice['id']] = $choice['content'];
			}
			$name = 'data[Activity][' . $activity['id'] . '][Question][' . $question['Question']['id'] . ']';
			echo '<li class="list-group-item">' .
					'<h4>' . $question['Question']['content'] .
					'</h4>' .
					'<div class="btn-group" data-toggle="buttons">';
			echo $this->Form->input($question['Question']['id'], array('type' => 'radio', 'options' => $options, 'name' => $name, 'separator' => '<br/>', 'legend' => false/*, 'before' => '<label class="btn btn-primary">', 'after' => '</label>'*/));
			echo '</li>';
		}
		echo '</ul></div></div>';
	}	
	?>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="col-md-3"></div>
