<div class="row">
	<div class="col-md-12">
		<div class="well">
			<h3>Manage Ticket Information</h3>
		</div>
	</div>
</div>
<?php $q = mysqli_query($dbc, "SELECT * FROM ticket_flight"); ?>
<div class="row">
	<div class="col-md-12">
		<?php if (mysqli_num_rows($q) > 0): ?>
			<table class="table">
				<thead>
					<tr class="active">
						<th>Pilgrim</th>
						<th>Status</th>
						<th>Confirm date</th>
						<th>Flight No.</th>
						<th>Flight date</th>
						<th>Return date</th>
						<th>Ticket No</th>
						<th>Agency Name</th>
						<th>Destinatin</th>
						<th>Airline</th>
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
						<td><?php  echo $row["t_status"]; ?></td>
						<td><?php  echo $row["t_confirm_date"]; ?></td>
						<td><?php  echo $row["flight_no"]; ?></td>
						<td><?php  echo $row["flight_date"]; ?></td>
						<td><?php  echo $row["return_date"]; ?></td>
						<td><?php  echo $row["t_num"]; ?></td>
						<td><?php  echo $row["t_agency_name"]; ?></td>
						<td><?php  echo $row["flight_dest"]; ?></td>
						<td><?php  echo $row["airline"]; ?></td>
						<td><a href="admin.php?action=edit_ticket&id=<?php echo $row['t_slno'] ?>">Edit</a></td>
						<td><a class="text-danger" href="admin.php?action=delete_ticket&id=<?php echo $row['t_slno'] ?>">Delete</a></td>
					</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		<?php endif ?>
	</div>
</div>