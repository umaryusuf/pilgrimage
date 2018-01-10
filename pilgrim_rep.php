<?php  
session_start();
require_once 'DB.php';
$page_title = "Passport Info";

if (!isset($_SESSION["is_logged_in"])) {
	header("location: login.php");
}

$pid = $_SESSION["pilgrim_id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
					<li class="active"><a href="pilgrim_rep.php">Pilgrim</a></li>
					<li><a href="group_leader.php">Group Leader</a></li>
					<li><a href="add_passport.php">Add Passport</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
	
	<div class="container">
		<div class="row">
			<br>
			<div class="col-md-8 col-md-offset-2">
				<?php  
				$query = mysqli_query($dbc, "SELECT * FROM pilgrim_info WHERE pilgrim_id='$pid'");
				while($row = mysqli_fetch_array($query)):
				$_SESSION["gl_id"] = $row["gl_id"];
				?>
				<div class="row">
					<div class="col-xs-9">
						<div class="active">
							<h4>Personal Information</h4>
						</div>
						<div class="row">
							<div class="col-xs-4">
								<h4>Pilgrim Name:</h4>
								<h4>Fathers Name:</h4>
								<h4>Mothers Name:</h4>
								<h4>Spouse Name:</h4>
								<h4>Mahrims Name:</h4>
							</div>
							<div class="col-xs-8">
								<h4><?php echo $row["p_name"]; ?></h4>
								<h4><?php echo $row["p_fathers_name"]; ?></h4>
								<h4><?php echo $row["p_mother_name"]; ?></h4>
								<h4><?php echo $row["p_spouse_name"]; ?></h4>
								<h4><?php echo $row["p_mahrims_name"]; ?></h4>
							</div>
						</div>
					</div>
					<div class="col-xs-3">
						<img src="admin/uploads/pilgrims/<?php echo $row['p_img'] ?>" style="height: 220px" class="img img-responsive" alt="">
					</div>
				</div>
				<div class="active">
					<h4>Contact Information</h4>
				</div>
				<div class="row">
					<div class="col-xs-3">
						<h4>District:</h4>
						<h4>Address:</h4>
						<h4>Mobile:</h4>
						<h4>Email:</h4>
						<h4>Tel:</h4>
					</div>
					<div class="col-xs-9">
						<h4><?php echo $row["p_district"]; ?></h4>
						<h4><?php echo $row["p_address"]; ?></h4>
						<h4><?php echo $row["p_mobile"]; ?></h4>
						<h4><?php echo $row["p_mail"]; ?></h4>
						<h4></h4>
					</div>
				</div>
				<div class="active">
					<h4>Passport Information</h4>
				</div>
				<div class="row">
					<div class="col-xs-3">
						<h4>Passport Number:</h4>
						<h4>Passport Validity:</h4>
					</div>
					<div class="col-xs-9">
						<?php  
							$q = mysqli_query($dbc, "SELECT pp_num, pp_valid_date FROM passport_info WHERE pilgrim_id='$pid'");
							$qd = mysqli_fetch_array($q)
						?>
						<h4><?php echo $qd["pp_num"]; ?></h4>
						<h4><?php echo $qd["pp_valid_date"]; ?></h4>
					</div>
				</div>
				<div class="active">
					<h4>Visa Information</h4>
				</div>
				<div class="row">
					<div class="col-xs-3">
						<h4>Visa Status:</h4>
						<h4></h4>
					</div>
					<div class="col-xs-9">
						<?php  
							$q2 = mysqli_query($dbc, "SELECT visa_status FROM visa_info WHERE pilgrim_id='$pid'");
							$qd2 = mysqli_fetch_array($q2);
						?>
						<h4><?php echo $qd2["visa_status"]; ?></h4>
					</div>
				</div>
				<?php endwhile ?>
			</div>
		</div>
	</div>

	<?php require_once 'includes/scripts.php'; ?>
</body>
</html>