<div class="row">
	<div class="col-md-12">
		<div class="well">
			<h3>Manage package Information</h3>
		</div>
	</div>
</div>
<?php $q = mysqli_query($dbc, "SELECT * FROM package_info"); ?>
<div class="row">
	<div class="col-md-12">
		<?php if (mysqli_num_rows($q) > 0): ?>
			<table class="table">
				<thead>
					<tr class="active">
						<th>Pilgrim</th>
						<th>Package Name</th>
						<th>Package rate</th>
						<th>Category</th>
						<th>Package option</th>
						<th>Flight date</th>
						<th>Return date</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row = mysqli_fetch_array($q)): ?>
					<tr>
						<td>
							<?php
								$gp = mysqli_query($dbc, "SELECT p_name FROM pilgrim_info WHERE pilgrim_id=".$row["pilgrim_id"]);
								$arr = mysqli_fetch_array($gp);
								echo $arr["p_name"]; 
							?>
						</td>
						<td><?php  echo $row["pk_name"]; ?></td>
						<td><?php  echo $row["pk_rate"]; ?></td>
						<td><?php  echo $row["pk_cat"]; ?></td>
						<td><?php  echo $row["pk_option"]; ?></td>
						<td><?php  echo $row["fdate"]; ?></td>
						<td><?php  echo $row["rdate"]; ?></td>
						<td><a href="admin.php?action=edit_package&id=<?php echo $row['pk_slno'] ?>">Edit</a></td>
						<td><a class="text-danger" href="admin.php?action=delete_package&id=<?php echo $row['pk_slno'] ?>">Delete</a></td>
					</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		<?php endif ?>
	</div>
</div>