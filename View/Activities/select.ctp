<div class="col-md-3"></div>
<div class="col-md-6">
	<div class="panel panel-default text-center">
		<div class="panel-heading">
				<h3 class="panel-title">Activities</h3>
		</div>
		<div class="panel-body">
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
		?>

		<div class="input-group">
			<span class="input-group-addon">I regularly</span>
			<?php
				echo $this->Form->input('Activity.0.id', array('type'=>'select','options'=>$options, 'label' => false, 'class' => 'form-control'));
			?>
			<span class="input-group-addon">about</span>
			<?php
				echo $this->Form->input('Activity.0.frequency', array('type'=>'select','options'=>$frequency, 'label' => false, 'class' => 'form-control'));
			?>
		</div>

		<br />

		<div class="input-group">
			<span class="input-group-addon">I regularly</span>
			<?php
				echo $this->Form->input('Activity.1.id', array('type'=>'select','options'=>$options, 'label' => false, 'class' => 'form-control'));
			?>
			<span class="input-group-addon">about</span>
			<?php
				echo $this->Form->input('Activity.1.frequency', array('type'=>'select','options'=>$frequency, 'label' => false, 'class' => 'form-control'));
			?>
		</div>

		<br />

		<div class="input-group">
			<span class="input-group-addon">I regularly</span>
			<?php
				echo $this->Form->input('Activity.2.id', array('type'=>'select','options'=>$options, 'label' => false, 'class' => 'form-control'));
			?>
			<span class="input-group-addon">about</span>
			<?php
				echo $this->Form->input('Activity.2.frequency', array('type'=>'select','options'=>$frequency, 'label' => false, 'class' => 'form-control'));
			?>
		</div>

		<br />
		<input type="submit" value="Submit" class="btn btn-default"></input>
		</div>
	</div>
</div>
<div class="col-md-3"></div>