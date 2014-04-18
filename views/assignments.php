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
<h1 style="text-align:center"><i class="fa fa-edit"></i> Assignments</h1>

</section>
<br/>
 <section class="content">
                    <div class="row">
                    <div class="col-xs-3">
                            <div class="box box-warning">
                                <div class="box-header">
                                    <h3 class="box-title">For _ course</h3>                                    

                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <ul>
                                        <li>Course no.</li>
                                        <li>Course name</li>
                                    </ul>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                        <div class="col-xs-9">
                            <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Assignments</h3>                                   
                                	
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                <br/>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                               <th>Assignment no.</th>
                                               <th>Download link</th>
                                                <th>Deadline</th>
                                                <th>Submit</th>
                                                <th>Max Marks</th>
                                                <th>Your Marks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <tr>
                                           		<td>1</td>
                                            	<td><a href="fileath">Download link.</a></th>
                                                <td>31 Jan 1993</td>
                                                <td><a href="assignsubmission.php">Submit</a></td>
                                                <td>10</td>
                                                <td>3</td>
                                            </tr>
                                           <tr>
                                           		<td>1</td>
                                            	<td><a href="fileath">Download link.</a></th>
                                                <td>31 Jan 1993</td>
                                                <td><a href="assignsubmission.php">Submit</a></td>
                                                <td>20</td>
                                                <td>5</td>
                                            </tr>
                                            <tr>
                                           		<td>1</td>
                                            	<td><a href="fileath">Download link.</a></th>
                                                <td>31 Jan 1993</td>
                                                <td><a href="assignsubmission.php">Submit</a></td>
                                                <td>10</td>
                                                <td>3</td>
                                            </tr>
                                           
                                            
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
        <script src="js/jquery_clickrow.js" type="text/javascript"></script>

        <!-- page script -->
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

    </body>
</html>