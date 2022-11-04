<p>
	<a href="<?php echo base_url()?>visitor/create" class="btn-sm btn-primary">Create New</a>
	<a href="<?php echo base_url()?>visitor/check_in" class="btn-sm btn-info">Check-In</a>
</p>
<div>
	<div class="table-responsive-sm">
		<table class="table table-bordered table-hover">
			<thead class="flex-wrap">
			<tr>
				<th scope="col">
					ID
				</th>
				<th scope="col">
					IDENTITY
				</th>
				<th scope="col">
					NAME
				</th>
				<th scope="col">
					SURNAME
				</th>
				<th scope="col">
					PHONE
				</th>
				<th scope="col">
					ADDRESS
				</th>
				<th></th>
			</tr>
			</thead>
			<tbody>
			<?php

			foreach ($visitors as $v)
			{
				echo '<tr>
								<td>
									' . $v['Id'] . '
								</td>
								<td>
									' . $v['IdNumber'] . '
								</td>
								<td>
									' . $v['Name'] . '
								</td>
								<td>
									' . $v['LastName'] . '
								</td>
								<td>
									' . $v['PhoneNumber'] . '
								</td>
								<td>
									' . $v['Address'] . '
								</td>
								<td>
									<a href="'.base_url().'visitor/edit/' . $v['Id'] . '" class="btn-sm btn-info">Edit</a>
								</td>
							</tr>';
			}

			?>


			</tbody>
		</table>
	</div>
</div>
