<?php
include 'dbconn.php';
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

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

      #tabedit {
        overflow-y: scroll;
        height: 80%;
        margin-top: 15px;
        overflow-x: scroll;
      }


      .tbhead {
        width: 80px;
        font-size: 18px;

      }

      #main {
        padding-top: 50px;
        padding-right: 20px;

      }

      .btnedit {
        color: white;
        background-color: #07103eee;
        margin-left: 410px;
      }
    </style>

  </head>
  <?php
  if (isset($_POST['approve_user'])) {
    $user_id = $_POST['approved_id'];

    $permission = '1';
    $sql = "UPDATE users SET user_verif = $permission WHERE user_id = $user_id and user_type='provider'";
    $result = mysqli_query($mysqli, $sql);
    if ($result) {
      echo "<script>
    swal({
      title: 'Success!',
      text: 'Request Accepted as Provider!',
      icon: 'success',
      button: 'OK'
    }).then(function() {
      window.location.href='request.php';
    });
</script>";
    } else {
      echo "<script>
    swal({
      title: 'Error!',
      text: 'Not accepted!',
      icon: 'error',
      button: 'OK'
    });
</script>";
    }
  }

  if (isset($_POST['reject_user'])) {
  }
  ?>

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
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
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
            <li>
              <a href="admin.php"><i class="glyphicon glyphicon-dashboard"></i>&nbsp;Dashboard</a>
            </li>

            <li class="active">
              <a href="request.php"><i class="glyphicon glyphicon-heart"></i>&nbsp; Requests</a>
            </li>
            <li>
              <a href="request2.php"><i class="glyphicon glyphicon-heart"></i>&nbsp; Requests2</a>
            </li>
            <li>
              <a href="Category.php"><i class="glyphicon glyphicon-th-list"></i>&nbsp; Add Category</a>
            </li>
            <li> <a href="Item.php"><i class="glyphicon glyphicon-shopping-cart"></i>&nbsp;Items</a></li>
            <li> <a href="Provider.php"><i class="glyphicon glyphicon-user"></i>&nbsp;Providers</a></li>
            <li><a href="User.php"><i class="glyphicon glyphicon-user"></i>&nbsp;Users(Renter)</a></li>
            <li> <a href="Rented.php"><i class="glyphicon glyphicon-transfer"></i>&nbsp;rented Items</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </nav>

      <div class="page-wrapper">
        <div class="container-fluid">
          <div class="row" id="main">
            <div class="col-md-6 col-sm-6 col-xs-6 coledit">
              <h4>Provider Requests</h4>
            </div>
          </div>
          <div id="tabedit" class="table-responsive">
            <table class="table table-bordered table-striped">
              <!-- Add the 'table-bordered' and 'table-striped' classes for styling -->
              <thead style="position:sticky;top: 0;background-color:#283866; color:white;">
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone No</th>
                  <th>Address</th>
                  <th>Verification Type</th>
                  <th>Verification Document</th>
                  <th>Username</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $sql = "SELECT * FROM users WHERE user_verif = '0' AND user_type = 'provider'";
                $result = mysqli_query($mysqli, $sql);

                $serial = 0;
                while ($row = $result->fetch_assoc()) {
                  $serial++;
                ?>
                  <tr>
                    <td><?php echo $serial ?></td>

                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone_number']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['doctype']; ?></td>
                    <td>
                      <a href="uploads/<?php echo $row['document']; ?>" target="_blank">View Document</a>
                    </td>
                    <td><?php echo $row['username']; ?></td>
                    <form method="post" enctype="multipart/form-data">
                      <td>
                        <!-- Modal for approval -->
                        <div class="modal fade" id="approveModal<?php echo $row['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel<?php echo $row['user_id'] ?>" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="approveModalLabel<?php echo $row['user_id'] ?>">Confirm Approval</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <input type="hidden" name="approved_id" value="<?php echo $row['user_id'] ?>">
                                Are you sure you want to approve this provider?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button name="approve_user" class="btn btn-primary">Approve</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal for rejection -->
                        <div class="modal fade" id="rejectModal<?php echo $row['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel<?php echo $row['user_id'] ?>" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="rejectModalLabel<?php echo $row['user_id'] ?>">Confirm Rejection</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <input type="hidden" name="rejected_id" value="<?php echo $row['user_id'] ?>">
                                Are you sure you want to reject this provider?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" name="reject_user" class="btn btn-danger">Reject</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        <a href="#" class="text-info" data-toggle="modal" data-target="#approveModal<?php echo $row['user_id'] ?>"><i class="glyphicon glyphicon-ok">Approve</i></a>&nbsp;<br>
                        <a href="#" class="text-info" data-toggle="modal" data-target="#rejectModal<?php echo $row['user_id'] ?>"><i class="glyphicon glyphicon-remove">Reject</i></a>&nbsp;<br>
                        <a href="view.php?id=<?php echo $row['user_id'] ?>" class="text-info"><i class="glyphicon glyphicon-eye-open">View</i></a>
                      </td>
                    </form>
                  </tr>
                <?php } ?>
              </tbody>


            </table>







          </div>
        </div>
      </div>

    </div>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>