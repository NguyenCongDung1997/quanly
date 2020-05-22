<?php
include "database.php";
session_start();

if (isset($_POST["SubjectsID"])) {
    $SubjectsName = $_POST["SubjectsName"];
    $SubjectsID = $_POST["SubjectsID"];
    $sql = "update subjects
                set
                SubjectsName='$SubjectsName'
                where SubjectsID='$SubjectsID'";
                
    if ($db->query($sql)) {
        header("Location: add_sub.php");
    }
}
if (isset($_GET["id"])) {
    $SubjectsID = $_GET["id"];
    $sql = "select * from subjects where SubjectsID='$SubjectsID'";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    if ($row == null) {
        header("Location: add_sub.php");
    }
} else {
    header("Location: add_sub.php");
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
                                <h4 class="page-title">Sửa Môn học</h4>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center">
                            <div class="card">
                                <div class="card-body">
                                    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                                    <input type="hidden" name="SubjectsID" value="<?= $row["SubjectsID"] ?>">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="inputEmail4" class="col-form-label">Tên Môn</label>
                                                <input type="text" name="SubjectsName" class="form-control " id="inputEmail4" value="<?= $row["SubjectsName"] ?>">
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