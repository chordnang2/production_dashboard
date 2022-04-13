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

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

 <script src="cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
 <script src="cdn.datatables.net/plug-ins/1.11.3/sorting/datetime-moment.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
 <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>

 <!-- Bootstrap -->
 <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- AdminLTE -->
 <script src="<?= base_url(); ?>assets/dist/js/adminlte.js"></script>

 <!-- OPTIONAL SCRIPTS -->
 <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <script src="<?= base_url(); ?>assets/dist/js/pages/dashboard3.js"></script>
 <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script> -->
 <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
 <script>

 </script>
 <script type="text/javascript">
     $(document).on('click', '.cycle_transaction_btn', function() {
         var unit = $(this).attr("unit");
         var idsatu = $(this).attr("idsatu");
         var iddua = $(this).attr("iddua");
         $.ajax({
             type: "POST",
             url: "<?php echo base_url() ?>Isi_geofence/ajax_CyleTransaction",
             data: {
                 unit: unit,
                 idsatu: idsatu,
                 iddua: iddua
             },
             success: function(result) {
                 if (result) {
                     $('#myModal .modal-content').html(result);
                     $('#myModal').modal("show");
                 }
             }
         });
     });
 </script>
 <script>
     $(document).ready(function() {
         $('#example').DataTable({
             dom: 'Bfrtip',
             buttons: [
                 'copy', 'csv', 'excel', 'pdf', 'print'
             ]
         });
     });
 </script>
 <script>
     $(document).ready(function() {
         $('#unitrunning').DataTable({});
     });
 </script>
 <script>
     $(document).ready(function() {
         $('#unitnotrunning').DataTable({});
     });
 </script>
 <script>
     $(document).ready(function() {
         $('#example2').DataTable({
             dom: 'Bfrtip',
             buttons: [
                 'copy', 'csv', 'excel', 'pdf', 'print'
             ]
         });
     });
 </script>
 <script>
     $(document).ready(function() {
         $('#example4').DataTable();
     });
 </script>