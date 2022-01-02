<section class="content-header">
     <h1>
          <a href="<?= base_url('jadwalpelajaran') ?>"><?= $title ?></a>
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
                              <th>Kode Jurusan</th>
                              <th>: </th>
                              <th><?= $jurusan['kode_jurusan'] ?></th>
                         </tr>
                         <tr>
                              <th>Jurusan</th>
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
                                   <th class="text-center">Golongan</th>
                                   <th class="text-center">Guru</th>
                                   <th class="text-center">Hari</th>
                                   <th class="text-center">Waktu</th>
                                   <th class="text-center">Ruang</th>
                                   <th class="text-center">Quota</th>
                                   <th class="text-center" width="150px">Action</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php $no = 1;
                              foreach ($jadwal as $key => $value) { ?>
                                   <tr>
                                        <td><?= $no++ ?></td>
                                        <td class="text-center"><?= $value['semester'] ?></td>
                                        <td class="text-center"><?= $value['kode_mapel'] ?></td>
                                        <td><?= $value['mapel'] ?></td>
                                        <td class="text-center"><?= $value['fakultas'] ?> - <?= $value['tahun_angkatan'] ?></td>
                                        <td><?= $value['nama_guru'] ?></td>
                                        <td class="text-center"><?= $value['hari'] ?></td>
                                        <td class="text-center"><?= $value['waktu'] ?></td>
                                        <td class="text-center"><?= $value['ruangan'] ?></td>
                                        <td class="text-center"><?= $value['quota'] ?></td>
                                        <td class="text-center"></td>
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
                         <?php foreach ($mapel as $key => $value) { ?>
                              <option value="<?= $value['id_mapel'] ?>"><?= $value['semester'] ?> | <?= $value['kode_mapel'] ?> | <?= $value['mapel'] ?></option>
                         <?php } ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <label>Guru</label>
                    <select name="id_guru" class="form-control">
                         <option value="">--Pilih Guru--</option>
                         <?php foreach ($guru as $key => $value) { ?>
                              <option value="<?= $value['id_guru'] ?>"><?= $value['nama_guru'] ?></option>
                         <?php } ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <label>Golongan</label>
                    <select name="id_fakultas" class="form-control">
                         <option value="">--Pilih Fakultas--</option>
                         <?php foreach ($golongan as $key => $value) { ?>
                              <option value="<?= $value['id_fakultas'] ?>"><?= $value['fakultas'] ?> | <?= $value['tahun_angkatan'] ?></option>
                         <?php } ?>
                    </select>
                    </div>
                    <div class="row">
                         <div class="col-sm-6">
                              <div class="form-group">
                                   <label>Hari</label>
                                   <select name="hari" class="form-control">
                                        <option value="">--Pilih Hari--</option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                   </select>
                              </div>
                         </div>
                         <div class="col-sm-6">
                              <div class="form-group">
                                   <label>Waktu</label>
                                   <input name="waktu" placeholder="Ex = 07:00-09:00" class="form-control" required>
                              </div>
                         </div>
                    </div>

                    <div class="row">
                         <div class="col-sm-6">
                              <div class="form-group">
                                   <label>Ruangan</label>
                                   <select name="id_ruangan" class="form-control">
                                        <option value="">--Pilih Ruangan--</option>
                                        <?php foreach ($ruangan as $key => $value) { ?>
                                             <option value="<?= $value['id_ruangan'] ?>"><?= $value['ruangan'] ?></option>
                                        <?php } ?>
                                   </select>
                              </div>
                         </div>
                         <div class="col-sm-6">
                              <div class="form-group">
                                   <label>Quota</label>
                                   <input name="quota" placeholder="Quota" class="form-control" required>
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





