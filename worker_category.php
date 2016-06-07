<?php session_start();
	include_once('connection.php');
	
	$lang=$_POST["status"];
	$name=$_POST["name"];
	
	$sql = "SELECT COUNT(*) FROM category WHERE category.lang_status='$lang'";
	$result=mysqli_query($con,$sql);
	$row = mysqli_fetch_row($result);
	$max = $row['0']+1;
	
	$sql = "insert into category (caregory_name,lang_status,priority) values ('$name','$lang','$max')";
	
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