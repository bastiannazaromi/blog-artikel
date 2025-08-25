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
						<li class="breadcrumb-item active" aria-current="page">Penulis</li>
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
			<div class="row mb-3">
				<div class="col-lg-3">
					<a href="<?= base_url('penulis/add'); ?>" class="btn btn-primary">Tambah</a>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="card card-primary">
						<div class="card-header">
							Daftar Penulis
						</div>
						<div class="card-body">
							<table class="table table-bordered table-striped">
								<thead>
									<tr class="text-center">
										<th>#</th>
										<th>Username</th>
										<th>Password</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php if (!empty($penulis)) : ?>
										<?php $no = 1;
										foreach ($penulis as $dt) : ?>
											<tr>
												<td class="text-center"><?= $no++; ?></td>
												<td><?= $dt->username; ?></td>
												<td><?= $dt->password; ?></td>
												<td>
													<?php if ($dt->status == 0) : ?>
														<a href="<?= base_url('penulis/status/' . $dt->id_penulis . '/1'); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?')">Aktifkan</a></a>
													<?php else : ?>
														<a href="<?= base_url('penulis/status/' . $dt->id_penulis . '/0'); ?>" class="btn btn-success btn-sm" onclick="return confirm('Apakah anda yakin?')">Nonaktifkan</a></a>
													<?php endif; ?>
												</td>
												<td>
													<a href="<?= base_url('penulis/edit/' . $dt->id_penulis); ?>" class="btn btn-warning btn-sm">Edit</a>
													<a href="#" data-href="<?= base_url('penulis/delete/' . $dt->id_penulis); ?>" class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
												</td>
											</tr>
										<?php endforeach; ?>
									<?php else : ?>
										<tr>
											<td colspan="7" class="text-center">Tidak ada data penulis.</td>
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