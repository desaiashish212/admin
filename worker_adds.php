<?php session_start();
if(isset($_SESSION["id"]) and isset($_SESSION["user"]))
{
include_once('connection.php');
		$lang = $_POST['language'];	// Advertisement language 1 = mar, 2 = hin, 3 = eng
	   if(isset($_FILES['file'])){
      $errors= array();
echo      $file_name = $_FILES['file']['name'];
      $file_size =$_FILES['file']['size'];
      $file_tmp =$_FILES['file']['tmp_name'];
      $file_type=$_FILES['file']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));

      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"banner/".$file_name);
        // echo "Success";
         $path = "banner/".$file_name;
         echo $path;
         echo $res=mysqli_query($con,"insert into advertise (path,status,language) values ('$path',1,$lang)");
         
          if($res<=0)
		   {
				$_SESSION["MSG"]="Banner is not added, Try Again";
				header("Location: advertise.php");	
		   }
		   else
		   {
				$_SESSION["MSG"]="Banner update Successfull";
				header("Location: advertise.php");	
		   }
      }else{
         print_r($errors);
      }
   }else
		   {
				echo "File name not set";
		   }

}
  else
  {
  	$_SESSION["ERROR"]="Invalid Access, Please Login Again";
	header("Location:login.php");
  }
?> 
