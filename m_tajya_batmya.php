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
	
	<title>Harmony - Free responsive Bootstrap admin template by Themestruck.com</title>

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
		<a href="index.html" class="logo"><img src="img/logo.jpg" class="img-responsive" alt=""></a>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
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
	</div>

	<div class="ts-main-content">
		<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
				<li class="ts-label">Search</li>
				<li>
					<input type="text" class="ts-sidebar-search" placeholder="Search here...">
				</li>
				<li class="ts-label">Main</li>
				<?php include_once ('list.html'); ?>
					<ul>
						<li><a href="blank.html">Blank page</a></li>
						<li><a href="login.html">Login page</a></li>
					</ul>
				</li>

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

						<h2 class="page-title">ताज्या बातम्या</h2>
							<?php
				include_once ('connection.php');
				$sql = mysqli_query($con,"SELECT marathi.id, marathi.title, marathi.news, marathi.time,marathi.date FROM marathi where status=1 ORDER BY marathi.date desc, marathi.time desc"); 
				
				$i = 0;
				?>
				          <a href="category.php">  <button class="btn btn-primary" type="submit">Add Category</button></a>
						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
						
							<div class="panel-heading">Table by DataTables plugin</div>
						
												
													
											
											
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Title</th>
											<th>News</th>
											<th>Date</th>
											<th>Time</th>
											<th colspan="2"></th>
										</tr>
									</thead>
									
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
										</br><a href="read_more.php?id=<?=$row["id"]?>">Read More</a>
								<?
							?>	
						</td>				<!-- news containt-->
						<td width="100"><? echo $row['4']; ?></td>				<!-- Time containt-->
						<td width="100"><? echo $row['3']; ?></td>				<!-- Time containt-->
						<td width="50"><a href="edit_news.php?id=<?= $row["id"] ?>"><img src="img/button_edit.JPG" height="30" width="60"/></a></td>
						<td width="50"><a href="delete_news.php?id=<?= $row["id"]?> "><img src="img/delete.jpg" height="30" width="60"/></a></td>
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
										</br><a href="read_more.php?id=<?=$row["id"]?>">Read More</a>
								<?
							?>	
						</td>
						<td><? echo $row['4']; ?></td>				<!-- Time containt-->
						<td><? echo $row['3']; ?></td>
						<td ><a href="edit_news.php?id=<?= $row["id"]?>"><img src="img/button_edit.JPG" height="30" width="60"/></a></td>
						<td ><a href="delete_news.php?id=<?= $row["id"]?>"><img src="img/delete.jpg" height="30" width="60"/></a></td>
						</tr>					
				<? 	} 
					$i++;					
				}
			
				?>
									</tbody>
									<tfoot>
										<tr>
											<th>Title</th>
											<th>News</th>
											<th>Date</th>
											<th>Time</th>
											<th colspan="2"></th>
										</tr>
									</tfoot>
								</table>

								<div class="well">
									<h3>Bootstrap DataTables Plugin Integration</h3>
									<p>We build this table using the Bootstrap version of DataTables plugin <a href="https://datatables.net/examples/styling/bootstrap.html" target="_blank">View Full Details <i class="fa fa-arrow-right"></i></a> </p>
								</div>

							</div>
						</div>

						<div class="row">
							<div class="col-md-7">
								<div class="panel panel-default">
									<div class="panel-heading">Contextual tables</div>
									<div class="panel-body">
										<table class="table table-striped table-hover ">
											<thead>
												<tr>
													<th>#</th>
													<th>Column heading</th>
													<th>Column heading</th>
													<th>Column heading</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>Column content</td>
													<td>Column content</td>
													<td>Column content</td>
												</tr>
												<tr>
													<td>2</td>
													<td>Column content</td>
													<td>Column content</td>
													<td>Column content</td>
												</tr>
												<tr class="info">
													<td>3</td>
													<td>Column content</td>
													<td>Column content</td>
													<td>Column content</td>
												</tr>
												<tr class="success">
													<td>4</td>
													<td>Column content</td>
													<td>Column content</td>
													<td>Column content</td>
												</tr>
												<tr class="danger">
													<td>5</td>
													<td>Column content</td>
													<td>Column content</td>
													<td>Column content</td>
												</tr>
												<tr class="warning">
													<td>6</td>
													<td>Column content</td>
													<td>Column content</td>
													<td>Column content</td>
												</tr>
												<tr class="active">
													<td>7</td>
													<td>Column content</td>
													<td>Column content</td>
													<td>Column content</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="col-md-5">
								<div class="panel panel-default">
									<div class="panel-heading">Bordered table</div>
									<div class="panel-body">
										<table class="table table-bordered table-striped">
											<thead>
												<tr>
													<th>#</th>
													<th>First Name</th>
													<th>Last Name</th>
													<th>Username</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<th scope="row">1</th>
													<td>Mark</td>
													<td>Otto</td>
													<td>@mdo</td>
												</tr>
												<tr>
													<th scope="row">2</th>
													<td>Jacob</td>
													<td>Thornton</td>
													<td>@fat</td>
												</tr>
												<tr>
													<th scope="row">3</th>
													<td>Larry</td>
													<td>the Bird</td>
													<td>@twitter</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>

				<div class="row">
					<div class="clearfix pt pb">
						<div class="col-md-12">
							<em>Thank you for using <a href="http://themestruck.com/theme/harmony/"> Harmony Admin Theme </a> by <a href="http://themestruck.com/">ThemeStruck</a></em>
						</div>
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
