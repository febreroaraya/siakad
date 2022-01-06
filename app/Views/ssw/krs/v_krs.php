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
    </div>
    <div class="col-sm-12">
        <button class="btn btn-xs btn-flat btn-info" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Tambah Mata Pelajaran</button>
        <a href="<?= base_url('krs/print') ?>" target="_blank"class="btn btn-xs btn-flat btn-primary"><i class="fa fa-print"></i> Print KRS</a>
    </div>
    <div class="col-sm-12">
        <?php 
            if (session()->getFlashdata('pesan')) {
            echo '<div class="alert alert-success" role="alert">';
            echo session()->getFlashdata('pesan');
            echo '</div>';
            }
        ?>
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
                <th></th>
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
                    <td><?= $value['nama_guru'] ?></td>
                    <td class="text-center"><?= $value['hari'] ?>, <?= $value['waktu'] ?></td>
                    <td class="text-center">
                        <button class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#delete<?= $value['id_krs'] ?>"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>


<!-- Modal Add -->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Daftar Mata Pelajaran</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped text-sm" id="example2">
                    <thead>
                        <tr class="label-primary">
                            <th class="text-center">#</th>
                            <th class="text-center">Kode</th>
                            <th class="text-center">Mata Pelajaran</th>
                            <th class="text-center">Semester</th>
                            <th class="text-center">Golongan</th>
                            <th class="text-center">Ruang</th>
                            <th class="text-center">Guru</th>
                            <th class="text-center">Waktu</th>
                            <th class="text-center">Quota</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $db = \Config\Database::connect();
                        foreach ($mapel as $key => $value) { 
                            $jml = $db->table('tbl_krs')
                            ->where('id_jadwal', $value['id_jadwal'])
                            ->countAllResults();
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><?= $value['kode_mapel'] ?></td>
                                <td class="text-center">
                                    <?= $value['mapel'] ?>
                                    (<?= $value['kode_jurusan']?>)
                                </td>
                                <td class="text-center"><?= $value['semester'] ?></td>
                                <td class="text-center"><?= $value['fakultas'] ?></td>
                                <td class="text-center"><?= $value['ruangan'] ?></td>
                                <td class="text-center"><?= $value['nama_guru'] ?></td>
                                <td class="text-center"><?= $value['hari'] ?>, <?= $value['waktu'] ?></td>
                                <td class="text-center">
                                    <span class="label label-primary"><?= $jml ?>/<?= $value['quota'] ?></span>
                                </td>
                                <td class="text-center">
                                    <?php if ($jml == $value['quota']) { ?>
                                        <span class="label label-danger">Full</span>
                                    <?php } else { ?>
                                        <a href="<?= base_url('krs/tambah/'. $value['id_jadwal']) ?>" class="btn btn-success btn-flat btn-xs"><i class="fa fa-plus"></i></a>
                                    <?php } ?>
                                    
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>

<!-- Modal Delete -->
<?php foreach ($data_mapel as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_krs'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Hapus <?= $title ?></h4>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus <b><?= $value['kode_mapel'] ?> | <?= $value['mapel'] ?>?</b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                <a href="<?= base_url('krs/delete/'. $value['id_krs']) ?>" class="btn btn-primary btn-flat">Hapus</a>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
<?php } ?>