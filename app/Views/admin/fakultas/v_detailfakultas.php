<section class="content-header">
    <h1>
        <?= $title ?> :  <label class="text-primary"><?= $fakultas['fakultas'] ?></label>
    </h1>
    <br>
</section>

<div class="row">
    <div class="col-sm-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $title ?> <label><?= $fakultas['fakultas'] ?></label></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Tambah</button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                    <table class="table">
                        <tr>
                            <th width="150px">Golongan</th>
                            <th width="30px">:</th>
                            <td width="200px"><?= $fakultas['fakultas'] ?></td>
                            <th width="150px">Angkatan</th>
                            <th width="30px">:</th>
                            <td><?= $fakultas['tahun_angkatan'] ?></td>
                        </tr>
                        <tr>
                            <th>Jurusan</th>
                            <th>:</th>
                            <td><?= $fakultas['jurusan'] ?></td>
                            <th>Jumlah</th>
                            <th>:</th>
                            <td><?= $jml ?></td>
                        </tr>
                    </table>


                <?php

                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
                ?>

                <table class="table table-bordered">
                        <tr>
                            <th class="text-center label-primary" width="50px">NO</th>
                            <th class="text-center label-primary" width="100px">NIS</th>
                            <th class="label-primary">Nama Siswa</th>
                            <th class="text-center label-primary" width="50px">Action</th>
                        </tr> 
                        <?php $no = 1;
                        foreach ($siswa as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $value['nis'] ?></td>
                            <td><?= $value['nama_siswa'] ?></td>
                            <td class="text-center">
                                
                                    <a href="<?= base_url('fakultas/delete_siswa/'. $value['id_siswa']. '/' . $fakultas['id_fakultas']) ?>" class="btn btn-danger btn-flat btn-xs">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    
                            </td>
                        </tr>   
                        <?php } ?>                           
                </table>
                
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Siswa</h4>
            </div>
            <div class="modal-body">
                <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" width="30px">No</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Jurusan</th>
                            <th width="30px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1;
                        foreach ($golongan_siswa as $key => $value) { ?>
                            <?php if ($fakultas['id_jurusan'] == $value['id_jurusan']) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value['nis'] ?></td>
                                    <td><?= $value['nama_siswa'] ?></td>
                                    <td><?= $value['kode_jurusan'] ?></td>
                                    <td class="text-center">
                                        
                                            <a href="<?= base_url('fakultas/add_siswa/'. $value['id_siswa']. '/' . $fakultas['id_fakultas']) ?>" class="btn btn-success btn-xs">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                        </tbody>
                </table>
            </div>
            
        </div>
    <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>