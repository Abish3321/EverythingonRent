<html>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    </head>
    <body>
</body>
</html>
<?php
include 'dbconn.php';
// ADD CATEGORY

// Check if the form has been submitted
if (isset($_POST['add_category'])) {

    // Get the form data
    $category_name = $_POST['category_name'];
    // Insert the form data into the database table
    $sql = "INSERT INTO admin_category_add (category_name) VALUES ('$category_name')";
    if (mysqli_query($mysqli, $sql)) {
        echo "<script>
                    swal({
                      title: 'Success!',
                      text: 'Category Added!',
                      icon: 'success',
                      button: 'OK'
                    }).then(function() {
                      window.location.href='Category.php';
                    });
                </script>";
    } else {
        echo "<script>
                    swal({
                      title: 'Error!',
                      text: 'Not Added!',
                      icon: 'error',
                      button: 'OK'
                    });
                </script>";
    }
}

if (isset($_POST['edit_category'])) {

    // Get the form data
    $cate_id = $_POST['cat_id'];
    $category_name = $_POST['category_name'];
    $sql = "UPDATE admin_category_add SET  category_name = '$category_name' WHERE category_id='$cate_id'";


    if (mysqli_query($mysqli, $sql)) {
        echo "<script>
                    swal({
                      title: 'Success!',
                      text: 'Category Updated!',
                      icon: 'success',
                      button: 'OK'
                    }).then(function() {
                      window.location.href='Category.php';
                    });
                </script>";
    } else {
        echo "<script>
                    swal({
                      title: 'Error!',
                      text: 'Not Updated!',
                      icon: 'error',
                      button: 'OK'
                    });
                </script>";
    }
}

// TABLE FETCH

//$id = $_GET['id'];
$sql = "SELECT * FROM admin_category_add";
$result = mysqli_query($mysqli, $sql);




// Add Provider

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['register_provider'])) {
        // Retrieve form data
        $user_type = $_POST['user_type'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];
        $doctype = $_POST['doctype'];
        $username = $_POST['username'];
        $password_1 = $_POST['pswd'];
        $password_2 = $_POST['cpwd'];
        $document = $_FILES["document"]["name"];
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["document"]["name"]);
        move_uploaded_file($_FILES["document"]["tmp_name"], $target_file);

        // Validate form data
        $pwd = md5($password_1);
        $sql = "INSERT INTO users (user_type, name, email, phone_number, address, doctype, document, username, pwd) VALUES ('$user_type', '$name', '$email', '$phone_number','$address', '$doctype', '$document', '$username', '$pwd')";

        if (mysqli_query($mysqli, $sql)) {
            echo "<script>alert('Registration Successful!');
            window.location.href='Provider.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
        }
    }
}

// Add Renter

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['register_renter'])) {
        // Retrieve form data
        $user_type = $_POST['user_type'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];
        $doctype = $_POST['doctype'];
        $username = $_POST['username'];
        $password_1 = $_POST['pswd'];
        $password_2 = $_POST['cpwd'];
        $document = $_FILES["document"]["name"];
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["document"]["name"]);
        move_uploaded_file($_FILES["document"]["tmp_name"], $target_file);

        // Validate form data
        $pwd = md5($password_1);
        $sql = "INSERT INTO users (user_type, name, email, phone_number, address, doctype, document, username, pwd) VALUES ('$user_type', '$name', '$email', '$phone_number','$address', '$doctype', '$document', '$username', '$pwd')";

        if (mysqli_query($mysqli, $sql)) {
            echo "<script>alert('Registration Successful!');
            window.location.href='User.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
        }
    }
}



// Add Item

if (isset($_POST['add_item'])) {
    $query = "SELECT id, category_name FROM admin_category_add";
    $result = $mysqli->query($query);
    // Check for query success
    if (!$result) {
        die("Query failed: " . $mysqli->error);
    }

    $item_name = $_POST['item_name'];
    $item_description = $_POST['item_description'];
    $Details = $_POST['Details'];
    $terms_and_conditions = $_POST['terms_and_conditions'];


    $image = $_FILES['item_image']['name'];

    // Upload the image file to the server
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["item_image"]["name"]);
    move_uploaded_file($_FILES["item_image"]["tmp_name"], $target_file);

    // Insert the form data into the database table
    $sql = "INSERT INTO items(category_name,item_name,item_description,Details,terms_and_conditions,image) VALUES ('$category_name', '$item_name', '$item_description','$Details', '$terms_and_conditions', '$image')";
    if (mysqli_query($mysqli, $sql)) {
        echo "<script>alert('New Item added Successfully!');
        window.location.href='Item.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
}
