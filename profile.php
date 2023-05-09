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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
		.btn {
			background-color: #07103e;
			color: white;

		}

		.social-icons a{
				color: white;
				font-size:large;
			}
        .foot {
			background-color: #8B0000;
        }

        .footer {
            padding: 60px 0;
            width: 100%;
            background-color: #8B0000;
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
						<div class="panel-heading" style="background-color: #f2dede; color:#8B0000;">
							<h2 class=" panel-title">My Profile</h2>
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
								
								<input type="submit"  class="btn btn-default form-control broom" name="update" value="Update">
								
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