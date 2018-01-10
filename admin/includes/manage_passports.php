<div class="row">
	<div class="col-md-12">
		<div class="well">
			<h3>Manage Passports</h3>
		</div>
	</div>
</div>
<?php $q = mysqli_query($dbc, "SELECT * FROM passport_info"); ?>
<div class="row">
	<div class="col-md-12">
		<?php if (mysqli_num_rows($q) > 0): ?>
			<table class="table">
				<thead>
					<tr class="active">
						<th>Pilgrim</th>
						<th>Passport Num.</th>
						<th>Issue data</th>
						<th>Valide date</th>
						<th>Office name</th>
						<th>Status</th>
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
						<td><?php  echo $row["pp_num"]; ?></td>
						<td><?php  echo $row["pp_issue_date"]; ?></td>
						<td><?php  echo $row["pp_valid_date"]; ?></td>
						<td><?php  echo $row["pp_office_name"]; ?></td>
						<td><?php  echo $row["pp_status"]; ?></td>
						<td><a href="admin.php?action=edit_passport&id=<?php echo $row['pp_slno'] ?>">Edit</a></td>
						<td><a class="text-danger" href="admin.php?action=delete_passport&id=<?php echo $row['pp_slno'] ?>">Delete</a></td>
					</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		<?php endif ?>
	</div>
</div>