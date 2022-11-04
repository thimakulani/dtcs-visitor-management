
	<p>
		<a class="btn-sm btn-info" href="<?php base_url() ?>employee/create">Create New</a>
	</p>
	<div>
		<div class="table-responsive-md">
			<table class="table table-bordered table-hover">
				<thead>
				<tr>

					<th>
						Id
					</th>
					<th>
						Persal
					</th>
					<th>
						FirstName
					</th>
					<th>
						LastName
					</th>
					<th>
						Business Unit
					</th>
					<th>
						Extension
					</th>

					<th></th>
				</tr>
				</thead>
				<tbody>

				<?php
					foreach ($employees as $emp)
					{
						echo '
							<tr>
								<td>
									'.$emp['Id'].'
								</td>
								<td>
									'.$emp['Percal'].'
								</td>
								<td>
									'.$emp['Name'].'
								</td>
								<td>
									'.$emp['LastName'].'
								</td>
								<td>
									'.$emp['BusinessUnit'].'
								</td>
								<td>
									'.$emp['Extension'].'
								</td>
								
							</tr>
						
						
						';
					}

				?>

				</tbody>
			</table>
		</div>
	</div>
