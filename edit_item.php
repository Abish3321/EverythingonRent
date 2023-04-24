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

        .thumb {
            margin-right: 20px;
            margin-left: 20px;
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
    </style>
</head>

<body>

        <?php include 'header.php';?>
    <?php

    // Check if the id parameter is present in the query string
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Fetch the item with the specified id from the dat    abase
        $query = "SELECT * FROM items WHERE item_id = $id";
        $result = mysqli_query($mysqli, $query);
        $row = mysqli_fetch_assoc($result);

        // Check if the form has been submitted
        if (isset($_POST['save_update'])) {
            $item_name = $_POST['Item_name'];
            $item_type = $_POST['item_type'];
            $item_description = $_POST['item_description'];
            $Details = $_POST['item_details'];
            $terms_and_conditions = $_POST['terms'];

            $image = $_FILES["image"]["name"];
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

            // Update the item in the database
            $query = "UPDATE items SET Item_name = '$item_name', item_type = '$item_type', item_description = '$item_description', item_details = '$Details', terms = '$terms_and_conditions', item_img = '$image' WHERE item_id = $id";

            if (mysqli_query($mysqli, $query)) {
                echo "<script>window.location.href = 'details_1.php?id='+$id</script>";
                //header("Location: details_1.php?id=$id");
            } else {
                echo "<script>alert('Error: " . mysqli_error($mysqli) . "');</script>";
            }
        }
    } else {
        echo 'Invalid item id.';
        exit();
    }

    ?>
    <div class="Edit">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 Edit Details" style="padding-top: 60px" ;>
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color: #07103e; color:white;">
                            <h2 class="panel-title text-center">Edit Details</h2>
                        </div>
                        <div class="panel-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Image:</label><br>
                                        <img class="item-img img-fluid" width="60%" src="uploads/<?php echo $row['item_img']; ?>" alt="<?php echo $row['Item_name']; ?>">
                                        <input type="file" class="form-control-file" id="image" name="image">
                                    </div>
                                    <div class="form-group">
                                        <label>Item Name:</label>
                                        <input type="text" name="Item_name" id="name" class="form-control" id="q4ee2" value="<?php echo $row['Item_name']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Description:</label>
                                        <textarea type="text" id="item_description" rows="5" class="form-control" fdprocessedid="gzq92j" name="item_description"><?php echo $row['item_description']; ?></textarea><br>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Item Type:</label>
                                        <input type="text" class="form-control" fdprocessedid="77w796" name="item_type" value="<?php echo $row['item_type']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Terms and Conditions:</label>
                                        <textarea type="text" id="terms_and_conditions" rows="5" class="form-control" fdprocessedid="c8gwej" name="terms" value=""><?php echo $row['terms']; ?></textarea><br>
                                    </div>

                                    <div class="form-group">
                                        <label>Details:</label>

                                        <textarea type="text" id="Details" rows="6" class="form-control" fdprocessedid="c8gwej" name="item_details"><?php echo $row['item_details']; ?></textarea>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center ">
                                        <button type ="submit" style="width:40%;" class="btn btn-default broom" name="save_update" value="Save Updations">Update</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        // Get the textarea element
        var textarea = document.getElementById("myTextarea");

        // Set the initial height of the textarea
        textarea.style.height = "auto";

        // Set a minimum height for the textarea
        textarea.style.minHeight = "50px";

        // Function to resize the textarea
        function resizeTextarea() {
            // Reset the height to auto so that the element can shrink
            textarea.style.height = "auto";
            // Set the new height to the scroll height of the content
            textarea.style.height = textarea.scrollHeight + "px";
        }

        // Call the resize function whenever the content changes
        textarea.addEventListener("input", resizeTextarea);
    </script>

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


    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>

</html>