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
<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />


<section class="content-header">
<h1 style="text-align:center"><i class="fa fa-check "></i> Set Credits</h1>
</section>
<br/>
 <section class="content">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="box box-info">
                                <div class="box-body">
                                <?php 


                                if(isset($_GET['done']))
                                {
                                  if($_GET['done']==1)
                                      {
                                       echo ' <div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <p>Changed Credits</p>
                                    </div>';
                                      }

                                      if($_GET['done']==0)
                                      {
                                       echo ' <div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <p>Failed to change</p>
                                    </div>';
                                      }
                                    }
                                     ?>

                                    <form role="form" action="../controller/credits.php" method="post">

                          
                                       
                                         <div class="form-group">
                                            <label>Program</label>

                                        <select class="form-control" name="prog">
                                              <option value="B.Tech">B.Tech</option>
                                              <option value="M.Tech">M.Tech</option>
                                              <option value="B.Des">B.Des</option>
                                              <option value="M.Des">M.Des</option>
                                              <option value="PhD">PhD</option>
                                        </select>
                                            
                                        </div>


                                         <div class="form-group">
                                            <label>Credits</label>
                                            <input type="text" name="credits" class="form-control" placeholder="Credits" required >
                                        </div>
                                    <button type="submit" class="btn bg-olive btn-block">Submit</button>
                                


                            </form>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
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

    </body>
</html>