<?php
include "database.php";
session_start();

$output = '';
print_r($_POST);
if (isset($_POST["export"])) {
    $sql = "select * from teacher";
    $res = $db->query($sql);
    if ($res->num_rows > 0) {
        $output .= '
    <table class="table" bordered="1">  
        <tr>  
			<th>Tên Giáo viên</th>
			<th>Giới tính</th>
			<th>Ngày sinh</th>
			<th>Địa chỉ</th>
			<th>Email</th>
			<th>Số điện thoại</th>
        </tr>
';
        while ($row = mysqli_fetch_array($res)) {
            $output .= '
    <tr>  
        <td>' . $row["FullName"] . '</td>  
        <td>' . $row["gender"] . '</td>  
        <td>' . $row["TeacherDate"] . '</td>  
        <td>' . $row["Address"] . '</td>  
        <td>' . $row["TeacherMail"] . '</td>
        <td>' . $row["TeacherPhone"] . '</td>
    </tr>
';
        }
        $output .= '</table>';
        header('Content-Type: application/xls; charset=utf-8');
        header('Content-Disposition: attachment; filename=teacher.xls');
        echo $output;
    }
}
