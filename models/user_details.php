<?php

require 'dbs.php';

class user_details {


	function __construct() 
	{
		$dbs = New dbs();

		$conn = $dbs ->connect();

	}

	public function getName($userid)
	{
		$query = "select 'name' from 'coursemgs'.'students' 
			where 'userid'=".$userid."';";
		$result = mysql_query($query);

		if(!$result) {
    		die("Database query failed: " . mysql_error());
		}
		return $result;



	}

	public function getProgram($userid)
	{
		$query = "select 'program' from 'coursemgs'.'students' 
			where 'userid'=".$userid."';";
		$result = mysql_query($query);

		if(!$result) {
    		die("Database query failed: " . mysql_error());
		}
		return $result;



	}

	public function getBatch($userid)
	{
		$query = "select 'batch' from 'coursemgs'.'students' 
			where 'userid'=".$userid."';";
		$result = mysql_query($query);

		if(!$result) {
    		die("Database query failed: " . mysql_error());
		}
		return $result;



	}


	public function getDept($userid)
	{
		$query = "select 'department' from 'coursemgs'.'students' 
			where 'userid'=".$userid."';";
		$result = mysql_query($query);

		if(!$result) {
    		die("Database query failed: " . mysql_error());
		}
		return $result;



	}

	public function getRollNo($userid)
	{
		$query = "select 'roll' from 'coursemgs'.'students' 
			where 'userid'=".$userid."';";
		$result = mysql_query($query);

		if(!$result) {
    		die("Database query failed: " . mysql_error());
		}
		return $result;



	}





	
}



?>