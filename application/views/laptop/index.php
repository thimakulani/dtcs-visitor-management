<p>
	<a href="<?php echo base_url()?>laptop/laptop_check_in" class="btn-sm btn-info">Check-In</a>
	<a href="<?php echo base_url()?>laptop/laptop_check_out" class="btn-sm btn-info">Check-Out</a>
</p>
<div>
	<div class="table-responsive-sm">
		<table class="table table-bordered table-hover">
			<thead class="flex-wrap">
			<tr>
				<th scope="col">
					ID#
				</th>
				<th scope="col">
					FIRSTNAME
				</th>
				<th scope="col">
					LASTNAME
				</th>
				<th scope="col">
					PERCAL
				</th>
				<th scope="col">
					DESCRIPTION
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
									' . $laptop['Name'] . '
								</td>
								<td>
									' . $laptop['LastName'] . '
								</td>
								<td>
									' . $laptop['Percal'] . '
								</td>
								<td>
									' . $laptop['AssetName'] . '
								</td>
								<td>
									' . $laptop['AssetNumber'] . '
								</td>
								<td>
									' . substr($laptop['TimeIn'],0,5) . '
								</td>
								<td>
									' . $laptop['DateIn'] . '
								</td>
								<td>
									' . $laptop['SignedBy'] . '
								</td>
							</tr>';
			}

			?>


			</tbody>
		</table>
	</div>
</div>
