<?php


include_once '../models/courses.php';
include_once '../models/coursereg.php';
$crs = New courses();
$check = New coursereg();

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
                <td>'.$coursedetails['credits'].'</td>
                ';
        $checked = $check->checkstudreg($_SESSION['id'], $cid);
        if($checked==1)
        {
            echo '<td><a href="../controller/courseregister.php?cid='.$cid.'"><button class="btn btn-warning">Registered<br/><small>Click to unregister</small></button></a></td>';
        }
        elseif ($checked==0) {
            echo '<td><a href="../controller/courseregister.php?cid='.$cid.'"><button class="btn btn-success">Register<br/><small>Click to register</small></button></a></td>';
            
        }

        echo '</tr>';

    }



?>