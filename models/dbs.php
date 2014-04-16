<?php 

//Class to connect, select, and close the database
include 'dbheader.php';
class dbs{
	private $host,$username,$pass,$mydb; // server address, username, pass

	public function dbs(){
			$this->host = HOSTNAME;
			$this->username = DBUSER;
			$this->pass = DBPASS;
			$this->mydb = DBNAME;
	}

	public function connect()
	{
		echo  "hjhj";
		$con = mysql_connect($this->host, $this->username, $this->pass ); 
		//echo "print con".$con;
		if(!$con){
					echo "Not connected to database";	

			// unsuccessful
			return -1;
		}
		else
		{	
			if( !$ret= mysql_select_db(DBNAME, $con))
			{
			 echo "\nFailed to database";
			   die('\nCould not connect: ' . mysql_error());
	
			}
			return $con;
		}		

	}

	public function selectdb($value=DBNAME, $conn)
	{
		if(!$ret = mysql_select_db($value, $conn)){
  die('\nCould not connect: ' . mysql_error());
			return -1;
		}else{
			echo "success";
			return $ret;
		}
	}

	public function close($con)
	{
		if(!mysql_close($con)){
			return -1;
		}else{
			return 1;
		}
	}

	
	public function query($query,$con)
	{
		
		$result = mysql_query($query,$con);
		return $result;
	}
}


 ?>