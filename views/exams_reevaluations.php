<?php

session_start();

if(!isset($_SESSION['usertype'])  )
{
    header('Location: ../views/505.php');
}

include_once 'header.php';

if(isset($_SESSION['status']))
{
    include_once 'sidebar.php';
}

$examid = $_GET['eid'];

?>

<section class="content-header">
<h1 style="text-align:center"><i class="fa fa-cloud-upload"></i> Exam Answer Sheets Uploaded</h1>
</section>
<br/>
 <section class="content">
    <div class="row">
        <div class="col-md-3">
        <?php 
        include_once '../controller/add_exam_description.php';
        ?>
        </div>
        <div class="col-md-9">

            <div class="box box-success" style="position: relative;">
        
            <div class="box-header" style="cursor: move;">
                <h3 class="box-title" style="text-align:center"><a href="">Answer Sheets For this exam</a></h3>
            </div>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
            <div class="box-body" style="overflow: hidden; width: auto;">
            <?php echo '<a href="exam_question_solutions.php?eid='.$examid.'" class="btn btn-primary">Add answer sheets</a>';?>
              <?php
              echo ' <table class="table table-bordered table-striped dataTable ">
                        <thead>   
                        <tr>
                          <th>Stud id</th>
                            <th>Max Marks</th>
                            <th>Stud Marks</th>
                            <th>Reevaluation</th>
                            <th>Comments</th>
                        </tr>
                    </thead>
                    <tbody>';

            include_once '../models/courses.php';

            $course= New courses();
            $students=$course->getCourseExamSolutionsStudents($examid);

            while($row = mysql_fetch_array($students))
                {
                   
                    echo '<tr>
                        <td>'.$row['studentid'].'</td>
                            <td>'.$row['maxmarks'].'</td>
                            <td>'.$row['marks'].'</td>';
                            if($row['reeval']=="yes")
                            {   echo '<td><a class="btn btn-success btn-sm" href="resubmit_marks.php?eid='.$examid.'&studid='.$row['studentid'].'"><i class="fa fa-check"></i> Requested <br/><small> Click to submit marks again</small></a></td>
                                        <td>'.$row['studcomments'].'</td>

                                ';


                            }
                            else {echo '<td>No</td><td></td>';                               
                            }

                    echo ' </tr>';
                    
                } 

                    
                 
               echo '</tbody>             
    </table>';
             
               ?>
            </div>
        </div>
        </div>
        </div>

    </div>
    </div>
    </div>
    </div>
    </div>
    </section>


<?php
include 'footer.php';
?>
