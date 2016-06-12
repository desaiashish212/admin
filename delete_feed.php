	<? session_start();
	   include_once('connection.php');
	   
	   $news_id=$_GET["id"];	//get feed id
	   
	   $res=mysqli_query($con,"delete from feedback where id=$news_id");
	if($res<=0)
    {
   		$_SESSION["MSG"]="Feedback not deleted, Try Again";
		header("Location: feedback.php?id");	
    }
    else
    {
   		$_SESSION["MSG"]="Feedack deleted";
		header("Location: feedback.php");	
    }
	?>