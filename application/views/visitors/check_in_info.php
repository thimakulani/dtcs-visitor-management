<div class="container">
	<center>
		<div class="login-box">
			<div class="card">
				<div class="card-header">
					<p style="color:darkgreen" class="login-box-msg">SIGN IN TO ENTER THE BUILDING</p>
				</div>
				<div class="card-body login-card-body">

					<form method="post" action="<?php base_url();?>after_hour/add_laptop">
						<div class="text-danger"></div>
						<div class="input-group mb-3">
							<input disabled type="text" class="form-control" value="<?php echo $id_number;?>" placeholder="Description">
						</div>
						<div class="input-group mb-3">
							<input type="text" name="Description" class="form-control" placeholder="Description">
							<span class="text-danger"> <?php echo form_error('Description')?></span>
						</div>
						<div class="input-group mb-3">
							<input type="text" name="SerialNo" class="form-control" placeholder="Serial Number">
							<span class="text-danger"> <?php echo form_error('SerialNo')?></span>
						</div>
						<div class="input-group mb-3">
							<input type="text" name="Ownership" class="form-control" placeholder="Ownership">
							<span class="text-danger"> <?php echo form_error('Ownership')?></span>
						</div>

						<div class="social-auth-links text-center mb-3">
							<input type="submit" value="SUBMIT" class="form-control btn btn-primary" />

						</div>
					</form>
				</div>
				<!-- /.login-card-body -->
			</div>
		</div>
	</center>
</div>
