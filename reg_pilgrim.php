<?php  
	$page_title = "Register Pilgrin"
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once 'includes/head.php'; ?>
</head>
<body class="bg-primary">
	
	<section class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="well">
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
						<fieldset>
							<legend>Pilgrim Registration Form</legend>
							<div class="row">
								<div class="col-sm-3">
									<div class="form-group">
										<label for="pilgrim_type">Pilgrim Type</label>
										<select name="pilgrim_type" id="pilgrim_type" value="" class="form-control">
											<option value="Hajj">Hajj</option>
											<option value="Umrah">Umrah</option>
										</select>
									</div>
								</div>
								<div class="col-sm-5">
									<div class="form-group">
										<label for="fullname">Full Name:</label>
										<input type="text" name="fullname" id="fullname" value="" class="form-control"  placeholder="Full name">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="phone">Phone:</label>
										<input type="tel" name="phone" id="phone" value="" class="form-control"  placeholder="phone number">
									</div>
								</div>
							</div>
							<div class="row">			
								<div class="col-sm-5">
									<div class="form-group">
										<label for="email">Email:</label>
										<input type="email" name="email" id="email" value="" class="form-control"  placeholder="email@email.com">
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label for="dob">Date of birth:</label>
										<input type="date" name="dob" id="dob" value="" class="form-control"  placeholder="date of birth">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="occupation">Occupation</label>
										<input type="text" name="occupation" id="occupation" class="form-control" value="" placeholder="occupation">
									</div>
								</div>
							</div>
							<div class="row">					
								<div class="col-sm-3">
									<div class="form-group">
										<label for="tribe">Tribe:</label>
										<input type="text" name="tribe" id="tribe" value="" class="form-control" placeholder="tribe">
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
										<label for="age">Age:</label>
										<input type="number" name="age" id="age" value="" class="form-control" placeholder="age">
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label for="marital_status">Marital Status:</label>
										<select name="marital_status" id="marital_status" class="form-control">
											<option value="">-- Select --</option>
											<option value="Single">Single</option>
											<option value="Married">Married</option>
										</select>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="nationality">Nationality:</label>
										<input type="text" name="nationality" id="nationality" class="form-control" value="" placeholder="Nationality">
									</div>
								</div>
							</div>
							<div class="row">	
								<div class="col-sm-4">
									<div class="form-group">
										<label for="state">State:</label>
										<input type="text" name="state" id="state" class="form-control" value="" placeholder="State">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="town">Town:</label>
										<input type="text" name="town" id="town" class="form-control" value="" placeholder="Town">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="mahrim">Mahrims Name:</label>
										<input type="text" name="mahrim" id="mahrim" class="form-control" value="" placeholder="Mahrims Name">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label for="spouse">Spouse:</label>
										<input type="text" name="spouse" id="spouse" class="form-control" value="" placeholder="spouse">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="fathers_name">Fathers Name:</label>
										<input type="text" name="fathers_name" id="fathers_name" class="form-control" value="" placeholder="fathers name">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="mothers_name">Mothers Name:</label>
										<input type="text" name="mothers_name" id="mothers_name" class="form-control" value="" placeholder="mothers name">
									</div>
								</div>
							</div>
							<div class="row">
								
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</section>

	<?php require_once 'includes/scripts.php'; ?>
</body>
</html>