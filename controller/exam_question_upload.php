<?php

include '../models/exams.php';

session_start();



if( isset($_POST['examtitle']) && isset($_POST['weightage']) && isset($_POST['maxmarks']) && isset($_GET['courseid']))
{

	$examtitle = mysql_real_escape_string($_POST['examtitle']);
	$weightage = mysql_real_escape_string($_POST['weightage']);
	$maxmarks = mysql_real_escape_string($_POST['maxmarks']);
	$courseid = mysql_real_escape_string($_GET['courseid']);


	$exms = New exams();
	echo 'calling';

	if( ($exms->uploadQuestions($examtitle, $courseid, $maxmarks, $weightage) )==1)
		//	echo 'yes';
			header('Location: ../views/exams_questions_fac.php?cid='.$courseid.'&success=1');
	else
		//echo 'no';
		header('Location: ../views/exams_questions_fac.php?cid='.$courseid.'&success=0');



}


	

?>

