<?php  
session_start();
require_once 'DB.php';
$page_title = "Dashboard";

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
					<li class="active"><a href="dashboard.php">Dashboard</a></li>
					<li><a href="pilgrim_rep.php">Pilgrim</a></li>
					<li><a href="group_leader.php">Group Leader</a></li>
					<li><a href="add_passport.php">Add Passport</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
	<br>
	<div class="container">
		<div class="jumbotron">
			<h1 class="text-center"><strong>Pilgrim Dashboard</strong></h1>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-primary">
		      <div class="panel-heading">
		        <br><br>
		        <div class="row">
		          <div class="col-xs-3">
		              <i class="fa fa-file fa-5x"></i>
		          </div>
		          <div class="col-xs-9 text-right">
		              <div class="huge bold">View</div>
		              <div>Pilgrim report</div>
		          </div>
		        </div>
		        <br><br>
		      </div>
		      <a href="pilgrim_rep.php">
	          <div class="panel-footer">
	            <span class="pull-left">Pilgrim report</span>
	            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	            <div class="clearfix"></div>
	          </div>
		      </a>
		  	</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-primary">
		      <div class="panel-heading">
		        <br><br>
		        <div class="row">
		          <div class="col-xs-3">
		              <i class="fa fa-user fa-5x"></i>
		          </div>
		          <div class="col-xs-9 text-right">
		              <div class="huge bold">View</div>
		              <div>Group leader info</div>
		          </div>
		        </div>
		        <br><br>
		      </div>
		      <a href="group_leader.php">
	          <div class="panel-footer">
	            <span class="pull-left">View group leader</span>
	            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	            <div class="clearfix"></div>
	          </div>
		      </a>
		  	</div>
			</div>
		</div>
	</div>

	<?php require_once 'includes/scripts.php'; ?>
</body>
</html>