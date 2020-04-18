<?php
session_start();
	include '../../global/db.php';

if(isset($_POST['login-button'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query="select * from admin_info where username='$username' and password='$password'";
	$result=$conn->query($query);
	if($result->num_rows>0){
		$_SESSION['username']=$username;
		header('location: ../index.php');
	}else{
		$_SESSION['login-error']= 'Username/password is invalid';
		header('location: ../login.php');
	}

}

 ?>