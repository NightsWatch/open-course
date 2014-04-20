<?php

session_start();


include 'header.php';

if(isset($_SESSION['status']))
{
    include 'sidebar.php';
}

$assignid = $_GET['aid'];
?>

<section class="content-header">
<h1 style="text-align:center"><i class="fa fa-cloud-upload"></i> Assignment Submission Page</h1>
</section>
<br/>
 <section class="content">
    <div class="row">
        <div class="col-md-4">
             <?php 
        include_once '../controller/add_assign_description.php';
        ?>            
        </div>



        <div class="col-xs-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List of students who have submitted this assignment</h3>                                    
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                <p>Click on a submission row to go to the grading page</p>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                                <th>Student name</th>
                                <th>Submitted file</th>
                                <th>Timestamp</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            include_once '../controller/list_submissions.php';
                        ?>
                        </tbody>
                        
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>

        </div>

        <script src="js/jquery.min.js"></script>
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