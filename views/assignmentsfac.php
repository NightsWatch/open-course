<?php

session_start();


include 'header.php';

if(isset($_SESSION['status']))
{
    include 'sidebar.php';
}
?>

<link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
<link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<link href="css/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>


<section class="content-header">
    <h1 style="text-align:center"><i class="fa fa-edit"></i> Assignments</h1>
</section>
<br/>
 <section class="content">
                    <div class="row">
                    <div class="col-xs-4">
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

                           
                            <form role="form">
                            <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Add Assignment</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Upload Assignment</label>
                                        <input type="file" id="exampleInputFile">
                                    </div>
                                    <div class="form-group">
                                        <label>Date range:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="reservation"/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                            
                                    <div class="bootstrap-timepicker">
                                        <div class="form-group">
                                            <label>Time:</label>
                                            <div class="input-group">                                            
                                                <input type="text" class="form-control timepicker"/>
                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                            </div><!-- /.input group -->
                                        </div><!-- /.form group -->
                                    </div>
                                        
                                    
                                    <div class="form-group">
                                        <label> Max marks</label>
                                        <input type="text" class="form-control" placeholder="Total">
                                    </div>
                                </div>
                                <div class="box-footer">
                                   <button type="submit" class="btn bg-olive btn-block">Submit</button>
                                </div>
                            </div>
                            </form>
                           
                        </div>
                        <div class="col-xs-8">
                            <div class="box box-warning">
                                <div class="box-header">
                                    <h3 class="box-title">Assignments</h3>                                   
                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
         <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
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

                $('#reservation').datepicker();
               
                //Timepicker
                $(".timepicker").timepicker({
                    showInputs: false
                });

            });
        </script>

           <!-- InputMask -->
        <script src="js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
        <!-- date-range-picker 
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        bootstrap color picker
        <script src="js/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
        bootstrap time picker -->
        <script src="js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>



    </body>
</html>