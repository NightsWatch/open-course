<?php

include_once 'dbs.php';


class faculty
{
	function __construct()
		{
			$db= New dbs();
			$db->connect();
		}

	public function getCourses($facultyid)
	{
		$query = "select courseid from coursefacallotment where facultyid=".$facultyid.";";
		$result = mysql_query($query);
		return $result;
	}
}