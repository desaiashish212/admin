<? session_start();
   include_once('connection.php');
   
   $cat_name = $_POST["catname"];
   $category =$_POST["category"];
   
   echo $cat_name;
   echo $category;
	 

   $res=mysqli_query($con,"update category SET caregory_name = '$cat_name' WHERE id = '$category' ");

   if($res<=0)
   {
   		$_SESSION["MSG"]="Category not updated, Try Again";
		header("Location: e_category.php");	
   }
   else
   {
   		$_SESSION["MSG"]="Updated Successfully";
		header("Location: e_category.php");	
   }
  

?>