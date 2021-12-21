<section class="content-header">
     <h1>
          <?= $title ?>
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
                                        <td class="text-center"> <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_gedung'] ?>"><i class="fa fa-trash"></i></button></td>
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