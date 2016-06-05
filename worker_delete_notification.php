 	<? session_start();
	   include_once('connection.php');
	   
	   $id=$_GET["id"];
	  
	   
	   $res=mysqli_query($con,"delete from notifications where id=$id");
	if($res<=0)
   {
   		$_SESSION["MSG"]="Try Again";
		header("Location: notifications.php");	
   }
   else
   {
   		$_SESSION["MSG"]="Notification deleted";
		header("Location: notifications.php");	
   }
	?>