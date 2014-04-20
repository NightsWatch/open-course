<?php

include 'dbs.php';
include_once 'courses.php';

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
			$crs=New courses();
			$row=$crs->getCourseDetails($courseid);

			if($row['year']<date("Y"))
				return 2;
			
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
			and studentid=".$studid.";";
				
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