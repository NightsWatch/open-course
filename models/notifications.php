<?php

require 'dbs.php';

class notifications {

	function __construct() {
		$dbs = New dbs();
		$conn = $dbs ->connect();
	}
	
	public function addNotification($foruserid, $fromuserid,$type)
	{
		$query = "insert into notifications ("
	}
}


?>