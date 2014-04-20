<?php

include_once '../models/assignments.php';
include_once '../models/messages.php';
$msg = New messages();
$crs = New assignments();
$rows = $crs->getAssignmentSubmissions($assignid);



while($row = mysql_fetch_array($rows))
    {
        $studname  = $msg->getUsername($row['studid']);
    	echo '<tr class="clickableRow" href="grading.php?sid='.$row['subid'].'" style="cursor:pointer">
        		<td>'.$studname.'</td>
        		<td><a href='.$row['filepath'].'>Download Assignment</a></td>
        		<td>'.$row['stime'].'</td>
        		<td>'.$row['marks'].'</td>
        		</tr>
        		';


    }



?>