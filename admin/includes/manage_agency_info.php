<?php $q = mysqli_query($dbc, "SELECT * FROM agency_info"); ?>
<div class="row">
	<div class="col-md-12">
		<?php if (mysqli_num_rows($q) > 0): ?>
			<div class="table-responsive" >
			<table class="table table-bordered">
				<thead>
					<tr class="active">
						<th>Agency Name</th>
						<th>License No</th>
						<th>Tel</th>
						<th>Mobile</th>
						<th>Mail</th>
						<th>Address</th>
						<th>Contact person</th>
						<th>Contact person mobile</th>
						<th>Contact person tel</th>
						<th>Contact person mail</th>
						<th>Contact person Address</th>
						<th>Contact person ksa</th>
						<th>Contact person ksa moblie</th>
						<th>Contact person ksa tel</th>
						<th>Contact person mail</th>
						<th>Contact person Address</th>
						<th>Edit</th>
						<th>Delete:</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row = mysqli_fetch_array($q)): ?>
					<tr>
						<td><?php  echo $row["a_name"]; ?></td>
						<td><?php  echo $row["a_license_no"]; ?></td>
						<td><?php  echo $row["a_tel_no"]; ?></td>
						<td><?php  echo $row["a_mob_no"]; ?></td>
						<td><?php  echo $row["a_mail"]; ?></td>
						<td><?php  echo $row["a_add"]; ?></td>
						<td><?php  echo $row["a_contact_person"]; ?></td>
						<td><?php  echo $row["a_contact_person_mob"]; ?></td>
						<td><?php  echo $row["a_contact_person_tel"]; ?></td>
						<td><?php  echo $row["a_contact_person_mail"]; ?></td>
						<td><?php  echo $row["a_contact_person_add"]; ?></td>
						<td><?php  echo $row["a_contact_person_ksa"]; ?></td>
						<td><?php  echo $row["a_contact_person_ksa_mob"]; ?></td>
						<td><?php  echo $row["a_contact_person_ksa_tel"]; ?></td>
						<td><?php  echo $row["a_contact_person_ksa_mail"]; ?></td>
						<td><?php  echo $row["a_contact_person_ksa_add"]; ?></td>
						<td><a href="admin.php?action=edit_agency_info&id=<?php echo $row['a_id'] ?>">Edit</a></td>
						<td><a class="text-danger" href="admin.php?action=delete_agency_info&id=<?php echo $row['a_id'] ?>">Delete</a></td>
					</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
		<?php endif ?>
	</div>
</div>