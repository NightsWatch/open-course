<?php

include_once '../models/courses.php';

$courses = New courses();

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
                <!--<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 50px;">
                    <div class="box-body" style="overflow: hidden; width: auto; height: 250px;">
                    Post by:
                    Post content
                    Time
                    </div>
                </div>-->
            </div>';
}

?>
