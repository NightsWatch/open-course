<?php

require '../models/exams.php';

session_start();

if( isset($_GET['eid']) && isset($_GET['cid']))
{
	$comments = mysql_real_escape_string($_POST['comments']);
	$eid = mysql_real_escape_string($_GET['eid']);
	$cid = mysql_real_escape_string($_GET['cid']);
	$exms = New exams();

	if( ($exms->updateReeval($_SESSION['id'], $eid,$comments) ) ==1 )
		header('Location: ../views/coursepage.php?cid='.$cid.'');
		//echo "added";

		else
			//echo 'failed';
			header('Location: ../views/coursepage.php?cid='.$cid.'');
}

?>