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
<h1 style="text-align:center"><i class="fa fa-book"></i> Create a Course</h1>
</section>
<br/>
 <section class="content">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-1">
                            <div class="box box-info">
                                <div class="box-body">


                                    <form role="form" action="../controller/newcourse.php" method="post">

                          
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Course Name</label>
                                            <input type="text" name="coursename" class="form-control" placeholder="Course Name">
                                        </div>

                                         <div class="form-group">
                                            <label>Course number</label>
                                            <input type="text" name="courseno" class="form-control" placeholder="Course number" >
                                        </div>
                                        <fieldset disabled>
                                        <div class="form-group">
                                            <label>Department</label>
                                            <?php
                                            include '../models/faculty_details.php';
                                            $fac = New faculty_details();

                                            echo '<input type="text" name="department" class="form-control" placeholder="'.$fac->getDept($_SESSION['id']).'" >';

                                            ?>
                                        </div>
                                        </fieldset>
                                         <div class="form-group">
                                            <label>Year</label>
                                            <input type="text" name="year"  class="form-control" placeholder="Year">
                                        </div>
                                        <div class="form-group">
                                            <label>Credits</label>
                                            <input type="text" name="credits" class="form-control" placeholder="Credits" >
                                        </div>

                                        <div class="form-group">
                                            <label>Time Slot</label>

                                        <select class="form-control" name="slot">
                                              <option value="A">A</option>
                                              <option value="B">B</option>
                                              <option value="C">C</option>
                                              <option value="D">D</option>
                                              <option value="E">E</option>
                                              <option value="F">F</option>
                                              <option value="G">G</option>
                                              <option value="A1">A1</option>
                                              <option value="B1">B1</option>
                                              <option value="C1">C1</option>
                                              <option value="D1">D1</option>
                                              <option value="E1">E1</option>
                                        </select>
                                            
                                        </div>

                                        
                                        <div class="callout callout-info">
                                        <p>You can allot instructors after you click submit</p>
                                       </div>
                                       
                                       <div class="callout callout-warning">
                                        <p>Please fill all details.</p>
                                    </div> 
                                    <button type="submit" class="btn bg-olive btn-block">Submit</button>


                            </form>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                          </div>
                        <div class="col-md-4">
                           <div class="box box-warning">
                               <div class="box-header" style="cursor: move;">
                                <h3 class="box-title" style="text-align:center"><i class="fa fa-calendar"></i>
                                <a href="forum.php?cid=17">Time Slot Status</a></h3>
                                </div>
                               <div class="box-body text-center">
                                    <?php
                                        $rows=$crs->getSlots();
                                        $total=0;

                                        $allslots=array();
                                        $slots = array();
                                        $allslots[]='A';
                                        $allslots[]='B';
                                        $allslots[]='C';
                                        $allslots[]='D';
                                        $allslots[]='E';
                                        $allslots[]='F';
                                        $allslots[]='G';
                                        $allslots[]='A1';
                                        $allslots[]='B1';
                                        $allslots[]='C1';
                                        $allslots[]='D1';
                                        $allslots[]='E1';
                                        
                                        while($row = mysql_fetch_array($rows))
                                        {
                                            $total  = $total+$row['count'];
                                         $slots[]=$row['slot'];
                                        }
                                        
                                        $rows=$crs->getSlots();
                                        while($row = mysql_fetch_array($rows))
                                        {
                                        
                                            //echo $row['slot'],$row['count'];
                                            $percent = ($row['count']/$total)*100;
                                           // echo $percent;
                                           echo '
                                    <div class="progress vertical">
                                        <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="'.$row['count'].'" aria-valuemin="0" aria-valuemax="'.$total.'" style="height:'.$percent.'%">
                                           <span>'.$row['count'].'</span> <br/><span>'.$percent.'%</span><br/><span>'.$row['slot'].'</span>
                                        </div>
                                    </div>
                                ';
                                        }

                                        foreach ($allslots as &$value) {
                                            if(!in_array($value,$slots))
                                            {
                                                 echo '
                                    <div class="progress vertical">
                                        <div class="progress-bar progress-bar-green sm" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="'.$total.'" style="height: 0%">
                                            <span>0%</span>
                                        </div>
                                    </div>
                                ';
                                            }
                                        }

                                    ?>
                               </div>

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