<?php

include_once 'dbs.php';


class tareg
{
	function __construct()
		{
			$db= New dbs();
			$db->connect();
		}

	public function getTaCourses($taid)
	{
		$query = "select courseid from coursetaallotment where taid=".$taid.";";
		//echo $query;
		$result = mysql_query($query);
		
		//echo mysql_error();
		//echo $row;
		//echo $row['courseid'];
		return $result;
	}
}