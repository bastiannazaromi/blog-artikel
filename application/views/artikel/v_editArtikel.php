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
						<li class="breadcrumb-item active" aria-current="page">Edit Artikel</li>
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
							Edit Artikel
						</div>
						<div class="card-body">
							<form action="<?= base_url('artikel/update'); ?>" method="POST">
								<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
								<input type="hidden" name="id" value="<?= $artikel->id; ?>" required>

								<?php if ($this->session->userdata('user_login')['role'] == 'admin') : ?>
									<div class="mb-3">
										<label class="form-label">Penulis</label>
										<select name="id_penulis" class="form-control">
											<option value="">-- Pilih Penulis --</option>
											<?php foreach ($penulis as $p) : ?>
												<option value="<?= $p->id_penulis; ?>" <?= ($artikel->id_penulis == $p->id_penulis ? 'selected' : ''); ?>><?= $p->username; ?></option>
											<?php endforeach; ?>
										</select>
										<span class="text-danger"><?= form_error('id_penulis'); ?></span>
									</div>
								<?php else : ?>
									<input type="hidden" name="id_penulis" class="form-control" value="<?= $artikel->id_penulis; ?>">
								<?php endif; ?>
								<div class="mb-3">
									<label class="form-label">Judul Artikel</label>
									<input type="text" name="judul_artikel" class="form-control" value="<?= $artikel->judul_artikel; ?>">
									<span class="text-danger"><?= form_error('judul_artikel'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">Isi Artikel</label>
									<textarea name="isi_artikel" class="form-control"><?= $artikel->isi_artikel; ?></textarea>
									<span class="text-danger"><?= form_error('isi_artikel'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">Tanggal</label>
									<input type="date" name="tanggal" class="form-control" value="<?= $artikel->tanggal; ?>">
									<span class="text-danger"><?= form_error('tanggal'); ?></span>
								</div>
								<button type="submit" class="btn btn-success">Edit Artikel</button>
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