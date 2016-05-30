	<? session_start();
	   include_once('connection.php');
	   
	   $news_id=$_GET["id"];
	   $m_id=$_GET["m_id"];
   		$category =$_GET["category"];
	  
	   
	   $res=mysqli_query($con,"delete from eng where id=$news_id");
	if($res<=0)
   {
   		$_SESSION["MSG"]="News not deleted, Try Again";
		header("Location: e_news.php?id=".$m_id."&name=".$category);	
   }
   else
   {
   		$_SESSION["MSG"]="News deleted";
		header("Location: e_news.php?id=".$m_id."&name=".$category);	
   }
	?>