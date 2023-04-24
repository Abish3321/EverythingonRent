<?php

$db = mysqli_connect('localhost', 'root', '', 'everything');

// Check for errors
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Check if the form has been submitted
if (isset($_POST['add_category'])) {

    // Get the form data
    $category = $_POST['category'];
    // Insert the form data into the database table
    $sql = "INSERT INTO admin_category_add (category_name) VALUES ('$category')";
    if (mysqli_query($db, $sql)) {
        echo "<script>alert('New record created successfully');
        window.location.href='Category.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
}

$sql = "SELECT * FROM admin_category_add";
$result = mysqli_query($db, $sql);


?>