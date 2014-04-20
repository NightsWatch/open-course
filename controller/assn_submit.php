<?php

include_once '../models/assgn.php';

include_once '../models/assignments.php';

session_start();


$assgn = New assgn();
if(isset($_GET['assnid']))
{
	$assnid= $_GET['assnid'];
	$assignments= New assignments();
	$courseid= $assignments->getCourseidfromassgn($assnid);
	$result= $assgn->uploadSubmission($assnid);
	if ($result== -1 )
			//echo "failed";
			header("Location: ../views/assignsubmission.php?success=0&aid=".$assnid);
	else if ($result== -2 )
			//echo "failed2";
			header("Location: ../views/assignsubmission.php?success=2&aid=".$assnid);
	else
		//echo 'fail3';
		header("Location: ../views/assignments.php?success=1&cid=".$courseid);

}

?>