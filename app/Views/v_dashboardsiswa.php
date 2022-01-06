<div class="row">
	<div class="col-md-3">
		<div class="box box-primary">
			<div class="box-body">
				<div class="text-center">
					<img class="" src="<?= base_url('fotosiswa/'.$ssw['foto_siswa']) ?>" width="95%" height="226px">
				</div>
                    <h4 class="text-center"><?= $ssw['nis'] ?></h4>
                    <h4 class="text-center"><?= $ssw['nama_siswa'] ?></h4>
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
						<th>Jurusan</th>
						<th>:</th>
						<td><?= $ssw['jurusan'] ?></td>
					</tr>
					<tr>
						<th>Kelas</th>
						<th>:</th>
						<td><?= $ssw['kelas'] ?></td>
					</tr>
					<tr>
						<th>Golongan</th>
						<th>:</th>
						<td><?= $ssw['fakultas'] ?>-<?= $ssw['tahun_angkatan'] ?></td>
					</tr>
					<tr>
						<th>Guru PA</th>
						<th>:</th>
						<td><?= $ssw['nama_guru'] ?></td>
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
	