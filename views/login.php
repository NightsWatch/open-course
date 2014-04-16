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
<div class="clear"></div>

<?php
        if(isset($_GET['error']))
        {
               
          echo '<div class="alert alert-warning">Entered details did not match with exisiting users</div>';
              
        }
            
?>
<div class="blank">
<div class="clear"></div>
                            <h4 style="font-size:20px">                            
                            <b>Login</b>
                            </h4>
</div>
<div class="clear"></div>

<form role="form" name="login-form" action="../controller/login.php" method="POST" >
                                    <div class="form-group">
                                            <label for="username" style="color:white">Username:</label>
                                         
                                     <div class="controls">
                                             <span class="add-on"><i class="icon-user"></i></span>

                                            <input type="text" class="input-text" name="username" id="username" tabindex="1">
                                            <span id="usererror"></span>
                                        </div>
                                    </div>
                        <div class="form-group">
                                    <label for="password" style="color:white">Password:</label>
                               <div class="controls">
                              
                                    <span class="add-on"><i class="icon-lock"></i></span>

                                    <input class="input-text" type="password" name="password" id="password" tabindex="2">
                                            <span id="passerror"></span>
                               </div>
                        </div>
                                            <div class="clear"></div>

                         
                          <div class="clear"></div>
                              <div class="form-group" >
                                    <div class="errormsg"></div>

                                   <input type="submit" class="btnu btn-primary submit" name="login" value="Sign In">
                                                               <div class="clear"></div>

                                   <div style="font-size:15px;">Forgot password click <a href="#" style="color:red">here</a></div>
                                   <div class="clear"></div>
                                   <div class="clear"></div>

                                    <div style="font-size:15px;">New User, then <a class="btnu btnu-danger" href="index.html#signup-modal">Sign Up</a></div>
                             </div>
                    </form>

                    <div class="clear"></div>
                                        <div class="clear"></div>

  </div>
        

<script type="text/javascript" src="assets/js/jquery-1.8.2.min.js"></script>
   
<script type="text/javascript" >

  $('.submit').click(function() {
    var inputVal = $("#username").val();
        var passVal = $("#password").val();

    // $(document).trigger("clear-alert-id.example");
    if (inputVal.length < 2 || passVal.length < 2) {
      $('.errormsg').html("Please Enter your username & password");
                             
    }

    
  });

</script>

<?php

include 'footer.php';

?>