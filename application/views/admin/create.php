
<div class="card">
	<div class="card-header">
		<div>
			<a class="btn-sm btn-info" href="<?php echo base_url()?>admin"" >Back to List</a>
		</div>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url()?>admin/add_admin" method="post">
			<div class="text-danger"> <?php echo $error ?></div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label  class="control-label">FIRST NAME</label>
						<input required class="form-control" name="Firstname" />
						<span class="text-danger"> <?php echo form_error('Firstname') ?> </span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label  class="control-label">LAST NAME</label>
						<input name="Lastname" required class="form-control" />
						<span class="text-danger"> <?php echo form_error('Lastname') ?> </span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label  class="control-label">EMAIL</label>
						<input name="Email" required class="form-control" />
						<span class="text-danger"> <?php echo form_error('Email') ?> </span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label  class="control-label">PHONE NUMBER</label>
						<input name="PhoneNumber" required class="form-control" />
						<span class="text-danger"> <?php echo form_error('PhoneNumber') ?> </span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label">ID NO</label>
						<input type="text" name="IdNumber" required class="form-control" />
						<span class="text-danger"> <?php echo form_error('IdNumber') ?> </span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label  class="control-label">ROLE</label>
						<select name="Role" class="form-control">
							<?php
								foreach ($roles as $role)
								{
									$selected = '';
									if($_POST['Role']==$role['RoleId'])
									{
										$selected = 'selected';
									}
									echo '<option '.$selected.' value="'.$role['RoleId'].'">'.$role['RoleName'].'</option>';
								}

							?>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label  class="control-label">DISTRICT</label>
						<select name="District" class="form-control">
							<?php
							foreach ($districts as $district)
							{
								$selected = '';
								if($_POST['District']==$district['District_Id'])
								{
									$selected = 'selected';
								}
								echo '<option '.$selected.' value="'.$district['District_Id'].'">'.$district['District'].'</option>';
							}

							?>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label  class="control-label">PASSWORD</label>
						<input name="Password" required class="form-control" />
						<span class="text-danger"> <?php echo form_error('Password') ?> </span>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<input type="submit" value="Create" class="btn btn-primary" />
				</div>
			</div>
		</form>
	</div>
</div>
