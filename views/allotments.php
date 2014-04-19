<?php

session_start();


include 'header.php';

if(isset($_SESSION['status']))
{
    include 'sidebar.php';
}
?>

        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

<section class="content-header">
    <h1 style="text-align:center"><i class="fa fa-edit"></i> Allotments Page</h1>
</section>
<br/>
 <section class="content">
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class=""><a href="#tab_1" data-toggle="tab">Course Faculty</a></li>
                                    <li class="active"><a href="#tab_2" data-toggle="tab">Course Student </a></li>
                                    <li class=""><a href="#tab_3" data-toggle="tab">Tab 2</a></li>
                                    <li class=""><a href="#tab_4" data-toggle="tab">Student TA </a></li>
                                    <li class=""><a href="#tab_5" data-toggle="tab"> BTP/MTP Allotment</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane" id="tab_1">
                                        <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Simple Full Width Table</h3>
                                    <div class="box-tools">
                                        <ul class="pagination pagination-sm no-margin pull-right">
                                            <li><a href="#">&laquo;</a></li>
                                            <li><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">&raquo;</a></li>
                                        </ul>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <table class="table">
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Task</th>
                                            <th>Progress</th>
                                            <th style="width: 40px">Label</th>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>Update software</td>
                                            <td>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-red">55%</span></td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>Clean database</td>
                                            <td>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-yellow">70%</span></td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>Cron job running</td>
                                            <td>
                                                <div class="progress xs progress-striped active">
                                                    <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-light-blue">30%</span></td>
                                        </tr>
                                        <tr>
                                            <td>4.</td>
                                            <td>Fix and squish bugs</td>
                                            <td>
                                                <div class="progress xs progress-striped active">
                                                    <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-green">90%</span></td>
                                        </tr>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                                    </div><!-- /.tab-pane -->
                                    <div class="tab-pane active" id="tab_2">
                                        2
                                    </div><!-- /.tab-pane -->
                                    <div class="tab-pane active" id="tab_3">
                                        3
                                    </div><!-- /.tab-pane -->
                                
                                <div class="tab-pane active" id="tab_4">
                                        4
                                    </div><!-- /.tab-pane -->
                                
                                <div class="tab-pane active" id="tab_5">
                                       5
                                    </div><!-- /.tab-pane -->
                                
                                </div><!-- /.tab-content -->
                            </div>
    </div>
</div>

 <div>
 <ul>
    <a href="coursefac.php"> <li> Course Faculty Allotment</li></a>
    <a href="coursestud.php"> <li> Course Student Registration</li></a>
    <a href="courseta.php"> <li> Course TA Allotment</li></a>
    <a href="studta.php"> <li> Student TA Allotment</li></a>
    <a href="thesis.php"> <li> BTP/MTP Allotment</li></a>
 </ul>
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

        
<?php

include 'footer.php';

?>