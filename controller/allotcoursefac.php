<?php

require '../models/courses.php';

session_start();

$cid = $_GET['cid'];
$remove=$_GET['remove'];
$userid=$_GET['userid'];
$crs=New Courses();

	if($remove==1)
		{
			if($crs->removeCourseInstructor($cid,$userid))
				header ('Location: ../views/allotcoursefac.php?cid='.$cid.'');
		}
	else
		{if( $crs->addCourseInstructor($cid, $userid))
			header ('Location: ../views/allotcoursefac.php?cid='.$cid.'');
			}


		//  	header ('Location: ../views/allotcoursefac.php?cid='.$inid.'');
		// }
			
		// else
		// 	header ('Location: ../views/newcourse.php?fail=1');





?>