<?php

session_start();
if(!isset($_SESSION['id']) || $_SESSION['usertype']=='Student')
header('Location: ../views/505.php');
include_once 'header.php';
include_once '../models/user_details.php';
include_once '../models/allotthesis.php';




if(isset($_SESSION['status']))
  {
      include 'sidebar.php';
  }

//$courseid=$_GET['cid'];

?>

<section class="content-header">
<h1 style="text-align:center"><i class="fa fa-edit"></i> Take Students For Thesis Projects</h1>
</section>
<br/>
 <section class="content">
 <div class="row">
 	</div>

 	<div class="col-md-12">
  <div class="box box-info">

  <div class="box-body table-responsive">
    <table id="example1" class="table table-bordered table-striped">
    <thead>   
    <tr>
        <th>Name</th>
        <th>Program</th>
        <th>Batch</th>
        <th>Roll no</th>
        <th>Department</th>
        <th></th>
    </tr>
</thead>
<tbody>`

       <?php 

                $user= New user_details();
                $students=$user->getAllStudentsDept($user->getFacDepartment($_SESSION['id']));

                while($row = mysql_fetch_array($students))
                    {
                       
                        echo '<tr>
                                <td>'.$row['name'].'</td>
                                <td>'.$row['program'].'</td>
                                <td>'.$row['batch'].'</td>
                                <td>'.$row['roll'].'</td>
                                 <td>'.$row['department'].'</td>

                                <td>';
                        $allot= New allotthesis();


                        if($_SESSION['id']==($allot->checkInsert($row['userid'])))
                                echo '<a class="btn btn-large btn-danger" href="thesisdetails.php?edit=1&studid='.$row['userid'].'"><i class="fa fa-group"></i> Edit Project Details</a>
                                <a class="btn btn-large btn-danger" href="../controller/allotthesis.php?remove=1&studid='.$row['userid'].'""><i class="fa fa-group"></i> Remove</a>
                            </td>';
                            else if(($allot->checkInsert($row['userid']))==0)
                                echo '<a class="btn btn-large btn-primary" href="thesisdetails.php?add=1&studid='.$row['userid'].'"><i class="fa fa-group"></i> Add</a></td></tr>'; 
                            else
                                echo '<a class="btn btn-large btn-warning" href=""><i class="fa fa-group"></i> Taken</a></td></tr>'; 
                    } 

                    ?>
                 
               </tbody>
                
 	</table>
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