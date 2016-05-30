	<? session_start();
	   include_once('connection.php');
	   
	   $cat_id=$_GET["id"];
	  
	  
	   
	   $res=mysqli_query($con,"delete from advertise where id=$cat_id");
	if($res<=0)
   {
   		$_SESSION["MSG"]="Advertise not deleted, Try Again";
		header("Location: advertise.php?");	
   }
   else
   {
   		$_SESSION["MSG"]="Advertise deleted";
		header("Location: advertise.php");	
   }
	?>