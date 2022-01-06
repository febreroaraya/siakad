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
			<th class="text-center">Kode</th>
			<th class="text-center">Mata Pelajaran</th>
			<th class="text-center">Golongan</th>
			<th class="text-center">Absensi</th>
		</tr>
		<?php $no = 1;
		foreach ($absen as $key => $value) { ?>
		<tr>
			<td class="text-center"><?= $no++ ?></td>
			<td class="text-center"><?= $value['kode_mapel'] ?></td>
			<td class="text-center"><?= $value['mapel'] ?></td>
			<td class="text-center"><?= $value['fakultas'] ?>-<?= $value['tahun_angkatan'] ?></td>
			<td class="text-center">
				<a href="<?= base_url('ggr/absensi/'. $value['id_jadwal']) ?>" class="btn btn-primary btn-sm btn-flat">
					<i class="fa fa-calendar"></i> Absensi
				</a>
			</td>
		</tr>
	<?php } ?>
	</table>
</div>