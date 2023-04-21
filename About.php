<?php //include 'server.php'; ?>
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

		/* CSS for the image */
		.img-responsive {
			display: block;
			max-width: 100%;
			height: auto;
			margin: auto;
		}

		.jumbotron {
			background: url('images/about2.jpg') no-repeat center center fixed;
			background-size: cover;
			opacity: .7;
			text-align: center
		}


		.about {
			padding-top: 70px;
			padding-bottom: 30px;
			color:black;
		}

		</style>
</head>

<body>
	<?php include 'header.php';?>


	<!-- content -->

	<div class="container about">
		<div class="jumbotron ">
			<div class="container text">
				<h2>About Us</h2>
				<p>
				<h4>
				Welcome to Everything On Rent, your one-stop destination for all your rental needs. Our platform connects providers and renters, making it easy for you to rent anything you need or list anything you have for rent.

Our mission is to make renting a hassle-free experience for both parties. Whether you need a car, a house, tools, or any other item, you can find it on our platform. Our providers offer a wide variety of items, so you can find what you need at an affordable price.

For renters, our platform offers the convenience of searching for and renting items from the comfort of your own home. Our user-friendly website allows you to browse through available items, compare prices, and connect with providers directly.

For providers, we offer a hassle-free way to list your items for rent. With our platform, you can easily upload photos and descriptions of your items, set your rental prices and availability, and manage your rentals all in one place.

We take pride in our commitment to providing exceptional customer service. Our team is always available to assist you with any questions or concerns you may have. We value transparency and strive to ensure that all transactions on our platform are secure and reliable.

Thank you for choosing Everything On Rent. We look forward to helping you with all your rental needs.

				</h4>
				</p>


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