<?php

include '../models/assgn.php';

include '../models/assignments.php';

session_start();


$assgn = New assgn();
if(isset($_GET[assnid]))
{
	$assnid= $_GET['assnid'];
	$assignments= New assignments();
	$courseid= $assignments->getCourseidfromassgn($assnid);

	if( ($assgn->uploadSubmission($assnid )== -1 )
			//echo "failed";
			header("Location: ../views/assignsubmission.php?success=0");
	else
		header("Location: ../views/assignments.php?success=1&cid=".$courseid);

}

?>