<?php

session_start();


include 'header.php';

if(isset($_SESSION['status']))
{
    include 'sidebar.php';
}
?>

<link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />


<section class="content-header">
<h1 style="text-align:center"><i class="fa fa-book"></i> Courses</h1>
</section>
<br/>
 <section class="content">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">You have registered for the following courses</h3>                                    
                                    
                                </div><!-- /.box-header -->

                                <div class="box-body table-responsive">
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
                                            <tr class='clickableRow' href='coursepage.php' style="cursor:pointer">
                                                <td>Trident</td>
                                                <td>Internet
                                                    Explorer 4.0</td>
                                                <td>Win 95+</td>
                                                <td> 4</td>
                                                <td>X</td>
                                            </tr>
                                            <tr class='clickableRow' href='coursepage.php' style="cursor:pointer">
                                                <td>Trident</td>
                                                <td>Internet
                                                    Explorer 5.0</td>
                                                <td>Win 95+</td>
                                                <td>5</td>
                                                <td>C</td>
                                            </tr>
                                            <tr class='clickableRow' href='coursepage.php' style="cursor:pointer">
                                                <td>Trident</td>
                                                <td>Internet
                                                    Explorer 5.5</td>
                                                <td>Win 95+</td>
                                                <td>5.5</td>
                                                <td>A</td>
                                            </tr>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                          </div>
                        <div class="col-md-3">
                           <div class="box">

                                <div class="box-body">
                                    <a href="tastudents.php"><button class="btn bg-blue btn-large">Register for another course</button></a>
                                    <div></div>
                                    <p>You have already take x credits. You can take y more credits this semester.</p>
                                </div><!-- /.box-body -->
                            </div><!-- /.box --> 
                            
                        </div>
                  

                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
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
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
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