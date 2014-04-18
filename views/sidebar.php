
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
                     <small class="badge pull-right bg-yellow">12</small>
                </a>
            </li>
            <li class="treeview active">
                            <a href="courses.php">
                                <i class="fa fa-book"></i> <span>Courses</span>
                                <i class="fa pull-right fa-angle-down"></i>
                            </a>
                            <ul class="treeview-menu" style="display: block;">
                                <li><a href="coursepage.php" style="margin-left: 10px;"><i class="fa fa-book"></i> Course Page</a></li>
                                <li><a href="assignments.php" style="margin-left: 10px;"><i class="fa fa-folder-o"></i> Assignments Page</a></li>
                                <li><a href="assignsubmission.php" style="margin-left: 10px;"><i class="fa fa-cloud-upload"></i> Assignments Submission</a></li>
                                <li><a href="lectures.php" style="margin-left: 10px;"><i class="fa fa-edit"></i> Lectures Page</a></li>
                                <li><a href="forum.php" style="margin-left: 10px;"><i class="fa fa-bullhorn"></i> Course Forum</a></li>                            </ul>
                        </li>
             <li>
                <a href="notifications.php">
                    <i class="fa fa-bell"></i> <span>Notifications</span>
                </a>
            </li>
            <li>
                <a href="allotments.php">
                    <i class="fa fa-check-square"></i> <span>Allotments</span>
                </a>
            </li>
            <li>
                <a href="calendar.php">
                    <i class="fa fa-calendar"></i> <span>Calendar</span>
                    <small class="badge pull-right bg-red">3</small>
                </a>
            </li>
           <li>
                <a href="profile.php">
                    <i class="fa fa-user"></i> <span>Profile</span>
                   
                </a>
            </li>

            Temporary
          <li>
               <a href="lecturesfac.php">
                   <i class="fa fa-user"></i> <span>Lecture Fac</span>
                  
               </a>
           </li>
          
          <li>
               <a href="assignmentsfac.php">
                   <i class="fa fa-check-square"></i> <span>Assgn Fac</span>
                  
               </a>
           </li>
           
           <li>
               <a href="assignsubmissionfac.php">
                   <i class="fa fa-user"></i> <span>Assignment submission page for TA or Fac</span>
                  
               </a>
           </li>
           <li>
               <a href="grading.php">
                   <i class="fa fa-user"></i> <span>Assignment grading page for TA or Fac</span>
                  
               </a>
           </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">         

