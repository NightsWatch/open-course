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
		if(!$result) {
    		echo "Database query failed: " . mysql_error();
		}
		return $result;
	}

	public function getSlots()
	{
		$query="select count(*) as count,slot from courses group by slot ORDER BY count DESC;";
		$result = mysql_query($query);
		if(!$result) {
    		echo "Database query failed: " . mysql_error();
		}
		return $result;

	}
	public function getCourseDetails($courseid)
	{
		$query = "select courseid, coursename, courseno, year, department,credits,slot from courses where courseid='".$courseid."';";
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

	public function getCourseExamQuestions($courseid)
	{
		$query="select * from exams where courseid='".$courseid."';";
	 	$result = mysql_query($query);
	 	return $result;
	}

	public function getCourseStudents($courseid) {
		$query = "select * from coursemgs.students where userid in ( select studentid from coursestudregistration where courseid='".$courseid."');";
		$result = mysql_query($query);
		if(!$result) echo " Error: ". mysql_error();
		return $result;
	}


	public function getCourseExamSolutionsStudents($examid) {
		$query = "select * from examsolutions as a,exams as b where b.examid=".$examid." and a.examid=".$examid." ;";
		$result = mysql_query($query);
		if(!$result) echo " Error: ". mysql_error();
		return $result;
	}


	public function getExamMarksStud($courseid, $userid) {
		$query = "select a.examtitle as examtitle, a.examid as examid,b.marks as marks, a.maxmarks as maxmarks, a.filepath as question,a.weightage as weightage, b.filepath as corrected,b.reeval as reeval from examsolutions as b, exams as a where a.courseid=".$courseid."  
		and a.examid=b.examid and b.studentid=".$userid." ;";
		
		//$query="select * from examsolutions where studentid='".$userid."';";
		//echo $query;
		$result = mysql_query($query);
		if(!$result) 
			{
				echo " Error: ". mysql_error();
				return 0;
			}
		return $result;
	}



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

	public function getCourseInstructor($courseid){
		$query="select b.userid from coursefacallotment as a, faculty as b where a.courseid='".$courseid."' and b.userid=a.facultyid;";
	 	$result = mysql_query($query);

	 	return $result;	
	}

	public function checkCourseInstructor($courseid, $userid)
	{
		
            
            $result=$this->getCourseInstructor($courseid);

            while($row=mysql_fetch_array($result))
            {
                if($userid==$row['userid'])
                {
                	return true;
                }
            }

            return false;
     
	}

	public function getCourseidfromlec($lectureid)
	{
		$query = "select courseid from lectures where lecid='".$lectureid."';";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		return $row['courseid'];
	}



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


	public function addCourse($courseno, $coursename, $department, $year, $credits,$slot)
	{
		$query ="insert into courses(courseno, coursename, department, year, credits,slot) values('".$courseno."','".$coursename."','".$department."','".$year."','".$credits."','".$slot."')";
		$result= mysql_query($query);
		if($result)
		{
			return 1;
		}
		else
			{echo "Failed";
		return 0;}
	}
	

	public function addCourseInstructor($courseid, $facultyid)
	{
		$query ="insert into coursefacallotment(courseid, facultyid) values('".$courseid."','".$facultyid."')";
		$result= mysql_query($query);
		echo mysql_error();
		if($result)
		{
			return 1;
		}
		else
			{return 0;}
	}

	public function removeCourseInstructor($courseid, $facultyid)
	{
		$query ="delete from coursefacallotment where courseid=".$courseid." and facultyid=".$facultyid."";
		$result= mysql_query($query);
		echo mysql_error();
		if($result)
		{
			return 1;
		}
		else
			{return 0;}
	}
	
}