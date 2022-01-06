<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<title>SIAKAD | Print KHS</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?= base_url() ?>/template/bower_compenents/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>/template/bower_compenents/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>/template/bower_compenents/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/AdminLTE.min.css">

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Souce+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
	<div class="wrapper">
		<section class="Invoice">
			<div class="row">
				<div class="col-xs-12">
					<h1 class="page-header">
						<i class="fa fa-file-o">
						</i><b>Kartu Hasil Studi</b> 
						<small class="pull-right">Date: <?= date('d M Y')?></small>
					</h1>
				</div>
				<!-- /.col -->
			</div>
			<!-- info row -->
			<div class="row invoice-info">
				<div class="col-sm-12">
					<table class="table table-striped table-responsive">
			<tr>
				<th rowspan="7"><img src = "<?= base_url('fotomhs/'.$mhs['foto'])?>" height="170px" width="120px"></th>
				<th width="150px">Tahun Akademik</th>
				<th width="20px">:</th>
				<th><?= $ta_aktif['ta'] ?>/<?= $ta_aktif['semester'] ?></th>
				<th rowspan="7"></th>
			</tr>
			<tr>
				<td>NIM</td>
				<td>:</td>
				<td><?= $mhs['nim']?></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><?= $mhs['nama_mhs']?></td>
			</tr>
			<tr>
				<td>Fakultas</td>
				<td>:</td>
				<td><?= $mhs['fakultas']?></td>
			</tr>
			<tr>
				<td>Program Studi</td>
				<td>:</td>
				<td><?= $mhs['prodi']?></td>
			</tr>
			<tr>
				<td>Rombongan Kelas</td>
				<td>:</td>
				<td><?= $mhs['nama_kelas'] ?>-<?= $mhs['tahun_angkatan']?></td>
			</tr>
			<tr>
				<td>Dosen PA</td>
				<td>:</td>
				<td><?= $mhs['nama_dosen']?></td>
			</tr>
		</table>
				</div>
		
			</div>
			<div class="row">
				<div class="col-xs-12 table-responsive">
				<table class="table table-striped table-bordered table-responsive">
			<tr class="label-success">
				<th class="text-center">#</th>
				<th class="text-center">Kode</th>
				<th class="text-center">Mata Kuliah</th>
				<th class="text-center">SKS</th>
				<th class="text-center">SMT</th>
				<th class="text-center">Nilai</th>
				<th class="text-center">Bobot</th>
			</tr>
			<?php $no = 1;
			$sks = 0;
			$grand_tot_bobot = 0;
			foreach ($data_matkul as $key => $value) { 
				$sks = $sks + $value['sks'];
				$tot_bobot = $value['sks'] * $value['bobot'];
				$grand_tot_bobot = $grand_tot_bobot + $tot_bobot;
			?>
			<tr>
				<td><?= $no++ ?></td>
				<td class="text-center"><?= $value['kode_matkul'] ?></td>
				<td><?= $value['matkul'] ?></td>
				<td class="text-center"><?= $value['sks'] ?></td>
				<td class="text-center"><?= $value['smt'] ?></td>
				<td class="text-center"><?= $value['nilai_huruf'] ?></td>
				<td class="text-center"><?= $value['bobot'] ?></td>
			</tr>
			<?php } ?>
		</table>
		
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4">
					<h4><b>Jumlah SKS : <?= $sks ?></b></h4>
					<h4><b>IP : <?php if (empty($data_matkul)) {
									echo '0';
								}else{
									echo number_format($grand_tot_bobot / $sks, 2);
								} ?></b></h4>
				</div>
				<div class="col-xs-4">
				</div>
				<div class="col-xs-4">
					Padang, <?= date('d M Y')?> <br>
					Pembimbing Akademik <br>
					<br>
					dto.
					<br>
					<br>
					<br>
					<?= $mhs['nama_dosen']?>
				</div>
			</div>
		</section>
	</div>
</body>
</html>