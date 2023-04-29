<?php //include 'server.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
<title>Add Product</title>

<!-- Bootstrap -->

<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.min.js"></script>
<link rel="shortcut icon" href="fonts/glyphicons-halflings-regular.eot" type="image/x-icon">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

</style>

</head>

<body>

    <?php include 'header.php'; ?>
    <?php
    //provider add items....
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['add_item'])) {

            // Get the form data
            $item_type = $_POST['item_type'];
            $item_name = $_POST['item_name'];
            $item_description = $_POST['item_description'];
            $Details = $_POST['Details'];
            $terms_and_conditions = $_POST['terms_and_conditions'];

            $image = $_FILES['item_image']['name'];

            // Upload the image file to the server
            $target_dir = "ads/";
            $target_file = $target_dir . basename($_FILES["item_image"]["name"]);
            move_uploaded_file($_FILES["item_image"]["tmp_name"], $target_file);

            $uname = $_SESSION['username'];
            $sqll = "SELECT user_id FROM users WHERE username = '$uname' ";
            $u_id_result = mysqli_query($mysqli, $sqll);
            // Fetch the row from the result set and extract the user_id value
            $row = mysqli_fetch_assoc($u_id_result);
            $u_id = $row['user_id'];

            // Insert the form data into the database table
            $sql = "INSERT INTO items VALUES ('','','$item_name', '$item_description','$Details', '$terms_and_conditions', '$image','$item_type',  '$u_id')";
            if (mysqli_query($mysqli, $sql)) {
                echo "<script>
                swal({
                  title: 'Success!',
                  text: 'Item details have been sent for verification!',
                  icon: 'success',
                  button: 'OK'
                }).then(function() {
                  window.location.href='myAds.php';
                });
            </script>";
            } else {
                echo "<script>
			swal({
			  title: 'Error!',
			  text: 'Not!',
			  icon: 'error',
			  button: 'OK'
			});
			</script>";
            }
        }
    }
    ?>
    <!-- sign up -->
    <div class="SignUp">
        <div class="container" style="padding:50px;">
            <div class="row">
                <div class="col-md-8 col-md-offset-2" style="padding-top: 40px;">
                    <div class="panel-heading" style="background-color: #07103e; color:white; padding: 1px 0px;">
                        <div class="log-align-center" style="font-size:25px; text-align:center;">
                            <h2>Add Products</h2>
                        </div>
                    </div>
                    <div class="panel-body sign">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="col-md-6">

                                <div class="form-group ">
                                    <label for="item-type">Item Type :</label>
                                    <select class="form-control" id="item-type" name="item_type">
                                        <option>Electronics</option>
                                        <option>Furniture</option>
                                        <option>House</option>
                                        <option>Vehicles</option>
                                        <option>Equipments</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="item_name">Item Name:</label>
                                    <input type="text" class="form-control" id="item_name" name="item_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="item_description">Item Description:</label>
                                    <textarea class="form-control" id="item_description" name="item_description" rows="3" required></textarea>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Details">Item Details:</label>
                                    <textarea class="form-control" id="Details" name="Details" rows="3" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="terms_and_conditions">Terms and Conditions :</label>
                                    <textarea class="form-control" id="terms_and_conditions" name="terms_and_conditions" placeholder="Enter Terms & Condition for your product" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="item_image">Item Image:</label>
                                    <input type="file" class="form-control" id="item_image" name="item_image" accept="image/*" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary broom" style="width:50%; margin-left:25%;" name="add_item">Add Item</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end -->
    <div><br></div>
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
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    </body>

</html>