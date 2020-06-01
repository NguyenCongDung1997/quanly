<?php
include "database.php";
session_start();
if (isset($_POST["delete"])) {
	$SubjectsID = $_POST["delete"];
	$sql = "DELETE FROM subjects WHERE SubjectsID='$SubjectsID'";
	$db->query($sql);
}

$s = "select * from subjects";
$res = $db->query($s);
$subjects = [];
if ($res->num_rows > 0) {
	$i = 0;
	while ($r = $res->fetch_assoc()) {
		$subjects[] = $r;
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

	<!-- Ricksaw Css-->
	<link href="assets\libs\rickshaw\rickshaw.min.css" rel="stylesheet" type="text/css">

	<!-- App css -->
	<link href="assets\css\bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
	<link href="assets\css\icons.min.css" rel="stylesheet" type="text/css">
	<link href="assets\css\app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet">
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
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
								<h4 class="page-title">Thêm Môn học</h4>
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
										if(isset($_SESSION["alert"])){
											echo("<div class='alert alert-success'>$_SESSION[alert]</div>");
											unset($_SESSION["alert"]);
										}if(isset($_SESSION["alert1"])){
											echo("<div class='alert alert-danger'>$_SESSION[alert1]</div>");
											unset($_SESSION["alert1"]);
										}
									?>
									<form method="post" action="/school/handleAddSub.php">
										<div class="form-row">
											<div class="form-group col-md-3">
												<label for="inputEmail4" class="col-form-label">Tên Môn</label>
												<input type="text" name="sname" class="form-control " id="inputEmail4" placeholder="Tên môn">
											</div>
										</div>
										<button type="submit" class="btn btn-primary" name="submit">Lưu lại</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<h4 class="header-title mb-4">Danh sách lớp học</h4>
									<div class="table-responsive">
										<table class="table table-centered mb-0 table-nowrap" id="btn-editable">
											<thead>
												<tr>
													<th>#</th>
													<th>Tên Môn</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<?php $i = 1; ?>
												<?php foreach ($subjects as $value) : ?>
													<tr>
														<td><?php echo ($i) ?></td>
														<td><?php echo $value["SubjectsName"] ?></td>
														<td style="white-space: nowrap; width: 1%;">
															<div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
																<div class="btn-group btn-group-sm" style="float: none;">
																<form method="post">
																		<a type="button" href="edit_sub.php?id=<?= $value["SubjectsID"] ?>" class="tabledit-edit-button btn btn-success tabledit-toolbar active" style="float: none;" data-placement="top" data-toggle="tooltip" data-original-title="Sửa">
																			<i class="fas fa-pencil-alt"></i>
																		</a>
																		<button class="btn btn-danger" name="delete" value="<?= $value["SubjectsID"] ?>" data-placement="top" data-toggle="tooltip" data-original-title="Xóa">
																			<i class="fas fa-times"></i>
																		</button>
																	</form>
																</div>
														</td>
													</tr>
													<?php $i++ ?>
												<?php endforeach ?>
											</tbody>
										</table>
									</div>
									<!-- end .table-responsive-->
								</div>
								<!-- end card-body -->
							</div>
							<!-- end card -->
						</div>
						<!-- end col -->
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