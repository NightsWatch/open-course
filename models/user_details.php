<?php

require_once 'dbs.php';

include_once '../models/courses.php';

class user_details {


	function __construct() 
	{
		$dbs = New dbs();
		$conn = $dbs ->connect();

	}

	public function getAllStudents()
	{
		$query = "select * from students;";
		$result = mysql_query($query);

			if(!$result) {
    		die("Database query failed: " . mysql_error());
	 	}
	 
	 	return $result;
	}


	public function getAllStudentsDept($dept)
	{
		$query = "select * from students where department='".$dept."';";
		$result = mysql_query($query);

			if(!$result) {
    		die("Database query failed: " . mysql_error());
	 	}
	 
	 	return $result;
	}

	public function getFacDepartment($userid)
	{
		$query="select department from faculty where userid='".$userid."';";
		$result = mysql_query($query);

			if(!$result) {
    		die("Database query failed: " . mysql_error());
	 	}
	 
	 	return mysql_fetch_array($result)['department'];

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



	public function getMaxCredits($userid)
		{
			$query = "select maxcredits from students where userid=".$userid."; ";
			$result = mysql_query($query);
			if($result)
			{
				$row = mysql_fetch_array($result);
				return $row['maxcredits'];
			}
			echo mysql_error();
			return -1;
		}

		public function setMaxCredits($credits, $program)
		{
			$query = "update students set maxcredits=".$credits." where program='".$program."'; ";
			//echo $query;
			$result = mysql_query($query);
			if($result)
			{
				
				return 1;
			}
			echo mysql_error();
			return -1;
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
			and ista>0;";
				
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



	public function getAllStudentsNotCourse($courseid)
	{
		

		$query="
		SELECT * FROM students WHERE students.userid NOT IN (select studentid from coursestudregistration where courseid='".$courseid."');";

		$result= mysql_query($query);

		if($result)
		{
			if(mysql_num_rows($result) > 0)
				return $result;
			else
			{
					echo mysql_error();

				return 0;
			}
		}

		echo mysql_error();
		return 0;
	}


	
}



?>