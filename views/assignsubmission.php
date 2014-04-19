<?php

session_start();


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
            <div class="box-header" style="cursor: move;">
                <h3 class="box-title" style="text-align:center"><a href="thread.php">Submission</a></h3>
            </div>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
            <div class="box-body" style="overflow: hidden; width: auto;">
              <h4>Deadline: </h4>
              <h4>No submissions will be entertained after the deadline.</h4>
              <form role="form" action="../controller/assn_submit.php" method='post' enctype="multipart/form-data">
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
                                </form>
            </div>
        </div>
        </div>
 		</div>

 	</div>



<?php
include 'footer.php';
?>
