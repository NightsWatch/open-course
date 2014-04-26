<?php

include_once 'dbs.php';


class allotcourseta
{
	function __construct()
		{
			$db= New dbs();
			$db->connect();
		}

	public function allot_ta($userid, $courseid)
	{
		$query = "insert into coursetaallotment (ctallotid, courseid, taid) values (DEFAULT, '".$courseid."', '".$userid."');";
		$result = mysql_query($query);
		if($result)
		{
			$query="update students set ista=ista+1 where userid='".$userid."';";
			$result = mysql_query($query);
			echo mysql_error();
			return $result;

		}
		return $result;
	}


	public function remove_ta($userid, $courseid)
	{
		$query = "delete from coursetaallotment where courseid='".$courseid."' &&  taid='".$userid."'	;";
		$result = mysql_query($query);
		if($result)
		{
			$query="update students set ista=ista-1 where userid='".$userid."';";
			$result = mysql_query($query);
			echo mysql_error();
			return $result;

		}
		echo mysql_error();
		return $result;
	}


	public function checkTacourse($userid,$courseid)
	{
		$query= "select * from coursetaallotment where courseid='".$courseid."' && taid='".$userid."';";

		$result = mysql_query($query);
		if($result)
		{
			if(mysql_num_rows($result) > 0)
			{
				return 1;
			}
			echo mysql_error();
			return 0;
		}
					echo mysql_error();

		return 0;

	}

}