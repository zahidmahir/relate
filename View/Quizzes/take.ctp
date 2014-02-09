<?php echo $this->Form->create('Quiz', array('controller' => 'quizzes', 'action' => 'take')); ?>
	<fieldset>
		<legend><?php echo __('Take Quiz'); ?></legend>
	</fieldset>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Quiz</h3>
		</div>
		<div class="panel-body">
		Panel content
		</div>
	</div>

	<?php

	foreach($activities as $activity) {
		echo '<h3>' . $activity['name'] . '</h3>';
		foreach($questions as $question) {
			$options = array();
			foreach($question['Choice'] as $choice) {
				$options[$choice['id']] = $choice['content'];
			}
			$name = 'data[Question][' . $question['Question']['id'] . '][' . $activity['id'] . ']';
			echo $this->Form->input($question['Question']['id'], array('type' => 'radio', 'options' => $options, 'separator' => '<br />', 'legend' => $question['Question']['content'], 'name' => $name));
		}
	}	
	?>

<?php echo $this->Form->end(__('Submit')); ?>
