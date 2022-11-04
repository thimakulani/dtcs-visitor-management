<div class="card">
	<div class="card-header">
		<p>
			<a class="btn-sm btn-info" href="<?php echo base_url()?>settings/add_district">Create New</a>
		</p>
	</div>
	<div div="card-body">
		<div class="table-responsive-sm">
			<table class="table table-bordered table-hover">
				<thead>
				<tr>
					<th>
						Id#
					</th>
					<th>
						Name
					</th>
					<th></th>
				</tr>
				</thead>
				<tbody>
				<?php

				foreach ($district as $dt)
				{
					echo '<tr>
								<td>
									'.$dt['District_Id'].'
								</td>
								<td>
									'.$dt['District'].'
								</td>
								<!--<td>
									<a class="btn-sm btn-primary" href="'.base_url().'settings/edit_district/'.$dt['District_Id'].'" >Edit</a> |
									<a class="btn-sm btn-info" href="'.base_url().'settings/detail_district/'.$dt['District_Id'].'" >Details</a> |
									<a class="btn-sm btn-danger" href="'.base_url().'settings/delete_district/'.$dt['District_Id'].'" >Delete</a>
								</td> -->
							</tr>';
				}
				?>


				</tbody>
			</table>
		</div>
	</div>
</div>

