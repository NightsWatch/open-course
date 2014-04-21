  <?php 

  session_start();

  if(isset($_SESSION['status']))
  {
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
        <div class="form-box" id="login-box" style="margin-top:50px;">
            <div class="header">Register New Membership</div>
            <form action="../controller/signup.php" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="username" id="signup-usernamename"class="form-control" placeholder="Username" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" id="signup-email" name="email" class="form-control" placeholder="Email address" required/>
                    </div>
                    <div class="form-group">
                        <input type="password" id="signup-password" name="password" class="form-control" placeholder="Password" required/>
                    </div>
                    <div class="form-group" >
                      <label class="sr-only" for="signup-role">Role</label>
                      <select class="form-control" name="usertype">
                          <option  name="stud">Student</option>
                          <option name="fac">Faculty</option>
                          <option name="hod">HOD</option>
                       </select>
                    </div>

                </div>
                <div class="footer">                    

                    <button type="submit" class="btn bg-olive btn-block">Sign me up</button>

                    <a href="login.php" class="text-center">I already have a membership</a>
                </div>
                <?php
            if(isset($_GET['error']))
            {               
              echo '<div class="alert alert-warning">uaername or email-id already exists</div>';     
            }
          ?>
            </form>



        <!-- jQuery 2.0.2 -->
        <script src="js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <div style="height:30px"></div>

    </body>
</html>
