<?php
$pid = $_GET["id"];
$query = mysqli_query($dbc, "SELECT * FROM package_info WHERE pilgrim_id='$pid'");
$data = mysqli_fetch_array($query);
?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<?php  
		$error = false;
		$pilgrim_id_err = $pk_name_err = $pk_rate_err = $pk_cat_err = $pk_option_err = $f_date_err = $r_date_err = "";

		if (isset($_POST["edit_package"])) {
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
				$sql = "UPDATE package_info SET pilgrim_id='$pilgrim_id', pk_name='$pk_name', pk_rate='$pk_rate', pk_cat='$pk_cat', pk_option='$pk_option', fdate='$f_date', rdate='$r_date' WHERE pilgrim_id='$pid'";

				if (mysqli_query($dbc, $sql)) {
						echo 
							"<div class='alert alert-success'>
							  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							  Package Info updated sucessfully. 
							</div>";
							exit;
					}else{
						echo 
							"<div class='alert alert-danger'>
							  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							  <strong>Oops: </strong> Error updating data.
							</div>";
					}
			}else{

			}

		}


		?>
		<div class="well">
			<form action="admin.php?action=edit_package&id=<?php echo $pid; ?>" method="POST">
				<fieldset>
					<legend>Edit Package form</legend>
					<div class="form-group">
						<label for="pilgrim_id">Select Pilgrim:</label>
						<select name="pilgrim_id" id="pilgrim_id" class="form-control">
							<option value="<?php echo $data["pilgrim_id"] ?>">
								<?php $gq = mysqli_query($dbc, "SELECT p_name FROM pilgrim_info WHERE pilgrim_id=".$data["pilgrim_id"]);
								$d = mysqli_fetch_array($gq);
								echo $d["p_name"];
								 ?>
							</option>
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
							<option value="<?php echo $data['pk_name']; ?>"><?php echo $data['pk_name']; ?></option>
							<option value="Hajj">Hajj</option>
							<option value="Umrah">Umarah</option>
						</select>
					</div>
					<div class="form-group">
						<label for="pk_rate">Package Rate:</label>
						<input type="text" name="pk_rate" id="pk_rate" class="form-control" value="<?php echo $data['pk_rate']; ?>" placeholder="package rate" required>
					</div>
					<div class="form-group">
						<label for="pk_cat">Package category:</label>
						<input type="text" name="pk_cat" id="pk_cat" class="form-control" value="<?php echo $data['pk_cat']; ?>" placeholder="package category" >
					</div>
					<div class="form-group">
						<label for="pk_option">Package Option:</label>
						<input type="text" name="pk_option" id="pk_option" class="form-control" value="<?php echo $data['pk_option']; ?>" placeholder="package option" >
					</div>
					<div class="form-group">
						<label for="f_date">Flight Date:</label>
						<input type="date" name="f_date" id="f_date" class="form-control" value="<?php echo $data['fdate']; ?>" required>
					</div>
					<div class="form-group">
						<label for="r_date">Return Date:</label>
						<input type="date" name="r_date" id="r_date" class="form-control" value="<?php echo $data['rdate']; ?>" required>
					</div>
					<button type="submit" name="edit_package" class="btn btn-primary btn-block">Update Package</button>
				</fieldset>
			</form>
		</div>
	</div>
</div>