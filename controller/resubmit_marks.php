<?php

include '../models/exams.php';

session_start();



if( isset($_POST['marks']) && isset($_GET['eid']) && isset($_GET['studid']))
{
	echo 'enter';
	$marks = mysql_real_escape_string($_POST['marks']);
	$eid = mysql_real_escape_string($_GET['eid']);
	$studid = mysql_real_escape_string($_GET['studid']);


	$exms = New exams();
	echo 'calling';

	if( ($exms->updateMarks($studid, $eid, $marks)==1))
			//echo 'yes';
			header('Location: ../views/exams_reevaluations.php?eid='.$eid.'&success=1');
	else
		//echo 'no';
		header('Location: ../views/exams_reevaluations.php?eid='.$eid.'&success=0');



}


	

?>

