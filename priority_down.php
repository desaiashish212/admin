<? session_start();
   include_once('connection.php');
   
   $result = mysqli_query($con,"SELECT COUNT(*) FROM category WHERE category.lang_status='1'");
   $row = mysqli_fetch_row($result);	
   
   $lang = $_GET['lang'];		//1
   $menu_prio = $_GET['pr'];	//18
   $max = (int)$menu_prio;			//18
   $total = $row['0'];			//18

   $temp = $menu_prio+1;
   $tot = (int)$total;
   	if($max!=$total)
   	{	
  		
   		mysqli_query($con,"update category set priority = '0' where priority='$menu_prio'");
   		
   		mysqli_query($con,"update category set priority = '$menu_prio' where priority='$temp'");
   		
   		mysqli_query($con,"update category set priority = '$temp' where priority='0'");
   		
   		if($lang==1){
			header("Location: m_category.php");		
		}else if($lang == 2){
			header("Location: h_category.php");		
		}else{
			header("Location: e_category.php");		
		}
   		
   	}else
   	{
   		
		mysqli_query($con,"update category set priority = '0' where priority='$menu_prio'");
   		
   		mysqli_query($con,"update category set priority = '$menu_prio' where priority='1'");
   		
   		mysqli_query($con,"update category set priority = '1' where priority='0'");

		if($lang==1){
			header("Location: m_category.php");		
		}else if($lang == 2){
			header("Location: h_category.php");		
		}else{
			header("Location: e_category.php");		
		}
	}	
   
?>