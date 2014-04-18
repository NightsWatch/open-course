<?php

include '../models/messages.php';

session_start();

if( isset($_POST['receiverusername']) && isset($_POST['message']))
{
	$msgs = New messages();

	$receivername = mysql_real_escape_string($_POST['receiverusername']);
	$message = mysql_real_escape_string($_POST['message']);
	$sendername = mysql_real_escape_string($_SESSION["username"]);
	$senderid=$msgs->getUserid($sendername);
	$receiverid=$msgs->getUserid($receivername);

	if( ($msgs->insertMessage($senderid, $receiverid, $message) )== -1 )
			header('Location: ../views/inbox.php');

	//	$msgs->getInbox($senderid);
}

?>