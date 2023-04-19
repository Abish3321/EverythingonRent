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
	<style>
		.btn {
			background-color: #07103e;
			color: white;

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
			padding-top: 50px;
			padding-bottom: 50px;
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

	<?php include 'header.php' ?>
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
							<form action="" method="post">
								<div class="form-group">
									<label for="current-password">Current Password:</label>
									<input type="password" class="form-control" id="current-password" name="current-password" required>
								</div>
								<div class="form-group">
									<label for="new-password">New Password:</label>
									<input type="password" class="form-control" id="new-password" name="new-password" required>
								</div>
								<div class="form-group">
									<label for="confirm-password">Confirm New Password:</label>
									<input type="password" class="form-control" id="confirm-password" name="confirm-password" required>
								</div>
								<button type="submit" class="btn btn-default broom">Submit</button>
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
									About us
								</div>
								<p class="white-text">
									Lorem Ipsum.
								</p>
							</div>
							<div class="col-md-3 m-b-30">
								<div class="footer-title m-t-5 m-b-20 p-b-8">
									Latest themes
								</div>
								<div class="footer-links">
									<a href="#">
										Appointment
									</a>
									<a href="#">
										Health center
									</a>
									<a href="#">
										Quality
									</a>
									<a href="#">
										Wallstreet
									</a>
								</div>
							</div>
							<div class="col-md-3 m-b-30">
								<div class="footer-title m-t-5 m-b-20 p-b-8">
									Quick Links
								</div>
								<div class="footer-links">
									<a href="#">
										Blog
									</a>
									<a href="#">
										FAQ
									</a>
									<a href="#">
										Terms & conditions
									</a>
									<a href="#">
										Privacy policy
									</a>
								</div>
							</div>
							<div class="col-md-3 m-b-30">
								<div class="footer-title m-t-5 m-b-20 p-b-8">
									Support
								</div>
								<div class="footer-links">
									<a href="#">
										Affiliate
									</a>
									<a href="#">
										Login
									</a>
									<a href="#">
										All theme package
									</a>
									<a href="#">
										Support forum
									</a>
								</div>

							</div>
						</div>
					</div>
				</footer>
			</div>
		</div>
	</div>



	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

</body>

</html>