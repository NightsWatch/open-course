<?php

session_start();

if(!isset($_SESSION['usertype']) )
{
    header('Location: ../views/505.php');
}

include 'header.php';
include_once '../models/courses.php';
if(isset($_SESSION['status']))
{
    include 'sidebar.php';
}
$courseid = $_GET['cid'];

$courses = New courses();
$row = $courses->getCourseDetails($courseid);


?>

<link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
<link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<link href="css/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>


<section class="content-header">
    <h1 style="text-align:center"><i class="fa fa-edit"></i> <?php
     echo 'Exams Question Papers for '.$row['coursename'].', '.$row['year'];
 ?>


</h1>
</section>
<br/>
 <section class="content">
        <div class="row">
        <div class="col-xs-3">
               <?php
                    include_once '../controller/add_course_description.php';

                    echo '
                <form role="form" action="../controller/exam_question_upload.php?courseid='.$courseid.'" method="post" 
                enctype="multipart/form-data">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Add Exam Question Paper</h3>                                    
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <div class="form-group">
                            <label for="exampleInputFile">Upload Question Paper</label>
                            <input type="file" name="file" id="exampleInputFile" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Exam Name</label>
                            <input type="text" name="examtitle" placeholder="Quiz1/Midsem/Quiz2" required>
                        </div>

                        <div class="form-group">
                            <label> Max marks</label>
                            <input type="text" name="maxmarks" class="form-control" placeholder="Total" required>
                        </div>

                         <div class="form-group">
                            <label>Weightage</label>
                            <input type="text" name="weightage" class="form-control" placeholder="Weightage" required>
                        </div>
                    </div>
                    <div class="box-footer">
                       <button type="submit" class="btn bg-olive btn-block">Submit</button>
                    </div>
                </div>
                </form>'; ?>
               
            </div>
            <div class="col-xs-9">
             <?php
          if(isset($_GET['success']))
          {
            $success= $_GET['success']; 
            if ($success==1)
            echo '<div class="alert alert-success">The question paper was uploaded successfully </div>';    
            else
            echo '<div class="alert alert-warning">Question paper upload failed. Try again. </div>';  
          }
  ?>
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Question paper</h3>       
                        
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <div class="alert alert-info ">
                            <i class="fa fa-info"></i>
                            <b>Info!</b> Click on the  row to see all students' evaluater papers for the exam.
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                   
                                   <th>Exam name</th>
                                   <th>Download Question Paper</th>
                                    <th>Max Marks</th>
                                    <th>Weightage</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                <?php

                                include_once '../models/courses.php';

                                $crs = New courses();
                                $rows = $crs->getCourseExamQuestions($courseid);

                                while($row = mysql_fetch_array($rows))
                                    {
                                        echo '<tr class="clickableRow" href="exams_reevaluations.php?eid='.$row['examid'].'" style="cursor:pointer">
                                                <td>'.$row['examtitle'].'</td>
                                                <td><a href='.$row['filepath'].'>Download Paper</a></td>
                                                
                                                <td>'.$row['maxmarks'].'</td>
                                                <td>'.$row['weightage'].'</td>
                                                </tr>
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

                $('#reservation').datepicker();
               
                //Timepicker
                $(".timepicker").timepicker({
                    showInputs: false
                });

            });
        </script>

           <!-- InputMask -->
        <script src="js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
        <!-- date-range-picker 
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        bootstrap color picker
        <script src="js/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
        bootstrap time picker -->
        <script src="js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>



    </body>
</html>