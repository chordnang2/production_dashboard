<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple Serverside Datatable Codeigniter Custom Filter</title>
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 style="font-size:20pt">DATA PRODUKTIFITAS OPERATOR</h1>
            </div>
            <div class="col-md-4">
                <a href="<?php echo site_url('isi_timbangan/produksiperjam') ?>">
                    <h1 style="font-size:20pt" align="right">KEMBALI</h1>
                </a>
            </div>
        </div>

        <!-- <h3>Customers Data</h3> -->
        <br>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"> Filter Data : </h3>
            </div>
            <div class="panel-body">
                <form id="form-filter" class="form-horizontal">
                    <div class="form-group">
                        <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
                        <div class="col-sm-4">
                            <?php echo $tanggal_tpl; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nrp" class="col-sm-2 control-label">NRP</label>
                        <div class="col-sm-4">
                            <?php echo $nrp_tpl; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="trip" class="col-sm-2 control-label">TRIP</label>
                        <div class="col-sm-4">
                            <?php echo $trip_tpl; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="location" class="col-sm-2 control-label">Location</label>
                        <div class="col-sm-4">
                            <textarea class="form-control" id="location"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="LastName" class="col-sm-2 control-label"></label>
                        <div class="col-sm-4">
                            <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
                            <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>NRP</th>
                    <th>Trip</th>
                    <th>Lcoation</th>
                    <th>Shift</th>
                    <th>Unit</th>
                    <th>Hm Unit</th>
                    <th>Jam Trip</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ayam as $bd) : ?>
                    <tr>
                        <?php $no++ ?>
                        <td><?php echo $no ?></td>
                        <td><?php echo $bd->tanggal ?></td>
                        <td><?php echo $bd->trip ?></td>
                        <td><?php echo $bd->location ?></td>
                        <td><?php echo $bd->shift ?></td>
                        <td><?php echo $bd->unit ?></td>
                        <td><?php echo $bd->hm_unit ?></td>
                        <td><?php echo $bd->a ?></td>
                        <td><?php echo $bd->keterangan ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>NRP</th>
                    <th>Trip</th>
                    <th>Lcoation</th>
                    <th>Shift</th>
                    <th>Unit</th>
                    <th>Hm Unit</th>
                    <th>Jam Trip</th>
                    <th>Keterangan</th>
                </tr>
            </tfoot>
        </table>
        <!-- <?php var_dump($data);
                print_r($data); ?> -->
    </div>

    <script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.min.js') ?>"></script>


    <!-- <script type="text/javascript">
        var table;

        $(document).ready(function() {

            //datatables
            table = $('#table').DataTable({

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.

                // Load data for the table's content from an Ajax source
                "ajax": {
                    // "url": "<?php echo site_url('analisa_opt/ajax_list') ?>",
                    "type": "POST",
                    "data": function(data) {
                        data.tanggal = $('#tanggal').val();
                        data.nrp = $('#nrp').val();
                        data.trip = $('#trip').val();
                        data.location = $('#location').val();
                        // data.location = $('#shift').val();
                        // data.location = $('#unit').val();
                        // data.location = $('#hm_unit').val();
                        // data.location = $('#jam_trip').val();
                        // data.location = $('#keterangan').val();
                    }
                },

                //Set column definition initialisation properties.
                "columnDefs": [{
                    "targets": [0], //first column / numbering column
                    "orderable": false, //set not orderable
                }, ],

            });

            $('#btn-filter').click(function() { //button filter event click
                table.ajax.reload(); //just reload table
            });
            $('#btn-reset').click(function() { //button reset event click
                $('#form-filter')[0].reset();
                table.ajax.reload(); //just reload table
            });

        });
    </script> -->

</body>

</html>