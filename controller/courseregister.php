<?php

require '../models/coursereg.php';

session_start();

if( $_GET['cid'] )
{
	$courseid = mysql_real_escape_string($_GET['cid']);
	$register = New coursereg();
	


	if($register->checkstudreg($_SESSION['id'],$courseid))
		header('Location: ../views/allcourses.php?already='.$courseid.'');
	if( $register->registerStudent($_SESSION['id'],$courseid)==2)
		header('Location: ../views/allcourses.php?cant=1');
	if( $register->registerStudent($_SESSION['id'],$courseid)==1)
		header('Location: ../views/allcourses.php?done='.$courseid.'');

}

?>