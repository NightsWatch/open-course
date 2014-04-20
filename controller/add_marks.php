<?php

include_once '../models/assignments.php';



if( isset($_POST['marks']) )
{
	//echo "gone";
	$subid = $_GET['sid'];
	$marks = mysql_real_escape_string($_POST['marks']);
	$assgn = New assignments();
	echo $assgn->setMarks($subid,$marks); 
	//echo 'action="../controller/add_marks.php?sid='.$subid.'" method="POST" role="form">';
	//echo $subid;
	   $assgnid = $assgn->getAssignmentId($subid);
	   echo $assgnid;
	header('Location: ../views/assignsubmissionfac.php?aid='.$assgnid.'');
}


?>
