<?php

session_start();
include 'header.php';


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
 	<div class="col-md-6 col-md-offset-1">
 		   <?php 
            include_once '../controller/add_course_description.php';
            ?>

 		
 	</div>

 	<div class="col-md-4">
 		 <a href="coursestud.php"><button class="btn bg-olive btn-block">List of students taking the course</button>	</a><br/>
 		 <a href="courseta.php"><button class="btn bg-olive btn-block">List of TAs for the course</button>	</a><br/>
 		<?php
        if($_SESSION['usertype']!='Student') echo '<a class="btn btn-large btn-primary" data-toggle="modal" data-target="#allot"><i class="fa fa-group"></i> Allot TAs for the Course</a><br/>';
 	?> </div>
 	</div>
 	<div class="row">
 	<div class="col-md-4">
 		 <div class="box box-success" style="position: relative;">
            <div class="box-header" style="cursor: move;">
                <h3 class="box-title" style="text-align:center"><i class="fa fa-bullhorn">
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
                <h3 class="box-title" style="text-align:center"><i class="fa fa-folder-o">
                <?php
                    if($_SESSION['usertype']=="Student")
                        echo '<a href="lectures.php?cid='.$courseid.'">Course Lectures</a></h3>';
                    if($_SESSION['usertype']=="Faculty")
                        echo '<a href="lecturesfac.php?cid='.$courseid.'">Course Lectures</a></h3>';
                    
                ?></i>
                
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
                <h3 class="box-title" style="text-align:center"><i class="fa fa-edit">
                 <?php
                    if($_SESSION['usertype']=="Student")
                        echo '<a href="assignments.php?cid='.$courseid.'">Assignment Lectures</a></h3>';
                    if($_SESSION['usertype']=="Faculty")
                        echo '<a href="assignmentsfac.php?cid='.$courseid.'">Assignment Lectures</a></h3>';
                    
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


 <div class="modal fade" id="allot" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Allot TAs for the Course</h4>
            </div>
            <form action="../controller/allot_ta.php" method="POST" role="form">
                <div class="modal-body">
                <?php 

                $course= New $courses;
                $students=$course->getCourseStudents($courseid);

                while($row = mysql_fetch_array($students))
                    {
                       
                        echo '<tr>
                                <td>'.$row['name'].'</td>
                                <td>'.$coursedetails['program'].'</td>
                                <td>'.$coursedetails['batch'].'</td>
                                <td>'.$coursedetails['rollno'].'</td>
                                <td>


                                    ';

                                    $facrows = $crs->getCourseInstructors($cid);
                                    if(mysql_num_rows($facrows) != 0)
                                    {
                                        echo '<ul class="list-unstyled">';

                                while($fac =mysql_fetch_array($facrows))
                                    {
                                        echo '<li>'.$fac['name'].'</li>';
                                    }
                                    echo'</ul>';
                                }
                                echo '</td>
                                ';
                    } 

                    ?>
                 
                </div>
                <div class="modal-footer clearfix">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Discard</button>
                    <button type="submit" name="messages" class="btn btn-primary pull-left"><i class="fa fa-envelope"></i> Send Message</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<?php
include 'footer.php';
?>