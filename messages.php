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
    <div class="container" style="padding-top: 55px;padding-bottom: 55px;">
        <h1 class="text-center">Messages Sent</h1>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Subject</th>
                    <th>Messages</th>
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
                $sql = "SELECT * FROM message WHERE user_id  = $userid";
                $result = mysqli_query($mysqli, $sql);

                // Check if there are any rows returned
                if (mysqli_num_rows($result) > 0) {
                    // Loop through each row and display the data in the HTML table
                    $serialNumber = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$serialNumber."</td>";
                        echo "<td>" . $row['subject'] . "</td>";
                        echo "<td>" . $row['message'] . "</td>";

                        echo "</tr>";
                        $serialNumber++;
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