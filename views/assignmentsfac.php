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
                                     echo 'Assignments for '.$row['coursename'].', '.$row['year'];
                                    ?></h1>
</section>
<br/>
 <section class="content">
                    <div class="row">
                    <div class="col-xs-3">
                           <?php
                                include_once '../controller/add_course_description.php';

                                echo '
                            <form role="form" action="../controller/assn_upload.php?courseid='.$courseid.'" method="post" 
                            enctype="multipart/form-data">
                            <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Add Assignment</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Upload Assignment</label>
                                        <input type="file" name="file" id="exampleInputFile">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputFile">Assignment Name</label>
                                        <input type="text" name="assnname">
                                    </div>

                                     <div class="form-group">
                                        <label for="exampleInputFile">Assignment Number</label>
                                        <input type="text" name="assignno">
                                    </div>
                                   
                                    <div class="form-group">
                                        <label>Date range:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="date" class="form-control pull-right" id="reservation"/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                            
                                    <div class="bootstrap-timepicker">
                                        <div class="form-group">
                                            <label>Time:</label>
                                            <div class="input-group">                                            
                                                <input type="text" name="time" class="form-control timepicker"/>
                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                            </div><!-- /.input group -->
                                        </div><!-- /.form group -->
                                    </div>
                                        
                                    
                                    <div class="form-group">
                                        <label> Max marks</label>
                                        <input type="text" name="maxmarks" class="form-control" placeholder="Total">
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
                        echo '<div class="alert alert-success">The assignment was uploaded successfully </div>';    
                        else
                        echo '<div class="alert alert-warning">Assignment upload failed. Try again. </div>';  
                      }
              ?>
                            <div class="box box-warning">
                                <div class="box-header">
                                    <h3 class="box-title">Assignments</h3>       
                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <div class="alert alert-info ">
                                        <i class="fa fa-info"></i>
                                        
                                        <b>Info!</b> Click on the assignment row to see all students' submissions for the assignment.
                                    </div>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                               <th>Assignment no.</th>
                                               <th>Assignment name</th>
                                               <th>Download link</th>
                                                <th>Deadline</th>
                                                <th>Max Marks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                            <?php

                                            include_once '../models/courses.php';

                                            $crs = New courses();
                                            $rows = $crs->getCourseAssignments($courseid);

                                            while($row = mysql_fetch_array($rows))
                                                {
                                                    echo '<tr class="clickableRow" href="assignsubmissionfac.php?aid='.$row['assignid'].'" style="cursor:pointer">
                                                            <td>'.$row['assignno'].'</td>
                                                            <td>'.$row['assign_name'].'</td>
                                                            <td><a href='.$row['filepath'].'>Download Assignment</a></td>
                                                            <td>'.$row['deadline'].'</td>
                                                            <td>'.$row['maxmarks'].'</td>
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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
         <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
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