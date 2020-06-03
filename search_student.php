<?php
include "database.php";
session_start();
if (isset($_POST["delete"])) {
    $StudentID  = $_POST["delete"];
    $sql = "DELETE FROM student WHERE StudentID='$StudentID'";
    $db->query($sql);
}

$timkiem = isset($_POST["search"]) ? $_POST["search"] : "";

$sql = "SELECT
            *
        FROM student
        WHERE StudentName LIKE '%$timkiem%'";
$res = $db->query($sql);
$name = [];
if ($res->num_rows > 0) {
	$i = 0;
	while ($r = $res->fetch_assoc()) {
		$name[] = $r;
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
                                        <div class=" col-md-12">
                                            <h4 class="header-title" style="text-align:center;">Danh sách học sinh</h4>
                                        </div>
                                        <div class=" p-2 col-md-12 d-flex flex-row-reverse ">
											<form class=" app-search" action="search_student.php" method="post">
												<div class="app-search-box">
													<div class="input-group">
														<input name="search" type="text" autocomplete="off" class="form-control " style="border-radius: 30px 0 0 30px  " placeholder="Search...">
														<div class="input-group-append">
															<button class="btn btn-secondary" type="submit" style="border-radius: 0 30px 30px 0">
																<i class="fas fa-search"></i>
															</button>
														</div>
													</div>
												</div>
											</form>
										</div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-centered mb-0 table-nowrap" id="btn-editable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tên Học sinh</th>
                                                    <th>Giới tính</th>
                                                    <th>Ngày sinh</th>
                                                    <th>Địa chỉ</th>
                                                    <th>Lớp</th>
                                                    <th>Số điện thoại</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($name as $value) : ?>
                                                    <tr>
                                                        <td><?php echo ($i) ?></td>
                                                        <td><?php echo $value["StudentName"] ?></td>
                                                        <td><?php echo $value["gender"] ?></td>
                                                        <td><?php echo $value["StudentDate"] ?></td>
                                                        <td><?php echo $value["Address"] ?></td>
                                                        <td><?php echo $value["HID"] ?></td>
                                                        <td><?php echo $value["StudentPhone"] ?></td>
                                                        <td style="white-space: nowrap; width: 1%;">
                                                            <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                                                <div class="btn-group btn-group-sm" style="float: none;">
                                                                    <form method="post">
                                                                        <a type="button" href="edit_student.php?id=<?= $value["StudentID"] ?>" class="tabledit-edit-button btn btn-success tabledit-toolbar active" style="float: none;" data-placement="top" data-toggle="tooltip" data-original-title="Sửa">
                                                                            <i class="fas fa-pencil-alt"></i>
                                                                        </a>
                                                                        <button class="btn btn-danger" name="delete" value="<?= $value["StudentID"] ?>" data-placement="top" data-toggle="tooltip" data-original-title="Xóa">
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