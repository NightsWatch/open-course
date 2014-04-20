<?php


include '../models/notifications.php';
$ntf = New notifications();

$type = $_GET['id'];
if($type==1)
	$ntf->setSeenThreads();
if ($type==2)
	$ntf->setSeenAssignments();
else
	$ntf->setSeenLectures();

header("Location: ../views/notifications.php");
?>
