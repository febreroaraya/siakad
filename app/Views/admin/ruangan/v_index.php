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
                         <a href="<?= base_url('ruangan/add') ?>" class="btn btn-box-tool"><i class="fa fa-plus"></i> Tambah</a>
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
                                   <th>Gedung</th>
                                   <th>Ruangan</th>
                                   <th class="text-center" width="150px">Action</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php $no = 1;
                              foreach ($ruangan as $key => $value) { ?>
                                   <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td><?= $value['gedung'] ?></td>
                                        <td><?= $value['ruangan'] ?></td>
                                        <td class="text-center">
                                             <a href="<?= base_url('ruangan/edit/' . $value['id_ruangan']) ?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil"></i></a>
                                             <a href="<?= base_url('ruangan/delete/' . $value['id_ruangan']) ?>" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i></a>


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

<!-- Modal Delete -->
<?php foreach ($ruangan as $key => $value) { ?>
     <div class="modal fade" id="delete<?= $value['id_ruangan'] ?>">
          <div class="modal-dialog">
               <div class="modal-content">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                         <h4 class="modal-title">Hapus <?= $title ?></h4>
                    </div>
                    <div class="modal-body">
                         Apakah anda yakin ingin menghapus <b><?= $value['ruangan'] ?> ?</b>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                         <a href="<?= base_url('ruangan/delete/' . $value['id_ruangan']) ?>" class="btn btn-primary btn-flat">Hapus</a>
                    </div>
               </div>
               <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
     </div>
<?php } ?>