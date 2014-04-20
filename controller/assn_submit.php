<?php

include_once '../models/assgn.php';

include_once '../models/assignments.php';

session_start();


$assgn = New assgn();
if(isset($_GET[assnid]))
{
	$assnid= $_GET['assnid'];
	$assignments= New assignments();
	$courseid= $assignments->getCourseidfromassgn($assnid);

	if ($assgn->uploadSubmission($assnid )== -1 )
			//echo "failed";
			header("Location: ../views/assignsubmission.php?success=0".$assnid);
	else if ($assgn->uploadSubmission($assnid )== -2 )
			//echo "failed";
			header("Location: ../views/assignsubmission.php?success=2".$assnid);
	else
		header("Location: ../views/assignments.php?success=1&cid=".$courseid);

}

?>