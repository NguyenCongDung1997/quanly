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
						<div class="col-xl-3 col-sm-6">
							<div class="card">
								<div class="card-body widget-style-2">
									<div class="media">
										<div class="media-body align-self-center">
											<h2 class="my-0"><span data-plugin="counterup"><?php echo $cou1["COUNT(*)"]; ?></span></h2>
											<p class="mb-0">Class</p>
										</div>
										<i class="ion-md-eye text-pink bg-light"></i>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-3 col-sm-6">
							<div class="card">
								<div class="card-body widget-style-2">
									<div class="media">
										<div class="media-body align-self-center">
											<h2 class="my-0"><span data-plugin="counterup"><?php echo $cou2["COUNT(*)"]; ?></span></h2>
											<p class="mb-0">Subjects</p>
										</div>
										<i class="ion-ios-paper text-purple bg-light"></i>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-3 col-sm-6">
							<div class="card">
								<div class="card-body widget-style-2">
									<div class="media">
										<div class="media-body align-self-center">
											<h2 class="my-0"><span data-plugin="counterup"><?php echo $cou3["COUNT(*)"]; ?></span></h2>
											<p class="mb-0">Teacher</p>
										</div>
										<i class=" ion-ios-people text-info bg-light"></i>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-3 col-sm-6">
							<div class="card">
								<div class="card-body widget-style-2">
									<div class="media">
										<div class="media-body align-self-center">
											<h2 class="my-0"><span data-plugin="counterup"><?php echo $cou4["COUNT(*)"]; ?></span></h2>
											<p class="mb-0">Student</p>
										</div>
										<i class="mdi ion-md-school text-primary bg-light"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end col -->
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
</body>

</html>