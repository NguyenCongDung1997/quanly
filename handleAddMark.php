<?php
include "database.php";
session_start();
if (isset($_POST["submit"])) {
    $sq = "insert into mark(StudentID,PointCC,PointGK,PointCK,SubjectsID) 
    values('{$_POST["studentid"]}','{$_POST["pointcc"]}',
    '{$_POST["pointgk"]}','{$_POST["pointck"]}','{$_POST["subjectsid"]}')";

    if ($db->query($sq)) {
        $_SESSION["alert"] = "Thêm thành công";
        header("Location:http://localhost/school/add_mark.php");
    } else {
        $_SESSION["alert1"] = "Thêm thất bại";
        header("Location:http://localhost/school/add_mark.php");
    }
}
