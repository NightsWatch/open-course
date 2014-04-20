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
        echo '<tr>
        		<td>'.$coursedetails['courseno'].'</td>
        		<td>'.$coursedetails['coursename'].'</td>
        		<td>'.$coursedetails['year'].'</td>
                <td>'.$coursedetails['credits'].'</td>
                <td>


                    ';

                    $facrows = $crs->getCourseInstructors($cid);
                    if(mysql_num_rows($facrows) != 0)
                    {
                        echo '<ul class="list-unstyled">';

                         while($fac =mysql_fetch_array($facrows))
                    {
                        echo '<li>'.$fac['name'].'</li>';
                    }
                    echo'</ul>';
                }
                echo '</td>
                ';

        echo '</tr>';

    }



?>