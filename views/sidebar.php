<script src="js/AdminLTE/app.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
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
                    <a href="thesisstud.php">
                        <i class="fa fa-archive "></i> <span>Thesis</span>
                    </a>
                </li>
                

               
                ';
              }


              //echo $_SESSION['id'];
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
                                <li><a> Assignments of Course</a></li>
                              ';
                  $targ = New tareg();
                  $rows=$targ->getTaCourses($_SESSION['id']);

                  while($row=mysql_fetch_array($rows))
                  {
                    $cid=$row['courseid'];
                    echo '<li><a href="assignmentsfac.php?cid='.$cid.'"><i class="fa fa-angle-double-right"></i> '.$crs->getCourseName($cid).', '.$crs->getCourseYear($cid).' </a></li>';
                  }
                   echo '</ul></li>';
              }

              if($_SESSION['usertype']=="Student" )
              {

                echo'  <li>
                    <a href="allcourses.php">
                      <i class="fa fa-book"></i><span>All Courses</span>
                  </a>
                 </li>';

              }

              //<small style="color:#777"><br/> of Courses you are teaching</small>
             if($_SESSION['usertype']=="Faculty" || $_SESSION['usertype']=="HOD" )
              {
                 $crs = New courses();
                 $facobj = New faculty();
                 $rows=$facobj->getCourses($_SESSION['id']);
                 echo '<li class="treeview active">
                              <a href="#">
                                  <i class="fa fa-book"></i> <span>Course Pages</span>
                                  <i class="fa pull-right fa-angle-down"></i>
                                  
                              </a>
                              <ul class="treeview-menu" style="display: block;">
                              ';

                        if(mysql_num_rows($rows)<0)
                        {
                          echo '<ul class="treeview-menu" style="display: block;">
                          <li><a href="coursepage.php><i class="fa fa-angle-double-right"></i>No courses found</a>';
                        }
                       while($row=mysql_fetch_array($rows))
                       {
                        $cid=$row['courseid'];
                        echo '<li><a href="coursepage.php?cid='.$cid.'"><i class="fa fa-angle-double-right"></i> 
                        '.$crs->getCourseName($cid).', '.$crs->getCourseYear($cid).' </a></li>';
                      }

                      echo '</ul></li>';


                      echo '<li class="treeview active">
                                    <a href="#">
                                        <i class="fa fa-edit"></i> <span>Assignments Pages</span>
                                        <i class="fa pull-right fa-angle-down"></i>
                                       
                                    </a>
                                    <ul class="treeview-menu" style="display: block;">
                                    ';

                        $rows=$facobj->getCourses($_SESSION['id']);
                       while($row=mysql_fetch_array($rows))
                       {
                        $cid=$row['courseid'];
                        echo '<li><a href="assignmentsfac.php?cid='.$cid.'"><i class="fa fa-angle-double-right"></i> 
                        '.$crs->getCourseName($cid).', '.$crs->getCourseYear($cid).' </a></li>';
                      }
                      
                      echo '</ul></li>';



                      echo '<li class="treeview active">
                                    <a href="#">
                                        <i class="fa fa-edit"></i> <span>Exams Pages</span>
                                        <i class="fa pull-right fa-angle-down"></i>
                                       
                                    </a>
                                    <ul class="treeview-menu" style="display: block;">
                                    ';

                        $rows=$facobj->getCourses($_SESSION['id']);
                       while($row=mysql_fetch_array($rows))
                       {
                        $cid=$row['courseid'];
                        echo '<li><a href="exams_questions_fac.php?cid='.$cid.'"><i class="fa fa-angle-double-right"></i> 
                        '.$crs->getCourseName($cid).', '.$crs->getCourseYear($cid).' </a></li>';
                      }
                      
                      echo '</ul></li>';


                      echo '<li class="treeview active">
                                    <a href="#">
                                        <i class="fa fa-folder-o"></i> <span>Lectures Pages</span>
                                        <i class="fa pull-right fa-angle-down"></i>
                                        
                                    </a>
                                    <ul class="treeview-menu" style="display: block;">
                                    ';

                        $rows=$facobj->getCourses($_SESSION['id']);
                       while($row=mysql_fetch_array($rows))
                       {
                        $cid=$row['courseid'];
                        echo '<li><a href="lecturesfac.php?cid='.$cid.'"><i class="fa fa-angle-double-right"></i> 
                        '.$crs->getCourseName($cid).', '.$crs->getCourseYear($cid).' </a></li>';
                      }
                      
                      echo '</ul></li>';

                       echo'  <li>
                    <a href="thesis.php">
                      <i class="fa fa-book"></i><span> Take Thesis Students</span>
                  </a>
                 </li>';
                 echo '
              <li>
                    <a href="profile.php">
                        <i class="fa fa-user"></i> <span>Profile</span>
                       
                    </a>
                </li>   
                ';

              }

               if($_SESSION['usertype']=="HOD")
              {
                echo '
                  <li class="treeview active">
                              <a href="#">
                                  <i class="fa fa-table"></i> <span>HOD Duties</span>
                                  <i class="fa pull-right fa-angle-down"></i>
                              </a>
                              <ul class="treeview-menu" style="display: block;">
                                 <li>
                                  <a href="newcourse.php">
                                  <i class="fa fa-angle-double-right"></i><span>Create New Course</span>
                                  </a>
                                </li>


                                <li>
                                <a href="coursefacallotments.php">
                                <i class="fa fa-angle-double-right"></i><span> Faculty Course Allotments</span>
                                </a>
                                </li>
                               
                                </ul>
                                ';
                                                  
                              }


              if($_SESSION['usertype']=="admin")
              {
                echo '<li>
                    <a href="admin.php">
                    <i class="fa fa-user"></i><span>Admin Page</span></a>

                </li>

                 <li>
                                <a href="credits.php">
                                <i class="fa fa-angle-double-right"></i><span> Maximum credits </span>
                                </a>
                                </li>


                ';
              }

                
                


            ?>


                <!-- <li>
                    <a href="calendar.php">
                        <i class="fa fa-calendar"></i> <span>Calendar</span>
                        <small class="badge pull-right bg-red">3</small>
                    </a>
                </li> -->
        </ul>

    </section>
    <!-- /.sidebar -->
</aside>

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">         

