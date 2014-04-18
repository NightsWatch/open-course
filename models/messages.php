<?php

require 'dbs.php';

class messages {

	function __construct() {
		$dbs = New dbs();
		$conn = $dbs ->connect();
	}

	public function getInbox($userid) {
		echo $userid;
		$query = "select username, message from users,messages where messages.receiverid='".$userid."' and users.userid=messages.senderid;";
		$result=mysql_query($query);
		
		while($row = mysql_fetch_array($result)) {
			echo $row['username'],$row['message'];
			}

		if(!$result) {
    		die("Database query failed: " . mysql_error());
		}
		return $result;
	}

	public function insertMessage($senderid, $receiverid, $message)
	{	
		$query = "insert INTO ".DBNAME.".".MSGS_TBL." (senderid, receiverid, message, seen) 
		VALUES ('".$senderid."','".$receiverid."','".$message."',0);";

		$result=mysql_query($query);

		if(!$result) {
    		die("Database query failed: " . mysql_error());
		}
		return $result;
	}

	public function changeSeen($messageid,$seen)
	{
		$query = "UPDATE 'messages' SET 'seen'='".$seen."' WHERE 'messageid'='".$messageid."';";
		$result=mysql_query($query);

		if(!$result) {
    		die("Database query failed: " . mysql_error());
		}
		return $result;
	}
public function getUserid($username)
	{
		$query = "select userid from users where username='".$username."';";
		$result=mysql_query($query);	
		$query_row=mysql_fetch_array($result);

		if(!$result) {
    		die("Database query failed: " . mysql_error());
		}
		return $query_row['userid'];
	}

}


?>