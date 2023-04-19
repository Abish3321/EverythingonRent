<?php
include('server.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
	<title>Signup</title>

	<!-- Bootstrap -->

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="fonts/glyphicons-halflings-regular.eot" type="image/x-icon">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
	<style>
		.broom,
		.broo:hover {
			background-color: #07103e;
			border-color: white;
			color: white;
		}

		.broom:hover,
		.broo {
			background-color: white;
			border-color: #07103e;
			color: #07103e;

		}

		body {

			padding-top: 70px;
			background: url('images/form22.jpg') no-repeat center center fixed;
			background-size: cover;

		}

		.submit {
			color: white;
		}

		.sign {
			background-color: white;
			border-radius: 0px 0px 15px 15px;
		}

		.navbar {
			margin: 0px;
		}

		.navbar-default {
			background-color: #07103e;
			border-color: #2e6da4;
		}

		.navbar-default .navbar-brand {
			color: #fff;
		}

		.navbar-default .navbar-nav>li>a {
			color: #fff;
		}

		.navbar-default .navbar-nav>li>a:hover,
		.navbar-default .navbar-nav>li>a:focus {
			background-color: #fff;
			color: #07103e;
		}

		.navbar-default .navbar-nav>.active>a,
		.navbar-default .navbar-nav>.active>a:hover,
		.navbar-default .navbar-nav>.active>a:focus {
			background-color: #fff;
			color: #07103e;
		}
	</style>

</head>

<body>

	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse">
				<ul class="nav navbar-nav navbar-left">
					<li><a href="Home.php"><span class="glyphicon glyphicon-triangle-left"></span></a></li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- sign up -->
	<div class="SignUp">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel-heading" style="background-color: #07103e; color:white; padding: 1px 0px;">
						<div class="log-align-center" style="font-size:25px; text-align:center;">
							<img src="images/logo.png" width="100">
						</div>
					</div>
					<div class="panel-body sign">
						<h2 class="panel-title" style="font-size:20px; font-weight:bold;text-align:center; padding-bottom:8px;">Sign Up</h2>
						<form action="server.php" method="POST" enctype="multipart/form-data">
							<div class="col-md-6">
								<div class="form-group">
									<input type="radio" id="usrttype" name="user_type" value="provider" required>
									<label for="provider">&nbsp;Provider</label>&nbsp;&nbsp;&nbsp;
									<input type="radio" id="usrttype" name="user_type" value="renter">
									<label for="renter">&nbsp;Renter</label>
								</div>
								<div class="form-group">
									<label for="reg-name">Name</label>
									<input type="text" class="form-control" id="reg-name" name="name" placeholder="Enter name" required>
								</div>
								<div class="form-group">
									<label for="reg-email">Email</label>
									<input type="email" class="form-control" id="reg-email" name="email" placeholder="Enter email">
								</div>
								<div class="form-group">
									<label for="reg-phone">Phone Number</label>
									<div class="form-inline">
										<input type="tel" class="form-control" id="reg-phone" name="phone_number" placeholder="Enter phone number">
										<input type="button" name="submit" class="btn btn-primary broo" value="verify">
									</div>

								</div>
								<div class="form-group">
									<label for="reg-address">Address</label>
									<textarea class="form-control" id="reg-address" name="address" placeholder="Enter Address" rows="3"></textarea>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="verification_type">Verification Type:</label>
									<select class="form-group" name="doctype" id="verification_type">
										<option value="">Select Verification Type</option>
										<option value="passport">Passport</option>
										<option value="aadhar">Aadhar Card</option>
										<option value="driver_license">Driver's License</option>
									</select>

									<div class="form-group" id="proof" style="display: none;">
										<label for="proof">Upload Verification Proof:</label>
										<input type="file" name="document" id="verification_proof">
									</div>
									<script>
										const verificationType = document.getElementById('verification_type');
										const Proof = document.getElementById('proof');

										verificationType.addEventListener('change', () => {
											if (verificationType.value === 'passport' || verificationType.value === 'aadhar' || verificationType.value === 'driver_license') {
												Proof.style.display = 'block';
											} else {
												Proof.style.display = 'none';
											}
										});
									</script>

								</div>
								<div class="form-group">
									<label for="username">Username</label>
									<input type="username" class="form-control" name="username" placeholder="Enter username" id="username">
								</div>
								<div class="form-group">
									<label for="reg-password">Password</label>
									<div class="form-inline">
										<input type="password" class="form-control" id="password" name="pswd" placeholder="Enter password">
										<span class="glyphicon glyphicon-eye-open" id="togglePassword"></span>
									</div>
								</div>
								<div class="form-group">
									<label for="reg-password">Confirm Password</label>
									<div class="form-inline">
										<input type="password" class="form-control" id="confirm_password" name="cpwd" placeholder="Enter password">
										<span class="glyphicon glyphicon-eye-open" id="toggle_Password"></span>
									</div>
								</div>
								<button type="submit" name="register_user" class="btn btn btn-default form-control broom">Register</button>

								<hr style="margin-top: 10px; margin-bottom: 5px;">
								<p>Already have an account !<a href="Login.php"> &nbsp; Sign-in</a></p>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		const togglePassword = document.querySelector('#togglePassword');
		const password = document.querySelector('#password');
		togglePassword.addEventListener('click', () => {
			const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
			password.setAttribute('type', type);
			// Update the glyphicon class to show different icon
			togglePassword.classList.toggle('glyphicon-eye-open');
			togglePassword.classList.toggle('glyphicon-eye-close');
		});

		
	</script>

	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>

</html>