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
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
               ?>

               <?php
               echo form_open_multipart('guru/insert');
               ?>

                    <div class="col-sm-6">
                         <div class="form-group">
                              <label>Kode Guru</label>
                              <input name="kode_guru" class="form-control" placeholder="Kode Guru">
                         </div>
                    </div>
          
                    <div class="col-sm-6">
                         <div class="form-group">
                              <label>NIP</label>
                              <input name="nip" class="form-control" placeholder="NIP">
                         </div>
                    </div>
               

                    <div class="form-group">
                         <label>Nama Guru</label>
                         <input name="nama_guru" class="form-control" placeholder="Nama Guru">
                    </div>

                    <div class="form-group">
                         <label>Password</label>
                         <input name="password" class="form-control" placeholder="Password">
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                             <img src="<?= base_url('fotoguru/default.png') ?>" id="gambar_load" width="100px">
                        </div>
                    </div>
          
                    <div class="col-sm-6">
                         <div class="form-group">
                              <label>Foto Guru</label>
                              <input type="file" name="foto_guru" id="preview_gambar" class="form-control">
                         </div>
                    </div>

               </div>
               <div class="modal-footer">
                    <a href="<?= base_url('guru') ?>" class="btn btn-default pull-left">Tutup</a>
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