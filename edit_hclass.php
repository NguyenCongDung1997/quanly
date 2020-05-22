<?php
include "database.php";
session_start();

if (isset($_POST["HID"])) {
    $TeacherID = $_POST["TeacherID"];
    $ClassID = $_POST["ClassID"];
    $SubjectsID = $_POST["SubjectsID"];
    $HID = $_POST["HID"];
    $sql = "update handledclass
                set
                TeacherID='$TeacherID',
                ClassID ='$ClassID',
                SubjectsID='$SubjectsID'
                where HID ='$HID'";
    if ($db->query($sql)) {
        header("Location: view_hclass.php");
    }
}
if (isset($_GET["id"])) {
    $HID  = $_GET["id"];
    $sql = "select
    *
    FROM handledclass
    INNER JOIN class ON handledclass.ClassID =class.ClassID 
    INNER JOIN subjects ON handledclass.SubjectsID=subjects.SubjectsID
    INNER JOIN teacher ON handledclass.TeacherID=teacher.TeacherID where HID ='$HID'
    "; 
    $result = $db->query($sql);

    $row = $result->fetch_assoc();
    if ($row == null) {
        header("Location: view_hclass.php");
    }
} else {
    header("Location: view_hclass.php");
}

//================= =========================>
$sql = "select * from class";
$query = $db->query($sql);
$class = [];
while ($item = $query->fetch_array()) {
    $class[] = $item;
}
//==========================================>
$sql = "select * from subjects";
$query = $db->query($sql);
$sub = [];
while ($item = $query->fetch_array()) {
    $sub[] = $item;
}
//==========================================>
$sql = "select * from teacher";
$query = $db->query($sql);
$teacher = [];
while ($item = $query->fetch_array()) {
    $teacher[] = $item;
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
                        <div class="col-12 d-flex justify-content-center">
                            <div class="page-title-box">
                                <h4 class="page-title">Sửa lớp học</h4>
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
                                        <input type="hidden" name="HID" value="<?= $row["HID"] ?>">
                                        <div class="form-group">
                                            <label for="inputAddress" class="col-form-label">Tên giáo viên dạy</label>
                                            <select name="TeacherID" id="inputState" class="form-control">
                                                <?php foreach ($teacher as $item) { ?>
                                                    <option value="<?= $item["TeacherID"] ?>" <?= $item["TeacherID"] == $row["TeacherID"] ? "selected" : "" ?>>
                                                        <?= $item["FullName"] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputCity" class="col-form-label">Lớp</label>
                                                <select name="ClassID" id="inputState" class="form-control">
                                                    <?php foreach ($class as $item) { ?>
                                                        <option value="<?= $item["ClassID"] ?>" <?= $item["ClassID"] == $row["ClassID"] ? "selected" : "" ?>>
                                                            <?= $item["ClassName"] ?>-<?= $item["ClassSection"] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputState" class="col-form-label">Môn học</label>
                                                <select name="SubjectsID" id="inputState" class="form-control">
                                                <?php foreach ($sub as $item) { ?>
                                                    <option value="<?= $item["SubjectsID"] ?>" <?= $item["SubjectsID"] == $row["SubjectsID"] ? "selected" : "" ?>>
                                                        <?= $item["SubjectsName"] ?></option>
                                                <?php } ?>
                                                </select>
                                            </div>
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