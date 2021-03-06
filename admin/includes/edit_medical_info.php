<?php  
$pid = $_GET["id"];
$query = mysqli_query($dbc, "SELECT * FROM medical_info WHERE pilgrim_id='$pid'");
$data = mysqli_fetch_array($query);
?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<br>
		<?php  

		$error =false;
		$pilgrim_id_err = $medi_vacci_place_err = $medi_vacci_status_err = "";

		if (isset($_POST["edit_medical_info"])) {
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$pilgrim_id = $_POST["pilgrim_id"];
			$medi_vacci_place = trim($_POST["medi_vacci_place"]);
			$medi_vacci_status = trim($_POST["medi_vacci_status"]);

			if (empty($pilgrim_id)) {
				$error = true;
				$pilgrim_id_err = "Pilgrim not selected";
			}

			if (empty($medi_vacci_place)) {
				$error = true;
				$medi_vacci_place_err = "Empty medical vaccine place";
			}

			if (empty($medi_vacci_status)) {
				$error = true;
				$medi_vacci_status_err = "Empty medical vaccine status";
			}

			//if not error
			if (!$error) {
				$sql = "UPDATE medical_info SET pilgrim_id='$pilgrim_id', medi_vacci_place='$medi_vacci_place', medi_vacci_status='$medi_vacci_status' WHERE pilgrim_id='$pid'";

				if (mysqli_query($dbc, $sql)) {
					echo 
						"<div class='alert alert-success'>
						  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						  Medical Info updated sucessfully. 
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
			<form action="admin.php?action=edit_medical_info&id=<?php echo $pid; ?>" method="POST">
				<fieldset>
					<legend>Edit Medical Info form</legend>
					<div class="form-group">
						<label for="pilgrim_id">Select Pilgrim:</label>
						<select name="pilgrim_id" id="pilgrim_id" value="" class="form-control">
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
							<option value="<?php echo $rd['pilgrim_id'] ?>"><?php echo $rd["p_name"]; ?></option>
						<?php
							}
						?>
						</select>
					</div>
					<div class="form-group">
						<label for="medi_vacci_place">Medical Vaccine place:</label>
						<input type="text" name="medi_vacci_place" id="medi_vacci_place" value="<?php echo $data['medi_vacci_place'] ?>" class="form-control" placeholder="medical vaccine place">
					</div>
					<div class="form-group">
						<label for="medi_vacci_status">Medical vaccine status</label>
						<input type="text" name="medi_vacci_status" id="medi_vacci_status" value="<?php echo $data['medi_vacci_status'] ?>" placeholder="Medical status" class="form-control">
					</div>
					<button type="submit" name="edit_medical_info" class="btn btn-primary btn-block">Update medical Info</button>
				</fieldset>
			</form>
		</div>
	</div>
</div>