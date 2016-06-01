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
	<!--Google graph chart js initialization-->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
				<li class="open"><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="#"><i class="fa fa-desktop"></i>Marathi</a>
					<ul>
						<?php
				$sql = mysqli_query($con,"SELECT category.id, category.caregory_name  FROM category where lang_status=1"); 
				
				$i = 0;
				
				while($row=mysqli_fetch_array($sql))
				{
					$category_id=$row['0'];
					?>
					
						
						<!-- news containt-->
					<li><a href="m_news.php?id=<?=$category_id?>&name=<?=$row['1']?>"> <? echo $row['1']; ?></a></li>
						
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
				<li><a href="notifications.php"><i class="fa fa-pie-chart"></i> Notifications</a></li>

				<!-- Account from above -->
				<ul class="ts-profile-nav">
					<li class="ts-account">
						<a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
						<ul>
							<li><a href="#">My Account</a></li>
							<li><a href="#">Edit Account</a></li>
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

						<h2 class="page-title">Dashboard</h2>
						
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
												<?
													// Counting number of users in the system	
													$count_users = mysqli_query($con,"SELECT COUNT(*) FROM users"); 
													$row = mysqli_fetch_row($count_users);
													$UserCount = $row[0];
												
												?>
													<div class="stat-panel-number h1 "><?echo $UserCount;?></div>
													<div class="stat-panel-title text-uppercase">All Users</div>
												</div>
											</div>
											<a href="users.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
<?
		$marathiCount = mysqli_query($con,"select COUNT(*) from users WHERE users.lang_status='1'");
		$marathiRow = mysqli_fetch_row($marathiCount);										
?>												
													<div class="stat-panel-number h1 "><? echo $marathiRow[0];?></div>
													<div class="stat-panel-title text-uppercase">Marathi Reader</div>
												</div>
											</div>
											<a href="users.php" class="block-anchor panel-footer text-center">See All &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
<?
		$hindiCount = mysqli_query($con,"select COUNT(*) from users WHERE users.lang_status='2'");
		$hindiRow = mysqli_fetch_row($hindiCount);										
?>												
													<div class="stat-panel-number h1 "><?echo $hindiRow[0]?></div>
													<div class="stat-panel-title text-uppercase">Hindi Reader</div>
												</div>
											</div>
											<a href="users.php" class="block-anchor panel-footer text-center">See All &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-light">
												<div class="stat-panel text-center">
<?
		$englishCount = mysqli_query($con,"select COUNT(*) from users WHERE users.lang_status='3'");
		$englishRow = mysqli_fetch_row($englishCount);										
?>												
													<div class="stat-panel-number h1 "><? echo $englishRow[0]?></div>
													<div class="stat-panel-title text-uppercase">English Reader</div>
												</div>
											</div>
											<a href="users.php" class="block-anchor panel-footer text-center">See All &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">Monthly New User</div>
									<div class="panel-body">
										<div class="chart">
										<!--Google graph chart-->
											 <div id="chart_div"></div> 
										</div>
<?
	// Query to draw graph
	$graph = mysqli_query($con,"Select count(*) as counts, DATE_FORMAT(created_at, \"%Y-%m\") as \"_month\" 
from users    
group by _month
order by _month
LIMIT 12");

	$jsonArray = array();
	while($graph_result = mysqli_fetch_row($graph))
	{
		$graphCount =  $graph_result[0];
		$graphMonth =  $graph_result[1];
		$jsonArray[] =  array($graphCount,$graphMonth);
	}
	
?>	

<script>
	  var graphMonth = <?php echo json_encode($graphMonth);?>;	
	  var graphCount = <?php echo json_encode($graphCount);?>;	
	  google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
      	
        var data = google.visualization.arrayToDataTable([
         ['Months', 'users'],
         [graphMonth,graphCount],
         
        ]);

        var options = {
          chart: {
            title: 'Report of Users added in a year',
            subtitle: '2016',
          },
          bars: 'vertical',
          vAxis: {format: 'decimal'},
          height: 250,
          colors: ['#1b9e77']
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));

        chart.draw(data, google.charts.Bar.convertOptions(options));

        var btns = document.getElementById('btn-group');

        btns.onclick = function (e) {

          if (e.target.tagName === 'BUTTON') {
            options.vAxis.format = e.target.id === 'none' ? '' : e.target.id;
            chart.draw(data, google.charts.Bar.convertOptions(options));
          }
        }
      }
</script>


										<div id="legendDiv"></div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">New Users</div>
									<div class="panel-body">
									<?
											// To display 5 latest users ...
											$result = mysqli_query($con,"SELECT users.`name`, users.mobile_no, users.email FROM users ORDER BY users.created_at DESC LIMIT 5
");											
										?>
										<table class="table table-hover">
											<thead>
												<tr>
													<td><td>
													<th>Name</th>
													<th>Mobile No.</th>
													<th>Email ID</th>
												</tr>
											</thead>
											<tbody>
											<?
												while($row = mysqli_fetch_array($result)){
											?>
												<tr>
													<th><th>
													<td><?echo $row[0];?></td>
													<td><?echo $row[1];?></td>
													<td><?echo $row[2];?></td>
												</tr>
											<?
												}
											?>	
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">Pie Chart</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-md-4">
												<ul class="chart-dot-list">
													<li class="a1">Marathi</li>
													<li class="a2">Hindi</li>
													<li class="a3">English</li>
												</ul>
											</div>
											<div class="col-md-8">
												<div class="chart chart-doughnut">
													<canvas id="chart-area3" width="1200" height="900" />
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">Doughnut</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-md-4">
												<ul class="chart-dot-list">
													<li class="a1">Marathi</li>
													<li class="a2">Hindi</li>
													<li class="a3">English</li>
												</ul>
											</div>
											<div class="col-md-8">
												<div class="chart chart-doughnut">
													<canvas id="chart-area4" width="1200" height="900" />
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
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
