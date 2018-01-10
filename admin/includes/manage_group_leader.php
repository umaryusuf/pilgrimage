<div class="row">
	<div class="col-md-12">
		<div class="well">
			<h3>Manage group leader</h3>
		</div>
	</div>
</div>
<?php $q = mysqli_query($dbc, "SELECT * FROM group_leader"); ?>
<div class="row">
	<div class="col-md-12">
		<?php if (mysqli_num_rows($q) > 0): ?>
			<table class="table">
				<thead>
					<tr class="active">
						<th>ID</th>
						<th>Name</th>
						<th>Mobile</th>
						<th>Mobile KSA</th>
						<th>Address</th>
						<th>Journey Date</th>
						<th>Return Date</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row = mysqli_fetch_array($q)): ?>
					<tr>
						<td><?php  echo $row["gl_id"]; ?></td>
						<td><?php  echo $row["gl_name"]; ?></td>
						<td><?php  echo $row["gl_mob"]; ?></td>
						<td><?php  echo $row["gl_mob_ksa"]; ?></td>
						<td><?php  echo $row["gl_add"]; ?></td>
						<td><?php  echo $row["gl_journey_date"]; ?></td>
						<td><?php  echo $row["gl_return_date"]; ?></td>
						<td><a href="admin.php?action=edit_g_leader&id=<?php echo $row['gl_slno'] ?>">Edit</a></td>
						<td><a class="text-danger" href="admin.php?action=delete_g_leader&id=<?php echo $row['gl_slno'] ?>">Delete</a></td>
					</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		<?php endif ?>
	</div>
</div>