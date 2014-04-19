<?php

include '../models/assgn.php';

session_start();

if( isset($_POST['assignno']) && isset($_POST['deadline']) && isset($_POST['maxmarks']))
{
	$assn = mysql_real_escape_string($_POST['assignno']);
	$deadline = mysql_real_escape_string($_POST['deadline']);
	$maxmarks = mysql_real_escape_string($_POST['maxmarks']);

	$assgn = New assgn();

	if( ($assgn->uploadAssgn($assn, $deadline, $maxmarks) )==1)
			header("Location: ../views/assnupload.php?success=1");
	else
		header("Location: ../views/assnupload.php?success=0");



}

?>