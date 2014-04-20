<?php

include 'dbs.php';
include_once '../models/assignments.php';
class assgn
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


	public function uploadAssgn($assnno, $courseid, $deadline, $maxmarks, $assn_name)
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

			$this->assnno= $assnno;
			$this->deadline= $deadline;
			$this->maxmarks= $maxmarks;
			$this->assn_name=$assn_name;
			$this->courseid=$courseid;


				$this->extension=$extension;
				$this->add();

				// move from servers temporary copy to the assignmets folder
				if(!move_uploaded_file ($upFile["tmp_name"], $this->path) )
						return -1;
				else{
						$assignments= New assignments();
						$assignments->addAssignNotifs($this->id);

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




	public function uploadSubmission($id)
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
				$this->id=$id;
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
				return -2;
		}

	}





    public	function add() 
	{


		$query = "INSERT INTO ".DBNAME.".".ASSNS_TBL." (assignid, courseid, assignno, assign_name, deadline, maxmarks) values ( DEFAULT,'".$this->courseid."','".$this->assnno."','".$this->assn_name."','".$this->deadline."', '".$this->maxmarks."');";
		echo "adding";
		$result= mysql_query($query);
		if($result)
		{
			$this->id=intval(mysql_insert_id());
			$this->path= "../assignments/".$this->id.'.'.$this->extension; 

			$query= "UPDATE ".DBNAME.".".ASSNS_TBL." SET FILEPATH='".$this->path."' where assignid='".$this->id."';";
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
		


		$_SESSION['assnid']=1;

		echo " studid ".$_SESSION['id']."\n";
		$query = "INSERT INTO ".DBNAME.".".SUBMS_TBL." (subid, assignid, studid,stime) values ( DEFAULT,'".$this->id."','".$_SESSION['id']."','".date('Y-m-d H:i:s')."');";
		echo $query;
		//echo "Inserting";
		$result= mysql_query($query);
		if($result)
		{
			$this->id=intval(mysql_insert_id());
			//echo "updating ".$this->id;
			
			$this->path= "../submissions/".$this->id.'.'.$this->extension; 

			$query= "UPDATE ".DBNAME.".".SUBMS_TBL." SET FILEPATH= '".$this->path."' where subid= '".$this->id."';";

			$output= mysql_query($query);
			if($output)
			return 1;
			echo "Error: ".mysql_error();


			
		}
		echo "Error: ".mysql_error();

		return 0;
	}
	


}


?>
