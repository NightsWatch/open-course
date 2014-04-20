<?php
session_start();
include '../models/allotthesis.php';

if(  isset($_GET['studid']) && (  (isset($_GET['add'])) ||(isset($_GET['remove'])) || (isset($_GET['edit']))  )   ) 
{
	if($_GET['add']==1 || $_GET['edit']==1)
	{
		if( isset($_POST['title']) && isset($_POST['field']) &&  isset($_POST['year']) && isset($_POST['credits']))
		{	

		$studid= $_GET['studid'];
		$facultyid=$_SESSION['id'];

		$allot= New allotthesis();

		if(($allot->addTP($studid, $facultyid,$_POST['title'],$_POST['year'],$_POST['field']) )==1 )

			header('Location: ../views/thesis.php');
		else
			//header("Location: ../views/showtas.php?delerr=1&cid=".$courseid."");
			echo mysql_error();
		}

	}
	else if($_GET['remove'])
	{

	$studid= $_GET['studid'];
	$allot= New allotthesis();

	if(($allot->removeTP($studid))==1 )
		header('Location: ../views/thesis.php');
	else
		//header("Location: ../views/showtas.php?delerr=1&cid=".$courseid."");
		echo mysql_error();
	}
	
}

?>
