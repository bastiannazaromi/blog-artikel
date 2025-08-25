<div class="container my-5">
	<div class="row">
		<div class="col-md-8">
			<div class="card shadow mb-4">
				<div class="card-body">
					<h2 class="card-title mb-3">
						<?= $artikel->judul_artikel; ?>
					</h2>

					<h6 class="card-subtitle mb-4 text-muted">
						<?= '@' . $artikel->penulis . ' - ' . date('d-m-Y', strtotime($artikel->tanggal)); ?>
					</h6>

					<p class="card-text" style="text-align: justify;">
						<?= nl2br($artikel->isi_artikel); ?>
					</p>

					<a href="<?= base_url('home'); ?>" class="btn btn-secondary mt-4">
						&laquo; Kembali
					</a>
				</div>
			</div>

			<div class="card shadow">
				<div class="card-body">
					<h5 class="mb-3">Komentar</h5>

					<form action="<?= base_url('artikel/komen'); ?>" method="post">
						<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
						<input type="hidden" name="id_artikel" value="<?= $artikel->id; ?>">

						<div class="mb-3">
							<label for="nama" class="form-label">Nama</label>
							<input type="text" class="form-control" name="nama" required>
						</div>
						<div class="mb-3">
							<label for="email" class="form-label">Email</label>
							<input type="text" class="form-control" name="email" required>
						</div>
						<div class="mb-3">
							<label for="isi_komentar" class="form-label">Komentar</label>
							<textarea class="form-control" id="isi_komentar" name="isi_komentar" rows="3" required></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Kirim</button>
					</form>

					<hr>

					<!-- Daftar Komentar -->
					<?php if (!empty($komentar)) : ?>
						<?php foreach ($komentar as $k) : ?>
							<div class="mb-3">
								<strong><?= htmlspecialchars($k->nama); ?></strong>
								<small class="text-muted"><?= date('d-m-Y H:i', strtotime($k->createdAt)); ?></small>
								<p class="mb-0"><?= nl2br(htmlspecialchars($k->isi_komentar)); ?></p>
							</div>
							<hr>
						<?php endforeach; ?>
					<?php else : ?>
						<p class="text-muted">Belum ada komentar.</p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>