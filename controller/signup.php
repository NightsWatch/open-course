<?php

require '../models/mysql.php';

session_start();

if ( isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) )

	{

		echo "entering";

		$username = mysql_real_escape_string($_POST['username']);
		$pass = mysql_real_escape_string($_POST['password']);
		$email = mysql_real_escape_string($_POST['email']);

		if(isset($_POST['usertype']))
		 $usertype= $_POST['usertype'];
		echo "printing usertype".$_POST['usertype'] ;
		

		$mysql = New mysql();

		echo "created mysql";
		if( ($mysql->adduser($username,$pass, $email, $usertype )) == 1 )
			header('Location: ../views/login.php?session=1');
		else
			header('Location: ../views/signup.php?error=1');
		//$mysql->insertStudDetails($regUserid, $name, $prog, $batch, $dept, $rollno, $ista );

	}

?>
