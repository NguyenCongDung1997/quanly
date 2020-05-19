<?php
include "database.php";
session_start();
if (isset($_POST["submit"])) {
    $sq = "insert into handledclass(TeacherID,ClassID,SubjectsID) values('{$_POST["teacherid"]}','{$_POST["classid"]}','{$_POST["subid"]}')";
    if ($db->query($sq)) {
        $_SESSION["alert"] = "Thêm thành công";
        header("Location:http://localhost/school/add_hclass.php");
    } else {
        $_SESSION["alert1"] = "Thêm thất bại";
        header("Location:http://localhost/school/add_hclass.php");
    }
}
