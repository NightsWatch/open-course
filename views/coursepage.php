<?php

session_start();


include 'header.php';

if(isset($_SESSION['status']))
{
    include 'sidebar.php';
}
?>

<section class="content-header">
<h1 style="text-align:center"><i class="fa fa-edit"></i> Course Page</h1>
</section>
<br/>
 <section class="content">
 <div class="row">
 	<div class="col-md-6">
 		 <div class="box box-success" style="position: relative;">
            <div class="box-header" style="cursor: move;">
                <h3 class="box-title" style="text-align:center"><a href="thread.php">Details</a></h3>
            </div>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
            <div class="box-body" style="overflow: hidden; width: auto;">
              <ul>
              <li>Course name</li>
              <li>Instructor</li>
              <li>Course no.</li>
              <li>Year</li>
              <li>Number of students registered</li>
              </ul>
            </div>
        </div>
        </div>
 		
 	</div>

 	<div class="col-md-6">
 		 <a href="coursestud.php"><button class="btn bg-olive btn-block">List of students taking the course</button>	</a><br/>
 		 <a href="courseta.php"><button class="btn bg-olive btn-block">List of TAs for the course</button>	</a><br/>
 		 <a href="tastudents.php"><button class="btn bg-olive btn-block">TA-Student Allotment for the course</button>	</a><br/>
 	</div>
 	</div>
 	<div class="row">
 	<div class="col-md-4">
 		 <div class="box box-success" style="position: relative;">
            <div class="box-header" style="cursor: move;">
                <h3 class="box-title" style="text-align:center"><a href="forum.php">Course Forum</a></h3>
            </div>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 50px;">
            <div class="box-body" style="overflow: hidden; width: auto; height: 250px;">
             Discuss and learn!
            </div>
        </div>
        </div>
 	</div>
 	<div class="col-md-4">
 		 <div class="box box-success" style="position: relative;">
            <div class="box-header" style="cursor: move;">
                <h3 class="box-title" style="text-align:center"><a href="lectures.php">Lectures</a></h3>
            </div>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 50px;">
            <div class="box-body" style="overflow: hidden; width: auto; height: 250px;">
              All class lecture slides and other resources
            </div>
        </div>
        </div>
 	</div>
 	<div class="col-md-4">
 		<div class="box box-success" style="position: relative;">
            <div class="box-header" style="cursor: move;">
                <h3 class="box-title" style="text-align:center"><a href="assignments.php">Assignments</a></h3>
            </div>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 50px;">
            <div class="box-body" style="overflow: hidden; width: auto; height: 250px;">
              Go here to view or submit assignments.
            </div>
        </div>
        </div>
 	</div>
 </div>

<?php
include 'footer.php';
?>
