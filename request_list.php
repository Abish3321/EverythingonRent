<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                        echo "<tr>";
                        echo "<td>" . $serialNo . "</td>";
                        echo "<td>" . $row['item_id'] . "</td>";
                        echo "<td><img src='ads/" . $row['item_img'] . "' width='100' alt='" . $row['username'] . "'></td>";
                        echo "<td>" . $row['startDate'] ."<br> To <br>".$row['endDate'] . "</td>";
                        echo "<td>" . $row['request_created_at']. "</td>";
                        echo "<td>";
                        if ($row['status'] == 0) {
                            echo "Pending";
                        } else if ($row['status'] == 1) {
                            echo "Accepted";
                        } else if ($row['status'] == 2) {
                            echo "Declined";
                        }
                        echo "</td>";
                        echo "<td>
                                <div class='btn-group' role='group'>
                                    <button type='button' class='btn btn-danger'>Cancel</button>
                                    <a href='view_req.php?id= " . $row['req_id'] . "' class='btn btn-info'> View</a>
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