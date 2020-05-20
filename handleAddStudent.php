<?php
include "database.php";
session_start();
if (isset($_POST["submit"])) {
    $sq = "insert into student(StudentName,StudentDate,gender,StudentPhone,Address,HID,Images) 
    values('{$_POST["sfullname"]}','{$_POST["sdate"]}',
    '{$_POST["tgender"]}','{$_POST["sphone"]}','{$_POST["saddress"]}','{$_POST["hid"]}','{$_POST["simages"]}')";
    if ($db->query($sq)) {
        $_SESSION["alert"] = "Thêm thành công";
        header("Location:http://localhost/school/add_teacher.php");
    } else {
        $_SESSION["alert1"] = "Thêm thất bại";
        header("Location:http://localhost/school/add_teacher.php");
    }
}
