<?php

session_start();


include 'header.php';
include_once '../models/courses.php';
include_once '../models/faculty_details.php';
include_once '../models/faculty.php';

$crs = New courses();

if(isset($_SESSION['status']))
{
    include 'sidebar.php';
}

$cid= $_GET['cid'];


?>

<link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />


<section class="content-header">
<h1 style="text-align:center"><i class="fa fa-book"></i> Allot Instructors for <?php echo $crs->getCourseName($cid).', '.$crs->getCourseYear($cid);?></h1>
</section>
<br/>
 <section class="content">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="box box-info">
                                <div class="box-body">



                                <table id="example1" class="table table-bordered table-striped">
                                <thead>   
                                <tr>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Joined</th>
                                </tr>
                                </thead>
                                <tbody>`

                                   <?php 

                                            $fd= New faculty_details();
                                            $facs = $fd->getAllFacDetails($fd->getDept($_SESSION['id']));

                                            while ($fac = mysql_fetch_array($facs))
                                                { 
                                                   
                                                    echo '<tr>
                                                            <td>'.$fac['name'].'</td>
                                                            <td>'.$fac['designation'].'</td>
                                                            <td>'.$fac['joined'].'</td>
                                                            <td>';

                                                    if($fd->isTeachingCourse($fac['userid'],$cid))
                                                            echo '<a class="btn btn-large btn-danger" href="../controller/allotcoursefac.php?cid='.$cid.'&userid='.$fac['userid'].'&remove=1" ><i class="fa fa-group"></i> Allotted <small>Click to remove</small></a></td>';
                                                        else
                                                            echo '<a class="btn btn-large btn-primary" href="../controller/allotcoursefac.php?cid='.$cid.'&userid='.$fac['userid'].'&remove=0"><i class="fa fa-group"></i> Allot Instructor </a></td></tr>'; 
                                                } 

                                                ?>
                                             
                                           </tbody>
                                            
                                </table>

<?php /*
                                    <?php echo '<form role="form" action="../controller/allotcoursefac.php?cid='.$cid.'" method="post">'; ?>
                                        <div class="form-group"> 
                                            
                                          
                                            <?php
                                                $fd = New faculty_details();
                                                $facs = $fd->getAllFac($fd->getDept($_SESSION['id']));

                                                while ($fac = mysql_fetch_array($facs))
                                                {   

                                                    echo '<div><input type="checkbox" name="facs[]" value="'.$fac['userid'].'" checked>
                                                    <label>'.$fac['name'].'
                                                        </label>      </div>                                          
                                                    ';


//                                                   echo ' <input type="checkbox" id="newsletter" name="newsletter" value="Yes" checked>
  //                                                  <label for="newsletter">i want to sign up for newsletter</label>';
                                                }
                                            ?>
                                      </div> 
                                    <button type="submit" class="btn bg-olive btn-block">Submit</button>


                            </form> */?>

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