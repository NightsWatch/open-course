<?php

require '../models/mysql.php';

session_start();

if( isset($_POST['coursename']) && isset($_POST['courseno']) && isset($_POST['year']) && isset($_POST['department']) && isset($_POST['credits']) && isset($_POST['facs']) )
{
	$coursename = mysql_real_escape_string($_POST['coursename']);
	$department = mysql_real_escape_string($_POST['department']);
	$year = mysql_real_escape_string($_POST['year']);
	$courseno = mysql_real_escape_string($_POST['courseno']);
	$roll = mysql_real_escape_string($_POST['roll']);


	$mysql = New mysql();

	if(isset($_GET['update']))
	{
		if( ($mysql->updateStudDetails($_SESSION['id'], $username, $prog, $batch, $dept, $roll) )==1 )
			header ('Location: ../views/profile.php?set=1');
		//echo "yes";
		else
			//echo "no";
		header ('Location: ../views/profile.php');
	

	}

	else
	{

		if( ($mysql->insertStudDetails($_SESSION['id'], $username, $prog, $batch, $dept, $roll) )==1 )
		header ('Location: ../views/profile.php?set=1');
		//echo "yes";
		else
		header ('Location: ../views/profile.php');
	
	}		//echo "no";
}

?>