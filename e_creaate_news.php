<?php session_start();
	include_once('connection.php');
	$root_folder = "uploads/";
	$date=date("Y-m-d");	
	echo "#Running upload script...<br>";
	
	if(isset($_FILES['files']))
	{
		chdir($root_folder);
		if(!file_exists($date))
		{
			 mkdir($date);
			 $root_folder = $root_folder.$date.'/';
			 echo $root_folder;
			 chdir($date);
			 //exit();
			 $errors= array();
			  $count=0;
			  
			 foreach($_FILES['files']['tmp_name'] as $key => $tmp_name )
			 {
			 	$file_name = $key.$_FILES['files']['name'][$key];
			 	echo $file_name.'<br>';
			 	$file_size =$_FILES['files']['size'][$key];
				$file_tmp =$_FILES['files']['tmp_name'][$key];
				$file_type=$_FILES['files']['type'][$key];	
				
	       	 	if(is_dir($root_folder.$file_name)==false){
	                move_uploaded_file($file_tmp,$file_name);
	                $path =$root_folder.$file_name;
	                
	                $title=(isset($_POST['title']) ? $_POST['title'] : null);
	                $news=(isset($_POST['news']) ? $_POST['news'] : null);
					$newsDate=(isset($_POST['date']) ? $_POST['date'] : null);
					$status=(isset($_POST['status']) ? $_POST['status'] : null);
					$category=(isset($_POST['category']) ? $_POST['category'] : null);
					
					date_default_timezone_set("Asia/Kolkata");
					$server_time=date("h:i:s");
					
					if($count === 0)
					{
						$res=mysqli_query($con,"insert into eng (title,news,time,status,path,date) values ('$title','$news','$server_time','$status','$path','$newsDate')");
						
						$count++; 	// on next iteration execute else
						
					}else{
						$res=mysqli_query($con,"update eng SET path2='$path' WHERE eng.title='$title'");					
					}
					
					   	$_SESSION["MSG"]="News not added, Try Again";
						header("Location: e_news.php?id=".$status."&name=".$category);	
				     
	            }else{
						$_SESSION["MSG"]="News not added, Try Again";
						header("Location: e_news.php?id=".$status."&name=".$category);	
				}	
			 }//EOF foreach
		}
		else
		{
			 $root_folder = $root_folder.$date.'/';
			 echo $root_folder;
			 chdir($date);
			 //exit();
			 $errors= array();
			  $count=0;
			  
			 foreach($_FILES['files']['tmp_name'] as $key => $tmp_name )
			 {
			 	$file_name = $key.$_FILES['files']['name'][$key];
			 	echo $file_name.'<br>';
			 	$file_size =$_FILES['files']['size'][$key];
				$file_tmp =$_FILES['files']['tmp_name'][$key];
				$file_type=$_FILES['files']['type'][$key];	
				
	       	 	if(is_dir($root_folder.$file_name)==false)
	       	 	{
	                move_uploaded_file($file_tmp,$file_name);
	                $path =$root_folder.$file_name;
	                
	                $title=(isset($_POST['title']) ? $_POST['title'] : null);
	                $news=(isset($_POST['news']) ? $_POST['news'] : null);
					$newsDate=(isset($_POST['date']) ? $_POST['date'] : null);
					$status=(isset($_POST['status']) ? $_POST['status'] : null);
					$category=(isset($_POST['category']) ? $_POST['category'] : null);
					
					date_default_timezone_set("Asia/Kolkata");
					$server_time=date("h:i:s");
					
					if($count === 0)
					{
						echo "inside count";
			  			
						$res=mysqli_query($con,"insert into eng (title,news,time,status,path,date) values ('$title','$news','$server_time','$status','$path','$newsDate')");
						
						$count++; 	// on next iteration execute else
						
					}else{
						$res=mysqli_query($con,"update eng SET path2='$path' WHERE eng.title='$title'");					
					}
					
					   	$_SESSION["MSG"]="News added successfully.";
						header("Location: e_news.php?id=".$status."&name=".$category);	
				     
	            }else{
						$_SESSION["MSG"]="News not added, Try Again";
						header("Location: e_news.php?id=".$status."&name=".$category);	
				}	
			 }//EOF foreach
		}	 
	}	 
 ?>