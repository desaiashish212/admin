<?php session_start();
	include_once('connection.php');
	 $date=date("Y-m-d");	
	 $folder_name = 'uploads';
	
		// checking image uploaded or not
		if(isset($_FILES["file"]["name"])) 
		{
			$name = $_FILES["file"]["name"];
			$tmp_name = $_FILES['file']['tmp_name'];
		    $error = $_FILES['file']['error'];
			
		    chdir($folder_name);
		    if(!empty($name)) 
		    {
	        	if(!file_exists($date))
	        	{
						mkdir($date);
						chdir($date);
						$location = $folder_name;
						if(move_uploaded_file($tmp_name,$name))
						{
				      		echo 'Uploaded';
						}
						$path ="uploads"."/$date"."/$name";
						//echo $path;
				}
				else
				{
						chdir($date);
						$location = $folder_name;
						if(move_uploaded_file($tmp_name,$name))
						{
				      		echo 'Uploaded';
						}
						$path ="uploads"."/$date"."/$name";
						//echo $path;
				}
			}
			
				else 
			{
				echo 'please choose a file';
			}
			
		}
		
	
	
	$title=(isset($_POST['title']) ? $_POST['title'] : null);
	
	$news=(isset($_POST['news']) ? $_POST['news'] : null);
	$status=(isset($_POST['status']) ? $_POST['status'] : null);
	$category=(isset($_POST['category']) ? $_POST['category'] : null);
	date_default_timezone_set("Asia/Kolkata");
	$server_time=date("h:i:s");
	
	$newsDate=(isset($_POST['date']) ? $_POST['date'] : null);
	$res=mysqli_query($con,"insert into marathi (title,news,time,status,path,date) values ('$title','$news','$server_time','$status','$path','$newsDate')");
	if($res<=0)
   {
   		$_SESSION["MSG"]="News not added, Try Again";
		header("Location: m_news.php?id=".$status."&name=".$category);	
   }
   else
   {
   		$_SESSION["MSG"]="You added news Successgfully";
		header("Location: m_news.php?id=".$status."&name=".$category);	
   }
	
 ?>