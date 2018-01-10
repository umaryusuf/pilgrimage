<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<?php  
		$error = false;
		$pilgrim_id_err = $pk_name_err = $pk_rate_err = $pk_cat_err = $pk_option_err = $f_date_err = $r_date_err = "";

		if (isset($_POST["add_package"])) {
			// sanitize post variable
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$pilgrim_id = $_POST["pilgrim_id"];
			$pk_name = trim($_POST["pk_name"]);
			$pk_rate = trim($_POST["pk_rate"]);
			$pk_cat = trim($_POST["pk_cat"]);
			$pk_option = trim($_POST["pk_option"]);
			$f_date = trim($_POST["f_date"]);
			$r_date = trim($_POST["r_date"]);

			if (empty($pk_name)) {
				$error = true;
				$pk_name_err = "Package name is empty";
			}

			if (empty($pk_rate)) {
				$error = true;
				$pk_rate_err = "Package rate is empty";
			}

			if (empty($f_date)) {
				$error = true;
				$f_date_err = "Flight date is empty";
			}

			if (empty($r_date)) {
				$error = true;
				$r_date_err = "Return date is empty";
			}

			// if no error
			if (!$error) {
				$sql = "INSERT INTO package_info(pilgrim_id, pk_name, pk_rate, pk_cat, pk_option, fdate, rdate) VALUES('$pilgrim_id', '$pk_name', '$pk_rate', '$pk_cat', '$pk_option', '$f_date', '$r_date')";

				if (mysqli_query($dbc, $sql)) {
						echo 
							"<div class='alert alert-success'>
							  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							  Package Info added sucessfully. 
							</div>";
					}else{
						echo 
							"<div class='alert alert-danger'>
							  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							  <strong>Oops: </strong> Error inserting data.
							</div>";
					}
			}else{

			}

		}


		?>
		<div class="well">
			<form action="admin.php?action=add_package" method="POST">
				<fieldset>
					<legend>Add Package form</legend>
					<div class="form-group">
						<label for="pilgrim_id">Select Pilgrim:</label>
						<select name="pilgrim_id" id="pilgrim_id" value="" class="form-control">
							<option value="">-- select --</option>
						<?php  
							$gq = mysqli_query($dbc, "SELECT pilgrim_id, p_name FROM pilgrim_info");
							while ($rd = mysqli_fetch_array($gq)) {
						?>
							<option value="<?php echo $rd['pilgrim_id'] ?>"><?php echo $rd["p_name"]; ?></option>\
						<?php
							}
						?>
						</select>
					</div>
					<div class="form-group">
						<label for="pk_name">Package Name:</label>
						<select name="pk_name" id="pk_name" class="form-control">
							<option value=""> -- select --</option>
							<option value="Hajj">Hajj</option>
							<option value="Umrah">Umarah</option>
						</select>
					</div>
					<div class="form-group">
						<label for="pk_rate">Package Rate:</label>
						<input type="text" name="pk_rate" id="pk_rate" class="form-control" placeholder="package rate" required>
					</div>
					<div class="form-group">
						<label for="pk_cat">Package category:</label>
						<input type="text" name="pk_cat" id="pk_cat" class="form-control" placeholder="package category" >
					</div>
					<div class="form-group">
						<label for="pk_option">Package Option:</label>
						<input type="text" name="pk_option" id="pk_option" class="form-control" placeholder="package option" >
					</div>
					<div class="form-group">
						<label for="f_date">Flight Date:</label>
						<input type="date" name="f_date" id="f_date" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="r_date">Return Date:</label>
						<input type="date" name="r_date" id="r_date" class="form-control" required>
					</div>
					<button type="submit" name="add_package" class="btn btn-primary btn-block">Add Package</button>
				</fieldset>
			</form>
		</div>
	</div>
</div>