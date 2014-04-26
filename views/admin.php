<?
session_start();	
include_once 'header.php';
include_once 'sidebar.php';

?>

<link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
<link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
<section class="content-header">
<h2 style="text-align:center"><i class="fa fa-magic"></i> Admin Page for approving HODs</h2>
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
                                            <th>UserName</th>
                                                <th>Name</th>
                                                <th>Department</th>
                                                <th>Status</th>
                                             
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                            


include_once '../models/faculty.php';
include_once '../models/faculty_details.php';

$query= "select * from faculty as f, users as u where f.userid=u.userid and u.usertype='HOD'	;";
//echo $query;
$rows = mysql_query($query);

while($row = mysql_fetch_array($rows))
    {
    	
            echo '<tr>
        		<td>'.$row['username'].'</td>
        		<td>'.$row['name'].'</td>
        		<td>'.$row['department'].'</td>
                <td> ';
                if($row['approved']=="no")
                	echo '<a class="btn btn-large" href="../controller/approve.php?bool=1&uid='.$row['userid'].'">Approve</a>';
                else
                	echo '<a class="btn"  href="../controller/approve.php?bool=0&uid='.$row['userid'].'">Reject</a>';
                   	
        echo '</tr>';
        }

  
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


</div>

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

<? include_once 'footer.php';
?>