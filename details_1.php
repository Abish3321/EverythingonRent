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
            padding-left: 15px;
            padding-right: 15px;
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

    // Check if the id parameter is present in the query string
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Fetch the item with the specified id from the database
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

    <div class="container content">
        <div class="row">
            <form >
                <div class="col-sm-6 col-md-7">
                    <div class="form-group">
                        <img class="img-responsive det_img" src="uploads/<?php echo $row['item_img']; ?>" alt="<?php echo $row['Item_name']; ?>">
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
                        <a href="edit_item.php?id=<?php echo $row['item_id']; ?>" type="button" class="btn broom">Edit</a>
                        <a name="delete_item" type="button" class="btn broom">Remove</a>
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