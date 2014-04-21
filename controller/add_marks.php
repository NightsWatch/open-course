<?php

include_once '../models/assignments.php';

if( isset($_GET['courseid']) && isset($_GET['userid']) && isset($_POST['marks']) )
{
	//echo "gone";
	$courseid = $_GET['courseid'];
	$userid = $_GET['userid'];
	$marks = mysql_real_escape_string($_POST['marks']);
		echo "marks ".$marks;

	$assgn = New assignments();
	if( $assgn->setGrade($courseid,$userid, $marks) )		  
		header('Location: ../views/coursestud.php?cid='.$courseid.'');
	else
		echo "failed";
		//header('Location: ../views/grading?error=1&cid='.$courseid.'&uid='.$userid.'');
}

else if(isset($_POST['marks']) )
{
	//echo "gone";
	$subid = $_GET['sid'];
	$marks = mysql_real_escape_string($_POST['marks']);
	$assgn = New assignments();
	$assgnid = $assgn->getAssignmentId($subid);
	if($assgn->checkWithinMax($assgnid,$marks))
		{
			echo $assgn->setMarks($subid,$marks); 
			header('Location: ../views/assignsubmissionfac.php?aid='.$assgnid.'');
		}

	else
		{
			header('Location: ../views/grading.php?sid='.$subid.'&done=0');
		}
}



?>
