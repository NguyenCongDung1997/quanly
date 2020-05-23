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
    $sql = "select * from student where HID='$HID'";
    $res = $db->query($sql);
    if ($res->num_rows > 0) {
        $output .= '
    <table class="table" bordered="1">  
        <tr>  
        <th>Tên Học viên</th>
        <th>Giới tính</th>
        <th>Ngày sinh</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        </tr>
';
        while ($row = mysqli_fetch_array($res)) {
            $output .= '
    <tr>  
        <td>' . $row["StudentName"] . '</td>  
        <td>' . $row["gender"] . '</td>  
        <td>' . $row["StudentDate"] . '</td>  
        <td>' . $row["Address"] . '</td>  
        <td>' . $row["StudentPhone"] . '</td>
    </tr>
';
        }
        $output .= '</table>';
        header('Content-Type: application/xls;charset=utf-8');
        header('Content-Disposition: attachment; filename=studentbyhclass.xls');
        echo $output;
    }
}
?>