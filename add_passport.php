<?php  
session_start();
require_once 'DB.php';
$page_title = "Add Passport";

if (!isset($_SESSION["is_logged_in"])) {
	header("location: login.php");
}

$pilgrim_id = $_SESSION["pilgrim_id"];

$query = mysqli_query($dbc, "SELECT pilgrim_id FROM passport_info WHERE pilgrim_id='$pilgrim_id'");



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php require_once 'includes/head.php'; ?>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="dashboard.php">Pilgrim Dashboard</a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li><a href="dashboard.php">Dashboard</a></li>
					<li><a href="pilgrim_rep.php">Pilgrim</a></li>
					<li><a href="group_leader.php">Group Leader</a></li>
					<li class="active"><a href="add_passport.php">Add Passport</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>

	<main class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<br>
				<?php
				if (mysqli_num_rows($query) > 0) {
				?>
				<div class="well">
					<br>
					<h3 class="text-center text-warning">You've already added your passport info.</h3>
					<br>
				</div>
				<?php
				}else{

				$error = false;
				$pilgrim_id_err = $pp_num_err = $pp_valid_date_Err = $pp_issue_date_err = $pp_office_name_err = $pp_status_err = "";

				$pp_num = $pp_valid_date = $pp_issue_date = $pp_office_name = $pp_status = "";

				if (isset($_POST["add_passport"])) {
					$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

					$pp_num = trim($_POST["pp_num"]);
					$pp_valid_date = $_POST["pp_valid_date"];
					$pp_issue_date = $_POST["pp_issue_date"];
					$pp_office_name = trim($_POST["pp_office_name"]);
					$pp_status = trim($_POST["pp_status"]);

					if (empty($pp_num)) {
						$error = true;
						$pp_num_err = "Passport number is empty";
					}

					if (empty($pp_valid_date)) {
						$error = true;
						$pp_valid_date_err = "Passport valid date is empty";
					}

					if (empty($pp_issue_date)) {
						$error = true;
						$pp_issue_date_err = "Passport issue date is empty";
					}

					if (empty($pp_office_name)) {
						$error = true;
						$pp_office_name_err = "Passport office name is empty";
					}

					if (empty($pp_status)) {
						$error = true;
						$pp_status_err = "Passport status is empty";
					}

					// if no error
					if (!$error) {
						
						$sql = "INSERT INTO passport_info(pilgrim_id, pp_num, pp_valid_date, pp_issue_date, pp_office_name, pp_status) VALUES('$pilgrim_id', '$pp_num', '$pp_valid_date', '$pp_issue_date', '$pp_office_name', '$pp_status')";

						if (mysqli_query($dbc, $sql)) {
							echo 
								"<div class='alert alert-success'>
								  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								  Passport added sucessfully. 
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
					<form method="POST" action="add_passport.php">
						<fieldset>
							<legend>Add Passport form</legend>
							<div class="form-group">
								<label for="pp_num">Passport Number:</label>
								<input type="text" name="pp_num" id="pp_num" value="" class="form-control" placeholder="Passport number" required>
							</div>
							<div class="form-group">
								<label for="pp_valid_date">Passport valid date:</label>
								<input type="date" name="pp_valid_date" id="pp_valid_date" value="" class="form-control"required>
							</div>
							<div class="form-group">
								<label for="pp_issue_date">Passport issue date:</label>
								<input type="date" name="pp_issue_date" id="pp_issue_date" value="" class="form-control" placeholder="" required>
							</div>
							<div class="form-group">
								<label for="pp_office_name">Office Name:</label>
								<input type="text" name="pp_office_name" id="pp_office_name" value="" class="form-control" placeholder="Passport office name" required>
							</div>
							<div class="form-group">
								<label for="pp_status">Passport Status:</label>
								<input type="text" name="pp_status" id="pp_status" value="" class="form-control" placeholder="Passport status" required>
							</div>
							<button class="btn btn-block btn-primary" type="submit" name="add_passport">Add Passport</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</main>

	<?php require_once 'includes/scripts.php'; } ?>
</body>
</html>