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
                    <a href="<?= base_url('siswa/add') ?>" class="btn btn-box-tool"><i class="fa fa-plus"></i> Tambah</a>
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
                            <th class="text-center">NIS</th>
                            <th class="text-center">Nama Siswa</th>
                            <th class="text-center">Jurusan</th>
                            <th class="text-center">Password</th>
                            <th class="text-center">Foto</th>
                            <th class="text-center" width="150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($siswa as $key => $value) { ?>
                           <tr>
                               <td><?= $no++ ?></td>
                               <td class="text-center"><?= $value['nis'] ?></td>
                               <td><?= $value['nama_siswa'] ?></td>
                               <td class="text-center"><?= $value['jurusan'] ?></td>
                               <td><?= $value['password'] ?></td>
                               <td class="text-center"><img src="<?= base_url('fotosiswa/' . $value['foto_siswa']) ?>" class="img-circle" width="60px" height="60px"></td>
                               <td class="text-center">
                                    <a href="<?= base_url('siswa/edit/' . $value['id_siswa']) ?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_siswa'] ?>"><i class="fa fa-trash"></i></a>
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
<?php foreach ($siswa as $key => $value) { ?>
     <div class="modal fade" id="delete<?= $value['id_siswa'] ?>">
          <div class="modal-dialog">
               <div class="modal-content">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                         <h4 class="modal-title">Hapus <?= $title ?></h4>
                    </div>
                    <div class="modal-body">
                         Apakah anda yakin ingin menghapus <b><?= $value['nama_siswa'] ?> ?</b>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                         <a href="<?= base_url('siswa/delete/' . $value['id_siswa']) ?>" class="btn btn-primary btn-flat">Hapus</a>
                    </div>
               </div>
               <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
     </div>
<?php } ?>
