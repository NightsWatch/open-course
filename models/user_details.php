<?php

require_once 'dbs.php';

class user_details {


	function __construct() 
	{
		$dbs = New dbs();
		$conn = $dbs ->connect();

	}

	

	public function getCoursesReg($userid)
	{
		$query = "select d.courseid from coursestudregistration as d where d.studentid='".$userid."';";
		$result = mysql_query($query);

			if(!$result) {
    		die("Database query failed: " . mysql_error());
	 	}
	 
	 	return $result;
	}


	public function getUserid($username)
	{
		$query = "select userid from users where username='".$username."';";
		$result=mysql_query($query);	
		$query_row=mysql_fetch_array($result);

		if(!$result) {
    		die("Database query failed: " . mysql_error());
		}
		return $query_row['userid'];
	}

	public function getUsername($userid)
	{
		$query = "select username from users where userid='".$userid."';";
		$result=mysql_query($query);	
		$query_row=mysql_fetch_array($result);

		if(!$result) {
    		die("Database query failed: " . mysql_error());
		}
		return $query_row['username'];
	}

	public function getIsta($userid)
	{
		$query = "SELECT * FROM coursemgs.students  where userid='".$userid."' 
			and ista=1;";
				
			$result= mysql_query($query);

			if (mysql_num_rows($result)>0) {
    			return 1;
			}
			else
				return 0;

	}



	public function getStudDetails($id)
	{
		$query= "SELECT * FROM coursemgs.students WHERE userid= '".$id."';";
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

	
}



?>