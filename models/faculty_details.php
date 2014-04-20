<?php

include_once 'dbs.php';

class faculty_details {


	function __construct() 
	{
		$dbs = New dbs();

		$conn = $dbs ->connect();

	}


	public function getFacDetails($id)
	{
		$query= "SELECT * from coursemgs.faculty WHERE userid= '".$id."';";
		$result = mysql_query($query);
		if($result)
		{
			if(mysql_num_rows($result) > 0)
			{
				return $result;
			}
			return 0; // no results found
		}
		return 0;
	}


	public function getAllFac($dept)
	{
		$query= "SELECT userid, name from coursemgs.faculty where department='".$dept."' ;";
		$result = mysql_query($query);
		if($result)
		{
			if(mysql_num_rows($result) > 0)
			{
				return $result;
			}
			return 0;//no results found
		}
		return 0;
	}

	public function getDept($userid)
	{
		$query =  "select department from faculty where userid='".$userid."';";
		$result = mysql_query($query);
		$row =  mysql_fetch_array($result);

		return $row['department'];
	}

	
}



?>