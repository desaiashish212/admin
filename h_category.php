<?php session_start();
if(isset($_SESSION["id"]) and isset($_SESSION["user"]))
{
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
				<li ><a href="#"><i class="fa fa-desktop"></i>Marathi</a>
					<ul>
						<?php
				$sql = mysqli_query($con,"SELECT category.id, category.caregory_name  FROM category where lang_status=1 and status = 1 order by priority ASC"); 
				
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
				$sql = mysqli_query($con,"SELECT category.id, category.caregory_name  FROM category where lang_status=2 and status = 1 order by priority ASC"); 
				
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
				<li><a href="#"><i class="fa fa-desktop"></i>English</a>
					<ul>
					
						<?php
				$sql = mysqli_query($con,"SELECT category.id, category.caregory_name  FROM category where lang_status=3 and status = 1 order by priority ASC"); 
				
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
				
				<li class="open"><a href="#"><i class="fa fa-desktop"></i>Category</a>
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

						<h2 class="page-title">Hindi Category</h2>
							<?php
				include_once ('connection.php');
				$sql = mysqli_query($con,"SELECT category.id, category.caregory_name,category.created_at,category.priority,category.status  FROM category where lang_status=2 ORDER BY priority ASC"); 
				
				$i = 0;
				?>
				          <a href="category.php?status=2">  <button class="btn btn-primary" type="submit">Add Category</button></a>
						 
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
						
							<div class="panel-heading">HINDI CATEGORIES</div>

							<div class="panel-body">
								<table id="abs" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Priority</th>
											<th>Change priority</th>
											<th>Category</th>
											<th>Created at</th>
											<th >Delete</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Priority</th>
											<th>Change priority</th>
											<th>Category</th>
											<th>Created at</th>
											<th >Delete</th>
										</tr>
									</tfoot>
									<tbody>
										<?
				while($row=mysqli_fetch_array($sql))
				{
					$news_id=$row['0'];
					
					?>
					
						<tr align="left"> 
						<?
						if($row['4']==0){
						
						// status = 1
						?>
							<td style="color:red" > <? echo $row['3']; ?><!-- Priority--></td>
							
						<td>	<a href="priority_up.php?pr=<? echo $row['3']; ?> & lang=2" class="fa fa-chevron-circle-up" style="font-size:36px;color: #3e454c"></a>
							<a href="priority_down.php?pr=<? echo $row['3']; ?> & lang=2" class="fa fa-chevron-circle-down" style="font-size:36px;color: #2c3136"></a>
						</td>	
						
						<td style="color:red" > <? echo $row['1']; ?></td>	<!-- Title containt-->
						<td style="color:red" > <? echo $row['2']; ?></td>	
						<!-- news containt-->
					
					
						<td ><a href="categoryEnable.php?id=<? echo $row['0']; ?>&lang=2"><img src="img/enable.jpg" height="30" width="60"/></a>
						<a href="h_update_category.php?id=<?= $row["id"]?> "><img src="img/button_edit.JPG" height="30" width="60"/></a>
						
						
						<?
						//
						}else{
							// status = 1
						
						?>	
					
						<td > <? echo $row['3']; ?><!-- Priority--></td>
							
						<td>	<a href="priority_up.php?pr=<? echo $row['3']; ?> & lang=2" class="fa fa-chevron-circle-up" style="font-size:36px;color: #3e454c"></a>
							<a href="priority_down.php?pr=<? echo $row['3']; ?> & lang=2" class="fa fa-chevron-circle-down" style="font-size:36px;color: #2c3136"></a>
						</td>	
						
						<td > <? echo $row['1']; ?></td>	<!-- Title containt-->
						<td > <? echo $row['2']; ?></td>	
						<!-- news containt-->
					
					
						<td ><a href="h_delete_category.php?id=<?= $row["id"]?> "><img src="img/desable.jpg" height="30" width="60"/></a>
						<a href="h_update_category.php?id=<?= $row["id"]?> "><img src="img/button_edit.JPG" height="30" width="60"/></a></td>
						
						<?
							}//Eof else if status = 1
						?>
						</tr>
					
				<? 
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
