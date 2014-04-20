<?php

include '../models/lectures.php';

session_start();



if( isset($_POST['num']) && isset($_POST['title']) && isset($_GET['courseid']))
{
	$lecnum = mysql_real_escape_string($_POST['num']);
	$lecname = mysql_real_escape_string($_POST['title']);
	$courseid = mysql_real_escape_string($_GET['courseid']);



	$lectures = New lectures();

	if( ($lectures->uploadLecture($lecnum, $lecname, $courseid) )==1)
			header("Location: ../views/lecturesfac.php?cid=".$courseid."&success=1");
	else
		header("Location: ../views/lecturesfac.php?success=0&cid=".$courseid);



}

?>