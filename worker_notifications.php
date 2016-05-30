<?php session_start();
	include_once('connection.php');
	
	$message=$_POST["message"];
	$languages=$_POST["languages"];
	
	//$res=mysql_query("insert into category (caregory_name,lang_status) values ('$name','$lang')");
	$sql = "insert into notifications (messages,language) values ('$message','$languages')";
	//$aff=mysql_affected_rows();
	$result = mysqli_query($con, $sql);
	
	if($sql)
   {
			$_SESSION["MSG"]="Success";
			header("Location: notifications.php");
   }
   else
   {

			$_SESSION["MSG"]="Category not added, Try Again";
			header("Location: notifications.php");
   		
   }
?>