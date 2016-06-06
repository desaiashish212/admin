<? session_start();
   include_once('connection.php');
   
   $lang = $_GET['lang'];
   $flash_text = $_POST['flash_text'];
   
   if($lang==="mar"){
   		$res=mysqli_query($con,"UPDATE flash SET flash.flashMarathi='$flash_text'");
   		$_SESSION["FLASH_SUCC"]="Flash text updated";
		header("Location:index.php");
   }else if($lang === "hin"){
   		$res=mysqli_query($con,"UPDATE flash SET flash.flashHindi='$flash_text'");
   		$_SESSION["FLASH_SUCC"]="Flash text updated";
		header("Location:index.php");
   }else if($lang === "eng"){
   		$res=mysqli_query($con,"UPDATE flash SET flash.flashEnglish='$flash_text'");
   		$_SESSION["FLASH_SUCC"]="Flash text updated";
		header("Location:index.php");
   }else{
   		$_SESSION["FLASH_SUCC"]="Problem while updating flash text";
		header("Location:index.php");
   }
?>