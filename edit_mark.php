<?php
include "database.php";
session_start();

if (isset($_POST["MarkID"])) {
    
    $PointCC = $_POST["PointCC"];
    $PointGK = $_POST["PointGK"];
    $PointCK = $_POST["PointCK"];
   
    $MarkID  = $_POST["MarkID"];
    $sql = "update mark
                set
                PointCC='$PointCC',
                PointGK='$PointGK',
                PointCK='$PointCK'
               
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
                                            <label for="inputAddress" class="col-form-label">Tên học sinh</label>
                                            <input type="text" disabled value="<?= $row["StudentName"] ?>" name="StudentName" class="form-control" id="inputAddress" placeholder="" >
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputCity" class="col-form-label">Điểm miệng</label>
                                                <input type="text" value="<?= $row["PointCC"] ?>" name="PointCC" class="form-control" id="inputCity">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputCity" class="col-form-label">Điểm giữa kỳ</label>
                                                <input type="text" value="<?= $row["PointGK"] ?>" name="PointGK" class="form-control" id="inputCity">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputCity" class="col-form-label">Điểm cuối kỳ</label>
                                                <input type="text" value="<?= $row["PointCK"] ?>" name="PointCK" class="form-control" id="inputCity">
                                            </div>
                                            

                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="inputState" class="col-form-label">Môn học</label>
                                                <input type="text" disabled value="<?= $row["SubjectsName"] ?>" name="SubjectsName" class="form-control" id="inputAddress" placeholder="" >
                                               
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