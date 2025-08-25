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
						<li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('artikel'); ?>">Artikel</a></li>
						<li class="breadcrumb-item active" aria-current="page">Add Artikel</li>
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
							Tambah Artikel
						</div>
						<div class="card-body">
							<form action="<?= base_url('artikel/postAdd'); ?>" method="POST">
								<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />

								<?php if ($this->session->userdata('user_login')['role'] == 'admin') : ?>
									<div class="mb-3">
										<label class="form-label">Penulis</label>
										<select name="id_penulis" class="form-control">
											<option value="">-- Pilih Penulis --</option>
											<?php foreach ($penulis as $p) : ?>
												<option value="<?= $p->id_penulis; ?>" <?= (set_value('id_penulis') == $p->id_penulis ? 'selected' : ''); ?>><?= $p->username; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								<?php else : ?>
									<input type="hidden" name="id_penulis" class="form-control" value="<?= $this->session->userdata('user_login')['data']->id_penulis; ?>">
								<?php endif; ?>
								<div class="mb-3">
									<label class="form-label">Judul Artikel</label>
									<input type="text" name="judul_artikel" class="form-control" value="<?= set_value('judul_artikel'); ?>">
									<span class="text-danger"><?= form_error('judul_artikel'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">Isi Artikel</label>
									<textarea name="isi_artikel" class="form-control"><?= set_value('isi_artikel'); ?></textarea>
									<span class="text-danger"><?= form_error('isi_artikel'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">Tanggal</label>
									<input type="date" name="tanggal" class="form-control" value="<?= set_value('tanggal'); ?>">
									<span class="text-danger"><?= form_error('tanggal'); ?></span>
								</div>
								<button type="submit" class="btn btn-success">Tambah Artikel</button>
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