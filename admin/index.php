<?php  
require_once '../DB.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin | Hajj Management System</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body class="bg-primary">
	<div class="container">
		<br><br><br>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<?php 
					$username = $password = "";
					$username_err = $password_err = ""; 
					if ($_SERVER["REQUEST_METHOD"] === "POST") {
							$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

							$username = trim($_POST["username"]);
							$password = trim($_POST["password"]);

							if (empty($username)) {
								$username_err = "Username is empty";
							}

							if (empty($password)) {
								$password_err = "Password is empty";
							}

							if (!empty($username) && !empty($password)) {
								$password = md5($password);

								$run_q = mysqli_query($dbc, "SELECT id FROM admin WHERE username='$username'");
								if (mysqli_num_rows($run_q) > 0) {

									$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
									$query = mysqli_query($dbc, $sql);

									if (mysqli_num_rows($query) > 0) {
										session_start();
										$_SESSION["is_logged_in"] = true;
										header("Location: admin.php");
									}else{
										$password_err = "Password is not valid";
									}
								}else{
									$username_err = "Username does not exist";
								}

								
							}
						}	
				?>
				<div class="well">
					<h3 class="text-center">Admin Login</h3>
					<br>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
						<div class="form-group">
							<label for="username">Username:</label>
							<input type="text" class="form-control" name="username" id="username" value="<?php echo $username; ?>" placeholder="username">
							<?php if (!empty($username_err)): ?>
							<span class="text-danger"><?php echo $username_err; ?></span>
							<?php endif ?>
						</div>
						<div class="form-group">
							<label for="password">Password:</label>
							<input type="password" class="form-control" name="password" id="password" placeholder="password">
							<?php if (!empty($password_err)): ?>
							<span class="text-danger"><?php echo $password_err; ?></span>
							<?php endif ?>
						</div>
						<br>
						<div class="form-group">
							<input type="submit" value="Login" class="btn btn-block btn-primary">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>