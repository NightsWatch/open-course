<?php

include_once '../models/notifications.php';
include_once '../models/user_details.php';
include_once '../models/assignments.php';
include_once '../models/courses.php';
include_once '../models/threads.php';

$notif = New notifications();
$user = New user_details();
$assgns = New assignments();
$courses = New courses();
$threadsobject = New threads();

$userid=$user->getUserid($_SESSION["username"]);
$threads = $notif->getNotificationsThreads($userid);
$assignments = $notif->getNotificationsAssignments($userid);
$lectures = $notif->getNotificationsLectures($userid);




$counts = $notif->getUnreadCounts($userid);

echo '
    <div class="col-md-4">
    <ul class="timeline">
   <li class="time-label">
    <span class="bg-red">
        Threads  ( '.$counts['threadcount'].' )
    </span>
    </li>';
while($thread = mysql_fetch_array($threads))
{
	$hrdate = date("H:i, d M Y", strtotime($thread['timestamp']));
    $title = $threadsobject->getTitle($thread['threadid']);
    $starter = $user->getUsername($threadsobject->getStarter($thread['threadid']));
    //$firstpost = $threadsobject->getFirstPost($thread['threadid']);
    $courseid = $threadsobject->getCourseidfromthread($thread['threadid']);
    $coursedetails = $courses->getCourseDetails($courseid);
    //$firstpostusername = $user->getUsername($firstpost['userid']);
    echo '<li>
        <i class="fa fa-comments bg-yellow"></i>
        
        <div class="timeline-item">
            
            <h3 class="timeline-header"><a href="#">'.$coursedetails['coursename'].', '.$coursedetails['year'].'</a></h3>
            <div class="timeline-body">
            '.$starter.' started a thread about : <br/>'.$title.'<br/><br/>';

            echo '<span class="time pull-right" style="color: #999;float: right;"><i class="fa fa-clock-o"></i> '.$hrdate.'</span><br/>
            </div>
        </div>
    </li>
        ';
}
echo '<li><i class="fa fa-clock-o"></i></li></ul></div>';





?>