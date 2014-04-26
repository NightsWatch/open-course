<?php

require '../models/courses.php';
include_once '../models/faculty_details.php';

session_start();
if( isset($_POST['coursename']) && isset($_POST['courseno']) && isset($_POST['year']) && isset($_POST['credits']) && isset($_POST['slot']))
{

	$coursename = mysql_real_escape_string($_POST['coursename']);
	$year = mysql_real_escape_string($_POST['year']);
	$courseno = mysql_real_escape_string($_POST['courseno']);
	$credits = mysql_real_escape_string($_POST['credits']);
	$slot = mysql_real_escape_string($_POST['slot']);
	$fac=New faculty_details();

	$department = $fac->getDept($_SESSION['id']);
	$crs = New courses();

		if( ($crs->addCourse($courseno, $coursename, $department, $year, $credits,$slot) )==1 )
		{
			$inid = mysql_insert_id();
			
		 	header ('Location: ../views/allotcoursefac.php?cid='.$inid.'');
		}
			
		else
			header ('Location: ../views/newcourse.php?fail=1');



}

?>