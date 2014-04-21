<?php

include_once 'dbs.php';
class exams
{

	private $id, $assnno, $deadline, $maxmarks, $extension, $path, $assn_name, $courseid;


	function __construct()
		{
			$db= New dbs();
			$db->connect();

			
			$this->id= NULL;
			$this->extension=NULL;
			$this->path=NULL;
			$this->courseid=NULL;
		}


	public function uploadQuestions($examtitle, $courseid, $maxmarks, $weightage)
	{
		echo "eneted";

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

			$this->examtitle= $examtitle;
			$this->weightage= $weightage;
			$this->maxmarks= $maxmarks;
			$this->courseid=$courseid;


				$this->extension=$extension;
				$this->add();

				// move from servers temporary copy to the assignmets folder
				if(!move_uploaded_file ($upFile["tmp_name"], $this->path) )
						return -1;
				else{
						//$assignments= New assignments();
						//$assignments->addAssignNotifs($this->id);

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




	public function uploadSolution($examid,$studid,$marks)
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
				echo "Error Uploading Submission";
					return -1;
			}
			else
			{
				echo "uploading\n";
				$this->extension=$extension;
				$this->id=$examid;
				$this->submit($examid,$studid,$marks);

				// move from servers temporary copy to the assignmets folder
				if(!move_uploaded_file ($upFile["tmp_name"], $this->path) )
						return -1;
				else
					return 1;
						
			}

		}
		else
		{
			echo "Invalid extension";
				return -2;
		}

	}


	public function getExamDetails($examid)
	{
		$query="select * from exams where examid='".$examid."';";
		$result = mysql_query($query);
		return mysql_fetch_array($result);
	}


	public function getCourseidFromExamid($examid)
	{
		$query = "select courseid from exams where examid='".$examid."';";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		return $row['courseid'];
	}

    public	function add() 
	{


		$query = "INSERT INTO ".DBNAME.".exams (examid, examtitle, courseid, maxmarks, weightage) values ( DEFAULT,'".$this->examtitle."','".$this->courseid."','".$this->maxmarks."','".$this->maxmarks."');";
		echo "adding";
		$result= mysql_query($query);
		if($result)
		{
			$this->id=intval(mysql_insert_id());
			$this->path= "../exams/questions/".$this->id.'.'.$this->extension; 

			$query= "UPDATE ".DBNAME.".exams SET FILEPATH='".$this->path."' where examid='".$this->id."';";
			$result= mysql_query($query);

			if($result)
				return 1;

			echo "Error: ".mysql_error();

		}

		echo "Error: ".mysql_error();
		return 0;
	}



	public	function submit($examid,$studid,$marks) 
	{
		
		$details = $this->getExamDetails($examid);				
		echo $details['maxmarks'];

		if($marks>$details['maxmarks'])
			return -1;

		
		$query = "INSERT INTO ".DBNAME.".examsolutions (solid, studentid, examid, marks) values ( DEFAULT,'".$studid."','".$this->id."','".$marks."');";
		echo $query;
		//echo "Inserting";
		$result= mysql_query($query);
		if($result)
		{
			$this->id=intval(mysql_insert_id());
			//echo "updating ".$this->id;
			echo $this->id;
			$this->path= "../exams/solutions/".$this->id.'.'.$this->extension; 
			echo $this->path;
			$query= "UPDATE examsolutions SET filepath='".$this->path."' where solid='".$this->id."';";
			echo $query;
			$output= mysql_query($query);
			echo $output;
			if($output)
				{
					echo mysql_error();
					return 1;
				}

			echo "Error: ".mysql_error();


			
		}
		echo "Error: ".mysql_error();

		return 0;
	}
	

	public function updateMarks($studid,$examid,$marks)
	{
		$query="update examsolutions set marks='".$marks."',reeval='no' where examid='".$examid."' and studentid='".$studid."';";
		echo $query;
		$result = mysql_query($query);
		if($result)
		{
			return 1;
		}
		else
		{
			echo mysql_error();
			return 0;
		}
	}

	public function updateReeval($studid,$examid,$comments)
	{
		$query="update examsolutions set reeval='yes',studcomments='".$comments."' where examid='".$examid."' and studentid='".$studid."';";
		echo $query;
		$result = mysql_query($query);
		if($result)
		{
			return 1;
		}
		else
		{
			echo mysql_error();
			return 0;
		}
	}

}


?>
