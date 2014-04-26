<?php

include_once '../models/exams.php';

session_start();


$exms = New exams();
if(isset($_GET['eid']))
{
	$marks = mysql_real_escape_string($_POST['marks']);
	$studid = mysql_real_escape_string($_POST['studid']);
	$examid = mysql_real_escape_string($_GET['eid']);


	$courseid= $exms->getCourseidFromExamid($examid);
	$result= $exms->uploadSolution($examid,$studid,$marks);
	if ($result== -1 )
			//echo "failed";
			header("Location: ../views/exam_question_solutions.php?success=0&eid=".$examid);
	else if ($result== -2 )
		//	echo "failed2";
			header("Location: ../views/exam_question_solutions.php?success=2&eid=".$examid);
	else
		//echo 'fail3';
		header("Location: ../views/exam_question_solutions.php?success=1&eid=".$examid);

}

?>