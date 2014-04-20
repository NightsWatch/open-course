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
<h1 style="text-align:center"><i class="fa fa-book"></i> All Course Allotments</h1>
</section>
<br/>
 <section class="content">
                    <div class="row">

                        <div class="col-md-9">

                            <div class="box box-info">

                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Course number</th>
                                                <th>Course name</th>
                                                <th>Year</th>
                                                <th>Credits</th>
                                                <th>Instructors</th>   
                                                <th></th> 
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                            include_once '../controller/list_coursefacallot.php';

                                        ?>
                                        
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                          </div>
                        <div class="col-md-3">
                           <div class="callout callout-info">
                                        <h4>Search through table</h4>
                                        <p>Using the search box on the table</p>
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
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                
                $('#example1').dataTable({
                    "bPaginate": false,
                    "bLengthChange": true,
                    "bFilter": true,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>

    </body>
</html>