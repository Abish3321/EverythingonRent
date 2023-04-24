<!DOCTYPE php>
<php lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
    <title>Bootstrap 101 Template</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	

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

      
		
body {
    
    padding-top:100px ;
    padding-bottom:100px ;
    background: url('form22.jpg') no-repeat center center fixed;
		background-size: cover;
                 
}
.submit{
color: white;
}
.submit:hover{
  color: black;
  
}


</style>

</head>
<body>

 


      <!-- login -->
<div class="login">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
              <div class="panel-heading" style="background-color: #07103e; color:white;">
                <div class="log" style="font-size:25px; text-align:center;">
                    <img src="logo.png" width="100">
                  </div>
              </div>
              <div class="panel-body">
                <h2 class="panel-title" style="font-size:25px; font-weight:bold;text-align:center;">Admin Login</h2>
                <form>
                  <div class="form-group">
                    <label for="login-email">Email</label>
                    <input type="email" class="form-control" id="login-email" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="login-password">Password</label>
                    <input type="password" class="form-control" id="login-password" placeholder="Enter password">
                  </div>
                  
                 
                  <a href="admin.php" type="submit"  class="btn btnbtn btn-default broom">Submit</a>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>    
</div>              
                
            

                <script src="js/bootstrap.min.js"></script>

            </body>
            </php>