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
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
 <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
 <!-- jQuery -->
 <!-- <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script> -->
 <!-- Bootstrap -->
 <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- AdminLTE -->
 <script src="<?= base_url(); ?>assets/dist/js/adminlte.js"></script>
 <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
 <!-- OPTIONAL SCRIPTS -->
 <!-- <script src="<?= base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script> -->
 <!-- AdminLTE for demo purposes -->
 <script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <script src="<?= base_url(); ?>assets/dist/js/pages/dashboard3.js"></script>
 <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script> -->
 <!-- <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script> -->
 <!-- <script src="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script> -->
 <!-- <script src="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
 <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

 <script>
     Chart.register(ChartDataLabels);
     let minDataValue = Math.min(mostNegativeValue, options.suggestedMin);
     let maxDataValue = Math.max(mostPositiveValue, options.suggestedMax);
 </script>
 <script>
     $(document).ready(function() {
         $('table.display').DataTable();
     });
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
     var ctx = document.getElementById('tonhm');
     var myChart = new Chart(ctx, {
         type: 'bar',

         data: {
             labels: [
                 <?php foreach ($getdetailtonhmvolvo as $a) : ?> "<?= $a->unit ?>",
                 <?php endforeach; ?>
             ],
             datasets: [{
                 label: 'Unproduktif Unit Ton/HM',
                 data: [
                     <?php foreach ($getdetailtonhmvolvo as $a) : ?> "<?= $a->tonbagihm ?>",
                     <?php endforeach; ?>
                 ],
                 backgroundColor: [
                     'white',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)',
                     'rgba(153, 102, 255, 0.2)',
                     'rgba(255, 159, 64, 0.2)'
                 ],
                 borderColor: [
                     'rgba(255, 99, 132, 1)',
                     'rgba(54, 162, 235, 1)',
                     'rgba(255, 206, 86, 1)',
                     'rgba(75, 192, 192, 1)',
                     'rgba(153, 102, 255, 1)',
                     'rgba(255, 159, 64, 1)'
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
         options: {


             indexAxis: 'y',
             responsive: true,
             scales: {
                 x: {
                     min: 25,
                     max: 39,
                     beginAtZero: false,

                 },
                 y: {
                     max: 20,
                     beginAtZero: false,

                 },


             },

         }
     });
 </script>
 <script>
     var ctx = document.getElementById('sumton');
     var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
             labels: [
                 <?php foreach ($getdetailtonvolvo as $a) : ?> "<?= $a->unit ?>",
                 <?php endforeach; ?>
             ],
             datasets: [{
                 label: 'Grafik Total Ton limit 20 unit',
                 data: [
                     <?php foreach ($getdetailtonvolvo as $a) : ?> "<?= $a->ton ?>",
                     <?php endforeach; ?>
                 ],
                 backgroundColor: [
                     'white',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)',
                     'rgba(153, 102, 255, 0.2)',
                     'rgba(255, 159, 64, 0.2)'
                 ],
                 borderColor: [
                     'rgba(255, 99, 132, 1)',
                     'rgba(54, 162, 235, 1)',
                     'rgba(255, 206, 86, 1)',
                     'rgba(75, 192, 192, 1)',
                     'rgba(153, 102, 255, 1)',
                     'rgba(255, 159, 64, 1)'
                 ],
                 datalabels: {
                     anchor: 'end',
                     align: 'start',
                     offset: 2,
                     backgroundColor: 'white'
                 },
                 borderWidth: 1
             }]
         },
         options: {
             indexAxis: 'y',
             responsive: true,
             scales: {
                 y: {
                     beginAtZero: true
                 }
             }
         }
     });
 </script>
 <script>
     var ctx = document.getElementById('totaltrip');
     var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
             labels: [
                 <?php foreach ($getdetailtripvolvo_graph as $a) : ?> "<?= $a->unit ?>",
                 <?php endforeach; ?>
             ],
             datasets: [{
                 label: 'grafik Total Trip limit 20 unit',
                 data: [
                     <?php foreach ($getdetailtripvolvo_graph as $a) : ?> "<?= $a->trip ?>",
                     <?php endforeach; ?>
                 ],
                 backgroundColor: [
                     'white',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)',
                     'rgba(153, 102, 255, 0.2)',
                     'rgba(255, 159, 64, 0.2)'
                 ],
                 borderColor: [
                     'rgba(255, 99, 132, 1)',
                     'rgba(54, 162, 235, 1)',
                     'rgba(255, 206, 86, 1)',
                     'rgba(75, 192, 192, 1)',
                     'rgba(153, 102, 255, 1)',
                     'rgba(255, 159, 64, 1)'
                 ],
                 datalabels: {
                     anchor: 'end',
                     align: 'start',
                     offset: 2,
                     backgroundColor: 'white'
                 },
                 borderWidth: 1
             }]
         },
         options: {
             responsive: true,
             scales: {
                 x: {
                     beginAtZero: false,

                 },
                 y: {
                     beginAtZero: true
                 }
             }
         }
     });
 </script>
 <script>
     var ctx = document.getElementById('avgton');
     var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
             labels: [
                 <?php foreach ($detailavgton as $a) : ?> "<?= $a->unit ?>",
                 <?php endforeach; ?>
             ],
             datasets: [{
                 label: 'grafik jumlah underload',
                 data: [
                     <?php foreach ($detailavgton as $a) : ?> "<?= $a->underload ?>",
                     <?php endforeach; ?>
                 ],
                 backgroundColor: [
                     'white',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)',
                     'rgba(153, 102, 255, 0.2)',
                     'rgba(255, 159, 64, 0.2)'
                 ],
                 borderColor: [
                     'rgba(255, 99, 132, 1)',
                     'rgba(54, 162, 235, 1)',
                     'rgba(255, 206, 86, 1)',
                     'rgba(75, 192, 192, 1)',
                     'rgba(153, 102, 255, 1)',
                     'rgba(255, 159, 64, 1)'
                 ],
                 datalabels: {
                     anchor: 'end',
                     align: 'start',
                     offset: 2,
                     backgroundColor: 'white'
                 },
                 borderWidth: 1
             }]
         },
         options: {
             scales: {
                 y: {
                     beginAtZero: false,
                     min: 0.5
                 },

             }
         }
     });
 </script>
 <script>
     var ctx = document.getElementById('bd');
     var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
             labels: [
                 <?php foreach ($detail_total_bd as $a) : ?> "<?= $a->unit ?>",
                 <?php endforeach; ?>
             ],
             datasets: [{
                 label: 'grafik total jam breakdown',
                 data: [
                     <?php foreach ($detail_total_bd as $a) : ?> "<?= number_format($a->bd, 2, '.', ' ') ?>",
                     <?php endforeach; ?>
                 ],
                 backgroundColor: [
                     'white',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)',
                     'rgba(153, 102, 255, 0.2)',
                     'rgba(255, 159, 64, 0.2)'
                 ],
                 borderColor: [
                     'rgba(255, 99, 132, 1)',
                     'rgba(54, 162, 235, 1)',
                     'rgba(255, 206, 86, 1)',
                     'rgba(75, 192, 192, 1)',
                     'rgba(153, 102, 255, 1)',
                     'rgba(255, 159, 64, 1)'
                 ],
                 datalabels: {
                     anchor: 'end',
                     align: 'start',
                     offset: 2,
                     backgroundColor: 'white'
                 },
                 borderWidth: 1
             }]
         },
         options: {
             scales: {
                 y: {
                     beginAtZero: true
                 }
             }
         }
     });
 </script>
 <script>
     var ctx = document.getElementById('hm');
     var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
             labels: [
                 <?php foreach ($detail_total_hm as $a) : ?> "<?= $a->unit ?>",
                 <?php endforeach; ?>
             ],
             datasets: [{
                 label: 'grafik total hm',
                 data: [
                     <?php foreach ($detail_total_hm as $a) : ?> "<?= $a->hm ?>",
                     <?php endforeach; ?>
                 ],
                 backgroundColor: [
                     'white',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)',
                     'rgba(153, 102, 255, 0.2)',
                     'rgba(255, 159, 64, 0.2)'
                 ],
                 borderColor: [
                     'rgba(255, 99, 132, 1)',
                     'rgba(54, 162, 235, 1)',
                     'rgba(255, 206, 86, 1)',
                     'rgba(75, 192, 192, 1)',
                     'rgba(153, 102, 255, 1)',
                     'rgba(255, 159, 64, 1)'
                 ],
                 datalabels: {
                     anchor: 'end',
                     align: 'start',
                     offset: 2,
                     backgroundColor: 'white'
                 },
                 borderWidth: 1
             }]
         },
         options: {
             scales: {
                 y: {
                     beginAtZero: true
                 }
             }
         }
     });
 </script>
 <!-- <script>
     var ctx = document.getElementById('');
     var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
             labels: [
                 <?php foreach ($detail_avg_pa as $a) : ?> "<?= $a->unit ?>",
                 <?php endforeach; ?>
             ],
             datasets: [{
                 label: 'grafik PA unit',
                 data: [
                     <?php foreach ($detail_avg_pa as $a) : ?> "<?= $a->pa ?>",
                     <?php endforeach; ?>
                 ],
                 backgroundColor: [
                     'white',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)',
                     'rgba(153, 102, 255, 0.2)',
                     'rgba(255, 159, 64, 0.2)'
                 ],
                 borderColor: [
                     'rgba(255, 99, 132, 1)',
                     'rgba(54, 162, 235, 1)',
                     'rgba(255, 206, 86, 1)',
                     'rgba(75, 192, 192, 1)',
                     'rgba(153, 102, 255, 1)',
                     'rgba(255, 159, 64, 1)'
                 ],

                 datalabels: {
                     anchor: 'end',
                     align: 'start',
                     offset: 5,
                     backgroundColor: 'white'
                 },
                 responsive: true,
             }]

         },
         options: {
             responsive: true,
             scales: {
                 x: {

                     beginAtZero: false,

                 },
                 y: {
                     min: 69,
                     max: 87,
                     beginAtZero: false,

                 },
             },

         }

     });
 </script> -->
 <script>
     var ctx = document.getElementById('pa');
     var myChart = new Chart(ctx, {
         type: 'bar',

         data: {
             labels: [
                 <?php foreach ($detail_avg_pa_graph as $a) : ?> "<?= $a->unit ?>",
                 <?php endforeach; ?>
             ],
             datasets: [{
                 label: 'Unproduktif PA',
                 data: [
                     <?php foreach ($detail_avg_pa_graph as $a) : ?> "<?= $a->paa ?>",
                     <?php endforeach; ?>
                 ],
                 backgroundColor: [
                     'white',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)',
                     'rgba(153, 102, 255, 0.2)',
                     'rgba(255, 159, 64, 0.2)'
                 ],
                 borderColor: [
                     'rgba(255, 99, 132, 1)',
                     'rgba(54, 162, 235, 1)',
                     'rgba(255, 206, 86, 1)',
                     'rgba(75, 192, 192, 1)',
                     'rgba(153, 102, 255, 1)',
                     'rgba(255, 159, 64, 1)'
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
         options: {
             responsive: true,
             scales: {
                 x: {
                     beginAtZero: false,
                 },
                 y: {

                     beginAtZero: false,

                 },
             },

         }
     });
 </script>
 <script>
     var ctx = document.getElementById('ua');
     var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
             labels: [
                 <?php foreach ($detail_avg_ua as $a) : ?> "<?= $a->unit ?>",
                 <?php endforeach; ?>
             ],
             datasets: [{
                 label: 'Unproduktif UA',
                 data: [
                     <?php foreach ($detail_avg_ua as $a) : ?> "<?= $a->ua ?>",
                     <?php endforeach; ?>
                 ],
                 backgroundColor: [
                     'white',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)',
                     'rgba(153, 102, 255, 0.2)',
                     'rgba(255, 159, 64, 0.2)'
                 ],
                 borderColor: [
                     'rgba(255, 99, 132, 1)',
                     'rgba(54, 162, 235, 1)',
                     'rgba(255, 206, 86, 1)',
                     'rgba(75, 192, 192, 1)',
                     'rgba(153, 102, 255, 1)',
                     'rgba(255, 159, 64, 1)'
                 ],
                 datalabels: {
                     anchor: 'end',
                     align: 'start',
                     offset: 2,
                     backgroundColor: 'white'
                 },
                 borderWidth: 1
             }]
         },
         options: {
             scales: {
                 y: {
                     beginAtZero: true
                 }
             }
         }
     });
 </script>
 <script>
     var ctx = document.getElementById('cycle');
     var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
             labels: [
                 <?php foreach ($detail_avg_cyle_time as $a) : ?> "<?= $a->unit ?>",
                 <?php endforeach; ?>
             ],
             datasets: [{
                 label: 'grafik cycle time > 4.8 jam',
                 data: [
                     <?php foreach ($detail_avg_cyle_time as $a) : ?> "<?= $a->avg_cycle_time ?>",
                     <?php endforeach; ?>
                 ],
                 backgroundColor: [
                     'white',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)',
                     'rgba(153, 102, 255, 0.2)',
                     'rgba(255, 159, 64, 0.2)'
                 ],
                 borderColor: [
                     'rgba(255, 99, 132, 1)',
                     'rgba(54, 162, 235, 1)',
                     'rgba(255, 206, 86, 1)',
                     'rgba(75, 192, 192, 1)',
                     'rgba(153, 102, 255, 1)',
                     'rgba(255, 159, 64, 1)'
                 ],
                 datalabels: {
                     anchor: 'end',
                     align: 'start',
                     offset: 2,
                     backgroundColor: 'white'
                 },
                 borderWidth: 1
             }]
         },
         options: {
             scales: {
                 y: {
                     beginAtZero: true
                 }
             }
         }
     });
 </script>
 <script>
     var ctx = document.getElementById('travel');
     var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
             labels: [
                 <?php foreach ($detail_avg_travel_time as $a) : ?> "<?= $a->unit ?>",
                 <?php endforeach; ?>
             ],
             datasets: [{
                 label: 'grafik travel time >4.00 jam',
                 data: [
                     <?php foreach ($detail_avg_travel_time as $a) : ?> "<?= $a->avg_travel_time ?>",
                     <?php endforeach; ?>
                 ],
                 backgroundColor: [
                     'white',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)',
                     'rgba(153, 102, 255, 0.2)',
                     'rgba(255, 159, 64, 0.2)'
                 ],
                 borderColor: [
                     'rgba(255, 99, 132, 1)',
                     'rgba(54, 162, 235, 1)',
                     'rgba(255, 206, 86, 1)',
                     'rgba(75, 192, 192, 1)',
                     'rgba(153, 102, 255, 1)',
                     'rgba(255, 159, 64, 1)'
                 ],
                 datalabels: {
                     anchor: 'end',
                     align: 'start',
                     offset: 2,
                     backgroundColor: 'white'
                 },
                 borderWidth: 1
             }]
         },
         options: {
             scales: {
                 y: {
                     beginAtZero: true
                 }
             }
         }
     });
 </script>
 <script>
     var ctx = document.getElementById('stb');
     var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
             labels: [
                 <?php foreach ($detail_avg_stb as $a) : ?> "<?= $a->unit ?>",
                 <?php endforeach; ?>
             ],
             datasets: [{
                 label: 'grafik ton/hm 20 unit',
                 data: [
                     <?php foreach ($detail_avg_stb as $a) : ?> "<?= $a->total_stb ?>",
                     <?php endforeach; ?>
                 ],
                 backgroundColor: [
                     'white',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)',
                     'rgba(153, 102, 255, 0.2)',
                     'rgba(255, 159, 64, 0.2)'
                 ],
                 borderColor: [
                     'rgba(255, 99, 132, 1)',
                     'rgba(54, 162, 235, 1)',
                     'rgba(255, 206, 86, 1)',
                     'rgba(75, 192, 192, 1)',
                     'rgba(153, 102, 255, 1)',
                     'rgba(255, 159, 64, 1)'
                 ],
                 datalabels: {
                     anchor: 'end',
                     align: 'start',
                     offset: 2,
                     backgroundColor: 'white'
                 },
                 borderWidth: 1
             }]
         },
         options: {
             scales: {
                 y: {
                     beginAtZero: true
                 }
             }
         }
     });
 </script>
 <script>
     var ctx = document.getElementById('bd2');
     var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
             labels: [
                 <?php foreach ($detail_avg_bd as $a) : ?> "<?= $a->unit ?>",
                 <?php endforeach; ?>
             ],
             datasets: [{
                 label: 'grafik ton/hm 20 unit',
                 data: [
                     <?php foreach ($detail_avg_bd as $a) : ?> "<?= $a->total_bd ?>",
                     <?php endforeach; ?>
                 ],
                 backgroundColor: [
                     'white',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)',
                     'rgba(153, 102, 255, 0.2)',
                     'rgba(255, 159, 64, 0.2)'
                 ],
                 borderColor: [
                     'rgba(255, 99, 132, 1)',
                     'rgba(54, 162, 235, 1)',
                     'rgba(255, 206, 86, 1)',
                     'rgba(75, 192, 192, 1)',
                     'rgba(153, 102, 255, 1)',
                     'rgba(255, 159, 64, 1)'
                 ],
                 datalabels: {
                     anchor: 'end',
                     align: 'start',
                     offset: 2,
                     backgroundColor: 'white'
                 },
                 borderWidth: 1
             }]
         },
         options: {
             scales: {
                 y: {
                     beginAtZero: true
                 }
             }
         }
     });
 </script>
 <script>
     var ctx = document.getElementById('');
     var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
             labels: [
                 <?php foreach ($getdetailtonhmvolvo as $a) : ?> "<?= $a->unit ?>",
                 <?php endforeach; ?>
             ],
             datasets: [{
                 label: 'grafik ton/hm 20 unit',
                 data: [
                     <?php foreach ($getdetailtonhmvolvo as $a) : ?> "<?= $a->tonbagihm ?>",
                     <?php endforeach; ?>
                 ],
                 backgroundColor: [
                     'white',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)',
                     'rgba(153, 102, 255, 0.2)',
                     'rgba(255, 159, 64, 0.2)'
                 ],
                 borderColor: [
                     'rgba(255, 99, 132, 1)',
                     'rgba(54, 162, 235, 1)',
                     'rgba(255, 206, 86, 1)',
                     'rgba(75, 192, 192, 1)',
                     'rgba(153, 102, 255, 1)',
                     'rgba(255, 159, 64, 1)'
                 ],
                 datalabels: {
                     anchor: 'end',
                     align: 'start',
                     offset: 2,
                     backgroundColor: 'white'
                 },
                 borderWidth: 1
             }]
         },
         options: {
             scales: {
                 y: {
                     beginAtZero: true
                 }
             }
         }
     });
 </script>





 </body>

 </html>