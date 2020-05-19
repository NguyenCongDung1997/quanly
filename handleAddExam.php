<?php
include "database.php";
session_start();
if (isset($_POST["submit"])) {
    $sq = "insert into exam(ENAME,ClassId,SESSION,SubjectsID,EDATE) 
    values('{$_POST["ename"]}','{$_POST["classid"]}','{$_POST["session"]}','{$_POST["subjectid"]}','{$_POST["edate"]}')";
    if ($db->query($sq)) {
        $_SESSION["alert"] = "Thêm thành công";
        header("Location:http://localhost/school/add_exam.php");
    } else {
        echo "<div class='error'>Thêm thất bại..</div>";
    }
}
