<? session_start();
   include_once('connection.php');
   
   $privacy = $_POST["privacy"];
  
   $res=mysqli_query($con,"update other SET privacy = '$privacy'");

   if($res<=0)
   {
   		$_SESSION["PRI"]="Failed to update";
		header("Location: index.php");	
   }
   else
   {
   		$_SESSION["PRI"]="Updated Successfully";
		header("Location: index.php");	
   }
  

?>