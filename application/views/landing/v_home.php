<style>
	.row {
		display: flex;
		flex-wrap: wrap;
	}

	.row>[class*='col-'] {
		display: flex;
	}

	.card {
		flex: 1 1 auto;
	}
</style>

<div class="container">
	<div class="row">
		<?php foreach ($artikel as $dt) : ?>
			<div class="col-md-3 d-flex">
				<div class="card h-100 w-100">
					<div class="card-body d-flex flex-column">
						<h5 class="card-title"><?= $dt->judul_artikel; ?></h5>
						<h6 class="card-subtitle mb-2 text-body-secondary">
							<?= '@' . $dt->penulis; ?>
						</h6>
						<p class="card-text flex-grow-1"><?= potong_teks($dt->isi_artikel, 50); ?></p>

						<a href="<?= base_url('detail/artikel/' . $dt->id); ?>" class="btn btn-primary mt-auto">Selengkapnya</a>

						<h6 class="card-subtitle mt-3 text-body-secondary">
							<?= date('d-m-Y', strtotime($dt->tanggal)); ?>
						</h6>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>