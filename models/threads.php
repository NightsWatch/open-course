<?php


require_once 'dbs.php';

class threads{
	public function getPosts($threadid)
	{
		$query = "select postid, userid, timestamp,content from ".POSTS_TBL." where threadid='".$threadid."';";
		$result= mysql_query($query);
		return $result;
	}

	public function getThreads($courseid)
	{
		$query = "select threadid, threadtitle from ".FORUMS_TBL." where courseid='".$courseid."';";
		$result= mysql_query($query);
		return $result;		
	}
}
?>