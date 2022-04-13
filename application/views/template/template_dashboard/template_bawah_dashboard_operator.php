 <!-- Main Footer -->
 <footer class="main-footer">
 <strong>Copyright &copy; 2021 <a href="#">Departemen Produksi</a>.</strong>
     All rights reserved.
     <div class="float-right d-none d-sm-inline-block">
         <b>Version</b> 1
     </div>
 </footer>
 </div>
 <!-- ./wrapper -->

 <!-- REQUIRED SCRIPTS -->

 <!-- jQuery -->
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
 <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
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
 <!-- <script src="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script> -->
 <!-- <script src="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
 <script>
     Chart.register(ChartDataLabels);
     let minDataValue = Math.min(mostNegativeValue, options.suggestedMin);
     let maxDataValue = Math.max(mostPositiveValue, options.suggestedMax);
 </script>
 <script>
     var el = document.documentElement,
         rfs = // for newer Webkit and Firefox
         el.requestFullscreen ||
         el.webkitRequestFullScreen ||
         el.mozRequestFullScreen ||
         el.msRequestFullscreen;
     if (typeof rfs != "undefined" && rfs) {
         rfs.call(el);
     } else if (typeof window.ActiveXObject != "undefined") {
         // for Internet Explorer
         var wscript = new ActiveXObject("WScript.Shell");
         if (wscript != null) {
             wscript.SendKeys("{F11}");
         }
     }
 </script>
 <script>
     $(document).ready(function() {
         $('#example').DataTable();
     });
 </script>
 <script>
     $(document).ready(function() {
         $('#example2').DataTable();
     });
 </script>
 <script>
     var ctx = document.getElementById('counthm');
     var myChart = new Chart(ctx, {
         type: 'bar',

         data: {
             labels: [
                 <?php foreach ($detail_count_hm_daily as $a) : ?> "<?= $a->a ?>",
                 <?php endforeach; ?>
             ],
             datasets: [{
                 label: 'Count RItase Daily',
                 data: [
                     <?php foreach ($detail_count_hm_daily as $a) : ?> "<?= $a->count ?>",
                     <?php endforeach; ?>
                 ],
                 backgroundColor: [
                     'red',
                     'blue',
                     'green',
                     'yellow',
                     'purple',
                     'gray',
                     'black',
                     'brown'
                 ],

                 datalabels: {
                     anchor: 'end',
                     align: 'end',
                     offset: 2,
                     backgroundColor: 'white',

                 },
                 borderWidth: 1,


             }]
         },
     });
 </script>
 <script>
     var ctx = document.getElementById('counttrip');
     var myChart = new Chart(ctx, {
         type: 'bar',

         data: {
             labels: [
                 <?php foreach ($detail_count_trip_daily as $a) : ?> "<?= $a->a ?>",
                 <?php endforeach; ?>
             ],
             datasets: [{
                 label: 'Count Trip Daily',
                 data: [
                     <?php foreach ($detail_count_trip_daily as $a) : ?> "<?= $a->count ?>",
                     <?php endforeach; ?>
                 ],
                 backgroundColor: [
                     'red',
                     'blue',
                     'green',
                     'yellow',
                     'purple',
                     'gray',
                     'black',
                     'brown'
                 ],

                 datalabels: {
                     anchor: 'end',
                     align: 'end',
                     offset: 2,
                     backgroundColor: 'white',

                 },
                 borderWidth: 1,


             }]
         },
     });
 </script>



 </body>

 </html>