<?php
include "database.php";
session_start();
if (isset($_POST["delete"])) {
	$StudentID = $_POST["delete"];
	$sql = "DELETE FROM student WHERE StudentID='$StudentID'";
	$db->query($sql);
}

$s = "select * from student";
$res = $db->query($s);
$class = [];
if ($res->num_rows > 0) {
	$i = 0;
	while ($r = $res->fetch_assoc()) {
		$class[] = $r;
	}
}

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
				<div class="container-fluid">
					<!-- start page title -->
					<div class="row">
						<div class="col-12">
							<div class="page-title-box">
								<h4 class="page-title">Thêm học viên</h4>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<!-- end page title -->
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<?php
									if (isset($_SESSION["alert"])) {
										echo ("<div class='alert alert-success'>$_SESSION[alert]</div>");
										unset($_SESSION["alert"]);
									}if(isset($_SESSION["alert1"])){
										echo ("<div class='alert alert-danger'>$_SESSION[alert1]</div>");
										unset($_SESSION["alert1"]);
									}
									?>
									<form method="post" action="/school/handleAddStudent.php">

										<div class="form-group">
											<label for="inputAddress" class="col-form-label">Họ tên học viên</label>
											<input type="text" name="sfullname" class="form-control" id="inputAddress" placeholder="">
										</div>
										<div class="form-group">
											<label for="inputAddress2" class="col-form-label">Địa chỉ</label>
											<input type="text" name="saddress" class="form-control" id="inputAddress2" placeholder="">
										</div>
										<div class="form-row">
											<div class="form-group col-md-5">
												<label for="inputCity" class="col-form-label">Số điện thoại</label>
												<input type="text" name="sphone" class="form-control" id="inputCity">
											</div>
											<div class="form-group col-md-2">
												<label for="inputZip" class="col-form-label">Giới tính</label>
												<input type="text" name="sgender" class="form-control" id="inputZip">
											</div>
											<div class="form-group col-md-5">
												<label class=" col-form-label" for="example-date">Ngày sinh</label>
												<input class="form-control" name="sdate" id="example-date" type="date" name="date">
											</div>
										</div>

										<div class="form-group">
											<label class=" col-form-label" for="example-fileinput">Chọn ảnh</label>
											<input type="file" name="simages" class="form-control" id="example-fileinput">
										</div>
										<div class="form-group">
											<label for="inputEmail4" class="col-form-label">Chọn lớp</label>
											<select name="hid" id="inputState" class="form-control">
													<?php
                                                    $sl = "select *
                                                    FROM handledclass
                                                    INNER JOIN subjects ON handledclass.SubjectsID=subjects.SubjectsID
                                                    INNER JOIN teacher ON handledclass.TeacherID=teacher.TeacherID
                                                    ";
                                                   
													$r = $db->query($sl);
													if ($r->num_rows > 0) {
														echo "<option value=''>Lớp học</option>";
														while ($ro = $r->fetch_assoc()) {
															echo "<option value='{$ro["HID"]}'>{$ro["FullName"]}-{$ro["SubjectsName"]}</option>";
														}
													}
													?>
												</select>
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