

<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
                <?php
                if (isset($_SESSION["AID"])) {
                    echo '
                <li class="menu-title">Menu</li>

                <li>
                    <a href="add_class.php" class="waves-effect">
                        <i class="ion-md-speedometer"></i>
                        <span> Phòng học </span>
                    </a>
                    <!-- <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="index.html">Dashboard 1</a></li>
                        <li><a href="dashboard-2.html">Dashboard 2</a></li>
                        <li><a href="dashboard-3.html">Dashboard 3</a></li>
                    </ul> -->
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ion-md-speedometer"></i>
                        <span> Lớp học </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="add_hclass.php">Thêm lớp học</a></li>
                        <li><a href="view_hclass.php">Xem danh sách lớp học</a></li>
                        <li><a href="view_hclass_all.php">Xem danh sách tất cả lớp học</a></li>
                    </ul>
                </li>
                <li>
                    <a href="add_sub.php" class="waves-effect">
                        <i class="ion ion-ios-paper"></i>
                        <span> Môn học </span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class=" ion ion-ios-person-add"></i>
                        <span> Giáo viên </span>
                        <span class="menu-arrow"></span>
					</a>
					<ul class="nav-second-level" aria-expanded="false">
                        <li><a href="add_teacher.php">Thêm giáo viên</a></li>
                        <li><a href="view_teacher.php">Xem danh sách giáo viên</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="waves-effect">
                        <i class="ion-md-speedometer"></i>
                        <span> Thi cử </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="add_exam.php">Tạo kỳ thi</a></li>
                        <li><a href="view_exam.php">Xem danh sách kỳ thi</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="waves-effect">
                        <i class=" fas fa-user-graduate"></i>
                        <span> Học viên </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="add_student.php">Thêm học viên</a></li>
                    <li><a href="view_student.php">Xem danh sách học viên</a></li>
                </ul>
                </li>
                <li>
                    <a href="#" class="waves-effect">
                        <i class=" fas fa-user-graduate"></i>
                        <span> Điểm thi </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="add_mark.php">Nhập điểm</a></li>
                    <li><a href="view_mark.php">Xem danh sách điểm</a></li>
                    <li><a href="view_mark_class.php">Xem danh sách điểm theo lớp</a></li>
                </ul>
                </li>';
                } if (isset($_SESSION["TeacherID"])) {
                    echo '
                    <li class="menu-title">Menu</li>

                    <li>
                        <a href="handle_class.php" class="waves-effect">
                            <i class="ion-md-speedometer"></i>
                            <span> Lớp học </span>
                        </a>
                        <!-- <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="index.html">Dashboard 1</a></li>
                            <li><a href="dashboard-2.html">Dashboard 2</a></li>
                            <li><a href="dashboard-3.html">Dashboard 3</a></li>
                        </ul> -->
                    </li>
                    <li>
                        <a href="add_sub.php" class="waves-effect">
                            <i class="ion ion-ios-paper"></i>
                            <span> Môn học </span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="waves-effect">
                            <i class="ion-md-speedometer"></i>
                            <span> Thi cử </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="add_exam.php">Tạo kỳ thi</a></li>
                            <li><a href="view_exam.php">Xem danh sách kỳ thi</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="waves-effect">
                            <i class="ion-md-speedometer"></i>
                            <span> Học viên </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="add_teacher.php">Thêm học viên</a></li>
                            <li><a href="view_teacher.php">Xem học viên</a></li>
                        </ul>
                    </li>';
                }
                ?>
            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>