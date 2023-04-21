<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <link rel="shortcut icon" href="fonts/glyphicons-halflings-regular.eot" type="image/x-icon">

    <style>
        .broom {
            background-color: #07103e;
            border-color: white;
            color: white;
        }

        .broom:hover {
            background-color: white;
            border-color: #07103e;
            color: #07103e;

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

        .thumb {
            margin-right: 20px;
            margin-left: 20px;
        }

        .thumbnail {
            height: 300px;
        }

        .thumbnail img {
            height: 150px;
            max-width: 100%;
            display: block;
            margin: auto;
        }

        .thumb p {
            display: inline-block;
            width: -webkit-fill-available;
            white-space: nowrap;
            overflow: hidden !important;
            text-overflow: ellipsis;
        }

        .thumb img {
            width: 90%;
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container" style="margin-top: 43px;">
        <h2><strong>Added Products</strong></h2>
        <hr>
    </div>
    <div class="container">
        <div class="row thumb">
            <?php
            $uname = $_SESSION['username'];
            $sql1 = "SELECT user_id from users where username = ?";
            $stmt1 = mysqli_prepare($mysqli, $sql1);
            mysqli_stmt_bind_param($stmt1, "s", $uname);
            mysqli_stmt_execute($stmt1);
            $result1 = mysqli_stmt_get_result($stmt1);
            $row1 = mysqli_fetch_assoc($result1);
            $u_id = $row1['user_id'];

            $sql = "SELECT * FROM items WHERE user_id = ?";
            $stmt = mysqli_prepare($mysqli, $sql);
            mysqli_stmt_bind_param($stmt, "i", $u_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            // Display data in thumbnails
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '
                        <div class="col-sm-3">
                            <div class="thumbnail">
                                <img src="uploads/' . $row["item_img"] . '" class="img-responsive" alt="furniture">
                                <div class="caption">
                                    <h4>' . $row["Item_name"] . '</h4>
                                    <p>' . $row["item_description"] . '</p>
                                    <p><a href="details_1.php?id=' . $row["item_id"] . '" class="btn btn-default broom" role="button">View Full Details</a></p>
                                </div>
                            </div>
                        </div>
                        ';
                }
            } else {
                echo "No products found.";
            }

            ?>
        </div>
    </div>



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


    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>

</html>