<?php

require '../models/user.php';

session_start();

if( isset($_POST['username']) && isset($_POST['password']) )
{
	$username = mysql_real_escape_string($_POST['username']);
	$pass = mysql_real_escape_string($_POST['password']);

	$user = New user();

	echo $user->validate_user($username,$pass);

}

?>