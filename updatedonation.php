<? session_start();
   include_once('connection.php');
   
   $donation = $_POST["donation"];
  
   $res=mysqli_query($con,"update other SET donation = '$donation'");

   if($res<=0)
   {
   		$_SESSION["DON"]="Failed to update";
		header("Location: index.php");	
   }
   else
   {
   		$_SESSION["DON"]="Updated Successfully";
		header("Location: index.php");	
   }
  

?>
