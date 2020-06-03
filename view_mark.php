<?php
include "database.php";
session_start();
if (isset($_POST["delete"])) {
	$MarkID   = $_POST["delete"];
	$sql = "DELETE FROM mark WHERE MarkID ='$MarkID'";
	$db->query($sql);
}

	$s = "select * FROM mark 
	INNER JOIN student ON mark.StudentID=student.StudentID 
	INNER JOIN subjects ON mark.SubjectsID =subjects.SubjectsID 
	INNER JOIN handledclass ON student.HID =handledclass.HID 
	INNER JOIN class ON handledclass.ClassID = class.ClassID 
	ORDER BY class.ClassName,class.ClassSection,subjects.SubjectsName
";

$res = $db->query($s);
$mark = [];
if ($res->num_rows > 0) {
	$i = 0;
	while ($r = $res->fetch_assoc()) {
		$mark[] = $r;
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
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<div class="form-row">
										<div class="col-md-12 pb-4">
											<h4 class="header-title" style="text-align:center;">Danh sách điểm thi</h4>
										</div>
									</div>
									<div class="table-responsive">
										<table class="table table-centered mb-0 table-nowrap" id="btn-editable">
											<thead>
												<tr>
													<th>#</th>
													<th>Tên học sinh</th>
													<th>Điểm miệng</th>
													<th>Điểm giữa kỳ</th>
													<th>Điểm cuối kỳ</th>
													<th>Điểm trung bình</th>
													<th>Tên môn học</th>
													<th>Lớp</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<?php $i = 1; ?>
												<?php $tb = 0; foreach ($mark as $value) : ?>
													<tr>
														<td><?php echo ($i) ?></td>
														<td><?php echo $value["StudentName"] ?></td>
														<td><?php echo $value["PointCC"] ?></td>
														<td><?php echo $value["PointGK"] ?></td>
														<td><?php echo $value["PointCK"] ?></td>
														<td><?php echo $tb =round(($value["PointCC"] + $value["PointGK"]*2 + $value["PointCK"]*3)/6,2) ?></td>
														<td><?php echo $value["SubjectsName"] ?></td>
														<td><?php echo $value["ClassName"], "-", $value["ClassSection"] ?></td>
														<td style="white-space: nowrap; width: 1%;">
															<div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
																<div class="btn-group btn-group-sm" style="float: none;">
																	<form method="post">
																		<button type="button" class="tabledit-edit-button btn btn-success" style="float: none;">
																			<span class="mdi mdi-eye"></span>
																		</button>
																		<a type="button" href="edit_mark.php?id=<?= $value["MarkID"] ?>" class="tabledit-edit-button btn btn-success tabledit-toolbar active" style="float: none;" data-placement="top" data-toggle="tooltip" data-original-title="Sửa">
																			<i class="fas fa-pencil-alt"></i>
																		</a>
																		<button class="btn btn-danger" name="delete" value="<?= $value["MarkID"] ?>">
																			<i class="fas fa-times"></i>
																		</button>
																	</form>
																</div>
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