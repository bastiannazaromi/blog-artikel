<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title; ?></title>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" href="<?= base_url('assets/dist/toastr/toastr.min.css'); ?>">

	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
	<nav class="navbar navbar-expand-lg" style="background-color:rgb(165, 165, 172);">
		<div class="container">
			<a class="navbar-brand" href="#">BLOG ARTIKEL</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="<?= base_url('home'); ?>">Home</a>
					</li>
					<?php if ($this->session->userdata('user_login')) : ?>
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('login/logout'); ?>">Logout</a>
						</li>
					<?php else : ?>
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('login'); ?>">Login</a>
						</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container mt-4">
		<div class="toastr-success" data-flashdata="<?= $this->session->flashdata('toastr-success'); ?>"></div>
		<div class="toastr-error" data-flashdata="<?= $this->session->flashdata('toastr-error'); ?>"></div>

		<?php $this->load->view($page); ?>
	</div>

	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

	<script src="<?php echo base_url('assets/dist/toastr/toastr.min.js') ?>"></script>

	<script>
		var sukses = $(".toastr-success").data("flashdata");
		var error = $(".toastr-error").data("flashdata");

		if (sukses) {
			toastr.success(sukses);
		}

		if (error) {
			toastr.error(error);
		}
	</script>

</body>

</html>