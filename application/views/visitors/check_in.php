<div class="container">
	<center>
		<div class="login-box">
			<div class="card">
				<div class="card-header">
					<p style="color:darkgreen" class="login-box-msg">SIGN IN TO ENTER THE BUILDING</p>
				</div>
				<div class="card-body login-card-body">

					<form method="post" action="<?php echo base_url();?>visitor/process_id">
						<div class="text-danger"></div>
						<div class="input-group mb-3">
							<input type="number" name="IdNumber" value="<?php echo set_value('IdNumber')?>" class="form-control" placeholder="Id Number">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-id-badge"></span>
								</div>
							</div>

						</div>
						<span class="text-danger"><?php echo form_error('IdNumber')?></span>
						<div class="card" >
							<p class="card-body" style="text-align: justify;">
								Don't worry you don't have to provide all details again. Just provide us with your percal number and whom you are here to see.
							</p>
						</div>
						<div class="social-auth-links text-center mb-3">
							<input type="submit" value="CHECK-IN" class="form-control btn btn-primary" />
						</div>
					</form>
				</div>
				<!-- /.login-card-body -->
			</div>
		</div>
	</center>
</div>
