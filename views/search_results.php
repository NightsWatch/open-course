<?php

session_start();


include_once 'header.php';
include_once '../models/courses.php';
include_once '../models/user_details.php';

if(isset($_SESSION['status']) )
{
    include 'sidebar.php';
}

$user = New user_details();

?>

<section class="content-header">
  <h1 style="text-align:center"><i class="fa fa-edit"></i> Search Results</h1>
</section>


<section class="content-header">
  <h1 style="text-align:center"><?php echo $category; ?></h1>
</section>

 <section class="content" >

  <?php 
  while($row = mysql_fetch_array($result) )
  {
    if($category=="Users")
    { 
      ?>
    
      <div class="col-md-4">
       <div class="box box-success" style="position: relative;">
            <div class="box-header" style="cursor: move;">
                <h3 class="box-title" style="text-align:center">
        <?php echo '<a>'.$row["username"].'</a></h3>
            </div>'; ?>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
            <div class="box-body" style="overflow: hidden; width: auto;">
              <ul>
                <li>Email: <?php echo $row['email_id']; ?>
                </li>
                <li>Usertype: <?php echo $row['usertype']; ?> </li>
              </ul>
            </div>
        </div>
        </div>
    
      </div>

  <?php }

  if($category=="Students")
    { ?>
    
    <div class="col-md-4">
     <div class="box box-success" style="position: relative;">
            <div class="box-header" style="cursor: move;">
                <h3 class="box-title" style="text-align:center">
                <?php echo '<a href="thread.php?user='.$row["userid"].'">'.$row["name"].'</a></h3>
            </div>';
            ?>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
            <div class="box-body" style="overflow: hidden; width: auto;">
              <ul>
                <li>Username: <?php echo $user->getUsername($row["userid"])?></li>
                <li>Program: <?php echo $row['program']; ?></li>
               <li>Batch: <?php echo $row['batch']; ?></li>
               <li>Department: <?php echo $row['department']; ?> </li>
               <li>Roll Noumber: <?php echo $row['roll']; ?></li>
              </ul>
            </div>
        </div>
        </div>
    
  </div>


<?php }

if($category=="Faculty")
    { ?>
    
    <div class="col-md-4">
     <div class="box box-success" style="position: relative;">
            <div class="box-header" style="cursor: move;">
                <h3 class="box-title" style="text-align:center">
                <?php echo '<a href="inbox.php?user='.$user->getUsername($row["userid"]).'">'.$row["name"].'</a></h3>
            </div>';
            ?>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
            <div class="box-body" style="overflow: hidden; width: auto;">
              <ul>
                <li>Username: <?php echo $user->getUsername($row["userid"])?></li>
                <li>Department: <?php echo $row['department']; ?> </li>
                <li>Designation: <?php echo $row['designation']; ?></li>
              </ul>
            </div>
        </div>
        </div>
    
  </div>


<?php } 


if($category=="Courses")
    { ?>
    
    <div class="col-md-4">
     <div class="box box-success" style="position: relative;">
            <div class="box-header" style="cursor: move;">
                <h3 class="box-title" style="text-align:center">
                <?php echo '<a href="coursepage.php?cid='.$row["courseid"].'">'.$row["coursename"].'</a></h3>
            </div>';
            ?>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
            <div class="box-body" style="overflow: hidden; width: auto;">
              <ul>
                <li>Course No: <?php echo $row['courseno']; ?></li>
               <li>Department: <?php echo $row['courseid']; ?> </li>
              <li>Year: <?php echo $row['year'] ?> </li>
              </ul>
            </div>
        </div>
        </div>
    
  </div>


<?php } 



if($category=="Assignments")
    { ?>
    
    <div class="col-md-4">
     <div class="box box-success" style="position: relative;">
            <div class="box-header" style="cursor: move;">
                <h3 class="box-title" style="text-align:center">
                <?php echo '<a href="assignments.php?cid='.$row["courseid"].'">'.$row["assign_name"].'</a></h3>
            </div>';
            ?>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
            <div class="box-body" style="overflow: hidden; width: auto;">
              <ul>

                <li>Assignment No: <?php echo $row['assignno']; ?></li>
               <li>Course: 
               <?php 
                  $course= New courses();
                  echo $course->getCourseName($row['courseid']);

               ?></li>  <!--  NEED to get coursename from id -->
               <li>Deadline: <?php echo $row['deadline']; ?> </li>
               <li>Max-marks: <?php echo $row['maxmarks']; ?></li>
              </ul>
            </div>
        </div>
        </div>
    
  </div>


<?php } 


if($category=="Lectures")
    { ?>
    
    <div class="col-md-4">
     <div class="box box-success" style="position: relative;">
            <div class="box-header" style="cursor: move;">
                <h3 class="box-title" style="text-align:center">
                <?php echo '<a href="lectures.php?cid='.$row["courseid"].'">'.$row["lecturename"].'</a></h3>
            </div>';
            ?>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
            <div class="box-body" style="overflow: hidden; width: auto;">
              <ul>
                <li>Lecture No: <?php echo $row['lectureno']; ?></li>
               <li>Course: 
               <?php $course= New courses();
                  echo $course->getCourseName($row['courseid']);
               ?>
               </li>
              
              </ul>
            </div>
        </div>
        </div>
    
  </div>


<?php } 




} ?>


 </section>

<?php

include 'footer.php';

?>