<?php
include "database.php";
session_start();

if (isset($_POST["MarkID"])) {
    
    $Point = $_POST["Point"];
    $ExamID = $_POST["ExamID"];
    $SubjectsID = $_POST["SubjectsID"];
    $MarkID  = $_POST["MarkID"];
    $sql = "update mark
                set
                
                Point='$Point',
                ExamID='$ExamID',
                SubjectsID='$SubjectsID'
                where MarkID ='$MarkID'";
                

    if ($db->query($sql)) {
        header("Location: view_mark.php");
    }
}
if (isset($_GET["id"])) {
    $MarkID  = $_GET["id"];
    $sql = "select
    *
    FROM mark
    INNER JOIN exam ON mark.ExamID=exam.ExamID
    INNER JOIN subjects ON mark.SubjectsID=subjects.SubjectsID
    INNER JOIN student ON mark.StudentID=student.StudentID where MarkID ='$MarkID'
    ";

    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    if ($row == null) {
        header("Location: view_mark.php");
    }
} else {
    header("Location: view_mark.php");
}

//==========================================>
$sql = "select * from exam";
$query = $db->query($sql);
$exam = [];
while ($item = $query->fetch_array()) {
    $exam[] = $item;
}
//==========================================>
$sql = "select * from subjects";
$query = $db->query($sql);
$sub = [];
while ($item = $query->fetch_array()) {
    $sub[] = $item;
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
                                <h4 class="page-title">Sửa điểm</h4>
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
                                        <input type="hidden" name="MarkID" value="<?= $row["MarkID"] ?>">
                                        <div class="form-group">
                                            <label for="inputAddress" class="col-form-label">Tên học viên</label>
                                            <input type="text" value="<?= $row["StudentName"] ?>" name="StudentName" class="form-control" id="inputAddress" placeholder="" >
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputCity" class="col-form-label">Điểm thi</label>
                                                <input type="text" value="<?= $row["Point"] ?>" name="Point" class="form-control" id="inputCity">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputCity" class="col-form-label">Kỳ thi</label>
                                                <select value="<?= $row["ExamID"] ?>" name="ExamID" id="inputState" class="form-control">
                                                    <?php foreach ($exam as $item) { ?>
                                                        <option value="<?= $item["ExamID"] ?>" <?= $item["ExamID"] == $row["ExamID"] ? "selected" : "" ?>>
                                                            <?= $item["ENAME"] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="inputState" class="col-form-label">Môn học</label>
                                                <select value="<?= $row["SubjectsID"] ?>" name="SubjectsID" id="inputState" class="form-control">
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