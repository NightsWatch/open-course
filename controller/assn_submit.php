<?php

include '../models/assgn.php';

session_start();



$assgn = New assgn();

if( ($assgn->uploadSubmission() )== -1 )
			echo "failed";
			//header("Location: ../views/assignsubmission.php?success=0");
	else
		header("Location: ../views/assignsubmission.php?success=1");





?>