<p>
	<a class="btn-sm btn-info" href="<?php echo base_url()?>admin/create">Create New</a>
</p>
<div>
	<div class="table-responsive-md">
		<table class="table table-bordered table-hover">
			<thead>
			<tr>
				<th>
					ID#
				</th>
				<th>
					FIRSTNAME
				</th>
				<th>
					LASTNAME
				</th>
				<th>
					EMAIL
				</th>
				<th>
					PHONE NUMBER
				</th>
				<th>
					IDENTIFICATION
				</th>

				<th>ROLE</th>
				<th>USER STATUS</th>
				<th>DISTRICT</th>
				<th></th>
			</tr>
			</thead>
			<?php
			foreach ($admin as $adm) {
				echo '
					<tbody>
	
						<tr>
							<td>
								' . $adm['Id'] . '
							</td>
							<td>
								' . $adm['Name'] . '
							</td>
							<td>
								' . $adm['Lastname'] . '
							</td>
								
							<td>
								' . $adm['Email'] . '
								
								
							</td>
		
							<td>
								' . $adm['PhoneNumber'] . '
								
							</td>
							<td>' . $adm['IdNumber'] . '</td>
							<td>' . $adm['RoleName'] . '</td>
							<td>' . $adm['AccountStatus'] . '</td>
							<td>' . $adm['District'] . '</td>
							<td>
								<a class="btn-sm btn-danger" style="display:none" href="<?php echo base_url()?>admin/delete">Delete</a>
							</td>
						</tr>
		
						</tbody>
					';
			}
				?>

		</table>
	</div>
</div>
