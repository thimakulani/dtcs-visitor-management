<hr />
<div class="row">
	<div class="col-md-4">
		<form method="post" action="<?php echo base_url()?>settings/create_district">
			<div class="text-danger"><?php echo $error; ?></div>
			<div class="form-group">
				<label class="control-label">Name</label>
				<input name="name" class="form-control" value="<?php echo set_value('name')?>" />
				<span class="text-danger"><?php echo form_error('name') ?></span>
			</div>
			<div class="form-group">
				<input type="submit" value="Create" class="btn btn-primary" />
			</div>
		</form>
	</div>
</div>

<div>
	<a class="btn-sm btn-success" href="<?php echo base_url()?>settings/district">Back</a>
</div>
