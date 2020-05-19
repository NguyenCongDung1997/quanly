<footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                2015 - 2020 &copy; VinhUni
                            </div>
                        </div>
                    </div>
</footer>
<!-- Vendor js -->
<script src="assets\js\vendor.min.js"></script>

<!-- Sparkline charts -->
<script src="assets\libs\jquery-sparkline\jquery.sparkline.min.js"></script>

<script src="assets\libs\moment\moment.min.js"></script>
<script src="assets\libs\jquery-scrollto\jquery.scrollTo.min.js"></script>
<script src="assets\libs\sweetalert2\sweetalert2.min.js"></script>

<!-- Chat app -->
<script src="assets\js\pages\jquery.chat.js"></script>

<!-- Todo app -->
<script src="assets\js\pages\jquery.todo.js"></script>

<!--Morris Chart-->
<script src="assets\libs\morris-js\morris.min.js"></script>
<script src="assets\libs\raphael\raphael.min.js"></script>
<!-- Dashboard init JS -->
<script src="assets\js\pages\dashboard3.init.js"></script>

<!-- App js -->
<script src="assets\js\app.min.js"></script>
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