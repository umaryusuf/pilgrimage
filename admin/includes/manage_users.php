<div class="row">
	<div class="col-md-12">
		<div class="well">
			<h3>Manage Users Information</h3>
		</div>
	</div>
</div>
<?php $q = mysqli_query($dbc, "SELECT * FROM user_admin"); ?>
<div class="row">
	<div class="col-md-12">
		<?php if (mysqli_num_rows($q) > 0): ?>
			<table class="table">
				<thead>
					<tr class="active">
						<th>Pilgrim</th>
						<th>Username</th>
						<th>User Password</th>
						<th>User status</th>
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
						<td><?php  echo $row["u_name"]; ?></td>
						<td><?php  echo $row["u_psw"]; ?></td>
						<td><?php  echo $row["u_status"]; ?></td>
						<td><a href="admin.php?action=edit_user&id=<?php echo $row['u_id'] ?>">Edit</a></td>
						<td><a class="text-danger" href="admin.php?action=delete_user&id=<?php echo $row['u_id'] ?>">Delete</a></td>
					</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		<?php endif ?>
	</div>
</div>