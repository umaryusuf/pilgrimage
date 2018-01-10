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
				<a class="navbar-brand" href="index.php">Pilgrim Management System</a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li class="<?php echo ($page_title === 'Homepage') ? 'active' : '' ?>"><a href="index.php">Home</a></li>
					<li class="<?php echo ($page_title === 'About') ? 'active' : '' ?>"><a href="about.php">About</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="<?php echo ($page_title === 'Register') ? 'active' : '' ?>"><a href="register.php">Register</a></li>
					<li class="<?php echo ($page_title === 'Login') ? 'active' : '' ?>"><a href="login.php">Login</a></li>
					<li class="<?php echo ($page_title === 'Contact') ? 'active' : '' ?>"><a href="contact.php">Contact</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>