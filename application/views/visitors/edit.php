<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				<!-- Profile Image -->
				<div class="card card-primary card-outline">
					<div class="card-body box-profile">
						<div class="text-center">
							<img class="profile-user-img img-fluid img-circle"
								 src="<?php base_url() ?>/"
								 alt="User profile picture">
						</div>
						<ul class="list-group list-group-unbordered mb-3">
							<li class="list-group-item">
								<b>First Name</b> <a class="float-right"><?php echo $visitor->Name ?></a>
							</li>
							<li class="list-group-item">
								<b>Last Name</b> <a class="float-right"><?php echo $visitor->LastName ?></a>
							</li>
							<li class="list-group-item">
								<b>Phone Number</b> <a class="float-right"><?php echo $visitor->PhoneNumber ?></a>
							</li>
							<li class="list-group-item">
								<b>Identification</b> <a class="float-right"><?php echo $visitor->IdNumber ?></a>
							</li>
							<li class="list-group-item">
								<b>Address</b> <a class="float-right"><?php echo $visitor->Address ?></a>
							</li>
						</ul>

					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->

			</div>
			<!-- /.col -->
			<div class="col-md-9">
				<div class="card">
					<div class="card-header p-2">
						<ul class="nav nav-pills">
							<li class="nav-item"><a class="nav-link active" href="#PROFILE" data-toggle="tab">PROFILE</a></li>
							<li class="nav-item"><a class="nav-link" href="#HISTORY" data-toggle="tab">CHECK-IN HISTORY</a></li>
						</ul>
					</div><!-- /.card-header -->
					<div class="card-body">
						<div class="tab-content">
							<div class="active tab-pane" id="PROFILE">
								<!-- Post -->
								<form class="form-horizontal" method="post" action="<?php echo base_url();?>visitor/update/<?php echo $visitor->Id; ?>">
									<div class="form-group row">
										<label  class="col-sm-2 col-form-label">First Name</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" value="<?php echo $visitor->Name ?>" name="firstname" placeholder="First Name" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Last Name</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" value="<?php echo $visitor->LastName ?>"  name="lastname" placeholder="Last Name" />
										</div>
									</div>

									<div class="form-group row">
										<label  class="col-sm-2 col-form-label">Phone Number</label>
										<div class="col-sm-10">
											<input class="form-control" name="phone" value="<?php echo $visitor->PhoneNumber ?>"  placeholder="Phone#" />
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Identification</label>
										<div class="col-sm-10">
											<input class="form-control" name="identification" value="<?php echo $visitor->IdNumber ?>"  placeholder="Identification" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Address</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="address" value="<?php echo $visitor->Address ?>"  placeholder="Address" />
										</div>
									</div>
									<div class="form-group row">
										<div class="offset-sm-2 col-sm-10">
											<input type="submit" class="btn-sm btn-danger" />
										</div>
									</div>
								</form>
								<!-- /.post -->
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="HISTORY">
								<!-- The timeline -->
								<div>
									<div class="table-responsive">

										<table class="table">
											<thead>
											<tr>
												<th>
													ID
												</th>
												<th>
													DATE-IN
												</th>
												<th>
													TIME-IN
												</th>
												<th>
													SIGNED IN BY
												</th>

											</tr>
											</thead>
											<tbody>
											<?php
												foreach ($check_in as $ch)
												{
													echo '
														<tr>
															<td>
																'.$ch['Id'].'
															</td>
															<td>
																'.$ch['DateIn'].'
															</td>
															<td>
																'.$ch['TimeIn'].'
															</td>
															<td>
																'.$ch['SignedBy'].'
															</td>
			
														</tr>
													
													
													';
												}


											?>


											</tbody>
										</table>
									</div>

								</div>
							</div>
							<!-- /.tab-pane -->
							<!-- /.tab-pane -->
						</div>
						<!-- /.tab-content -->
					</div><!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</div><!-- /.container-fluid -->
</section>
