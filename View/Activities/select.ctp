<?php
	$options = array();
	$frequency = array(
		'1' => 'Once a week',
		'4' => 'Several times a week',
		'7' => 'Daily'
	);

	echo $this->Form->create('Activity', array('controller' => 'Activities', 'action' => 'select'));
	foreach ($activities as $activity) {
		$options[$activity['Activity']['id']] = $activity['Activity']['name'];
	}
	
	echo $this->Form->input('Activity.0.id', array('type'=>'select','options'=>$options, 'label' => 'Activity 1'));
	echo $this->Form->input('Activity.0.frequency', array('type'=>'select','options'=>$frequency, 'label' => 'Frequency'));

	echo $this->Form->input('Activity.1.id', array('type'=>'select','options'=>$options, 'label' => 'Activity 2'));
	echo $this->Form->input('Activity.1.frequency', array('type'=>'select','options'=>$frequency, 'label' => 'Frequency'));

	echo $this->Form->input('Activity.2.id', array('type'=>'select','options'=>$options, 'label' => 'Activity 3'));
	echo $this->Form->input('Activity.2.frequency', array('type'=>'select','options'=>$frequency, 'label' => 'Frequency'));
	
	echo $this->Form->end(__('Submit'));

?>
