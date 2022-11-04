
<div>
	<p>
		<a href="<?php echo base_url()?>reports" class="btn-sm btn-info">Back</a>
	</p>
	<div class="card-header">
		<form method="post" action="<?php echo base_url() ?>reports/query_visitor" class="form-inline">
			<select name="district" required class="form-control m-2">
				<option value="0"  selected>ALL DISTRICTS</option>
				<?php
				$selectedDistrict = 'ALL DISTRICTS';
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
			<label> DATES FROM
				<input required value="<?php echo set_value('start_dates');?>"
					   name="start_dates" class="form-control m-2" type="date" />
			</label>

			<label> TO
				<input required name="end_dates" value="<?php echo set_value('end_dates');?>" class="form-control m-2" type="date" />
			</label>
			<input type="submit" class="btn btn-primary m-2" value="Query" />
			<a type="submit" class="btn btn-primary m-2" onclick="printDiv('visitor_sheet')">Generate Report</a>

		</form>
	</div>
	<div class="table-responsive-sm" id="visitor_sheet">
		<div class="form-inline">
			<p class="m-2"><strong>DISTRICT:</strong> <?php echo $selectedDistrict?> </p>
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
					PERCAL
				</th>
				<th scope="col">
					TIME-IN
				</th>
				<th scope="col">
					DATE-IN
				</th>
			</tr>
			</thead>
			<tbody>
			<?php

			foreach ($visitor_sheet as $v)
			{
				echo '<tr>
								<td>
									' . $v['Id'] . '
								</td>
								<td>
									' . $v['Name'] . '
								</td>
								<td>
									' . $v['LastName'] . '
								</td>
								<td>
									' . $v['IdNumber'] . '
								</td>
								
								<td>
									' . substr($v['TimeIn'],0,5) . '
								</td>
								<td>
									' . $v['DateIn'] . '
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
