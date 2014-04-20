<?php

include_once '../models/courses.php';


$courses = New courses();

$row = $courses->getCourseDetails($courseid);
echo 'Forum for '.$row['coursename'].', '.$row['year'];
?>