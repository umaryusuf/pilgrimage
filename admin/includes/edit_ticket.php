<?php
$pid = $_GET["id"];
$query = mysqli_query($dbc, "SELECT * FROM ticket_flight WHERE pilgrim_id='$pid'");
$data = mysqli_fetch_array($query);
?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<br>
		<?php

		$error = false;
		$pilgrim_id_err = $t_status_err = $t_confirm_date_err = $flight_no_err = $flight_date_err = $return_date_err = $t_num_err = $t_agency_name_err = $flight_dest_err = $airline_err = "";
		if (isset($_POST["edit_ticket"])) {
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$pilgrim_id = $_POST["pilgrim_id"];
			$t_status = trim($_POST["t_status"]);
			$t_confirm_date = $_POST["t_confirm_date"];
			$flight_no = trim($_POST["flight_no"]);
			$flight_date = $_POST["flight_date"];
			$return_date = $_POST["return_date"];
			$t_num = trim($_POST["t_num"]);
			$t_agency_name = trim($_POST["t_agency_name"]);
			$flight_dest = trim($_POST['flight_dest']);
			$airline = trim($_POST["airline"]);

			if (empty($pilgrim_id)) {
				$error = true;
				$pilgrim_id_err = "Pilgrim not selected";
			}

			if (empty($t_status)) {
				$error = true;
				$t_status_err = "Ticket status is empty";
			}

			if (empty($t_confirm_date)) {
				$error = true;
				$t_confirm_date_err = "Ticket Confirm date is empty";
			}

			if (empty($flight_no)) {
				$error = true;
				$flight_no_err = "Flight number is empty";
			}

			if (empty($flight_date)) {
				$error = true;
				$flight_date_err = "Flight date is empty";
			}

			if (empty($return_date)) {
				$error = true;
				$return_date_err = "Ticket status is empty";
			}

			if (empty($t_num)) {
				$error = true;
				$t_num_err = "Ticket number is empty";
			}

			if (empty($t_agency_name)) {
				$error = true;
				$t_agency_name_err = "Ticket agency name is empty";
			}

			if (empty($flight_dest)) {
				$error = true;
				$flight_dest_err = "Flight destination is empty";
			}

			if (empty($airline)) {
				$error = true;
				$airline_err = "Airline is empty";
			}

			if (!$error) {
				$sql = "UPDATE ticket_flight SET t_status='$t_status', t_confirm_date='$t_confirm_date', flight_no='$flight_no', flight_no='$flight_no', flight_date='$flight_date', return_date='$return_date', t_num='$t_num', t_agency_name='$t_agency_name', flight_dest='$flight_dest', airline='$airline' WHERE pilgrim_id='$pid'";

				if (mysqli_query($dbc, $sql)) {
					echo 
						"<div class='alert alert-success'>
						  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						  Flight ticket updated sucessfully. 
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
			<form method="POST" action="admin.php?action=edit_ticket&id=<?php echo $pid; ?>">
				<fieldset>
					<legend>Edit flight ticket form</legend>
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
						<label for="t_status">Ticket Status:</label>
						<input type="text" name="t_status" id="t_status" value="<?php echo $data['t_status']; ?>" class="form-control" placeholder="Visa status" required>
					</div>
					<div class="form-group">
						<label for="t_confirm_date">Ticket confirm date:</label>
						<input type="date" name="t_confirm_date" id="t_confirm_date" value="<?php echo $data['t_confirm_date']; ?>" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="flight_no">Flight number:</label>
						<input type="text" name="flight_no" id="flight_no" value="<?php echo $data['flight_no']; ?>" class="form-control" placeholder="Passport status" required>
					</div>
					<div class="form-group">
						<label for="flight_date">Flight date:</label>
						<input type="date" name="flight_date" id="flight_date" value="<?php echo $data['flight_date']; ?>" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="return_date">Return date:</label>
						<input type="date" name="return_date" id="return_date" value="<?php echo $data['return_date']; ?>" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="t_num">Ticket Number:</label>
						<input type="text" name="t_num" id="t_num" value="<?php echo $data['t_num']; ?>" class="form-control" placeholder="Ticket number" required>
					</div>
					<div class="form-group">
						<label for="t_agency_name">Ticket agency name:</label>
						<input type="text" name="t_agency_name" id="t_agency_name" value="<?php echo $data['t_agency_name']; ?>" class="form-control" placeholder="Ticket agency name" required>
					</div>
					<div class="form-group">
						<label for="flight_dest">Flight Destination:</label>
						<input type="text" name="flight_dest" id="flight_dest" value="<?php echo $data['flight_dest']; ?>" class="form-control" placeholder="ticket destination" required>
					</div>
					<div class="form-group">
						<label for="airline">Airline:</label>
						<input type="text" name="airline" id="airline" value="<?php echo $data['airline']; ?>" class="form-control" placeholder="airline" required>
					</div>
					<button class="btn btn-block btn-primary" type="submit" name="edit_ticket">Update Ticket Info</button>
				</fieldset>
			</form>
		</div>
	</div>
</div>