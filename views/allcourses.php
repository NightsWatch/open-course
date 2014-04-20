<?php

session_start();


include 'header.php';
include_once '../models/courses.php';

$crs = New courses();

if(isset($_SESSION['status']))
{
    include 'sidebar.php';
}
?>


<link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />


<section class="content-header">
<h1 style="text-align:center"><i class="fa fa-book"></i> All Courses</h1>
</section>
 <section class="content">
                    <div class="row">
                          <div class="callout callout-info">
                                        <h4>Info!</h4>

                                        <?php
                                        include_once '../models/user_details.php';
                                $ud = New user_details();
                                $maxcredits= $ud->getMaxCredits($_SESSION['id']);
                                echo '<p>Click on the buttons change registration status. You cannot register for more than '.$maxcredits.' credits</p>
                                <p>Go to Registered Courses page to access coursepages</p>'
                                ?>
                                        
                                    </div> 
                        <div class="col-md-12">
                      
                        <?php 
                        if(isset($_GET['done']))
                        {
                            $cid = $_GET['done'];
                            $cname = $crs->getCourseName($cid);
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Success!</b> Successfully registered for the course:  '.$cname.'</div>';
                        }

                        if(isset($_GET['removed']))
                        {
                            $cid = $_GET['removed'];
                            $cname = $crs->getCourseName($cid);
                            echo '<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-warning"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        You are removed from the course:  '.$cname.', '.date("Y").'</div>';
                        }
                          
                          if(isset($_GET['cant']))
                        {
                           
                            echo '<div class="alert alert-warning alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        Cant register for this course as its year is less than todays!</div>';
                        }
                                    ?>

                                    <?php

                                    if(isset($_GET['limit']))

                                        echo '<div class="alert alert-warning">Course credits exceeded max. limit. 
                                    Registration failed.</div>';  
                              ?>

                            <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">List of All Courses</h3>                                    
                                    
                                </div><!-- /.box-header -->

                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Course number</th>
                                                <th>Course name</th>
                                                <th>Year</th>
                                                <th>Department</th>
                                                <th>Credits</th>
                                                <th>Slot</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                            include_once '../controller/list_courses.php';

                                        ?>
                                        
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                          </div>

                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->


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
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>

    </body>
</html>