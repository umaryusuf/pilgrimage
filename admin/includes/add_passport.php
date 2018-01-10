<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<br>
		<?php
		$error = false;
		$pilgrim_id_err = $pp_num_err = $pp_valid_date_Err = $pp_issue_date_err = $pp_office_name_err = $pp_status_err = "";

		$pilgrim_id = $pp_num = $pp_valid_date = $pp_issue_date = $pp_office_name = $pp_status = "";

		if (isset($_POST["add_passport"])) {
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$pilgrim_id = $_POST["pilgrim_id"];
			$pp_num = trim($_POST["pp_num"]);
			$pp_valid_date = $_POST["pp_valid_date"];
			$pp_issue_date = $_POST["pp_issue_date"];
			$pp_office_name = trim($_POST["pp_office_name"]);
			$pp_status = trim($_POST["pp_status"]);

			if (empty($pilgrim_id)) {
				$error = true;
				$pilgrim_id_err = "Pilgrim Not selected";
			}

			if (empty($pp_num)) {
				$error = true;
				$pp_num_err = "Passport number is empty";
			}

			if (empty($pp_valid_date)) {
				$error = true;
				$pp_valid_date_err = "Passport valid date is empty";
			}

			if (empty($pp_issue_date)) {
				$error = true;
				$pp_issue_date_err = "Passport issue date is empty";
			}

			if (empty($pp_office_name)) {
				$error = true;
				$pp_office_name_err = "Passport office name is empty";
			}

			if (empty($pp_status)) {
				$error = true;
				$pp_status_err = "Passport status is empty";
			}

			// if no error
			if (!$error) {
				
				$sql = "INSERT INTO passport_info(pilgrim_id, pp_num, pp_valid_date, pp_issue_date, pp_office_name, pp_status) VALUES('$pilgrim_id', '$pp_num', '$pp_valid_date', '$pp_issue_date', '$pp_office_name', '$pp_status')";

				if (mysqli_query($dbc, $sql)) {
					echo 
						"<div class='alert alert-success'>
						  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						  Passport added sucessfully. 
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
			<form method="POST" action="admin.php?action=add_passport">
				<fieldset>
					<legend>Add Passport form</legend>
					<div class="form-group">
						<label for="pilgrim_id">Select Pilgrim:</label>
						<select name="pilgrim_id" id="pilgrim_id" value="" class="form-control">
							<option value="">-- select --</option>
						<?php  
							$gq = mysqli_query($dbc, "SELECT pilgrim_id, p_name FROM pilgrim_info");
							while ($rd = mysqli_fetch_array($gq)) {
						?>
							<option value="<?php echo $rd['pilgrim_id'] ?>"><?php echo $rd["p_name"]; ?></option>
						<?php
							}
						?>
						</select>
					</div>
					<div class="form-group">
						<label for="pp_num">Passport Number:</label>
						<input type="text" name="pp_num" id="pp_num" value="" class="form-control" placeholder="Passport number" required>
					</div>
					<div class="form-group">
						<label for="pp_valid_date">Passport valid date:</label>
						<input type="date" name="pp_valid_date" id="pp_valid_date" value="" class="form-control"required>
					</div>
					<div class="form-group">
						<label for="pp_issue_date">Passport issue date:</label>
						<input type="date" name="pp_issue_date" id="pp_issue_date" value="" class="form-control" placeholder="" required>
					</div>
					<div class="form-group">
						<label for="pp_office_name">Office Name:</label>
						<input type="text" name="pp_office_name" id="pp_office_name" value="" class="form-control" placeholder="Passport office name" required>
					</div>
					<div class="form-group">
						<label for="pp_status">Passport Status:</label>
						<input type="text" name="pp_status" id="pp_status" value="" class="form-control" placeholder="Passport status" required>
					</div>
					<button class="btn btn-block btn-primary" type="submit" name="add_passport">Add Passport</button>
				</fieldset>
			</form>
		</div>
	</div>
</div>