<?php 
$id = $_GET["id"]; 

$get = mysqli_query($dbc,  "SELECT * FROM group_leader WHERE gl_slno='$id'");
$data = mysqli_fetch_array($get);

?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<?php
			$gl_id = $fullname = $phone = $mobile_ksa = $image = $journey_date = $return_date = $address = "";
			$gl_id_err = $fullname_err = $phone_err = $mobile_ksa_err = $image_err = $journey_date_err = $return_date_err = $address_err = "";
			$error = false;

			if (isset($_POST["edit_g_leader"])) {
				// sanitizing post variables
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				$gl_id = trim($_POST["gl_id"]);
				$fullname = trim($_POST["fullname"]);
				$phone = trim($_POST["phone"]);
				$mobile_ksa = trim($_POST["mobile_ksa"]);
				$journey_date = trim($_POST["journey_date"]);
				$return_date = trim($_POST["return_date"]);
				$address = trim($_POST["address"]);

				// validating inputs
				if (empty($gl_id)) {
					$error = true;
					$gl_id_err = "Group leader id is empty";
				}

				if (empty($fullname)) {
					$error = true;
					$fullname_err = "fullname is empty";
				}

				if (empty($phone)) {
					$error = true;
					$phone_err = "phone is empty";
				}

				if (empty($mobile_ksa)) {
					$error = true;
					$mobile_ksa_err = "mobile ksa is empty";
				}

				if (empty($journey_date)) {
					$error = true;
					$journey_date_err = "Journey date is empty";
				}

				if (empty($return_date)) {
					$error = true;
					$return_date_err = "Return date is empty";
				}

				if (empty($address)) {
					$error = true;
					$address_err = "Adress is empty";
				}

				if (!$error) {
						$sql = "UPDATE group_leader SET gl_id='$gl_id', gl_name='$fullname', gl_mob='$phone', gl_mob_ksa='$mobile_ksa', gl_add='$address', gl_journey_date='$journey_date', gl_return_date='$return_date'WHERE gl_id='$id'";

						if (mysqli_query($dbc, $sql)) {
					 		echo 
								"<div class='alert alert-success'>
								  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								  Group leader updated sucessfully. 
								</div>";
						}else{
							echo 
								"<div class='alert alert-danger'>
								  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								  <strong>Oops: </strong> Error updating data. 
								</div>";
						}
				}

			}
		?>
		<div class="well">
			<form action="admin.php?action=edit_g_leader&id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
				<fieldset>
					<legend>Edit Group Leader Form</legend>
					<div class="form-group">
						<label for="gl_id">Group Leader Id:</label>
						<input type="text" name="gl_id" id="gl_id" class="form-control" placeholder="Group leader id" value="<?php echo $data['gl_id']; ?>" required>
						<?php if (!empty($gl_id_err)): ?>
							<span class="text-danger small"><?php echo $gl_id_err; ?></span>
						<?php endif ?>
					</div>
					<div class="form-group">
						<label for="fullname">Full Name:</label>
						<input type="text" name="fullname" id="fullname" class="form-control" placeholder=" full name" value="<?php echo $data['gl_name']; ?>" required>
						<?php if (!empty($fullname_err)): ?>
							<span class="text-danger small"><?php echo $fullname_err; ?></span>
						<?php endif ?>
					</div>
					<div class="form-group">
						<label for="phone">Phone:</label>
						<input type="text" name="phone" id="phone" class="form-control" placeholder="phone number" value="<?php echo $data['gl_mob']; ?>" required>
						<?php if (!empty($phone_err)): ?>
							<span class="text-danger small"><?php echo $phone_err; ?></span>
						<?php endif ?>
					</div>
					<div class="form-group">
						<label for="mobile_ksa">Mobile KSA:</label>
						<input type="tel" name="mobile_ksa" id="mobile_ksa" class="form-control" placeholder="mobile KSA" value="<?php echo $data['gl_mob_ksa']; ?>" required>
						<?php if (!empty($mobile_ksa_err)): ?>
							<span class="text-danger small"><?php echo $mobile_ksa_err; ?></span>
						<?php endif ?>
					</div>
					<div class="form-group">
						<label for="journey_date">Journey Date:</label>
						<input type="date" name="journey_date" id="journey_date" class="form-control" value="<?php echo $data['gl_journey_date'] ?>" required>
						<?php if (!empty($journey_date_err)): ?>
							<span class="text-danger small"><?php echo $journey_date_err; ?></span>
						<?php endif ?>
					</div>
					<div class="form-group">
						<label for="return_date">Return Date:</label>
						<input type="date" name="return_date" id="return_date" value="<?php echo $data['gl_return_date']; ?>" class="form-control" required>
						<?php if (!empty($return_date_err)): ?>
							<span class="text-danger small"><?php echo $return_date_err; ?></span>
						<?php endif ?>
					</div>
					<div class="form-group">
						<label for="address">Address:</label>
						<textarea name="address" id="address" class="form-control" rows="3" placeholder="address"><?php echo $data['gl_add'] ?></textarea>
						<?php if (!empty($address_err)): ?>
							<span class="text-danger small"><?php echo $address_err; ?></span>
						<?php endif ?>
					</div>
					<button type="submit" name="edit_g_leader" class="btn btn-primary btn-block btn-lg">Update group leader</button>
				</fieldset>
			</form>
		</div>
	</div>
</div>