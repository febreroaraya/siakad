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
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Jurusan</th>
                            <th>Password</th>
                            <th>Foto</th>
                            <th class="text-center" width="150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>