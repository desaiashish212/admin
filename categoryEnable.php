	<? session_start();
	   include_once('connection.php');
	   
	   $id = $_GET["id"];
	   $lang = $_GET["lang"];
		
		
	   $res=mysqli_query($con,"update category set status ='1' where id='$id' and lang_status='$lang'");
	if($res<=0)
   {
   		if($lang==1){
			$_SESSION["MSG"]="problem while enabling category.";
			header("Location: m_category.php?");	
		}else if($lang==2){
			$_SESSION["MSG"]="problem while enabling category.";
			header("Location: h_category.php?");	
		}else{
			$_SESSION["MSG"]="problem while enabling category.";
			header("Location: e_category.php?");	
		}
   		
   }
   else
   {
   		if($lang==1){
			$_SESSION["MSG"]="category enabled.";
			header("Location: m_category.php?");	
		}else if($lang==2){
			$_SESSION["MSG"]="category enabled.";
			header("Location: h_category.php?");	
		}else{
			$_SESSION["MSG"]="category enabled.";
			header("Location: e_category.php?");	
		}
   }
	?>