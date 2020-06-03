<?php
include "database.php";
session_start();
if (isset($_POST["submit"])) {
    $sq = "insert into class(ClassName,ClassSection) values('{$_POST["cname"]}','{$_POST["sec"]}')";
    if ($db->query($sq)) {
        $_SESSION["alert"] = "Thêm thành công";
        header("Location:http://localhost/school/add_class.php");
    } else {
        $_SESSION["alert1"] = "Thêm thất bại";
        header("Location:http://localhost/school/add_class.php");
    }
}
