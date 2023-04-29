<?php
include('dbconn.php');

?>
<!DOCTYPE php>
<php lang="en">

  <head>
    <title>Rent Admin Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="custom.css">

    <style>
      @media(min-width:768px) {
        body {
          margin-top: 50px;
        }


      }

      #wrapper {
        padding-left: 0;
      }

      #page-wrapper {
        width: 100%;
        padding: 0;
        background-color: #fff;

      }

      @media(min-width:768px) {
        #wrapper {
          padding-left: 225px;
        }

        #page-wrapper {
          padding: 22px 10px;
        }
      }



      .top-nav {
        padding: 0 15px;
      }

      .top-nav>li {
        display: inline-block;

      }

      .top-nav>li>a {
        padding-top: 20px;
        padding-bottom: 20px;
        line-height: 20px;
        color: #fff;
      }

      .top-nav>li>a:hover,
      .top-nav>li>a:focus,
      .top-nav>.open>a,
      .top-nav>.open>a:hover,
      .top-nav>.open>a:focus {
        color: #fff;
        background-color: #ffffff;
      }

      .top-nav>.open>.dropdown-menu {
        float: left;
        position: absolute;
        margin-top: 0;
        /*border: 1px solid rgba(0,0,0,.15);*/
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        background-color: #fff;
        -webkit-box-shadow: 0 6px 12px #ffffff;
        box-shadow: 0 6px 12px white;
      }

      .top-nav>.open>.dropdown-menu>li>a {
        white-space: normal;
      }

      /* Side Navigation of admin*/

      @media(min-width:768px) {
        .side-nav {
          position: fixed;
          top: 60px;
          left: 225px;
          width: 225px;
          margin-left: -225px;
          border: none;
          border-radius: 0;
          border-top: 1px solid;
          overflow-y: auto;
          background-color: #07103eee;
          /*background-color: #5A6B7D;*/
          bottom: 0;
          overflow-x: hidden;
          padding-bottom: 40px;
        }

        .side-nav>li>a {
          width: 225px;
          border-bottom: 1px #07103eee solid;
        }

        .side-nav li a:hover,
        .side-nav li a:focus {
          outline: none;
          background-color: #07103eee !important;
          color: #ffffff;
        }
      }

      .side-nav>li>ul {
        padding: 0;
        border-bottom: 1px rgba(121, 18, 18, 0.3) solid;
      }

      .side-nav>li>ul>li>a {
        display: block;
        padding: 10px 15px 10px 38px;
        text-decoration: none;
        /*color: #999;*/
        color: #ffffff;
      }

      .side-nav>li>ul>li>a:hover {
        color: #ffffff;
      }

      .navbar .nav>li>a>.label {
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        position: absolute;
        top: 14px;
        right: 6px;
        font-size: 10px;
        font-weight: normal;
        min-width: 15px;
        min-height: 15px;
        line-height: 1.0em;
        text-align: center;
        padding: 2px;
      }

      .navbar .nav>li>a:hover>.label {
        top: 10px;

      }

      .navbar-default .navbar-nav>li>a:hover {
        color: white;
      }

      .navbar-logo {
        color: white;
        font-size: x-large;
      }

      .navbar {
        background-color: #07103eee;
        color: white;
        font-size: 16px;
      }


      .vis {
        text-align: center;
        height: 400px;
      }

      .vis1 {
        text-align: center;
        height: 400px;
      }

      .navbar-default .navbar-nav>li>a {
        color: currentColor;
      }

      .navbar-default .navbar-nav>.active>a,
      .navbar-default .navbar-nav>.active>a:focus,
      .navbar-default .navbar-nav>.active>a:hover {
        color: #ffffff;
        background-color: darkgray;
      }

      @media (min-width: 768px) {
        .navbar-nav>li>a {
          padding-top: 25px;
          padding-bottom: 15px;
        }
      }

      .main {
        padding-top: 25px;
        padding-right: 30px;
        padding-left: 10px;
      }
    </style>

  </head>

  <body>


    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">
      <!-- Navigation -->
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a style="padding-top: 20px;font-size:25px; color:white" class="navbar-logo" href="admin.php"></a>
          <img src="logo.png" width="40">&nbsp;</a>Everything On Rent

        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-nav navbar-right">

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
              aria-expanded="false">
              <span class="glyphicon glyphicon-th"></span> Info <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="Profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>

              <li role="separator" class="divider"></li>

              <li><a href="Adminlogin.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
          </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li class="active">
              <a href="admin.php" class="active"><i class="glyphicon glyphicon-dashboard"></i>&nbsp;Dashboard</a>
            </li>

            <li><a href="request.php"><i class="glyphicon glyphicon-heart-empty"></i>&nbsp; Requests</a></li>
            <li><a href="Category.php"><i class="glyphicon glyphicon-th-list"></i>&nbsp; Add Category</a></li>
            <li> <a href="Item.php"><i class="glyphicon glyphicon-shopping-cart"></i>&nbsp;Items</a></li>
            <li> <a href="Provider.php"><i class="glyphicon glyphicon-user"></i>&nbsp;Providers</a></li>
            <li><a href="User.php"><i class="glyphicon glyphicon-user"></i>&nbsp;Users(Renter)</a></li>
            <li> <a href="Rented.php"><i class="glyphicon glyphicon-transfer"></i>&nbsp;rented Items</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </nav>

      <section class="main">

        <section class="tab-content">

          <section class="tab-pane active fade in content" id="dashboard">

            <div class="row">
              <div class="text-center">
                <div class="col-xs-6 col-sm-3">
                  <div class="panel panel-primary">
                    <a href="request.php" style="text-decoration:none;">
                      <div class="panel-body" style="background-color: #ffb0bfc4; ">


                        <h3>Requests: </h3>
                        <?php
                        $sql = "SELECT COUNT(*) as num_rows FROM requests";
                        $result = mysqli_query($mysqli, $sql);

                        // Check for errors
                        if (!$result) {
                          die("Error: " . mysqli_error($mysqli));
                        }

                        // Get the number of rows
                        $row = mysqli_fetch_assoc($result);
                        $num_rows = $row['num_rows'];

                        ?>
                        <p class="text-muted">Total Requests:
                          <?php echo $num_rows; ?>
                        <p>Find out Here</p>
                        </p>
                        <br><br><br><br>
                      </div>
                    </a>
                  </div>
                </div>


                <div class="col-xs-6 col-sm-3">
                  <div class="panel panel-success">
                  <a href="Provider.php" style="text-decoration:none;">
                    <div class="panel-body" style="background-color: #c5c6d2c4;">
                      <h3> Providers:</h3>
                      <?php
                      $sql = "SELECT COUNT(*) as num_rows FROM users WHERE user_type = 'provider'";
                      $result = mysqli_query($mysqli, $sql);

                      // Check for errors
                      if (!$result) {
                        die("Error: " . mysqli_error($mysqli));
                      }

                      // Get the number of rows
                      $row = mysqli_fetch_assoc($result);
                      $num_rows = $row['num_rows'];

                      ?>
                      <p class="text-muted">Total Providers:
                        <?php echo $num_rows; ?>
                      <p>Find out Here </p>
                      </p>

                      <br><br><br><br>
                    </div>
                    </a>
                  </div>
                </div>

                <div class="col-xs-6 col-sm-3">
                  <div class="panel panel-danger">
                  <a href="User.php" style="text-decoration:none;">
                    <div class="panel-body" style="background-color: #beffb0c4;">
                      <h3> Renters:</h3>
                      <?php
                      $sql = "SELECT COUNT(*) as num_rows FROM users WHERE user_type = 'renter' ";

                      $result = mysqli_query($mysqli, $sql);

                      // Check for errors
                      if (!$result) {
                        die("Error: " . mysqli_error($mysqli));
                      }

                      // Get the number of rows
                      $row = mysqli_fetch_assoc($result);
                      $num_rows = $row['num_rows'];

                      ?>
                      <p class="text-muted">Total Renters:
                        <?php echo $num_rows; ?>
                      <p>Find out Here</p>
                      </p>
                      <br><br><br><br>
                    </div>
                    </a>
                  </div>
                </div>

                <div class="col-xs-6 col-sm-3">
                  <div class="panel panel-warning">
                  <a href="Category.php" style="text-decoration:none;">
                    <div class="panel-body" style="background-color: #f8f68fc4;">
                      <h3> Categories:</h3>
                      <?php
                      $sql = "SELECT COUNT(*) as num_rows FROM admin_category_add";
                      $result = mysqli_query($mysqli, $sql);

                      // Check for errors
                      if (!$result) {
                        die("Error: " . mysqli_error($mysqli));
                      }

                      // Get the number of rows
                      $row = mysqli_fetch_assoc($result);
                      $num_rows = $row['num_rows'];

                      ?>
                      <p class="text-muted">Total Categories:
                        <?php echo $num_rows; ?>
                      <p>Find out Here</p>
                      </p>
                      <br><br><br><br>
                    </div>
                    </a>
                  </div>
                </div>
              </div>

              <div class="col-xs-12 col-sm-9">
                <div class="panel panel-primary">
                
                  <div class="panel-heading">
                    Overview section:
                  </div>
                  <div class="panel-body">
                    <div class="text-center">

                      <div class="col-md-6">
                        <h3>Total Rented/Booked Items</h3>
                        <?php
                        $sql = "SELECT COUNT(*) as num_rows FROM requests WHERE status = 1";
                        $result = mysqli_query($mysqli, $sql);

                        // Check for errors
                        if (!$result) {
                          die("Error: " . mysqli_error($mysqli));
                        }

                        // Get the number of rows
                        $row = mysqli_fetch_assoc($result);
                        $num_rows = $row['num_rows'];

                        ?>
                        <p class="text-muted">Total number of items booked or Rented:
                          <?php echo $num_rows; ?>
                        <p> <a href="Rented.php" target="_blank">Check Booked List Here </a></p>
                        </p>
                      </div>

                      <div class="col-md-6">
                        <h3>Total Products/Items</h3>
                        <?php
                        $sql = "SELECT COUNT(*) as num_rows FROM items";
                        $result = mysqli_query($mysqli, $sql);

                        // Check for errors
                        if (!$result) {
                          die("Error: " . mysqli_error($mysqli));
                        }

                        // Get the number of rows
                        $row = mysqli_fetch_assoc($result);
                        $num_rows = $row['num_rows'];

                        ?>
                        <p class="text-muted">Total number of items available for rent:
                          <?php echo $num_rows; ?>
                        <p> <a href="Item.php" target="_blank">Check Items List Here</a></p>
                        </p>
                      </div>

                    </div>
                    <br><br><br><br><br><br><br><br><br><br>
                  </div>
                </div>
              </div>

              <div class="col-xs-12 col-sm-3">
                <div class="panel panel-primary" style="height:273px;">
                  <div class="panel-heading">
                    Everything On Rent:
                  </div>
                  <div class="panel-body">
                    <strong>Note:</strong>
                    <p>Make sure to clear all pending requests from Providers and add Categories as per Provider and
                      Renter Conveniences!</p>
                  </div>
                </div>


              </div>

            </div>

          </section>

        </section>




      </section>

    </div>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</php>