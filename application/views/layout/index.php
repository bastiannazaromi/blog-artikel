<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $title; ?></title>
	<!--begin::Primary Meta Tags-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="title" content="Peminjaman Buku" />
	<meta name="author" content="ColorlibHQ" />
	<meta name="description" content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS." />
	<meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard" />
	<!--end::Primary Meta Tags-->
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" />
	<!--end::Fonts-->
	<!--begin::Third Party Plugin(OverlayScrollbars)-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css" integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg=" crossorigin="anonymous" />
	<!--end::Third Party Plugin(OverlayScrollbars)-->
	<!--begin::Third Party Plugin(Bootstrap Icons)-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI=" crossorigin="anonymous" />
	<!--end::Third Party Plugin(Bootstrap Icons)-->
	<!--begin::Required Plugin(AdminLTE)-->
	<link rel="stylesheet" href="<?php echo base_url('assets') ?>/dist/css/adminlte.css" />
	<!--end::Required Plugin(AdminLTE)-->
	<!-- apexcharts -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous" />
	<!-- jsvectormap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous" />

	<link rel="stylesheet" href="<?= base_url('assets/dist/toastr/toastr.min.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/dist/sweetalert2/sweetalert2.min.css'); ?>">

	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
	<div class="toastr-success" data-flashdata="<?= $this->session->flashdata('toastr-success'); ?>"></div>
	<div class="toastr-error" data-flashdata="<?= $this->session->flashdata('toastr-error'); ?>"></div>

	<!--begin::App Wrapper-->
	<div class="app-wrapper">
		<!--begin::Header-->
		<nav class="app-header navbar navbar-expand bg-body">
			<!--begin::Container-->
			<div class="container-fluid">
				<!--begin::Start Navbar Links-->
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
							<i class="bi bi-list"></i>
						</a>
					</li>
				</ul>
				<!--end::Start Navbar Links-->
				<!--begin::End Navbar Links-->
				<ul class="navbar-nav ms-auto">
					<!--begin::User Menu Dropdown-->
					<li class="nav-item dropdown user-menu">
						<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
							<img src="<?php echo base_url('assets') ?>/dist/assets/img/user2-160x160.jpg" class="user-image rounded-circle shadow" alt="User Image" />
							<span class="d-none d-md-inline"><?= $this->session->userdata('user_login')['data']->username; ?></span>
						</a>
						<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
							<!--begin::Menu Footer-->
							<li class="user-footer">
								<a href="#" class="btn btn-default btn-flat">Profile</a>
								<a href="<?php echo base_url('login/logout'); ?>" class="btn btn-default btn-flat float-end">Sign out</a>
							</li>
							<!--end::Menu Footer-->
						</ul>
					</li>
					<!--end::User Menu Dropdown-->
				</ul>
				<!--end::End Navbar Links-->
			</div>
			<!--end::Container-->
		</nav>
		<!--end::Header-->
		<!--begin::Sidebar-->
		<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
			<!--begin::Sidebar Brand-->
			<div class="sidebar-brand">
				<!--begin::Brand Link-->
				<a href="<?= base_url('home'); ?>" class="brand-link">
					<!--begin::Brand Image-->
					<img src="<?php echo base_url('assets') ?>/dist/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" />
					<!--end::Brand Image-->
					<!--begin::Brand Text-->
					<span class="brand-text fw-light">BLOG ARTIKEL</span>
					<!--end::Brand Text-->
				</a>
				<!--end::Brand Link-->
			</div>
			<!--end::Sidebar Brand-->
			<!--begin::Sidebar Wrapper-->
			<div class="sidebar-wrapper">
				<nav class="mt-2">
					<!--begin::Sidebar Menu-->
					<ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
						<li class="nav-item">
							<a href="<?= base_url('dashboard'); ?>" class="nav-link">
								<i class="nav-icon bi bi-speedometer"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>
						<?php if ($this->session->userdata('user_login')['role'] == 'admin') : ?>
							<li class="nav-item">
								<a href="<?= base_url('admin'); ?>" class="nav-link">
									<i class="nav-icon bi bi-person"></i>
									<p>
										Admin
									</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?= base_url('penulis'); ?>" class="nav-link">
									<i class="nav-icon bi bi-person"></i>
									<p>
										Penulis
									</p>
								</a>
							</li>
						<?php endif; ?>
						<li class="nav-item">
							<a href="<?= base_url('artikel'); ?>" class="nav-link">
								<i class="nav-icon bi bi-journals"></i>
								<p>
									Artikel
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('komentar'); ?>" class="nav-link">
								<i class="nav-icon bi bi-journal-plus"></i>
								<p>
									Komentar
								</p>
							</a>
						</li>
					</ul>
					<!--end::Sidebar Menu-->
				</nav>
			</div>
			<!--end::Sidebar Wrapper-->
		</aside>
		<!--end::Sidebar-->
		<!--begin::App Main-->

		<?php $this->load->view($page); ?>

		<!--end::App Main-->
		<!--begin::Footer-->
		<footer class="app-footer">
			<!--begin::To the end-->
			<div class="float-end d-none d-sm-inline">Anything you want</div>
			<!--end::To the end-->
			<!--begin::Copyright-->
			<strong>
				Copyright &copy; 2014-2024&nbsp;
				<a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
			</strong>
			All rights reserved.
			<!--end::Copyright-->
		</footer>
		<!--end::Footer-->
	</div>
	<!--end::App Wrapper-->
	<!--begin::Script-->
	<!--begin::Third Party Plugin(OverlayScrollbars)-->
	<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ=" crossorigin="anonymous"></script>
	<!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
	<!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
	<script src="<?php echo base_url('assets') ?>/dist/js/adminlte.js"></script>
	<!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->

	<script src="<?php echo base_url('assets/dist/toastr/toastr.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/dist/sweetalert2/sweetalert2.js') ?>"></script>

	<script>
		var sukses = $(".toastr-success").data("flashdata");
		var error = $(".toastr-error").data("flashdata");

		if (sukses) {
			toastr.success(sukses);
		}

		if (error) {
			toastr.error(error);
		}

		$(".tombol-hapus").on("click", function(e) {
			e.preventDefault();

			var href = $(this).data("href");
			var text = $(this).data("text");
			Swal.fire({
				title: "Apakah Anda yakin?",
				text: text,
				html: !1,
				buttonsStyling: !1,
				icon: "warning",
				showCancelButton: true,
				customClass: {
					confirmButton: "btn btn-danger m-1",
					cancelButton: "btn btn-secondary m-1",
				},
				confirmButtonText: "Hapus",
				cancelButtonText: "Batalkan",
			}).then((result) => {
				if (result.value) {
					document.location.href = href;
				}
			});
		});
	</script>
</body>
<!--end::Body-->

</html>