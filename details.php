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
    <style>
        .broom {
            background-color: #07103e;
            border-color: white;
            color: white;
        }

        .broom:hover {
            background-color: white;
            border: 1px dashed #07103e;
            color: #07103e;

        }

        .content {
            margin-top: 50px;
        }

        .item-img {
            max-height: 500px;
            max-width: 500px;
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

        .det_img {
            width: 550px;
            padding-left: 90px;
        }

        .modal-backdrop {
            z-index: 0 !important;
        }
    </style>


</head>

<body>
    <?php include 'header.php'; ?>
    <?php
    //include 'server.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['send_request'])) {
            $username = $_SESSION['username'];
            $sql = "SELECT user_id FROM users WHERE username = '$username'";
            $result = mysqli_query($mysqli, $sql);
            $row = mysqli_fetch_assoc($result);
            $userid = $row['user_id'];
            $itemid = $_POST['itemid'];
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];
    
            $sql = "INSERT INTO requests (user_id, item_id, startDate, endDate) VALUES ('$userid', '$itemid', '$startDate', '$endDate')";
            if (mysqli_query($mysqli, $sql)) {
                echo "<script> alert('Request Send Successfully');  
                window.location = 'details.php?id=$itemid'; </script>";
            }
        }
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "SELECT * FROM items WHERE item_id = $id";
        $result = mysqli_query($mysqli, $query);
        $row = mysqli_fetch_assoc($result);

        if (!$row) {
            echo "<script>alert('Invalid item id.'); window.location = 'Home.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid item id.'); window.location = 'Home.php';</script>";
    }

    ?>
    
    <div class="container content" style="padding:50px;">
        <div class="row">
            <form method="POST">
                <div class="col-sm-6 col-md-7">
                    <div class="form-group">
                        <img class="img-responsive det_img" src="ads/<?php echo $row['item_img']; ?>"
                            alt="<?php echo $row['Item_name']; ?>">
                        <h1>
                            <?php echo $row['Item_name']; ?>
                        </h1>
                        <p>
                        <h3>Description : </h3>
                        <?php echo $row['item_description']; ?>
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
                            $terms = explode(".", $dataterm);
                            ?>
                        <h3>Terms and Conditions: </h3>
                        <?php
                        foreach ($terms as $terms_and_conditions) {
                            echo "<li>$terms_and_conditions</li>";
                        }
                        ?>
                        </p>
                        <button type="button" class="btn form-control broom" data-toggle="modal"
                            data-target="#interestedModal">Interested 😗</button>
                        <div class="modal fade" id="interestedModal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Create a request for provider</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="rentalForm" method="POST" action="server.php">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="start_date">Start Date:</label>
                                                    <input type="date" class="form-control" id="start_date" name="start_date">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="end_date">End Date:</label>
                                                    <input type="date" class="form-control" id="end_date" name="end_date">
                                                    <input type="hidden" name="itemid" value="<?php echo $row['item_id'] ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <button type="button" class="btn btn-default broom"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-default broom" name="send_request">Send Request</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
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
                                    About us
                                </div>
                                <p class="white-text">
                                    Lorem Ipsum.
                                </p>
                            </div>
                            <div class="col-md-3 m-b-30">
                                <div class="footer-title m-t-5 m-b-20 p-b-8">
                                    Latest themes
                                </div>
                                <div class="footer-links">
                                    <a href="#">
                                        Appointment
                                    </a>
                                    <a href="#">
                                        Health center
                                    </a>
                                    <a href="#">
                                        Quality
                                    </a>
                                    <a href="#">
                                        Wallstreet
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 m-b-30">
                                <div class="footer-title m-t-5 m-b-20 p-b-8">
                                    Quick Links
                                </div>
                                <div class="footer-links">
                                    <a href="#">
                                        Blog
                                    </a>
                                    <a href="#">
                                        FAQ
                                    </a>
                                    <a href="#">
                                        Terms & conditions
                                    </a>
                                    <a href="#">
                                        Privacy policy
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 m-b-30">
                                <div class="footer-title m-t-5 m-b-20 p-b-8">
                                    Support
                                </div>
                                <div class="footer-links">
                                    <a href="#">
                                        Affiliate
                                    </a>
                                    <a href="#">
                                        Login
                                    </a>
                                    <a href="#">
                                        All theme package
                                    </a>
                                    <a href="#">
                                        Support forum
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