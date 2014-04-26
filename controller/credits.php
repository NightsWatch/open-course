<?php

require_once '../models/user_details.php';


session_start();
if( isset($_POST['credits']) && isset($_POST['prog']) )
{

	$credits = mysql_real_escape_string($_POST['credits']);
	$prog = mysql_real_escape_string($_POST['prog']);

		$ud=New user_details();


		if( ($ud->setMaxCredits($credits, $prog) )==1 )
		{
		 	header ('Location: ../views/credits.php?done=1');
		}
			
		else
			//echo 'failed';
			header ('Location: ../views/credits.php?done=0');



}

?>