<div class="container">
	<center>
		<div class="login-box">
			<div class="card">
				<div class="card-header">
					<p style="color:darkgreen" class="login-box-msg">LAPTOP REGISTER CHECK-OUT</p>
				</div>
				<div class="card-body login-card-body">

					<form method="post" action="<?php echo base_url();?>laptop/process_persal_checkout">
						<div class="text-danger"><?php echo $error?></div>
						<div class="input-group mb-3">
							<input type="number" name="Percal" value="<?php echo set_value('Percal')?>" class="form-control" placeholder="Percal Number">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-id-badge"></span>
								</div>
							</div>

						</div>
						<span class="text-danger"><?php echo form_error('Percal')?></span>
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
