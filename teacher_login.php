<?php
include "database.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Login page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Responsive bootstrap 4 admin template" name="description">
	<meta content="Coderthemes" name="author">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- App css -->
	<link href="assets\css\bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
	<link href="assets\css\icons.min.css" rel="stylesheet" type="text/css">
	<link href="assets\css\app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet">

</head>

<body class="authentication-page">

	<div class="account-pages my-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6 col-xl-5">
					<div class="card mt-4">
						<div class="card-header p-4 bg-primary">
							<h4 class="text-white text-center mb-0 mt-0">Teacher Login</h4>
						</div>
						<div class="card-body">
							<?php
							if (isset($_POST["login"])) {
								$sql = "select * from teacher where TeacherName='{$_POST["tname"]}' and TeacherPass='{$_POST["tpass"]}'";
								$res = $db->query($sql);
								if ($res->num_rows > 0) {
									$ro = $res->fetch_assoc();
									$_SESSION["TeacherID"] = $ro["TeacherID"];
									$_SESSION["TeacherName"] = $ro["TeacherName"];
									echo "<script>window.open('teacher_home.php','_self');</script>";
								} else {
									echo "<div class='error'>Invalid Username or Password</div>";
								}
							}

							?>
							<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="p-2">

								<div class="form-group mb-3">
									<label for="emailaddress">UserName :</label>
									<input class="form-control" type="text" id="emailaddress" required="" name="tname">
								</div>

								<div class="form-group mb-3">
									<label for="password">Password :</label>
									<input class="form-control" type="password" required="" id="password" name="tpass">
								</div>

								<!-- <div class="form-group mb-4">
									<div class="checkbox checkbox-success">
										<input id="remember" type="checkbox" checked="">
										<label for="remember">
											Remember me
										</label>
										<a href="pages-recoverpw.html" class="text-muted float-right">Forgot your password?</a>
									</div>
								</div> -->

								<div class="form-group row text-center mt-4 mb-4">
									<div class="col-12">
										<button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit" name="login">Sign In</button>
									</div>
								</div>


							</form>

						</div>
						<!-- end card-body -->
					</div>
					<!-- end card -->

					<!-- end row -->

				</div>
				<!-- end col -->
			</div>
			<!-- end row -->

		</div>
	</div>

	<!-- Vendor js -->
	<script src="assets\js\vendor.min.js"></script>

	<!-- App js -->
	<script src="assets\js\app.min.js"></script>

	<script src="js/jquery.js"></script>
	<script>
		$(document).ready(function() {
			$(".error").fadeTo(1000, 100).slideUp(1000, function() {
				$(".error").slideUp(1000);
			});

			$(".success").fadeTo(1000, 100).slideUp(1000, function() {
				$(".success").slideUp(1000);
			});
		});
	</script>

</body>

</html>