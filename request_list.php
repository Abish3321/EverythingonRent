<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Document</title>

    <style>
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

        .modal-backdrop {
            z-index: 0 !important;
        }
    </style>
</head>

<body>
    <?php include 'header.php' ?>

    <!-- cancel request code -->
    <?php
    if (isset($_POST['cancelreq'])) {
        $reqid = $_POST['request_id'];

        // Perform database query to delete the request with the given ID
        $query = "DELETE FROM requests WHERE req_id = $reqid";
        $result = mysqli_query($mysqli, $query);

        if (!$result) {
            // Handle query error
            echo "Error deleting request: " . mysqli_error($mysqli);
        } else {
            // Redirect back to the page displaying the list of requests
            header("Location: view_requests.php");
            exit();
        }
    }

    ?>

    <div class="container" style="padding-top: 55px;">
        <h1 class="text-center">List of Requests</h1>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Item Id</th>
                    <th>Item</th>
                    <th>Duration</th>
                    <th>Request Sent On</th>
                    <th>Status</th>
                    <th>Action</th>
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
                INNER JOIN users ON items.user_id = users.user_id 
                WHERE requests.user_id = $userid";
                $result = mysqli_query($mysqli, $sql);



                // Check if there are any rows returned
                if (mysqli_num_rows($result) > 0) {
                    $serialNo = 1;
                    // Loop through each row and display the data in the HTML table
                    while ($row = mysqli_fetch_assoc($result)) {
                        $reqid = $row['req_id'];
                        echo "<tr>";
                        echo "<td>" . $serialNo . "</td>";
                        echo "<td>" . $row['item_id'] . "</td>";
                        echo "<td><img src='ads/" . $row['item_img'] . "' width='100' alt='" . $row['username'] . "'></td>";
                        echo "<td>" . $row['startDate'] . "<br> To <br>" . $row['endDate'] . "</td>";
                        echo "<td>" . $row['request_created_at'] . "</td>";
                        echo "<td>";
                        if ($row['status'] == 0) {
                            echo "<button type='button' style='padding:20px 30px;' class='btn btn-warning'>Pending</button>";
                        } else if ($row['status'] == 1) {
                            echo "<button type='button' style='padding:20px 30px;' class='btn btn-success' data-toggle='modal' data-target='#detailsModal" . $row['req_id'] . "'>See Owner Details Here</button>";
                            // Accepted Modal
                            echo "<div class='modal fade' id='detailsModal" . $row['req_id'] . "' tabindex='-1' role='dialog' aria-labelledby='detailsModalLabel' aria-hidden='true'>";

                            $sql = "SELECT r.item_id, i.user_id as item_user_id, u.*
                            FROM requests r
                            JOIN items i ON r.item_id = i.item_id
                            JOIN users u ON i.user_id = u.user_id
                            WHERE r.req_id = $reqid;";
                            $result = mysqli_query($mysqli, $sql);
                            $row_provider = mysqli_fetch_row($result);
                            $name = $row['name'];
                            $email = $row['email'];
                            $phone = $row['phone_number'];
                            // select item_id from requests where req_id =reqid;
                            // select user_id from items where item_id = 'item_id';
                            // select user_id from users where user_id = 'user_id';


                            echo "<div class='modal-dialog' role='document'>";
                            echo "<div class='modal-content'>";
                            echo "<div class='modal-header'>";
                            echo "<h5 class='modal-title' id='detailsModalLabel'>Request Details</h5>";
                            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                            echo "<span aria-hidden='true'>&times;</span>";
                            echo "</button>";
                            echo "</div>";
                            echo "<div class='modal-body'>";
                            // Here you can add the details of the provider connected to the request
                            echo "<h4>Provider Name: " . $name . "</h4>";
                            echo "<h4>Provider Phone: " . $phone . "</h4>";
                            echo "<h4>Provider Email: " . $email . "</h4>";
                            echo "</div>";
                            echo "<div class='modal-footer'>";
                            echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        } else if ($row['status'] == 2) {
                            echo "<button type='button' style='padding:20px 30px;' class='btn btn-danger' data-toggle='modal' data-target='#msgModal" . $row['req_id'] . "'>Declined</button>";

                            echo "<div class='modal fade' id='msgModal" . $row['req_id'] . "' tabindex='-1' role='dialog' aria-labelledby='msgModalLabel" . $row['req_id'] . "' aria-hidden='true'>";
                            echo "<div class='modal-dialog' role='document'>";
                            echo "<div class='modal-content'>";
                            echo "<div class='modal-header'>";
                            echo "<h5 class='modal-title' id='msgModalLabel" . $row['req_id'] . "'>Declined Message</h5>";
                            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                            echo "<span aria-hidden='true'>&times;</span>";
                            echo "</button>";
                            echo "</div>";
                            echo "<div class='modal-body'>";
                            echo "<textarea class='form-control' readonly>" . $row['msg'] . "</textarea>";
                            echo "</div>";
                            echo "<div class='modal-footer'>";
                            echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                        echo "</td>";
                        echo "<td>
                                <div class='btn-group' role='group'>
                                    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#cancelrequest'>Cancel</button>
                                    <a href='view_req.php?id= " . $reqid . "' class='btn btn-info'>View</a>
                                </div>
                            </td>";
                        echo "</tr>";

                        //<!-- Modal for request cancellation confirmation -->
                        echo "<div class='modal fade' id='cancelrequest' tabindex='-1' role='dialog' aria-labelledby='cancelrequestLabel'>";
                        echo "  <div class='modal-dialog' role='document'>";
                        echo "    <div class='modal-content'>";
                        echo "      <div class='modal-header'>";
                        echo "        <h4 class='modal-title' id='cancelrequestLabel'>Cancel Request Confirmation</h4>";
                        echo "        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
                        echo "      </div>";
                        echo "      <div class='modal-body'>";
                        echo "        <p>Are you sure you want to cancel this request?</p>";
                        echo "      </div>";
                        echo "      <div class='modal-footer'>";
                        echo "      <input type='hidden' name='request_id' value='$reqid'>";
                        echo "        <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>";
                        echo "        <button name='cancelreq' class='btn btn-danger'>Yes</button>";
                        echo "      </div>";
                        echo "    </div>";
                        echo "  </div>";

                        echo "</div>";

                        $serialNo++;
                    }
                } else {
                    // Display a message if no rows are returned
                    echo "<tr><td colspan='8'>No requests found</td></tr>";
                }

                ?>
            </tbody>
        </table>
    </div>


    <!-- footer -->
    <div class="container-fluid foot" style="margin-top:83px;">
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
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <hr>
                                    <a href="#" style="font-size: smaller;">
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