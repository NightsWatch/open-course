<?php

session_start();

if(!isset($_SESSION['usertype'])  )
{
    header('Location: ../views/505.php');
}

include 'header.php';

if(isset($_SESSION['status']))
{
    include 'sidebar.php';
}

$assignid = $_GET['aid'];

?>

<section class="content-header">
<h1 style="text-align:center"><i class="fa fa-cloud-upload"></i> Assignment Submission Page</h1>
</section>
<br/>
 <section class="content">
 	<div class="row">
 		<div class="col-md-6">
        <?php 
        include_once '../controller/add_assign_description.php';
        ?>
 			
 		</div>
 		<div class="col-md-6">

 			<div class="box box-success" style="position: relative;">
       <?php
                      if(isset($_GET['success']))
                      {
                        $success= $_GET['success']; 
                        if($success==0)  
                        echo '<div class="alert alert-warning">Assignment Submission failed. Try again.</div>';
                      else if($success==2)  
                        echo '<div class="alert alert-warning">Assignment submission failed due to unsupported file format.</div>';      
                        else if($success==1)  
                        echo '<div class="alert alert-warning">Your assignment was submitted scuccessfully.</div>';      
                      }
              ?>
            <div class="box-header" style="cursor: move;">
                <h3 class="box-title" style="text-align:center"><a href="thread.php">Submission</a></h3>
            </div>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
            <div class="box-body" style="overflow: hidden; width: auto;">

              <?php
              echo '
              <form role="form" action="../controller/assn_submit.php?assnid='.$assignid.'" method="post" 
              enctype="multipart/form-data">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="file">File input</label>
                                            <input type="file" name="file" id="file">
                                            <p class="help-block">Upload one archive of all the files required for assignmnet solution.</p>
                                        </div>
                                        
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                    </div>
                                </form>'; ?>
            </div>
        </div>
        </div>
 		</div>

 	</div>



<?php
include 'footer.php';
?>
