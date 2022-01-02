<section class="content-header">
    <h1>
        <?= $title ?>
    </h1>
    <br>
</section>


<div class="row">
    <div class="col-sm-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $title ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Tambah</button>
                </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                <?php foreach ($errors as $key => $value) { ?>
                                    <li><?= esc($value) ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                <?php } ?>

                <?php
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
                ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" width="50px">No</th>
                            <th class="text-center">Golongan</th>
                            <th>Jurusan</th>
                            <th>Nama Guru</th>
                            <th class="text-center">Tahun</th>
                            <th class="text-center">Jumlah/Golongan</th>
                            <th class="text-center" width="50px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $db = \Config\Database::connect();
                        $no = 1; 
                        foreach ($fakultas as $key => $value) { 
                            $jml = $db->table('tbl_siswa')
                            ->where('id_fakultas', $value['id_fakultas'])
                            ->countAllResults();
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><b><?= $value['fakultas'] ?> - <?= $value['tahun_angkatan'] ?></td>
                                <td><?= $value['jurusan'] ?></td>
                                <td><?= $value['nama_guru'] ?></td>
                                <td class="text-center"><?= $value['tahun_angkatan'] ?></td>
                                <td class="text-center">
                                    <p class="label text-center bg-green"><?= $jml ?></p>
                                    <br>
                                    <a href="<?= base_url('fakultas/detail_fakultas/'. $value['id_fakultas']) ?>">Siswa</a>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_fakultas'] ?>"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
          <!-- /.box -->
    </div>
</div>



<!-- Modal Add -->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Tambah <?= $title ?></h4>
            </div>
            <div class="modal-body">
                <?php
                    echo form_open('fakultas/add');
                ?>

                <div class="form-group">
                    <label>Fakultas</label>
                    <input name="fakultas" class="form-control" placeholder="Fakultas" required>
                </div>

                <div class="form-group">
                    <label>Jurusan</label>
                    <select name="id_jurusan" class="form-control">
                        <option value="">--Pilih Jurusan--</option>
                        <?php foreach ($jurusan as $key => $value) { ?>
                            <option value="<?= $value['id_jurusan'] ?>"><?= $value['kode_jurusan'] ?></option>   
                        <?php }  ?>
                    </select>  
                </div>

                <div class="form-group">
                    <label>Guru PA</label>
                    <select name="id_guru" class="form-control">
                        <option value="">--Pilih Guru PA--</option>
                        <?php foreach ($guru as $key => $value) { ?>
                            <option value="<?= $value['id_guru'] ?>"><?= $value['nama_guru'] ?></option>   
                        <?php }  ?>
                    </select>  
                </div>

                <div class="form-group">
                    <label>Tahun Angkatan</label>
                    <select name="tahun_angkatan" class="form-control">
                        <option value="">--Pilih Tahun--</option>
                        <?php for ($i = date('Y'); $i >= date('Y')-6; $i--) { ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php } ?>
                    </select>  
                </div>


            </div>  
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
    <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>


<!-- Modal Delete -->
<?php foreach ($fakultas as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_fakultas'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span> </button>
                <h4 class="modal-title">Hapus <?=$title ?></h4>
           </div>

            <div class="modal-body">

                Apakah anda yakin ingin menghapus Golongan <b><?= $value['fakultas'] ?>  ?</b>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                <a href="<?= base_url('fakultas/delete/'. $value['id_fakultas']) ?>" class="btn btn-primary btn-flat">Hapus</a>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
<?php } ?>  