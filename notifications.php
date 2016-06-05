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
					<li><a href="#">Logout</a></li>
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
				<li><a href="#"><i class="fa fa-desktop"></i>English</a>
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
				<li class="open"><a href="notifications.php"><i class="fa fa-pie-chart"></i> Notifications</a></li>
				
			

				<!-- Account from above -->
				<ul class="ts-profile-nav">
					
					<li class="ts-account">
						<a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
						<ul>
							
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>

			</ul>
		</nav>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Notifications</h2>
							<?php
				include_once ('connection.php');
				$sql = mysqli_query($con,"SELECT notifications.id, notifications.messages, notifications.category,notifications.language,notifications.created_at  FROM notifications"); 
				
				$i = 0;
				?>
				          <!--a href="category.php?status=1">  <button class="btn btn-primary" type="submit">Send Notification</button></a-->
						  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
											Send notification
										</button>

										<!-- Modal -->
										<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														<h4 class="modal-title" id="myModalLabel">Notification</h4>
													</div>
													<form method="POST" class="form-horizontal" method="post" action="worker_notifications.php" >
													<div class="modal-body">
														<div class="form-group">
															<label class="col-sm-2 control-label">Message</label>
															<div class="col-sm-10">
																<textarea class="form-control" rows="3" name="message"></textarea>
															</div>
														</div>
									
														<div class="form-group">
															<label class="col-sm-2 control-label">Language</label>
															<div class="col-sm-10">
																<div class="radio radio-info radio-inline">
																	<input type="radio" id="inlineRadio1" value="1" name="languages" checked>
																	<label for="inlineRadio1"> Marathi </label>
																</div>
																<div class="radio radio-inline">
																	<input type="radio" id="inlineRadio2" value="2" name="languages">
																	<label for="inlineRadio2"> Hindi </label>
																</div>
																<div class="radio radio-inline">
																	<input type="radio" id="inlineRadio2" value="3" name="languages">
																	<label for="inlineRadio2"> English </label>
																</div>
														</div>
												</div>
												
													</div>
													
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
													<button class="btn btn-primary" type="submit" value="submit">Send Notification</button>
												</div>
											</div>
													</form>
													<div class="modal-footer">
													<div class="hr-dashed"></div>
														
													</div>
													
												</div>
											</div>
										</div>
						 
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
						
							<div class="panel-heading">Notifications</div>
						
												
													
											
											
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Messages</th>
											<th>Category</th>
											<th>Language</th>
											<th>Created at</th>
											<th >Delete</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Messages</th>
											<th>Category</th>
											<th>Language</th>
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
						<td > <? echo $row['1']; ?></td>	
						<td > <? echo $row['2']; ?></td>	
						<? if($row['3']==1){?>
							<td>Marathi</td> 
						<? }else if($row['3']==2){?>
							 <td>Hindi</td> 
						<? } else if($row['3']==3){?>	 
							 <td>Hindi</td> 
							 <? }?>
						
						<td > <? echo $row['4']; ?></td>	
						<!-- news containt-->
					
					
						<td ><a href="worker_delete_notification.php?id=<?= $row["id"]?> "><img src="img/delete.jpg" height="30" width="60"/></a></td>
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
