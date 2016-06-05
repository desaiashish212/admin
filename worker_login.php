<?php session_start();
	include_once('connection.php');
	$uname=$_POST["username"];
	$pass=$_POST["password"];
	
	$login_query="SELECT login.user_id,login.user_name, login.user_pass FROM login WHERE login.user_name = '$uname' AND
login.user_pass = '$pass'";
	
	$query=mysqli_query($con,$login_query);
	if($query_rs=mysqli_fetch_row($query)){
		$userid=$query_rs[0];
		$username=$query_rs[1];
		$_SESSION["id"]=$userid;
		$_SESSION["user"]=$username;
		header("Location:index.php");
		
	}
	else
	{
		$_SESSION["ERROR"]="Incorrect Username Or Password";
		header("Location: login.php");
	}
 ?>