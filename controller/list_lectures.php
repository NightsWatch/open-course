<?php

include_once '../models/courses.php';

$crs = New courses();
$rows = $crs->getCourseLectures($courseid);

while($row = mysql_fetch_array($rows))
    {
    	echo '<tr>
        		<td>'.$row['lectureno'].'</td>
        		<td>'.$row['lecturename'].'</td>
        		<td><a href="'.$row['filepath'].'">Download</a></td>
        		</tr>
        		';


    }



?>