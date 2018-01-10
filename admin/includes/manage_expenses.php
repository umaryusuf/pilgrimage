<div class="row">
	<div class="col-md-12">
		<div class="well">
			<h3>Manage Expenses Information</h3>
		</div>
	</div>
</div>
<?php $q = mysqli_query($dbc, "SELECT * FROM expenses"); ?>
<div class="row">
	<div class="col-md-12">
		<?php if (mysqli_num_rows($q) > 0): ?>
			<table class="table">
				<thead>
					<tr class="active">
						<th>Pilgrim</th>
						<th>Head Info</th>
						<th>Date</th>
						<th>Amount</th>
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
						<td>
							<?php 
							$hid = $row["h_id"]; 
							$gq = mysqli_query($dbc, "SELECT name FROM account_head WHERE h_id='$hid'");
							$rd = mysqli_fetch_array($gq);
							echo $rd["name"];
							?>
						</td>
						<td><?php  echo $row["date"]; ?></td>
						<td><?php  echo $row["amount"]; ?></td>
						<td><a href="admin.php?action=edit_expense&id=<?php echo $row['id'] ?>">Edit</a></td>
						<td><a class="text-danger" href="admin.php?action=delete_expense&id=<?php echo $row['id'] ?>">Delete</a></td>
					</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		<?php endif ?>
	</div>
</div>