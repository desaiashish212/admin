<? session_start();
   include_once('connection.php');
   
   $news_id=$_GET["id"];
   $status=$_GET["status"];

   
   $res=mysqli_query($con,"update advertise set status='$status' where id=$news_id");

   //echo $aff= mysqli_affected_rows($res);
   //exit;
   if($res<=0)
   {
   		
		header("Location: advertise.php");	
   }
   else
   {
   		
		header("Location: advertise.php");	
   }


?>