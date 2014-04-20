<?php

require_once 'dbs.php';

class messages {

	function __construct() {
		$dbs = New dbs();
		$conn = $dbs ->connect();
	}
	public function doesExistUnread($senderid, $receiverid){
		$query = "select count(*) as count from messages where messages.senderid='".$senderid."' and messages.receiverid='".$receiverid."' and messages.seen=0;";
		$result = mysql_query($query);

		$row = mysql_fetch_array($result);
		if ($row['count'] >0)
			return 1;
		else
			return 0;

	}
	public function getUnreadCount($loggedinuserid)
	{
		$query = "select count(*) as count from messages where messages.receiverid='".$loggedinuserid."' and seen=0;";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);

		return $row['count'];
	}
	public function setAllSeen ($senderid, $receiverid){
		//
		$query = "update messages set seen=1 where senderid='".$senderid."' and receiverid='".$receiverid."' and seen=0;";
		$result = mysql_query($query);
			if(!$result) {
    		die("Database query failed: " . mysql_error());
		}
		return $result;
	}
	public function getInboxMessages($inboxofuser,$userid) {
		
		//echo $userid;
		$query = "select messages.message,messages.seen,messages.senderid, messages.receiverid, messages.timestamp from users, messages where ((messages.receiverid='".$inboxofuser."' and messages.senderid='".$userid."')or (messages.senderid='".$inboxofuser."' and messages.receiverid='".$userid."')) and users.userid=messages.senderid order by messages.timestamp DESC ;";		
		$result=mysql_query($query);
		// while($row = mysql_fetch_array($result)) {
		// 	echo $row['username'],$row['message'],$row['seen'];
		// 	}

		if(!$result) {
    		die("Database query failed: " . mysql_error());
		}
		return $result;
	}

	public function getInboxUsers($userid) {
		//echo $userid;
		$query = "select distinct username, messages.seen from users, messages where messages.receiverid='".$userid."' and users.userid=messages.senderid;";
		$result=mysql_query($query);
		
		// while($row = mysql_fetch_array($result)) {
		// 	echo $row['username'],$row['message'],$row['seen'];
		// 	}

		if(!$result) {
    		die("Database query failed: " . mysql_error());
		}
		return $result;
	}

	public function insertMessage($senderid, $receiverid, $message, $datetime)
	{	
		$query = "insert INTO ".DBNAME.".".MSGS_TBL." (senderid, receiverid, message, seen, timestamp) 
		VALUES ('".$senderid."','".$receiverid."','".$message."',0,'".$datetime."');";

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

public function getUsername($userid)
	{
		$query = "select username from users where userid='".$userid."';";
		$result=mysql_query($query);	
		$query_row=mysql_fetch_array($result);

		if(!$result) {
    		die("Database query failed: " . mysql_error());
		}
		return $query_row['username'];
	}

}


?>