<?php

session_start();


include_once 'header.php';

include_once '../models/user_details.php'; 

include_once '../models/faculty_details.php';



if(isset($_SESSION['status']))
{
    include 'sidebar.php';
}

?>
<section class="content-header">
<h1 style="text-align:center"><i class="fa fa-user"></i> Profile for <?php echo $_SESSION['username']; ?></h1>
</section>
<section class="content">
<div class="row">
    <div class="col-md-4 col-md-offset-3">

    <?php 
        if(isset($_GET['session']))
        {
         if($_GET['session']==1)
            {
               echo ' <div class="alert alert-info alert-dismissable">
                                        <i class="fa fa-info"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b> Please fill up this form to get started.
                                    </div>';
            }  
        }
             ?>
    <?php
    if($_SESSION['usertype']=="Student")
        {
            $userinfo= New user_details();

            $found= $userinfo->getStudDetails($_SESSION['id']);

                        if($found!=0 && !isset($_GET['edit'] ))
                        {
                            $row= mysql_fetch_array($found) ;

                            echo ' 
                            <div>
                            <fieldset disabled>

                            <div class="form-group">

                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="'.$row["name"].'">
                                        </div>

                                         <div class="form-group">
                                            <label>Roll number</label>
                                            <input type="text" name="roll" class="form-control" placeholder="'.$row["roll"].'" >
                                        </div>
                                        <div class="form-group">
                                            <label>Batch</label>
                                            <input type="text" name="batch" class="form-control" placeholder="'.$row["batch"].'" >
                                        </div>
                                         <div class="form-group">
                                            <label>Department</label>
                                            <input type="text" name="dept"  class="form-control" placeholder="'.$row["department"].'">
                                        </div>
                                        <div class="form-group">
                                            <label>Program</label>
                                            <input type="text" name="prog" class="form-control" placeholder="'.$row["program"].'" >
                                        </div>

                                 </fieldset disabled>

                                <a href="profile.php?edit=1"><button class="btn btn-info btn-block"> Edit</button></a>
                                 </div>

                            ';
                        }

                    else {

                            if($found!=0)
                                echo '                            
                            <form role="form" action="../controller/student.php?update=1" method="post">';

                            else
                                echo '<form role="form" action="../controller/student.php" method="post">'; ?>
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Name">
                                        </div>

                                         <div class="form-group">
                                            <label>Roll number</label>
                                            <input type="text" name="roll" class="form-control" placeholder="Roll number" >
                                        </div>
                                        <div class="form-group">
                                            <label>Batch</label>
                                            <input type="text" name="batch" class="form-control" placeholder="Joining year" >
                                        </div>
                                         <div class="form-group">
                                            <label>Department</label>
                                            <input type="text" name="dept"  class="form-control" placeholder="Department">
                                        </div>
                                        <div class="form-group">
                                            <label>Program</label>
                                            <input type="text" name="prog" class="form-control" placeholder="Program" >
                                        </div>

                                    <button type="submit" class="btn bg-olive btn-block">Submit</button>


                            </form>

                            
                            <br/>
    <div class="callout callout-info">
                                        <h4>Please fill up all the details before submitting</h4>
                                        
                                    </div>

<?php } }

else
{ 

                 $userinfo= New faculty_details();

            $found= $userinfo->getFacDetails($_SESSION['id']);

                        if($found!=0 && !isset($_GET['edit']))
                        {
                            $row= mysql_fetch_array($found) ;

                           echo'<fieldset disabled>
                           <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="'.$row["name"].'">
                                        </div>

                                         <div class="form-group">
                                            <label>Designation</label>
                                            <input type="text" name="desgn" class="form-control" placeholder="'.$row["designation"].'" >
                                        </div>
                                         <div class="form-group">
                                            <label>Department</label>
                                            <input type="text" name="dept" class="form-control" placeholder="'.$row["department"].'">
                                        </div>
                                        <div class="form-group">
                                            <label>Joined</label>
                                            <input type="text" name="joined" class="form-control" placeholder="'.$row["joined"].'" >
                                        </div>
                                                                     </fieldset disabled>

                                 <a href="profile.php?edit=1"><button class="btn btn-info btn-block"> Edit</button></a>
                                 '
                                 ;


                       }

            else {

    

                            if($found!=0)
                                echo '                            
                            <form role="form" action="../controller/faculty.php?" method="post">';

                            else
                                echo '<form role="form" action="../controller/faculty.php" method="post">'; ?>
                                                                    <!-- text input -->
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Name">
                                        </div>

                                         <div class="form-group">
                                            <label>Designation</label>
                                            <input type="text" name="desgn" class="form-control" placeholder="Designation" >
                                        </div>
                                         <div class="form-group">
                                            <label>Department</label>
                                            <input type="text" name="dept" class="form-control" placeholder="Department">
                                        </div>
                                        <div class="form-group">
                                            <label>Joined</label>
                                            <input type="text" name="joined" class="form-control" placeholder="Joining year" >
                                        </div>
                                    <button type="submit" class="btn bg-olive btn-block">Submit</button>



                            </form>
                            <br/>
                            <a href="profile.php" <button  class="btn bg-aqua btn-block">Undo Edit</button></a>
                            <br/>
    <div class="callout callout-info">
                                        <h4>Please fill up all the details before submitting</h4>
                                        
                                    </div>
    

        <?php } 

    } ?>

    


    </div>
    <div class="col-md-4">
        <img src="img/avatar.png" alt="user image" class="online" style="width: 150px;height: 150px;border: 2px solid transparent;-webkit-border-radius: 50% !important;-moz-border-radius: 50% !important;border-radius: 50% !important;">


    </div>

</div>
<?php
include 'footer.php';
?>