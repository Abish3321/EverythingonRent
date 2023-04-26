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

</head>

<body>
    <?php include 'header.php'; ?>
    <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
    
            $sql = "SELECT requests.*, items.*, users.* 
            FROM requests 
            INNER JOIN items ON requests.item_id = items.item_id 
            INNER JOIN users ON requests.user_id = users.user_id
            WHERE req_id = '$id'";
    
            $result = mysqli_query($mysqli, $sql);
            $row = mysqli_fetch_assoc($result);
    
            if (!$row) {
                echo "<script>alert('Invalid request id.'); window.location = 'renter_request.php';</script>";
            }
        } else {
            echo "<script>alert('Invalid request id.'); window.location = 'renter_request.php';</script>";
        }
    ?>
    <div class="container" style="padding-top: 55px;">
         <h1 class="text-center">Your Request Details</h1> 
        <div class="row">
            <div class="col-sm-4">
          
				<div class="thumbnail">
					<img src="profilePic/<?php echo $row['profile_pic']?>" class="img-responsive" width="300" alt="<?php echo $row['profile_pic']?>" >
					<div class="caption">
						<h3>Name - <?php echo $row['name']?></h3>
						<h5>Contact No.- <?php echo $row['phone_number']?></h5>
                        <h5>Email Address-<?php echo $row['email']?></h5>
                        <h5>Address- <?php echo $row['address']?></h5>
                        <h5>Zip-code- <?php echo $row['zip_code']?></h5>
                        <h5>City- <?php echo $row['city']?></h5>
					</div>
				</div>
			</div>

            <div class="col-md-8">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td><strong>Request Id:</strong></td>
                            <td><?php echo $row['req_id']?></td>
                        </tr>
                        <tr>
                            <td><strong>Item ID:</strong></td>
                            <td><?php echo $row['item_id']?></td>
                        </tr>
                        <tr>
                            <td><strong>Item Name:</strong></td>
                            <td><?php echo $row['Item_name']?></td>
                        </tr>
                        <tr>
                            <td><strong>Item image:</strong></td>
                            <td><img src="ads/<?php echo $row['item_img']; ?>" class="img-responsive" width="300" alt="<?php echo $row['item_img']?>"></td>
                        </tr>
                        <tr>
                            <td><strong>Category:</strong></td>
                            <td><?php echo $row['item_type']?></td>
                        </tr>
                        <tr>
                            <td><strong>Start Date:</strong></td>
                            <td><?php echo $row['startDate']?></td>
                        </tr>
                        <tr>
                            <td><strong>End Date:</strong></td>
                            <td><?php echo $row['endDate']?></td>
                        </tr>
                        
                       
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="text-center">
            <a href="request_list.php" style="width:30%; margin-bottom:20px;" class="btn btn-default broom">Back</a>
        </div>
    </div>
    <?php include 'footer.php';?>


</body>

</html>
