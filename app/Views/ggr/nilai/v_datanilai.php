<section class="content-header">
	<h1>
		<?= $title ?> Golongan : <?= $jadwal['fakultas']?>-<?= $jadwal['tahun_angkatan']?> TA : <?= $ta['ta']?> / <?= $ta['semester']?>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?= base_url('ggr/AbsenKelas')?>"><i class="fa fa-dashboard"></i>Nilai Kelas</a></li>
		<li class="active">Data Nilai</li>
	</ol>
	<br>
</section>

<div class="row">
	<div class="col-sm-6">

		<table class="table table-striped table-responsive">
			<tr>
				<td>Jurusan</td>
				<td width="30px" class="text-center">:</td>
				<td> <?= $jadwal['jurusan']?> </td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td class="text-center">:</td>
				<td> <?= $jadwal['kelas']?> </td>
			</tr>
			<tr>
				<td>Kode</td>
				<td class="text-center">:</td>
				<td> <?= $jadwal['kode_mapel']?> </td>
			</tr>
		</table>
	</div>
	<div class="col-sm-6">
		<table class="table table-striped table-responsive">
			<tr>
				<td>Mata Pelajaran</td>
				<td class="text-center">:</td>
				<td> <?= $jadwal['mapel']?> </td>
			</tr>
			<tr>
				<td>Waktu</td>
				<td class="text-center">:</td>
				<td> <?= $jadwal['hari'] ?>, <?= $jadwal['waktu'] ?> </td>
			</tr>
			<tr>
				<td>Guru</td>
				<td class="text-center">:</td>
				<td> <?= $jadwal['nama_guru']?> </td>
			</tr>
		</table>
		
	</div>
<div class="col-sm-12">
		<a href="<?= base_url('ggr/PrintNilai/' . $jadwal['id_jadwal']) ?>" target="_blank" class="btn btn-xs btn-flat btn-primary"><i class="fa fa-print"></i> Print Nilai</a>
	</div>

	<div class="col-sm-12">
		<?php 

		if (session()->getFlashdata('pesan')) {
			echo '<div class="alert alert-success" role="alert">';
			echo session()->getFlashdata('pesan');
			echo '</div>';
		} 
		?>
		<?php echo form_open('ggr/SimpanNilai/' . $jadwal['id_jadwal']) ?>
		<table class="table table-striped table-bordered table-responsive text-sm">
			<tr class="label-primary">
				<th rowspan="2" class="text-center">#</th>
				<th rowspan="2" class="text-center">NIS</th>
				<th rowspan="2" class="text-center">Siswa</th>
				<th colspan="7" class="text-center">Nilai</th>
			</tr>
			<tr class="label-primary">
				<th class="text-center">Absensi</th>
				<th class="text-center" width="80px">Tugas</th>
				<th class="text-center" width="80px">UTS</th>
				<th class="text-center" width="80px">UAS</th>
				<th class="text-center" width="80px">NA <br>(15%+15%+30%+40%)</th>
				<th class="text-center" width="80px">Huruf</th>
				<th class="text-center" width="80px">Bobot</th>
			</tr>
			<?php $no = 1;

			foreach ($ssw as $key => $value) { 
				echo form_hidden($value['id_krs'] . 'id_krs', $value['id_krs']);
			?>
			<tr>
				<td><?= $no++ ?></td>
				<td class="text-center"><?= $value['nis'] ?></td>
				<td><?= $value['nama_siswa'] ?></td>
				<td class="text-center">
					<?php
					$absensi = ($value['p1'] +
                        $value['p2'] + 
                        $value['p3'] +  
                        $value['p4'] +  
                        $value['p5'] +  
                        $value['p6'] +  
                        $value['p7'] +  
                        $value['p8'] +  
                        $value['p9'] +  
                        $value['p10'] +  
                        $value['p11'] +  
                        $value['p12'] +  
                        $value['p13'] +
                        $value['p14'] +
                        $value['p15'] +
                        $value['p16'] +
                        $value['p17'] +
                        $value['p18']) / 36 * 100;
					echo number_format($absensi, 0) ;
					echo form_hidden($value['id_krs'] . 'absen', number_format($absensi, 0));
					?> 
				</td>
				<td class="text-center"><input name="<?= $value['id_krs'] ?>nilai_tugas" value="<?= $value['nilai_tugas'] ?>" class="form-control"></td>
				<td class="text-center"><input name="<?= $value['id_krs'] ?>nilai_uts" value="<?= $value['nilai_uts'] ?>" class="form-control"></td>
				<td class="text-center"><input name="<?= $value['id_krs'] ?>nilai_uas" value="<?= $value['nilai_uas'] ?>" class="form-control"></td>
				<td class="text-center"><?= $value['nilai_akhir'] ?></td>
				<td class="text-center"><?= $value['nilai_huruf'] ?></td>
				<td class="text-center"><?= $value['bobot'] ?></td>
			</tr>
			<?php } ?>
		</table>

		<button class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Simpan Dan Proses</button>
		<?php echo form_close() ?>
	</div>
</div>