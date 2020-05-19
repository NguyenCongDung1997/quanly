<div class="navbar-custom">

	<ul class="list-unstyled topnav-menu float-right mb-0">
		<?php
		if (isset($_SESSION["AID"])) {
			echo '
				
			<li class="dropdown notification-list">
			<a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
				<img src="assets\images\users\admin.jpg" alt="user-image" class="rounded-circle">
				<span class="pro-user-name ml-1">
					<?php echo $row["ANAME"]; ?> <i class="mdi mdi-chevron-down"></i>
				</span>
			</a>
			<div class="dropdown-menu dropdown-menu-right profile-dropdown ">
				<!-- item-->
				<div class="dropdown-header noti-title">
					<h6 class="text-overflow m-0">Admin Home</h6>
				</div>
				<!-- item-->
				<a href="change_pass.php" class="dropdown-item notify-item">
					<i class="mdi mdi-settings-outline"></i>
					<span>Project</span>
				</a>
				<div class="dropdown-divider"></div>

				<!-- item-->
				<a href="logout.php" class="dropdown-item notify-item">
					<i class="mdi mdi-logout-variant"></i>
					<span>Logout</span>
				</a>

			</div>
		</li>
					';
		} elseif (isset($_SESSION["TeacherID"])) {
			echo '
				
			<li class="dropdown notification-list">
			<a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
				<img src="img/' . $row["Images"] . '" alt="user-image" class="rounded-circle">
				<span class="pro-user-name ml-1">
					' . $row["FullName"] . ' <i class="mdi mdi-chevron-down"></i>
				</span>
			</a>
			<div class="dropdown-menu dropdown-menu-right profile-dropdown ">
				<!-- item-->
				<div class="dropdown-header noti-title">
					<h6 class="text-overflow m-0">Teacher Home</h6>
				</div>

				<!-- item-->
				<a href="javascript:void(0);" class="dropdown-item notify-item">
					<i class="mdi mdi-account-outline"></i>
					<span>Profile</span>
				</a>

				<!-- item-->
				<a href="teacher_change_pass.php" class="dropdown-item notify-item">
					<i class="mdi mdi-settings-outline"></i>
					<span>Settings</span>
				</a>
				<div class="dropdown-divider"></div>

				<!-- item-->
				<a href="logout.php" class="dropdown-item notify-item">
					<i class="mdi mdi-logout-variant"></i>
					<span>Logout</span>
				</a>

			</div>
		</li>
					';
		} else {
			echo '
					';
		}
		?>

	</ul>
	<div class="logo-box">
		<?php
		if (isset($_SESSION["AID"])) {
			echo '
		<a href="admin_home.php" class="logo text-center logo-light">
			<span class="logo-lg">
				<img src="assets\images\logo-sm.png" alt="" height="21">
				<h4 class="fas fa-h1 text-muted pl-2 ">Quản lý</h4>
			</span>
			<span class="logo-sm">
				<img src="assets\images\logo-sm.png" alt="" height="22">
			</span>
		</a>
	';
		} elseif (isset($_SESSION["TeacherID"])) {
			echo '
		<a href="teacher_home.php" class="logo text-center logo-light">
			<span class="logo-lg">
			<img src="assets\images\logo-sm.png" alt="" height="21">
			<h4 class="fas fa-h1 text-muted pl-2 ">Quản lý</h4>
			</span>
			<span class="logo-sm">
				<img src="assets\images\logo-sm.png" alt="" height="22">
			</span>
		</a>
	';
		}
		?>
	</div>

	<!-- LOGO -->
	<ul class="list-unstyled topnav-menu topnav-menu-left m-0">
		<li>
			<button class="button-menu-mobile waves-effect">
				<i class="mdi mdi-menu"></i>
			</button>
		</li>
	</ul>
</div>