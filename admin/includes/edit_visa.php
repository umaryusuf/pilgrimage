<?php  
$pid = $_GET["id"];
$query = mysqli_query($dbc, "SELECT * FROM visa_info WHERE pilgrim_id='$pid'");
$data = mysqli_fetch_array($query);
?>

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<br>
		<?php
			$error = false;
			$pilgrim_id_err = $visa_status_err = $visa_apply_date_err = $visa_date_err = $visa_validity_err = "";
			
			if (isset($_POST["edit_visa"])) {

				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				
				$pilgrim_id = $_POST["pilgrim_id"];

				$visa_status = trim($_POST["visa_status"]);
				$visa_apply_date = $_POST["visa_apply_date"];
				$visa_date = $_POST["visa_date"];
				$visa_validity = trim($_POST["visa_validity"]);

				if (empty($visa_status)) {
					$error = true;
					$visa_status_err = "Visa status is empty";
				}

				if (empty($visa_apply_date)) {
					$error = true;
					$visa_apply_date_err = "Visa apply date is empty";
				}

				if (empty($visa_date)) {
					$error = true;
					$visa_date_err = "Visa date is empty";
				}

				if (empty($visa_validity)) {
					$error = true;
					$visa_validity_err = "Visa validity is empty";
				}

				//if not error
				if (!$error) {
					$sql = "UPDATE visa_info SET pilgrim_id='$pilgrim_id', visa_status='$visa_status', visa_apply_date='$visa_apply_date', visa_date='$visa_date', visa_validity='$visa_validity' WHERE pilgrim_id='$pilgrim_id'";

					if (mysqli_query($dbc, $sql)) {
						echo 
							"<div class='alert alert-success'>
							  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							  Visa Info updated sucessfully. 
							</div>";
							exit;
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
			<form method="POST" action="admin.php?action=edit_visa&id=<?php echo $pid; ?>" >
				<fieldset>
					<legend>Edit Visa  information form</legend>
					<div class="form-group">
						<label for="pilgrim_id">Select Pilgrim:</label>
						<select name="pilgrim_id" id="pilgrim_id" value="" class="form-control">
							<option value="<?php echo $data["pilgrim_id"] ?>">
								<?php $gq = mysqli_query($dbc, "SELECT p_name FROm pilgrim_info WHERE pilgrim_id=".$data["pilgrim_id"]);
								$d = mysqli_fetch_array($gq);
								echo $d["p_name"];
								 ?>
							</option>
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
						<label for="visa_status">Visa Status:</label>
						<input type="text" name="visa_status" id="visa_status" value="<?php echo $data['visa_status'] ?>" class="form-control" placeholder="Visa status" required>
					</div>
					<div class="form-group">
						<label for="visa_apply_date">Visa apply date:</label>
						<input type="date" name="visa_apply_date" id="visa_apply_date" value="<?php echo $data['visa_apply_date'] ?>" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="visa_date">Visa date:</label>
						<input type="date" name="visa_date" id="visa_date" value="<?php echo $data['visa_date'] ?>" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="visa_validity">Visa validity:</label>
						<input type="text" name="visa_validity" id="visa_validity" value="<?php echo $data['visa_validity'] ?>" class="form-control" placeholder="Passport status" required>
					</div>
					<button class="btn btn-block btn-primary" type="submit" name="edit_visa">Update Visa info</button>
				</fieldset>
			</form>
		</div>
	</div>
</div>