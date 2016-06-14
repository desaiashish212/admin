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
				<li><a href="#"><i class="fa fa-medium"></i>Marathi</a>
					<ul>
						<?php
				$sql = mysqli_query($con,"SELECT category.id, category.caregory_name  FROM category where lang_status=1 and status = 1 order by priority ASC"); 
				
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
				<li><a href="#"><i class="fa fa-h-square"></i>Hindi</a>
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
				<li><a href="#"><i class="fa fa-globe" aria-hidden="false"></i>English</a>
					<ul>
					
						<?php
				$sql = mysqli_query($con,"SELECT category.id, category.caregory_name  FROM category where lang_status=3 and status = 1   order by priority ASC"); 
				
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
					<li class="ts-account">
						<a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
						<ul>
							<li><a href="change_password.php">Change password</a></li>
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
									<div class="panel-heading">Monthly New Users</div>
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
order by _month DESC
LIMIT 5 ");

	$jsonArray = array();
	while($graph_result = mysqli_fetch_row($graph))
	{
		$graphCount =  $graph_result[0];
		$graphMonth =  $graph_result[1];
		$jsonArray[] =  array($graphCount,$graphMonth);
	}
	
?>	

<script>
	  var graphMonth = parseInt(<?php echo json_encode($jsonArray[0][0]);?>);
	  var graphCount = <?php echo json_encode($jsonArray[0][1]);?>;	
	  
	  console.log("hi"+graphCount);
	  var graphMonth1 = parseInt(<?php echo json_encode($jsonArray[1][0]);?>);	
	  var graphCount1 = <?php echo json_encode($jsonArray[1][1]);?>;	
	  
	  var graphMonth2 = parseInt(<?php echo json_encode($jsonArray[2][0]);?>);	
	  var graphCount2 = <?php echo json_encode($jsonArray[2][1]);?>;	
	  
	  var graphMonth3 = parseInt(<?php echo json_encode($jsonArray[3][0]);?>);	
	  var graphCount3 = <?php echo json_encode($jsonArray[3][1]);?>;	
	  
	  var graphMonth4 = parseInt(<?php echo json_encode($jsonArray[4][0]);?>);	
	  var graphCount4 = <?php echo json_encode($jsonArray[4][1]);?>;	
	  
	 /*
	  var graphMonth5 = <?php echo json_encode($jsonArray[5][0]);?>;	
	  var graphCount5 = <?php echo json_encode($jsonArray[5][1]);?>;	
	  
	  var graphMonth6 = <?php echo json_encode($jsonArray[6][0]);?>;	
	  var graphCount6 = <?php echo json_encode($jsonArray[6][1]);?>;	
	  
	  var graphMonth7 = <?php echo json_encode($jsonArray[7][0]);?>;	
	  var graphCount7 = <?php echo json_encode($jsonArray[7][1]);?>;	
	  
	  var graphMonth8 = <?php echo json_encode($jsonArray[8][0]);?>;	
	  var graphCount8 = <?php echo json_encode($jsonArray[8][1]);?>;	
	  
	  var graphMonth9 = <?php echo json_encode($jsonArray[9][0]);?>;	
	  var graphCount9 = <?php echo json_encode($jsonArray[9][1]);?>;	
	  
	  var graphMonth10 = <?php echo json_encode($jsonArray[10][0]);?>;	
	  var graphCount10 = <?php echo json_encode($jsonArray[10][1]);?>;	
	  
	  var graphMonth11 = <?php echo json_encode($jsonArray[11][0]);?>;	
	  var graphCount11 = <?php echo json_encode($jsonArray[11][1]);?>;
	  
	  */
	  google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
      	
        var data = google.visualization.arrayToDataTable([
         ['months', 'users'],
         [graphCount,graphMonth],
         [graphCount1,graphMonth1],
         [graphCount2,graphMonth2],
         [graphCount3,graphMonth3],
         [graphCount4,graphMonth4],
       /*
         [graphCount5,graphMonth5],
         [graphCount6,graphMonth6],
         [graphCount7,graphMonth7],
         [graphCount8,graphMonth8],
         [graphCount9,graphMonth9],
         [graphCount10,graphMonth10],
         [graphCount11,graphMonth11],
        */ 
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
									<div class="panel-heading">TODAYS BIRTDAYS</div>
									<div class="panel-body">
									<?
											// To display 5 latest users Birthdays...
		$result = mysqli_query($con,"SELECT users.id, users.`name`, users.mobile_no, users.email, users.lang_status from users WHERE DATE_FORMAT(users.birth,'%d-%m') = DATE_FORMAT(NOW(),'%d-%m') LIMIT 5");											
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
													<?
														//echo $row[0];
														// this is user-id may need for further Query															// pass thi id to href below -->
													?>
													<td><?echo $row[1];?></td>
													<td><?echo $row[2];?></td>
													<td><?echo $row[3];?></td>
												</tr>
												<?
													}
												?>	
										
											</tbody>
											
										</table>
										<a href="wish_bday.php">View all todays birthdays <i class="fa fa-fw"></i> </a>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">Latest Users</div>
									<div class="panel-body">
										<div class="row">
									<div class="panel-body">
									<?
											// To display 5 latest users ...
		$result = mysqli_query($con,"SELECT
users.`name`,
users.mobile_no,
users.email
FROM
users
ORDER BY
users.created_at DESC
LIMIT 8
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
										<a href="users.php">View all users <i class="fa fa-fw"></i> </a>
								
								</div>
											
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">Send Flash Message to app</div>
									<div class="panel-body">
										<div class="row">
<?if(isset($_SESSION["FLASH_SUCC"]))
{
?>
						<div class="text-center text-light">
							<h4 style="color: red"><? echo $_SESSION["FLASH_SUCC"]; ?></h4>
						</div>
<?
					unset($_SESSION["FLASH_SUCC"]);
}
?>
<?
// Language wise flash text
	
$result = mysqli_query($con,"SELECT
flash.flashMarathi,
flash.flashHindi,
flash.flashEnglish
FROM
flash
");											
				$row = mysqli_fetch_array($result);													
?>
										
<!--Send flash message MARATHI-->										
<form class="form-horizontal" method="post" action="flash.php?lang=mar">
	<div class="form-group">
		<label class="col-sm-2 control-label">Marathi</label>
			<div class="col-sm-8">
				<input type="text" placeholder="Enter flash message here" name="flash_text" id="flash_text" class="form-control mb" value="<?echo $row[0];?>">
				<button class="btn btn-warning" type="submit">Update Marathi Flash Message</button>
			</div>
	</div>
</form>
<!--Send flash message HINDI-->										
<form class="form-horizontal" method="post" action="flash.php?lang=hin">
	<div class="form-group">
		<label class="col-sm-2 control-label">Hindi</label>
			<div class="col-sm-8">
				<input type="text" placeholder="Enter flash message here" name="flash_text" id="flash_text" class="form-control mb"  value="<?echo $row[1];?>">
				<button class="btn btn-primary" type="submit">Update Hindi Flash Message </button>
			</div>
	</div>
</form>
<!--Send flash message ENGLISH-->										
<form class="form-horizontal" method="post" action="flash.php?lang=eng">
	<div class="form-group">
		<label class="col-sm-2 control-label">English</label>
			<div class="col-sm-8">
				<input type="text" placeholder="Enter flash message here" name="flash_text" id="flash_text" class="form-control mb" value="<?echo $row[2];?>">
				<button class="btn btn-success" type="submit">Update English Flash Message</button>
			</div>
	</div>
</form>
										</div>
									</div>
								</div>
							</div>
						</div>
			<!--#######	PRIVACY POLICY and DONATIONS-->			
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Edit privacy policy, account details</div>
				<div class="panel-body">
					<div class="col-md-6">
					<a href="privacy.php"><div class="panel-heading">Privacy and policy</div></a>
						<form method="post" action="updateprivacy.php">
							<div class="form-group">
							<? 
								$res = mysqli_query($con,"SELECT other.privacy FROM other");	
								$row = mysqli_fetch_row($res);
							?>
									<textarea name="privacy" class="form-control" rows=10><?echo $row['0'];?></textarea>
							</div>
							<div class="form-group">
								<div class="col-sm-6 col-sm-offset-3">
									<button class="btn btn-primary" type="submit" value="submit">Update privacy and policy</button>
								</div>
							</div>
						</form>
						<?if(isset($_SESSION["PRI"]))
{
?>
						<div class="text-center text-light">
							<h4 style="color: red"><? echo $_SESSION["PRI"]; ?></h4>
						</div>
<?
					unset($_SESSION["PRI"]);
}
?>
					</div>
					
					<div class="col-md-6">
					<a href="donate.php"><div class="panel-heading">Donations</div></a>
						<form method="post" action="updatedonation.php">
							<div class="form-group">
							<? 
								$res = mysqli_query($con,"SELECT other.donation FROM other");	
								$row = mysqli_fetch_row($res);
							?>
							
									<textarea name="donation" class="form-control" rows=10><?echo $row['0'];?></textarea>
							</div>
							<div class="form-group">
								<div class="col-sm-6 col-sm-offset-3">
									<button class="btn btn-primary" type="submit" value="submit">Update donation details	</button>
								</div>
							</div>
							<?if(isset($_SESSION["DON"]))
{
?>
						<div class="text-center text-light">
							<h4 style="color: red"><? echo $_SESSION["DON"]; ?></h4>
						</div>
<?
					unset($_SESSION["DON"]);
}
?>
						</form>
					</div>
				</div>
		</div>
	</div>
</div>			
						
			<!--
				#################################################################
			-->
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
												<?
													// Counting number of users in the system	
													$count_users = mysqli_query($con,"SELECT (SELECT COUNT(*)FROM marathi)+(SELECT COUNT(*)from hindi)+(SELECT COUNT(*)from eng) as totalnews"); 
													$row = mysqli_fetch_row($count_users);
													$UserCount = $row[0];
												
												?>
													<div class="stat-panel-number h1 "><?echo $UserCount;?></div>
													<div class="stat-panel-title text-uppercase">Total news</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
<?
		$marathiCount = mysqli_query($con,"SELECT COUNT(*) from marathi");
		$marathiRow = mysqli_fetch_row($marathiCount);										
?>												
													<div class="stat-panel-number h1 "><? echo $marathiRow[0];?></div>
													<div class="stat-panel-title text-uppercase">Marathi News</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
<?
		$hindiCount = mysqli_query($con,"SELECT COUNT(*) from hindi");
		$hindiRow = mysqli_fetch_row($hindiCount);										
?>												
													<div class="stat-panel-number h1 "><?echo $hindiRow[0]?></div>
													<div class="stat-panel-title text-uppercase">Hindi News</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-light">
												<div class="stat-panel text-center">
<?
		$englishCount = mysqli_query($con,"SELECT COUNT(*) from eng");
		$englishRow = mysqli_fetch_row($englishCount);										
?>												
													<div class="stat-panel-number h1 "><? echo $englishRow[0]?></div>
													<div class="stat-panel-title text-uppercase">English news</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
			<!--
				#################################################################
			-->
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
