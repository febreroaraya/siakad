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
               echo form_open_multipart('siswa/update/' . $siswa['id_siswa']);
               ?>

          
                    <div class="col-sm-6">
                         <div class="form-group">
                              <label>NIS</label>
                              <input name="nis" value="<?= $siswa['nis'] ?>" class="form-control" placeholder="NIS">
                         </div>
                    </div>
               
                    <div class="col-sm-6">
                         <div class="form-group">
                              <label>Nama Siswa</label>
                              <input name="nama_siswa" value="<?= $siswa['nama_siswa'] ?>" class="form-control" placeholder="Nama Siswa">
                         </div>
                    </div>

                    <div class="form-group">
                         <label>Jurusan</label>
                         <select name="id_jurusan" class="form-control">
                              <option value="<?= $siswa['id_jurusan'] ?>"><?= $siswa['kode_jurusan'] ?>"</option>
                              <?php foreach ($jurusan as $key => $value) { ?>
                                   <option value="<?= $value['id_jurusan'] ?>"><?= $value['kode_jurusan'] ?></option>
                              <?php } ?>
                         </select>
                    </div>

                    <div class="form-group">
                         <label>Password</label>
                         <input name="password" value="<?= $siswa['password'] ?>" class="form-control" placeholder="Password">
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                             <img src="<?= base_url('fotosiswa/' . $siswa['foto_siswa']) ?>" id="gambar_load" width="100px">
                        </div>
                    </div>
          
                    <div class="col-sm-6">
                    <div class="form-group">
                         <label>Foto Siswa</label>
                         <input type="file" name="foto_siswa" id="preview_gambar" class="form-control">
                         </div>
                    </div>

               </div>
               <div class="modal-footer">
                    <a href="<?= base_url('siswa') ?>" class="btn btn-default pull-left">Tutup</a>
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