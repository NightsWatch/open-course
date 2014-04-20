

<?php

require '../models/mysql.php';

echo "Printing vals".$_POST['category']." query is".$_POST['query'];

if( isset($_POST['category']) && isset($_POST['query']) )
{
	$category = mysql_real_escape_string($_POST['category']);
	$query = mysql_real_escape_string($_POST['query']);

	$mysql = New mysql();

	if($category=="Faculty")
	{
		$table= "faculty";

		$field= "name";
		if( $result=($mysql->search($table, $query, $field) )== -1)
			header('Location: ../views/404.php');
	}

	if($category=="Students")
	{
		$table= "students";
		$field="name";
		if( $result=($mysql->search($table, $query, $field) )== -1)
			header('Location: ../views/404.php');
	}

	if($category=="HOD")
	{
		$table= "hod";
		$field= "name";

		if( $result=($mysql->search($table, $query, $field)) == -1)
			header('Location: ../views/404.php');
	}

	if($category=="Lectures")
	{
		$table= "lectures";
		$field="lecturename";
		if( $result=($mysql->search($table, $query, $field)) == -1)
			header('Location: ../views/404.php');
	}

	if($category=="Assignments")
	{
		$table= "assignments";
		$field="assn_name";
		$rows = $mysql->search($table, $query, $field);
		echo 'rows are :';
		echo $rows;
		echo 'hirahul';
		while ($row = mysql_fetch_array($rows))
		{
			echo $row['assign_name'];
		}

		if( $rows == -1)
			header('Location: ../views/404.php');
		else
			{echo 'ad';
			echo $result['assign_name'];}
	}

	if($category=="Users")
	{
		$table= "users";
		$field= "email_id";

		if( $result=($mysql->search($table, $query, $field) )== -1)
			{header('Location: ../views/404.php');
			echo "Not found";
		}
		else
			echo "found".$result."doing";
	
	}

}

	include '../views/search_results.php';
?>