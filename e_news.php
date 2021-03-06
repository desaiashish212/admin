<?php session_start();
if(isset($_SESSION["id"]) and isset($_SESSION["user"]))
{
	include_once ('connection.php');
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
	
	<title>Dhangar Mahasabha</title>

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
				<li ><a href="#"><i class="fa fa-medium"></i>Marathi</a>
					<ul>
						<?php
				$sql = mysqli_query($con,"SELECT category.id, category.caregory_name  FROM category where lang_status=1 and  status = 1 order by priority ASC"); 
				
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
				<li><a href="#"><i class="fa fa-h-square"></i>Hindi</a>
					<ul>
						<?php
				$sql = mysqli_query($con,"SELECT category.id, category.caregory_name  FROM category where lang_status=2 and  status = 1 order by priority ASC"); 
				
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
				<li class="open"><a href="#"><i class="fa fa-globe"></i>English</a>
					<ul>
					
						<?php
				$sql = mysqli_query($con,"SELECT category.id, category.caregory_name  FROM category where lang_status=3 and  status = 1 order by priority ASC"); 
				
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
				
				<li><a href="#"><i class="fa fa-th-large"></i>Category</a>
					<ul>
						<li><a href="m_category.php">Marathi</a></li>
						<li><a href="h_category.php">Hindi</a></li>
						<li><a href="e_category.php">English</a></li>
					
					</ul>
				</li>
				<li><a href="users.php"><i class="fa fa-users"></i> Users</a></li>
				<li ><a href="advertise.php" ><i class="fa fa-briefcase"></i> Advertise</a></li>
				<li><a href="notifications.php"><i class="fa fa-bell"></i> Notifications</a></li>
				<li><a href="feedback.php"><i class="fa fa-envelope"></i> Feedbacks</a></li>

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
		<?php
							$id = $_GET["id"];
				
				$sql = mysqli_query($con,"SELECT eng.id, eng.title, eng.news, eng.time,eng.date,eng.notifi_status FROM eng where status='$id' ORDER BY eng.date desc, eng.time desc"); 
				
				$i = 0;
				?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title"><?echo $_GET["name"];?></h2>
							<a href="e_add_news.php?id=<?=$_GET["id"];?>&category=<?=$_GET["name"];?>">  <button class="btn btn-primary" type="submit">Add News</button></a>
						 
				<?php
				if(isset($_SESSION["MSG"]))
				{ ?>
					 <div class="alert alert-dismissible alert-success">
											<button type="button" class="close" data-dismiss="alert"><i class="fa fa-remove"></i></button>
											<strong><?php echo $_SESSION['MSG'] ?> !</strong>
										</div>
						</div>				
					<?php 
					unset($_SESSION["MSG"]);
				}
					?>
						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">English News</div>
							<div class="panel-body">
							<!--zctb-->
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Title</th>
											<th>News</th>
											<th>Date</th>
											<th>Time</th>
											<th>Edit</th>
											<th>Delete</th>
											<th>Notify</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Title</th>
											<th>News</th>
											<th>Date</th>
											<th>Time</th>
											<th >Edit</th>
											<th >Delete</th>
											<th>Notify</th>
										</tr>
									</tfoot>
									<tbody>
										<?
				while($row=mysqli_fetch_array($sql))
				{
					$news_id=$row['0'];
					if($i%2==0)
					{
					?>
					
						<tr align="left"> 
						<td height="30" width="300"> <? echo $row['1']; ?></td>	<!-- Title containt-->
						<td width="300">
							<? 
								$string =  $row['2']; 
								//echo $string;
								$string = strip_tags($string);
								
								if (strlen($string) > 200) {

									// truncate string
									$stringCut = substr($string, 0, 200);

									// make sure it ends in a word so assassinate doesn't become ass...
									$string = substr($stringCut, 0, strrpos($stringCut, ' '));
									
								}
								echo$string;
								?>
										</br><a href="e_read_more.php?id=<?=$row["id"]?>">Read More</a>
								<?
							?>	
						</td>				<!-- news containt-->
						<td width="100"><? echo $row['4']; ?></td>				<!-- Time containt-->
						<td width="100"><? echo $row['3']; ?></td>				<!-- Time containt-->
						<td width="50"><a href="e_edit_news.php?m_id=<?= $id ;?>&id=<?=$news_id;?>&category=<?=$_GET["name"];?>" class="btn btn-primary">Edit</td>
						<td width="50"><a href="e_delete_news.php?m_id=<?= $id ;?>&id=<?=$news_id;?>&category=<?=$_GET["name"];?>" class="btn btn-danger">Delete</td>
						<?
							if($row['5']==0){
						?>
						<td><a href="worker_news_notifications.php?m_id=<?= $id ;?>&id=<?= $news_id ;?>&lang=<?='3';?>&title=<?=$row['1'];?>&category=<?=$_GET["name"];?>&status=<?=$_GET['id'];?>" class="btn btn-info">Notify</a></td>
						<?
							}else{
						?>
							<td><a class="btn btn-success">Notified</a></td>
						<?
							}
						?>
						</tr>
					<? }
					else
					{ 
					
					?>
					
					
						<tr align="left"> 
						<td height="30"> <? echo $row['1']; ?></td>
						<td>
							<? 
								$string =  $row['2']; 
								//echo $string;
								$string = strip_tags($string);
								
								if (strlen($string) > 200) {

									// truncate string
									$stringCut = substr($string, 0, 200);

									// make sure it ends in a word so assassinate doesn't become ass...
									$string = substr($stringCut, 0, strrpos($stringCut, ' '));
									
								}
								echo$string;
								?>
										</br><a href="e_read_more.php?id=<?=$row["id"]?>">Read More</a>
								<?
							?>	
						</td>
						<td><? echo $row['4']; ?></td>				<!-- Time containt-->
						<td><? echo $row['3']; ?></td>
						<td width="50"><a href="e_edit_news.php?m_id=<?= $id ;?>&id=<?=$news_id;?>&category=<?=$_GET["name"];?>" class="btn btn-primary">Edit</a></td>
						<td width="50"><a href="e_delete_news.php?m_id=<?= $id ;?>&id=<?=$news_id;?>&category=<?=$_GET["name"];?>" class="btn btn-danger">Delete</a></td>
						<?
							if($row['5']==0){
						?>
						<td><a href="worker_news_notifications.php?m_id=<?= $id ;?>&id=<?= $news_id ;?>&lang=<?='3';?>&title=<?=$row['1'];?>&category=<?=$_GET["name"];?>&status=<?=$_GET['id'];?>" class="btn btn-info">Notify</a></td>
						<?
							}else{
						?>
							<td><a class="btn btn-success">Notified</a></td>
						<?
							}
						?>
						
						
						</tr>					
				<? 	} 
					$i++;					
				}
			
				?>
									</tbody>
								</table>

								

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

</html>
<?php

}
  else
  {
  	$_SESSION["ERROR"]="Invalid Access, Please Login Again";
	header("Location:login.php");
  }
?> 
