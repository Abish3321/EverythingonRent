<?php
//include 'server.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Bootstrap 101 Template</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="fonts/glyphicons-halflings-regular.eot" type="image/x-icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	<style>
		.modal-backdrop {
			z-index: 0 !important;
		}

		.btn {
			background-color: #07103e;
			color: white;

		}

		.social-icons a{
				color: white;
				font-size:large;
			}
        .foot {
            background-color: #07103e;
        }

        .footer {
            padding: 60px 0;
            width: 100%;
            background: #07103e;
            color: #fff;
        }

        .footer-title {
            position: relative;
            color: #fff;
            font-size: 24px;
            font-weight: 600;
            margin-top: 5px;
            margin-bottom: 20px;
        }

        .footer-title:after {
            position: absolute;
            content: '';
            left: 0;
            bottom: 0;
            width: 30px;
            height: 4px;
            background: white;
        }

        .footer-links a {
            padding: 10px 0;
            color: #fff;
            display: block;
            transition: color 0.5s ease-in-out;
            text-decoration: none;
        }

        .footer-links a:hover {
            color: #2e6da4;
        }



        .footer-bottom {
            width: 100%;
            padding: 25px 0;
            text-align: center;
            color: #fff;
            background: #07103e;

        }
		.change {
			padding-top: 100px;
			padding-bottom: 30px;
			background: url('images/form22.jpg') no-repeat center center fixed;
			background-size: cover;

		}

		.broom {
			background-color: #07103e;
			border-color: white;
			color: white;
		}

		.broom:hover {
			background-color: white;
			border-color: #07103e;
			color: #07103e;

		}
	</style>

</head>

<body>

	<?php include 'header.php'
	?>

	<?php
	if (isset($_POST['change_pswd'])) {
		// Sanitize the input
		$current_password = trim($mysqli->real_escape_string($_POST['current-password']));
		$new_password = trim($mysqli->real_escape_string($_POST['new-password']));
		$confirm_password = trim($mysqli->real_escape_string($_POST['confirm-password']));

		// Check if the new password and the confirmation match
		if ($new_password !== $confirm_password) {
			$error = 'The new password and the confirmation do not match.';
		} else {
			// Get the user ID from the session
			$username = $_SESSION['username'];

			// Check if the current password is correct
			$result = $mysqli->query("SELECT pwd FROM users WHERE username = '$username'");
			$row = $result->fetch_assoc();
			if ($row && $row['pwd'] === md5($current_password)) {
				// Update the password in the database
				$new_password_hash = md5($new_password);
				$mysqli->query("UPDATE users SET pwd = '$new_password_hash' WHERE username = '$username'");

				// Redirect to the profile page

				echo "<script>
			swal({
				title: 'Success!',
				text: 'Password Successfully Reset !',
				icon: 'success',
				button: 'OK'
			}).then(function() {
				window.location.href='provider_1.php';
			});
			</script>";
				exit();
			} else {
				$error = 'The current password is incorrect.';
			}
		}
	}
	?>


	<!-- content -->
	<div class="change">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-default">
						<div class="panel-heading" style="display: -webkit-box; background-color: #07103e; color:white;">
							<a href="profile.php"><span class="glyphicon glyphicon-triangle-left" style="color:white;"></span></a>&nbsp;&nbsp;
							<h2 class="panel-title">Change Password</h2>
						</div>
						<div class="panel-body">
							<?php if (isset($error)) : ?>
								<div class="alert alert-danger"><?= $error ?></div>
							<?php endif; ?>
							<form action="" method="post">
								<div class="form-group">
									<label for="current-password">Current Password:</label>
									<div class="form-inline">
										<div class="input-group" style="width: -webkit-fill-available;">
											<input type="password" class="form-control" id="current-password" name="current-password" required>
											<span class="input-group-btn">
												<button class="btn btn-default"><span class="glyphicon glyphicon-eye-open" id="togglePassword"></span></button>
											</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="new-password">New Password:</label>
									<div class="form-inline">
										<div class="input-group" style="width: -webkit-fill-available;">
											<input type="password" class="form-control" id="new-password" name="new-password" required>
											<span class="input-group-btn">
												<button class="btn btn-default"><span class="glyphicon glyphicon-eye-open" id="togglePassword1"></span></button>
											</span>
										</div>
									</div>

								</div>
								<div class="form-group">
									<label for="confirm-password">Confirm New Password:</label>
									<div class="form-inline">
										<div class="input-group" style="width: -webkit-fill-available;">
										<input type="password" class="form-control" id="confirm-password" name="confirm-password" required>
											<span class="input-group-btn">
												<button class="btn btn-default"><span class="glyphicon glyphicon-eye-open" id="togglePassword2"></span></button>
											</span>
										</div>
									</div>
									
								</div>
								<button type="button" class="btn btn-default broom" data-toggle="modal" data-target="#confirmModal">Submit</button>

								<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="confirmModalLabel">Confirm Password Change</h4>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											</div>
											<div class="modal-body">
												Are you sure you want to change your password?
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
												<button type="submit" name="change_pswd" class="btn btn-primary">Confirm</button>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- footer -->

	<div class="container-fluid foot">
			<div class="row">
				<div class="col-md-12">
					<h1> </h1>
					<footer class="footer">
						<div class="container">
							<div class="row">
								<div class="col-md-3 m-b-30">
									<div class="footer-title m-t-5 m-b-20 p-b-8">
										Social Media
									</div>
									<div class="social-icons">
										<a href="#"><i class="fa fa-facebook"></i></a>&nbsp;
										<a href="#"><i class="fa fa-twitter"></i></a>&nbsp;
										<a href="#"><i class="fa fa-instagram"></i></a>&nbsp;
										<a href="#"><i class="fa fa-linkedin"></i></a><hr>
										<a href="#"   style="font-size: smaller;">
										&copy; 2023 EverythingOnRent. All rights reserved.

										</a>

									</div>
								</div>
								<div class="col-md-3 m-b-30">
									<div class="footer-title m-t-5 m-b-20 p-b-8">
										Useful Links
									</div>
									<div class="footer-links">
										<a href="About.php">
											About us
										</a>
										<a href="Contact.php">
											Contact us
										</a>


									</div>
								</div>
								<div class="col-md-3 m-b-30">
									<div class="footer-title m-t-5 m-b-20 p-b-8">
										General Links
									</div>
									<div class="footer-links">

										<a href="Terms.php">
											Terms & conditions
										</a>
										<a href="Privacy.php">
											Privacy policy
										</a>
									</div>
								</div>
								<div class="col-md-3 m-b-30">
									<div class="footer-title m-t-5 m-b-20 p-b-8">
										Links
									</div>
									<div class="footer-links">
										<a href="SignUp.php">
											SignUp
										</a>
										<a href="#">
											Login
										</a>


									</div>

								</div>
							</div>
						</div>
					</footer>
				</div>
			</div>
		</div>


	<script>
		$(document).ready(function() {
			$('#submit-btn').click(function() {
				$('#confirmModal').modal('show');
			});

			$('#confirmModal button[type="submit"]').click(function() {
				$('#change-pwd-form').submit();
			});
		});

	</script>
	<script>
	const togglePassword = document.querySelector('#togglePassword');
	const togglePassword1 = document.querySelector('#togglePassword1');
	const togglePassword2 = document.querySelector('#togglePassword2');
	const currentPassword = document.querySelector('#current-password');
	const newPassword = document.querySelector('#new-password');
	const confirmPassword = document.querySelector('#confirm-password');

	togglePassword.addEventListener('click', () => {
		const type = currentPassword.getAttribute('type') === 'password' ? 'text' : 'password';
		currentPassword.setAttribute('type', type);
		togglePassword.classList.toggle('glyphicon-eye-open');
		togglePassword.classList.toggle('glyphicon-eye-close');
	});

	togglePassword1.addEventListener('click', () => {
		const type = newPassword.getAttribute('type') === 'password' ? 'text' : 'password';
		newPassword.setAttribute('type', type);
		togglePassword1.classList.toggle('glyphicon-eye-open');
		togglePassword1.classList.toggle('glyphicon-eye-close');
	});

	togglePassword2.addEventListener('click', () => {
		const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
		confirmPassword.setAttribute('type', type);
		togglePassword2.classList.toggle('glyphicon-eye-open');
		togglePassword2.classList.toggle('glyphicon-eye-close');
	});
</script>

	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

</body>

</html>