<section class="content-header">
    <h1>
        <?= $title ?> :  <label class="text-success"><?= $fakultas['fakultas'] ?></label>
    </h1>
    <br>
</section>

<div class="row">
    <div class="col-sm-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data <?= $title ?> <label><?= $fakultas['fakultas'] ?></label></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Tambah</button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                    <table class="table">
                        <tr>
                            <th width="150px">Fakultas</th>
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
                            <td></td>
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
                            <th>NO</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Action</th>
                        </tr> 
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>                              
                </table>
                
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>