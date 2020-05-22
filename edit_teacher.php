<?php
include "database.php";
session_start();
// $s = "select * from class";
// $res = $db->query($s);
// $class = [];
// if ($res->num_rows > 0) {
//     $i = 0;
//     while ($r = $res->fetch_assoc()) {
//         $class[] = $r;
//     }
// }
if (isset($_POST["TeacherID"])) {
    $FullName = $_POST["TeacherNumber"];
    $ClassID = $_POST["ClassID"];
    $ClassSection = $_POST["ClassSection"];
    $sql = "update class
                set
                ClassName='$ClassName',
                ClassSection='$ClassSection'
                where ClassID='$ClassID'";
                
    if ($db->query($sql)) {
        header("Location: add_class.php");
    }
}
if (isset($_GET["id"])) {
    $ClassID = $_GET["id"];
    $sql = "select * from class where ClassID='$ClassID'";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    if ($row == null) {
        header("Location: add_class.php");
    }
} else {
    header("Location: add_class.php");
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
                                <h4 class="page-title">Sửa giáo viên</h4>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center">
                            <div class="card">
                                <div class="card-body">
                                    <?php
                                    if (isset($_SESSION["alert"])) {
                                        echo ("<div class='alert alert-success'>$_SESSION[alert]</div>");
                                        unset($_SESSION["alert"]);
                                    }
                                    ?>
                                    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                                    <input type="hidden" name="ClassID" value="<?= $row["ClassID"] ?>">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="inputEmail4" class="col-form-label">Tên Lớp</label>
                                                <input type="text" name="ClassName" class="form-control " id="inputEmail4" value="<?= $row["ClassName"] ?>">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputPassword4" class="col-form-label">Cấp độ</label>
                                                <input type="text" name="ClassSection" class="form-control " id="inputPassword4" value="<?= $row["ClassSection"] ?>">
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