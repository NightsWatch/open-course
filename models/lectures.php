<?php

include 'dbs.php';

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


	public function uploadLecture($lectureno, $lecturename )
	{

		if(!isset($_FILES["file"]))
		{
				echo 'File not chosen';
				return -1;
		}	

		$upFile = $_FILES["file"];
		$allowedExts = array("pdf","docx","doc","ppt","zip","rar","xls");

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

				$this->extension=$extension;
				$this->add();

				// move from servers temporary copy to the lectures folder
				if(!move_uploaded_file ($upFile["tmp_name"], $this->path) )
						return -1;
				else
					return 1;
						
			}

		}
		else
		{
			echo "Invalid extension";
				return -1;
		}

	}




    public function add() 
	{


		$query = "INSERT INTO ".DBNAME.".".LECTURES_TBL." (assignid, courseid, assignno, deadline, maxmarks) values ( DEFAULT,'".$_SESSION['courseid']."','".$this->assnno."','".$this->deadline."', '".$this->maxmarks."');";

		$result= mysql_query($query);
		if($result)
		{
			$this->id=intval(mysql_insert_id());
			$this->path= "../lectures/".$this->id.'.'.$this->extension; 

			$query= "INSERT INTO".DBNAME.".".LECTURES_TBL." (filepath) values ('".$this->path."');";
			$result= mysql_query($query);

			if($result)
			return 1;

			echo "Error: ".mysql_error();

		}

		echo "Error: ".mysql_error();
		return 0;
	}

}
