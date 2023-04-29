<?php
include('Category_data.php');
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

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>

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

            .navbar-default .navbar-nav>.open>a,
            .navbar-default .navbar-nav>.open>a:focus,
            .navbar-default .navbar-nav>.open>a:hover {
                color: white;
                background-color: #e7e7e7;
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
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target=".navbar-ex1-collapse">
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

                            <li><a href="Adminlogin.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="admin.php" class="active"><i
                                    class="glyphicon glyphicon-dashboard"></i>&nbsp;Dashboard</a>
                        </li>
                        <li>
                            <a href="request.php"><i class="glyphicon glyphicon-heart"></i>&nbsp; Requests</a>
                        </li>
                        <li>
                            <a href="Category.php"><i class="glyphicon glyphicon-th-list"></i>&nbsp; Add Category</a>
                        </li>
                        <li>

                        <li> <a href="Item.php"><i class="glyphicon glyphicon-shopping-cart"></i>&nbsp;Items</a></li>
                        <li class="active"> <a href="Provider.php"><i
                                    class="glyphicon glyphicon-user"></i>&nbsp;Providers</a></li>
                        <li><a href="User.php"><i class="glyphicon glyphicon-user"></i>&nbsp;Users(Renter)</a></li>
                        <li> <a href="Rented.php"><i class="glyphicon glyphicon-transfer"></i>&nbsp;rented Items</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>


            <div class="Profile">
                <div class="container" style="width:1100px; padding-top:30px;">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="background-color: #07103e; color:white;">
                                    <h2 class=" panel-title">Add Provider</h2>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-6">
                                        <form action="Category_data.php" method="POST"  enctype="multipart/form-data">

                                            <div class="form-group">
                                                <input type="hidden" id="usrttype" name="user_type" value="provider"
                                                    required>
                                                
                                                
                                            </div>
                                      
                                            <div class="form-group">
                                                <label for="reg-name">Name</label>
                                                <input type="text" class="form-control" id="reg-name" name="name"
                                                    placeholder="Enter name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="reg-email">Email</label>
                                                <input type="email" class="form-control" id="reg-email" name="email"
                                                    placeholder="Enter email">
                                            </div>
                                            <div class="form-group">
                                                <label for="reg-phone">Phone Number</label>
                                                <input type="tel" class="form-control" id="reg-phone"
                                                    name="phone_number" placeholder="Enter phone number">
                                            </div>

                                            <div class="form-group">
                                            <label for="reg-address">Address</label>
                                            <textarea class="form-control" id="reg-address" name="address"
                                                rows="3"></textarea>
                                        </div>

                                    </div>
                                    <div class="col-md-6">


                                        <div class="form-group">
                                            <label for="reg-verification-type">Verification Type</label>
                                            <select class="form-control" id="reg-verification-type" name="doctype">
                                                <option name="doctype" value="">Select Verification Type</option>
                                                <option name="doctype" value="passport">Passport</option>
                                                <option name="doctype" value="driver-license">Driver's License</option>
                                                <option name="doctype" value="Aadhar-card">Aadhar Card</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="reg-verification-proof">Verification Proof</label>
                                            <input type="file" class="form-control-file" name="document" id="document">
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="username" class="form-control" name="username" id="username">
                                        </div>
                                        <div class="form-group">
                                            <label for="reg-password">Password</label>
                                            <input type="password" class="form-control" id="reg-password" name="pswd"
                                                placeholder="Enter password">
                                        </div>
                                        <div class="form-group">
                                            <label for="reg-password">Confirm Password</label>
                                            <input type="password" class="form-control" id="reg-password" name="cpwd"
                                                placeholder="Enter password">
                                        </div>
                                        <input type="submit" name="register_provider" class="btn btn-default broom"
                                            value="Save">


                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</php>