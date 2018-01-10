<?php  
$page_title = "Contact";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once 'includes/head.php'; ?>
</head>
<body>
	<?php require_once 'includes/nav.php'; ?>
	<!-- main content -->
		<main class="container">
			<div class="col-md-6">
				<h2>Message</h2>
				<form action="mail/contact_me.php" method="POST" role="form">
					<fieldset>
						<legend>Send us message, questions or recommendations:</legend>
						<div class="form-group">
					  	<label for="fullname">Full Name: <span class="required">*</span></label>
					  	<input type="text" name="name" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
						</div>
						<div class="form-group">
					  	<label for="email">Email: <span class="required">*</span></label>
					  	<input type="email" name="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
						</div>
						<div class="form-group">
							<label for="phone">Phone: <span class="required">*</span></label>
						  <input type="tel" class="form-control" name="phone" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                <p class="help-block text-danger"></p>
						</div>
						<div class="form-group">
					  	<label for="message">Message: <span class="required">*</span></label>
					  	<textarea class="form-control" name="message" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message." style="max-width:100%;height: 150px"></textarea>
              <p class="help-block text-danger"></p>
						</div>
						<button type="submit" class="btn btn-primary btn-block">Send Message</button>
					</fieldset>
				</form>

				<br />
			</div>
			<div class="col-md-6">
				<h2>Address</h2>
				<p>You can also contact us on the adress below to get to know more about us and get your waina as soon as posible.</p>
				<br>
				<address>
					<p><span class="fa fa-envelope"></span> email: info@email.com</p>
					<p><span class="fa fa-phone"></span> phone: +234 806 **** ***</p>
					<p><span class="fa fa-map-marker"></span> No 22 - 26, library road</p>
					<p>Barnawa, Kaduna Nigeria.</p>
				</address>
				<div class="contact-map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d424396.3176723366!2d150.92243255000002!3d-33.7969235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b129838f39a743f%3A0x3017d681632a850!2sSydney+NSW%2C+Australia!5e0!3m2!1sen!2sin!4v1431587453420" width="100%" height="325px" frameborder="0" style="border:0"></iframe>
				</div>
			</div>
		</main>

		<?php require_once 'includes/scripts.php'; ?>
</body>
</html>