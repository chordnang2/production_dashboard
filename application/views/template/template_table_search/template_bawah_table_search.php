 <!-- Main Footer -->
 <footer class="main-footer">
 <strong>Copyright &copy; 2021 <a href="#">Departemen Produksi</a>.</strong>
   All rights reserved.
   <div class="float-right d-none d-sm-inline-block">
     <b>Version</b> 3.1.0
   </div>
 </footer>
 </div>
 <!-- ./wrapper -->

 <!-- REQUIRED SCRIPTS -->

 <!-- jQuery -->
 <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap 4 -->
 <!-- <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
 <!-- DataTables  & Plugins -->
 <script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
 <!-- <script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script> -->
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
 <script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js') ?>"></script>

 <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
 <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
 <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.min.js') ?>"></script>
 <!-- AdminLTE App -->
 <script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
 <!-- Page specific script -->

 <script type="text/javascript">
        var table;

        $(document).ready(function() {

            //datatables
            table = $('#table').DataTable({

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.

                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('analisa_opt/ajax_list') ?>",
                    "type": "POST",
                    "data": function(data) {
                        data.tanggal = $('#tanggal').val();
                        data.nrp = $('#nrp').val();
                        data.trip = $('#trip').val();
                        data.location = $('#location').val();
                        data.location = $('#shift').val();
                        data.location = $('#unit').val();
                        data.location = $('#hm_unit').val();
                        data.location = $('#jam_trip').val();
                        data.location = $('#keterangan').val();
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
    </script>
 </body>

 </html>