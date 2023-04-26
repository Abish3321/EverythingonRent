<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
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

		.Profile {
			padding-top: 50px;
			padding-bottom: 20px;
			background: url('images/form22.jpg') no-repeat center center fixed;
			background-size: cover;

		}

		.dropdown-menu>.active>a,
		.dropdown-menu>.active>a:focus,
		.dropdown-menu>.active>a:hover {

			background-color: wheat;

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
	<?php include 'header.php'; ?>
	<?php
	//include 'server.php';
	// Start the session and connect to the database

	// Get the user ID from the session
	$username = $_SESSION['username'];

	// Check if the id parameter is present in the query string
	if (isset($username)) {
		// $id = $_GET['user_id'];
		// Fetch the user's data from the database
		$user_query = "SELECT * FROM users WHERE username='$username'";
		$user_result = $mysqli->query($user_query);
		$user_data = $user_result->fetch_assoc();
	}
	// profile
	if ($user_data['profile_pic']) {
		$_filename = $user_data['profile_pic'];
	} else {
		$_filename = "profile.jpeg";
	}


	// Process the form data
	?>
	<div class="Profile">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1" style="padding-top: 30px;" >
					<div class="panel panel-default">
						<div class="panel-heading" style="background-color: #07103e; color:white;">
							<h2 class=" panel-title">Provider Profile</h2>
						</div>
						<div class="panel-body">
							<div class="col-md-6">
								<form method="POST" action="" enctype="multipart/form-data">
									<div class="form-group">
										<label for="profile_pic">Profile Picture</label>
										<div class="row">
											<div class="col-xs-9 col-md-6">
												<a href="#" class="thumbnail">
													<!-- <img src="images/profile.jpeg" class="img" alt="..." width="304"
														height="236"  > -->

													<?php 
														if ($user_data['profile_pic']) { ?>
															<img src="profilePic/<?php echo $user_data['profile_pic'] ?>" class="img" alt="<?php echo $user_data['profile_pic'] ?>" width="304" height="236">
														<?php } else { ?>
															<img src="images/<?php echo $_filename; ?>" class="img" alt="..." width="304" height="236">
														<?php } ?>
													
												</a>
											</div>
											<div class="col-xs-6 col-md-9">
												<input type="file" id="profile_pic" name="profile_pic">
												<p class="help-block">Upload a new profile picture.</p>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="name"> Name</label>
										<input type="text" class="form-control" id="name" name="name" value="<?php echo $user_data['name'] ?>">
									</div>

									<div class="form-group">
										<label for="email">Email Address</label>
										<input type="email" class="form-control" id="email" readonly value="<?php echo $user_data['email'] ?>" name="email">
									</div>

							</div>
							<div class="col-md-6">

								<div class="form-group">
									<label for="phone">Phone Number</label>
									<input type="tel" class="form-control" id="phone" name="phone" readonly value="<?php echo $user_data['phone_number'] ?>">
								</div>
								<div class="form-group">
									<label for="address">Address</label>
									<input type="text" class="form-control" id="address" name="address" value="<?php echo $user_data['address'] ?>">
								</div>
								<div class="form-group">
									<label for="city">City</label>
									<input type="text" class="form-control" id="city" name="city" value="<?php echo $user_data['city'] ?>">
								</div>
								<div class="form-group">
									<label for="state">State</label>
									<input type="text" class="form-control" id="state" name="state" value="<?php echo $user_data['state'] ?>">
								</div>
								<div class="form-group">
									<label for="zip_code">Zip Code</label>
									<input type="text" class="form-control" id="zip_code" name="zip_code" value="<?php echo $user_data['zip_code'] ?>">
								</div>
								<input type="submit"  class="btn btn-default broom" name="update" value="Update">
								<a href="change.php" class="btn btn-default broom">Change Password</a>
								</form>
							</div>
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
<?php 
	if (isset($_POST['update'])) {
		$name = $_POST['name'];
		// $email = $_POST['email'];
		//$phone_number = $_POST['phone_number'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zip_code = $_POST['zip_code'];
		if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
			$filename = $_FILES['profile_pic']['name'];
			//echo $filename;
			$tempname = $_FILES['profile_pic']['tmp_name'];
			$folder = "uploads/";

			// Move the uploaded file to the designated folder
			move_uploaded_file($tempname, $folder . $filename);
		} else {
			$filename = $user_data['profile_pic'];
		}
		// Update the user's profile
		$update_query = "UPDATE users SET name='$name', address='$address', city='$city',profile_pic='$filename', state='$state', zip_code='$zip_code' WHERE username='$username'";
		
		if ($mysqli->query($update_query)) {
			echo "<script>window.location.href = 'profile.php'</script>";
		}
		// Handle the profile picture upload
	}
?>

	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>


</body>

</html>