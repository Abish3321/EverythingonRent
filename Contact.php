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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

	<style>
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

		/* CSS for the contact form */
		form {
			margin-top: 30px;
		}

		/* CSS for the social media icons */
		.list-inline li {
			display: inline-block;
			margin-right: 10px;
		}

		.list-inline li a {
			color: #666;
			font-size: 24px;
		}

		.list-inline li a:hover {
			color: #007bff;
		}

		.fa {
			display: inline-block;
			font: normal normal normal 14px/1 FontAwesome;
			font-size: inherit;
			text-rendering: auto;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
		}

		.fa-facebook:before {
			content: "\f09a";
		}

		.fa-twitter:before {
			content: "\f099";
		}

		.fa-google-plus:before {
			content: "\f0d5";
		}

		.fa-linkedin:before {
			content: "\f0e1";
		}

		.contact {
			padding-top: 70px;
			padding-bottom: 30px;
			background: url('images/contact.jpg') no-repeat center center fixed;
			background-size: cover;

		}
	</style>
</head>

<body>
	<?php include 'header.php'; 
	?>
	<?php


	if (isset($_POST['submit_msg'])) {
		$uname = $_SESSION['username'];
		$sqll = "SELECT user_id FROM users WHERE username = '$uname'";
		$u_id_result = mysqli_query($mysqli, $sqll);
		$row = mysqli_fetch_assoc($u_id_result);
		$u_id = $row['user_id'];

		$subject = mysqli_real_escape_string($mysqli, $_POST['subject']);
		$msg = mysqli_real_escape_string($mysqli, $_POST['message']);

		$sql = "INSERT INTO message (subject, message, user_id) VALUES ('$subject', '$msg', $u_id)";
		$result = mysqli_query($mysqli, $sql);

		if (!$result) {
			echo "<script>
                swal({
                  title: 'Error!',
                  text: 'Something went wrong!',
                  icon: 'error',
                  button: 'OK'
                });
            </script>";
		} else {
			echo "<script>
                swal({
                  title: 'Success!',
                  text: 'Sent Successful!',
                  icon: 'success',
                  button: 'OK'
                }).then(function() {
                  window.location.href='Contact.php';
                });
            </script>";
		}
	}

	?>
	<!-- content -->
	<div class="container-fluid contact">
		<div class="row">
			<div class="container">
				<div class="col-md-6">
					<h2>Contact Us</h2>
					<div class="panel panel-default">
						<div class="panel-body ">
							<form method="post" role="form">
								<div class="form-group">
									<label for="subject">Subject : </label>
									<input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject">
								</div>
								<div class="form-group">
									<label for="message">Message : </label>
									<textarea class="form-control" rows="5" id="message" name="message" placeholder="Enter your Message"></textarea>
								</div>
								<button type="submit" name="submit_msg" class="btn btn btn-default broom">Send </button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<h2>Get In Touch</h2>
					<p>If you have any questions or comments, please don't hesitate to get in touch with us.</p>
					<p><strong>Address:</strong> 123 Main Street, Anytown USA</p>
					<p><strong>Phone:</strong> 555-1234</p>
					<p><strong>Email:</strong> info@onrent.com</p>
					<h2>Follow Us</h2>
					<ul class="list-inline">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
					</ul>
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