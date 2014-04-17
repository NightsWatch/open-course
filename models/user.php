<?php

require 'mysql.php';

class user {

	public function checkUsername($un)
	{
		$mysql = New mysql();
		return $mysql->checkUsername($un);
	}
	

	public function checkEmail($eml)
	{
		$mysql = New mysql();
		return $mysql->checkEmail($un);
	}

	
	function validate_user($un, $pwd) {
		$mysql = New mysql();
		$ensure_credentials = $mysql->verify_Username_and_Pass($un, md5($pwd));
		
		if($ensure_credentials) {
			$_SESSION['status'] = 'authorized';
			// header("location: ../views/index.php");
		} else return "Please enter a correct username and password";
		
	} 
	
	function log_User_Out() {
		if(isset($_SESSION['status'])) {
			unset($_SESSION['status']);
			
			if(isset($_COOKIE[session_name()])) 
				setcookie(session_name(), '', time() - 1000);
				session_destroy();
		}
	}
	

	
	// function mail_pass($un, $eml) {
	// 	$mysql = New mysql();
	// 	$ensure_credentials = $mysql->verify_Username_and_Email($un, $eml);
		
	// 	if($ensure_credentials) {
	// 		return $mysql->set_new_password($un,$eml);
	// 	} else return "Please enter a correct username and password";
		
	// }
	
	function confirm_Member() {
		session_start();
		if($_SESSION['status'] !='authorized') header("location: login.php");
	}
	
}
