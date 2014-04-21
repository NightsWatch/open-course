<?php

session_start();


include 'header.php';
include_once '../models/assignments.php';
if(isset($_SESSION['status']))
{
    include 'sidebar.php';
}



?>


<section class="content-header">
    <h1 style="text-align:center"><i class="fa fa-edit"></i> Assignment Grading Page</h1>
</section>
<br/>
<?php 
if(!isset($_GET['courseid']))
{ 
	$subid = $_GET['sid'];


$assgn = New assignments();
$assignid = $assgn->getAssignmentId($subid);
$filepath = $assgn->getAssignmentLink($subid);

	?>
 <section class="content">
	<div class="row">
	<?php if(isset($_GET['done']))
			{
				if($_GET['done']==0)
				{
					echo '
					<div class="alert alert-danger ">
                                        <i class="fa fa-ban"></i>
                                        
                                        <b>Failed!</b>Please check if entered marks are within maximum or for other errors.
                                    </div>
                                   ';
				}
			}
			?>
	<div class="col-md-4 col-md-offset-2">
	        <?php
	        include_once '../controller/add_assign_description.php';
	        ?>
	</div>
	<div class="col-md-4">    
	    <form <?php 
	    echo 'action="../controller/add_marks.php?sid='.$subid.'" method="POST" role="form">';
	    ?>
	        <!-- text input -->
	        <div class="box box-warning">
	       		<div class="box-header">
	            	<h3 class="box-title">Assignment grading</h3>                                   
	            </div><!-- /.box-header -->
	        	<div class="box-body table-responsive">
	            	<div><?php
	            			echo '<a href="'.$filepath.'">';
	            			?>
	            		<button class="btn btn-block bg-olive">Download student's assignment submission</button></a>
	            	</div>
	            	<hr>
	           		<div class="form-group">
	                    <label> Marks</label>
	                   	<input type="number" class="form-control" name="marks" id="marks" placeholder="Marks received" required>
	                </div>
	                <div class="box-footer">
	                   	<button type="submit" class="btn bg-olive btn-block submit" name="add_marks" value="Add Marks">Submit</button>
	                </div>                             
					</div><!-- /.box-body -->
	    		</div><!-- /.box -->
	    	</form>
	    </div>
	</div>
<?php }

else
{

$courseid= $_GET['courseid'];
$userid= $_GET['uid'];
 ?>


 <section class="content">
	<div class="row">
	<div class="col-md-4 col-md-offset-2">
	        <?php
	        include_once '../controller/add_course_description.php';
	        ?>
	</div>
	<div class="col-md-4">    
	    <form <?php 
	    echo 'action="../controller/add_marks.php?courseid='.$courseid.'&userid='.$userid.'" method="POST" role="form">';
	    ?>
	        <!-- text input -->
	        <div class="box box-warning">
	       		<div class="box-header">
	            	<h3 class="box-title">Course grading</h3>                                   
	            </div><!-- /.box-header -->
	        	<div class="box-body table-responsive">
	            	
	            	<hr>
	           		<div class="form-group">
	                    <label> Grade</label>
	                   	<input type="text" class="form-control" name="marks" id="marks" placeholder="Grade received" required>
	                </div>
	                <div class="box-footer">
	                   	<button type="submit" class="btn bg-olive btn-large submit" name="add_marks" value="Add Marks">Submit</button>
	                </div>                             
					</div><!-- /.box-body -->
	    		</div><!-- /.box -->
	    	</form>
	    </div>
	</div>


<?php 
}


include 'footer.php';

?>

