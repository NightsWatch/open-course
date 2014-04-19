<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Open Class</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
                
        <link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <link href="css/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>

     <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Open Class
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-left">

                <form action="../controller/search.php" method="post">
                     <div class="input-group margin " style="margin-left:70px;width:350px;">
                            <div class="input-group-btn">

                                <select class="form-control" name="category" style="width:100px">
                                  <option name="fac">Faculty</option>
                                  <option  name="stud">Students</option>
                                  <option name="hod">HOD</option>
                                  <option> Assignments</option>
                                  <option >Lectures</option>
                                  <option>Users</option>>
                               </select>

                                    </div>
                         <input type="text" class="form-control" name="query" style="border-radius:5px" placeholder="Search...">
                       <span class="input-group-btn">
                                <button type="submit" name="seach" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                        </span>
                        </div> 

                </form>
                </div>
      
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <?php
                            if(isset($_SESSION['status']))
                                {

                                    include_once '../models/messages.php';
                                    $msg = New messages();
                                    echo '
                        <li class="dropdown messages-menu">
                            <a href="inbox.php" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success">'.$msg->getUnreadCount($msg->getUserid($_SESSION['username'])).'</span>
                            </a>
                        </li>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <span class="label label-warning"></span>
                            </a>

                            
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-people info"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning danger"></i> Very long description here that may not fit into the page and may cause design problems
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users warning"></i> 5 new members joined
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-cart success"></i> 25 sales made
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-person danger"></i> You changed your username
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="notifications.php">View all</a></li>
                            </ul> 
                        </li>
                        
                        <!--  User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>

                                <span>'.$_SESSION["username"].'<i class="caret"></i></span></a>
                                                 <ul class="dropdown-menu">
                                
                                <li class="user-header bg-light-blue">
                                    <img src="img/avatar04.png" class="img-circle" alt="User Image" />
                                   <p>'.$_SESSION["username"].'<br/>
                                   '.$_SESSION["id"].'</p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../controller/logout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>';
                                            }
                                    else
                                    {
                                         echo '<ul style="margin-top:7px" class="list-inline">
                                           <li><a href="login.php"><button class="btn btn-info"> Sign In</button></a></li>
                                           <li><a href="signup.php"><button class="btn btn-warning">Sign Up</button></a></li>
                                         </ul>';
                                    }
                            ?>
                            </ul>
                        </li>
                    </ul>
                </div>
    </nav>
</header>