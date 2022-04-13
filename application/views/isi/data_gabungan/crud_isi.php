<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Modal</h1>
        </div>
    </div>

    <?php
    $data = $this->session->flashdata('sukses');
    if ($data != "") { ?>
        <div id="notifikasi" class="alert alert-success"><strong>Sukses! </strong> <?= $data; ?></div>
    <?php } ?>

    <?php
    $data2 = $this->session->flashdata('error');
    if ($data2 != "") { ?>
        <div id="notifikasi" class="alert alert-danger"><strong> Error! </strong> <?= $data2; ?></div>
    <?php } ?>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus-circle"></i> Tambah </button>

            <hr>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-table"></i> Data Modal
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>NIK</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($all as $row) : ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row->tanggal; ?></td>
                                    <td><?php echo $row->nik_day; ?></td>
                                    <td>
                                        <center>
                                            <div class="tooltip-demo">
                                                <a data-toggle="modal" data-target="#modal-edit<?= $row->id; ?>" class="btn btn-warning btn-circle" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                                <a href="<?php echo site_url('Hm_controller/hapus/' . $row->id); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $row->tanggal; ?> ?');" class="btn btn-danger btn-circle" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </center>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>


    <div id="modal-tambah" class="modal fade">
        <div class="modal-dialog">
            <form action="<?php echo site_url('Hm_controller/add'); ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Tambah Data</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label class='col-md-3'>Modal</label>
                            <div class='col-md-9'><input type="text" name="tanggal" autocomplete="off" required placeholder="Masukkan Tanggal" class="form-control"></div>
                            <div class='col-md-9'><input type="text" name="nik_day" autocomplete="off" required placeholder="Masukkan NIK" class="form-control"></div>
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><i class="icon-checkmark-circle2"></i> Simpan</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<!-- /#page-wrapper -->

<?php $no = 0;
foreach ($all as $row) : $no++; ?>
    <div class="row">
        <div id="modal-edit<?= $row->id; ?>" class="modal fade">
            <div class="modal-dialog">
                <form action="<?php echo site_url('Hm_controller/edit'); ?>" method="post">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Data</h4>
                        </div>
                        <div class="modal-body">

                            <input type="hidden" readonly value="<?= $row->id; ?>" name="id" class="form-control">

                            <div class="form-group">
                                <label class='col-md-3'>Modal</label>
                                <div class='col-md-9'><input type="text" name="tanggal" autocomplete="off" value="<?= $row->tanggal; ?>" required placeholder="Masukkan Tanggal" class="form-control"></div>
                                <div class='col-md-9'><input type="text" name="nik_day" autocomplete="off" value="<?= $row->nik_day; ?>" required placeholder="Masukkan NIK" class="form-control"></div>
                            </div>
                            <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i> Edit</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>