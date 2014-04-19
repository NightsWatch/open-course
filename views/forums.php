<?php

session_start();
include 'header.php';
if(isset($_SESSION['status']))
    {
        include 'sidebar.php';
    }
$courseid = $_GET['cid'];
?>

<link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />


<section class="content-header">
    <h1 style="text-align:center"><i class="fa fa-bullhorn"></i> All Forums</h1>
</section><br/>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List of forums for all courses</h3>                                    
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
                            <tr class='clickableRow' href='forum.php' style="cursor:pointer">
                                <td>Trident</td>
                            </tr>
                        </tbody>                    
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!--col-xs-12-->
    </div>
</section><!-- /.content -->



</aside><!-- /.right-side -->
</div><!-- ./wrapper -->


<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<script src="js/AdminLTE/app.js" type="text/javascript"></script>
<script src="js/jquery_clickrow.js"></script>
<script type="text/javascript">
    $(function() {
        $('#example1').dataTable({
            "bPaginate": true,
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