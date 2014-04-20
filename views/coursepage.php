<?php

session_start();
include 'header.php';
include_once '../models/user_details.php';


if(isset($_SESSION['status']))
  {
      include 'sidebar.php';
  }

$courseid=$_GET['cid'];

?>

<section class="content-header">
<h1 style="text-align:center"><i class="fa fa-edit"></i> Course Page</h1>
</section>
<br/>
 <section class="content">
 <div class="row">
 	<div class="col-md-4 col-md-offset-2">
 		   <?php 
            include_once '../controller/add_course_description.php';
            ?>

 		
 	</div>

 	<div class="col-md-4">
 		<?php echo '<a href="coursestud.php?cid='.$courseid.'"><button class="btn bg-olive btn-block">List of students taking the 
        course</button>	</a><br/>';
 		
        if(isset($_SESSION['usertype']) && $_SESSION['usertype']!='Student') echo '<a class="btn btn-large btn-block btn-primary " href="showtas.php?cid='.$courseid.'">
            <i class="fa fa-group"></i>  Allot and Show TAs for the Course</a>
                            <br/>';
 	?> </div>
 	</div>
    <div style="height:20px;"></div>
 	<div class="row">
 	<div class="col-md-4">
 		 <div class="box box-success" style="position: relative;">
            <div class="box-header" style="cursor: move;">
                <h3 class="box-title" style="text-align:center"><i class="fa fa-bullhorn"></i>
                    <?php
                    echo '<a href="forum.php?cid='.$courseid.'">Course Forum</a></h3>';
                    ?></i>
            </div>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 50px;">
            <div class="box-body" style="overflow: hidden; width: auto; height: 250px;">
             Discuss and learn!
            </div>
        </div>
        </div>
 	</div>
 	<div class="col-md-4">
 		 <div class="box box-success" style="position: relative;">
            <div class="box-header" style="cursor: move;">
                <h3 class="box-title" style="text-align:center"><i class="fa fa-folder-o"></i>
                <?php
                    if(isset($_SESSION['usertype']) && $_SESSION['usertype']!="Student")
                        echo '<a href="lecturesfac.php?cid='.$courseid.'">Course Lectures</a></h3>';
                        
                    else
                        echo '<a href="lectures.php?cid='.$courseid.'">Course Lectures</a></h3>';
                    
                ?>
                
            </div>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 50px;">
            <div class="box-body" style="overflow: hidden; width: auto; height: 250px;">
              All class lecture slides and other resources
            </div>
        </div>
        </div>
 	</div>
 	<div class="col-md-4">
 		<div class="box box-success" style="position: relative;">
            <div class="box-header" style="cursor: move;">
                <h3 class="box-title" style="text-align:center"><i class="fa fa-edit"></i>
                 <?php
                    if(isset($_SESSION['usertype']) && $_SESSION['usertype']!="Student")
                        echo '<a href="assignmentsfac.php?cid='.$courseid.'">Assignments</a></h3>';
                    else
                        echo '<a href="assignments.php?cid='.$courseid.'">Assignments</a></h3>';
                    
                ?></i>
            </div>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 50px;">
            <div class="box-body" style="overflow: hidden; width: auto; height: 250px;">
              Go here to view or submit assignments.
            </div>
        </div>
        </div>
 	</div>
 </div>

<?php
/*
echo '
 <div class="modal fade" id="allot" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Allot TAs for the Course</h4>
            </div>
           
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

';
*/


?>
<!-- COMPOSE MESSAGE MODAL -->


<?php
include 'footer.php';
?>