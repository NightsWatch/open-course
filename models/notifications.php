<?php

require_once 'dbs.php';

class notifications {

	function __construct() {
		$dbs = New dbs();
		$conn = $dbs ->connect();
	}
	
	//get lecture notifications by inserting notif for each course and lecture id
	public function addLectureNotification($foruserid, $courseid,$timestamp)
	{
		$query = "insert INTO ".DBNAME.".".NOTIFSLECTURES_TBL." (foruserid, lectures,seen,timestamp) 
		VALUES ('".$foruserid."','".$courseid."',0','".$timestamp."');";
		$result = mysql_query($query);
		if(!$result) {
    		die("Database query failed: " . mysql_error());
	 	}
		return $result;
	}

	public function addAssignmentNotifications($foruserid,$courseid)
	{	$query = "insert INTO ".DBNAME.".".NOTIFSASSIGNMENTS_TBL." (foruserid, assignments, seen,timestamp) 
		VALUES ('".$foruserid."','".$courseid."',0','".$timestamp."');";
		$result = mysql_query($query);
		if(!$result) {
    		die("Database query failed: " . mysql_error());
	 	}
		return $result;
	}

	public function addThreadNotifications($foruserid,$threadid,$timestamp)
	{	$query = "insert INTO ".DBNAME.".".NOTIFSTHREADS_TBL." (foruserid, threadid, seen,timestamp) 
		VALUES ('".$foruserid."','".$threadid."',0','".$timestamp."');";
		$result = mysql_query($query);
		if(!$result) {
    		die("Database query failed: " . mysql_error());
	 	}
		return $result;
	}

	public function getUnreadCounts($loggedinuserid)
	{
		


		$query = "select 
			(SELECT COUNT(*) FROM notifsthreads WHERE foruserid='".$loggedinuserid."' AND seen=0) as threadcount
			,
			(SELECT COUNT(*) FROM notifslectures WHERE foruserid='".$loggedinuserid."' AND seen=0) as lecturecount,
			(SELECT COUNT(*) FROM notifsassignments WHERE foruserid='".$loggedinuserid."' AND seen=0) as assignmentcount

			;";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		return $row;
	}

	public function setSeenThreads(){
		//
		$query = "update notifsthreads set seen=1;";
		$result = mysql_query($query);
			if(!$result) {
    		die("Database query failed: " . mysql_error());
		}
		return $result;
	}

	public function setSeenLectures(){
		//
		$query = "update notifslectures set seen=1;";
		$result = mysql_query($query);
			if(!$result) {
    		die("Database query failed: " . mysql_error());
		}
		return $result;
	}

	public function setSeenAssignments(){
		//
		$query = "update notifsassignments set seen=1;";
		$result = mysql_query($query);
			if(!$result) {
    		die("Database query failed: " . mysql_error());
		}
		return $result;
	}


	public function getNotificationsThreads($userid)
	{
		$query="select * from notifsthreads where foruserid='".$userid."' order by notifsthreads.timestamp DESC;";
		$result=mysql_query($query);
		if(!$result)
		{
			die("Database query failed: ".mysql_error());
		}
		return $result;
	}
	public function getNotificationsAssignments($userid)
	{
		$query="select * from notifsassignments where foruserid='".$userid."' order by notifsassignments.timestamp DESC;";
		$result=mysql_query($query);
		if(!$result)
		{
			die("Database query failed: ".mysql_error());
		}
		return $result;
	}
	public function getNotificationsLectures($userid)
	{
		$query="select * from notifslectures where foruserid='".$userid."' order by notifslectures.timestamp DESC;";
		$result=mysql_query($query);
		if(!$result)
		{
			die("Database query failed: ".mysql_error());
		}
		return $result;
	}
}


?>