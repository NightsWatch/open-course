<?php

session_start();
include 'header.php';
include_once '../models/user_details.php';
include_once '../models/courses.php';
include_once '../models/assignments.php';


if(isset($_SESSION['status']))
  {
      include 'sidebar.php';
  }

$courseid=$_GET['cid'];

?>

<section class="content-header">
<h1 style="text-align:center"><i class="fa fa-edit"></i> Students registered</h1>
</section>
<br/>
 <section class="content">
 <div class="row">
    <div class="col-md-3">
           <?php 
            include_once '../controller/add_course_description.php';
            ?>

        
    </div>

    <div class="col-md-9">
  <div class="box box-info">

  <div class="box-body table-responsive">
    <table id="example1" class="table table-bordered table-striped">
    <thead>   
    <tr>
        <th>Name</th>
        <th>Program</th>
        <th>Batch</th>
        <th>Roll-NO</th>
        <th>Department</th>
        <?php
        if($_SESSION['usertype']!='Student')
        {
             $course= New courses();
            $check=$course->checkCourseInstructor($courseid, $_SESSION['id']);
            if($check)
                {  echo 
                        '<th>Grade</th>';
                    
                }
        }
       

   ?>
    </tr>
</thead>
<tbody>`

       <?php 

                $course= New courses();
                $students=$course->getCourseStudents($courseid);

                while($row = mysql_fetch_array($students))
                    {
                       
                        echo '<tr>
                                <td>'.$row['name'].'</td>
                                <td>'.$row['program'].'</td>
                                <td>'.$row['batch'].'</td>
                                <td>'.$row['roll'].'</td>
                                 <td>'.$row['department'].'</td>';                               

                        if( $_SESSION['usertype']!='Student' && $check)
                            {
                                $assn= New assignments();
                                if($assn->checkGrade($courseid, $row['userid']))
                                    $set=1;
                                else
                                    $set=0;
                                if($set)
                                echo ' <td><a href="grading.php?courseid='.$courseid.'&uid='.$row['userid'].'" class="btn btn-success"><i class="fa fa-star"></i>Update Grade</a></td>';
                                else
                                    echo ' <td><a href="grading.php?courseid='.$courseid.'&uid='.$row['userid'].'" class="btn btn-info"><i class="fa fa-star"></i>Give Grade</a></td>';

                            }
                        echo ' </tr>';
                        
                    } 

                    ?>
                 
               </tbody>
                
    </table>
    </div>
    </div>
    </div>



     <!-- jQuery 2.0.2 -->
        <script src="js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <script src="js/jquery_clickrow.js"></script>
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                
                $('#example1').dataTable({
                    "bPaginate": false,
                    "bLengthChange": true,
                    "bFilter": true,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>

    </body>
</html>