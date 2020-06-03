<?php
include "database.php";
session_start();

$output = '';
if (isset($_GET["id"])) {
    $HID = $_GET["id"];
    $sql = "select
    *
    FROM student where HID='$HID'
    ";

    $result = $db->query($sql);
    $row = $result->fetch_assoc();
}
if (isset($_POST["classId"])) {
    $HID = $_POST["classId"];
    $sql = "select
    *
    FROM student where HID='$HID'
    ";

    $result = $db->query($sql);
    $row = $result->fetch_assoc();
}
if (isset($_POST["export"])) {
    $sql = "select * from student 
    INNER JOIN mark ON mark.StudentID=student.StudentID 
    INNER JOIN subjects ON mark.SubjectsID=subjects.SubjectsID 
    where HID='$HID' ORDER BY SubjectsName";
    $res = $db->query($sql);
    if ($res->num_rows > 0) {
        $output .= '
    <table class="table" bordered="1">  
        <tr>  
        <th>Tên Học sinh</th>
        <th>Điểm miệng</th>
        <th>Điểm giữa kỳ</th>
        <th>Điểm cuối kỳ</th>
        <th>Điểm trung bình</th>
        <th>Môn</th>
        </tr>
';
        while ( $row = $res->fetch_assoc()) {
            $output .= '
    <tr>  
        <td>' . $row["StudentName"] . '</td>  
        <td>' . $row["PointCC"] . '</td>  
        <td>' . $row["PointGK"] . '</td>  
        <td>' . $row["PointCK"] . '</td>  
        <td>' . $row["PointCK"] . '</td>  
        <td>' . $row["SubjectsName"] . '</td>
    </tr>
';
        }
        $output .= '</table>';
        header('Content-Type: application/xls;charset=utf-8');
        header('Content-Disposition: attachment; filename=markhclass.xls');
        echo $output;
    }
}
?>