<?php

session_start();

include '../models/messages.php';


if( isset($_POST['receiverusername']) && isset($_POST['message']))
{
	$msgs = New messages();

	$receivername = mysql_real_escape_string($_POST['receiverusername']);
	$message = mysql_real_escape_string($_POST['message']);
	$senderid=$_SESSION['id'];
	$receiverid=$msgs->getUserid($receivername);

	//$phpdate = strtotime( $mysqldate );
	//$mysqldate = date( 'Y-m-d H:i:s', $phpdate );
	$date = date('Y-m-d H:i:s');
	if ($msgs->insertMessage($senderid, $receiverid, $message, $date)== -1 )
			{
				header('Location: ../views/inbox.php?done=0');
			}
		else
		{
			header ('Location: ../views/inbox.php');
		}

	//	$msgs->getInbox($senderid);
}

?>