<?php
include "database.php";
session_start();

if (isset($_GET["id"])) {
    $HID = $_GET["id"];
    $sql = "select
    *
    FROM student where HID='$HID'
    ";

    $result = $db->query($sql);
    $row = $result->fetch_assoc();

} 

$s = "select * from student where HID='$HID'";
$res = $db->query($s);
$class = [];
if ($res->num_rows > 0) {
    $i = 0;
    while ($r = $res->fetch_assoc()) {
        $class[] = $r;
    }
}
//==============================================>
$s = "select
*
FROM handledclass
INNER JOIN class ON handledclass.ClassID=class.ClassID
INNER JOIN subjects ON handledclass.SubjectsID=subjects.SubjectsID
INNER JOIN teacher ON handledclass.TeacherID=teacher.TeacherID where HID='$HID'";

$res = $db->query($s);

if ($res->num_rows > 0) {
	$row1 = $res->fetch_assoc();
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
                                <?php
									if (isset($_SESSION["alert"])) {
										echo ("<div class='alert alert-success'>$_SESSION[alert]</div>");
										unset($_SESSION["alert"]);
									}
									?>
                                    <div class="form-row">
                                        <div class=" col-md-12">
                                            <h4 class="header-title" style="text-align:center;">Danh sách học viên lớp: <?= $row1["ClassName"] ?>-<?= $row1["ClassSection"] ?></h4>
                                        </div>
                                        <div class=" p-2 col-md-6">
                                            <p class="text-black"> Giáo viên: <?= $row1["FullName"] ?> __ Môn: <?= $row1["SubjectsName"] ?> </p>
                                        </div>
                                        <div class=" p-2 col-md-6 d-flex flex-row-reverse">
                                            <form action="/school/excel.php" method="post">
                                                <input type="submit" name="export" class="btn btn-success" value="Xuất file Excel">
                                            </form>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-centered mb-0 table-nowrap" id="btn-editable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tên Học viên</th>
                                                    <th>Giới tính</th>
                                                    <th>Ngày sinh</th>
                                                    <th>Địa chỉ</th>
                                                    <th>Số điện thoại</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($class as $value) : ?>
                                                    <tr>
                                                        <td><?php echo ($i) ?></td>
                                                        <td><?php echo $value["StudentName"] ?></td>
                                                        <td><?php echo $value["gender"] ?></td>
                                                        <td><?php echo $value["StudentDate"] ?></td>
                                                        <td><?php echo $value["Address"] ?></td>
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
