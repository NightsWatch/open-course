<?php
require_once 'dbs.php';
class courses {

	function __construct() {
		$dbs = New dbs();

		$conn = $dbs ->connect();

	}
	public function getAllCourses()
	{
		$query = "select courseid from courses;";
		$result = mysql_query($query);
		
		return $result;
	}

	public function getCourseDetails($courseid)
	{
		$query = "select courseid, coursename, courseno, year, department,credits from courses where courseid='".$courseid."';";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		return $row;
	}

	public function getCourseLectures($courseid)
	{
		$query="select lectureno, lecturename, filepath from lectures where courseid='".$courseid."';";
	 	$result = mysql_query($query);
	 	return $result;
	}

	public function getCourseAssignments($courseid)
	{
		$query="select assignid, assignno, assign_name,	filepath, deadline, maxmarks from assignments where courseid='".$courseid."';";
	 	$result = mysql_query($query);
	 	return $result;
	}

	// public function getStudentCourses($useridid) {
	// 	//$mysql = New mysql();
	// 	$query = "select * from 'coursemgs'.'courses' where 'courseid' in (select 'courseid' from 'coursemsgs'.'course-stud-registration' where 'studentid'='".$userid."');";
	// 	$result=mysql_query($query);
	// 	return $result;
	// }

	public function getCourseStudents($courseid) {
		$query = "select * from coursemgs.students where userid in ( select studentid from coursestudregistration where courseid='".$courseid."');";
		$result = mysql_query($query);
		if(!$result) echo " Error: ". mysql_error();
		return $result;
	}

	// public function getCourseTAs($courseid) {
	// 	$query = "select * from 'coursemgs'.'student' where 'userid' in (select 'taid' from 'course-ta-allotment' where 'courseid'='".$courseid."');";
	// 	$result = mysql_query($query);
	// 	return $result;
	// }

	// public function getCourseAssignments($courseid) {
	// 	$query = "select * from 'coursemgs'.'assignments' where 'courseid'=".$courseid."';";
	// 	$result = mysql_query($query);
	// 	return $result;
	// }

	// public function getCourseLectures($courseid) {

	// }

	public function getCourseForumThreads($courseid) {
	 	$query="select threadid, threadtitle,starterid,timestamp from forums where courseid='".$courseid."';";
	 	$result = mysql_query($query);
	 	return $result;
	}

	public function getCourseInstructors($courseid){
		$query="select b.name from coursefacallotment as a, faculty as b where a.courseid='".$courseid."' and b.userid=a.facultyid;";
	 	$result = mysql_query($query);
	 	return $result;	
	}

	public function getCourseidfromlec($lectureid)
	{
		$query = "select courseid from lectures where lecid='".$lectureid."';";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		return $row['courseid'];
	}


	//harshith's function


	public function getCourseInfo($courseid) {
		//$mysql = New mysql();
		$query = "select * from 'coursemgs'.'courses' where 'courseid'= '".$courseid."' ;";
		$result=mysql_query($query);

		if(!$result) {
    		echo "Database query failed: " . mysql_error();
		}
		return $result;
	}


	public function getCourseName($courseid)
	{
		$query = "select coursename from coursemgs.courses where courseid='".$courseid."';";
		$result = mysql_query($query);

		if($result)
		{
			if(mysql_num_rows($result) > 0)
			{
				$row = mysql_fetch_array($result);
				return $row['coursename'];
			}
			
			return 0;
		
		}

    	
	}

	public function getCourseYear($courseid)
	{
		$query = "select year from coursemgs.courses where courseid='".$courseid."';";
		$result = mysql_query($query);

		if($result)
		{
			if(mysql_num_rows($result) > 0)
			{
				$row = mysql_fetch_array($result);
				return $row['year'];
			}
			
			return 0;
		
		}

    	
	}


	public function getCourseCredits($courseid)
	{
		$query = "select credits from coursemgs.courses where courseid='".$courseid."';";
		$result = mysql_query($query);

		if($result)
		{
			if(mysql_num_rows($result) > 0)
			{
				$row = mysql_fetch_array($result);
				return $row['credits'];
			}
			
			echo mysql_error();
			return 0;
		
		}

		return 0;
	
	}
	

}