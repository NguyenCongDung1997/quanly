<?php
include "database.php";
session_start();
if (!isset($_SESSION["AID"])) {
	echo "<script>window.open('index.php?mes=Access Denied...','_self');</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Teacher Home</title>
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
				<div class="container-fluid d-flex justify-content-center">
					<div class="col-lg-6 ">
						<div class="card">
							<div class="card-body">
								<h4 class="header-title mb-4">Thay đổi mật khẩu</h4>

								<form class="parsley-examples" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
									<div class="form-group row">
										<label for="hori-pass1" class="col-md-4 col-form-label">Mật khẩu cũ<span class="text-danger">*</span></label>
										<div class="col-md-7">
											<input id="hori-pass1" name="opass" type="password" placeholder="" required="" class="form-control">
										</div>
									</div>
									<div class="form-group row">
										<label for="hori-pass1" class="col-md-4 col-form-label">Mật khẩu mới<span class="text-danger">*</span></label>
										<div class="col-md-7">
											<input id="hori-pass1" name="npass" type="password" placeholder="" required="" class="form-control">
										</div>
									</div>
									<div class="form-group row">
										<label for="hori-pass2" class="col-md-4 col-form-label">Nhập lại mật khẩu
											<span class="text-danger">*</span></label>
										<div class="col-md-7">
											<input data-parsley-equalto="#hori-pass1" name="cpass" type="password" required="" placeholder="" class="form-control" id="hori-pass2">
										</div>
									</div>
									<?php
									if (isset($_POST["submit"])) {
										$sql = "select * from admin where APASS='{$_POST["opass"]}' and AID='{$_SESSION["AID"]}'";
										$result = $db->query($sql);
										if ($result->num_rows > 0) {
											if ($_POST["npass"] == $_POST["cpass"]) {
												$s = "update admin SET APASS='{$_POST["npass"]}' where AID='{$_SESSION["AID"]}'";
												$db->query($s);
												echo "<div class='success alert alert-success'>Mật khẩu đã được thay đổi</div>";
											} else {
												echo "<div class='error alert alert-error'>Mật khẩu không trùng</div>";
											}
										} else {
											echo "<div class='error alert alert-error'>Mật khẩu không hợp lệ</div>";
										}
									}
									?>
									<div class="form-group row mb-0">
										<div class="col-md-8 offset-md-4">
											<button type="submit" name="submit" class="btn btn-primary waves-effect waves-light mr-1">
												Lưu lại
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<!-- end card -->
					</div>
					<!-- end col -->
				</div>
				<!-- end row -->
			</div>
		</div>

	</div>

	</div>
	<!-- ============================================================== -->
	<!-- End Page content -->
	<!-- ============================================================== -->
	<?php include "sidebar.php"; ?>
	<?php include "footer.php"; ?>
</body>

</html>