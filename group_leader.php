<?php  
session_start();
require_once 'DB.php';
$page_title = "Group leader info";

if (!isset($_SESSION["is_logged_in"])) {
	header("location: login.php");
}

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
					<li><a href="pilgrim_rep.php">Pilgrim</a></li>
					<li class="active"><a href="group_leader.php">Group Leader</a></li>
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
			<div class="col-md-6 col-md-offset-3">
				<?php 
					$gid = $_SESSION["gl_id"];  
					$query = mysqli_query($dbc, "SELECT * FROM group_leader WHERE gl_id='$gid'");
					while($row = mysqli_fetch_array($query)):
				?>
				<div class="row">
					<div class="col-xs-8 col-xs-offset-2">
						<div class="text-center">
							<img src="admin/uploads/<?php echo $row['img'] ?>" style="width: 200px; height: 200px; margin: 0 auto" class="img img-responsive" alt="">
						</div>
						<br>
						<div class="active">
							<h4>Group Leader Information</h4>
						</div>
						<div class="row">
							<div class="col-xs-5">
								<h4>id</h4>
								<h4>Name:</h4>
								<h4>mobile:</h4>
								<h4>Mobile KSA:</h4>
								<h4>Address:</h4>
								<h4>Journey Date:</h4>
								<h4>Return Date:</h4>
							</div>
							<div class="col-xs-7">
								<h4><?php echo $row["gl_id"]; ?></h4>
								<h4><?php echo $row["gl_name"]; ?></h4>
								<h4><?php echo $row["gl_mob"]; ?></h4>
								<h4><?php echo $row["gl_mob_ksa"]; ?></h4>
								<h4><?php echo $row["gl_add"]; ?></h4>
								<h4><?php echo $row["gl_journey_date"]; ?></h4>
								<h4><?php echo $row["gl_return_date"]; ?></h4>
							</div>
						</div>
					</div>
				</div>
				<?php endwhile ?>
			</div>
		</div>
	</div>

	<?php require_once 'includes/scripts.php'; ?>
</body>
</html>