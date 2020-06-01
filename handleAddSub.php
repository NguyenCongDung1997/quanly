<?php
include "database.php";
session_start();
if (isset($_POST["submit"])) {
    $sq = "insert into subjects(SubjectsName) values('{$_POST["sname"]}')";
    if ($db->query($sq)) {
        $_SESSION["alert"] = "Thêm thành công";
        header("Location:http://localhost/school/add_sub.php");

    }else {
        $_SESSION["alert1"] = "Thêm thất bại";
        header("Location:http://localhost/school/add_sub.php");
    }
}
