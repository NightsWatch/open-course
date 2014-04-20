<?php

session_start();


include 'header.php';
include_once '../models/courses.php';

$crs = New courses();

if(isset($_SESSION['status']))
{
    include 'sidebar.php';
}

$studid = $_GET['studid'];
$string = "../controller/allotthesis.php?studid=".$studid."&";


if(isset($_GET['add']))
{
    $string ="".$string."add=".$_GET['add']."";
}

if(isset($_GET['edit']))
{
    $string ="".$string."edit=".$_GET['edit']."";
}


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


                                    <form role="form" action=<?php echo $string;?> method="post">

                          
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Thesis Title</label>
                                            <input type="text" name="title" class="form-control" placeholder="Thesis Title">
                                        </div>

                                         <div class="form-group">
                                            <label>Field</label>
                                            <input type="text" name="field" class="form-control" placeholder="Field" >
                                        </div>
                                         <div class="form-group">
                                            <label>Year</label>
                                            <input type="text" name="year"  class="form-control" placeholder="Year">
                                        </div>
                                        <div class="form-group">
                                            <label>Credits</label>
                                            <input type="text" name="credits" class="form-control" placeholder="Credits" >
                                        </div>

                                    <button type="submit" class="btn bg-olive btn-block">Submit</button>


                            </form>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                          </div>
                        <div class="col-md-3">
                           <div class="callout callout-info">
                                        <p>Please fill all details.</p>
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

    </body>
</html>