<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<?php 
		$error = false;
		$name_err = $tel_err = $mob_err = $mail_err = $add_err = $license_err = "";

		if (isset($_POST["add_agency_info"])) {
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$a_name = trim($_POST["a_name"]);
			$a_license_no = trim($_POST["a_license_no"]);
			$a_tel_no = trim($_POST["a_tel_no"]);
			$a_mob_no = trim($_POST["a_mob_no"]);
			$a_mail = trim($_POST["a_mail"]);
			$a_add = trim($_POST["a_add"]);
			$a_contact_person = trim($_POST["a_contact_person"]);
			$a_contact_person_mob = trim($_POST["a_contact_person_mob"]);
			$a_contact_person_tel = trim($_POST["a_contact_person_tel"]);
			$a_contact_person_mail = trim($_POST["a_contact_person_mail"]);
			$a_contact_person_add = trim($_POST["a_contact_person_add"]);
			$a_contact_person_ksa = trim($_POST["a_contact_person_ksa"]);
			$a_contact_person_ksa_mob = trim($_POST["a_contact_person_ksa_mob"]);
			$a_contact_person_ksa_tel = trim($_POST["a_contact_person_ksa_tel"]);
			$a_contact_person_ksa_mail = trim($_POST["a_contact_person_ksa_mail"]);
			$a_contact_person_ksa_add = trim($_POST["a_contact_person_ksa_add"]);

			if (empty($a_name)) {
				$error = true;
				$name_err = "Name is empty";
			}

			if (empty($a_license_no)) {
				$error = true;
				$license_err = "License number is empty";
			}

			if (empty($a_mob_no)) {
				$error = true;
				$mob_err = "Phone is empty";
			}

			if (!$error) {
				$sql = "INSERT INTO agency_info VALUES('$a_name', '$a_license_no', '$a_tel_no', '$a_mob_no', '$a_mail', '$a_add', '$a_contact_person', '$a_contact_person_mob', '$a_contact_person_tel', '$a_contact_person_mail', '$a_contact_person_add', '$a_contact_person_ksa', '$a_contact_person_ksa_mob', '$a_contact_person_ksa_tel', '$a_contact_person_ksa_mail', '$a_contact_person_ksa_add', '')";

				if (mysqli_query($dbc, $sql)) {
					echo 
						"<div class='alert alert-success'>
						  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						  Agency Info added sucessfully. 
						</div>";
				}else{
					echo 
						"<div class='alert alert-danger'>
						  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						  <strong>Oops: </strong> Error inserting data.
						</div>";
				}
			}
		}

		?>
		<div class="well">
			<form action="admin.php?action=add_agency_info" method="POST">
				<fieldset>
					<legend>Add Agency information form</legend>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="a_name">Agency Name:</label>
								<input type="text" name="a_name" id="a_name" class="form-control" placeholder="Agency name" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="a_license_no">Agency license NO.</label>
								<input type="text" name="a_license_no" id="a_license_no" class="form-control" placeholder="lincense number" required> 
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="a_tel_no">Agency telephone:</label>
								<input type="text" name="a_tel_no" id="a_tel_no" class="form-control" placeholder="telephone number">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="a_mob_no">Agency Mobile:</label>
								<input type="text" name="a_mob_no" id="a_mob_no" class="form-control" placeholder="phone number" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="a_mail">Agency mail:</label>
								<input type="email" name="a_mail" id="a_mail" class="form-control" placeholder="you@yourmail.com" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="a_add">Agency address:</label>
								<input type="text" name="a_add" id="a_add" class="form-control" placeholder="contact address" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="a_contact_person">Agency contact person:</label>
								<input type="text" name="a_contact_person" id="a_contact_person" class="form-control" placeholder="contact person name" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="a_contact_person_mob">Contact person phone:</label>
								<input type="tel" name="a_contact_person_mob" id="a_contact_person_mob" class="form-control" placeholder="phone number" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="a_contact_person_tel">Contact person tel.:</label>
								<input type="text" name="a_contact_person_tel" id="a_contact_person_tel" class="form-control" placeholder="telephone number">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="a_contact_person_mail">Contact person mail:</label>
								<input type="text" name="a_contact_person_mail" id="a_contact_person_mail" class="form-control" placeholder="you@yourmail.com" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="a_contact_person_add">Contact person address:</label>
								<input type="text" name="a_contact_person_add" id="a_contact_person_add" class="form-control" placeholder="address" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="a_contact_person_ksa">Contact person KSA</label>
								<input type="text" name="a_contact_person_ksa" id="a_contact_person_ksa" class="form-control" placeholder="contact person name" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="a_contact_person_ksa_mob">Contact person KSA phone:</label>
								<input type="text" name="a_contact_person_ksa_mob" id="a_contact_person_ksa_mob" class="form-control" placeholder="phone number" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="a_contact_person_ksa_tel">Contact person KSA tel.:</label>
								<input type="tel" name="a_contact_person_ksa_tel" id="a_contact_person_ksa_tel" class="form-control" placeholder="telephone number">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="a_contact_person_ksa_mail">Contact person KSA mail:</label>
								<input type="email" name="a_contact_person_ksa_mail" id="a_contact_person_ksa_mail" class="form-control" placeholder="you@yourmail.com" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="a_contact_person_ksa_add">Contact person KSA address:</label>
								<input type="text" name="a_contact_person_ksa_add" id="a_contact_person_ksa_add" class="form-control" placeholder="contact person KSA address" required>
							</div>
						</div>
					</div>
					<button type="submit" name="add_agency_info" class="btn btn-primary btn-block">Add Agency Info</
						button>
				</fieldset>
			</form>
		</div>
	</div>
</div>