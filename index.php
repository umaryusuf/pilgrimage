<?php  
$page_title = "Homepage";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once 'includes/head.php'; ?>
</head>
<body>
	<?php require_once 'includes/nav.php'; ?>

	<div class="container">
		<div id="carousel-id" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carousel-id" data-slide-to="0" class=""></li>
				<li data-target="#carousel-id" data-slide-to="1" class=""></li>
				<li data-target="#carousel-id" data-slide-to="2" class="active"></li>
			</ol>
			<div class="carousel-inner">
				<div class="item active">
					<img data-src="assets/img/one.jpg" alt="First slide" src="assets/img/one.jpg">
					<div class="container">
						<div class="carousel-caption">
							<h1 class="white">Pilgrim Management System</h1>
							<p>Note: If you're viewing this page via file URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
							<p><a class="btn btn-lg btn-primary" href="register.php" role="button">Sign up today</a></p>
						</div>
					</div>
				</div>
				<div class="item">
					<img data-src="assets/img/two.jpg" alt="Second slide" src="assets/img/two.jpg">
					<div class="container">
						<div class="carousel-caption">
							<h1 class="white">Simplify Hajj Complications</h1>
							<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
							<p><a class="btn btn-lg btn-primary" href="register.php" role="button">Learn more</a></p>
						</div>
					</div>
				</div>
				<div class="item ">
					<img data-src="assets/img/three.jpg" alt="Third slide" src="assets/img/three.jpg">
					<div class="container">
						<div class="carousel-caption">
							<h1 class="white">Reduces registration steps</h1>
							<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
							<p><a class="btn btn-lg btn-primary" href="register.php" role="button">Get Started</a></p>
						</div>
					</div>
				</div>
			</div>
			<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
			<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
		</div>
		<br><br>	
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Hajj</h3>
					</div>
					<div class="panel-body">
						<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt repellendus a dolorem facere, officia architecto cumque. Animi mollitia ab aliquid, soluta reiciendis nihil dolore nesciunt eligendi recusandae ullam optio architecto.</div>
						<div>Eum repellat, fugiat delectus. Cumque tempore, fuga libero consectetur totam, ab praesentium illo hic dolor possimus repellat quam reiciendis asperiores autem eaque aspernatur sequi illum veritatis quasi fugiat nihil est?</div>
						<div>Et amet eligendi, voluptatum ex consequuntur voluptas, quae rem sint atque voluptates quia doloribus magni laudantium delectus, suscipit vero quibusdam alias at minus veritatis obcaecati sit eum incidunt! Et, vitae?</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Umarah</h3>
					</div>
					<div class="panel-body">
						<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro modi laborum laudantium tempora. Laboriosam autem cum sapiente hic architecto atque, earum tenetur ab, provident vel nulla. Animi error accusamus repellendus.</div>
						<div>Esse nisi quaerat voluptatibus voluptatum eum optio sit vitae consectetur. Maiores quis laborum quisquam odit, assumenda voluptatibus voluptates eius dolor necessitatibus. Tempore odio neque, recusandae ratione itaque quam, dignissimos nesciunt.</div>
						<div>In sunt incidunt ratione tempore, ut sint minima velit eum cupiditate omnis odio, natus fuga repellendus culpa iste magni dolor quae dignissimos unde, aut sequi voluptates totam similique voluptate soluta?</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Others</h3>
					</div>
					<div class="panel-body">
						<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab expedita totam numquam animi omnis, atque saepe aperiam provident eius adipisci molestias illum, dignissimos cupiditate nemo quos deserunt repellendus. Similique, aut.</div>
						<div>Harum aliquid veritatis nesciunt odio, possimus praesentium obcaecati tempora explicabo dolores. Optio enim, explicabo veritatis atque dolorum ut in! Quod aliquam aperiam, id quisquam magnam dolor sunt, totam! Itaque, unde?</div>
						<div>Odit beatae rem incidunt facere, doloremque, ratione, omnis sit iusto aspernatur eum autem. Repellat est minima laboriosam, iste saepe nemo maxime sit omnis quis sequi dolorem assumenda a, consequuntur laudantium.</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php require_once 'includes/scripts.php'; ?>
</body>
</html>