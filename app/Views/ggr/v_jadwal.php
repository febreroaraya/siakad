<section class="content-header">
	<h1>
		<?= $title ?> TA : <?= $ta['ta']?> / <?= $ta['semester']?>
	</h1>
	<br>
</section>

<div class="row">
	<table class="table table-striped table-bordered table-responsive">
		<tr class="label-primary"> 
			<th class="text-center">#</th>
			<th class="text-center">Jurusan</th>
			<th class="text-center">Hari</th>
			<th class="text-center">Kode</th>
			<th class="text-center">Mata Pelajaran</th>
			<th class="text-center">Semester</th>
			<th class="text-center">Golongan</th>
			<th class="text-center">Ruangan</th>
			<th class="text-center">Guru</th>
		</tr>
		<?php $no = 1;
		foreach ($jadwal as $key => $value) { ?>
		<tr>
			<td class="text-center"><?= $no++ ?></td>
			<td class="text-center"><?= $value['jurusan'] ?></td>
			<td class="text-center"><?= $value['hari'] ?>, <?= $value['waktu'] ?></td>
			<td class="text-center"><?= $value['kode_mapel'] ?></td>
			<td class="text-center"><?= $value['mapel'] ?></td>
			<td class="text-center"><?= $value['semester'] ?></td>
			<td class="text-center"><?= $value['fakultas'] ?></td>
			<td class="text-center"><?= $value['ruangan'] ?></td>
			<td class="text-center"><?= $value['nama_guru'] ?></td>
		</tr>
	<?php } ?>
	</table>
</div>