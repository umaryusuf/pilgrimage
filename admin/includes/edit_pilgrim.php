<?php  
	$pid = $_GET["id"];
	$query = mysqli_query($dbc, "SELECT * FROM pilgrim_info WHERE pilgrim_id='$pid'");
	$data = mysqli_fetch_array($query);
?>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<br>
		<?php 
			$error = false;
			$sn_err = $name_err = $mobile_err = $mail_err = $address_err = $marital_status_err = $occupation_err = $age_err = $sex_err = $dob_err = $police_station_err = $district_err = $fathers_name_err = $mothers_name_err = $spouse_err = $mahrim_err = $nid_no_err = $image_err = $nationality_err = $gl_id_err = "";

			$sn = $name = $mobile = $mail = $address = $marital_status = $occupation = $age = $sex = $dob = $police_station = $district = $fathers_name = $age = $mothers_name = $spouse = $mahrim = $nid_no = $image = $nationality = $gl_id = "";

			if (isset($_POST["edit_pilgrim"])) {
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				$sn = trim($_POST["serial_no"]);
				$name = trim(ucwords($_POST["fullname"]));
				$mobile = trim($_POST["phone"]);
				$mail = trim($_POST["email"]);
				$dob = trim($_POST["dob"]);
				$occupation = trim($_POST["occupation"]);
				$police_station = trim($_POST["police_station"]);
				$district = trim($_POST["district"]);
				$nid_no = trim($_POST["national_id"]);
				$sex = trim($_POST["sex"]);
				$age = trim($_POST["age"]);
				$marital_status = trim($_POST["marital_status"]);
				$nationality = trim($_POST["nationality"]);
				$gl_id = trim($_POST["gl_id"]);
				$mahrim = trim($_POST["mahrim"]);
				$spouse = trim($_POST["spouse"]);
				$fathers_name = trim($_POST["fathers_name"]);
				$mothers_name = trim($_POST["mothers_name"]);
				$address = $_POST["address"];

				if (empty($sn)) {
					$error = true;
					$sn_err = "Serial number is empty";
				}

				if (empty($name)) {
					$error = true;
					$name_err = "Name is empty";
				}

				if (empty($mobile)) {
					$error = true;
					$mobile_err = "Mobile number is empty";
				}

				if (empty($mail)) {
					$error = true;
					$mail_err = "Email is empty";
				}

				if (empty($dob)) {
					$error = true;
					$dob_err = "Date of birth is empty";
				}

				if (empty($occupation)) {
					$error = true;
					$occupation_err = "Serial number is empty";
				}

				if(!$error){

					$sql = "UPDATE pilgrim_info SET p_slno='$sn', p_name='$name', p_mobile='$mobile', p_mail='$mail', p_address='$address', p_mstatus='$marital_status', p_occupation='$occupation', p_age='$age', p_sex='$sex', p_dob='$dob', p_police_station='$police_station', p_district='$district', p_fathers_name='$fathers_name', p_mother_name='$mothers_name', p_spouse_name='$spouse', p_mahrims_name='$mahrim', p_nid_no='$nid_no', p_nationality='nationality', gl_id='$gl_id' WHERE pilgrim_id='$pid'";
					if (mysqli_query($dbc, $sql)) {
						echo 
							"<div class='alert alert-success'>
							  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							  Pilgrim updated sucessfully. 
							</div>";
						exit;
					}else{
						echo 
							"<div class='alert alert-danger'>
							  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							  <strong>Oops: </strong> Error updating data.".mysqli_error($dbc)."
							</div>";
					}
				}
				
			}
		?>
		<div class="well">
			<form action="admin.php?action=edit_pilgrim&id=<?php echo $pid; ?>" method="POST" enctype="multipart/form-data">
				<fieldset>
					<legend>Update Pilgrim Registration Form</legend>
					<div class="row">
						<div class="col-sm-3">
							<div class="form-group">
								<label for="serial_no">Pilgrim S/No</label>
								<input name="serial_no" id="serial_no" value="<?php echo $data['p_slno']; ?>" placeholder="S/No" class="form-control" required>
							</div>
						</div>
						<div class="col-sm-5">
							<div class="form-group">
								<label for="fullname">Full Name:</label>
								<input type="text" name="fullname" id="fullname" value="<?php echo $data['p_name']; ?>" class="form-control"  placeholder="Full name" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="phone">Phone:</label>
								<input type="tel" name="phone" id="phone" value="<?php echo $data['p_mobile']; ?>" class="form-control"  placeholder="phone number" required>
							</div>
						</div>
					</div>
					<div class="row">			
						<div class="col-sm-4">
							<div class="form-group">
								<label for="email">Email:</label>
								<input type="email" name="email" id="email" value="<?php echo $data['p_mail'] ?>" class="form-control"  placeholder="email@email.com" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="dob">Date of birth:</label>
								<input type="date" name="dob" id="dob" value="<?php echo $data['p_dob']; ?>" class="form-control"  placeholder="date of birth" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="occupation">Occupation</label>
								<input type="text" name="occupation" id="occupation" class="form-control" value="<?php echo $data['p_occupation']; ?>" placeholder="occupation" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label for="police_station">Police Station:</label>
								<input type="text" name="police_station" id="police_station" placeholder="Police station" class="form-control" value="<?php echo $data['p_police_station']; ?>" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="district">District:</label>
								<input type="text" name="district" id="district" placeholder="District" class="form-control" value="<?php  echo $data['p_district']; ?>" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="national_id">National ID Number:</label>
								<input type="text" name="national_id" id="national_id" placeholder="National ID" class="form-control" value="<?php echo $data['p_nid_no']; ?>" required>
							</div>
						</div>
					</div>
					<div class="row">					
						<div class="col-sm-4">
							<div class="form-group">
								<label for="sex">Sex:</label>
								<select name="sex" id="sex" class="form-control">
									<option value="<?php echo $data['p_sex'] ?>"><?php echo $data['p_sex'] ?></option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="marital_status">Marital Status:</label>
								<select name="marital_status" id="marital_status" class="form-control">
									<option value="<?php echo $data['p_mstatus']; ?>"><?php echo $data['p_mstatus']; ?></option>
									<option value="Single">Single</option>
									<option value="Married">Married</option>
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="nationality">Nationality:</label>
								<input type="text" name="nationality" id="nationality" class="form-control" value="<?php echo $data['p_nationality']; ?>" placeholder="Nationality">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<div class="form-group">
								<label for="age">Age:</label>
								<input type="number" name="age" id="age" value="<?php echo $data['p_age']; ?>" class="form-control" placeholder="age" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="gl_id">Group Leader:</label>
								<select type="text" name="gl_id" id="gl_id" class="form-control">
									<option value="<?php echo $data['gl_id'] ?>"><?php echo $data['gl_id'] ?></option>
									<?php  
										$q = mysqli_query($dbc, "SELECT gl_id, gl_name FROM group_leader");
										if (mysqli_num_rows($q) > 0) {
											while ($r = mysqli_fetch_array($q)) {
									?>
									<option value="<?php echo $r['gl_id'] ?>"><?php echo $r["gl_name"]; ?></option>
									<?php
											}
										}
									?>
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="mahrim">Mahrims Name:</label>
								<input type="text" name="mahrim" id="mahrim" class="form-control" value="<?php echo $data['p_mahrims_name']; ?>" placeholder="Mahrims Name" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label for="spouse">Spouse Name:</label>
								<input type="text" name="spouse" id="spouse" class="form-control" value="<?php echo $data['p_spouse_name']; ?>" placeholder="spouse name" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="fathers_name">Fathers Name:</label>
								<input type="text" name="fathers_name" id="fathers_name" class="form-control" value="<?php echo $data['p_fathers_name']; ?>" placeholder="fathers name" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="mothers_name">Mothers Name:</label>
								<input type="text" name="mothers_name" id="mothers_name" class="form-control" value="<?php echo $data['p_mother_name'] ?>" placeholder="mothers name" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="address">Address:</label>
						<textarea name="address" id="address" rows="2" class="form-control" placeholder="address" required><?php echo $data["p_address"]; ?></textarea>
					</div>
					<button type="submit" class="btn btn-primary btn-block btn-lg" name="edit_pilgrim">Update pilgrim Info</button>
				</fieldset>
			</form>
		</div>
	</div>
</div>