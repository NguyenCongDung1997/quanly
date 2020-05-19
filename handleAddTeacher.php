<?php
include "database.php";
session_start();
if (isset($_POST["submit"])) {
    $sq = "insert into teacher(TeacherName,TeacherPass,FullName,gender,TeacherDate,TeacherPhone,TeacherMail,Address,Images) 
    values('{$_POST["tname"]}','{$_POST["tpass"]}','{$_POST["tfullname"]}',
    '{$_POST["tgender"]}','{$_POST["tdate"]}','{$_POST["tphone"]}','{$_POST["tmail"]}','{$_POST["taddress"]}','{$_POST["timages"]}')";
    if ($db->query($sq)) {
        $_SESSION["alert"] = "Thêm thành công";
        header("Location:http://localhost/school/add_teacher.php");
    } else {
        $_SESSION["alert1"] = "Thêm thất bại";
        header("Location:http://localhost/school/add_teacher.php");
    }
}
