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
<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />


<section class="content-header">
<h1 style="text-align:center"><i class="fa fa-book"></i> Create a Course</h1>
</section>
<br/>
 <section class="content">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="box box-info">
                                <div class="box-body">


                                    <form role="form" action="../controller/newcourse.php" method="post">

                          
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Course Name</label>
                                            <input type="text" name="coursename" class="form-control" placeholder="Course Name">
                                        </div>

                                         <div class="form-group">
                                            <label>Course number</label>
                                            <input type="text" name="courseno" class="form-control" placeholder="Course number" >
                                        </div>
                                        <fieldset disabled>
                                        <div class="form-group">
                                            <label>Department</label>
                                            <?php
                                            include '../models/faculty_details.php';
                                            $fac = New faculty_details();

                                            echo '<input type="text" name="department" class="form-control" placeholder="'.$fac->getDept($_SESSION['id']).'" >';

                                            ?>
                                        </div>
                                        </fieldset>
                                         <div class="form-group">
                                            <label>Year</label>
                                            <input type="text" name="year"  class="form-control" placeholder="Year">
                                        </div>
                                        <div class="form-group">
                                            <label>Credits</label>
                                            <input type="text" name="credits" class="form-control" placeholder="Credits" >
                                        </div>


                                        <div class="form-group">
                                            <label>Select One or Multiple Instructor</label>
                                            <select multiple name="facs[]" class="form-control">

                                        <?php
                                        include_once '../models/faculty_details.php';

                                        $fac = New faculty_details();
                                        $rows = $fac->getAllFac($fac->getDept($_SESSION['id']));
                                        while($row = mysql_fetch_array($rows))
                                        {
                                            echo '<option value="'.$row['userid'].'">'.$row['name'].'</option>';
                                        }
                                            
                                        ?>
                                            </select>
                                        </div>

                                    <button type="submit" class="btn bg-olive btn-block">Submit</button>


                            </form>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                          </div>
                        <div class="col-md-3">
                           <div class="callout callout-info">
                                        <p>Please fill all details.</p>
                                    </div> 
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

    </body>
</html>