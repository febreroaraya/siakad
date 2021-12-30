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
                    <a href="<?= base_url('guru/add') ?>" class="btn btn-box-tool"><i class="fa fa-plus"></i> Tambah</a>
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
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" width="50px">No</th>
                            <th>Kode Guru</th>
                            <th>NIP</th>
                            <th>Nama Guru</th>
                            <th>Password</th>
                            <th>Foto</th>
                            <th class="text-center" width="150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($guru as $key => $value) { ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $value['kode_guru'] ?></td>
                                <td><?= $value['nip'] ?></td>
                                <td><?= $value['nama_guru'] ?></td>
                                <td><?= $value['password'] ?></td>
                                <td class="text-center"><img src="<?= base_url('fotoguru/' . $value['foto_guru']) ?>" class="img-circle" width="60px" height="60px"></td>
                                <td class="text-center">
                                    <a href="<?= base_url('guru/edit/' . $value['id_guru']) ?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil"></i></a>
                                    <a href="<?= base_url('guru/delete/' . $value['id_guru']) ?>" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i></a>
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