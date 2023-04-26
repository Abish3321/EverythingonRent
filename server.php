<?php
include 'dbconn.php';
//include 'auth.php';

// Check if the form has been submitted

//User Registeration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['register_user'])) {
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
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["document"]["name"]);
		move_uploaded_file($_FILES["document"]["tmp_name"], $target_file);

		// Validate form data
		$errors = array();
		if (empty($user_type) || empty($name) || empty($email) || empty($phone_number) || empty($address) || empty($doctype) || empty($username) || empty($password_1) || empty($password_2) || empty($document)) {
			$errors[] = "All fields are required.";
		}

		// Validate username
		if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$/", $username)) {
			$errors[] = "Username must contain at least 8 characters with at least one uppercase letter, one lowercase letter, one number, and one special character.";
		}

		// Validate password
		if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$/", $password_1)) {
			$errors[] = "Password must contain at least 8 characters with at least one uppercase letter, one lowercase letter, one number, and one special character.";
		}

		// Check if passwords match
		if ($password_1 != $password_2) {
			$errors[] = "Passwords do not match.";
		}

		if (count($errors) > 0) {
			echo "<script>alert('" . implode(" ", $errors) . "')</script>";
			echo "<script>window.location.href='Signup.php';</script>";
			exit;
		}

		$pwd = md5($password_1);
		$sql = "INSERT INTO users (user_type, name, email, phone_number, address, doctype, document, username, pwd) VALUES ('$user_type', '$name', '$email', '$phone_number','$address', '$doctype', '$document', '$username', '$pwd')";

		if (mysqli_query($mysqli, $sql)) {
			echo "<script>alert('Registration Successful!')</script>";
			echo "<script>window.location.href='Login.php';</script>";
		} else {
			echo "Error: " . $sql . " " . mysqli_error($mysqli);
		}
	}
}





// if(count($errors)==0){
// 	$password=md5($password_1);
// 	$sql="INSERT INTO users(username,email,password) VALUES('$username','$email','$password')";
// 	mysqli_query($db,$sql);
// 	$_SESSION['username']=$username;
// 	$_SESSION['success']="You are now logged in";
// 	header('location: index.php');
// }

//User Login 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['login'])) {
		// Retrieve form data
		$user_type = $_POST['user_type'];
		$identifier = $_POST['username'];
		$password = $_POST['password'];

		// Validate form data
		if (empty($user_type) || empty($identifier) || empty($password)) {
			// Display error message for missing fields
			echo "<script>alert('Empty Fields')</script>";
			echo "<script>window.location.href='Login.php';</script>";
			exit();
		}

		// Sanitize form data to prevent SQL injection
		$user_type = mysqli_real_escape_string($mysqli, $user_type);
		$identifier = mysqli_real_escape_string($mysqli, $identifier);
		$password = mysqli_real_escape_string($mysqli, $password);

		$pwd = md5($password);
		// Update the SQL query to include an OR condition for email and username
		$sql = "SELECT * FROM users WHERE user_type='$user_type' AND (username='$identifier' OR email='$identifier') AND pwd='$pwd'";
		$result = mysqli_query($mysqli, $sql);

		if (mysqli_num_rows($result) == 1) {
			// Login success, store user data in session and redirect to dashboard
			$user_data = mysqli_fetch_assoc($result);

			$_SESSION['username'] = $user_data['username'];
			$_SESSION['is_login'] = true;
			$_SESSION['email'] = $user_data['email'];
			$_SESSION['user_type'] = $user_data['user_type'];
			if ($user_type == "provider") {
				header('Location: provider_1.php');
			} else {
				header('Location: Home.php');
			}
			exit();
		} else {
			// Login failed, display error message
			header('Location: Login.php?error=invalid_credentials');
			exit();
		}
	}
}

//provider add items....
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['add_item'])) {

		// Get the form data
		$item_type = $_POST['item_type'];
		$item_name = $_POST['item_name'];
		$item_description = $_POST['item_description'];
		$Details = $_POST['Details'];
		$terms_and_conditions = $_POST['terms_and_conditions'];

		$image = $_FILES['item_image']['name'];

		// Upload the image file to the server
		$target_dir = "ads/";
		$target_file = $target_dir . basename($_FILES["item_image"]["name"]);
		move_uploaded_file($_FILES["item_image"]["tmp_name"], $target_file);

		$uname = $_SESSION['username'];
		$sqll = "SELECT user_id FROM users WHERE username = '$uname' ";
		$u_id_result = mysqli_query($mysqli, $sqll);
		// Fetch the row from the result set and extract the user_id value
		$row = mysqli_fetch_assoc($u_id_result);
		$u_id = $row['user_id'];

		// Insert the form data into the database table
		$sql = "INSERT INTO items VALUES ('','','$item_name', '$item_description','$Details', '$terms_and_conditions', '$image','$item_type',  '$u_id')";
		if (mysqli_query($mysqli, $sql)) {
			echo "<script>
				alert('Data added successfully');
			  window.location.href='add_product.php';
			</script>";
		} else {
			echo "<script>
			swal({
			  title: 'Error!',
			  text: 'Not!',
			  icon: 'error',
			  button: 'OK'
			});
			</script>";
		}
	}
}

//send request from details.php
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





//logout
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	unset($_SESSION['email']);
	unset($_SESSION['is_login']);
	header('location: Login.php');
}
