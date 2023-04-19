<?php //include 'server.php'; ?>
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
<title>Add Product</title>

<!-- Bootstrap -->

<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.min.js"></script>
<link rel="shortcut icon" href="fonts/glyphicons-halflings-regular.eot" type="image/x-icon">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
<style>
    .broom,
    .broo:hover {
        background-color: #07103e;
        border-color: white;
        color: white;
    }

    .broom:hover,
    .broo {
        background-color: white;
        border-color: #07103e;
        color: #07103e;

    }

    body {

        background: url('images/form22.jpg') no-repeat center center fixed;
        background-size: cover;

    }

    .submit {
        color: white;
    }

    .sign {
        background-color: white;
        border-radius: 0px 0px 15px 15px;
    }
</style>

</head>

<body>

    <?php include 'header.php'; ?>

    <!-- sign up -->
    <div class="SignUp">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2" style="padding-top: 40px;">
                    <div class="panel-heading" style="background-color: #07103e; color:white; padding: 1px 0px;">
                        <div class="log-align-center" style="font-size:25px; text-align:center;">
                            <h2>Add Products</h2>
                        </div>
                    </div>
                    <div class="panel-body sign">
                        <form action="server.php" method="POST" enctype="multipart/form-data">
                            <div class="col-md-6">

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
                                <div class="form-group">
                                    <label for="item_name">Item Name:</label>
                                    <input type="text" class="form-control" id="item_name" name="item_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="item_description">Item Description:</label>
                                    <textarea class="form-control" id="item_description" name="item_description" rows="3" required></textarea>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Details">Item Details:</label>
                                    <textarea class="form-control" id="Details" name="Details" rows="3" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="terms_and_conditions">Terms and Conditions :</label>
                                    <textarea class="form-control" id="terms_and_conditions" name="terms_and_conditions" placeholder="Enter Terms & Condition for your product" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="item_image">Item Image:</label>
                                    <input type="file" class="form-control" id="item_image" name="item_image" accept="image/*" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary broom" style="width:50%; margin-left:25%;" name="add_item">Add Item</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end -->
    <div><br></div>
    <?php
    include 'footer.php';
    ?>
</body>

</html>