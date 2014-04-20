
<div class="wrapper row-offcanvas row-offcanvas-left">
<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas">                
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="img/avatar04.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <?php
                echo '<p>Hello, '.$_SESSION["username"].'</p>';
                ?>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
    
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li>
                <a href="index.php">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
             <li>
                <a href="inbox.php">
                    <i class="fa fa-envelope"></i> <span>Inbox</span>
                     <small class="badge pull-right bg-yellow">
                     <?php
                     include_once '../models/messages.php';
                     $msg = New messages();
                    echo $msg->getUnreadCount($msg->getUserid($_SESSION['username'])); 
                     ?></small>
                </a>
            </li>

            <?php 

            include_once '../models/user_details.php';
            include_once '../models/tareg.php';
            include_once '../models/courses.php';
            include_once '../models/faculty.php';

            $ud = New user_details();

              if($_SESSION['usertype']=="Student")
             {
                echo'
                <li>
                    <a href="notifications.php">
                        <i class="fa fa-bell"></i> <span>Notifications</span>
                    </a>
                </li>

                <li>
                    <a href="courses.php">
                        <i class="fa fa-book"></i> <span>Registered Courses</span>
                    </a>
                </li>
                <li>
                    <a href="allcourses.php">
                        <i class="fa fa-book"></i> <span>All Courses</span>
                    </a>
                </li>
                <li>
                    <a href="allotments.php">
                        <i class="fa fa-check-square"></i> <span>Allotments</span>
                    </a>
                </li>
               <li>
                    <a href="profile.php">
                        <i class="fa fa-user"></i> <span>Profile</span>
                       
                    </a>
                </li>
                ';
              }



              $ista=$ud->getIsta($_SESSION['id']);
              //echo $ista;
              if($ista)
              {
                  $crs = New courses();
                  echo '
                  <li class="treeview active">
                              <a href="#">
                                  <i class="fa fa-table"></i> <span>TA Duties</span>
                                  <i class="fa pull-right fa-angle-down"></i>
                              </a>
                              <ul class="treeview-menu" style="display: block;">
                                <li><a> Students Assignments of Course</a></li>
                              ';
                  $targ = New tareg();
                  $rows=$targ->getTaCourses($_SESSION['id']);

                  while($row=mysql_fetch_array($rows))
                  {
                    $cid=$row['courseid'];
                    echo '<li><a href="assignmentsfac.php?cid='.$cid.'"><i class="fa fa-check"></i> '.$crs->getCourseName($cid).','.$crs->getCourseYear($cid).' </a></li>';
                  }
                   echo '</ul></li>';
              }


             if($_SESSION['usertype']=="Faculty")
              {
                 $crs = New courses();
                 $facobj = New faculty();
                 $rows=$facobj->getCourses($_SESSION['id']);
                 echo '<li class="treeview active">
                              <a href="#">
                                  <i class="fa fa-table"></i> <span>Course Pages</span>
                                  <i class="fa pull-right fa-angle-down"></i>
                              </a>
                              <ul class="treeview-menu" style="display: block;">
                                <li><a><small> Course Pages of Teaching Courses</small></a></li>
                              ';


                 while($row=mysql_fetch_array($rows))
                 {
                  $cid=$row['courseid'];
                  echo '<li><a href="coursepage.php?cid='.$cid.'"><i class="fa fa-check"></i> 
                  '.$crs->getCourseName($cid).', '.$crs->getCourseYear($cid).' </a></li>';
                }
                echo '</ul></li>';


                echo '<li class="treeview active">
                              <a href="#">
                                  <i class="fa fa-table"></i> <span>Assignments Pages</span>
                                  <i class="fa pull-right fa-angle-down"></i>
                              </a>
                              <ul class="treeview-menu" style="display: block;">
                                <li><a><small> Assignments of Teaching Courses</small></a></li>
                              ';

                  $rows=$facobj->getCourses($_SESSION['id']);
                 while($row=mysql_fetch_array($rows))
                 {
                  $cid=$row['courseid'];
                  echo '<li><a href="assignmentsfac.php?cid='.$cid.'"><i class="fa fa-check"></i> 
                  '.$crs->getCourseName($cid).', '.$crs->getCourseYear($cid).' </a></li>';
                }
                echo '</ul></li>';





                echo'  <li>
                    <a href="courses.php">
                      <i class="fa fa-book"></i><span>All Courses</span>
                  </a>
                </li>';

                
              }


            ?>


                <li>
                    <a href="calendar.php">
                        <i class="fa fa-calendar"></i> <span>Calendar</span>
                        <small class="badge pull-right bg-red">3</small>
                    </a>
                </li>
        </ul>

    </section>
    <!-- /.sidebar -->
</aside>

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">         

