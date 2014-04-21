<?php 

session_start();

if(isset($_SESSION['status']))
{

if(isset($_GET['session']))
  header("Location: profile.php?session=1");
else
    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Open Class | Registration Page</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <style>
        .login-form {
            background-color: #edeff1;
            position: relative;
            border-radius: 6px;
            }
        </style>
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body style="background-color: #1abc9c;">
      <h1 style="text-align:center">Open Class</h1>
    <h2 style="text-align:center">Course Management System</h2>
        <div class="form-box login-form" style="margin-top:50px;" >
            <div class="header" >Sign In</div>


            <form action="../controller/login.php" method="POST" role="form">
                <div class="body bg-gray">
                    <div class="form-group">
                         <span class="add-on"><i class="icon-user"></i></span>
                        <input type="text" id="username" name="username" class="form-control input-text" placeholder="User ID" required/>
                        <span id="usererror"></span>
                    </div>
                    <div class="form-group">
                        <span class="add-on"><i class="icon-lock"></i></span>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required/>
                        <span id="passerror"></span>
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"> Remember me</input>
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block submit" name="login" value="Sign In">Sign me in</button>  
                    <div class="errormsg"></div>
                    <!--<p><a href="#">I forgot my password</a></p>-->
                    <a href="signup.php" class="text-center">Register a new membership</a>
                </div>
            </form>


            <div class="margin text-center">
                <?php
                      if(isset($_GET['error']))
                      {   
                        echo '<div class="alert alert-warning">Entered details did not match with exisiting users</div>';     
                      }
              ?>
            </div>
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>        
                        <div style="height:50px;"><div>

    </body>
</html>


