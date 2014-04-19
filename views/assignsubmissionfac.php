<?php

session_start();


include 'header.php';

if(isset($_SESSION['status']))
{
    include 'sidebar.php';
}
?>

<section class="content-header">
<h1 style="text-align:center"><i class="fa fa-cloud-upload"></i> Assignment Submission Page</h1>
</section>
<br/>
 <section class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="box box-success" style="position: relative;">
            <div class="box-header" style="cursor: move;">
                <h3 class="box-title" style="text-align:center"><a href="thread.php">Details of the assignment</a></h3>
            </div>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
            <div class="box-body" style="overflow: hidden; width: auto;">
              <ul>
                <li>Title: </li>
                <li>Assignment No.: </li>
                <li>Deadline</li>
                <li>File for download:</li>
                <hr>
                <li>Courseno.: </li>
                <li>Course Name: </li>
                <li>Year: </li>
            </ul>

            </div>
        </div>
        </div>
            
            
        </div>



        <div class="col-xs-9">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List of students who have submitted this assignment</h3>                                    
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                <p>Click on a submission row to go to the grading page</p>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                                <th>Coursename</th>
                                <th>Courseno.</th>
                                <th>Year</th>
                                <th>Instructors</th>
                                <th>Number of students enrolled</th>
                            </tr>
                        </thead>
                        <tbody>
                             <tr class='clickableRow' href='forum.php' style="cursor:pointer">
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 4.0</td>
                                <td>Win 95+</td>
                                <td> 4</td>
                                <td>X</td>
                            </tr>
                             <tr class='clickableRow' href='forum.php' style="cursor:pointer">
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 5.0</td>
                                <td>Win 95+</td>
                                <td>5</td>
                                <td>C</td>
                            </tr>

                        </tbody>
                        
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>

        </div>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <script src="js/jquery_clickrow.js" type="text/javascript"></script>

         <script type="text/javascript">
            $(function() {
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



<?php
include 'footer.php';
?>