<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Provider Profile</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1" style="padding-top: 30px;">
				<div class="panel panel-default">
					<div class="panel-heading" style="background-color: #07103e; color:white;">
						<h2 class="panel-title"></h2>
					</div>
					<div class="panel-body">
						<form method="POST" action="" enctype="multipart/form-data" class="form-horizontal">
							<div class="form-group">
								<label for="profile_pic" class="col-sm-3 control-label">Profile Picture</label>
								<div class="col-sm-9">
									<a href="#" class="thumbnail">
										<?php if ($user_data['profile_pic']) { ?>
										<img src="profilePic/<?php echo $user_data['profile_pic'] ?>"
											alt="<?php echo $user_data['profile_pic'] ?>" width="304" height="236">
										<?php } else { ?>
										<img src="images/<?php echo $_filename; ?>" alt="No profile picture available"
											width="304" height="236">
										<?php } ?>
									</a>
									<input type="file" id="profile_pic" name="profile_pic">
									<p class="help-block">Upload a new profile picture.</p>
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-3 control-label">Name</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="name" name="name"
										value="<?php echo $user_data['name'] ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="email" class="col-sm-3 control-label">Email Address</label>
								<div class="col-sm-9">
									<input type="email" class="form-control" id="email" readonly
										value="<?php echo $user_data['email'] ?>" name="email">
								</div>
							</div>
							<div class="form-group">
								<label for="phone" class="col-sm-3 control-label">Phone Number</label>
								<div class="col-sm-9">
									<input type="tel" class="form-control" id="phone" name="phone" readonly
										value="<?php echo $user_data['phone_number'] ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="address" class="col-sm-3 control-label">Address</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="address" name="address"
										value="<?php echo $user_data['address'] ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="city" class="col-sm-3 control-label">City</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="city" name="city"
										value="<?php echo $user_data['city'] ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="state" class="col-sm-3 control-label">State</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="state" name="state"
										value="<?php echo $user_data['state'] ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="zip" class="col-sm-3 control-label">Zip Code</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="zip" name="zip"
										value="<?php echo $user_data['zip'] ?>">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<button type="submit" class="btn btn-primary">Save Changes</button>
									<a href="dashboard.php" class="btn btn-default">Cancel</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

</html>