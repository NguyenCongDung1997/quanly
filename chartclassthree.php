
<?php
include "database.php";
//<!-- ============================================================== -->
$sql = "SELECT COUNT(*) FROM (SELECT class.ClassName,student.StudentName,
AVG(mark.PointCC) ,AVG(mark.PointGK),AVG(mark.PointCK),
COUNT(student.StudentName) AS Tongmon, 
AVG(((mark.PointCC)+(mark.PointGK)*2+(mark.PointCK)*3)/6) AS Tong 
FROM mark
INNER JOIN student ON mark.StudentID=student.StudentID 
INNER JOIN handledclass ON student.HID =handledclass.HID 
INNER JOIN class ON handledclass.ClassID=class.ClassID 
WHERE ClassName = 3 GROUP BY StudentName HAVING Tong >=8) AS Tongso";
$res = $db->query($sql);
if ($res->num_rows > 0) {
    $couhsg3 = $res->fetch_assoc();
}
//<!-- ============================================================== -->
$sql = "SELECT COUNT(*) FROM (SELECT class.ClassName,student.StudentName,
AVG(mark.PointCC) ,AVG(mark.PointGK),AVG(mark.PointCK),
COUNT(student.StudentName) AS Tongmon, 
AVG(((mark.PointCC)+(mark.PointGK)*2+(mark.PointCK)*3)/6) AS Tong 
FROM mark
INNER JOIN student ON mark.StudentID=student.StudentID 
INNER JOIN handledclass ON student.HID =handledclass.HID 
INNER JOIN class ON handledclass.ClassID=class.ClassID 
WHERE ClassName = 3 GROUP BY StudentName HAVING Tong >=6.5 AND Tong <8) AS Tongso";
$res = $db->query($sql);
if ($res->num_rows > 0) {
    $couhsk3 = $res->fetch_assoc();
}
//<!-- ============================================================== -->
$sql = "SELECT COUNT(*) FROM (SELECT class.ClassName,student.StudentName,
AVG(mark.PointCC) ,AVG(mark.PointGK),AVG(mark.PointCK),
COUNT(student.StudentName) AS Tongmon, 
AVG(((mark.PointCC)+(mark.PointGK)*2+(mark.PointCK)*3)/6) AS Tong 
FROM mark
INNER JOIN student ON mark.StudentID=student.StudentID 
INNER JOIN handledclass ON student.HID =handledclass.HID 
INNER JOIN class ON handledclass.ClassID=class.ClassID 
WHERE ClassName = 3 GROUP BY StudentName HAVING Tong >=5 AND Tong <6.5) AS Tongso";
$res = $db->query($sql);
if ($res->num_rows > 0) {
    $couhstb3 = $res->fetch_assoc();
}
//<!-- ============================================================== -->
$sql = "SELECT COUNT(*) FROM (SELECT class.ClassName,student.StudentName,
AVG(mark.PointCC) ,AVG(mark.PointGK),AVG(mark.PointCK),
COUNT(student.StudentName) AS Tongmon, 
AVG(((mark.PointCC)+(mark.PointGK)*2+(mark.PointCK)*3)/6) AS Tong 
FROM mark
INNER JOIN student ON mark.StudentID=student.StudentID 
INNER JOIN handledclass ON student.HID =handledclass.HID 
INNER JOIN class ON handledclass.ClassID=class.ClassID 
WHERE ClassName = 3 GROUP BY StudentName HAVING Tong <5) AS Tongso";
$res = $db->query($sql);
if ($res->num_rows > 0) {
    $couhsy3 = $res->fetch_assoc();
}

?>
    <div class="col-xl-6">

        <div class="card">
            <div class="card-header py-3 bg-transparent">
                <div class="card-widgets">
                    <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                    <a data-toggle="collapse" href="#cardCollpase4" role="button" aria-expanded="false" aria-controls="cardCollpase4"><i class="mdi mdi-minus"></i></a>
                </div>
                <h5 class="header-title mb-0"> Khối 3 </h5>
            </div>
            <div id="cardCollpase4" class="collapse show">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="chart_div3"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end card-->
    </div>
    <!-- end col -->


<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    // Load the Visualization API and the piechart package.
    google.load('visualization', '1.0', {
        'packages': ['corechart']
    });
    google.setOnLoadCallback(drawChart);

    function drawChart() {

        // Tạo bảng dữ liệu
        var data = new google.visualization.DataTable();
        // Tạo các cột cho bảng dữ liệu
        data.addColumn('string');
        data.addColumn('number', 'Devices');
        // Tạo hàng cho dữ liệu
        data.addRows([
            ['Học sinh giỏi', <?php echo $couhsg3["COUNT(*)"]; ?>],
            ['Học sinh khá', <?php echo $couhsk3["COUNT(*)"]; ?>],
            ['Học sinh trung bình', <?php echo $couhstb3["COUNT(*)"]; ?>],
            ['Học sinh yếu', <?php echo $couhsy3["COUNT(*)"]; ?>],
        ]);
        //Tạo tùy chọn cho biểu đồ
        var options = {
            title: 'Điểm trung bình môn',
            is3D: true,
        };
        // Khởi tạo và vẽ biểu đồ
        var chart = new google.visualization.PieChart(document.getElementById('chart_div3'));
        chart.draw(data, options);
    }
</script>