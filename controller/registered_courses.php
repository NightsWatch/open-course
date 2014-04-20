<?php


include_once '../models/user_details.php';
include_once '../models/courses.php';

$udet = New user_details();
$crs = New courses();

$userid=$udet->getUserid($_SESSION["username"]);

$rows = $udet->getCoursesReg($userid);

while($row = mysql_fetch_array($rows))
    {
    	$cid = $row['courseid'];
    	//courseid, coursename, courseno, year
    	$coursedetails = $crs->getCourseDetails($cid);
    	//echo $coursedetails;
    	//echo $coursedetails['coursename'];
        echo '<tr class="clickableRow" href="coursepage.php?cid='.$cid.'" style="cursor:pointer">
        		
        		<td>'.$coursedetails['courseno'].'</td>
        		<td>'.$coursedetails['coursename'].'</td>
        		<td>'.$coursedetails['year'].'</td>
        		<td>'.$coursedetails['department'].'</td>
        		</tr>

        		';


    }



?>