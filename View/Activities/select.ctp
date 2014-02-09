<div class="activities index">
	<h2><?php echo __('Activities'); ?></h2>
	<table cellpadding="0" cellspacing="0">
		<tr>
				<th><?php echo 'name'; ?></th>
				<th><?php echo 'frequency'; ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($activities as $activity): ?>
		<tr>
			<td><?php echo h($activity['Activity']['name']); ?>&nbsp;</td>
			<td><?php echo h($activity['Activity']['frequency']); ?>&nbsp;</td>
			<td class="actions">
				<a class="add_action" href="#" id="<?php echo $activity['Activity']['id']; ?>">Select</a>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>

<script type="text/javascript">
	$('.add_action').on('click', function() {
		var id = $(this).attr('id');
		$.post("<?php echo $this->webroot;?>users/add_activity/" + id);
	});	
</script>