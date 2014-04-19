<?php
require_once 'dbs.php';
class courses {

	public function getCourseDetails($courseid)
	{
		$query = "select courseid, coursename, courseno, year, department from courses where courseid='".$courseid."';";
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
		$query="select assignid, assignno, filepath, deadline, maxmarks, studmarks from assignments where courseid='".$courseid."';";
	 	$result = mysql_query($query);
	 	return $result;
	}

	// public function getStudentCourses($useridid) {
	// 	//$mysql = New mysql();
	// 	$query = "select * from 'coursemgs'.'courses' where 'courseid' in (select 'courseid' from 'coursemsgs'.'course-stud-registration' where 'studentid'='".$userid."');";
	// 	$result=mysql_query($query);
	// 	return $result;
	// }

	// public function getCourseStudents($courseid) {
	// 	$query = "select * from 'coursemgs'.'students' where 'userid' in (select 'studentid' from 'coursemsgs'.'course-stud-registration' where 'courseid'='".$courseid."');";
	// 	$result = mysql_query($query);
	// 	return $result;
	// }

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
	 	$query="select threadid, threadtitle from forums where courseid='".$courseid."';";
	 	$result = mysql_query($query);
	 	return $result;
	}

	public function getCourseInstructors($courseid){
		$query="select b.name from coursefacallotment as a, faculty as b where a.courseid='".$courseid."' and b.userid=a.facultyid;";
	 	$result = mysql_query($query);
	 	return $result;	
	}

}