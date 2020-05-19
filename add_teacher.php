<?php
include "database.php";
session_start();
if (isset($_POST["delete"])) {
	$TeacherID = $_POST["delete"];
	$sql = "DELETE FROM teacher WHERE TeacherID='$TeacherID'";
	$db->query($sql);
}

$s = "select * from teacher";
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
								<h4 class="page-title">Thêm giáo viên</h4>
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
									<form method="post" action="/school/handleAddTeacher.php">

										<div class="form-group">
											<label for="inputAddress" class="col-form-label">Họ tên giáo viên</label>
											<input type="text" name="tfullname" class="form-control" id="inputAddress" placeholder="">
										</div>
										<div class="form-group">
											<label for="inputAddress2" class="col-form-label">Địa chỉ</label>
											<input type="text" name="taddress" class="form-control" id="inputAddress2" placeholder="">
										</div>
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="inputEmail4" class="col-form-label">Tài khoản đăng nhập</label>
												<input type="text" name="tname" class="form-control" id="inputEmail4" placeholder="Tên đăng nhập">
											</div>
											<div class="form-group col-md-6">
												<label for="inputPassword4" class="col-form-label">Mật khẩu</label>
												<input type="password" name="tpass" class="form-control" id="inputPassword4" placeholder="Mật khẩu">
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-5">
												<label for="inputCity" class="col-form-label">Số điện thoại</label>
												<input type="text" name="tphone" class="form-control" id="inputCity">
											</div>
											<div class="form-group col-md-2">
												<label for="inputZip" class="col-form-label">Giới tính</label>
												<input type="text" name="tgender" class="form-control" id="inputZip">
											</div>
											<div class="form-group col-md-5">
												<label class=" col-form-label" for="example-date">Ngày sinh</label>
												<input class="form-control" name="tdate" id="example-date" type="date" name="date">
											</div>
										</div>

										<div class="form-group">
											<label class=" col-form-label" for="example-fileinput">Chọn ảnh</label>
											<input type="file" name="timages" class="form-control" id="example-fileinput">
										</div>
										<div class="form-group">
											<label for="inputEmail4" class="col-form-label">Email</label>
											<input type="email" name="tmail" class="form-control" id="inputEmail4" placeholder="Email">
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