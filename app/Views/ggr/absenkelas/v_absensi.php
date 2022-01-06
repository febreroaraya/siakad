<section class="content-header">
	<h1>
		<?= $title ?> Golongan : <?= $jadwal['fakultas']?>-<?= $jadwal['tahun_angkatan']?> TA : <?= $ta['ta']?> / <?= $ta['semester']?>
	</h1>
	<br>
	<ol class="breadcrumb">
		<li><a href="<?= base_url('ggr/AbsenKelas')?>"><i class="fa fa-dashboard"></i>Absen Kelas</a></li>
		<li class="active">Absensi</li>
	</ol>
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
		<a href="<?= base_url('ggr/print_absensi/' . $jadwal['id_jadwal']) ?>" target="_blank" class="btn btn-xs btn-flat btn-primary"><i class="fa fa-print"></i> Print Absensi</a>
	</div>
	<div class="col-sm-12">
		<?php 

		if (session()->getFlashdata('pesan')) {
			echo '<div class="alert alert-success" role="alert">';
			echo session()->getFlashdata('pesan');
			echo '</div>';
		} 
		?>
		<?php echo form_open('ggr/SimpanAbsen/' . $jadwal['id_jadwal']) ?>
		<table class="table table-striped table-bordered table-responsive text-sm">
			<tr class="label-primary">
				<th rowspan="2" class="text-center">#</th>
				<th rowspan="2" class="text-center">NIS</th>
				<th rowspan="2" class="text-center">Siswa</th>
				<th colspan="18" class="text-center">Pertemuan</th>
			</tr>
			<tr class="label-primary">
				<td class="text-center">1</td>
				<td class="text-center">2</td>
				<td class="text-center">3</td>
				<td class="text-center">4</td>
				<td class="text-center">5</td>
				<td class="text-center">6</td>
				<td class="text-center">7</td>
				<td class="text-center">8</td>
				<td class="text-center">9</td>
				<td class="text-center">10</td>
				<td class="text-center">11</td>
				<td class="text-center">12</td>
				<td class="text-center">13</td>
				<td class="text-center">14</td>
				<td class="text-center">15</td>
				<td class="text-center">16</td>
				<td class="text-center">17</td>
				<td class="text-center">18</td>
			</tr>
			<?php $no = 1;
			foreach ($ssw as $key => $value) { 		
				echo form_hidden($value['id_krs'] . 'id_krs', $value['id_krs']);
			?>
			<tr>
				<td><?= $no++ ?></td>
				<td class="text-center"><?= $value['nis'] ?></td>
				<td><?= $value['nama_siswa'] ?></td>
				<td>

					<select name="<?= $value['id_krs'] ?>p1">
						<option value="0" <?php if ($value['p1'] == 0) {
												echo 'selected';
											} ?>>A</option>
						<option value="1" <?php if ($value['p1'] == 1) {
												echo 'selected';
											} ?>>I</option>>I</option>
						<option value="2" <?php if ($value['p1'] == 2) {
												echo 'selected';
											} ?>>H</option>>H</option>
					</select>
				</td>
				<td>

					<select name="<?= $value['id_krs'] ?>p2">
						<option value="0" <?php if ($value['p2'] == 0) {
												echo 'selected';
											} ?>>A</option>
						<option value="1" <?php if ($value['p2'] == 1) {
												echo 'selected';
											} ?>>I</option>>I</option>
						<option value="2" <?php if ($value['p2'] == 2) {
												echo 'selected';
											} ?>>H</option>>H</option>
					</select>
				</td>
				<td>

					<select name="<?= $value['id_krs'] ?>p3">
						<option value="0" <?php if ($value['p3'] == 0) {
												echo 'selected';
											} ?>>A</option>
						<option value="1" <?php if ($value['p3'] == 1) {
												echo 'selected';
											} ?>>I</option>>I</option>
						<option value="2" <?php if ($value['p3'] == 2) {
												echo 'selected';
											} ?>>H</option>>H</option>
					</select>
				</td>
				<td>

					<select name="<?= $value['id_krs'] ?>p4">
						<option value="0" <?php if ($value['p4'] == 0) {
												echo 'selected';
											} ?>>A</option>
						<option value="1" <?php if ($value['p4'] == 1) {
												echo 'selected';
											} ?>>I</option>>I</option>
						<option value="2" <?php if ($value['p4'] == 2) {
												echo 'selected';
											} ?>>H</option>>H</option>
					</select>
				</td>
				<td>

					<select name="<?= $value['id_krs'] ?>p5">
						<option value="0" <?php if ($value['p5'] == 0) {
												echo 'selected';
											} ?>>A</option>
						<option value="1" <?php if ($value['p5'] == 1) {
												echo 'selected';
											} ?>>I</option>>I</option>
						<option value="2" <?php if ($value['p5'] == 2) {
												echo 'selected';
											} ?>>H</option>>H</option>
					</select>
				</td>
				<td>

					<select name="<?= $value['id_krs'] ?>p6">
						<option value="0" <?php if ($value['p6'] == 0) {
												echo 'selected';
											} ?>>A</option>
						<option value="1" <?php if ($value['p6'] == 1) {
												echo 'selected';
											} ?>>I</option>>I</option>
						<option value="2" <?php if ($value['p6'] == 2) {
												echo 'selected';
											} ?>>H</option>>H</option>
					</select>
				</td>
				<td>

					<select name="<?= $value['id_krs'] ?>p7">
						<option value="0" <?php if ($value['p7'] == 0) {
												echo 'selected';
											} ?>>A</option>
						<option value="1" <?php if ($value['p7'] == 1) {
												echo 'selected';
											} ?>>I</option>>I</option>
						<option value="2" <?php if ($value['p7'] == 2) {
												echo 'selected';
											} ?>>H</option>>H</option>
					</select>
				</td>
				<td>

					<select name="<?= $value['id_krs'] ?>p8">
						<option value="0" <?php if ($value['p8'] == 0) {
												echo 'selected';
											} ?>>A</option>
						<option value="1" <?php if ($value['p8'] == 1) {
												echo 'selected';
											} ?>>I</option>>I</option>
						<option value="2" <?php if ($value['p8'] == 2) {
												echo 'selected';
											} ?>>H</option>>H</option>
					</select>
				</td>
				<td>

					<select name="<?= $value['id_krs'] ?>p9">
						<option value="0" <?php if ($value['p9'] == 0) {
												echo 'selected';
											} ?>>A</option>
						<option value="1" <?php if ($value['p9'] == 1) {
												echo 'selected';
											} ?>>I</option>>I</option>
						<option value="2" <?php if ($value['p9'] == 2) {
												echo 'selected';
											} ?>>H</option>>H</option>
					</select>
				</td>
				<td>

					<select name="<?= $value['id_krs'] ?>p10">
						<option value="0" <?php if ($value['p10'] == 0) {
												echo 'selected';
											} ?>>A</option>
						<option value="1" <?php if ($value['p10'] == 1) {
												echo 'selected';
											} ?>>I</option>>I</option>
						<option value="2" <?php if ($value['p10'] == 2) {
												echo 'selected';
											} ?>>H</option>>H</option>
					</select>
				</td>
				<td>

					<select name="<?= $value['id_krs'] ?>p11">
						<option value="0" <?php if ($value['p11'] == 0) {
												echo 'selected';
											} ?>>A</option>
						<option value="1" <?php if ($value['p11'] == 1) {
												echo 'selected';
											} ?>>I</option>>I</option>
						<option value="2" <?php if ($value['p11'] == 2) {
												echo 'selected';
											} ?>>H</option>>H</option>
					</select>
				</td>
				<td>

					<select name="<?= $value['id_krs'] ?>p12">
						<option value="0" <?php if ($value['p12'] == 0) {
												echo 'selected';
											} ?>>A</option>
						<option value="1" <?php if ($value['p12'] == 1) {
												echo 'selected';
											} ?>>I</option>>I</option>
						<option value="2" <?php if ($value['p12'] == 2) {
												echo 'selected';
											} ?>>H</option>>H</option>
					</select>
				</td>
				<td>

					<select name="<?= $value['id_krs'] ?>p13">
						<option value="0" <?php if ($value['p13'] == 0) {
												echo 'selected';
											} ?>>A</option>
						<option value="1" <?php if ($value['p13'] == 1) {
												echo 'selected';
											} ?>>I</option>>I</option>
						<option value="2" <?php if ($value['p13'] == 2) {
												echo 'selected';
											} ?>>H</option>>H</option>
					</select>
				</td>
				<td>

					<select name="<?= $value['id_krs'] ?>p14">
						<option value="0" <?php if ($value['p14'] == 0) {
												echo 'selected';
											} ?>>A</option>
						<option value="1" <?php if ($value['p14'] == 1) {
												echo 'selected';
											} ?>>I</option>>I</option>
						<option value="2" <?php if ($value['p14'] == 2) {
												echo 'selected';
											} ?>>H</option>>H</option>
					</select>
				</td>
				<td>

					<select name="<?= $value['id_krs'] ?>p15">
						<option value="0" <?php if ($value['p15'] == 0) {
												echo 'selected';
											} ?>>A</option>
						<option value="1" <?php if ($value['p15'] == 1) {
												echo 'selected';
											} ?>>I</option>>I</option>
						<option value="2" <?php if ($value['p15'] == 2) {
												echo 'selected';
											} ?>>H</option>>H</option>
					</select>
				</td>
				<td>

					<select name="<?= $value['id_krs'] ?>p16">
						<option value="0" <?php if ($value['p16'] == 0) {
												echo 'selected';
											} ?>>A</option>
						<option value="1" <?php if ($value['p16'] == 1) {
												echo 'selected';
											} ?>>I</option>>I</option>
						<option value="2" <?php if ($value['p16'] == 2) {
												echo 'selected';
											} ?>>H</option>>H</option>
					</select>
				</td>
				<td>

					<select name="<?= $value['id_krs'] ?>p17">
						<option value="0" <?php if ($value['p17'] == 0) {
												echo 'selected';
											} ?>>A</option>
						<option value="1" <?php if ($value['p17'] == 1) {
												echo 'selected';
											} ?>>I</option>>I</option>
						<option value="2" <?php if ($value['p17'] == 2) {
												echo 'selected';
											} ?>>H</option>>H</option>
					</select>
				</td>
				<td>

					<select name="<?= $value['id_krs'] ?>p18">
						<option value="0" <?php if ($value['p18'] == 0) {
												echo 'selected';
											} ?>>A</option>
						<option value="1" <?php if ($value['p18'] == 1) {
												echo 'selected';
											} ?>>I</option>>I</option>
						<option value="2" <?php if ($value['p18'] == 2) {
												echo 'selected';
											} ?>>H</option>>H</option>
					</select>
				</td>
			</tr>
			<?php } ?>
		</table>
		<button class="btn btn-primary btn-flat"><i class="fa fa-save"></i>Simpan Absen</button>
		<?php echo form_close() ?>
	</div>
</div>
