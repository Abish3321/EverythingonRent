<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <link rel="shortcut icon" href="fonts/glyphicons-halflings-regular.eot" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .social-icons a{
				color: white;
				font-size:large;
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

        /* Footer */
		.footer {
			background-color: #8B0000;
			padding: 30px 0;
			font-size: 14px;
		}

		.footer-title {
			font-weight: 600;
			margin-bottom: 10px;
			color: #fff;
		}

		.social-icons a {
			display: inline-block;
			width: 32px;
			height: 32px;
			line-height: 32px;
			text-align: center;
			color: #fff;
			background-color: #333;
			border-radius: 50%;
			margin-right: 10px;
			margin-bottom: 10px;
		}

		.social-icons a:hover {
			background-color: #428bca;
			color: #fff;

		}

		.footer-links a {
			display: block;
			margin-bottom: 10px;
			color: #fff;
			text-decoration: none;
		}

		.footer-links a:hover {
			color: #fff;
		}

		.footer hr {
			margin: 10px 0;
			border: none;
			border-top: 1px solid #ccc;
		}

        .thumb {
            margin-right: 20px;
            margin-left: 20px;
        }

        .thumbnail {
            height: 300px;
        }

        .thumbnail img {
            height: 150px; 
            max-width: 100%;
            display: block;
            margin: auto;
        }

        .thumb p {
            display: inline-block;
            width: -webkit-fill-available;
            white-space: nowrap;
            overflow: hidden !important;
            text-overflow: ellipsis;
        }

        .thumb img {
            width: 90%;
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container" style="margin-top: 43px;">
        <h2><strong>Added Products</strong></h2>
        <hr>
    </div>
    <div class="container">
        <div class="row thumb">
            <?php
            $uname = $_SESSION['username'];
            $sql1 = "SELECT user_id from users where username = ?";
            $stmt1 = mysqli_prepare($mysqli, $sql1);
            mysqli_stmt_bind_param($stmt1, "s", $uname);
            mysqli_stmt_execute($stmt1);
            $result1 = mysqli_stmt_get_result($stmt1);
            $row1 = mysqli_fetch_assoc($result1);
            $u_id = $row1['user_id'];

            $sql = "SELECT * FROM items WHERE user_id = ?";
            $stmt = mysqli_prepare($mysqli, $sql);
            mysqli_stmt_bind_param($stmt, "i", $u_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            // Display data in thumbnails
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '
                        <div class="col-sm-3">
                            <div class="thumbnail">
                                <img src="ads/' . $row["item_img"] . '" class="img-responsive" alt="furniture">
                                <div class="caption">
                                    <h4>' . $row["Item_name"] . '</h4>
                                    <p>' . $row["item_description"] . '</p>
                                    <p><a href="details_1.php?id=' . $row["item_id"] . '" class="btn btn-default broom" role="button">View Full Details</a></p>
                                </div>
                            </div>
                        </div>
                        ';
                }
            } else {
                echo "No products found.";
            }

            ?>
        </div>
    </div>



    	<!-- footer -->
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
						<a href="#"><i class="fa fa-linkedin"></i></a>
						<hr>


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
					<a href="#" style=" color:#fff; font-size: smaller;">
						&copy;
						<p>2023 EverythingOnRent. All rights reserved.</p>

					</a>
				</div>
			</div>
		</div>
	</footer>



    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>

</html>