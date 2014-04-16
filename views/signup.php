<?php 

session_start();

if(isset($_SESSION['status']))
{
  header("Location: index.php");
}
?>


<?php
include 'header.php';
?>

<div class="content" style="background:#5bc3be; text-align:center">

<?php
        if(isset($_GET['error']))
        {
               
          echo '<div class="alert alert-warning">Entered details did not match with exisiting users</div>';
              
        }
            
?>


<div class="blank">
<div class="clear"></div>
                            <h4 style="font-size:20px">                            
                            <b>Sign Up</b>
                            </h4>
</div>
<div class="clear"></div>


 <form method="post" role="form" action="../controller/signup.php">
             <!-- 
                  <div class="form-group">
                    <label class="sr-only" for="signup-first-name">First Name</label>
                    <input type="text" class="form-control" id="signup-first-name" placeholder="First name">
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="signup-last-name">Last Name</label>
                    <input type="text" class="form-control" id="signup-last-name" placeholder="Last name">
                  </div> -->
                  <div class="form-group">
                    <label class="sr-only"  for="signup-username">Userame</label>
                    <input type="text" name="username" class="form-control" id="signup-username" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label class="sr-only"  for="signup-email">Email address</label>
                    <input type="email" name="email" class="form-control" id="signup-email" placeholder="Email address">
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="signup-password">Password</label>
                    <input type="password" name="password" class="form-control" id="signup-password" placeholder="Password">
                  </div>
                  <div class="checkbox">
                   
                  </div>


                        <div class="form-group" style="margin-left:12px;">
                              <select class="form-control" name="usertype">
                                        <option name="fac">Faculty</option>
                                        <option name="stud">Student</option>
                                        <option name="hod">HOD</option>

                               </select>
                          </div>



                  <button class="btnu btn-primary" type="submit">Sign up</button>
                </form>

                <div class="clear"></div>

<div class="clear"></div>


    </div>

    <script type="text/javascript" >
  $('.submit').click(function() {
    var inputVal = $("#username").val();
        var passVal = $("#password").val();

    // $(document).trigger("clear-alert-id.example");
    if (inputVal.length < 2 || passVal.length < 2) {
        $('.errormsg').html("Enter your username & password");
                             
    }

    
  });
</script>

<?php

include 'footer.php';

?>