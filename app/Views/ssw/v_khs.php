<section class="content-header">
	<h1>
		<?= $title ?> Tahun Akademik : <?= $ta_aktif['ta'] ?>/<?= $ta_aktif['semester'] ?>
	</h1>
	<br>
</section>


<div class="row">
	<div class="col-sm-12">
		<table class="table-striped table-responsive">
			<tr>
				<th rowspan="7"><img src="<?= base_url('fotosiswa/'. $ssw['foto_siswa'])?>" height="160px" width="150px"></th>
				<th width="150px">Tahun Akademik</th>
				<th width="20px">:</th>
				<th><?= $ta_aktif['ta'] ?>/<?= $ta_aktif['semester'] ?></th>
				<th rowspan="7"></th>
			</tr>
			<tr>
				<td>NIS</td>
				<td>:</td>
				<td><?= $ssw['nis']?></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><?= $ssw['nama_siswa']?></td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td>:</td>
				<td><?= $ssw['kelas']?></td>
			</tr>
			<tr>
				<td>Jurusan</td>
				<td>:</td>
				<td><?= $ssw['jurusan']?></td>
			</tr>
			<tr>
				<td>Golongan</td>
				<td>:</td>
				<td><?= $ssw['fakultas'] ?> - <?= $ssw['tahun_angkatan']?></td>
			</tr>
			<tr>
				<td>Guru PA</td>
				<td>:</td>
				<td><?= $ssw['nama_guru']?></td>
			</tr>
		</table>
	</div>
	<div class="col-sm-12">
		<a href="<?= base_url('ssw/print_khs') ?>" target="_blank" class="btn btn-xs btn-flat btn-primary"><i class="fa fa-print"></i> Print KHS</a>
	</div>
	<div class="col-sm-12"> 
		
		<table class="table table-striped table-bordered table-responsive">
			<tr class="label-primary">
				<th class="text-center">#</th>
				<th class="text-center">Kode</th>
				<th class="text-center">Mata Pelajaran</th>
				<th class="text-center">Semester</th>
				<th class="text-center">Nilai</th>
				<th class="text-center">Bobot</th>
			</tr>
			<?php $no = 1;
			$db = \Config\Database::connect();
			foreach ($data_mapel as $key => $value) {
			$jml = $db->table('tbl_krs')
						->where('id_siswa', $value['id_siswa'])
						->countAllResults();
			?>
			<tr>
				<td class="text-center"><?= $no++ ?></td>
				<td class="text-center"><?= $value['kode_mapel'] ?></td>
				<td class="text-center"><?= $value['mapel'] ?></td>
				<td class="text-center"><?= $value['semester'] ?></td>
				<td class="text-center"><?= $value['nilai_huruf'] ?></td>
				<td class="text-center"><?= $value['bobot'] ?></td>
			</tr>
			<?php } ?>
		</table>
		<h4><b>Jumlah Mata Pelajaran : <?= $jml ?></b></h4>
		<h4><b>IP : </b></h4>
	</div>
</div>





