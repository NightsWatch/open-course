<?php

include_once 'dbs.php';


class allotthesis
{
	function __construct()
		{
			$db= New dbs();
			$db->connect();
		}

	public function addTP($studentid,$facultyid,$title,$year,$field)
	{
		
		$al = New allotthesis();
		if($al->checkInsert($studentid)==0)
		{
			$query="insert into thesis(studentid,facultyid,title,year,field) values(".$studentid.",".$facultyid.",'".$title."','".$year."','".$field."');";
			echo $query;
			$result = mysql_query($query);
			if($result)
			{
				return 1;
			}

			echo "Error: ".mysql_error();
			return 0;	
		}

		else
		{
			$query="update thesis set title='".$title."',year='".$year."',field='".$field."' where studentid=".$studentid." and facultyid=".$facultyid.";";
			echo $query;
			$result = mysql_query($query);
			if($result)
			{
				return 1;
			}

			echo "Error: ".mysql_error();
			return 0;	
		
		}

		

	}


	public function removeTP($userid)
	{
		$query = "delete from thesis where studentid='".$userid."'	;";
		$result = mysql_query($query);
		if($result)
		{
			echo 'removed';
			return 1;

		}
		echo mysql_error();
		return 0;
	}


	public function getTP($userid)
	{
		$query="select a.title as title, a.year as year, a.field as field, b.name as facultyname from thesis as a,faculty as b where studentid='".$userid."' and a.facultyid=b.userid;";
		$result=mysql_query($query);
		if($result)
		{
			return mysql_fetch_array($result);
		}

		echo mysql_error();
		return 0;
	}

		public function checkInsert($studid)
		{
			$query = "SELECT * FROM thesis where studentid=".$studid.";" ;
				
			$result= mysql_query($query);

			if($result)
			{
				if(mysql_num_rows($result) > 0)
				{
					$row=mysql_fetch_array($result);

					return $row['facultyid'];
				}

				else 
					return 0;
			}

			echo "Error: ".mysql_error();

			return -1;

		}

}