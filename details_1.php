<?php //include 'server.php';?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="fonts/glyphicons-halflings-regular.eot" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <style>
        .broom {
            background-color: #07103e;
            border-color: white;
            color: white;
            width: 45%;
        }

        .broom:hover {
            background-color: white;
            border: 1px dashed #07103e;
            color: #07103e;

        }

        .content {
            margin-top: 90px;
        }

        .item-img {
            max-height: 500px;
            max-width: 500px;
        }

        .foot {
            background-color: #8B0000;
        }

        .footer {
            padding: 60px 0;
            width: 100%;
            background: #8B0000;
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
            background: #8B0000;

        }

        .det_img {
            width: 550px;
            padding-left: 15px;
            padding-right: 15px;
        }

        .modal-backdrop {
            z-index: 0 !important;
        }

        .social-icons a {
            color: white;
            font-size: large;
        }
    </style>


</head>

<body>
    <?php include 'header.php'; ?>

    <?php
    // Check if the id parameter is present in the query string
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Fetch the item with the specified id from the database
        $query = "SELECT * FROM items WHERE item_id = $id";
        $result = mysqli_query($mysqli, $query);
        $row = mysqli_fetch_assoc($result);
        if (!$row) {
            echo "<script>
        swal({
            title: 'Error!',
            text: 'Invalid Id!',
            icon: 'error',
            button: 'OK'
            }).then(function() {
            window.location.href='myAds.php';
            });
        </script>";
        } else {
            $permission = $row['permission'];
        }
    } else {
        echo "<script>
        swal({
            title: 'Error!',
            text: 'Invalid Id!',
            icon: 'error',
            button: 'OK'
            }).then(function() {
            window.location.href='myAds.php';
            });
    </script>";
        exit;
    }

    //delete item from details_1.php
    if (isset($_POST['remove_request'])) {
        $itmid = $_POST['itmid'];
        // First, delete related records from the requests table
        $sql = "DELETE FROM requests WHERE item_id = '$itmid' ";
        $delete_requests = mysqli_query($mysqli, $sql);
    
        // Then, delete the item from the items table
        $sql = "DELETE FROM items WHERE item_id = '$itmid' ";
        $delete_item = mysqli_query($mysqli, $sql);
    
        if ($delete_item && $delete_requests) {
            echo "<script>
            swal({
              title: 'Success!',
              text: 'Item Successfully Deleted!',
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
              text: 'Item Not Deleted!',
              icon: 'error',
              button: 'OK'
            });
        </script>";
        }
    }
    ?>

    <div class="container content">
        <div class="row">
            <form>
                <div class="col-sm-6 col-md-7">
                    <div class="form-group">
                        <img class="img-responsive det_img" src="ads/<?php echo $row['item_img']; ?>"  alt="<?php echo $row['item_img']; ?>">
                        <h1><?php echo $row['Item_name']; ?></h1>
                        <p>
                        <h3>Description : </h3><?php echo $row['item_description']; ?>
                        </p>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group">
                        <?php
                        $data = $row['item_details'];
                        $itemDetails = explode(",", $data);
                        ?>
                        <p>
                        <h3>Details: </h3>
                        <?php
                        foreach ($itemDetails as $detail) {
                            echo "<li>$detail</li>";
                        }
                        ?>
                        </p>
                        <p>
                            <?php
                            $dataterm = $row['terms'];
                            $terms  = explode(".", $dataterm);
                            ?>
                        <h3>Terms and Conditions: </h3>
                        <?php
                        foreach ($terms as $terms_and_conditions) {
                            echo "<li>$terms_and_conditions</li>";
                        }
                        ?>
                        </p>
                        <?php if ($permission == 0) { ?>
                            <div class="form-group">
                                <button disabled="disabled" style="width:50%;" class="btn btn-warning">Verification Pending</button>
                                <button name="delete_request" style="width:30%;" type="button" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger">Delete Request</button>
                            </div>
                        <?php } elseif ($permission == 1) { ?>
                            <div class="form-group">
                            <a href="edit_item.php?id=<?php echo $row['item_id']; ?>" type="button" class="btn broom">Edit</a>
                                <button name="delete_request" style="width:30%;" type="button" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger">Delete Item</button>
                            </div>
                        <?php } elseif ($permission == 2) { ?>
                            <div class="form-group">
                                <button disabled="disabled" style="width:50%;" class="btn btn-danger">Item Rejected</button>
                                <button name="delete_request" style="width:30%;" type="button" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger">Delete Item</button>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Remove Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this item?
                </div>
                <div class="modal-footer">
                    <form method="POST" action="">
                        <input type="hidden" name="itmid" value="<?php echo $row['item_id']; ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" name="remove_request" class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
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
                                    Quick Links
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

    <!-- Bootstrap JavaScript -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>


</body>

</html>