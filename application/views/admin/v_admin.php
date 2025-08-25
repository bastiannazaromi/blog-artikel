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
						<li class="breadcrumb-item active" aria-current="page">Admin</li>
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
					<a href="<?= base_url('admin/add'); ?>" class="btn btn-primary">Tambah</a>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="card card-primary">
						<div class="card-header">
							Daftar Admin
						</div>
						<div class="card-body">
							<table class="table table-bordered table-striped">
								<thead>
									<tr class="text-center">
										<th>#</th>
										<th>Username</th>
										<th>PAssword</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php if (!empty($admin)) : ?>
										<?php $no = 1;
										foreach ($admin as $dt) : ?>
											<tr style="vertical-align: middle;">
												<td class="text-center"><?= $no++; ?></td>
												<td><?= $dt->username; ?></td>
												<td><?= $dt->password; ?></td>
												<td class="text-center">
													<div class="btn-group">
														<a href="<?= base_url('admin/edit/' . $dt->username); ?>" class="btn btn-warning btn-sm">Edit</a>
														<?php if ($dt->username != $this->session->userdata('user_login')['data']->username) : ?>
															<a href="#" data-href="<?= base_url('admin/delete/' . $dt->username); ?>" class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
														<?php endif; ?>
													</div>
												</td>
											</tr>
										<?php endforeach; ?>
									<?php else : ?>
										<tr>
											<td colspan="7" class="text-center">Tidak ada data user.</td>
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