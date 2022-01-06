<div class="row">
	<div class="col-md-3">
		<div class="box box-primary">
			<div class="box-body">
				<div class="text-center">
					<img class="" src="<?= base_url('fotoguru/'.$guru['foto_guru']) ?>" width="96%" height="226px">
				</div>

				<h4 class="text-center"><?= $guru['nip'] ?></h4>
				<h4 class="text-center"><?= $guru['nama_guru'] ?></h4>

			</div>
		</div>
	</div>

	<div class="col-md-9">
		<div class="box box-primary">
			<div class="box-body">
				<table class="table table-responsive">
					<tr>
						<th>Tahun Akademik</th>
						<th>:</th>
						<td><?= $ta['ta'] ?>/<?= $ta['semester'] ?></td>
					</tr>
					<tr>
						<th>Kode</th>
						<th>:</th>
						<td><?= $guru['kode_guru'] ?></td>
					</tr>
					<tr>
						<th>Tempat Lahir</th>
						<th>:</th>
						<td></td>
					</tr>
					<tr>
						<th>Tanggal Lahir</th>
						<th>:</th>
						<td></td>
					</tr>
					<tr>
						<th>Pendidikan Terakhir</th>
						<th>:</th>
						<td></td>
					</tr>
					<tr>
						<th>Alamat</th>
						<th>:</th>
						<td></td>
					</tr>
					<tr>
						<th>No. HP</th>
						<th>:</th>
						<td></td>
					</tr>
					<tr>
						<th>E-Mail</th>
						<th>:</th>
						<td></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
	