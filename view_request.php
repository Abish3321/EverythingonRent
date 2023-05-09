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
    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
    
            $sql = "SELECT requests.*, items.*, users.* 
            FROM requests 
            INNER JOIN items ON requests.item_id = items.item_id 
            INNER JOIN users ON requests.user_id = users.user_id
            WHERE req_id = '$id'";
    
            $result = mysqli_query($mysqli, $sql);
            $row = mysqli_fetch_assoc($result);
    
            if (!$row) {
                echo "<script>alert('Invalid request id.'); window.location = 'renter_request.php';</script>";
            }
        } else {
            echo "<script>alert('Invalid request id.'); window.location = 'renter_request.php';</script>";
        }
    ?>
    <div class="container" style="padding-top: 55px;">
         <h1 class="text-center">User Request Details</h1> 
        <div class="row">

            <div class="col-sm-4">
          
				<div class="thumbnail">
					<img src="profilePic/<?php echo $row['profile_pic']; ?>" class="img-responsive" width="300" alt="<?php echo $row['profile_pic']?>"  alt="..." >
					<div class="caption">
						<h3>Requester- <?php echo $row['name']?></h3>
						<h5>Contact No.- <?php echo $row['phone_number']?></h5>
                        <h5>Email Address-<?php echo $row['email']?></h5>
                        <h5>Address- <?php echo $row['address']?></h5>
                        <h5>Zip-code- <?php echo $row['zip_code']?></h5>
                        <h5>City- <?php echo $row['city']?></h5>


					</div>
				</div>
			</div>

            <div class="col-md-8">
               
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td><strong>Request Id:</strong></td>
                            <td><?php echo $row['req_id']?></td>
                        </tr>
                        <tr>
                            <td><strong>Item ID:</strong></td>
                            <td><?php echo $row['item_id']?></td>
                        </tr>
                        <tr>
                            <td><strong>Item Name:</strong></td>
                            <td><?php echo $row['Item_name']?></td>
                        </tr>
                        <tr>
                            <td><strong>Item image:</strong></td>
                            <td><img src="ads/<?php echo $row['item_img']; ?>" class="img-responsive" width="300" alt="<?php echo $row['item_img']?>"></td>
                        </tr>
                        <tr>
                            <td><strong>Category:</strong></td>
                            <td><?php echo $row['item_type']?></td>
                        </tr>
                        <tr>
                            <td><strong>Start Date:</strong></td>
                            <td><?php echo $row['startDate']?></td>
                        </tr>
                        <tr>
                            <td><strong>End Date:</strong></td>
                            <td><?php echo $row['endDate']?></td>
                        </tr>
                        
                       
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="text-center">
            <a href="renter_request.php" style="width:30%; margin-bottom:20px;" class="btn btn-default broom">Back</a>
        </div>
    </div>
    
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

</body>

</html>
