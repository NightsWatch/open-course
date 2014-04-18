<?php

require 'dbs.php';

class courses {

	function __construct() {
		$dbs = New dbs();

		$conn = $dbs ->connect();

	}

	public function getStudentCourses($useridid) {
		//$mysql = New mysql();
		$query = "select * from 'coursemgs'.'courses' where 'courseid' in (select 'courseid' from 'coursemsgs'.'course-stud-registration' where 'studentid'='".$userid."');";
		$result=mysql_query($query);

		if(!$result) {
    		die("Database query failed: " . mysql_error());
		}
		return $result;
	}

	public function getCourseStudents($courseid) {
		$query = "select * from 'coursemgs'.'students' where 'userid' in (select 'studentid' from 'coursemsgs'.'course-stud-registration' where 'courseid'='".$courseid."');";
		$result = mysql_query($query);

		if(!$result) {
    		die("Database query failed: " . mysql_error());
		}
		return $result;
	}

	public function getCourseTAs($courseid) {
		$query = "select * from 'coursemgs'.'student' where 'userid' in (select 'taid' from 'course-ta-allotment' where 'courseid'='".$courseid."');";
		$result = mysql_query($query);

		if(!$result) {
    		die("Database query failed: " . mysql_error());
		}
		return $result;
	}

	public function getCourseAssignments($courseid) {
		$query = "select * from 'coursemgs'.'assignments' where 'courseid'=".$courseid."';";
		$result = mysql_query($query);

		if(!$result) {
    		die("Database query failed: " . mysql_error());
		}
		return $result;
	}

	public function getCourseLectures($courseid) {

	}

	public function getCourseForumThreads($courseid) {
		$query="select * from 'coursemgs'.'forums' where 'courseid'='".$courseid."';";
		$result = mysql_query($query);

		if(!$result) {
    		die("Database query failed: " . mysql_error());
		}
		return $result;
	}
}