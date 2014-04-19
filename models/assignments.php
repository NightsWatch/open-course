<?php
require_once 'dbs.php';

class assignments {

	public function getAssignmentDetails($assignid)
	{
		$query="select assignid, courseid, assignno, filepath, deadline, maxmarks, studmarks from assignments where assignid='".$assignid."';";
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
}

?>