<?php

include 'dbs.php';
include_once '../models/courses.php';


class lectures
{

	private $id, $lectureno, $extension, $path, $lecturename;


	function __construct()
		{
			$db= New dbs();
			$db->connect();
			
			$this->id= NULL;
			$this->extension=NULL;
			$this->path=NULL;
		}


	public function uploadLecture($lectureno, $lecturename, $courseid)
	{

		if(!isset($_FILES["file"]))
		{
				echo 'File not chosen';
				return -1;
		}	

		$upFile = $_FILES["file"];
		$allowedExts = array("pdf","docx","doc","ppt","zip","rar","xlsx","pptx","xls","txt","c","cpp","tar.gz","tar","java","py","sql");

		$extension = end(explode(".", $_FILES["file"]["name"]));		
		$extension = strtolower($extension);

		if(in_array($extension, $allowedExts))
		{
			if($upFile["error"] > 0)
			{
				echo "Error Uploading";
					return -1;
			}
			else
			{
				$this->lectureno= $lectureno;
				$this->lecturename= $lecturename;	
				$this->courseid=$courseid;						

				$this->extension=$extension;
				$this->add();

				// move from servers temporary copy to the assignmets folder
				if(!move_uploaded_file ($upFile["tmp_name"], $this->path) )
						return -1;
				else{

					if($this->addLectureNotifs($this->id))
					return 1;
				  return 1;
				}
						
			}

		}
		else
		{
			echo "Invalid extension";
				return -2;
		}

	}




    public	function add() 
	{


		$query = "INSERT INTO ".DBNAME.".".LECTURES_TBL." (lecid, courseid, lectureno, lecturename) values ( DEFAULT,'".$this->courseid."','".$this->lectureno."','".$this->lecturename."');";

		$result= mysql_query($query);
		if($result)
		{
			$this->id=intval(mysql_insert_id());
			$this->path= "../lectures/".$this->id.'.'.$this->extension; 

			$query= "UPDATE ".DBNAME.".".LECTURES_TBL." SET FILEPATH= '".$this->path."' where LECID= '".$this->id."';";
			$result= mysql_query($query);

			if($result)
			return 1;

			echo "Error: ".mysql_error();

		}

		echo "Error: ".mysql_error();
		return 0;
	}


	public function getCourseidfromLec($lecid)
	{
		$query = "select courseid from lectures where lecid='".$lecid."';";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		return $row['courseid'];
	}



	public function addLectureNotifs($lecid)
	{
		$courseid= $this->getCourseidfromLec($lecid);

		$course= New courses();

		$results= $course->getCourseStudents($courseid);

		while($row= mysql_fetch_array($results))
		{
			$query = "insert into notifslectures (notifid, foruserid, lectures, seen) values(DEFAULT, '".$row['userid']."', '".$courseid."',0);";

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
