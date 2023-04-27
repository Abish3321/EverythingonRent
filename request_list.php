<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .modal-backdrop {
            z-index: 0 !important;
        }
    </style>
</head>

<body>
    <?php include 'header.php' ?>

    <div class="container" style="padding-top: 55px;">
        <h1 class="text-center">List of Requests</h1>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Item Id</th>
                    <th>Item</th>
                    <th>Start Date</th>
                    <th>End Date</th>
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
                            echo "<button type='button' style='padding:20px 30px;' class='btn btn-success' data-toggle='modal' data-target='#detailsModal" . $row['req_id'] . "'>Accepted</button>";
                            // Accepted Modal
                            echo "<div class='modal fade' id='detailsModal" . $row['req_id'] . "' tabindex='-1' role='dialog' aria-labelledby='detailsModalLabel' aria-hidden='true'>";

                            $sql = "SELECT r.item_id, i.user_id as item_user_id, u.*
                            FROM requests r
                            JOIN items i ON r.item_id = i.item_id
                            JOIN users u ON i.user_id = u.user_id
                            WHERE r.req_id = $reqid;";
                            $result = mysqli_query($mysqli, $sql);
                            $row_provider = mysqli_fetch_row($result);
                            $name=$row['name'];
                            $email=$row['email'];
                            $phone=$row['phone'];
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
                                    <button type='button' class='btn btn-danger'>Cancel</button>
                                    <a href='view_req.php?id= " . $reqid . "' class='btn btn-info'> View</a>
                                </div>
                            </td>";
                        echo "</tr>";
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


    <?php include 'footer.php'; ?>

</body>

</html>