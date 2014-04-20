<?php

include '../models/assgn.php';

session_start();



if( isset($_POST['assignno']) && isset($_POST['assnname']) && isset($_POST['time']) && isset($_POST['date']) && isset($_POST['maxmarks']) && isset($_GET['courseid']))
{

	$assn = mysql_real_escape_string($_POST['assignno']);
	$time = mysql_real_escape_string($_POST['time']);
	$date = mysql_real_escape_string($_POST['date']);
	$maxmarks = mysql_real_escape_string($_POST['maxmarks']);
	$courseid = mysql_real_escape_string($_GET['courseid']);
	$assnname = mysql_real_escape_string($_POST['assnname']);

	//::createFromFormat 'd/m/Y',
	$dateobj = New DateTime($date);
 	
	$timenew= date("H:i:s", strtotime($time));
	$deadline =$dateobj->format('Y-m-d').' '.$timenew;
	$assgn = New assgn();

	if( ($assgn->uploadAssgn($assn, $courseid, $deadline, $maxmarks, $assnname) )==1)
		//	echo 'yes';
			header('Location: ../views/assignmentsfac.php?cid='.$courseid.'&success=1');
	else
		//echo 'no';
		header('Location: ../views/assignmentsfac.php?cid='.$courseid.'&success=0');



}


	

?>

