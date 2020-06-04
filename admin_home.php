<?php
include "database.php";
session_start();
if (!isset($_SESSION["AID"])) {
	echo "<script>window.open('index.php?mes=Access Denied..','_self');</script>";
}

//<!-- ============================================================== -->
$sql = "SELECT COUNT(*) FROM class ";
$res = $db->query($sql);
if ($res->num_rows > 0) {
	$cou1 = $res->fetch_assoc();
}
//<!-- ============================================================== -->
$sql = "SELECT COUNT(*) FROM subjects ";
$res = $db->query($sql);
if ($res->num_rows > 0) {
	$cou2 = $res->fetch_assoc();
}
//<!-- ============================================================== -->
$sql = "SELECT COUNT(*) FROM teacher ";
$res = $db->query($sql);
if ($res->num_rows > 0) {
	$cou3 = $res->fetch_assoc();
}
//<!-- ============================================================== -->
$sql = "SELECT COUNT(*) FROM student ";
$res = $db->query($sql);
if ($res->num_rows > 0) {
	$cou4 = $res->fetch_assoc();
}
//<!-- ============================================================== -->
$sql = "SELECT COUNT(*) FROM handledclass ";
$res = $db->query($sql);
if ($res->num_rows > 0) {
	$cou5 = $res->fetch_assoc();
}
//<!-- ============================================================== -->
$sql = "SELECT COUNT(*) FROM (SELECT class.ClassName,student.StudentName,
AVG(mark.PointCC) ,AVG(mark.PointGK),AVG(mark.PointCK),
COUNT(student.StudentName) AS Tongmon, 
AVG(((mark.PointCC)+(mark.PointGK)*2+(mark.PointCK)*3)/6) AS Tong 
FROM mark
INNER JOIN student ON mark.StudentID=student.StudentID 
INNER JOIN handledclass ON student.HID =handledclass.HID 
INNER JOIN class ON handledclass.ClassID=class.ClassID 
GROUP BY StudentName HAVING Tong >=8) AS Tongso";
$res = $db->query($sql);
if ($res->num_rows > 0) {
	$couhsg = $res->fetch_assoc();
}
//<!-- ============================================================== -->
$sql = "SELECT COUNT(*) FROM (SELECT class.ClassName,student.StudentName,
AVG(mark.PointCC) ,AVG(mark.PointGK),AVG(mark.PointCK),
COUNT(student.StudentName) AS Tongmon, 
AVG(((mark.PointCC)+(mark.PointGK)*2+(mark.PointCK)*3)/6) AS Tong 
FROM mark
INNER JOIN student ON mark.StudentID=student.StudentID 
INNER JOIN handledclass ON student.HID =handledclass.HID 
INNER JOIN class ON handledclass.ClassID=class.ClassID 
GROUP BY StudentName HAVING Tong >=6.5 AND Tong <8) AS Tongso";
$res = $db->query($sql);
if ($res->num_rows > 0) {
	$couhsk = $res->fetch_assoc();
}
//<!-- ============================================================== -->
$sql = "SELECT COUNT(*) FROM (SELECT class.ClassName,student.StudentName,
AVG(mark.PointCC) ,AVG(mark.PointGK),AVG(mark.PointCK),
COUNT(student.StudentName) AS Tongmon, 
AVG(((mark.PointCC)+(mark.PointGK)*2+(mark.PointCK)*3)/6) AS Tong 
FROM mark
INNER JOIN student ON mark.StudentID=student.StudentID 
INNER JOIN handledclass ON student.HID =handledclass.HID 
INNER JOIN class ON handledclass.ClassID=class.ClassID 
GROUP BY StudentName HAVING Tong >=5 AND Tong <6.5) AS Tongso";
$res = $db->query($sql);
if ($res->num_rows > 0) {
	$couhstb = $res->fetch_assoc();
}
//<!-- ============================================================== -->
$sql = "SELECT COUNT(*) FROM (SELECT class.ClassName,student.StudentName,
AVG(mark.PointCC) ,AVG(mark.PointGK),AVG(mark.PointCK),
COUNT(student.StudentName) AS Tongmon, 
AVG(((mark.PointCC)+(mark.PointGK)*2+(mark.PointCK)*3)/6) AS Tong 
FROM mark
INNER JOIN student ON mark.StudentID=student.StudentID 
INNER JOIN handledclass ON student.HID =handledclass.HID 
INNER JOIN class ON handledclass.ClassID=class.ClassID 
GROUP BY StudentName HAVING Tong <5) AS Tongso";
$res = $db->query($sql);
if ($res->num_rows > 0) {
	$couhsy = $res->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Admin Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Responsive bootstrap 4 admin template" name="description">
	<meta content="Coderthemes" name="author">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- App favicon -->
	<link rel="shortcut icon" href="assets\images\favicon.ico">

	<!-- Ricksaw Css-->
	<link href="assets\libs\rickshaw\rickshaw.min.css" rel="stylesheet" type="text/css">

	<!-- App css -->
	<link href="assets\css\bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
	<link href="assets\css\icons.min.css" rel="stylesheet" type="text/css">
	<link href="assets\css\app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet">

</head>

<body>
	<!-- Begin page -->
	<div id="wrapper">
		<?php include "navbar.php"; ?><br>
		<div class="content-page">
			<div class="content">

				<!-- Start Content-->
				<div class="container-fluid">

					<!-- start page title -->
					<div class="row">
						<div class="col-12">
							<div class="page-title-box">
								<h4 class="page-title">Welcome <?php echo $_SESSION["ANAME"]; ?></h4>
								<div class="page-title-right">
									<ol class="breadcrumb p-0 m-0">
										<!-- <li class="breadcrumb-item"><a href="#">Velonic</a></li>
                                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Dashboard 2</li> -->
									</ol>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<!-- end page title -->

					<div class="row">
						<div class="col-xl-3 col-sm-6" style="cursor: pointer;" onclick="window.location='add_class.php'">
							<div class="card">
								<div class="card-body widget-style-2">
									<div class="media">
										<div class="media-body align-self-center">
											<h2 class="my-0"><span data-plugin="counterup"><?php echo $cou1["COUNT(*)"]; ?></span></h2>
											<p class="mb-0">Phòng học</p>
										</div>
										<i class=" mdi mdi-garage text-success bg-light"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6" style="cursor: pointer;" onclick="window.location='view_hclass.php'">
							<div class="card">
								<div class="card-body widget-style-2">
									<div class="media">
										<div class="media-body align-self-center">
											<h2 class="my-0"><span data-plugin="counterup"><?php echo $cou5["COUNT(*)"]; ?></span></h2>
											<p class="mb-0">Số lớp đang học</p>
										</div>
										<i class="ion-md-eye text-pink bg-light"></i>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-3 col-sm-6" style="cursor: pointer;" onclick="window.location='add_sub.php'">
							<div class="card">
								<div class="card-body widget-style-2">
									<div class="media">
										<div class="media-body align-self-center">
											<h2 class="my-0"><span data-plugin="counterup"><?php echo $cou2["COUNT(*)"]; ?></span></h2>
											<p class="mb-0">Môn học</p>
										</div>
										<i class="ion-ios-paper text-purple bg-light"></i>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-3 col-sm-6" style="cursor: pointer;" onclick="window.location='view_teacher.php'">
							<div class="card">
								<div class="card-body widget-style-2">
									<div class="media">
										<div class="media-body align-self-center">
											<h2 class="my-0"><span data-plugin="counterup"><?php echo $cou3["COUNT(*)"]; ?></span></h2>
											<p class="mb-0">Tổng số giáo viên</p>
										</div>
										<i class=" ion-ios-people text-info bg-light"></i>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-3 col-sm-6" style="cursor: pointer;" onclick="window.location='view_student.php'">
							<div class="card">
								<div class="card-body widget-style-2">
									<div class="media">
										<div class="media-body align-self-center">
											<h2 class="my-0"><span data-plugin="counterup"><?php echo $cou4["COUNT(*)"]; ?></span></h2>
											<p class="mb-0">Tổng số học sinh</p>
										</div>
										<i class="mdi ion-md-school text-primary bg-light"></i>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">

						<div class="col-xl-6">

							<div class="card">
								<div class="card-header py-3 bg-transparent">
									<div class="card-widgets">
										<a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
										<a data-toggle="collapse" href="#cardCollpase1" role="button" aria-expanded="false" aria-controls="cardCollpase1"><i class="mdi mdi-minus"></i></a>
									</div>
									<h5 class="header-title mb-0"> Toàn trường </h5>
								</div>
								<div id="cardCollpase1" class="collapse show">
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<div id="chart_div"></div>
											</div>
										</div>

									</div>
								</div>
							</div>
							<!-- end card-->
						</div>
						<?php include "chartclassone.php"; ?>
						<!-- end col -->
					</div>
					<div class="row">
						<?php include "chartclasstwo.php"; ?>
						<?php include "chartclassthree.php"; ?>
					</div>
					<div class="row">
						<?php include "chartclassfour.php"; ?>
						<?php include "chartclassfive.php"; ?>
					</div>
				</div>
				<!-- end container-fluid -->
			</div>
			<!-- end content -->
		</div>
		<!-- ============================================================== -->
		<!-- End Page content -->
		<!-- ============================================================== -->
		<?php include "sidebar.php"; ?>
		<?php include "footer.php"; ?>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
			// Load the Visualization API and the piechart package.
			google.load('visualization', '1.0', {
				'packages': ['corechart']
			});
			google.setOnLoadCallback(drawChart);

			function drawChart() {

				// Create the data table.
				var data = new google.visualization.DataTable();
				// Create columns for the DataTable
				data.addColumn('string');
				data.addColumn('number', 'Devices');
				// Create Rows with data
				data.addRows([
					['Học sinh giỏi', <?php echo $couhsg["COUNT(*)"]; ?>],
					['Học sinh khá', <?php echo $couhsk["COUNT(*)"]; ?>],
					['Học sinh trung bình', <?php echo $couhstb["COUNT(*)"]; ?>],
					['Học sinh yếu', <?php echo $couhsy["COUNT(*)"]; ?>],

				]);
				//Create option for chart
				var options = {
					title: 'Điểm trung bình môn',
					is3D: true,
					

				};

				// Instantiate and draw our chart, passing in some options.
				var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
				chart.draw(data, options);
			}
		</script>

</body>

</html>