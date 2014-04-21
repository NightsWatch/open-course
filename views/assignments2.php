<?php

session_start();


include 'header.php';
include_once '../models/courses.php';
include_once '../models/assignments.php';
if(isset($_SESSION['status']))
{
    include 'sidebar.php';
}
$courseid = $_GET['cid'];

$courses = New courses();
$row = $courses->getCourseDetails($courseid);
$assign = New assignments();

?>


<link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />


<section class="content-header">
<h1 style="text-align:center"><i class="fa fa-edit"></i> <?php
                                     echo 'Assignments for '.$row['coursename'].', '.$row['year'];
                                    ?></h1>

</section>
<br/>
 <section class="content">
                    <div class="row">
                        <div class="col-xs-3">
                             <?php
                                include_once '../controller/add_course_description.php';
                                ?>
                        </div>
                        <div class="col-xs-9">
                         <?php
                      if(isset($_GET['success']))
                      {
                        $success= $_GET['success']; 
                        if($success==1)  
                        echo '<div class="alert alert-success">Your assignment solution was uploaded successfully.</div>';     
                      }
              ?>
      
                            <div class="box box-info">
        
                                <div class="box-body table-responsive">
                                <br/>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                               <th>Assign no.</th>
                                               <th>Assign name</th>
                                               <th>Download link</th>
                                                <th>Deadline</th>
                                                <th>Submit</th>
                                                <th>Max Marks</th>
                                                <th>Your Marks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            <?php
                                            
                                               
                                            $assignments = $courses->getCourseAssignments($courseid);

                                             if(isset($_SESSION['id']) )
                                             {  $aids=$assign->getAssignmentidsSubmittedCourse($_SESSION['id'],$courseid);
                                                //echo $aids;
                                                $cart = array();
                                                
                                                while($aid = mysql_fetch_array($aids))
                                                {
                                                    $cart[] = $aid['assignid'];
                                                    
                                                }
                                            }
                                        while($assignment = mysql_fetch_array($assignments))
                                            {
                                                echo '<tr>
                                                        <td>'.$assignment['assignno'].'</td>
                                                        <td>'.$assignment['assign_name'].'</td>
                                                        <td><a href='.$assignment['filepath'].'>Download Assignment</a></td>
                                                        <td>'.date("H:i, d M Y", strtotime($assignment['deadline'])).'</td>';

                                                if(isset($_SESSION['usertype']))
                                                {


                                                        if (in_array($assignment['assignid'], $cart))
                                                        {
                                                            $details = $assign->getSubmissionDetails($assignment['assignid'],$_SESSION['id']);
                                                            //echo $details['filepath'];
                                                            $hrdate = date("H:i, d M Y", strtotime($details['stime']));
                                                            echo '<td>Already submitted <a href="'.$details['filepath'].'">this</a> at '.$hrdate.'</td>

                                                            <td>'.$assignment['maxmarks'].'</td>
                                                            ';
                                                            $marks= $assign->getStudMarks($_SESSION['id'], $courseid);
                                                            if($marks!=-1) echo '<td>'.$marks.'</td>';


                                                        }
                                                        else
                                                        {
                                                            if(date('Y-m-d H:i:s')<$assignment['deadline'])
                                                                {echo '<td><a href="assignsubmission.php?aid='
                                                                .$assignment["assignid"].'">Submit Solution</a></td>';}
                                                                else{
                                                                    echo '<td></td>';
                                                                }
                                                                echo '
                                                                    <td>'.$assignment['maxmarks'].'</td>
                                                                    <td></td>

                                                                   ';

                                                        }
                                                }

                                                else
                                                {
                                                    echo '<td></td><td></td><td></td>';
                                                }


                                                echo ' </tr>
                                                            ';

                                            }

                                            ?>
                                            
                                        </tbody>
                                       
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
  <!-- jQuery 2.0.2 -->
        <script src="js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <script src="js/jquery_clickrow.js" type="text/javascript"></script>



                <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $('#example1').dataTable({
                    "bPaginate": false,
                    "bLengthChange": false,
                    "bFilter": true,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });

                
            });
        </script>

   <?php include_once 'footer.php'; ?>
