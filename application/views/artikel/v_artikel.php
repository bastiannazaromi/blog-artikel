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
						<li class="breadcrumb-item active" aria-current="page">Artikel</li>
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

			<?php if ($this->session->userdata('user_login')['role'] != 'admin') : ?>
				<div class="row mb-3">
					<div class="col-lg-3">
						<a href="<?= base_url('artikel/add'); ?>" class="btn btn-primary">Tambah</a>
					</div>
				</div>
			<?php endif; ?>

			<div class="row">
				<div class="col-lg-12">
					<div class="card card-primary">
						<div class="card-header">
							Daftar Artikel
						</div>
						<div class="card-body">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Judul</th>
										<th>Isi</th>
										<th>Penulis</th>
										<th>Tanggal</th>
										<?php if ($this->session->userdata('user_login')['role'] != 'admin') : ?>
											<th>Aksi</th>
										<?php endif; ?>
									</tr>
								</thead>
								<tbody>
									<?php if (!empty($artikel)) : ?>
										<?php $no = 1;
										foreach ($artikel as $dt) : ?>
											<tr>
												<td><?= $no++; ?></td>
												<td><?= $dt->judul_artikel; ?></td>
												<td><?= $dt->isi_artikel; ?></td>
												<td><?= $dt->penulis; ?></td>
												<td><?= date('d M Y', strtotime($dt->tanggal)); ?></td>
												<?php if ($this->session->userdata('user_login')['role'] != 'admin') : ?>
													<td>
														<div class="btn-group">
															<a href="<?= base_url('artikel/edit/' . $dt->id); ?>" class="btn btn-warning btn-sm">Edit</a>
															<a href="#" data-href="<?= base_url('artikel/delete/' . $dt->id); ?>" class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
														</div>
													</td>
												<?php endif; ?>
											</tr>
										<?php endforeach; ?>
									<?php else : ?>
										<tr>
											<td colspan="<?= ($this->session->userdata('user_login')['role'] != 'admin') ? 6 : 5; ?>" class="text-center">Tidak ada data artikel.</td>
										</tr>
									<?php endif; ?>
								</tbody>
							</table>
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