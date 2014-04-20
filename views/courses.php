<?php

session_start();

if(!isset($_SESSION['id']))
header('Location: 505.php');

include 'header.php';
include_once '../models/coursereg.php';

if(isset($_SESSION['status']))
{
    include 'sidebar.php';
}


?>




<link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />


<section class="content-header">

<?php 

    if($_SESSION['usertype']=="Student")
        echo '<h1 style="text-align:center"><i class="fa fa-book"></i> Registered Courses</h1>';
    if($_SESSION['usertype']=="Faculty")
        echo '<h1 style="text-align:center"><i class="fa fa-book"></i> Allotted Courses</h1>'; ?>

</section>
<br/>
 <section class="content">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="box">
                                <div class="box-header">

                                <?php

                                if($_SESSION['usertype']=="Student")
                                    echo '<h3 class="box-title">You have registered for the following courses</h3>';                                    
                                if($_SESSION['usertype']=="Faculty")
                                    echo '<h3 class="box-title">You are taking the following courses</h3>';                                    
                                ?>                                    
                                </div><!-- /.box-header -->

                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                
                                                <th>Course number</th>
                                                <th>Course name</th>
                                                <th>Year</th>
                                                <th>Department</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php

                                         

                                        if($_SESSION['usertype']=="Student")
                                        {
                                            include_once '../controller/registered_courses.php';
                                        }

                                        if($_SESSION['usertype']=="Faculty")
                                        {
                                            include_once '../controller/faccourses.php';
                                        }


                                        ?>
                                        
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                          </div>
                        <div class="col-md-3">

                                <?php

                                $coursereg= New coursereg();
                                $x=$coursereg->getRegisteredCredits($_SESSION['id']);
                                $y=48-$x;

                                if($_SESSION['usertype']=="Student")
                                {

                                echo'
                                <div class="box">
                                    <div class="alert alert-info ">
                                        <i class="fa fa-info"></i>
                                        
                                        <b>Info!</b> Click on the course row to go to the course-home page                                     </div>
                
                                <div class="box-body">
                                    <a href="allcourses.php"><button class="btn bg-blue btn-large">
                                    Register for another course</button></a>
                                    <div style="height:10px"></div>
                                    <p>You have already taken '.$x.' credits. You can take '.$y.' more credits this semester.</p>
                                </div><!-- /.box-body -->
                            </div><!-- /.box --> ';
                            }
                            ?>
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