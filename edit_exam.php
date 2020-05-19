<?php
include "database.php";
session_start();

if (isset($_POST["ExamID"])) {
    $ENAME = $_POST["ENAME"];
    $EDATE = $_POST["EDATE"];
    $SESSION = $_POST["SESSION"];
    $ClassId  = $_POST["ClassId"];
    $SubjectsID  = $_POST["SubjectsID"];
    $ExamID  = $_POST["ExamID"];
    $sql = "update exam
                set
                ENAME='$ENAME',
                EDATE='$EDATE',
                SESSION='$SESSION',
                ClassId='$ClassId',
                SubjectsID='$SubjectsID'
                where ExamID='$ExamID'";

    if ($db->query($sql)) {
        header("Location: view_exam.php");
    }
}
if (isset($_GET["id"])) {
    $ExamID = $_GET["id"];
    $sql = "select
    *
    FROM exam
    INNER JOIN class ON exam.ClassId=class.ClassID
    INNER JOIN subjects ON exam.SubjectsID=subjects.SubjectsID where ExamID='$ExamID'
    ";

    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    if ($row == null) {
        header("Location: view_exam.php");
    }
} else {
    header("Location: view_exam.php");
}

//==========================================>
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
                                        <input type="hidden" name="ExamID" value="<?= $row["ExamID"] ?>">
                                        <div class="form-group">
                                            <label for="inputAddress" class="col-form-label">Tên kỳ thi</label>
                                            <input type="text" value="<?= $row["ENAME"] ?>" name="ENAME" class="form-control" id="inputAddress" placeholder="">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputCity" class="col-form-label">Lớp</label>
                                                <select value="<?= $row["ClassId"] ?>" name="ClassId" id="inputState" class="form-control">
                                                    <?php foreach ($class as $item) { ?>
                                                      <option value="<?= $item["ClassId"] ?>" <?= $item["ClassID"] == $row["ClassId"] ? "selected" : "" ?>>
                                                            <?= $item["ClassName"] ?>-<?= $item["ClassSection"] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputCity" class="col-form-label">Cấp độ thi</label>
                                                <input type="text" value="<?= $row["SESSION"] ?>" name="SESSION" class="form-control" id="inputCity">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputState" class="col-form-label">Môn học</label>
                                                <select value="<?= $row["SubjectsID"] ?>" name="SubjectsID" id="inputState" class="form-control">
                                                    <?php foreach ($sub as $item) { ?>
                                                        <option value="<?= $item["SubjectsID"] ?>" <?= $item["SubjectsID"] == $row["SubjectsID"] ? "selected" : "" ?>>
                                                            <?= $item["SubjectsName"] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class=" col-form-label" for="example-date">Ngày thi</label>
                                                <input class="form-control" value="<?= $row["EDATE"] ?>" name="EDATE" id="example-date" type="date" name="date">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="submit">Lưu lại</button>
                                        <a href="view_exam.php" class="btn btn-pink">Trở về</a>
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