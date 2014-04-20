<?php
include_once '../models/courses.php';
include_once '../models/assignments.php';
$assgn = New assignments();
$courses = New courses();
$row = $assgn->getAssignmentDetails($assignid);

echo '<div class="box box-success" style="position: relative;">
                <div class="box-header" style="cursor: move;">
                    <h3 class="box-title" style="text-alig:center"><a href="">Assignment Description</a></h3>
                </div>
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
                    <div class="box-body" style="overflow: hidden; width: auto;">
                    <ul>
						<li>Assignment no: '.$row['assignno'].'</li>
                        <li>Deadline:  '.$row['deadline'].'</li>
                        <li>Max marks: '.$row['maxmarks'].'</li>
                        <hr>';

            $row2 = $courses->getCourseDetails($row['courseid']);
            
            
            echo '<li>Course No.: '.$row2['courseno'].'</li>
                  <li>Course Name: '.$row2['coursename'].'</li>
                  <li>Year: '.$row2['year'].'</li>
                    ';
            
                 echo '</ul>
                    </ul>
                    </div>
                </div>
            </div>';


?>