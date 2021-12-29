<section class="content-header">
     <h1>
          <?= $title ?>
     </h1>
     <br>
</section>

<div class="row">
     <div class="col-sm-12">
          <div class="box box-primary box-solid">
               <!-- /.box-header -->
               <div class="box-body">
                    <table class="table table-bordered table-striped">
                         <thead>
                              <tr>
                                   <th class="text-center" width="50px">No</th>
                                   <th>Kelas</th>
                                   <th>Kode Jurusan</th>
                                   <th>Jurusan</th>
                                   <th>Mata Pelajaran</th>
                                   <th class="text-center" width="150px">Action</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php
                              $db = \Config\Database::connect();
                              $no = 1;
                              foreach ($jurusan as $key => $value) {
                                   $jml = $db->table('tb_mapel')
                                        ->where('id_jurusan', $value['id_jurusan'])
                                        ->countAllResults();
                              ?>
                                   <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td><b><?= $value['kelas'] ?></b></td>
                                        <td><?= $value['kode_jurusan'] ?></td>
                                        <td><?= $value['jurusan'] ?></td>
                                        <td class="text-center">
                                             <p class="label text-center bg-green"><?= $jml ?></p>
                                        </td>
                                        <td class="text-center">
                                             <a href="<?= base_url('mapel/detail/' . $value['id_jurusan']) ?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-th-list"></i> Mapel</a>

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