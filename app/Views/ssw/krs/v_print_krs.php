<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MMA | Print KRS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-file-o"></i> <b>Kartu Rencana Studi</b>
                        <small class="pull-right">Tanggal: <?= date('d M Y') ?></small>
                    </h2>
                </div>
            <!-- /.col -->
            </div>
    <!-- info row -->
    <div class="row invoice-info">
	      <table class="table-striped table-responsive">
            <tr>
                <th rowspan="7"><img src="<?= base_url('fotosiswa/'. $ssw['foto_siswa']) ?>" height="160px" width="150px"></th>
                <th width="150px">Tahun Akademik</th>
                <th width="20px">:</th>
                <th><?= $ta_aktif['ta'] ?>/<?= $ta_aktif['semester'] ?></th>
                <th rowspan="7"></th>
            </tr>
            <tr>
                <td>NIS</td>
                <td>:</td>
                <td><?= $ssw['nis'] ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?= $ssw['nama_siswa'] ?></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td><?= $ssw['kelas'] ?></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td><?= $ssw['jurusan'] ?></td>
            </tr>
            <tr>
                <td>Guru PA</td>
                <td>:</td>
                <td><?= $ssw['nama_guru'] ?></td>
            </tr>
            <tr>
                <td>Golongan</td>
                <td>:</td>
                <td><?= $ssw['fakultas'] ?> - <?= $ssw['tahun_angkatan'] ?></td>
            </tr>
        </table>			
      <!-- /.col -->
    </div>
    <!-- /.row -->
	<br>
    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
	  <table class="table table-striped table-bordered table-responsive">
            <tr class="label-primary">
                <th class="text-center">#</th>
                <th class="text-center">Kode</th>
                <th class="text-center">Mata Pelajaran</th>
                <th class="text-center">Semester</th>
                <th class="text-center">Golongan</th>
                <th class="text-center">Ruang</th>
                <th class="text-center">Guru</th>
                <th class="text-center">Waktu</th>
            </tr>
            <?php $no = 1;
            foreach ($data_mapel as $key => $value) { ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td class="text-center"><?= $value['kode_mapel'] ?></td>
                    <td><?= $value['mapel'] ?></td>
                    <td class="text-center"><?= $value['semester'] ?></td>
                    <td class="text-center"><?= $value['fakultas'] ?></td>
                    <td class="text-center"><?= $value['ruangan'] ?></td>
                    <td class="text-center"><?= $value['nama_guru'] ?></td>
                    <td class="text-center"><?= $value['hari'] ?>, <?= $value['waktu'] ?></td>
                </tr>
            <?php } ?>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-4">
        
      </div>
      <!-- /.col -->
      <div class="col-xs-4">

      </div>
	  <div class="col-xs-4">
				Malang, <?= date('d M Y') ?> <br>
				Pembimbing Akademik <br>
				<br>
				<br>
				dto.
				<br>
				<br>
				<br>
				<b><?= $ssw['nama_guru'] ?> <br></b>
				<b>NIP. <?= $ssw['nip'] ?></b> 
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
