
<div>
	<p>
		<a href="<?php echo base_url()?>reports" class="btn-sm btn-info">Back</a>
	</p>
	<div class="card-header">
		<form method="post" action="<?php echo base_url() ?>reports/query_laptops" class="form-inline">
			<select name="district" required class="form-control m-2">
				<option value="0" selected>ALL DISTRICTS</option>
				<?php
				$selectedDistrict = '0';
				foreach ($district as $d)
				{
					$selected = '';
					if($_POST['district'] == $d['District_Id'])
					{
						$selected = 'selected';
						$selectedDistrict = $d['District'];
					}
					echo '<option '.$selected.' value="'.$d['District_Id'].'">'.$d['District'].'</option>';
				}
				?>
			</select>
			<label> Dates From
				<input class="form-control m-2" required name="start_dates" value="<?php echo set_value('start_dates');?>" type="date" />
			</label>

			<label> To
				<input class="form-control m-2" required type="date" name="end_dates" value="<?php echo set_value('end_dates');?>" />
			</label>
			<input type="submit" class="btn btn-primary m-2" value="Query" />
			<a type="submit" class="btn btn-primary m-2" onclick="printDiv('laptop_sheet')">Generate Report</a>

		</form>
	</div>
	<div class="table-responsive-sm" id="laptop_sheet">
		<div>
			<p><strong>DISTRICT: </strong></p>
		</div>
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
					PERSAL
				</th>
				<th scope="col">
					DESCRIPTION
				</th>
				<th scope="col">
					ASSET NUMBER
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

<script>
	function printDiv(divName)
	{
		const printContents = document.getElementById(divName).innerHTML;
		const originalContents = document.body.innerHTML;

		document.body.innerHTML = printContents;

		window.print();

		document.body.innerHTML = originalContents;
	}
</script>
