<?php

include_once '../models/courses.php';
include_once '../models/user_details.php';
$courses = New courses();
$ud = New user_details();

$allthreads = $courses->getCourseForumThreads($courseid);

while($thread = mysql_fetch_array($allthreads))
            {
                echo '
                <div class="box box-success" style="position: relative;">
                    <div class="box-header" style="cursor: move;">
                        <h3 class="box-title" style="text-align:center">
                            <a href="thread.php?tid='.$thread['threadid'].'">'.$thread['threadtitle'].'</a>
                        </h3>

                </div>
                <div class="box-footer">
                <h4><i class="fa fa-user"></i>  '.$ud->getUsername($thread['starterid']).'</h4>
                <h5 ><i class="fa fa-clock-o"></i>  '.date(" H:i , d M Y", strtotime($thread['timestamp'])).'</h5>
                </div>
            </div>';
}

?>
