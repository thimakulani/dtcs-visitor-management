<p>
	<a href="<?php echo base_url()?>after_hour/after_hour_check" class="btn-sm btn-info">Check-In</a>
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
					PURPOSE
				</th>

				<th scope="col">
					TIME-IN
				</th>
				<th scope="col">
					DATE-IN
				</th>
				<th></th>
			</tr>
			</thead>
			<tbody>
			<?php

			foreach ($after_hour as $ao)
			{
				echo '<tr>
								<td>
									' . $ao['Id'] . '
								</td>
								<td>
									' . $ao['Name'] . '
								</td>
								<td>
									' . $ao['LastName'] . '
								</td>
								<td>
									' . $ao['Percal'] . '
								</td>
								<td>
									' . $ao['Purpose'] . '
								</td>
								<td>
									' . substr($ao['TimeIn'],0,5) . '
								</td>
								<td>
									' . $ao['DateIn'] . '
								</td>
								
							</tr>';
			}

			?>


			</tbody>
		</table>
	</div>
</div>
