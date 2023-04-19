<?php
include 'server.php';

$username = $_SESSION['username'];

$user_type = $_SESSION['user_type'];
?>

<?php
// Get the current page name or identifier
$currentFile = $_SERVER["PHP_SELF"];
$parts = explode('/', $currentFile);
$pageName = end($parts);
// You can update this logic to determine the current page name or identifier as needed

// Initialize the $currentPage variable
$currentPage = '';

// Set the $currentPage variable based on the current page name or identifier
if ($pageName == 'provider_1.php') {
	$currentPage = 'provider_1';
}elseif ($pageName == 'Home.php') {
		$currentPage = 'Home';
} elseif ($pageName == 'About.php') {
	$currentPage = 'About';
} elseif ($pageName == 'Contact.php') {
	$currentPage = 'Contact';
} 
// Add more conditions to set $currentPage for other pages as needed
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

	<style>
		@media (min-width: 1200px) {
			.contain {
				width: 1300px;
			}
		}

		.broom {
			background-color: #07103e;
			border-color: white;
			color: white;
		}

		.broom:hover {
			background-color: white;
			border: 1px dashed #07103e;
			color: #07103e;

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
		<div class="container-fluid">
			<div class="container contain">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="navbar-logo" href="Home.php"><img src="images/logo.png" width="70" style="padding: 3px;">
					</div>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<?php if (isset($_SESSION['username']) && $user_type == 'renter') { ?>
						<ul class="nav navbar-nav">

							<li <?php if ($currentPage == 'Home') {
									echo 'class="active"';
								} ?>><a href="Home.php">Home</a></li>
							<li <?php if ($currentPage == 'Contact') {
									echo 'class="active"';
								} ?>><a href="Contact.php">Contact Us</a></li>
							<li <?php if ($currentPage == 'About') {
									echo 'class="active"';
								} ?>><a href="About.php">About Us</a></li>
						

						</ul>
						<ul class="nav navbar-nav navbar-right ">
							<li class="dropdown ">
								<a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<?php echo $_SESSION['username']; ?><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="profile.php" style="color:black;"><span class="glyphicon glyphicon-user "></span> Profile</a></li>
									<li role="separator" class="divider"></li>
									<li><a href="server.php?logout" style="color:black;"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
								</ul>
							</li>
						</ul>
					<?php } else { ?>
						<ul class="nav navbar-nav">
							<li <?php if ($currentPage == 'provider_1') {
									echo 'class="active"';
								} ?>><a href="provider_1.php">Home</a></li>
							<li <?php if ($currentPage == 'Contact') {
									echo 'class="active"';
								} ?>><a href="Contact.php">Contact Us</a></li>
							<li <?php if ($currentPage == 'About') {
									echo 'class="active"';
								} ?>><a href="About.php">About Us</a></li>
							

						</ul>


						<ul class="nav navbar-nav navbar-right ">
							<li class="dropdown ">
								<a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<?php echo $_SESSION['username']; ?><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="profile.php" style="color:black;"><span class="glyphicon glyphicon- "></span>My Profile</a></li>
									<li role="separator" class="divider"></li>
									<li><a href="MyAds.php" style="color:black;"><span class="glyphicon glyphicon- "></span>My Ads</a></li>
									<li><a href="add_product.php" style="color:black;"><span class="glyphicon glyphicon- "></span>Add Ads</a></li>
									<li><a href="Myprofile.php" style="color:black;"><span class="glyphicon glyphicon- "></span>Requests</a></li>
									<li role="separator" class="divider"></li>
									<li><a href="server.php?logout" style="color:black;"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
								</ul>
							</li>
						</ul>
					<?php } ?>

					<?php if (!isset($_SESSION['username'])) : ?>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="SignUp.php">Sign Up</a></li>
							<li><a href="Login.php">Login</a></li>
						</ul>
					<?php endif ?>
				</div>
			</div>

		</div>
	</nav>



</body>

</html>