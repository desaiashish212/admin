<? session_start();
   include_once('connection.php');
   
   $news_id=$_POST["id"];
   $title=$_POST["title"];
   $news=$_POST["news"];
   $m_id=$_POST["m_id"];
   $category =$_POST["category"];
	$date = $_POST["date"];
   
   $res=mysqli_query($con,"update hindi set title='$title', news='$news',date='$date' where id=$news_id");

   //echo $aff= mysqli_affected_rows($res);
   //exit;
   if($res<=0)
   {
   		$_SESSION["MSG"]="News not updated, Try Again";
		header("Location: h_news.php?id=".$m_id."&name=".$category);	
   }
   else
   {
   		$_SESSION["MSG"]="Update Success";
		header("Location: h_news.php?id=".$m_id."&name=".$category);	
   }


?>