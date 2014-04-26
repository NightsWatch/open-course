<?php

session_start();

include '../models/threads.php';

if( isset($_POST['title']) )
{
	$threads = New threads();

	$title = mysql_real_escape_string($_POST['title']);
	$courseid = $_GET['cid'];
	$userid = $_SESSION['id'];
	if ($threads->newThread($title,$courseid,$userid)== 1 )
			{
				echo 'success';
				header('Location: ../views/forum.php?cid='.$courseid.'');
			}

	//	$msgs->getInbox($senderid);
}

?>