<?php

include '../models/notifications.php';

session_start();

if( isset($_POST['receiverusername']) && isset($_POST['message']))
{
	$msgs = New messages();

	$receivername = mysql_real_escape_string($_POST['receiverusername']);
	$message = mysql_real_escape_string($_POST['message']);
	$sendername = mysql_real_escape_string($_SESSION["username"]);
	$senderid=$msgs->getUserid($sendername);
	$receiverid=$msgs->getUserid($receivername);

	//$phpdate = strtotime( $mysqldate );
	//$mysqldate = date( 'Y-m-d H:i:s', $phpdate );
	$date = date('Y-m-d H:i:s');
	if ($msgs->insertMessage($senderid, $receiverid, $message, $date)== -1 )
			{
				
				header('Location: ../views/inbox.php');
			}
}

?>