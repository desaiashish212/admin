	<? session_start();
	   include_once('connection.php');
	   
	   $cat_id=$_GET["id"];
		  
	  
	   $res=mysqli_query($con,"update category set status ='0' where id='$cat_id'");
	if($res<=0)
   {
   		$_SESSION["MSG"]="problem while desabling category";
		header("Location: h_category.php?");	
   }
   else
   {
   		$_SESSION["MSG"]="Category desabled.";
		header("Location: h_category.php");	
   }
	?>