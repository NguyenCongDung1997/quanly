<?php
include "database.php";
session_start();

// $s = "select * from handledclass";
// $res = $db->query($s);
// $class = [];
// if ($res->num_rows > 0) {
// 	$i = 0;
// 	while ($r = $res->fetch_assoc()) {
// 		$class[] = $r;
// 	}
// }

?>

<!DOCTYPE html>
<html>

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
	<div id="wrapper">
		<?php include "navbar.php"; ?><br>
		<div class="content-page">
			<div class="content">
				<!-- Start Content-->
				<div class="container-fluid ">
					<!-- start page title -->
					<div class="row">
						<div class="col-12 d-flex justify-content-center">
							<div class="page-title-box">
								<h4 class="page-title">Thêm lớp học</h4>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<!-- end page title -->
					<div class="row">
						<div class="col-md-12 d-flex justify-content-center">
							<div class="card col-md-6">
								<div class="card-body">
									<?php
									if (isset($_SESSION["alert"])) {
										echo ("<div class='alert alert-success'>$_SESSION[alert]</div>");
										unset($_SESSION["alert"]);
									}
									if (isset($_SESSION["alert1"])) {
										echo ("<div class='alert alert-danger'>$_SESSION[alert1]</div>");
										unset($_SESSION["alert1"]);
									}
									?>
									<form method="post" action="/school/handleAddHclass.php">
										<div class="form-group">
											<label for="inputAddress" class="col-form-label">Tên giáo viên dạy</label>
											<select name="teacherid" id="inputState" class="form-control">
												<?php
												$sl = "SELECT * FROM teacher";
												$r = $db->query($sl);
												if ($r->num_rows > 0) {
													echo "<option  value=''>Tên giáo viên</option>";
													while ($ro = $r->fetch_assoc()) {
														echo "<option value='{$ro["TeacherID"]}'>{$ro["FullName"]}</option>";
													}
												}
												?>
											</select>
										</div>
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="inputCity" class="col-form-label">Lớp</label>
												<select name="classid" id="inputState" class="form-control">
													<?php
													$sl = "SELECT * FROM class";
													$r = $db->query($sl);
													if ($r->num_rows > 0) {
														echo "<option  value=''>Lớp</option>";
														while ($ro = $r->fetch_assoc()) {
															echo "<option value='{$ro["ClassID"]}'>{$ro["ClassName"]}-{$ro["ClassSection"]}</option>";
														}
													}
													?>
												</select>
											</div>
											<div class="form-group col-md-6">
												<label for="inputState" class="col-form-label">Môn học</label>
												<select name="subid" id="inputState" class="form-control">
													<?php
													$sl = "SELECT * FROM subjects";
													$r = $db->query($sl);
													if ($r->num_rows > 0) {
														echo "<option value=''>Môn học</option>";
														while ($ro = $r->fetch_assoc()) {
															echo "<option value='{$ro["SubjectsID"]}'>{$ro["SubjectsName"]}</option>";
														}
													}
													?>
												</select>
											</div>
										</div>
										<button type="submit" class="btn btn-primary" name="submit">Lưu lại</button>
									</form>
								</div>
							</div>
						</div>
					</div>
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