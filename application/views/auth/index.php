<!DOCTYPE html>
<html>
<head>
	<title>Login Admin</title>
	<link rel="stylesheet" href="<?= base_url('asset/template/'); ?>vendors/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="<?= base_url('asset/template/'); ?>vendors/feather/feather.css">
	<link rel="stylesheet" href="<?= base_url('asset/template/'); ?>vendors/base/vendor.bundle.base.css">
	<!-- endinject -->
	<!-- plugin css for this page -->
	<link rel="stylesheet" href="<?= base_url('asset/template/'); ?>vendors/flag-icon-css/css/flag-icon.min.css"/>
	<link rel="stylesheet" href="<?= base_url('asset/template/'); ?>vendors/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url('asset/template/'); ?>vendors/jquery-bar-rating/fontawesome-stars-o.css">
	<link rel="stylesheet" href="<?= base_url('asset/template/'); ?>vendors/jquery-bar-rating/fontawesome-stars.css">
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="<?= base_url('asset/template/'); ?>css/style.css">
</head>
<body class="bg-dark">


	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-lg-4 mt-5">
				<div class="card border-info">
					<div class="card-header bg-info">
						<h4 class="text-center text-light">Login Page</h4>
					</div>
					<form action="<?= base_url('auth/index'); ?>" method="post">
						<div class="card-body">
							<?= $this->session->flashdata('pesan'); ?>
							<?= form_error('username','<small class="text-danger">','</small>') ?>
							<input type="text" name="username" id="username" placeholder="Username" class="form-control" autocomplete="off">
							<?= form_error('pass','<small class="text-danger">','</small>') ?>
							<input type="password" name="pass" id="pass" placeholder="Password" class="form-control mt-3">
							<div class="row justify-content-center mt-3">
								<button type="submit" class="btn btn-info btn-rounded btn-lg">Login</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<script src="<?= base_url('asset/template/'); ?>vendors/base/vendor.bundle.base.js"></script>
	<!-- endinject -->
	<!-- Plugin js for this page-->
	<!-- End plugin js for this page-->
	<!-- inject:js -->
	<script src="<?= base_url('asset/template/'); ?>js/off-canvas.js"></script>
	<script src="<?= base_url('asset/template/'); ?>js/hoverable-collapse.js"></script>
	<script src="<?= base_url('asset/template/'); ?>js/template.js"></script>
	<!-- endinject -->
	<!-- plugin js for this page -->
	<script src="<?= base_url('asset/template/'); ?>vendors/chart.js/Chart.min.js"></script>
	<script src="<?= base_url('asset/template/'); ?>vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
	<!-- End plugin js for this page -->
	<!-- Custom js for this page-->
	<script src="<?= base_url('asset/template/'); ?>js/dashboard.js"></script>
</body>
</html>