<div class="row">
	<div class="col-md-12">
		<div class="well">
			<h3>Manage Account Head Information</h3>
		</div>
	</div>
</div>
<?php $q = mysqli_query($dbc, "SELECT * FROM account_head"); ?>
<div class="row">
	<div class="col-md-12">
		<?php if (mysqli_num_rows($q) > 0): ?>
			<table class="table">
				<thead>
					<tr class="active">
						<th>Name</th>
						<th>Desciption</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row = mysqli_fetch_array($q)): ?>
					<tr>
						<td><?php  echo $row["name"]; ?></td>
						<td><?php  echo $row["description"]; ?></td>
						<td><a href="admin.php?action=edit_account_head&id=<?php echo $row['h_id'] ?>">Edit</a></td>
						<td><a class="text-danger" href="admin.php?action=delete_account_head&id=<?php echo $row['h_id'] ?>">Delete</a></td>
					</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		<?php endif ?>
	</div>
</div>