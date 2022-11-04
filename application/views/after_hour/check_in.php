<div class="container">
	<center>
		<div class="login-box">
			<div class="card">
				<div class="card-header">
					<p style="color:darkgreen" class="login-box-msg">SIGN IN TO ENTER THE BUILDING</p>
				</div>
				<div class="card-body login-card-body">

					<form method="post" action="<?php echo base_url();?>after_hour/add_after_hour/<?php echo $percal;?>">
						<div class="text-danger"></div>
						<div class="input-group mb-3">
							<input disabled type="text" class="form-control" value="<?php echo $percal;?>" placeholder="Description">
						</div>
						<div class="input-group mb-3">
							<input type="text" required name="Purpose" class="form-control" placeholder="Purpose">
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
