

<?php

require '../models/mysql.php';

//echo "Printing vals".$_POST['category']." query is".$_POST['query'];

if( isset($_POST['category']) && isset($_POST['query']) )
{
	$category = mysql_real_escape_string($_POST['category']);
	$query = mysql_real_escape_string($_POST['query']);

	$mysql = New mysql();

	if($category=="Faculty")
	{
		$table= "faculty";

		$field= "name";
		$result=$mysql->search($table, $query, $field) ;
		if( $result== -1)
			header('Location: ../views/404.php');
	}

	if($category=="Students")
	{
		$table= "students";
		$field="name";
		$result=$mysql->search($table, $query, $field);
		if( $result== -1)
			header('Location: ../views/404.php');
	}

	if($category=="HOD")
	{
		$table= "hod";
		$field= "name";

		if( $result== -1)
			header('Location: ../views/404.php');
	}

	if($category=="Lectures")
	{
		$table= "lectures";
		$field="lecturename";
		if( $result=($mysql->search($table, $query, $field)) == -1)
			echo "print ".$result;//header('Location: ../views/404.php');
		echo "hh ".$result;
	}

	if($category=="Assignments")
	{
		//echo "query is".$query;
		$table= "assignments";
		$field="assign_name";
		if( $result=($mysql->search($table, $query, $field)) == -1)
			//header('Location: ../views/404.php');
			echo "result ".$result;
	}

	if($category=="Users")
	{
		$table= "users";
		$field= "username";

		$result=$mysql->search($table, $query, $field) ;
		if( $result== -1)
			{header('Location: ../views/404.php');
			echo "Not found";
		}
		//else
			//echo "found".mysql_num_rows($result)." done";
	
	}


	// while($row = mysql_fetch_array($result) )
	// {
	// 	if($category=="Users")
	// 	echo $row['email_id'];
	// }

	// return $result;

	include 'search_results.php';

}

?>