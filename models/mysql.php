<?php

require 'dbs.php';


class mysql {


	private $conn, $dbs;

	public $regUserid;

	function __construct() {
		$dbs = New dbs();

		$conn = $dbs ->connect();

	}

	function verify_Username_and_Pass($un, $pwd) 
	{

		$query = "SELECT * FROM ".DBNAME.".".USERS_TBL." where username='".$un."' AND password='".$pwd."';";
		$result = mysql_query($query);
		$flag = 0;
		while($row = mysql_fetch_array($result)){
			$flag = 1;

			$_SESSION['username']= $row['username'];
			$_SESSION['id']= $row['userid'];
			$_SESSION['usertype']= $row['usertype'];

		}
		if($flag==1){

			return true;
		}

		return false;		
	}


	function checkEmail($eml) 
	{

		$query = "SELECT * FROM ".DBNAME.".".USERS_TBL." where email='".$eml."';";
		$result = mysql_query($query);
		$flag = 0;
		while($row = mysql_fetch_array($result)){
			$flag = 1;

		}
		if($flag==1){

			return true;
		}
		else return false;

	}



	public function checkUsername($un)
	{
		$un = mysql_real_escape_string($un);

		$query = "SELECT * FROM ".DBNAME.".".USERS_TBL." where username='".$un."';";
		$result= mysql_query($query);
		$flag=0;
		while ($row = mysql_fetch_assoc($result)) {
			$flag=1;		   	    
		}

		//echo $flag;
		if($flag){			
			return 1;
		}else 
		{
			return 0;
		}
	}




	public function addUser($un,$pass,$email,$usertype)
	{
		$un = mysql_real_escape_string($un);
		$pass = mysql_real_escape_string($pass);
		$email = mysql_real_escape_string($email);
		$usertype = mysql_real_escape_string($usertype);

		$pass_hash = md5($pass);

		$query = "INSERT INTO ".DBNAME.".".USERS_TBL." (userid, username, password, email_id, usertype) values (DEFAULT,'".$un."','".$pass_hash."','".$email."','".$usertype."');";

		$result= mysql_query($query);
		//echo "\nprint ".$result;
		if($result)
		{
			// set regUserid
			$regUserid= mysql_insert_id();

			$_SESSION['id']= $regUserid;
			$_SESSION['username']= $un;
			$_SESSION['status']= "authorised";

			return 1;
		}
		  die('\nCould not insert: ' . mysql_error());

		return 0;


	}



	public	function insertStudDetails($userid, $name, $program, $batch, $dept, $rollno) 
	{

		$userid = mysql_real_escape_string($userid);
		$name = mysql_real_escape_string($name);
		$program = mysql_real_escape_string($program);
		$batch = mysql_real_escape_string($batch);
		$dept = mysql_real_escape_string($dept);		
		$rollno = mysql_real_escape_string($rollno);

		$query = "INSERT INTO ".DBNAME.".".STUD_TBL." (userid, name, program, batch, department, roll) values('".$userid."','".$name."','".$program."','".$batch."','".$dept."', '".$rollno."');";

		$result= mysql_query($query);
		if($result)
		{
			//echo "success";
			return 1;
		}

		echo "failed ".mysql_error();

		return 0;
	}



	public	function updateStudDetails($userid, $name, $program, $batch, $dept, $rollno) 
	{

		$userid = mysql_real_escape_string($userid);
		$name = mysql_real_escape_string($name);
		$program = mysql_real_escape_string($program);
		$batch = mysql_real_escape_string($batch);
		$dept = mysql_real_escape_string($dept);		
		$rollno = mysql_real_escape_string($rollno);

		$query = "UPDATE ".DBNAME.".".STUD_TBL." SET  name='".$name."', program='".$program."', batch='".$batch."', department='".$dept."',  roll='".$rollno."' where userid= '".$userid."';";	

		$result= mysql_query($query);
		if($result)
		{
			//echo "success";
			return 1;
		}

		echo "failed ".mysql_error();

		return 0;
	}


	public	function insertFacDetails($userid, $name, $dept, $desgn, $joined) 
	{

		$userid = mysql_real_escape_string($userid);
		$name = mysql_real_escape_string($name);
		$program = mysql_real_escape_string($program);
		$batch = mysql_real_escape_string($batch);
		$dept = mysql_real_escape_string($dept);		
		$rollno = mysql_real_escape_string($rollno);
		$ista = mysql_real_escape_string($ista);

		$query = "INSERT INTO ".DBNAME.".".FAC_TBL." (userid, name, department, designation, joined) values('".$userid."','".$name."','".$dept."','".$desgn."','".$joined."' );";

		$result= mysql_query($query);
		if($result)
		{
			return 1;
		}

		return 0;
	}


	public	function updateFacDetails($userid, $name, $dept, $desgn, $joined) 
	{

		$userid = mysql_real_escape_string($userid);
		$name = mysql_real_escape_string($name);
		$program = mysql_real_escape_string($program);
		$batch = mysql_real_escape_string($batch);
		$dept = mysql_real_escape_string($dept);		
		$rollno = mysql_real_escape_string($rollno);
		$ista = mysql_real_escape_string($ista);

		$query = "UPDATE ".DBNAME.".".FAC_TBL." SET name='".$name."', department='".$dept."', designation='".$desgn."', joined='".$joined."' where userid= '".$userid."';";

		$result= mysql_query($query);
		if($result)
		{
			return 1;
		}

		return 0;
	}



	public function search($table, $searchquery, $field)
	{
		//echo "";
		$query= "SELECT * FROM ".DBNAME.".".$table." where ".$field." LIKE '%".$searchquery."%';";

		$result= mysql_query($query);
		if($result)
		{
			if(mysql_num_rows($result) > 0)
			{
				echo "returning";
					echo mysql_error();
				$row= mysql_fetch_array($result);
				echo "name: ".$row['assign_name'];
				return $row;

			}
			else
			{
				echo mysql_error();
				return -1;
			}
		}

		echo "Invalid search query ".$result;

		return -1;

	}

	public function getFill($username)
	{
		$query="select fill from users where username=".$username.";";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);

		return $row['fill'];

	}


	public function setFill($userid)
	{
		$query="update users set fill=1 where userid=".$userid.";";
		$result = mysql_query($query);
		return $result;

	}
}