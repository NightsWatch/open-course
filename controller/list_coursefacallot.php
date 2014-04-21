<?php


include_once '../models/courses.php';
include_once '../models/faculty_details.php';
$crs = New courses();

$rows = $crs->getAllCourses();

while($row = mysql_fetch_array($rows))
    {
    	$cid = $row['courseid'];
    	//courseid, coursename, courseno, year
    	$coursedetails = $crs->getCourseDetails($cid);


    	//echo $coursedetails;
    	//echo $coursedetails['coursename'];
        $facrows = $crs->getCourseInstructors($cid);

        if(mysql_num_rows($facrows) != 0)
        {
        
            echo '<tr>
        		<td>'.$coursedetails['courseno'].'</td>
        		<td>'.$coursedetails['coursename'].'</td>
        		<td>'.$coursedetails['year'].'</td>
                <td>'.$coursedetails['credits'].'</td>
                <td>  ';

                    echo '<ul class="list-unstyled">';

                     while($fac =mysql_fetch_array($facrows))
                    {
                        echo '<li>'.$fac['name'].'</li>';
                    }
                    echo'</ul>';
                    echo '</td>';
                    $fd = New faculty_details();
                if($_SESSION['usertype']=="HOD" && ($fd->getDept($_SESSION['id'])== $coursedetails['department']))
                    echo'<td><a class="btn btn-large btn-danger" href="allotcoursefac.php?cid='.$cid.'" ><i class="fa fa-check"></i> Edit Allotment</a></td>';
        echo '</tr>';
        }

    }



?>