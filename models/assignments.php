<?php
require_once 'dbs.php';
include_once '../models/courses.php';

class assignments {
	function __construct() {
		$dbs = New dbs();

		$conn = $dbs ->connect();

	}
	public function getAssignmentDetails($assignid)
	{
		$query="select assignid, assign_name, courseid, assignno, filepath, deadline, maxmarks, studmarks from assignments where assignid='".$assignid."';";
		$result = mysql_query($query);
		return mysql_fetch_array($result);
	}

	public function getAssignmentSubmissions($assignid)
	{
		$query="select subid, studid, filepath, stime from assignsubmissions where assignid='".$assignid."';";
		$result = mysql_query($query);
		return $result;
	}

	public function getAssignmentId($subid)
	{
		$query = "select assignid from assignsubmissions where subid='".$subid."';";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		return $row['assignid'];
	}

	public function getAssignmentLink($subid)
	{
		$query = "select filepath from assignsubmissions where subid='".$subid."';";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		return $row['filepath'];
	}

	public function setMarks($subid,$marks)
	{
		$query = "update ".DBNAME.".".SUBMS_TBL." SET marks='".$marks."' WHERE subid='".$subid."';";
		$result = mysql_query($query);
		if(!$result) {
    		die("Database query failed: " . mysql_error());
	 	}
		return $result;
	}

	public function getCourseidfromassgn($assignid)
	{
		$query = "select courseid from assignments where assignid='".$assignid."';";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		return $row['courseid'];
	}

	public function getAssignmentNo($assignid)
	{
		$query = "select assignno from assignments where assignid='".$assignid."';";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		return $row['assignno'];
	}

	public function getAssignmentidsSubmittedCourse($studid, $courseid)
	{
		$query = "select distinct a.assignid FROM assignments as a, assignsubmissions as b where a.assignid=b.assignid and b.studid='".$studid."' and a.courseid='".$courseid."';";
		$result = mysql_query($query);
		return $result;
	}

	public function getSubmissionDetails($assignid, $userid)
	{
		//echo $assignid; echo $userid;
		$query = "select filepath,stime from assignsubmissions where studid='".$userid."' and assignid='".$assignid."';";
		$result = mysql_query($query);

		//echo mysql_error();
	
		$row = mysql_fetch_array($result);
		//echo $row['filepath'];
		//echo $row['stime'];
		return $row;
	}

	public function addAssignNotifs($assnid)
	{
		$courseid= $this->getCourseidfromassgn($assnid);

		$course= New courses();

		$results= $course->getCourseStudents($courseid);

		while($row= mysql_fetch_array($results))
		{
			$query = "insert into notifsassignments (notifid, foruserid, assignments, seen) values(DEFAULT, '".$row['userid']."', '".$courseid."','0');";

			$output= mysql_query($query);

			if($output)
			{	
				echo "added notifs";
				return $output;
			}
			else
						//if(!$result) echo " Error: ". mysql_error();

				return 0;

		}

	} 

}

?>