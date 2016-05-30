<?php session_start();
	include_once('connection.php');
	
	$lang=$_POST["status"];
	$name=$_POST["name"];
	
	//$res=mysql_query("insert into category (caregory_name,lang_status) values ('$name','$lang')");
	$sql = "insert into category (caregory_name,lang_status) values ('$name','$lang')";
	//$aff=mysql_affected_rows();
	$result = mysqli_query($con, $sql);
	
	if($sql)
   {
	   if($lang==1){
			$_SESSION["MSG"]="Success";
			header("Location: m_category.php");
	   }else if($lang==2){
			$_SESSION["MSG"]="Success";
			header("Location: h_category.php");
	   }else if($lang==3){
		   $_SESSION["MSG"]="Success";
			header("Location: e_category.php");
	   }
   }
   else
   {
	   if($lang==1){
			$_SESSION["MSG"]="Category not added, Try Again";
			header("Location: m_category.php");
	   }else if($lang==2){
			$_SESSION["MSG"]="Category not added, Try Again";
			header("Location: h_category.php");
	   }else if($lang==3){
		   $_SESSION["MSG"]="Category not added, Try Again";
			header("Location: e_category.php");
	   }
   		
   }
?>