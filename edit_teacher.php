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
    $FullName = $_POST["FullName"];
    $gender = $_POST["gender"];
    $TeacherDate = $_POST["TeacherDate"];
    $TeacherPhone = $_POST["TeacherPhone"];
    $TeacherMail = $_POST["TeacherMail"];
    $Address = $_POST["Address"];
    $TeacherID = $_POST["TeacherID"];     
    if (isset($_FILES["Images"]) && $_FILES["Images"]["size"] > 0) {
        $time = time();
        $type = explode("/", $_FILES["Images"]["type"])[1];
        $Images = "$time.$type";
        move_uploaded_file($_FILES["Images"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/school/img/" . $Images);
        $sql = "update teacher
        set
        FullName='$FullName',
        gender='$gender',
        TeacherDate='$TeacherDate',
        TeacherPhone='$TeacherPhone',
        TeacherMail='$TeacherMail',
        Address='$Address',
        Images='$Images'
        where TeacherID='$TeacherID'";
    
    } else {
    $sql = "update teacher
                set
                FullName='$FullName',
                gender='$gender',
                TeacherDate='$TeacherDate',
                TeacherPhone='$TeacherPhone',
                TeacherMail='$TeacherMail',
                Address='$Address'
                where TeacherID='$TeacherID'";
    }
    if ($db->query($sql)) {
        header("Location: view_teacher.php");
    }
}
if (isset($_GET["id"])) {
    $TeacherID = $_GET["id"];
    $sql = "select * from teacher where TeacherID='$TeacherID'";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    if ($row == null) {
        header("Location: view_teacher.php");
    }
} else {
    header("Location: view_teacher.php");
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
                                    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
                                        <input type="hidden" name="TeacherID" value="<?= $row["TeacherID"] ?>">
                                        <div class="form-group">
                                            <label for="inputAddress" class="col-form-label">Họ tên giáo viên</label>
                                            <input type="text" value="<?= $row["FullName"] ?>" name="FullName" class="form-control" id="inputAddress" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress2" class="col-form-label">Địa chỉ</label>
                                            <input type="text" value="<?= $row["Address"] ?>" name="Address" class="form-control" id="inputAddress2" placeholder="">
                                        </div>
                                        <!-- <div class="form-row">
											<div class="form-group col-md-6">
												<label for="inputEmail4" class="col-form-label">Tài khoản đăng nhập</label>
												<input type="text" name="tname" class="form-control" id="inputEmail4" placeholder="Tên đăng nhập">
											</div>
											<div class="form-group col-md-6">
												<label for="inputPassword4" class="col-form-label">Mật khẩu</label>
												<input type="password" name="tpass" class="form-control" id="inputPassword4" placeholder="Mật khẩu">
											</div>
										</div> -->
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <label for="inputCity" class="col-form-label">Số điện thoại</label>
                                                <input type="text" value="<?= $row["TeacherPhone"] ?>" name="TeacherPhone" class="form-control" id="inputCity">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="inputZip" class="col-form-label">Giới tính</label>
                                                <input type="text" value="<?= $row["gender"] ?>" name="gender" class="form-control" id="inputZip">
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class=" col-form-label" for="example-date">Ngày sinh</label>
                                                <input class="form-control" value="<?= $row["TeacherDate"] ?>" name="TeacherDate" id="example-date" type="date" name="date">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label for="inputZip" class="col-form-label">Chọn ảnh</label>
                                                <input type="file" accept="image/*" value="<?= $row["Images"] ?>" name="Images" class="form-control" >
                                            </div>
                                            <div class="form-group col-md-2" >
                                            <label for="inputZip" class="col-form-label"></label>
                                            <img src="img/<?= $row["Images"] ?>" alt="user-image" class="rounded-circle" style="width: 100%">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail4" class="col-form-label">Email</label>
                                            <input type="email" value="<?= $row["TeacherMail"] ?>" name="TeacherMail" class="form-control" id="inputEmail4" placeholder="Email">
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