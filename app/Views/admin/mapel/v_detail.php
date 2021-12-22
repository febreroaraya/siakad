<section class="content-header">
     <h1>
          <a href="<?= base_url('mapel') ?>"><?= $title ?></a>
          <small><?= $jurusan['jurusan'] ?></small>
     </h1>
     <br>
</section>


<div class="row">
     <div class="col-sm-12">
          <div class="box box-primary box-solid">
               <div class="box-header with-border">
                    <h3 class="box-title"><?= $title ?></h3>
                    <div class="box-tools pull-right">
                    </div>
                    <!-- /.box-tools -->
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                    <table class="table table-bordered">
                         <tr>
                              <th>kode Jurusan</th>
                              <th>: </th>
                              <th><?= $jurusan['kode_jurusan'] ?></th>
                         </tr>
                         <tr>
                              <th>jurusan</th>
                              <th>: </th>
                              <th><?= $jurusan['jurusan'] ?></th>
                         </tr>
                         </tr>
                         <tr>
                              <th>Kelas</th>
                              <th>: </th>
                              <th><?= $jurusan['kelas'] ?></th>
                         </tr>
                         </tr>
                    </table>
               </div>
               <!-- /.box-body -->
          </div>
          <!-- /.box -->
     </div>


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
                    <table class="table table-bordered table-striped">
                         <thead>
                              <tr>
                                   <th class="text-center" width="50px">No</th>
                                   <th class="text-center">Kode</th>
                                   <th class="text-center">Pelajaran</th>
                                   <th class="text-center">Kategori</th>
                                   <th class="text-center">Semester</th>
                                   <th class="text-center" width="150px">Action</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php $no = 1;
                              foreach ($mapel as $key => $value) { ?>
                                   <tr>
                                        <td><?= $no++ ?></td>
                                        <td class="text-center"><?= $value['kode_mapel'] ?></td>
                                        <td class="text-center"><?= $value['mapel'] ?></td>
                                        <td class="text-center"><?= $value['kategori'] ?></td>
                                        <td class="text-center"><?= $value['semester'] ?></td>
                                        <td class="text-center"> <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_mapel'] ?>"><i class="fa fa-trash"></i></button></td>
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
                    echo form_open('mapel/add/'. $jurusan['id_jurusan']);
                ?>
                <div class="form-group">
                    <label>Kode</label>
                    <input name="kode_mapel" class="form-control" placeholder="kode Mata Pelajaran">
                </div>

                <div class="form-group">
                    <label>Mata Pelajaran</label>
                    <input name="mapel" class="form-control" placeholder="Mata Pelajaran">
                </div>

                <div class="form-group">
                    <label>Semester</label>
                    <select name="semester" class="form-control">
                         <option value="">--Pilih Semester--</option>
                         <option value="Ganjil">Ganjil</option>
                         <option value="Genap">Genap</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori" class="form-control">
                         <option value="">--Pilih Kategori--</option>
                         <option value="wajib">wajib</option>
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
<?php foreach ($mapel as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_mapel'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Hapus <?= $title ?></h4>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus <b><?= $value['mapel'] ?> ?</b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                <a href="<?= base_url('mapel/delete/'. $jurusan['id_jurusan'] . '/' . $value['id_mapel']) ?>" class="btn btn-primary btn-flat">Hapus</a>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
<?php } ?>