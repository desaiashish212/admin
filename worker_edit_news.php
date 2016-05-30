<? session_start();
   include_once('connection.php');
   
   $news_id=$_POST["id"];
   $title=$_POST["title"];
   $news=$_POST["news"];
   $m_id=$_POST["m_id"];
   $category =$_POST["category"];

   
   $res=mysqli_query($con,"update marathi set title='$title', news='$news' where id=$news_id");

   //echo $aff= mysqli_affected_rows($res);
   //exit;
   if($res<=0)
   {
   		$_SESSION["MSG"]="News not updated, Try Again";
		header("Location: m_news.php?id=".$m_id."&name=".$category);	
   }
   else
   {
   		$_SESSION["MSG"]="Update Success";
		header("Location: m_news.php?id=".$m_id."&name=".$category);	
   }


?>