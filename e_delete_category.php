	<? session_start();
	   include_once('connection.php');
	   
	   $cat_id=$_GET["id"];
	  
	  
	   
	   $res=mysqli_query($con,"delete from category where id=$cat_id");
	if($res<=0)
   {
   		$_SESSION["MSG"]="News not deleted, Try Again";
		header("Location: e_category.php?");	
   }
   else
   {
   		$_SESSION["MSG"]="News deleted";
		header("Location: e_category.php");	
   }
	?>