<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Home</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="fonts/glyphicons-halflings-regular.eot" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
		.hero {
			background: url('images/toy-model-house-piles-coins-front-view.jpg');
			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
			padding: 100px 0;
			margin-top: 50px;
			box-shadow: 0px 0px 10px #888888;

			margin-bottom: 0;
			color: white;
			text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
		}

		.hero h1 {
			font-size: 4rem;
			margin-bottom: 30px;
		}

		.hero p {
			font-size: 1.5rem;
			margin-bottom: 30px;
		}
		.hero a.btn {
			font-size: 1.5rem;
		}
		

		.btn.btn-default.broom {
			background-color: #ffd700;
			border: none;
			color: #232f3e;
		}

		.btn.btn-default.broom:hover {
			background-color: #232f3e;
			color: #ffd700;
		}

		.social-icons a{
				color: white;
				font-size:large;
			}
        

		.thumb {
			margin-right: 20px;
			margin-left: 20px;
		}

		.thumbnail {
			border: none;
			border-radius: 0;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
			margin-bottom: 30px;
			height: 350px;
			overflow: hidden;
			position: relative;
		}

		.thumbnail img {
			height: 100%;
			object-fit: cover;
		}

		.thumbnail .caption {
			height: 100%;
			overflow: hidden;
		}

		.thumbnail .caption h4,
		.thumbnail .caption p {
			white-space: nowrap;
			overflow: hidden;
			margin-top: 0;
			text-overflow: ellipsis;
		}

		.thumbnail .caption p {
			height: 50px;
			margin-bottom: 0px;

			/* adjust this value as needed */
		}
		.social-icons a {
            color: white;
            font-size: large;
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

	<div class="container">
		<section class="hero">
			<div class="container text-center">
				<h1>Everthing On Rent</h1>
				<p>Save Time and Money: Rent Appliances, Electronics, and More</p>
				<p>And Get What You're Looking For At Your Convienience!</p>
				<p>
					<a class="btn btn-default broom" style="width:20%; font-weight:bold;" href="about.php" role="button">Learn more</a>
				</p>
			</div>
		</section>
	</div>
	<div class="container">
		<div class="row" style="margin-top: 25px;">
			<div class="col-md-12">
				<form class="form-inline" role="search" style="width:40%;">
					<div class="input-group" style="width: -webkit-fill-available;">
						<input type="text" id="searchInput" class="form-control" placeholder="Search">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-default broom" style="padding:7px"><i class="fa fa-search"></i></button>
						</span>
					</div>
				</form>
			</div>
		</div>
	</div>


	<br><br>
	<!-- category -->
	<!-- thumbnail -->
	<div class="container">
		<div class="row d-flex justify-content-center thumb">
			<?php
			$sql = "SELECT * FROM items where permission='1'";
			$result = mysqli_query($mysqli, $sql);
			// Display data in thumbnails
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					echo '
                        <div class="col-lg-3 col-md-4">
                            <div class="thumbnail">
                                <img src="ads/' . $row["item_img"] . '" class="img-responsive"  alt="furniture">
                                <div class="caption">
                                    <h4>' . $row["Item_name"] . '</h4>
                                    <p>' . $row["item_description"] . '</p>
                                    <p><a href="details.php?id=' . $row["item_id"] . '" class="btn btn-default broom" role="button">View Full Details</a></p>
                                    
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

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<h5 class="panel-title">Gadgets You'll Love,Get it On Rent!!</h5>
					</div>
					<div class="panel-body">
						<img src="images/amazon.jpg" alt="Banner Ad" class="img-responsive">
					</div>
				</div>
			</div>
		</div>
		<!-- Banner Ad -->
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
<script>
	// Get the search input element and thumbnail container element
	const searchInput = document.querySelector('#searchInput');
	const thumbnailContainer = document.querySelector('.thumb');

	// Store the original thumbnails in an array
	const originalThumbnails = Array.from(thumbnailContainer.querySelectorAll('.thumbnail'));

	// Listen for input events on the search input element
	searchInput.addEventListener('input', () => {
		// Get the user input and convert it to lowercase
		const searchQuery = searchInput.value.toLowerCase();

		// Remove all the existing thumbnail elements from the DOM
		thumbnailContainer.innerHTML = '';

		// Filter the original thumbnails array to only include thumbnails that match the search query
		const filteredThumbnails = originalThumbnails.filter(thumbnail => {
			const title = thumbnail.querySelector('h4').textContent.toLowerCase();
			const description = thumbnail.querySelector('p').textContent.toLowerCase();

			return title.includes(searchQuery) || description.includes(searchQuery);
		});

		// Create new thumbnail elements for the filtered thumbnails and append them to the thumbnail container
		filteredThumbnails.forEach(thumbnail => {
			const newThumbnail = document.createElement('div');
			newThumbnail.className = 'col-lg-3 col-md-3';
			newThumbnail.innerHTML = thumbnail.innerHTML;

			thumbnailContainer.appendChild(newThumbnail);
		});
	});
</script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>

</html>