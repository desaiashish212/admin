<?php session_start();
	include_once('connection.php');
	$uname=$_POST["username"];
	$pass=$_POST["password"];
	
	$login_query="SELECT login.user_id, login.user_name FROM login where login.user_name='".$uname."' and login.user_pass='".$pass."' ";
	
	$query=mysqli_query($con,$login_query);
	
	$query_rs=mysqli_fetch_row($query);
	$userid=$query_rs[0];
	$username=$query_rs[1];
	
	if($userid!=0 and $username=='admin')
	{
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