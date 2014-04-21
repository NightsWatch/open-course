<?php


require_once 'dbs.php';
include_once '../models/courses.php';

class threads{


	function __construct()
		{
			$db= New dbs();
			$db->connect();
		}

	public function newThread($title, $courseid, $userid)
	{
		//echo $title;
		//echo $courseid;
		$query = "insert into coursemgs.forums (courseid, threadtitle,starterid) values('".$courseid."','".$title."','".$userid."');";
		//echo $query;
		$result=mysql_query($query);
		if(!$result)
			echo mysql_error();
		else
		{
			$threadid=mysql_insert_id();
			return $this->addThreadNotif($threadid);

		}
		return $result;
	}



	public function addThreadNotif($threadid)
	{
		$courseid= $this->getCourseidfromthread($threadid);

		$course= New courses();

		$results= $course->getCourseStudents($courseid);

		while($row= mysql_fetch_array($results))
		{
			if($row['userid']!=$_SESSION['id'])
			{	$query = "insert into notifsthreads (foruserid,threadid) values('".$row['userid']."', '".$threadid."');";

				$output= mysql_query($query);

				if($output)
				{	
					echo "added notifs";
				
				}
				
			}
		}

		$results = $course->getCourseInstructor($courseid);

		while($row= mysql_fetch_array($results))
		{
			if($row['userid']!=$_SESSION['id'])
			{
				$query = "insert into notifsthreads (foruserid,threadid) values('".$row['userid']."', '".$threadid."');";

				$output= mysql_query($query);

				if($output)
				{	
					echo "added notifs";
				
				}
			}

		}

		return 1;

	} 

	public function addPost($postmsg,$threadid)
	{
		$query = "insert into posts (postid, threadid, userid, content) values( DEFAULT,'".$threadid."', '".$_SESSION['id']."' , '".$postmsg."');";

			$output= mysql_query($query);

			if($output)
				return $output;
			else
				return 0;


	}


	public function getPosts($threadid)
	{
		$query = "select postid, userid, timestamp,content from ".POSTS_TBL." where threadid='".$threadid."';";
		$result= mysql_query($query);
		return $result;
	}

	public function getThreads($courseid)
	{
		$query = "select threadid, threadtitle,starterid from ".FORUMS_TBL." where courseid='".$courseid."';";
		$result= mysql_query($query);
		return $result;		
	}

	public function getCourseidfromthread($threadid)
	{
		$query = "select courseid from forums where threadid='".$threadid."';";
		$result= mysql_query($query);
		$row = mysql_fetch_array($result);
		return $row['courseid'];	
	}

	public function getFirstPost($threadid)
	{
		$query = "select posts.content, posts.userid from posts where threadid='".$threadid."';";
		$result = mysql_query($query);
		$row=mysql_fetch_array($result);
		return $row;
	}

	public function getTitle($threadid)
	{
		$query = "select threadtitle from forums where threadid='".$threadid."';";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		return $row['threadtitle'];
	}

	public function getTime($threadid)
	{
		$query = "select timestamp from forums where threadid='".$threadid."';";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		return $row['timestamp'];	
	}


	public function getStarter($threadid)
	{
		$query = "select starterid from forums where threadid='".$threadid."';";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		return $row['starterid'];	
	}
}
?>