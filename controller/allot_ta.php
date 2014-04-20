<?php

include '../models/allotcourseta.php';

if(isset($_GET['courseid']) && isset($_GET['userid']) && isset($_GET['del'])) 
{
	$courseid= $_GET['courseid'];
	$userid= $_GET['userid'];

	$allot= New allotcourseta();

	if(($allot->remove_ta($userid, $courseid) )==1 )
		header('Location: ../views/showtas.php?cid='.$courseid.'');
	else
		//header("Location: ../views/showtas.php?delerr=1&cid=".$courseid."");
		echo mysql_error();

}

else if(isset($_GET['courseid']) && isset($_GET['userid'])) 
{
	$courseid= $_GET['courseid'];
	$userid= $_GET['userid'];

	$allot= New allotcourseta();

	if(($allot->allot_ta($userid, $courseid) )==1 )
		header('Location: ../views/showtas.php?cid='.$courseid.'');
	else
		header("Location: ../views/showtas.php?error=1&cid=".$courseid."");
		echo mysql_error();

}

?>
