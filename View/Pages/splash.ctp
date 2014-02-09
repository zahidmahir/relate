<div class="col-md-3"></div>
<div class="text-center col-md-6">
	<?php echo $this->Html->image('singleheart.png', array('alt' => 'Relate', 'class' => 'img-responsive')); ?>

	<hr />
	<form id="signup-in" method="post">
		<input type="text" class="form-control" placeholder="Email" name="data[User][email]">
		<input type="text" class="form-control" placeholder="Password" name="data[User][password]">
	</form>
	<br />
	<div class="btn-group btn-group-lg">
		<button type="button" id="signin" class="signup-in btn btn-primary">Sign In</button>
		<button type="button" id="joinus" class="signup-in btn btn-success">Join Us</button>
	</div>
</div>
<div class="col-md-3"></div>

<script type="text/javascript">
	$('.signup-in').on('click', function() {
		if($(this).attr('id') == 'signin') {
			$('#signup-in').attr('action', "<?php echo $this->webroot . 'users/login'; ?>").submit();
		} else {
			$('#signup-in').attr('action', "<?php echo $this->webroot . 'users/add'; ?>").submit();
		}
	});
</script>