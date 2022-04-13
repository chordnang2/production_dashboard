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
 <script src="<?= base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <script src="<?= base_url(); ?>assets/dist/js/pages/dashboard3.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
 <script>
     var datadurasi = [
         <?php foreach ($sum_fms as $u) : ?> <?= ROUND($u->totdur_11 / 3600, 2) ?>,
         <?php endforeach; ?>

     ];
     var dataparkir = [
         <?php foreach ($sum_fms as $u) : ?> <?= ROUND($u->totparkir_11 / 3600, 2) ?>,
         <?php endforeach; ?>

     ];
     var dataloading = [
         <?php foreach ($sum_fms as $u) : ?> <?= ROUND($u->totload_11 / 3600, 2) ?>,
         <?php endforeach; ?>

     ];
     var datatipping = [
         <?php foreach ($sum_fms as $u) : ?> <?= ROUND($u->tottip_11 / 3600, 2) ?>,
         <?php endforeach; ?>

     ];
     var datatravel = [
         <?php foreach ($sum_fms as $u) : ?> <?= ROUND($u->tottrav_11 / 3600, 2) ?>,
         <?php endforeach; ?>

     ];
     var ctx = document.getElementById("avg_durasi");
     var config = {
         type: 'line',
         data: {
             labels: [
                 <?php foreach ($sum_fms as $u) : ?> "<?= $u->day_11 ?>",
                 <?php endforeach; ?>
             ],
             datasets: [{
                     label: "# Cycle Time",
                     data: datadurasi,
                     fill: false,
                     borderColor: "#FF0000",
                     datalabels: {
                         anchor: 'end',
                         align: 'start',
                         offset: 5,
                     },
                     borderWidth: 2,
                 },
                 {
                     label: "# Parkir",
                     data: dataparkir,
                     fill: false,
                     borderColor: "#FF8000",
                     datalabels: {
                         anchor: 'end',
                         align: 'start',
                         offset: 5,
                     },
                     borderWidth: 2,
                 },
                 {
                     label: "# Loading",
                     data: dataloading,
                     fill: false,
                     borderColor: "#8000FF",
                     datalabels: {
                         anchor: 'end',
                         align: 'start',
                         offset: 5,
                     },
                     borderWidth: 2,
                 },
                 {
                     label: "# Tipping",
                     data: datatipping,
                     fill: false,
                     borderColor: "#80FF00",
                     datalabels: {
                         anchor: 'end',
                         align: 'start',
                         offset: 5,
                     },
                     borderWidth: 2,
                 },
                 {
                     label: "# Travel",
                     data: datatravel,
                     fill: false,
                     borderColor: "#00FFFF",
                     datalabels: {
                         anchor: 'end',
                         align: 'start',
                         offset: 5,
                     },
                     borderWidth: 2,
                 }
             ]
         },
         options: {
             scales: {
                 yAxes: [{
                     stacked: false,
                     ticks: {
                         beginAtZero: true,
                     },

                 }],
                 xAxes: [{
                     stacked: true,
                     ticks: {
                         beginAtZero: true
                     }
                 }]

             },


         }
     };
     var forecast_chart = new Chart(ctx, config);
 </script>
 <script>
     var dataparkingbay = [
         <?php foreach ($sum_fms as $u) : ?> <?= ROUND($u->totparb_11 / 3600, 2) ?>,
         <?php endforeach; ?>

     ];
     var datapitstop = [
         <?php foreach ($sum_fms as $u) : ?> <?= ROUND($u->totppit_11 / 3600, 2) ?>,
         <?php endforeach; ?>

     ];
     var datarefueling = [
         <?php foreach ($sum_fms as $u) : ?> <?= ROUND($u->totref_11 / 3600, 2) ?>,
         <?php endforeach; ?>

     ];
     var datawb = [
         <?php foreach ($sum_fms as $u) : ?> <?= ROUND($u->totwb_11 / 3600, 2) ?>,
         <?php endforeach; ?>

     ];
     var dataworkshop = [
         <?php foreach ($sum_fms as $u) : ?> <?= ROUND($u->totwork_11 / 3600, 2) ?>,
         <?php endforeach; ?>

     ];
     var ctx = document.getElementById("avg_stb");
     var config = {
         type: 'line',
         data: {
             labels: [
                 <?php foreach ($sum_fms as $u) : ?> "<?= $u->day_11 ?>",
                 <?php endforeach; ?>
             ],
             datasets: [{
                     label: "# Parking Bay",
                     data: dataparkingbay,
                     fill: false,
                     borderColor: "#FF0000",
                     datalabels: {
                         anchor: 'end',
                         align: 'start',
                         offset: 5,
                     },
                     borderWidth: 2,
                 },
                 {
                     label: "# Pitstop",
                     data: datapitstop,
                     fill: false,
                     borderColor: "#FF8000",
                     datalabels: {
                         anchor: 'end',
                         align: 'start',
                         offset: 5,
                     },
                     borderWidth: 2,
                 },
                 {
                     label: "# Refueling",
                     data: datarefueling,
                     fill: false,
                     borderColor: "#8000FF",
                     datalabels: {
                         anchor: 'end',
                         align: 'start',
                         offset: 5,
                     },
                     borderWidth: 2,
                 },
                 {
                     label: "# Weighbridge",
                     data: datawb,
                     fill: false,
                     borderColor: "#80FF00",
                     datalabels: {
                         anchor: 'end',
                         align: 'start',
                         offset: 5,
                     },
                     borderWidth: 2,
                 },
                 {
                     label: "# Workshop",
                     data: dataworkshop,
                     fill: false,
                     borderColor: "#00FFFF",
                     datalabels: {
                         anchor: 'end',
                         align: 'start',
                         offset: 5,
                     },
                     borderWidth: 2,
                 }
             ]
         },
         options: {
             scales: {
                 yAxes: [{
                     stacked: false,
                     ticks: {
                         beginAtZero: true,
                     },

                 }],
                 xAxes: [{
                     stacked: true,
                     ticks: {
                         beginAtZero: true
                     }
                 }]

             },


         }
     };
     var forecast_chart = new Chart(ctx, config);
 </script>

 </body>

 </html>