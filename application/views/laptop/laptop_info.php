<div class="container">
	<center>
		<div class="login-box">
			<div class="card">
				<div class="card-header">
					<p style="color:darkgreen" class="login-box-msg">SIGN IN TO ENTER THE BUILDING</p>
				</div>
				<div class="card-body login-card-body">

					<form method="post" action="<?php echo base_url();?>laptop/add_laptop/<?php echo $percal;?>">
						<div class="text-danger"></div>
						<div class="input-group mb-3">
							<input type="hidden" name="Percal" class="form-control" value="<?php echo $percal;?>" placeholder="Percal">
						</div>
						<div class="input-group mb-3">
							<input type="text" required name="Description" value="<?php set_value('Description') ?>" class="form-control" placeholder="Description">
						</div>
						<div class="input-group mb-3">
							<input type="text" required name="SerialNo" value="<?php set_value('SerialNo') ?>" class="form-control" placeholder="Serial Number">
						</div>
						<div class="input-group mb-3">
							<input type="text" required name="Ownership" value="<?php set_value('Ownership') ?>" class="form-control" placeholder="Ownership">
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
