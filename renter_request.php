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
        
    </style>

<body>

    <?php
    include 'header.php';
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
                    <th>User Name</th>
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
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['req_id'] . "</td>";
                        echo "<td>" . $row['item_id'] . "</td>";
                        echo "<td>" . $row['Item_name'] . "</td>";
                        echo "<td><img src='uploads/".$row['profile_pic'] . "' width='100' alt='" . $row['username'] . "'></td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['startDate'] . "</td>";
                        echo "<td>" . $row['endDate'] . "</td>";
                        echo "<td>
                                <div class='btn-group' role='group'>
                                    <button type='button' class='btn btn-success'>Accept</button>
                                    <button type='button' class='btn btn-danger'>Decline</button>
                                    <a href='view_request.php?id=".$row['req_id']."' class='btn btn-info'> View</a>
                                </div>
                            </td>";
                        echo "</tr>";
                    }
                } else {
                    // Display a message if no rows are returned
                    echo "<tr><td colspan='8'>No requests found</td></tr>";
                }

                ?>
            </tbody>
        </table>
    </div>
    <?php include 'footer.php';?>

    <!-- Include Bootstrap 3 JS and jQuery -->
    
</body>

</html>