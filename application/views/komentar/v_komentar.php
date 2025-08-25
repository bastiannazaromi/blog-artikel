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
						<li class="breadcrumb-item active" aria-current="page">Komentar</li>
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
					<div class="card card-primary">
						<div class="card-header">
							<?= $title; ?>
						</div>
						<div class="card-body">
							<table class="table table-bordered table-striped">
								<thead>
									<tr class="text-center">
										<th>#</th>
										<th>Judul Artiker</th>
										<th>Nama Pembaca</th>
										<th>Email</th>
										<th>Isi Komentar</th>
										<th>Tanggal</th>
										<?php if ($this->session->userdata('user_login')['role'] != 'admin') : ?>
											<th>Aksi</th>
										<?php endif; ?>
									</tr>
								</thead>
								<tbody>
									<?php if (!empty($komentar)) : ?>
										<?php $no = 1;
										foreach ($komentar as $data) : ?>
											<tr>
												<td class="text-center"><?= $no++; ?></td>
												<td><?= $data->judul_artikel; ?></td>
												<td><?= $data->nama; ?></td>
												<td><?= $data->email; ?></td>
												<td><?= $data->isi_komentar; ?></td>
												<td><?= date('d M Y - H:i', strtotime($data->createdAt)); ?></td>
												<?php if ($this->session->userdata('user_login')['role'] != 'admin') : ?>
													<td class="text-center">
														<div class="btn-group">
															<a href="#" data-href="<?= base_url('komentar/delete/' . $data->id_komentar); ?>" class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
														</div>
													</td>
												<?php endif; ?>
											</tr>
										<?php endforeach; ?>
									<?php else : ?>
										<tr>
											<td colspan="<?= ($this->session->userdata('user_login')['role'] != 'admin') ? 7 : 6; ?>" class="text-center">Tidak ada data artikel.</td>
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