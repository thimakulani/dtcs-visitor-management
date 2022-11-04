<div class="card">
	<div class="card-header">
		<a class="btn btn-primary" href="<?php echo base_url()?>after_hour">Back</a>
	</div>

	<form method="post" action="<?php echo site_url('after_hour/register_employees'); ?>">
		<div class="card-body">

			<span class="text-danger">
						<?php echo $error; ?>
					</span>
			<div class="row">

				<div class="col-md-4">
					<div class="form-group">
						<label >NAME</label>
						<input type="text" name="firstname" class="form-control" value="<?php echo set_value('firstname'); ?>"  style="width: 100%;" />
						<span class="text-danger"> <?php echo form_error('firstname') ?> </span>
					</div>

				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>LAST-NAME</label>
						<input type="text" class="form-control" name="lastname" value="<?php echo set_value('lastname'); ?>"  style="width: 100%;" />
						<span class="text-danger"> <?php echo form_error('lastname') ?> </span>
					</div>

				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>PERCAL NUMBER</label>
						<input type="number" name="percal" value="<?php echo set_value('percal'); ?>" class="form-control" style="width: 100%;" />
						<span class="text-danger"> <?php echo form_error('percal') ?> </span>
					</div>

				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>BUSINESS UNIT</label>
						<input type="text" name="business_unit" value="<?php echo set_value('business_unit'); ?>" class="form-control" style="width: 100%;" />
						<span class="text-danger"> <?php echo form_error('business_unit') ?> </span>
					</div>

				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>EXTENSION</label>
						<input type="text" name="extension" value="<?php echo set_value('extension'); ?>" class="form-control" style="width: 100%;" />
						<span class="text-danger"> <?php echo form_error('extension') ?> </span>
					</div>

				</div>
			</div>
			<div class="card-footer">
				<input type="submit" class="btn btn-primary" value="SUBMIT" />
			</div>
		</div>
	</form>
</div>
