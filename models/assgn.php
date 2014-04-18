<?php

include 'dbs.php';

class assgn
{

	private $id, $assnno, $deadline, $maxmarks, $extension, $path;


	function __construct()
		{
			$db= New dbs();
			$db->connect();
			
			$this->id= NULL;
			$this->extension=NULL;
			$this->path=NULL;
		}


	public function uploadAssgn($assnno, $deadline, $maxmarks)
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

			$this->assnno= $assnno;
			$this->deadline= $deadline;
			$this->maxmarks= $maxmarks;

				$this->extension=$extension;
				$this->add();

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
				return -1;
		}

	}




	public function uploadSubmission()
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
				echo "Error Uploading Submission";
					return -1;
			}
			else
			{
				$this->extension=$extension;
				$this->submit();

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
				return -1;
		}

	}





    public	function add() 
	{


		$query = "INSERT INTO ".DBNAME.".".ASSNS_TBL." (assignid, courseid, assignno, deadline, maxmarks) values ( DEFAULT,'".$_SESSION['courseid']."','".$this->assnno."','".$this->deadline."', '".$this->maxmarks."');";

		$result= mysql_query($query);
		if($result)
		{
			$this->id=intval(mysql_insert_id());
			$this->path= "../assignments/".$this->id.'.'.$this->extension; 

			$query= "INSERT INTO".DBNAME.".".ASSNS_TBL." (filepath) values ('".$this->path."');";
			$result= mysql_query($query);

			if($result)
			return 1;

			echo "Error: ".mysql_error();

		}

		echo "Error: ".mysql_error();
		return 0;
	}



	public	function submit( ) 
	{
		$TIME =localtime();

		$query = "INSERT INTO ".DBNAME.".".SUBMS_TBL." (subid, assgnid, stime, studid) values ( DEFAULT,'".$_SESSION['assnid']."', '".$TIME."','".$_SESSION['id']."');";

		$result= mysql_query($query);
		if($result)
		{
			$this->id=intval(mysql_insert_id());
			$this->path= "../submissions/".$this->id.'.'.$this->extension; 

			$query= "INSERT INTO".DBNAME.".".SUBMS_TBL." (path) values ('".$this->path."');";
			$result= mysql_query($query);

			if($result)
			return 1;
			echo "Error: ".mysql_error();


			
		}
		echo "Error: ".mysql_error();

		return 0;
	}
	


}


?>