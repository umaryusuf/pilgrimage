<?php $q = mysqli_query($dbc, "SELECT * FROM pilgrim_info"); ?>
<div class="row">
	<div class="col-md-12">
		<?php if (mysqli_num_rows($q) > 0): ?>
			<div class="table-responsive" >
			<table class="table">
				<thead>
					<tr class="active">
						<th>S/NO</th>
						<th>Name</th>
						<th>Mobile</th>
						<th>Mail</th>
						<th>Address</th>
						<th>Marital Status</th>
						<th>Occupation</th>
						<th>Age</th>
						<th>Sex</th>
						<th>DOB</th>
						<th>Police Station</th>
						<th>District</th>
						<th>Fathers Name</th>
						<th>Mother Name</th>
						<th>Spouse</th>
						<th>Mahrim</th>
						<th>NIN</th>
						<th>Nationality</th>
						<th>Edit</th>
						<th>Delete:</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row = mysqli_fetch_array($q)): ?>
					<tr>
						<td><?php  echo $row["p_slno"]; ?></td>
						<td><?php  echo $row["p_name"]; ?></td>
						<td><?php  echo $row["p_mobile"]; ?></td>
						<td><?php  echo $row["p_mail"]; ?></td>
						<td><?php  echo $row["p_address"]; ?></td>
						<td><?php  echo $row["p_mstatus"]; ?></td>
						<td><?php  echo $row["p_occupation"]; ?></td>
						<td><?php  echo $row["p_age"]; ?></td>
						<td><?php  echo $row["p_sex"]; ?></td>
						<td><?php  echo $row["p_dob"]; ?></td>
						<td><?php  echo $row["p_police_station"]; ?></td>
						<td><?php  echo $row["p_district"]; ?></td>
						<td><?php  echo $row["p_fathers_name"]; ?></td>
						<td><?php  echo $row["p_mother_name"]; ?></td>
						<td><?php  echo $row["p_spouse_name"]; ?></td>
						<td><?php  echo $row["p_mahrims_name"]; ?></td>
						<td><?php  echo $row["p_nid_no"]; ?></td>
						<td><?php  echo $row["p_nationality"]; ?></td>
						<td><a href="admin.php?action=edit_pilgrim&id=<?php echo $row['pilgrim_id'] ?>">Edit</a></td>
						<td><a class="text-danger" href="admin.php?action=delete_pilgrim&id=<?php echo $row['pilgrim_id'] ?>">Delete</a></td>
					</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
		<?php endif ?>
	</div>
</div>