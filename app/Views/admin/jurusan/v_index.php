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
                         <a href="<?= base_url('jurusan/add') ?>" class="btn btn-box-tool"><i class="fa fa-plus"></i> Tambah</a>
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
                                   <th>Kelas</th>
                                   <th>Kode Jurusan</th>
                                   <th>Jurusan</th>
                                   <th class="text-center" width="150px">Action</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php $no = 1;
                              foreach ($jurusan as $key => $value) { ?>
                                   <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td><b><?= $value['kelas'] ?></b></td>
                                        <td><?= $value['kode_jurusan'] ?></td>
                                        <td><?= $value['jurusan'] ?></td>
                                        <td class="text-center">
                                             <a href="<?= base_url('jurusan/edit/' . $value['id_jurusan']) ?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil"></i></a>
                                             <a href="<?= base_url('jurusan/delete/' . $value['id_jurusan']) ?>" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i></a>


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