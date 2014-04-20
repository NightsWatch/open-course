<?php


include_once '../models/courses.php';

$crs = New courses();

$rows = $crs->getAllCourses();

while($row = mysql_fetch_array($rows))
    {
    	$cid = $row['courseid'];
    	//courseid, coursename, courseno, year
    	$coursedetails = $crs->getCourseDetails($cid);
    	//echo $coursedetails;
    	//echo $coursedetails['coursename'];
        echo '<tr class="clickableRow" href="../controller/courseregister.php?cid='.$cid.'" style="cursor:pointer">
        		<td>'.$coursedetails['courseno'].'</td>
        		<td>'.$coursedetails['coursename'].'</td>
        		<td>'.$coursedetails['year'].'</td>
        		<td>'.$coursedetails['department'].'</td>
        		</tr>

        		';


    }



?>