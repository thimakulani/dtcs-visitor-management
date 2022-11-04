
<div class="container">

	<div class="card">
		<div class="card-body">


			<dl class="row">
				<dt class="col-sm-2">
					USER ID
				</dt>
				<dd class="col-sm-10">
					<?php echo $results->Percal; ?>
				</dd>
				<dt class="col-sm-2">
					Name
				</dt>
				<dd class="col-sm-10">
					<?php echo $results->Name; ?>
				</dd>
				<dt class="col-sm-2">
					LastName
				</dt>
				<dd class="col-sm-10">
					<?php echo $results->LastName; ?>
				</dd>
			</dl>
		</div>
		<div class="card-footer">
			<div class="table-responsive-sm">
				<table class="table table-bordered table-hover">
					<thead class="flex-wrap">
					<tr>
						<th scope="col">
							ID#
						</th>
						<th scope="col">
							ASSERT NAME
						</th>
						<th scope="col">
							ASSERT NUMBER
						</th>
						<th scope="col">
							TIME-IN
						</th>
						<th scope="col">
							DATE-IN
						</th>
						<th>
							SIGNED BY
						</th>
						<th>

						</th>
					</tr>
					</thead>
					<tbody>
					<?php

					foreach ($laptops as $laptop)
					{
						echo '<tr>
								<td>
									' . $laptop['Id'] . '
								</td>
								<td>
									' . $laptop['AssetName'] . '
								</td>
								<td>
									' . $laptop['AssetNumber'] . '
								</td>
								<td>
									' . $laptop['TimeIn'] . '
								</td>
								<td>
									' . $laptop['DateIn'] . '
								</td>
								<td>
									' . $laptop['SignedBy'] . '
								</td>
								<td>
									<a class="btn-sm btn-primary" href="'.base_url().'laptop/verify?id='.$laptop['Id'].'&persal='.$laptop['Percal'].'" >Verify</a>
								</td>
							</tr>';
					}

					?>


					</tbody>
				</table>
			</div>
		</div>
	</div>


</div>


