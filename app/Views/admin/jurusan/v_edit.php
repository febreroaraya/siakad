<section class="content-header">
     <h1>
          <?= $title ?>
     </h1>
     <br>
</section>

<div class="row">
     <div class="col-sm-3">
     </div>
     <div class="col-sm-6">
          <div class="box box-primary box-solid">
               <div class="box-header with-border">
                    <h3 class="box-title"><?= $title ?></h3>

                    <div class="box-tools pull-right">

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
                    echo form_open('jurusan/update/' . $jurusan['id_jurusan']);
                    ?>
                    <div class="form-group">
                         <label>jurusan</label>
                         <select name="id_kelas" class="form-control">
                              <option value="<?= $jurusan['id_kelas'] ?>"><?= $jurusan['kelas'] ?></option>
                              <?php foreach ($kelas as $key => $value) { ?>
                                   <option value="<?= $value['id_kelas'] ?>"><?= $value['kelas'] ?></option>
                              <?php } ?>
                         </select>
                    </div>

                    <div class="form-group">
                         <label>Kode Jurusan</label>
                         <input name="kode_jurusan" value="<?= $jurusan['kode_jurusan'] ?>" class="form-control" placeholder="kode jurusan" readonly>
                    </div>

                    <div class="form-group">
                         <label>Jurusan</label>
                         <input name="jurusan" value="<?= $jurusan['jurusan'] ?>" class="form-control" placeholder="jurusan">
                    </div>

                    <div class="form-group">
                         <label>KA Jurusan</label>
                         <select name="ka_jurusan" class="form-control">
                              <option value="">Pilih KA Jurusan</option>
                              <?php foreach ($guru as $key => $value) { ?>
                             <option value="<?= $value['id_guru'] ?>"><?= $value['nama_guru'] ?></option>
                         <?php }  ?>

                          
                        </select>
                    </div>

               </div>

               <div class="modal-footer">
                    <a href="<?= base_url('jurusan') ?>" class="btn btn-default pull-left">Tutup</a>
                    <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
               </div>
               <?php
               echo form_close();
               ?>
               <!-- /.box -->
          </div>
          <div class="col-sm-3">
          </div>
     </div>