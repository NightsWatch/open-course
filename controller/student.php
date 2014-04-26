<?php

require '../models/mysql.php';

session_start();

if( isset($_POST['name']) && isset($_POST['dept']) && isset($_POST['batch']) && isset($_POST['prog']) && isset($_POST['roll']))
{
	$username = mysql_real_escape_string($_POST['name']);

	$dept = mysql_real_escape_string($_POST['dept']);
	$batch = mysql_real_escape_string($_POST['batch']);

	$prog = mysql_real_escape_string($_POST['prog']);
	$roll = mysql_real_escape_string($_POST['roll']);


	$mysql = New mysql();

	if(isset($_GET['update']))
	{
		if( ($mysql->updateStudDetails($_SESSION['id'], $username, $prog, $batch, $dept, $roll) )==1 )
			header ('Location: ../views/index.php');
		//echo "yes";
		else
			//echo "no";
		header ('Location: ../views/profile.php');
	

	}

	else
	{

		if( ($mysql->insertStudDetails($_SESSION['id'], $username, $prog, $batch, $dept, $roll) )==1 )
		header ('Location: ../views/index.php');
		//echo "yes";
		else
		header ('Location: ../views/profile.php');
	
	}		//echo "no";
}

?>