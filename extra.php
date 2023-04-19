<?php
include 'server.php';
include 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Provider Website</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 3 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <style>
        .navbar {
            background-color: #07103e;
            color: white;
            font-size: 16px;
        }

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

        .navbar-nav {
            padding-left: revert;
        }

        .navbar-nav li a {

            padding: 9px;
            color: white
        }

        .navbar-right li a {
            padding: 9px;

        }

        .navbar-logo {
            color: white;
            font-size: x-large;
        }

        .navbar-default .navbar-nav>li>a {
            color: currentColor;
        }

        .navbar-default .navbar-nav>li>a:hover {
            color: white;
            font-weight: bold;
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



        .rent {
            padding-top: 100px;
            background: url('images/form22.jpg') no-repeat center center fixed;
            background-size: cover;

        }

        .form {
            padding-right: 33px;
            padding-left: 33px;
            padding-bottom: 33px;
            padding-top: 20px;
        }

        .add {
            background-color: white;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 30%;
            margin: 1%;
            float: left;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .container {
            margin-top: 20px;
        }

        .card img {
            max-width: 100%;
        }

        p,
        h2,
        h3,
        h4 {
            padding-left: 10px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-logo" href="Home.php">
                    <img src="images/logo.png" width="40">&nbsp;</a>Everything On Rent

            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav ">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="Contact.php">Contact Us</a></li>
                    <li><a href="About.php">About Us</a></li>
                    <li><a href="User.php?logout='1'" name="logout">Settings</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right ">
                    <li class="dropdown ">
                        <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<?php echo $_SESSION['username']; ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="profile.php" style="color:black;"><span class="glyphicon glyphicon-user "></span> Profile</a></li>

                            <li role="separator" class="divider"></li>

                            <li><a href="Home.php" style="color:black;"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default broom"><span class="glyphicon glyphicon-search"></span></button>
                </form>
            </div>
        </div>

    </nav>
    <!-- /.container -->
    <div class="container">
        <h1 style="margin-top: 55px;">Add Item</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group ">
                <label for="item-type">Item Type :</label>
                <select class="form-control" id="item-type" name="item_type">
                    <option>Electronics</option>
                    <option>Furniture</option>
                    <option>House</option>
                    <option>Vehicles</option>
                    <option>Equipments</option>
                    <option>Other</option>
                </select>
            </div>
            <div class="form-group ">
                <label for="item">Item :</label>
                <select class="form-control" id="item-type" name="item">
                    <option>Car</option>
                    <option>Motorcycle</option>
                    <option>Apartment</option>
                    <option>House</option>
                    <option>Other</option>
                    <option>Equipment</option>
                    <option>Room</option>
                </select>
            </div>
            <div class="form-group">
                <label for="item_name">Item Name:</label>
                <input type="text" class="form-control" id="item_name" name="item_name" required>
            </div>
            <div class="form-group">
                <label for="item_description">Item Description:</label>
                <textarea class="form-control" id="item_description" name="item_description" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="Details">Item Details:</label>
                <textarea class="form-control" id="Details" name="Details" rows="8" required></textarea>
            </div>

            <div class="form-group">
                <label for="terms_and_conditions">Terms and Conditions :</label>
                <textarea class="form-control" id="terms_and_conditions" name="terms_and_conditions" placeholder="Enter Terms & Condition for your product" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="item_image">Item Image:</label>
                <input type="file" class="form-control" id="item_image" name="item_image" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary" name="add_item">Add Item</button>
        </form>
        <hr>
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
                                    <p><a href="furniture.php?id=' . $row["item_id"] . '" class="btn btn-default broom" role="button">View Full Details</a></p>
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
    </div>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>


</html>