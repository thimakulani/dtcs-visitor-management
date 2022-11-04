<h1>Details</h1>

<div>
	<hr />
	<dl class="row">
		<dt class = "col-sm-2">
			District Name
		</dt>
		<dd class = "col-sm-10">
			<?php echo $name?>
		</dd>
	</dl>
</div>
<div>
	<a class="btn-sm btn-primary" href="<?php echo base_url()?>settings/edit_district/<?php echo $id;?>">Edit</a> |
	<a class="btn-sm btn-primary" href="<?php echo base_url()?>settings/district">Back to List</a>
</div>
