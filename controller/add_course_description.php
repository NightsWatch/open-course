<?php
include_once '../models/courses.php';
$courses = New courses();

$row = $courses->getCourseDetails($courseid);

echo '<div class="box box-success" style="position: relative;">
                <div class="box-header" style="cursor: move;">
                    <h3 class="box-title" style="text-align:center"><i class="fa fa-book"></i><a href=""> Course Description</a></h3>
                </div>
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
                    <div class="box-body" style="overflow: hidden; width: auto;">
                    <ul>
						<li>Course name: '.$row['coursename'].'</li>
                        <li>Course number: '.$row['courseno'].'</li>
                        <li>Year: '.$row['year'].'</li>
                        <li> Course Instructors:
                        <ul>';

                    $rows = $courses->getCourseInstructors($courseid);
                    while($row = mysql_fetch_array($rows))
                    {
                        echo '<li>'.$row['name'].'</li>';
                    }

                    echo '</ul>
                    </ul>
                    </div>
                </div>
            </div>';


?>