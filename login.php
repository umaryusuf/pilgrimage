<?php  
$page_title = "Login";
require_once 'DB.php';
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
				<br>
				<?php  
					$error = false;
					$username_err = $password_err = "";
					$username = $password = $message = "";

					if (isset($_POST["login"])) {
						$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

						$username = trim($_POST["username"]);
						$password = trim($_POST["password"]);

						if (empty($username)) {
							$error = true;
							$username_err = "Username is empty";
						}

						if (empty($password)) {
							$error = true;
							$password_err = "Password is empty";
						}

						if(!$error){
							$password = md5($password);
							$sql = mysqli_query($dbc, "SELECT pilgrim_id FROM pilgrim_info WHERE username='$username' AND password='$password' LIMIT 1");
							if (mysqli_num_rows($sql) > 0) {
								$d = mysqli_fetch_array($sql);

								session_start();
								$_SESSION["is_logged_in"] = true;
								$_SESSION["pilgrim_id"] = $d["pilgrim_id"];
								header("location: dashboard.php");

							}
						}
					}
				?>
				<div class="well">
					<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
						<fieldset>
							<legend>Login Form</legend>
							<div class="form-group">
								<label for="username">Username:</label>
								<input type="text" name="username" class="form-control" id="username" placeholder="username" value="" required="">
							</div>
							<div class="form-group">
								<label for="password">Password:</label>
								<input type="password" name="password" class="form-control" id="password" placeholder="password" required="">
							</div>
							<button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
							<br>
							<p>Don't have an account? <a href="register.php">Register</a></p>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</main>

	<?php require_once 'includes/scripts.php'; ?>
</body>
</html>