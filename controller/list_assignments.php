<?php

include_once '../models/courses.php';

$crs = New courses();
$rows = $crs->getCourseAssignments($courseid);

while($row = mysql_fetch_array($rows))
    {
    	echo '<tr>
        		<td>'.$row['assignno'].'</td>
        		<td><a href='.$row['filepath'].'>Download Assignment</a></td>
        		<td>'.$row['deadline'].'</td>
        		<td><a href="assignsubmission.php?aid='.$row['assignid'].'"">Submit Solution</a></td>
        		<td>'.$row['maxmarks'].'</td>
        		<td>'.$row['studmarks'].'</td>
        		</tr>
        		';


    }



?>