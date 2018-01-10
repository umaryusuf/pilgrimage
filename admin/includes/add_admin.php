<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<br>
		<?php 
		error_reporting(0);
		$error = false;
		$username_err = $password_err = $confirm_password_err  = "";

		if (isset($_POST["add_admin"])) {
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$username = trim($_POST["username"]);
			$password = trim($_POST["password"]);
			$confirm_password = trim($_POST["confirm_password"]);

			if (empty($username)) {
				$error = true;
				$username_err = "Username is empty";
			}elseif (strlen($username) < 4) {
				$error  = true;
				$username_err = "Username must not be less than 4 characters";
			}

			if (empty($password)) {
				$error = true;
				$password_err = "Password is empty";
			}elseif(strlen($password) < 4){
				$error = true;
				$password_err = "Password must not be less than 4 characters";
			}


			if (empty($confirm_password)) {
				$error = true;
				$confirm_password_err = "Confirm password is empty";
			}elseif ($confirm_password !== $password) {
				$error = true;
				$confirm_password_err = "Passwords do not match";
			}

			if (!$error) {
				$password = md5($password);

				$query = mysqli_query($dbc, "SELECT id FROM admin WHERE username='$username'");

				if (mysqli_num_rows($query) > 0) {
					$username_err = "Username already exist";
				}else{

					$sql = "INSERT INTO admin VALUES('', '$username', '$password')";

					if (mysqli_query($dbc, $sql)) {
						echo 
							"<div class='alert alert-success'>
							  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							  <strong>Success:</strong> Admin added sucessfully. 
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

		}

		?>
		<div class="well">
			<form action="admin.php?action=add_admin" method="POST">
				<fieldset>
					<legend>Add Admin form</legend>
					<div class="form-group">
						<label for="username">Username:</label>
						<input type="text" name="username" id="username" class="form-control" value="<?php echo $username; ?>" placeholder="username">
						<?php if (!empty($username_err)): ?>
							<span class="text-danger"><?php echo $username_err; ?></span>
						<?php endif ?>
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" name="password" id="password" class="form-control" placeholder="password">
						<?php if (!empty($password_err)): ?>
							<span class="text-danger"><?php echo $password_err; ?></span>
						<?php endif ?>
					</div>
					<div class="form-group">
						<label for="confirm_password">Confirm Password:</label>
						<input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="confirm password">
						<?php if (!empty($confirm_password_err)): ?>
							<span class="text-danger"><?php echo $confirm_password_err; ?></span>
						<?php endif ?>
					</div>
					<button type="submit" name="add_admin" class="btn btn-primary btn-block btn-lg">Add Admin</button>
				</fieldset>
			</form>
		</div>
	</div>
</div>