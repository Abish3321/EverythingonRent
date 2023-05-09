<?php include 'server.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Bootstrap 101 Template</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="fonts/glyphicons-halflings-regular.eot" type="image/x-icon">


	<style>
		.btn.btn-default.broom {
			background-color: #ffd700;
			border: none;
			color: #232f3e;
		}

		.btn.btn-default.broom:hover {
			background-color: #232f3e;
			color: #ffd700;
		}

		body {

			padding-top: 120px;
			padding-bottom: inherit;
			background: url('images/form22.jpg') no-repeat center center fixed;
			background-size: cover;

		}

		.submit {
			color: white;
		}

		.submit:hover {
			color: black;

		}

		.navbar {
			margin: 0px;
		}

		.navbar-default {
			background-color: #8B0000;
			border-color: #2e6da4;
		}

		.navbar-default .navbar-brand {
			color: #fff;
		}

		.navbar-default .navbar-nav>li>a {
			color: #fff;
		}

		.navbar-default .navbar-nav>li>a:hover,
		.navbar-default .navbar-nav>li>a:focus {
			background-color: #fff;
			color: #8B0000;
		}

		.navbar-default .navbar-nav>.active>a,
		.navbar-default .navbar-nav>.active>a:hover,
		.navbar-default .navbar-nav>.active>a:focus {
			background-color: #fff;
			color: #8B0000;
		}

		.choose {
			border-color: #8B0000;
			background-color: white;
			color: #8B0000;
		}

		.choose:hover {
			border-color: #8B0000;
			background-color: #8B0000;
			color: white;
		}

		label.btn.btn-default.choose.active {
			background-color: #8B0000;
			color: white;
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
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse">
				<ul class="nav navbar-nav navbar-left">
					<li><input type="hidden"></li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- login -->
	<div class="login">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-default">
						<div class="panel-heading" style="background-color: #8B0000; color:white;">
							<div class="log" style="font-size:25px; text-align:center;">
								<img src="images/logo.png" width="100">
							</div>
						</div>
						<div class="panel-body">
							<h2 class="panel-title" style="font-size:25px; font-weight:bold;text-align:center;">Login</h2>
							<?php if (isset($_GET['error'])) : ?>
									<div class="alert alert-danger">
										<?php echo $_GET['error']; ?>
									</div>
									<meta http-equiv="refresh" content="4;url=Login.php">
								<?php endif; ?>
							<form action="server.php" method="POST">
								
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-default choose">
										<input type="radio" id="usrttype" name="user_type" value="provider" autocomplete="off" checked> Provider
									</label>
									<label class="btn btn-default choose">
										<input type="radio" id="usrttype" name="user_type" value="renter" autocomplete="off"> Renter
									</label>
								</div><br><br>
								<div class="form-group">
									<label for="login-email">Username</label>
									<input type="text" name="username" class="form-control" id="login-email" placeholder="Enter email/username	">
								</div>
								<div class="form-group">
									<label for="reg-password">Password</label>
									<div class="form-inline">
										<input type="password" class="form-control" id="password" name="password" style="width:90%;" placeholder="Enter password"> &nbsp;&nbsp;
										<span class="glyphicon glyphicon-eye-open " id="togglePassword"></span>
									</div>
								</div>

								<button type="submit" name="login" class="btn btnbtn btn-default broom">Submit</button> &nbsp;&nbsp;<a href="Forget.php">Forgot Password? </a>&nbsp;&nbsp;If you forgot your password
								<br>

								<p>Don't have an account? <a href="SignUp.php">&nbsp;&nbsp;Create an Account</a></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		const togglePassword = document.querySelector('#togglePassword');
		const password = document.querySelector('#password');
		togglePassword.addEventListener('click', () => {
			const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
			password.setAttribute('type', type);
			// Update the glyphicon class to show different icon
			togglePassword.classList.toggle('glyphicon-eye-open');
			togglePassword.classList.toggle('glyphicon-eye-close');
		});
	</script>


	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

</body>

</html>