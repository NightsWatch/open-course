<?php

include_once 'dbs.php';
include_once '../models/courses.php';
include_once '../models/user_details.php';


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
			//$row=$crs->getCourseDetails($courseid);

			//if($row['year']<date("Y"))
				//return 2;
			
			$query = "INSERT INTO coursemgs.coursestudregistration (courseid, studentid) values ('".$courseid."',
					'".$studid."');";

			$result= mysql_query($query);
			if($result)
			{
				return 1;
			}

				echo "Error: ".mysql_error();
				return 0;


		}

		public function deRegisterStudent($studid, $courseid)
		{
			$query = "DELETE FROM coursemgs.coursestudregistration where courseid='".$courseid."' and studentid='".$studid."';";
			//echo $query;
			$result= mysql_query($query);
			if($result)
			{
				//echo 'removed';
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
				if(mysql_num_rows($result) > 0)
				{
					//echo 'registered';
					return 1;
				}

				else 
					return 0;
			}

			echo "Error: ".mysql_error();

			return -1;

		}


		public function checkCreditsTotal($userid, $courseid)
		{
			$maxcredits=48;

			$user= New user_details();

			$course= New courses();

			$courselist=$user->getCoursesReg($userid);

			$credits=$course->getCourseCredits($courseid);


			while($row=mysql_fetch_array($courselist))
			{

				$regcredits=$course->getCourseCredits($row['courseid']);
				$credits= $credits+$regcredits;

			}

			echo mysql_error();
			if($credits<$maxcredits)
				return 1;
			else
				return 0;


		}


		public function getRegisteredCredits($userid)
		{
			$maxcredits=48;

			$user= New user_details();

			$course= New courses();

			$courselist=$user->getCoursesReg($userid);

			$credits=0;


			while($row=mysql_fetch_array($courselist))
			{

				$regcredits=$course->getCourseCredits($row['courseid']);
				$credits= $credits+$regcredits;

			}

			echo mysql_error();
			return $credits;


		}



}

?>