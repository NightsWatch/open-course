<?php

require '../models/coursereg.php';

session_start();

if( $_GET['courseid'] )
{
		$courseid = mysql_real_escape_string($_GET['courseid']);

	$register = New coursereg();

	echo $register->registerStudent($_SESSION['id'],$courseid);

}

?>