<?php

session_start();


include 'header.php';
include_once '../models/allotthesis.php';

if(isset($_SESSION['status']))
{
    include 'sidebar.php';
}

$alt = New allotthesis();
$row = $alt->getTP($_SESSION['id']);

?>

<link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />


<section class="content-header">
<h1 style="text-align:center"><i class="fa fa-book"></i> Thesis Project Details</h1>
</section>
<br/>
 <section class="content">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="box box-info">
                                <div class="box-body">
                                <br/>
                                    <div class="alert alert-info alert-dismissable">
                                        <i class="fa fa-info"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Info!</b> Talk to a faculty to assign a thesis for you. If you later want to change your thesis details, you will have to discuss with the faculty.
                                    </div>

                       
                                    <form role="form" action="" method="post">
                                        <fieldset disabled>
                                
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Thesis Title</label>
                                            <input type="text" name="title" class="form-control" <?php echo 'value="'.$row['title'].'"';?> >
                                        </div>

                                         <div class="form-group">
                                            <label>Field</label>
                                            <input type="text" name="field" class="form-control" <?php echo 'value="'.$row['field'].'"';?> >
                                        </div>
                                         <div class="form-group">
                                            <label>Thesis advisor</label>
                                            <input type="year" name="year"  class="form-control" <?php echo 'value="'.$row['facultyname'].'"';?>>
                                        </div>
                                        
                                        </fieldset>
                                    

                            </form>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                          </div>
                        <div class="col-md-6">
                          
                  

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