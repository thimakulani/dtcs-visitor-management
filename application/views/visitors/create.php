<div class="card">
	<div class="card-header">
		<a class="btn btn-primary" href="<?php echo base_url()?>visitor">Back</a>
	</div>

	<form method="post" action="<?php echo site_url('visitor/process_register'); ?>">
		<div class="card-body">

			<span class="text-danger">
						<?php echo $error; ?>
					</span>
			<div class="row">

				<div class="col-md-6">
					<div class="form-group">
						<label >NAME</label>
						<input type="text" name="firstname" class="form-control" value="<?php echo set_value('firstname'); ?>"  style="width: 100%;" />
						<span class="text-danger"> <?php echo form_error('firstname') ?> </span>
					</div>
					<!-- /.form-group -->
					<div class="form-group">
						<label>LAST-NAME</label>
						<input type="text" class="form-control" name="lastname" value="<?php echo set_value('lastname'); ?>"  style="width: 100%;" />
						<span class="text-danger"> <?php echo form_error('lastname') ?> </span>
					</div>
					<!-- /.form-group -->
				</div>
				<!-- /.col -->
				<div class="col-md-6">
					<div class="form-group">
						<label>PHONE NUMBER</label>
						<input type="number" name="phone_number" value="<?php echo set_value('phone_number'); ?>" class="form-control" style="width: 100%;" />
						<span class="text-danger"> <?php echo form_error('phone_number') ?> </span>
					</div>
					<!-- /.form-group -->
					<div class="form-group">
						<label>IDENTIFICATION</label>
						<input type="text" name="id" value="<?php echo set_value('id'); ?>" class="form-control"  style="width: 100%;" />
						<span class="text-danger"> <?php echo form_error('id') ?> </span>
					</div>
					<!-- /.form-group -->
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>ADDRESS</label>
						<input type="text" name="address" value="<?php echo set_value('address'); ?>" class="form-control"  style="width: 100%;" />
						<span class="text-danger"> <?php echo form_error('address') ?> </span>
					</div>

				</div>

				<!-- /.col -->

			</div>
			<div class="card-footer">
				<input type="submit" class="btn btn-primary" value="SUBMIT" />
			</div>
		</div>
	</form>
</div>
