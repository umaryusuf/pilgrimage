<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<br>
		<?php  
		$error = false;
		$pilgrim_id_err = $h_id_err = $date_err = $amount_err = "";

		if (isset($_POST["add_expenses"])) {
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$pilgrim_id = $_POST["pilgrim_id"];
			$h_id = $_POST["h_id"];
			$date = $_POST["date"];
			$amount = $_POST["amount"];

			if (empty($pilgrim_id)) {
				$error = true;
				$pilgrim_id_err = "Pilgrim not selected";
			}

			if (empty($h_id)) {
				$error = true;
				$h_id_err = "Expenses head not selected";
			}

			if (empty($date)) {
				$error = true;
				$date_err = "date is empty";
			}

			if (empty($amount)) {
				$error = true;
				$amount_err = "amount is empty";
			}

			// if not error
			if (!$error) {
				$sql = "INSERT INTO expenses(`pilgrim_id`, `h_id`, `date`, `amount`) VALUES('$pilgrim_id', '$h_id', '$date', '$amount')";

				if (mysqli_query($dbc, $sql)) {
					echo 
						"<div class='alert alert-success'>
						  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						  Expenses added sucessfully. 
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
			<form action="admin.php?action=add_expenses" method="POST">
				<fieldset>
					<legend>Add Expenses form</legend>
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
						<?php if (!empty($pilgrim_id_err)): ?>
							<span class="text-center"><?php echo $pilgrim_id_err; ?></span>
						<?php endif ?>
					</div>
					<div class="form-group">
						<label for="h_id">Expenses Head</label>
						<select name="h_id" id="h_id" class="form-control">
							<option value="">-- select --</option>
						<?php  
							$gq = mysqli_query($dbc, "SELECT h_id, name FROM account_head");
							while ($rd = mysqli_fetch_array($gq)) {
						?>
							<option value="<?php echo $rd['h_id'] ?>"><?php echo $rd["name"]; ?></option>
						<?php
							}
						?>
						</select>
						<?php if (!empty($h_id_err)): ?>
							<span class="text-center"><?php echo $h_id_err; ?></span>
						<?php endif ?>
					</div>
					<div class="form-group">
						<label for="date">Date:</label>
						<input type="date" name="date" id="date" class="form-control" required>
						<?php if (!empty($date_err)): ?>
							<span class="text-center"><?php echo $date_err; ?></span>
						<?php endif ?>
					</div>
					<div class="form-group">
						<label for="amount">Amount <small>(naira)</small>:</label>
						<input type="number" name="amount" id="amount" class="form-control" placeholder="amount" required>
						<?php if (!empty($amount_err)): ?>
							<span class="text-center"><?php echo $amount_err; ?></span>
						<?php endif ?>
					</div>
					<button type="submit" name="add_expenses" class="btn btn-primary btn-block">Add Expenses</button>
				</fieldset>
			</form>
		</div>
	</div>
</div>