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
						<li class="breadcrumb-item"><a href="<?= base_url('peminjaman'); ?>">Peminjaman</a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit Peminjaman</li>
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
							Edit Peminjaman
						</div>
						<div class="card-body">
							<form action="<?= base_url('peminjaman/update'); ?>" method="POST">
								<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
								<input type="hidden" name="id" value="<?= $peminjaman->id; ?>">
								<div class="mb-3">
									<label class="form-label">Judul Buku</label>
									<select name="id_buku" class="form-control">
										<option value="">-- Pilih Judul Buku --</option>
										<?php foreach ($buku as $bk) : ?>
											<option value="<?= $bk->id; ?>" <?= ($peminjaman->id_buku == $bk->id) ? 'selected' : ''; ?>><?= $bk->judul; ?></option>
										<?php endforeach; ?>
									</select>
									<span class="text-danger"><?= form_error('id_penulis'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">Tanggal Peminjaman</label>
									<input type="date" name="tanggal" class="form-control" value="<?= $peminjaman->tanggal; ?>">
									<span class="text-danger"><?= form_error('tanggal'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">Jumlah Buku</label>
									<input type="number" name="jumlah" class="form-control" value="<?= $peminjaman->jumlah; ?>">
									<span class="text-danger"><?= form_error('jumlah'); ?></span>
								</div>
								<button type="submit" class="btn btn-success">Edit</button>
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