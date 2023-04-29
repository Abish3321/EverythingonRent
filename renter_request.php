<?php //include 'server.php';
?>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
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

        .modal-backdrop {
            z-index: 0 !important;
        }
    </style>

<body>
    <?php include 'header.php';
    ?>
    <?php
    if (isset($_POST['accept'])) {
        $req_id = $_POST['req_id'];

        $status = 1;

        $sql = "UPDATE requests SET status='$status' WHERE req_id='$req_id'";
        $result = mysqli_query($mysqli, $sql);

        // Check if there are any rows returned
        if ($result) {

            $sql = "UPDATE items SET permission = '0' WHERE item_id = (SELECT item_id FROM requests WHERE req_id = $req_id);";
            $result = mysqli_query($mysqli, $sql);

            // Check if there are any rows returned
            if ($result) {
                    echo "<script>
                    swal({
                      title: 'Success!',
                      text: 'Request Accepted!',
                      icon: 'success',
                      button: 'OK'
                    }).then(function() {
                      window.location.href='renter_request.php';
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


    if (isset($_POST['reject'])) {
        $req_id = $_POST['req_id'];

        $status = 2;
        $msg = mysqli_real_escape_string($mysqli, $_POST['message']);

        $sql = "UPDATE requests SET status='$status', msg='$msg' WHERE req_id='$req_id';";

        $result = mysqli_query($mysqli, $sql);

        // Check if there are any errors with the query
        if (!$result) {
            printf("Error: %s\n", mysqli_error($mysqli));
            exit();
        }

        // Check if there are any rows returned
        if (mysqli_affected_rows($mysqli) > 0) {
            echo "<script>
        swal({
            title: 'Reject!',
            text: 'Request Declined!',
            icon: 'error',
            button: 'OK'
        }).then(function() {
            window.location.href='renter_request.php';
        });
    </script>";
        } else {
            echo "<script>
        swal({
            title: 'Error!',
            text: 'Not Declined!',
            icon: 'error',
            button: 'OK'
        });
    </script>";
        }
    }


    ?>

    <div class="container" style="padding-top: 55px;">
        <h1 class="text-center">User/Rental Requests</h1>
        <hr>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>User Image</th>
                    <th>Renter's Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $username = $_SESSION['username'];
                $sql = "SELECT user_id FROM users WHERE username='$username'";
                $result = mysqli_query($mysqli, $sql);
                $row = mysqli_fetch_row($result);
                $userid = $row[0];

                // Retrieve data from requests table
                $sql = "SELECT requests.*, items.*, users.*
            FROM requests
            INNER JOIN items ON requests.item_id = items.item_id
            INNER JOIN users ON requests.user_id = users.user_id
            WHERE items.user_id = $userid AND users.user_type = 'renter'";
                $result = mysqli_query($mysqli, $sql);

                // Check if there are any rows returned
                if (mysqli_num_rows($result) > 0) {
                    // Loop through each row and display the data in the HTML table
                    $serialNo = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $serialNo . "</td>";
                        echo "<td>" . $row['item_id'] . "</td>";
                        echo "<td>" . $row['Item_name'] . "</td>";
                        echo "<td><img src='profilePic/" . $row['profile_pic'] . "' width='100' alt='" . $row['username'] . "'></td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['startDate'] . "</td>";
                        echo "<td>" . $row['endDate'] . "</td>";
                        echo "<td>";
                        echo "<form method='POST'>";

                        if ($row['status'] == 0) {
                            echo "<input type='hidden' name='req_id' value='" . $row['req_id'] . "'>";
                            echo "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#acceptModal'>Accept</button>";
                            echo "<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#declineModal'>Reject</button>";
                            echo "<a href='view_request.php?id=" . $row['req_id'] . "' class='btn btn-info'>View</a>";

                            //Accept modal
                            echo "<div class='modal' id='acceptModal' tabindex='-1' role='dialog' aria-labelledby='acceptModalLabel' aria-hidden='true'>";
                            echo "    <div class='modal-dialog' role='document'>";
                            echo "        <div class='modal-content'>";
                            echo "            <div class='modal-header'>";
                            echo "                <h5 class='modal-title' id='acceptModalLabel'>Confirm Acceptance</h5>";
                            echo "                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                            echo "                    <span aria-hidden='true'>&times;</span>";
                            echo "                </button>";
                            echo "            </div>";
                            echo "            <div class='modal-body'>";
                            echo "                Are you sure you want to accept this request?";
                            echo "            </div>";
                            echo "            <div class='modal-footer'>";
                            echo "                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>";
                            echo "                <button type='submit' name='accept' class='btn btn-success'>Accept</button>";
                            echo "            </div>";
                            echo "        </div>";
                            echo "    </div>";
                            echo "</div>";

                            //Reject modal
                            echo "<div class='modal' id='declineModal' tabindex='-1' role='dialog' aria-labelledby='declineModalLabel' aria-hidden='true' data-backdrop='static'>";
                            echo "    <div class='modal-dialog' role='document'>";
                            echo "        <div class='modal-content'>";
                            echo "            <div class='modal-header'>";
                            echo "                <h5 class='modal-title' id='declineModalLabel'>Confirm Rejection</h5>";
                            echo "                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                            echo "                    <span aria-hidden='true'>&times;</span>";
                            echo "                </button>";
                            echo "            </div>";
                            echo "            <div class='modal-body'>";
                            echo "                <label>Enter Reason : </label><br>";
                            echo "                <textarea placeholder='Enter Reason Here' name='message' cols=75></textarea> <br><br><br>";
                            echo "                <p style='text-align:center; font-weight:bold;'>Are you sure you want to reject this request?</p>";
                            echo "            </div>";
                            echo "            <div class='modal-footer'>";
                            echo "                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>";
                            echo "                <button type='submit' name='reject' class='btn btn-danger'>Reject</button>";
                            echo "            </div>";
                            echo "        </div>";
                            echo "    </div>";
                            echo "</div>";
                        } else if ($row['status'] == 2) {
                            echo "<button type='button' style='width:60%;' class='btn btn-danger'>Rejected</button>";
                            echo "<a href='view_request.php?id=" . $row['req_id'] . "' class='btn btn-info'> View</a>";
                        } else if ($row['status'] == 1) {
                            echo "<button type='button' style='width:60%;' class='btn btn-success'>Booked</button>";
                            echo "<a href='view_request.php?id=" . $row['req_id'] . "' class='btn btn-info'> View</a>";
                        }

                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                        $serialNo++;
                    }
                } else {
                    // Display a message if no rows are returned
                    echo "<tr><td colspan='8'>No requests found</td></tr>";
                }
                ?>
                <!-- Modal -->

            </tbody>
        </table>
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
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>

</html>