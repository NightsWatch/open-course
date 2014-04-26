<?php

require '../models/threads.php';

session_start();

if( isset($_POST['postmsg']) && isset($_GET['threadid']) )
{
	$postmsg = mysql_real_escape_string($_POST['postmsg']);
	$threadid = mysql_real_escape_string($_GET['threadid']);

	$threads = New threads();

	if( ($threads->addPost($postmsg, $threadid) ) ==1 )
		header('Location: ../views/thread.php?tid='.$threadid.'');
		//echo "added";

		else
		header("Location: ../views/thread.php?added=0");
}

?>