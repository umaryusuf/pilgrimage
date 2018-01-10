<div class="row">
	<div class="col-md-12">
		<div class="well">
			<h3>Manage Visa Information</h3>
		</div>
	</div>
</div>
<?php $q = mysqli_query($dbc, "SELECT * FROM visa_info"); ?>
<div class="row">
	<div class="col-md-12">
		<?php if (mysqli_num_rows($q) > 0): ?>
			<table class="table">
				<thead>
					<tr class="active">
						<th>Pilgrim</th>
						<th>Visa apply date</th>
						<th>Visa date</th>
						<th>Visa validity</th>
						<th>Visa status</th>
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
						<td><?php  echo $row["visa_apply_date"]; ?></td>
						<td><?php  echo $row["visa_date"]; ?></td>
						<td><?php  echo $row["visa_validity"]; ?></td>
						<td><?php  echo $row["visa_status"]; ?></td>
						<td><a href="admin.php?action=edit_visa&id=<?php echo $row['visa_slno'] ?>">Edit</a></td>
						<td><a class="text-danger" href="admin.php?action=delete_visa&id=<?php echo $row['visa_slno'] ?>">Delete</a></td>
					</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		<?php endif ?>
	</div>
</div>