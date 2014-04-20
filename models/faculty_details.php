<?php

include_once 'dbs.php';

class faculty_details {


	function __construct() 
	{
		$dbs = New dbs();

		$conn = $dbs ->connect();

	}


	public function getFacDetails($id)
	{
		$query= "SELECT * coursemgs.faculty WHERE userid= '".$id."';";
				$result = mysql_query($query);

		if($result)
		{
			if(mysql_num_rows($result) > 0)
			{
				return $result;
			}
			
			return 0; // no results found
		
		}

		return 0;

	}


	
}



?>