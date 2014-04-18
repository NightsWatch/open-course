<?php

require '../models/mysql.php';

if ( isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) )

	{

				echo "entering";

		$username = mysql_real_escape_string($_POST['username']);
		$pass = mysql_real_escape_string($_POST['password']);
		$email = mysql_real_escape_string($_POST['email']);

		$usertype=0;
		if(isset($_POST['stud'])) $usertype="student";

		if(isset($_POST['fac'])) $usertype="faculty";

		if(isset($_POST['hod'])) $usertype="hod";


		$mysql = New mysql();

		echo "created mysql";
		if( ($mysql->adduser($username,$pass, $email, $usertype )) == 1 )
			echo "Inserted successfully";
		else
			echo "Failed";

		//$mysql->insertStudDetails($regUserid, $name, $prog, $batch, $dept, $rollno, $ista );

	}

?>