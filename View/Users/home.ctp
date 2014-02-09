<div class="col-md-3"></div>
<div class="text-center col-md-6">
	<?php 
		$img = '';
		switch($current_score){
			case 0; $img = 'zerohearts.png'; break;
			case 1; $img = 'oneheart.png'; break;
			case 2; $img = 'twohearts.png'; break;
			case 3; $img = 'threehearts.png'; break;
			case 4; $img = 'fourhearts.png'; break;
			case 5; $img = 'fivehearts.png'; break;
			case 6; $img = 'sixhearts.png'; break;
			case 7; $img = 'sevenhearts.png'; break;
			case 8; $img = 'eighthearts.png'; break;
			case 9; $img = 'ninehearts.png'; break;
			case 10; $img = 'tenhearts.png'; break;
			default: break;
		}
	
		echo $this->Html->image($img, array('alt' => 'Health', 'class' => 'img-responsive')); ?>

	<hr />
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Report</h3>
		</div>
		<table class="table">

			<?php foreach($activities['current'] as $key => $activity): ?>
				<tr>
					<td><?php echo $key; ?></td>
					<td>
						<?php if($activities['current'][$key] < $activities['previous'][$key]): ?>
							<span class="glyphicon glyphicon-remove-sign"></span>
						 <?php else: ?>
							<span class="glyphicon glyphicon-ok-sign"></span>
						<?php endif; ?>
					</td>
				</tr>
			<?php endforeach; ?>

		</table>
	</div>
	<a href="#">Help</a>
</div>
<div class="col-md-3"></div>