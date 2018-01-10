<?php  
$page_title = "Register";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once 'includes/head.php'; ?>
</head>
<body>
	<?php include_once 'includes/nav.php'; ?>

	<main class="container">
		<br><br>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<?php
					$error = false;
					$username = $password = $confirm_password = "";
					$username_err = $password_err = $confirm_password_err = $message = "";

					if (isset($_POST["register"])) {

						$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

						$username = trim($_POST["username"]);
						$password = trim($_POST["password"]);
						$confirm_password = trim($_POST["confirm_password"]);

						if (empty($username)) {
							$error = true;
							$username_err = "Username is empty";
						}

						if (empty($password)) {
							$error = true;
							$password_err = "Password is empty";
						}

						if (empty($confirm_password)) {
							$error = true;
							$confirm_password_err = "Confirm password is empty";
						}elseif($confirm_password !== $password){
							$confirm_password_err = "Password do not match";
						}

						if (!$error) {
							require_once 'DB.php';
							$password = md5($password);

							$query = mysqli_query($dbc, "SELECT pilgrim_id FROM pilgrim_info WHERE username='$username'");

							if (mysqli_num_rows($query) > 0) {
								$username_err = "username already exist";
							}else{

									session_start();
									$_SESSION["username"] = $username;
									$_SESSION["password"] = $password;
									header("location: add_info.php");

							}

								
						}

					} 
				?>
				<div class="well">
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
						<fieldset>
							<legend>Register Form</legend>
							<div class="form-group">
								<label for="username">Username:</label>
								<input type="text" name="username" class="form-control" id="username" placeholder="username" value="" required>
								<?php if (!empty($username_err)): ?>
									<span class="text-danger"><?php echo $username_err ?></span>
								<?php endif ?>
							</div>
							<div class="form-group">
								<label for="password">Password:</label>
								<input type="password" name="password" class="form-control" id="password" placeholder="password" required>
								<?php if (!empty($password_err)): ?>
									<span class="text-danger"><?php echo $password_err ?></span>
								<?php endif ?>
							</div>
							<div class="form-group">
								<label for="confirm_password">Confirm password:</label>
								<input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm password" required>
								<?php if (!empty($confirm_password_err)): ?>
									<span class="text-danger"><?php echo $confirm_password_err ?></span>
								<?php endif ?>
							</div>
							<button type="submit" class="btn btn-primary btn-block" name="register">Register</button>
							<br>
							<p>Already have an account? <a href="login.php">login</a></p>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</main>

	<?php require_once 'includes/scripts.php'; ?>
</body>
</html>