<h1>Delete</h1>

<h3>Are you sure you want to delete this?</h3>
<div>
	<hr />
	<dl class="row">
		<dt class = "col-sm-2">
			District Name:
		</dt>
		<dd class = "col-sm-10">
			<?php echo $name?>
		</dd>
	</dl>

	<form method="post" action="<?php echo base_url()?>settings/remove_district/<?php echo $id ?>">
		<input type="hidden" name="id" value="<?php echo $id ?>" />
		<input type="submit" value="Delete" class="btn btn-danger" /> |
		<a >Back to List</a>
	</form>
</div>
