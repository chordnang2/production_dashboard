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
 <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script> -->
 <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
 <!-- <script src="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script> -->
 <!-- <script src="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
 <script>
     var ctx = document.getElementById("netmonthly");
     var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
             labels: [
                 //  "January",
                 //  "February",
                 //  "March",
                 //  "April",
                 //  "May",
                 //  "Juni",
                 //  "July",
                 //  "August",
                 <?php foreach ($sbg as $u) : ?> "<?= $u->month ?>",
                 <?php endforeach; ?>
             ],
             datasets: [{
                 label: '# Produksi Bulanan',
                 yAxisID: 'A',
                 data: [
                     //  1212153, , , , , , , ,
                     <?php foreach ($sbg as $u) : ?> <?= $u->sum ?>,
                     <?php endforeach; ?>

                 ],
                 backgroundColor: [
                     'rgba(255, 99, 132, 0.2)',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)',
                     'rgba(153, 102, 255, 0.2)',
                     'rgba(255, 159, 64, 0.2)',
                     'rgba(255, 99, 132, 0.2)',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)',
                     'rgba(153, 102, 255, 0.2)',
                     'rgba(255, 159, 64, 0.2)'
                 ],
                 borderColor: [

                 ],
                 datalabels: {
                     anchor: 'end',
                     align: 'end',

                     borderWidth: 1
                 },
                 borderWidth: 2
             }, ]
         },
         options: {
             scales: {
                 yAxes: [{
                     id: 'B',
                     stacked: true,
                     ticks: {
                         beginAtZero: true,


                     },

                 }, {
                     id: 'A',
                     stacked: true,

                     position: 'right',

                 }],
                 xAxes: [{
                     stacked: true,
                     ticks: {
                         beginAtZero: true
                     }
                 }]

             },


         }
     });
 </script>
 <script>
     var databulan = [
         <?php foreach ($shg as $u) : ?> <?= $u->sumokt ?>,
         <?php endforeach; ?>

     ];
     var datalabel = '# Oktober';
     var ctx = document.getElementById("sumharian");
     var config = {
         type: 'line',
         data: {
             labels: [
                 <?php foreach ($shg as $u) : ?> "<?= $u->dayjan ?>",
                 <?php endforeach; ?>
             ],
             datasets: [{
                 label: datalabel,
                 data: databulan,
                 pointHoverBackgroundColor: 'orange',
                 pointHoverBorderColor: 'orange',
                 backgroundColor: 'transparent',
                 borderColor: [
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 159, 64, 1)'
                 ],
                 datalabels: {
                     anchor: 'end',
                     align: 'start',
                     offset: 5,
                 },
                 borderWidth: 2,
             }]
         },
     };
     var forecast_chart = new Chart(ctx, config);
     $("#1").click(function() {
         var data = forecast_chart.config.data;
         data.datasets[0].data = databulan;
         data.datasets[0].label = datalabel;
         forecast_chart.update();
     });
     $("#2").click(function() {

         var databulan = [
             <?php foreach ($shg as $u) : ?> <?= $u->sumfeb ?>,
             <?php endforeach; ?>

         ];
         var datalabel = '# Februari';
         var data = forecast_chart.config.data;
         data.datasets[0].data = databulan;
         data.datasets[0].label = datalabel;
         forecast_chart.update();
     });
     $("#3").click(function() {

         var databulan = [
             <?php foreach ($shg as $u) : ?> <?= $u->summar ?>,
             <?php endforeach; ?>

         ];
         var datalabel = '# Maret';
         var data = forecast_chart.config.data;
         data.datasets[0].data = databulan;
         data.datasets[0].label = datalabel;
         forecast_chart.update();
     });
     $("#4").click(function() {

         var databulan = [
             <?php foreach ($shg as $u) : ?> <?= $u->sumapr ?>,
             <?php endforeach; ?>

         ];
         var datalabel = '# April';
         var data = forecast_chart.config.data;
         data.datasets[0].data = databulan;
         data.datasets[0].label = datalabel;
         forecast_chart.update();
     });
     $("#5").click(function() {

         var databulan = [
             <?php foreach ($shg as $u) : ?> <?= $u->summei ?>,
             <?php endforeach; ?>

         ];
         var datalabel = '# Mei';
         var data = forecast_chart.config.data;
         data.datasets[0].data = databulan;
         data.datasets[0].label = datalabel;
         forecast_chart.update();
     });
     $("#6").click(function() {

         var databulan = [
             <?php foreach ($shg as $u) : ?> <?= $u->sumjun ?>,
             <?php endforeach; ?>

         ];
         var datalabel = '# Juni';
         var data = forecast_chart.config.data;
         data.datasets[0].data = databulan;
         data.datasets[0].label = datalabel;
         forecast_chart.update();
     });
     $("#7").click(function() {

         var databulan = [
             <?php foreach ($shg as $u) : ?> <?= $u->sumjul ?>,
             <?php endforeach; ?>

         ];
         var datalabel = '# Juli';
         var data = forecast_chart.config.data;
         data.datasets[0].data = databulan;
         data.datasets[0].label = datalabel;
         forecast_chart.update();
     });
     $("#8").click(function() {

         var databulan = [
             <?php foreach ($shg as $u) : ?> <?= $u->sumagu ?>,
             <?php endforeach; ?>

         ];
         var datalabel = '# Agustus';
         var data = forecast_chart.config.data;
         data.datasets[0].data = databulan;
         data.datasets[0].label = datalabel;
         forecast_chart.update();
     });
     $("#9").click(function() {

         var databulan = [
             <?php foreach ($shg as $u) : ?> <?= $u->sumsep ?>,
             <?php endforeach; ?>

         ];
         var datalabel = '# September';
         var data = forecast_chart.config.data;
         data.datasets[0].data = databulan;
         data.datasets[0].label = datalabel;
         forecast_chart.update();
     });
     $("#10").click(function() {

         var databulan = [
             <?php foreach ($shg as $u) : ?> <?= $u->sumokt ?>,
             <?php endforeach; ?>

         ];
         var datalabel = '# Oktober';
         var data = forecast_chart.config.data;
         data.datasets[0].data = databulan;
         data.datasets[0].label = datalabel;
         forecast_chart.update();
     });
     $("#11").click(function() {

         var databulan = [
             <?php foreach ($shg as $u) : ?> <?= $u->sumnov ?>,
             <?php endforeach; ?>

         ];
         var datalabel = '# November';
         var data = forecast_chart.config.data;
         data.datasets[0].data = databulan;
         data.datasets[0].label = datalabel;
         forecast_chart.update();
     });
     $("#12").click(function() {

         var databulan = [
             <?php foreach ($shg as $u) : ?> <?= $u->sumdes ?>,
             <?php endforeach; ?>

         ];
         var datalabel = '# Desember';
         var data = forecast_chart.config.data;
         data.datasets[0].data = databulan;
         data.datasets[0].label = datalabel;
         forecast_chart.update();
     });
 </script>

 </body>

 </html>