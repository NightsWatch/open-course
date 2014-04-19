<?php

session_start();


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
        <!-- Theme style -->
<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />


<section class="content-header">
<h1 style="text-align:center"><i class="fa fa-folder-o"></i><?php
                                     echo ' Lectures for '.$row['coursename'].', '.$row['year'];
                                    ?></h1>
</section>
<br/>
 <section class="content">
                    <div class="row">
                    <div class="col-xs-4">
                           <?php
                                                include_once '../controller/add_course_description.php';
                                            ?>
                            <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Add Lecture</h3>                                    

                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <form role="form">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Lecture Title</label>
                                            <input type="text" class="form-control" placeholder="Name">
                                        </div>

                                         <div class="form-group">
                                           <label for="exampleInputFile">Upload Lecture</label>
                                            <input type="file" id="exampleInputFile">
                                        </div>
                                       
                                     </form>
                           
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                     <button type="submit" class="btn bg-olive btn-block">Submit</button>

                                </div>
                                   
                            </div><!-- /.box -->

                        </div>
                        <div class="col-xs-8">
                            <div class="box box-danger" >
                                <div class="box-header">
                                    <h3 class="box-title">Lectures</h3>                                    

                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Lecture No.</th>
                                                <th>Lecture Title</th>
                                                <th>Download link</th>
                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php
                                                include_once '../controller/list_lectures.php';
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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                //$("#example1").dataTable();
                $('#example1').dataTable({
                    "bPaginate": false,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>

    </body>
</html>