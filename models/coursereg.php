<?php

include 'dbs.php';

class coursereg
{

	private $id, $assnno, $deadline, $maxmarks, $extension, $path, $assn_name;


	function __construct()
		{
			$db= New dbs();
			$db->connect();

			
			$this->id= NULL;
			$this->extension=NULL;
			$this->path=NULL;
		}


		public function registerStudent($studid, $courseid)
		{
			$query = "INSERT INTO coursemgs.coursestudregistration (courseid, studentid) values ('".$courseid."',
					'".$studid."');";

			$result= mysql_query($query);
			if($result)
			{
				echo "Registered";
				return 1;
			}

				echo "Error: ".mysql_error();
				return 0;


		}


		public function checkstudreg($studid, $courseid)
		{
			$query = "SELECT * FROM coursemgs.coursestudregistration  where courseid='".$courseid."' 
			&& studentid='".$studid."');";
				
			$result= mysql_query($query);
			if($result)
			{
				echo "Registered";
				return 1;
			}

			echo "Error: ".mysql_error();

			return 0;

		}

}