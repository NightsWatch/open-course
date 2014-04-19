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
}

?>