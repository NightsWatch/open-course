<?php

session_start();
include '../models/notifications.php';
$ntf = New notifications();

$type = $_GET['id'];
if($type==1)
	$ntf->setSeenThreads();
if ($type==2)
	$ntf->setSeenAssignments();
else
	$ntf->setSeenLectures();



if($_SESSION['usertype']=="Student")
	header("Location: ../views/notifications.php");
else
	header("Location: ../views/notificationsfac.php");
?>
