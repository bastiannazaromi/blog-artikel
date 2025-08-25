<main class="app-main">
	<!--begin::App Content Header-->
	<div class="app-content-header">
		<!--begin::Container-->
		<div class="container-fluid">
			<!--begin::Row-->
			<div class="row">
				<div class="col-sm-6">
					<h3 class="mb-0"><?= $title; ?></h3>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-end">
						<li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Admin</a></li>
						<li class="breadcrumb-item active" aria-current="page">Add Admin</li>
					</ol>
				</div>
			</div>
			<!--end::Row-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::App Content Header-->
	<!--begin::App Content-->
	<div class="app-content">
		<!--begin::Container-->
		<div class="container-fluid">
			<!--begin::Row-->
			<div class="row">
				<div class="col-lg-12">
					<div class="card mb-4">
						<div class="card-header bg-primary text-white">
							Tambah ADmin
						</div>
						<div class="card-body">
							<form action="<?= base_url('admin/postAdd'); ?>" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />

								<div class="mb-3">
									<label class="form-label">Username</label>
									<input type="text" name="username" class="form-control" value="<?= set_value('username'); ?>" autocomplete="off" required>
									<span class="text-danger"><?= form_error('username'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">Password</label>
									<input type="text" name="password" class="form-control" value="<?= set_value('password'); ?>" autocomplete="off" required>
									<span class="text-danger"><?= form_error('password'); ?></span>
								</div>
								<button type="submit" class="btn btn-primary">Simpan</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!--end::Row-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::App Content-->
</main>