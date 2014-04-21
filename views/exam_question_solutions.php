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
<h1 style="text-align:center"><i class="fa fa-cloud-upload"></i> Exam Answer Sheets Upload page</h1>
</section>
<br/>
 <section class="content">
    <div class="row">
        <div class="col-md-6">
        
        <?php 
        include_once '../controller/add_exam_description.php';
        ?>
        <?php echo '<a href="exams_reevaluations.php?eid='.$examid.'" class="btn btn-primary">View answer sheets uploaded</a><br/>';?>
        </div>

        <div class="col-md-6">

            <div class="box box-success" style="position: relative;">
           
              <?php
       
                      if(isset($_GET['success']))
                      { echo '<br/> ';
                        $success= $_GET['success']; 
                        if($success==0)  
                        echo '<div class="alert alert-danger">Answer sheet Submission failed. Marks given has to be less than maximum marks. Try again.</div>';
                      else if($success==2)  
                        echo '<div class="alert alert-danger">Answer sheet submission failed due to unsupported file format.</div>';      
                        else if($success==1)  
                        echo '<div class="alert alert-warning">The answer sheet was submitted scuccessfully.</div>';      
                      }
              ?>
            <div class="box-header" style="cursor: move;">
                <h3 class="box-title" style="text-align:center"><a href="thread.php">Answer Sheets</a></h3>
            </div>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
            <div class="box-body" style="overflow: hidden; width: auto;">

              <?php
              echo '
              <form role="form" action="../controller/exam_answer_upload.php?eid='.$examid.'" method="post" 
              enctype="multipart/form-data">
                                    <div class="box-body">
                                       <div class="form-group">
                                            <label>Student Roll id</label>
                                            <input type="number" name="studid" id="studid" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Student Marks</label>
                                            <input type="number" name="marks" id="marks" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="file">File input</label>
                                            <input type="file" name="file" id="file" required>
                                            <p class="help-block">Upload students answer sheet.</p>
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
    <div class="row">
      <div class="col-md-6">
      <div class="box box-success" style="position: relative;">
                <div class="box-header" style="cursor: move;">
                    <h3 class="box-title" style="text-alig:center"><a href="">Students Registered for COurse </a></h3>
                </div>
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
                    <div class="box-body" style="overflow: hidden; width: auto;">
      <table class="table">
        <thead>   
    <tr>
      <th>Student Roll id</th>
        <th>Name</th>
        <th>Program</th>
        <th>Batch</th>
        <th>Department</th>
    </tr>
</thead>
<tbody>`

       <?php  
            include_once '../models/courses.php';

                $course= New courses();
                $students=$course->getCourseStudents($row['courseid']);

                while($row = mysql_fetch_array($students))
                    {
                       
                        echo '<tr>
                            <td>'.$row['userid'].'</td>
                                <td>'.$row['name'].'</td>
                                <td>'.$row['program'].'</td>
                                <td>'.$row['batch'].'</td>
                                 <td>'.$row['department'].'</td>';                               

                        echo ' </tr>';
                        
                    } 

                    ?>
                 
               </tbody>
                
    </table>
      </div>
    </div>
    </div>
    </div>
    </div>
    </section>


<?php
include 'footer.php';
?>
