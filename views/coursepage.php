<?php

session_start();
include 'header.php';
include_once '../models/user_details.php';
include_once '../models/assignments.php';


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
 		<?php  		
        if(isset($_SESSION['usertype']) && $_SESSION['usertype']!='Student') 
            {
                 $course= New courses();
                $check=$course->checkCourseInstructor($courseid, $_SESSION['id']);
                if($check)
                {
                
                echo '<a class="btn btn-large btn-block btn-primary " href="showtas.php?cid='.$courseid.'">
            <i class="fa fa-group"></i>  Allot and Show TAs for the Course</a>
                            <br/>';
                            echo '<a href="coursestud.php?cid='.$courseid.'"><button class="btn bg-olive btn-block">Allot Grade & see Students List </button> </a><br/>';
                        }
            }

            else if(isset($_SESSION['id']) )
            {
                
                echo '<a href="coursestud.php?cid='.$courseid.'"><button class="btn bg-olive btn-block">List of students taking the 
        course</button> </a><br/>';

            }
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
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 60px;">
            <div class="box-body" style="overflow: hidden; width: auto; height: 250px;">
              <p>Go here to view or submit assignments. Scores for assignments can be seen here</p>   
            </div>
        </div>
        </div>
 	</div>
 </div>




<?php 
if(isset($_SESSION['id']))
{   
    if($_SESSION['usertype']=='Student')
    {
?>

    <div class="col-md-3">
        <div class="box box-info" style="position: relative;">
            
     <div class="callout callout-info">
                        <h4> Final Grade Given</h4>
                        <p>
                            <?php 
                            $assn= New assignments();
                            $val=$assn->getGrade($courseid, $_SESSION['id']);
                             
                                if($val)
                                {
                                    echo 'You have received '.$val.' grade';
                                }
                                else
                                     echo 'No grade set';
                            ?>
                        </p>
                        
                    </div>

    </div>
    </div>

         <div class="col-md-9">
               <div class="box box-info">
                <div class="box-header" style="cursor: move;">
                <h3 class="box-title" style="text-align:center"><i class="fa fa-check"></i>Exam Marks
                 </i>
            </div>
          <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                <thead>   
                <tr>
                 <th>Exam Name</th>
                
                    <th>Exam Marks</th>
                   
                    <th>Max Marks</th>
                   
                    <th>Weightage</th>
                    <th>Questionpage</th>
                    <th>Answersheet</th>
                    <th>Reevaluation</th>
 

                 </tr>
            </thead>
        <tbody>

        <?php

        $course= New courses();
        $exam_marks= $course->getExamMarksStud($courseid,$_SESSION['id']);
        while($row=mysql_fetch_array($exam_marks) )
        {
            //print_r ($row);

        echo 
        '
        <tr><td>'.$row['examtitle'].'</td>
        <td>'.$row['marks'].'</td>
        <td>'.$row['maxmarks'].'</td>
        <td>'.$row['weightage'].'</td>
        
        <td><a href="'.$row['question'].'" class="btn btn-warning"><i class="fa fa-download"></i> Download</a></td>
        <td><a href="'.$row['corrected'].'" class="btn btn-warning"><i class="fa fa-download"></i> Download</a></td>';
        
        if($row['reeval']=="no")
            {
                echo '<td><a class="btn btn-large btn-success" data-toggle="modal" data-target="#compose-modal"><i class="fa fa-edit"></i> Request</a>



                                        <!-- COMPOSE MESSAGE MODAL -->
                        <div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Request Reevaluation</h4>
                                    </div>
                                    
                                    <form action="../controller/requestreeval.php?eid='.$row['examid'].'&cid='.$courseid.'" method="POST" role="form">

                                    
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <textarea name="comments" id="comments" class="form-control" placeholder="Desribe why you want a reevaluation and what part should be reevaluated" style="height: 80px;"></textarea>
                                            </div> 
                                        </div>
                                        <div class="modal-footer clearfix">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Discard</button>
                                            <button type="submit" name="messages" class="btn btn-primary pull-left"><i class="fa fa-envelope"></i> Send Request</button>
                                        </div>
                                    </form>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->



                ';
                //echo '<a href="../controller/requestreeval.php?eid='.$row['examid'].'&cid='.$courseid.'">Request</a></td>';
            }
        else
            {
                echo '<td><a class="btn btn-primary"><i class="fa fa-check"></i> Requested</a></td>';
            }
        echo '</tr>';
        }
        ?>
        </tbody>
         </table>
         </div>
         </div>
</div>


<?php } }
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







<?php
include 'footer.php';
?>