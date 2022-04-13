<!-- /.navbar -->
<style>

</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <!-- <div class="card-header"> -->
                        <!-- <h1 class="page-header">Modal</h1> -->
                        <!-- </div> -->
                        <?php date_default_timezone_set('Asia/Singapore');
                        $t = strtotime("today");
                        $y = strtotime("yesterday");
                        $hariini = date("Y-m-d", $t);
                        $kemaren = date("Y-m-d", $y);
                        ?>
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">

                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus-circle"></i> Tambah </button>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-stb_bd"><i class="fa fa-plus-circle"></i> STB & BD </button>

                                    <hr>

                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <i class="fa fa-table"></i> Data HM
                                        </div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <table width="100%" class="table table-striped table-bordered table-hover" id="example3">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tanggal</th>
                                                        <th>NIK</th>
                                                        <th>Shift</th>
                                                        <th>Nama OPT</th>
                                                        <th>Ritase</th>
                                                        <th>Unit</th>
                                                        <th>HM unit Awal</th>
                                                        <th>HM unit Akhir</th>
                                                        <th>HM Unit</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1;
                                                    foreach ($all as $row) : ?>
                                                        <tr class="odd gradeX">
                                                            <td><?php echo $no++; ?></td>
                                                            <td><?php echo $row->tanggal; ?></td>
                                                            <td><?php echo $row->nik; ?></td>
                                                            <td><?php echo $row->shift; ?></td>
                                                            <td><?php echo $row->nama; ?></td>
                                                            <td><?php echo $row->ritase; ?></td>
                                                            <td><?php echo $row->unit; ?></td>
                                                            <td><?php echo $row->hmawal; ?></td>
                                                            <td><?php echo $row->hmakhir; ?></td>
                                                            <td><?php echo $row->hmunit; ?></td>
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
                                                <tfoot>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tanggal</th>
                                                        <th>NIK</th>
                                                        <th>Shift</th>
                                                        <th>Nama OPT</th>
                                                        <th>Ritase</th>
                                                        <th>Unit</th>
                                                        <th>HM unit Awal</th>
                                                        <th>HM unit Akhir</th>
                                                        <th>HM Unit</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </tfoot>
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
                                    <!-- <form action="<?php echo site_url('Hm_controller/add'); ?>" method="post"> -->
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h4 class="modal-title">Tambah Data HM</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class='col-md-9'><input type="text" name="tanggal" autocomplete="off" required placeholder="Masukkan Tanggal" class="form-control" value="<?= $kemaren ?>"></div>
                                                <div class='col-md-9'><input type="text" name="nik" id="nrp2" autocomplete="off" required placeholder="Masukkan NIK Operator" class="form-control"></div>
                                                <div class='col-md-9'><select name="shift" class="form-control">>
                                                        <option value="DS">DS</option>
                                                        <option value="NS">NS</option>
                                                    </select></div>
                                                <div class='col-md-9'><input type="text" name="ritase" autocomplete="off" required placeholder="Masukkan Ritase contoh = 1.5" class="form-control"></div>
                                                <div class='col-md-9'><input type="text" name="unit" autocomplete="off" required placeholder="Masukkan Unit" class="form-control"></div>
                                                <div class='col-md-9'><input type="text" name="hmawal" autocomplete="off" required placeholder="Masukkan HM unit Awal" class="form-control"></div>
                                                <div class='col-md-9'><input type="text" name="hmakhir" autocomplete="off" required placeholder="Masukkan HM unit Akhir" class="form-control"></div>
                                                <div class='col-md-9'><input type="text" name="nama" id="nama_operator2" autocomplete="off" required placeholder="Nama Otomatis" class="form-control"></div>
                                                <div class='col-md-9'><input type="text" name="hmunit" autocomplete="off" required placeholder="HM Otomatis" class="form-control"></div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary"><i class="icon-checkmark-circle2"></i> Simpan</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="modal-stb_bd" class="modal fade">
                                <div class="modal-dialog modal-lg">
                                    <!-- <form action="<?php echo site_url('Hm_controller/add'); ?>" method="post"> -->
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h4 class="modal-title">Tambah Data HM</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="t1_0" onchange="formatCells(this.value,'t1')"></td>
                                                        <td><input type="text" name="t1_1"></td>
                                                        <td><input type="text" name="t1_2"></td>
                                                        <td><input type="text" name="t1_3"></td>
                                                        <td><input type="text" name="t1_4"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t2_0" onchange="formatCells(this.value,'t2')"></td>
                                                        <td><input type="text" name="t2_1"></td>
                                                        <td><input type="text" name="t2_2"></td>
                                                        <td><input type="text" name="t2_3"></td>
                                                        <td><input type="text" name="t2_4"></td>
                                                    </tr>
                                                </table>
                                            </form>
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
                                                        <h4 class="modal-title">Edit Data</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <input type="hidden" readonly value="<?= $row->id; ?>" name="id" class="form-control">

                                                        <div class="form-group">
                                                            <label class='col-md-3'>Modal</label>
                                                            <div class='col-md-9'><input type="text" name="tanggal" autocomplete="off" value="<?= $row->tanggal; ?>" required placeholder="Edit Tanggal" class="form-control"></div>
                                                            <div class='col-md-9'><input type="text" name="nik" id="nrp" autocomplete="off" value="<?= $row->nik; ?>" required placeholder="Edit NIK" class="form-control"></div>
                                                            <div class='col-md-9'><select name="shift" class="form-control">
                                                                    <?php if ($row->nik = DS) {
                                                                            $shift = "NS";
                                                                        } else {
                                                                            $shift = "DS";
                                                                        }
                                                                        ?>
                                                                    <option value="DS"><?= $row->nik ?></option>
                                                                    <option value="NS"><?= $shift ?></option>
                                                                </select></div>
                                                            <div class='col-md-9'><input type="text" name="nama" id="nama_operator" autocomplete="off" value="<?= $row->nama; ?>" required placeholder="Edit Nama" class="form-control"></div>
                                                            <div class='col-md-9'><input type="text" name="ritase" autocomplete="off" value="<?= $row->ritase; ?>" required placeholder="Edit Ritase" class="form-control"></div>
                                                            <div class='col-md-9'><input type="text" name="unit" autocomplete="off" value="<?= $row->unit; ?>" required placeholder="Edit Unit" class="form-control"></div>
                                                            <div class='col-md-9'><input type="text" name="hmawal" autocomplete="off" value="<?= $row->hmawal; ?>" required placeholder="Edit HM Awal" class="form-control"></div>
                                                            <div class='col-md-9'><input type="text" name="hmakhir" autocomplete="off" value="<?= $row->hmakhir; ?>" required placeholder="Edit HM Akhir" class="form-control"></div>
                                                            <div class='col-md-9'><input type="text" name="hmunit" autocomplete="off" value="<?= $row->hmunit; ?>" required placeholder="Edit HM" class="form-control"></div>
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
                        </div>

                    </div>
                </div>
            </div>
    </section>
</div>
<!-- Main Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0
    </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<script>
    $(document).ready(function() {
        $('.nik').select2();
    });
</script>
<script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "paging": true,
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "scrollX": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $("#example3").DataTable({
            "paging": true,
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "scrollX": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<!-- <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script> -->
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('change', '#nrp', function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('Hm_controller/get_nik_nama') ?>",
                data: {
                    nrp: $(this).val(),

                },
                success: function(data) {
                    var jsonx = JSON.parse(data);
                    $("#nrp").val(jsonx["0"]['nrp'])
                    $("#nama_operator").val(jsonx["0"]['nama_operator'])
                }
            })
        });

        // $(document).on('change', '#nama_operator', function(e) {
        //     var val = $(this).val();
        //     var nrp = $("#nrp").val();
        // });

    });
    $(document).ready(function() {
        $(document).on('change', '#nrp2', function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('Hm_controller/get_nik_nama2') ?>",
                data: {
                    nrp2: $(this).val(),

                },
                success: function(data) {
                    var jsonx = JSON.parse(data);
                    $("#nrp2").val(jsonx["0"]['nrp2'])
                    $("#nama_operator2").val(jsonx["0"]['nama_operator2'])
                }
            })
        });

        // $(document).on('change', '#nama_operator', function(e) {
        //     var val = $(this).val();
        //     var nrp = $("#nrp").val();
        // });

    });
</script>
<script type="text/javascript">
    function formatCells(xls, group) {
        var arrGroup = xls.split(/\t/gi);
        for (var i = 0; i < arrGroup.length; i++) {
            document.forms[0].elements[group + "_" + i].value = arrGroup[i];
        }
    }
</script>


</body>

</html>