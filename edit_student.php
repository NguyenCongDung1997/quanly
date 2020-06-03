<?php
include "database.php";
session_start();

if (isset($_POST["StudentID"])) {
    $StudentName = $_POST["StudentName"];
    $StudentDate = $_POST["StudentDate"];
    $gender = $_POST["gender"];
    $StudentPhone  = $_POST["StudentPhone"];
    $Address = $_POST["Address"];
    $Images = $_POST["Images"];
    $HID = $_POST["HID"];
    $StudentID = $_POST["StudentID"];
    $sql = "update student
                set
                StudentName='$StudentName',
                StudentDate='$StudentDate',
                gender='$gender',
                StudentPhone='$StudentPhone',
                Address='$Address',
                HID ='$HID',
                Images ='$Images'
                where StudentID ='$StudentID'";
                
    if ($db->query($sql)) {
        header("Location: view_student.php");
    }
    
}
if (isset($_GET["id"])) {
    $StudentID  = $_GET["id"];
    $sql = "select * FROM student where StudentID='$StudentID'";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    if ($row == null) {
        header("Location: view_student.php");
    }
} else {
    header("Location: view_student.php");
}

//==========================================>
$sql = "select * from handledclass
INNER JOIN teacher ON handledclass.TeacherID=teacher.TeacherID
INNER JOIN subjects ON handledclass.SubjectsID=subjects.SubjectsID";
$query = $db->query($sql);
$class = [];
while ($item = $query->fetch_array()) {
    $class[] = $item;
}
//==========================================>



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
                        <div class="col-12 d-flex justify-content-center">
                            <div class="page-title-box">
                                <h4 class="page-title">Sửa thông tin học sinh</h4>
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
                                    ?>
                                    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                                        <input type="hidden" name="StudentID" value="<?= $row["StudentID"] ?>">
                                        <div class="form-group">
                                            <label for="inputAddress" class="col-form-label">Họ tên học sinh</label>
                                            <input type="text" value="<?= $row["StudentName"] ?>" name="StudentName" class="form-control" id="inputAddress" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress2" class="col-form-label">Địa chỉ</label>
                                            <input type="text" value="<?= $row["Address"] ?>" name="Address" class="form-control" id="inputAddress2" placeholder="">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <label for="inputCity" class="col-form-label">Số điện thoại</label>
                                                <input type="text" value="<?= $row["StudentPhone"] ?>" name="StudentPhone" class="form-control" id="inputCity">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="inputZip" class="col-form-label">Giới tính</label>
                                                <input type="text" value="<?= $row["gender"] ?>" name="gender" class="form-control" id="inputZip">
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class=" col-form-label" for="example-date">Ngày sinh</label>
                                                <input class="form-control" value="<?= $row["StudentDate"] ?>" name="StudentDate" id="example-date" type="date" name="date">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="inputZip" class="col-form-label">Chọn ảnh</label>
                                                <input type="file" value="<?= $row["Images"] ?>" name="Images" class="form-control" id="example-fileinput">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail4" class="col-form-label">Chuyển lớp</label>
                                            <select name="HID" id="inputState" class="form-control">
                                                <?php foreach ($class as $item) { ?>
                                                    <option name="HID" value="<?= $item["HID"] ?>" <?= $item["HID"] == $row["HID"] ? "selected" : "" ?>>
                                                        <?= $item["FullName"] ?>-<?= $item["SubjectsName"] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="submit">Lưu lại</button>
                                        <a href="javascript:history.back()" class="btn btn-pink">Trở về</a>
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