<?php

require '../models/mysql.php';

if ( isset($_POST['username']) && isset($_POST['password'] && $_POST['name']) && isset($_POST['email'] && $_POST['dept']) && isset($_POST['program'] && isset($_POST['rollno']) && isset($_POST['ista'] && isset($_POST['batch']) )
	{
		$username = mysql_real_escape_string($_POST['username']);
		$pass = mysql_real_escape_string($_POST['password']);
		$email = mysql_real_escape_string($_POST['email']);

		$name = mysql_real_escape_string($_POST['name']);
		$dept = mysql_real_escape_string($_POST['dept']);
		$program = mysql_real_escape_string($_POST['program']);
		$rollno = mysql_real_escape_string($_POST['rollno']);
		$batch = mysql_real_escape_string($_POST['batch']);
		$ista = mysql_real_escape_string($_POST['ista']);

		$mysql = New mysql();

		$mysql->adduser($username,$pass, $email );

		$mysql->insertStudDetails($regUserid, $name, $prog, $batch, $dept, $rollno, $ista );

	}

?>