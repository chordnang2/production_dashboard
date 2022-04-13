    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                <a href="<?php echo base_url('isi/data/add_opt') ?>"><i class="fas fa-plus"></i> Tambah Data Operator</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NRP</th>
                                <th>NAMA OPERATOR</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>NRP</th>
                                <th>NAMA OPERATOR</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($tbl_opt as $operator): ?>
                            <tr>
                                <td><?php echo $operator->nrp ?></td>
                                <td><?php echo $operator->nama_operator ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.co