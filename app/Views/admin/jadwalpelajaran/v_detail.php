<section class="content-header">
     <h1>
          <a href="<?= base_url('jadwalpelajaran') ?>"><?= $title ?></a>
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
                         <tr>
                              <th>Tahun Akademik</th>
                              <th>: </th>
                              <th>
                                   <?= $ta_aktif['ta'] ?>/<?= $ta_aktif['semester'] ?>
                               </th>
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
                                   <th width="50px" class="text-center">No</th>
                                   <th class="text-center" width="50px">Semester</th>
                                   <th class="text-center">Kode Mapel</th>
                                   <th>Pelajaran</th>
                                   <th class="text-center">Kelas</th>
                                   <th class="text-center">Guru</th>
                                   <th class="text-center">Hari</th>
                                   <th class="text-center">Waktu</th>
                                   <th class="text-center">Ruangan</th>
                                   <th class="text-center">Quota</th>
                                   <th class="text-center" width="150px">Action</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php $no = 1;
                              foreach ($jadwal as $key => $value) { ?>
                                   <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td class="text-center"><?= $value['semester'] ?></td>
                                        <td class="text-center"><?= $value['kode_mapel'] ?></td>
                                        <td><?= $value['mapel'] ?></td>
                                        <td class="text-center"><?= $jurusan['kelas'] ?></td>
                                        <td><?= $value['nama_guru'] ?></td>
                                        <td class="text-center"><?= $value['hari'] ?></td>
                                        <td class="text-center"><?= $value['waktu'] ?></td>
                                        <td class="text-center"><?= $value['ruangan'] ?></td>
                                        <td class="text-center"><?= $value['quota'] ?></td>
                                        <td class="text-center">
                                        <a class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_jadwal'] ?>" ><i class="fa fa-trash"></i></a>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Tambah <?= $title ?></h4>
            </div>
            <div class="modal-body">
                <?php
                    echo form_open('jadwalpelajaran/add/'. $jurusan['id_jurusan']);
                ?>
                <div class="form-group">
                    <label>Mata Pelajaran</label>
                    <select name="id_mapel" class="form-control">
                         <option value="">--Pilih Mata Pelajaran--</option>
                         <?php  foreach ($mapel as $key => $value) { ?>
                              <option value="<?= $value['id_mapel'] ?>"><?= $value['semester'] ?> | <?= $value['mapel'] ?> | <?= $value['kode_mapel'] ?></option>
                         <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Guru</label>
                    <select name="id_guru" class="form-control">
                         <option value="">--Pilih Guru--</option>
                         

                    </select>
                </div>
                <div class="form-group">
                    <label>Kelas</label>
                    <select name="kelas" class="form-control">
                         <option value="">--Pilih Kelas--</option>
                         <?php foreach ($kelas as $key => $value) { ?>
                               <option value="<?= $value['id_kelas'] ?>"><?= $value['kelas'] ?>     </option>
                         <?php } ?> 
                    </select>
                </div>
                <div class="form-group">
                    <label>Semester</label>
                    <select name="semester" class="form-control">
                         <option value="">--Pilih Semester--</option>
                         <option value="Ganjil">Ganjil</option>
                         <option value="Genap">Genap</option>
                    </select>
                </div>

                    <div class="row"> 
                          <div class="col-sm-6">
                          <label>Hari</label>
                         <select name="semester" class="form-control">
                              <option value="">--Pilih Hari--</option>
                              <option value="Senin">Senin</option>
                              <option value="Selasa">Selasa</option>
                              <option value="Rabu">Rabu</option>
                              <option value="Kamis">Kamis</option>
                              <option value="Jumat">Jumat</option>
                              <option value="Sabtu">Sabtu</option>
                          </select>
                        </div>
                     <div class="col-sm-6">
                        <div class="form-group">  
                             <label>Waktu</label>
                             <input name="waktu" class="form-control" placeholder="Ex= 00:00-10:30"> 
                        </div>
                  </div>       
               </div>
                              
               <div class="row"> 
                          <div class="col-sm-6">
                          <label>Ruangan</label>
                         <select name="id_ruangan" class="form-control">
                              <option value="">--Pilih Ruang--</option>
                              <?php foreach ($ruangan as $key => $value) { ?>
                                   <option value="<?= $value['id_ruangan'] ?>"><?= $value['ruangan'] ?></option>
                             <?php } ?>
                          </select>
                        </div>
                     <div class="col-sm-6">
                        <div class="form-group">  
                             <label>Quota</label>
                             <input name="quota" class="form-control" placeholder="Quota"> 
                        </div>
                  </div>       
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
<?php foreach ($jadwal as $key => $value) { ?>
     <div class="modal fade" id="delete<?= $value['id_jadwal'] ?>">
          <div class="modal-dialog">
               <div class="modal-content">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                         <h4 class="modal-title">Hapus <?= $title ?></h4>
                    </div>
                    <div class="modal-body">
                         Apakah anda yakin ingin menghapus <b><?= $value['kode_mapel'] ?> | <?= $value['nama_guru'] ?></b>
                         
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                         <a href="<?= base_url('jadwalpelajaran/delete/' . $value['id_jadwal'] . '/' . $jurusan['id_jurusan']) ?>" class="btn btn-primary btn-flat">Hapus</a>
                    </div>
               </div>
               <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
     </div>
<?php } ?>

