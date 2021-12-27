<section class="content-header">
     <h1>
          <?= $title ?> Tahun Akademik : <?= $ta_aktif['ta'] ?>/<?= $ta_aktif['semester'] ?>
     </h1>
     <br>
</section>

<div class="row">
     <div class="col-sm-12">
          <div class="box box-primary box-solid">
               <div class="box-header with-border">
                    <h3 class="box-title">Data <?= $title ?></h3>
                    <div class="box-tools pull-right">
                    </div>
                    <!-- /.box-tools -->
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                    <table class="table table-bordered table-striped">
                         <thead>
                              <tr>
                                   <th class="text-center" width="50px">No</th>
                                   <th class="text-center">Kelas</th>
                                   <th class="text-center">Kode Jurusan</th>
                                   <th class="text-center">Jurusan</th>
                                   <th class="text-center" width="150px">Jadwal</th>
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
                                            <a href= "<?= base_url('jadwalpelajaran/detailjadwal/'.$value['id_jurusan']) ?>"class="btn btn-success btn-flat btn-sm"><i class="fa fa-calendar"></i></a>
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