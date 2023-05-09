<html>
	<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

	</head> 
<body>
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
		$user_verif = '0';
		if ($user_type == 'provider') {
			$user_verif = '0';
		} else {
			$user_verif = '1';
		}
		$pwd = md5($password_1);
		$sql = "INSERT INTO users (user_verif, user_type, name, email, phone_number, address, doctype, document, username, pwd) VALUES ('$user_verif','$user_type', '$name', '$email', '$phone_number','$address', '$doctype', '$document', '$username', '$pwd')";

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


// User Login 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['login'])) {
		// Retrieve form data
		$user_type = $_POST['user_type'];
		$identifier = $_POST['username'];
		$password = $_POST['password'];

		// Validate form data
		if (empty($user_type) && empty($identifier) || empty($password)) {
			// Display error message for missing fields
			header("Location: Login.php?error=Please fill all fields");
			exit();
		}

		if (empty($user_type) && empty($identifier)) {
			// Display error message for missing fields
			header("Location: Login.php?error=Please fill username and select usertype");
			exit();
		}
		if (empty($user_type) && empty($password)) {
			// Display error message for missing fields
			header("Location: Login.php?error=Please fill password and select usertype");
			exit();
		}
		if (empty($identifier) && empty($password)) {
			// Display error message for missing fields
			header("Location: Login.php?error=Please fill username and password field");
			exit();
		}
		if (empty($password)) {
			// Display error message for missing fields
			header("Location: Login.php?error=Please Fill Password field");
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

			

			if ($user_data['user_type'] != $user_type) {
				// Display error message for incorrect user type
				echo "<script>alert('Incorrect user type')</script>";
				echo "<script>window.location.href='Login.php';</script>";
				exit();
			}

			if ($user_data['username'] != $identifier && $user_data['email'] != $identifier) {
				// Display error message for incorrect username or email
				echo "<script>alert('Incorrect username or email')</script>";
				echo "<script>window.location.href='Login.php';</script>";
				exit();
			}

			if ($user_data['pwd'] != $pwd) {
				// Display error message for incorrect password
				echo "<script>alert('Incorrect password')</script>";
				echo "<script>window.location.href='Login.php';</script>";
				exit();
			}

			// All validations passed, store user data in session and redirect to dashboard
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

			// Invalid credentials, show error message using SweetAlert
			echo "<script>
						swal({
							title: 'Error',
							text: 'Invalid usertype or username or password',
							icon: 'error',
							timer: 2000,
							showConfirmButton: false
						});
						setTimeout(function(){
							window.location.href = 'Login.php';
						}, 2000);
					  </script>";
		}
	}
}





//send request from details.php






//logout
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	unset($_SESSION['email']);
	unset($_SESSION['is_login']);
	header('location: Login.php');
}
?>
</body>
</html>