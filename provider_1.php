<?php
//include 'server.php';
//include 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Provider Website</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 3 -->
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
        .jumbotron {
            background: url('images/Provider5.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
            text-align: center;

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

        .rent {
            padding-top: 100px;
            background: url('images/form22.jpg') no-repeat center center fixed;
            background-size: cover;

        }

        .form {
            padding-right: 33px;
            padding-left: 33px;
            padding-bottom: 33px;
            padding-top: 20px;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 30%;
            margin: 1%;
            float: left;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }



        .card img {
            max-width: 100%;
        }

        p,
        h2,
        h3,
        h4 {
            padding-left: 10px;
        }

    </style>
</head>

<body>

    <?php include 'header.php'; ?>
    
    <!-- /.container -->
    <div class="container request" style="padding-top: 80px;">
        <div class="col-xs-12 col-md-12">
            <div class="requests">
                <p><strong>Requests from users will appear here,Respond to requests - Accept or Decline to proceed
                        items bookings!</strong></p>
                <a style=" width:31%; margin-left:67%;  margin-top:-3% ;border: 1px dashed #07103e;" class="btn btn-block btn-lg broom" href="renter_request.php" role="button">Renter Requests </a>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="jumbotron text-center">
            <div class="container text">
                <div class="text-left">

                    <h1>Everthing On Rent</h1>

                    <p>Save Time and Money: Rent Appliances, Electronics, and More</p>
                </div>

            </div>
        </div><!-- /.jumbotron -->
    </div>



    <div class="container Products">
        <div class="row" style="padding-left:9%;">
            <div class="col-xs-12 col-md-6">
                <div class="about-text">
                    <h2>Want to rent out <span>your things?</span></h2>
                    <hr>
                    <p>
                        To get started, simply fill the form by clicking the below <u>Add Products</u> button and
                        list your item. You can set your own rental price and availability, and our platform will
                        handle the rest. We'll help you connect with renters, manage bookings. Plus, our platform
                        only allows verified users, so you can feel confident renting out your things.

                    <p>Whether you have a spare room, a power tool, or a bicycle, there's someone out there who
                        needs it. By renting out your items, you can make some extra cash and help someone else at
                        the same time.</p>
                    <p><strong> So why not give it a try? Sign up today and start renting out your items!</strong>
                    </p>

                    <a style="width:95%;" class="btn btn-default btn-lg  broom" href="add_product.php" role="button">Add Products </a>
                </div>
                <hr>
                

            </div>
            <div class="col-xs-12 col-md-5">
                <div class="about-media"> <img src="images/provider2.jpg" width="100%" alt=" "> </div>
                <div class="about-desc">

                    <p><strong>Welcome to our platform for renting out your items! Do you have things lying around
                        your home that you rarely use? Why not make some extra cash by renting them out to
                        people who need them? Our platform makes it easy for you to connect with people who are
                        looking to rent items like yours!</strong></p>
                </div>
            </div>

        </div>
    </div>



    <!-- footer -->


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
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>


</html>