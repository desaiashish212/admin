<?php session_start();
if(isset($_SESSION["id"]) and isset($_SESSION["user"]))
{
include_once('connection.php');
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Dhangar Mahsabha</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<div class="brand clearfix">
		<a href="index.php" class="logo"><img src="img/logo.jpg" class="img-responsive" alt=""></a>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			
			<li class="ts-account">
				<a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
							<li><a href="change_password.php">Change password</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>

	<div class="ts-main-content">
		<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
				<?include_once ('connection.php');?>
				<li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li ><a href="#"><i class="fa fa-desktop"></i>Marathi</a>
					<ul>
						<?php
				$sql = mysqli_query($con,"SELECT category.id, category.caregory_name  FROM category where lang_status=1"); 
				
				$i = 0;
				
				while($row=mysqli_fetch_array($sql))
				{
					$category_id=$row['0'];
					?>
					
						
						<!-- news containt-->
					<li ><a href="m_news.php?id=<?=$category_id?>&name=<?=$row['1']?>"> <? echo $row['1']; ?></a></li>
						
					<? 
					
					$i++;					
				}
			
				?>
					</ul>
				</li>
				<li><a href="#"><i class="fa fa-desktop"></i>Hindi</a>
					<ul>
						<?php
				$sql = mysqli_query($con,"SELECT category.id, category.caregory_name  FROM category where lang_status=2"); 
				
				$i = 0;
				
				while($row=mysqli_fetch_array($sql))
				{
					$category_id=$row['0'];
					?>
					
						
						<!-- news containt-->
					<li><a href="h_news.php?id=<?=$category_id?>&name=<?=$row['1']?>"> <? echo $row['1']; ?></a></li>
						
					<? 
					
					$i++;					
				}
			
				?>
					</ul>
				</li>
				<li class="open"><a href="#"><i class="fa fa-desktop"></i>English</a>
					<ul>
					
						<?php
				$sql = mysqli_query($con,"SELECT category.id, category.caregory_name  FROM category where lang_status=3"); 
				
				$i = 0;
				
				while($row=mysqli_fetch_array($sql))
				{
					$category_id=$row['0'];
					?>
					
						
						<!-- news containt-->
					<li><a href="e_news.php?id=<?=$category_id?>&name=<?=$row['1']?>"> <? echo $row['1']; ?></a></li>
						
					<? 
					
					$i++;					
				}
			
				?>
					</ul>
				</li>
				
				<li><a href="#"><i class="fa fa-desktop"></i>Category</a>
					<ul>
						<li><a href="m_category.php">Marathi</a></li>
						<li><a href="h_category.php">Hindi</a></li>
						<li><a href="e_category.php">English</a></li>
					
					</ul>
				</li>
				<li><a href="users.php"><i class="fa fa-pie-chart"></i> Users</a></li>
				<li ><a href="advertise.php" ><i class="fa fa-pie-chart"></i> Advertise</a></li>
				<li><a href="notifications.php"><i class="fa fa-pie-chart"></i> Notifications</a></li>
			

				<!-- Account from above -->
				<ul class="ts-profile-nav">
					<li><a href="#">Help</a></li>
					<li><a href="#">Settings</a></li>
					<li class="ts-account">
						<a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
						<ul>
							<li><a href="#">My Account</a></li>
							<li><a href="#">Edit Account</a></li>
							<li><a href="#">Logout</a></li>
						</ul>
					</li>
				</ul>

			</ul>
		</nav>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<? 
			$news_id=$_GET['id']; 
			
			$query=mysqli_query($con,"SELECT title,news,time,date, `status`,path,path2 FROM eng WHERE id = $news_id");
			//$rs=mysqli_query($con,$query);
			//$res=mysqli_fetch_row($rs);
			while($row=mysqli_fetch_array($query))
			{
				$title =  $row['0']; 
				$news = $row['1']; 	
				$date = $row['3']; 	
				$time = $row['2']; 	
				$path = $row['5'];
				$path2 = $row['6'];
				?>
				<div class="jumbotron">
					<h1><? echo $title; 	?></h1>
					<h3><? echo $date; ?>&emsp;&emsp;<? echo $time 	?></h3>
					<p><? echo $news; 	?></p>
					&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<img src="<?echo $path?>" width="400" height="350"> </br>
					<hr>
				<?
					if(!$path2==null){
						
				?>				
					&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<img src="<?echo $path2?>" width="400" height="350"> </br>
				<?
					}
				?>	
				</div>
				<?
			}	
			
		?>

					</div>
				</div>

				

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</body>
<?php

}
  else
  {
  	$_SESSION["ERROR"]="Invalid Access, Please Login Again";
	header("Location:login.php");
  }
?> 

</html>
