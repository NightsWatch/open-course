<?php

require '../models/mysql.php';

session_start();

if( isset($_POST['name']) && isset($_POST['desgn']) && isset($_POST['dept']) && isset($_POST['joined']) 	
{
	$username = mysql_real_escape_string($_POST['name']);

	$desgn = mysql_real_escape_string($_POST['desgn']);
	$dept = mysql_real_escape_string($_POST['dept']);

	$joined = mysql_real_escape_string($_POST['joined']);


	$mysql = New mysql();

	 
	 if( ($mysql->insertFacDetails($_SESSION['id'], $username, $desgn, $dept, $joined) )==1 )
		header ('Location: ../views/profile.php?set=1');
	else
		header ('Location: ../views/profile.php');

}

?>