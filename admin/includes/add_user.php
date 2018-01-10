<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<br>
		<?php  
		$error = false;
		$pilgrim_id_err = $username_err  = $password_err = $status_err = "";

		if (isset($_POST["add_user"])) {
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$pilgrim_id = $_POST["pilgrim_id"];
			$username = trim($_POST["username"]);
			$password = trim($_POST["password"]);
			$status = trim($_POST["status"]);

			if (empty($pilgrim_id)) {
				$error = true;
				$pilgrim_id_err = "Pilgrim not selected";
			}

			if (empty($pilgrim_id)) {
				$error = true;
				$pilgrim_id_err = "Pilgrim not selected";
			}

			if (empty($pilgrim_id)) {
				$error = true;
				$pilgrim_id_err = "Pilgrim not selected";
			}

			if (empty($pilgrim_id)) {
				$error = true;
				$pilgrim_id_err = "Pilgrim not selected";
			}

			if (!$error) {
				$username = strtolower($username);
				$password = md5($password);

				$sql = "INSERT INTO user_admin VALUES('', '$pilgrim_id', '$username', '$password', '$status')";

				if (mysqli_query($dbc, $sql)) {
					echo 
						"<div class='alert alert-success'>
						  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						  User added sucessfully. 
						</div>";
				}else{
					echo 
						"<div class='alert alert-danger'>
						  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						  <strong>Oops: </strong> Error inserting data. ".mysqli_error($dbc)."
						</div>";
				}
			}

		}
		?>
		<div class="well">
			<form action="admin.php?action=add_user" method="POST">
				<fieldset>
					<legend>Add User Form</legend>
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
						<label for="username">Username:</label>
						<input type="text" name="username" id="username" class="form-control" placeholder="username" required>
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" name="password" id="password" class="form-control" placeholder="password" required>
					</div>
					<div class="form-group">
						<label for="status">User Status:</label>
						<input type="text" name="status" id="status" class="form-control" placeholder="User status" required>
					</div>
					<button type="submit" name="add_user" class="btn btn-primary btn-block">Add User</button>
				</fieldset>
			</form>
		</div>
	</div>
</div>