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
                    <h3 class="box-title">Data <?= $title ?></h3>

                    <div class="box-tools pull-right">
                         <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Tambah</button>
                    </div>
                    <!-- /.box-tools -->
               </div>
               <!-- /.box-header -->
               <div class="box-body">
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
                                   <th>Tahun Akademik</th>
                                   <th>Semester</th>
                                   <th class="text-center" width="150px">Action</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php $no = 1;
                              foreach ($Ta as $key => $value) { ?>
                                   <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td><?= $value['ta'] ?></td>
                                        <td><?= $value['semester'] ?></td>
                                        <td class="text-center">
                                             <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit<?= $value['id_ta'] ?>"><i class="fa fa-pencil"></i></button>
                                             <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_ta'] ?>"><i class="fa fa-trash"></i></button>
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
                    echo form_open('ta/add');
                    ?>
                    <div class="form-group">
                         <label>Tahun Akademik</label>
                         <input name="ta" class="form-control" placeholder="EX: 2021/2022" required>
                    </div>

                    <div class="form-group">
                         <label>Semester</label>
                         <select name="semester" class="form-control">
                              <option value="Ganjil">Ganjil</option>
                              <option value="Genap">Genap</option>
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


<!-- Modal Edit -->
<?php foreach ($Ta as $key => $value) { ?>
     <div class="modal fade" id="edit<?= $value['id_ta'] ?>">
          <div class="modal-dialog modal-sm">
               <div class="modal-content">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                         <h4 class="modal-title">Edit <?= $title ?></h4>
                    </div>
                    <div class="modal-body">
                         <?php
                         echo form_open('ta/edit/' . $value['id_ta']);
                         ?>
                         <div class="form-group">
                              <label>Tahun Akademik</label>
                              <input name="ta" value="<?= $value['ta'] ?>" class="form-control" placeholder="Tahun Akademik" required>
                         </div>

                         <div class="form-group">
                              <label>Semester</label>
                              <select name="semester" class="form-control">
                                   <option value="Ganjil" <?php if ($value['semester'] == 'Ganjil') {
                                                                 echo 'Selected';
                                                            } ?>>Ganjil</option>
                                   <option value="Genap" <?php if ($value['semester'] == 'Ganap') {
                                                                 echo 'Selected';
                                                            } ?>>Genap</option>
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
<?php } ?>


<!-- Modal Delete -->
<?php foreach ($Ta as $key => $value) { ?>
     <div class="modal fade" id="delete<?= $value['id_ta'] ?>">
          <div class="modal-dialog">
               <div class="modal-content">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                         <h4 class="modal-title">Hapus <?= $title ?></h4>
                    </div>
                    <div class="modal-body">
                         Apakah anda yakin ingin menghapus <b><?= $value['ta'] ?><?= $value['semester'] ?> ?</b>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                         <a href="<?= base_url('ta/delete/' . $value['id_ta']) ?>" class="btn btn-primary btn-flat">Hapus</a>
                    </div>
               </div>
               <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
     </div>
<?php } ?>