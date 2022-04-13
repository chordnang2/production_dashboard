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
 <script src="<?= base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
 <!-- <script src="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script> -->
 <!-- <script src="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
 <script>
     $('.toastsDefaultDefault').click(function() {
         $(document).Toasts('create', {
             title: 'Toast Title',
             body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
         })
     });
     $('.toastsDefaultInfo').click(function() {
         $(document).Toasts('create', {
             class: 'bg-info',
             title: 'INFORMASI UPDATE DATA',
             body: 'Senyiur: <?= $a[0]->date; ?><br> Gunungsari: <?= $b[0]->date; ?><br>Dispatch: <?= $c[0]->date; ?><br> FMS: <?= $d[0]->date; ?><br> HM: <?= $e[0]->date; ?><br>Highlight: <?= $f[0]->date; ?><br> DMBD: <?= $g[0]->date; ?>'
         })
     });
 </script>
 <script>
     $(document).ready(function() {
         $('table.display').DataTable();
     });

     $('body,html').bind('scroll mousedown wheel DOMMouseScroll mousewheel keyup', function(e) {
         if (e.which > 0 || e.type == "mousedown" || e.type == "mousewheel") {
             $("html,body").stop();
         }
     });

     function scroll(speed) {
         $('html, body').animate({
             scrollTop: $(document).height() - $(window).height()
         }, speed, function() {
             $(this).animate({
                 scrollTop: 0
             }, speed);
         });
     }


     speed = 70000;

     scroll(speed)
     setInterval(function() {
         scroll(speed)
     }, speed * 2);
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
     $(function() {
         //new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));
         new Chart(document.getElementById("bar_chartsatu").getContext("2d"), getChartJs('bar'));
         //new Chart(document.getElementById("radar_chart").getContext("2d"), getChartJs('radar'));
         //new Chart(document.getElementById("pie_chart").getContext("2d"), getChartJs('pie'));


         function getChartJs(type) {
             var config = null;

             if (type === 'bar') {
                 config = {
                     type: 'bar',
                     data: {
                         labels: ["06:00 - 10:00", "10:00 - 14:00", "14:00 - 17:00", "17:00 - 18:00"],
                         datasets: [{
                                 label: "NO SET VESSEL",
                                 data: [
                                     <?= $get_unit_nosetvessel6[0]->no ?>,
                                     <?= $get_unit_nosetvessel10[0]->no ?>,
                                     <?= $get_unit_nosetvessel14[0]->no ?>,
                                     <?= $get_unit_nosetvessel17[0]->no ?>
                                 ],
                                 backgroundColor: 'rgba(240, 240, 214, 1)'
                             },
                             {
                                 label: "B/D",
                                 data: [
                                     <?= $get_unit_bd6[0]->no ?>,
                                     <?= $get_unit_bd10[0]->no ?>,
                                     <?= $get_unit_bd14[0]->no ?>,
                                     <?= $get_unit_bd17[0]->no ?>
                                 ],
                                 backgroundColor: 'rgba(246, 36, 89, 1)'
                             },
                             {
                                 label: "SERVICE",
                                 data: [
                                     <?= $get_unit_service6[0]->no ?>,
                                     <?= $get_unit_service10[0]->no ?>,
                                     <?= $get_unit_service14[0]->no ?>,
                                     <?= $get_unit_service17[0]->no ?>
                                 ],
                                 backgroundColor: 'rgba(240, 255, 0, 1)'
                             },
                             {
                                 label: "RUNNING",
                                 data: [
                                     <?= $get_unit_running[0]->no - $get_unit_nosetvessel6[0]->no - $get_unit_bd6[0]->no - $get_unit_service6[0]->no - $get_unit_stb6[0]->no - $get_unit_accident6[0]->no  ?>,
                                     <?= $get_unit_running[0]->no - $get_unit_nosetvessel10[0]->no - $get_unit_bd10[0]->no - $get_unit_service10[0]->no - $get_unit_stb10[0]->no - $get_unit_accident10[0]->no  ?>,
                                     <?= $get_unit_running[0]->no - $get_unit_nosetvessel14[0]->no - $get_unit_bd14[0]->no - $get_unit_service14[0]->no - $get_unit_stb14[0]->no - $get_unit_accident14[0]->no  ?>,
                                     <?= $get_unit_running[0]->no - $get_unit_nosetvessel17[0]->no - $get_unit_bd17[0]->no - $get_unit_service17[0]->no - $get_unit_stb17[0]->no - $get_unit_accident17[0]->no  ?>,
                                 ],
                                 backgroundColor: 'rgba(0, 230, 64, 1)'
                             },
                             {
                                 label: "STANDBY READY",
                                 data: [
                                     <?= $get_unit_stb6[0]->no ?>,
                                     <?= $get_unit_stb10[0]->no ?>,
                                     <?= $get_unit_stb14[0]->no ?>,
                                     <?= $get_unit_stb17[0]->no ?>
                                 ],
                                 backgroundColor: 'rgba(78, 205, 196, 1)'
                             },
                             {
                                 label: "ACCIDENT",
                                 data: [
                                     <?= $get_unit_accident6[0]->no ?>,
                                     <?= $get_unit_accident10[0]->no ?>,
                                     <?= $get_unit_accident14[0]->no ?>,
                                     <?= $get_unit_accident17[0]->no ?>
                                 ],
                                 backgroundColor: 'rgba(232, 236, 241, 1)'
                             },
                             {
                                 label: "TOTAL",
                                 data: [
                                     <?= $get_unit_running[0]->no ?>,
                                     <?= $get_unit_running[0]->no ?>,
                                     <?= $get_unit_running[0]->no ?>,
                                     <?= $get_unit_running[0]->no ?>
                                 ],
                                 backgroundColor: 'rgba(236, 236, 236, 1) '
                             }
                         ]
                     },
                     options: {
                         responsive: true,
                         options: {
                             plugins: {
                                 legend: {
                                     display: true,
                                     labels: {
                                         color: 'rgb(255, 99, 132)'
                                     }
                                 }
                             }
                         }
                     }
                 }

             }
             return config;
         }
     });

     $(function() {
         //new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));
         new Chart(document.getElementById("bar_chartdua").getContext("2d"), getChartJs('bar'));
         //new Chart(document.getElementById("radar_chart").getContext("2d"), getChartJs('radar'));
         //new Chart(document.getElementById("pie_chart").getContext("2d"), getChartJs('pie'));


         function getChartJs(type) {
             var config = null;

             if (type === 'bar') {
                 config = {
                     type: 'bar',
                     data: {
                         labels: ["18:00 - 22:00", "22:00 - 02:00", "02:00 - 05:00", "05:00 - 06:00"],
                         datasets: [{
                                 label: "NO SET VESSEL",
                                 data: [
                                     <?= $get_unit_nosetvessel18[0]->no ?>,
                                     <?= $get_unit_nosetvessel22[0]->no ?>,
                                     <?= $get_unit_nosetvessel2[0]->no ?>,
                                     <?= $get_unit_nosetvessel5[0]->no ?>
                                 ],
                                 backgroundColor: 'rgba(240, 240, 214, 1)'
                             },
                             {
                                 label: "B/D",
                                 data: [
                                     <?= $get_unit_bd18[0]->no ?>,
                                     <?= $get_unit_bd22[0]->no ?>,
                                     <?= $get_unit_bd2[0]->no ?>,
                                     <?= $get_unit_bd5[0]->no ?>
                                 ],
                                 backgroundColor: 'rgba(2418, 36, 89, 1)'
                             },
                             {
                                 label: "SERVICE",
                                 data: [
                                     <?= $get_unit_service18[0]->no ?>,
                                     <?= $get_unit_service22[0]->no ?>,
                                     <?= $get_unit_service2[0]->no ?>,
                                     <?= $get_unit_service5[0]->no ?>
                                 ],
                                 backgroundColor: 'rgba(240, 255, 0, 1)'
                             },
                             {
                                 label: "RUNNING",
                                 data: [
                                     <?= $get_unit_running[0]->no - $get_unit_nosetvessel18[0]->no - $get_unit_bd18[0]->no - $get_unit_service18[0]->no - $get_unit_stb18[0]->no - $get_unit_accident18[0]->no ?>,
                                     <?= $get_unit_running[0]->no - $get_unit_nosetvessel22[0]->no - $get_unit_bd22[0]->no - $get_unit_service22[0]->no - $get_unit_stb22[0]->no - $get_unit_accident22[0]->no  ?>,
                                     <?= $get_unit_running[0]->no - $get_unit_nosetvessel2[0]->no - $get_unit_bd2[0]->no - $get_unit_service2[0]->no - $get_unit_stb2[0]->no - $get_unit_accident2[0]->no  ?>,
                                     <?= $get_unit_running[0]->no - $get_unit_nosetvessel5[0]->no - $get_unit_bd5[0]->no - $get_unit_service5[0]->no - $get_unit_stb5[0]->no - $get_unit_accident5[0]->no  ?>,
                                 ],
                                 backgroundColor: 'rgba(0, 230, 64, 1)'
                             },
                             {
                                 label: "STANDBY READY",
                                 data: [
                                     <?= $get_unit_stb18[0]->no ?>,
                                     <?= $get_unit_stb22[0]->no ?>,
                                     <?= $get_unit_stb2[0]->no ?>,
                                     <?= $get_unit_stb5[0]->no ?>
                                 ],
                                 backgroundColor: 'rgba(78, 205, 196, 1)'
                             },
                             {
                                 label: "ACCIDENT",
                                 data: [
                                     <?= $get_unit_accident18[0]->no ?>,
                                     <?= $get_unit_accident22[0]->no ?>,
                                     <?= $get_unit_accident2[0]->no ?>,
                                     <?= $get_unit_accident5[0]->no ?>
                                 ],
                                 backgroundColor: 'rgba(232, 236, 241, 1)'
                             },
                             {
                                 label: "TOTAL",
                                 data: [
                                     <?= $get_unit_running[0]->no ?>,
                                     <?= $get_unit_running[0]->no ?>,
                                     <?= $get_unit_running[0]->no ?>,
                                     <?= $get_unit_running[0]->no ?>
                                 ],
                                 backgroundColor: 'rgba(236, 236, 236, 1) '
                             }
                         ]
                     },
                     options: {
                         responsive: true,
                         options: {
                             plugins: {
                                 legend: {
                                     display: true,
                                     labels: {
                                         color: 'rgb(255, 99, 132)'
                                     }
                                 }
                             }
                         }
                     }
                 }
             }
             return config;
         }
     });
 </script>

 <script>
     var speedCanvas = document.getElementById("speedChart3");

     Chart.defaults.global.defaultFontFamily = "Lato";
     Chart.defaults.global.defaultFontSize = 15;


     var speedData = {
         labels: [

             <?php
                date_default_timezone_set('Asia/Singapore');
                $jamini = date("H");
                // date("H");

                if ($jamini == 7 || $jamini == 8 || $jamini == 9 || $jamini == 10 || $jamini == 11 || $jamini == 12 || $jamini == 13 || $jamini == 14 || $jamini == 15 || $jamini == 16 || $jamini == 17 || $jamini == 18) {  ?> "07:00", "08:00", "09:00", "10:00", "11:00", "12:00",
                 "13:00", "14:00", "15:00", "16:00", "17:00", "18:00",


             <?php } ?>
             <?php

                if ($jamini == 19 || $jamini == 20 || $jamini == 21 || $jamini == 22 || $jamini == 23 || $jamini == 00 || $jamini == 01 || $jamini == 02 || $jamini == 03 || $jamini == 04 || $jamini == 05 || $jamini == 06) {  ?> "19:00", "20:00", "21:00", "22:00", "23:00",
                 "00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00",
             <?php } ?>


         ],
         datasets: [{
             label: " Produksi per jam (ton)",
             data: [
                 //                                                     

                 <?php
                    date_default_timezone_set('Asia/Singapore');
                    $jamini = date("H");

                    ?>
                 <?php



                    if ($jamini == 7) {
                        echo number_format($net3[0]->a) . ',';
                    }

                    if ($jamini == 8) {
                        echo $net3[0]->a . ',';
                        echo $net3[0]->b . ',';
                    }
                    if ($jamini == 9) {
                        echo $net3[0]->a . ',';
                        echo $net3[0]->b . ',';
                        echo $net3[0]->c . ',';
                    }
                    if ($jamini == 10) {
                        echo $net3[0]->a . ',';
                        echo $net3[0]->b . ',';
                        echo $net3[0]->c . ',';
                        echo $net3[0]->d . ',';
                    }
                    if ($jamini == 11) {
                        echo $net3[0]->a . ',';
                        echo $net3[0]->b . ',';
                        echo $net3[0]->c . ',';
                        echo $net3[0]->d . ',';
                        echo $net3[0]->e . ',';
                    }
                    if ($jamini == 12) {
                        echo $net3[0]->a . ',';
                        echo $net3[0]->b . ',';
                        echo $net3[0]->c . ',';
                        echo $net3[0]->d . ',';
                        echo $net3[0]->e . ',';
                        echo $net3[0]->f . ',';
                    }
                    if ($jamini == 13) {
                        echo $net3[0]->a . ',';
                        echo $net3[0]->b . ',';
                        echo $net3[0]->c . ',';
                        echo $net3[0]->d . ',';
                        echo $net3[0]->e . ',';
                        echo $net3[0]->f . ',';
                        echo $net3[0]->g . ',';
                    }
                    if ($jamini == 14) {
                        echo $net3[0]->a . ',';
                        echo $net3[0]->b . ',';
                        echo $net3[0]->c . ',';
                        echo $net3[0]->d . ',';
                        echo $net3[0]->e . ',';
                        echo $net3[0]->f . ',';
                        echo $net3[0]->g . ',';
                        echo $net3[0]->h . ',';
                    }
                    if ($jamini == 15) {
                        echo $net3[0]->a . ',';
                        echo $net3[0]->b . ',';
                        echo $net3[0]->c . ',';
                        echo $net3[0]->d . ',';
                        echo $net3[0]->e . ',';
                        echo $net3[0]->f . ',';
                        echo $net3[0]->g . ',';
                        echo $net3[0]->h . ',';
                        echo $net3[0]->i . ',';
                    }
                    if ($jamini == 16) {
                        echo $net3[0]->a . ',';
                        echo $net3[0]->b . ',';
                        echo $net3[0]->c . ',';
                        echo $net3[0]->d . ',';
                        echo $net3[0]->e . ',';
                        echo $net3[0]->f . ',';
                        echo $net3[0]->g . ',';
                        echo $net3[0]->h . ',';
                        echo $net3[0]->i . ',';
                        echo $net3[0]->j . ',';
                    }
                    if ($jamini == 17) {
                        echo $net3[0]->a . ',';
                        echo $net3[0]->b . ',';
                        echo $net3[0]->c . ',';
                        echo $net3[0]->d . ',';
                        echo $net3[0]->e . ',';
                        echo $net3[0]->f . ',';
                        echo $net3[0]->g . ',';
                        echo $net3[0]->h . ',';
                        echo $net3[0]->i . ',';
                        echo $net3[0]->j . ',';
                        echo $net3[0]->k . ',';
                    }
                    if ($jamini == 18) {

                        echo $net3[0]->a . ',';
                        echo $net3[0]->b . ',';
                        echo $net3[0]->c . ',';
                        echo $net3[0]->d . ',';
                        echo $net3[0]->e . ',';
                        echo $net3[0]->f . ',';
                        echo $net3[0]->g . ',';
                        echo $net3[0]->h . ',';
                        echo $net3[0]->i . ',';
                        echo $net3[0]->j . ',';
                        echo $net3[0]->k . ',';
                        echo $net3[0]->l . ',';
                    }
                    if ($jamini == 19) {

                        echo $net3[0]->m . ',';
                    }
                    if ($jamini == 20) {

                        echo $net3[0]->m . ',';
                        echo $net3[0]->n . ',';
                    }
                    if ($jamini == 21) {

                        echo $net3[0]->m . ',';
                        echo $net3[0]->n . ',';
                        echo $net3[0]->o . ',';
                    }
                    if ($jamini == 22) {

                        echo $net3[0]->m . ',';
                        echo $net3[0]->n . ',';
                        echo $net3[0]->o . ',';
                        echo $net3[0]->p . ',';
                    }
                    if ($jamini == 23) {
                        echo $net3[0]->m . ',';
                        echo $net3[0]->n . ',';
                        echo $net3[0]->o . ',';
                        echo $net3[0]->p . ',';
                        echo $net3[0]->q . ',';
                    }
                    if ($jamini == 0) {

                        echo $net3[0]->m . ',';
                        echo $net3[0]->n . ',';
                        echo $net3[0]->o . ',';
                        echo $net3[0]->p . ',';
                        echo $net3[0]->q . ',';
                        echo $net3[0]->q + $net3[0]->r . ',';
                    }
                    if ($jamini == 1) {
                        echo $net3[0]->m . ',';
                        echo $net3[0]->n . ',';
                        echo $net3[0]->o . ',';
                        echo $net3[0]->p . ',';
                        echo $net3[0]->q . ',';
                        echo $net3[0]->q + $net3[0]->r . ',';
                        echo $net3[0]->q + $net3[0]->s . ',';
                    }
                    if ($jamini == 2) {
                        echo $net3[0]->m . ',';
                        echo $net3[0]->n . ',';
                        echo $net3[0]->o . ',';
                        echo $net3[0]->p . ',';
                        echo $net3[0]->q . ',';
                        echo $net3[0]->q + $net3[0]->r . ',';
                        echo $net3[0]->q + $net3[0]->s . ',';
                        echo $net3[0]->q + $net3[0]->t . ',';
                    }
                    if ($jamini == 3) {
                        echo $net3[0]->m . ',';
                        echo $net3[0]->n . ',';
                        echo $net3[0]->o . ',';
                        echo $net3[0]->p . ',';
                        echo $net3[0]->q . ',';
                        echo $net3[0]->q + $net3[0]->r . ',';
                        echo $net3[0]->q + $net3[0]->s . ',';
                        echo $net3[0]->q + $net3[0]->t . ',';
                        echo $net3[0]->q + $net3[0]->u . ',';
                    }
                    if ($jamini == 4) {
                        echo $net3[0]->m . ',';
                        echo $net3[0]->n . ',';
                        echo $net3[0]->o . ',';
                        echo $net3[0]->p . ',';
                        echo $net3[0]->q . ',';
                        echo $net3[0]->q + $net3[0]->r . ',';
                        echo $net3[0]->q + $net3[0]->s . ',';
                        echo $net3[0]->q + $net3[0]->t . ',';
                        echo $net3[0]->q + $net3[0]->u . ',';
                        echo $net3[0]->q + $net3[0]->v . ',';
                    }
                    if ($jamini == 5) {
                        echo $net3[0]->m . ',';
                        echo $net3[0]->n . ',';
                        echo $net3[0]->o . ',';
                        echo $net3[0]->p . ',';
                        echo $net3[0]->q . ',';
                        echo $net3[0]->q + $net3[0]->r . ',';
                        echo $net3[0]->q + $net3[0]->s . ',';
                        echo $net3[0]->q + $net3[0]->t . ',';
                        echo $net3[0]->q + $net3[0]->u . ',';
                        echo $net3[0]->q + $net3[0]->v . ',';
                        echo $net3[0]->q + $net3[0]->w . ',';
                    }
                    if ($jamini == 6) {
                        echo $net3[0]->m . ',';
                        echo $net3[0]->n . ',';
                        echo $net3[0]->o . ',';
                        echo $net3[0]->p . ',';
                        echo $net3[0]->q . ',';
                        echo $net3[0]->q + $net3[0]->r . ',';
                        echo $net3[0]->q + $net3[0]->s . ',';
                        echo $net3[0]->q + $net3[0]->t . ',';
                        echo $net3[0]->q + $net3[0]->u . ',';
                        echo $net3[0]->q + $net3[0]->v . ',';
                        echo $net3[0]->q + $net3[0]->w . ',';
                        echo $net3[0]->q + $net3[0]->x . ',';
                    }
                    ?>



             ],


             lineTension: 0,
             fill: false,
             borderColor: 'orange',
             backgroundColor: 'transparent',
             borderDash: [5, 5],
             pointBorderColor: '',
             pointBackgroundColor: 'rgba(255,150,0,0.5)',
             pointRadius: 5,
             pointHoverRadius: 10,
             pointHitRadius: 30,
             pointBorderWidth: 3,
             pointStyle: 'squaRounded',
             datalabels: {
                 anchor: 'start',
                 align: 'start',
                 offset: 0,
                 backgroundColor: 'white'
             }
         }]

     };

     var chartOptions = {
         legend: {
             display: true,
             position: 'bottom',

             labels: {
                 boxWidth: 10,
                 fontColor: 'black'
             }
         }
     };

     var lineChart = new Chart(speedCanvas, {
         type: 'line',
         data: speedData,
         options: chartOptions,

     });
 </script>
 <script>
     var speedCanvas = document.getElementById("ritasi");

     Chart.defaults.global.defaultFontFamily = "Lato";
     Chart.defaults.global.defaultFontSize = 15;

     var speedData = {
         labels: [
             <?php
                date_default_timezone_set('Asia/Singapore');
                $jamini = date("H");

                if ($jamini == 7 || $jamini == 8 || $jamini == 9 || $jamini == 10 || $jamini == 11 || $jamini == 12 || $jamini == 13 || $jamini == 14 || $jamini == 15 || $jamini == 16 || $jamini == 17 || $jamini == 18) {  ?> "07:00", "08:00", "09:00", "10:00", "11:00", "12:00",
                 "13:00", "14:00", "15:00", "16:00", "17:00", "18:00",


             <?php } ?>
             <?php
                date_default_timezone_set('Asia/Singapore');
                $jamini = date("H");

                if ($jamini == 19 || $jamini == 20 || $jamini == 21 || $jamini == 22 || $jamini == 23 || $jamini == 00 || $jamini == 01 || $jamini == 02 || $jamini == 03 || $jamini == 04 || $jamini == 05 || $jamini == 06) {  ?> "19:00", "20:00", "21:00", "22:00", "23:00",
                 "00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00",
             <?php } ?>
         ],
         datasets: [{
             label: " Average Ritasi",
             data: [
                 <?php
                    date_default_timezone_set('Asia/Singapore');
                    $jamini = date("H");

                    ?>
                 <?php



                    if ($jamini == 7) {
                        echo $aj7[0]->avgrit . ',';
                    }

                    if ($jamini == 8) {
                        echo $aj7[0]->avgrit . ',';
                        echo $aj8[0]->avgrit . ',';
                    }
                    if ($jamini == 9) {
                        echo $aj7[0]->avgrit . ',';
                        echo $aj8[0]->avgrit . ',';
                        echo $aj9[0]->avgrit . ',';
                    }
                    if ($jamini == 10) {
                        echo $aj7[0]->avgrit . ',';
                        echo $aj8[0]->avgrit . ',';
                        echo $aj9[0]->avgrit . ',';
                        echo $aj10[0]->avgrit . ',';
                    }
                    if ($jamini == 11) {
                        echo $aj7[0]->avgrit . ',';
                        echo $aj8[0]->avgrit . ',';
                        echo $aj9[0]->avgrit . ',';
                        echo $aj10[0]->avgrit . ',';
                        echo $aj11[0]->avgrit . ',';
                    }
                    if ($jamini == 12) {
                        echo $aj7[0]->avgrit . ',';
                        echo $aj8[0]->avgrit . ',';
                        echo $aj9[0]->avgrit . ',';
                        echo $aj10[0]->avgrit . ',';
                        echo $aj11[0]->avgrit . ',';
                        echo $aj12[0]->avgrit . ',';
                    }
                    if ($jamini == 13) {
                        echo $aj7[0]->avgrit . ',';
                        echo $aj8[0]->avgrit . ',';
                        echo $aj9[0]->avgrit . ',';
                        echo $aj10[0]->avgrit . ',';
                        echo $aj11[0]->avgrit . ',';
                        echo $aj12[0]->avgrit . ',';
                        echo $aj13[0]->avgrit . ',';
                    }
                    if ($jamini == 14) {
                        echo $aj7[0]->avgrit . ',';
                        echo $aj8[0]->avgrit . ',';
                        echo $aj9[0]->avgrit . ',';
                        echo $aj10[0]->avgrit . ',';
                        echo $aj11[0]->avgrit . ',';
                        echo $aj12[0]->avgrit . ',';
                        echo $aj13[0]->avgrit . ',';
                        echo $aj14[0]->avgrit . ',';
                    }
                    if ($jamini == 15) {
                        echo $aj7[0]->avgrit . ',';
                        echo $aj8[0]->avgrit . ',';
                        echo $aj9[0]->avgrit . ',';
                        echo $aj10[0]->avgrit . ',';
                        echo $aj11[0]->avgrit . ',';
                        echo $aj12[0]->avgrit . ',';
                        echo $aj13[0]->avgrit . ',';
                        echo $aj14[0]->avgrit . ',';
                        echo $aj15[0]->avgrit . ',';
                    }
                    if ($jamini == 16) {
                        echo $aj7[0]->avgrit . ',';
                        echo $aj8[0]->avgrit . ',';
                        echo $aj9[0]->avgrit . ',';
                        echo $aj10[0]->avgrit . ',';
                        echo $aj11[0]->avgrit . ',';
                        echo $aj12[0]->avgrit . ',';
                        echo $aj13[0]->avgrit . ',';
                        echo $aj14[0]->avgrit . ',';
                        echo $aj15[0]->avgrit . ',';
                        echo $aj16[0]->avgrit . ',';
                    }
                    if ($jamini == 17) {
                        echo $aj7[0]->avgrit . ',';
                        echo $aj8[0]->avgrit . ',';
                        echo $aj9[0]->avgrit . ',';
                        echo $aj10[0]->avgrit . ',';
                        echo $aj11[0]->avgrit . ',';
                        echo $aj12[0]->avgrit . ',';
                        echo $aj13[0]->avgrit . ',';
                        echo $aj14[0]->avgrit . ',';
                        echo $aj15[0]->avgrit . ',';
                        echo $aj16[0]->avgrit . ',';
                        echo $aj17[0]->avgrit . ',';
                    }
                    if ($jamini == 18) {
                        echo $aj7[0]->avgrit . ',';
                        echo $aj8[0]->avgrit . ',';
                        echo $aj9[0]->avgrit . ',';
                        echo $aj10[0]->avgrit . ',';
                        echo $aj11[0]->avgrit . ',';
                        echo $aj12[0]->avgrit . ',';
                        echo $aj13[0]->avgrit . ',';
                        echo $aj14[0]->avgrit . ',';
                        echo $aj15[0]->avgrit . ',';
                        echo $aj16[0]->avgrit . ',';
                        echo $aj17[0]->avgrit . ',';
                        echo $aj18[0]->avgrit . ',';
                    }
                    if ($jamini == 19) {

                        echo $aj19[0]->avgrit . ',';
                    }
                    if ($jamini == 20) {
                        echo $aj19[0]->avgrit . ',';
                        echo $aj20[0]->avgrit . ',';
                    }
                    if ($jamini == 21) {

                        echo $aj19[0]->avgrit . ',';
                        echo $aj20[0]->avgrit . ',';
                        echo $aj21[0]->avgrit . ',';
                    }
                    if ($jamini == 22) {

                        echo $aj19[0]->avgrit . ',';
                        echo $aj20[0]->avgrit . ',';
                        echo $aj21[0]->avgrit . ',';
                        echo $aj22[0]->avgrit . ',';
                    }
                    if ($jamini == 23) {

                        echo $aj19[0]->avgrit . ',';
                        echo $aj20[0]->avgrit . ',';
                        echo $aj21[0]->avgrit . ',';
                        echo $aj22[0]->avgrit . ',';
                        echo $aj23[0]->avgrit . ',';
                    }
                    if ($jamini == 0) {

                        echo $aj19[0]->avgrit . ',';
                        echo $aj20[0]->avgrit . ',';
                        echo $aj21[0]->avgrit . ',';
                        echo $aj22[0]->avgrit . ',';
                        echo $aj23[0]->avgrit . ',';
                        echo $aj00[0]->avgrit . ',';
                    }
                    if ($jamini == 1) {

                        echo $aj19[0]->avgrit . ',';
                        echo $aj20[0]->avgrit . ',';
                        echo $aj21[0]->avgrit . ',';
                        echo $aj22[0]->avgrit . ',';
                        echo $aj23[0]->avgrit . ',';
                        echo $aj00[0]->avgrit . ',';
                        echo $aj01[0]->avgrit . ',';
                    }
                    if ($jamini == 2) {

                        echo $aj19[0]->avgrit . ',';
                        echo $aj20[0]->avgrit . ',';
                        echo $aj21[0]->avgrit . ',';
                        echo $aj22[0]->avgrit . ',';
                        echo $aj23[0]->avgrit . ',';
                        echo $aj00[0]->avgrit . ',';
                        echo $aj01[0]->avgrit . ',';
                        echo $aj02[0]->avgrit . ',';
                    }
                    if ($jamini == 3) {

                        echo $aj19[0]->avgrit . ',';
                        echo $aj20[0]->avgrit . ',';
                        echo $aj21[0]->avgrit . ',';
                        echo $aj22[0]->avgrit . ',';
                        echo $aj23[0]->avgrit . ',';
                        echo $aj00[0]->avgrit . ',';
                        echo $aj01[0]->avgrit . ',';
                        echo $aj02[0]->avgrit . ',';
                        echo $aj03[0]->avgrit . ',';
                    }
                    if ($jamini == 4) {

                        echo $aj19[0]->avgrit . ',';
                        echo $aj20[0]->avgrit . ',';
                        echo $aj21[0]->avgrit . ',';
                        echo $aj22[0]->avgrit . ',';
                        echo $aj23[0]->avgrit . ',';
                        echo $aj00[0]->avgrit . ',';
                        echo $aj01[0]->avgrit . ',';
                        echo $aj02[0]->avgrit . ',';
                        echo $aj03[0]->avgrit . ',';
                        echo $aj04[0]->avgrit . ',';
                    }
                    if ($jamini == 5) {

                        echo $aj19[0]->avgrit . ',';
                        echo $aj20[0]->avgrit . ',';
                        echo $aj21[0]->avgrit . ',';
                        echo $aj22[0]->avgrit . ',';
                        echo $aj23[0]->avgrit . ',';
                        echo $aj00[0]->avgrit . ',';
                        echo $aj01[0]->avgrit . ',';
                        echo $aj02[0]->avgrit . ',';
                        echo $aj03[0]->avgrit . ',';
                        echo $aj04[0]->avgrit . ',';
                        echo $aj05[0]->avgrit . ',';
                    }
                    if ($jamini == 6) {

                        echo $aj19[0]->avgrit . ',';
                        echo $aj20[0]->avgrit . ',';
                        echo $aj21[0]->avgrit . ',';
                        echo $aj22[0]->avgrit . ',';
                        echo $aj23[0]->avgrit . ',';
                        echo $aj00[0]->avgrit . ',';
                        echo $aj01[0]->avgrit . ',';
                        echo $aj02[0]->avgrit . ',';
                        echo $aj03[0]->avgrit . ',';
                        echo $aj04[0]->avgrit . ',';
                        echo $aj05[0]->avgrit . ',';
                        echo $aj06[0]->avgrit . ',';
                    }
                    ?>


             ],
             lineTension: 0,
             fill: false,
             borderColor: 'orange',
             backgroundColor: 'transparent',
             borderDash: [5, 5],
             pointBorderColor: '',
             pointBackgroundColor: 'rgba(255,150,0,0.5)',
             pointRadius: 4,
             pointHoverRadius: 10,
             pointHitRadius: 30,
             pointBorderWidth: 3,
             pointStyle: 'squaRounded',
             datalabels: {
                 anchor: 'start',
                 align: 'start',
                 offset: 3,
                 backgroundColor: 'white'
             }

         }]
     };

     var chartOptions = {
         legend: {
             display: true,
             position: 'bottom',

             labels: {
                 boxWidth: 10,
                 fontColor: 'black'
             }
         }
     };

     var lineChart = new Chart(speedCanvas, {
         type: 'line',
         data: speedData,
         options: chartOptions,

     });
 </script>
 </script>
 <script>
     var pieChartCanvas = $('#triplokasi').get(0).getContext('2d')
     var pieData = {
         labels: [
             <?php foreach ($tl as $u) : ?> "<?= $u->lokasi ?>",
             <?php endforeach; ?>
         ],
         datasets: [{
             data: [
                 <?php foreach ($tl as $u) : ?> "<?= $u->count ?>",
                 <?php endforeach; ?>
             ],
             backgroundColor: [
                 ' #62BEB6',
                 '#0B9A8D',
                 '#077368',
                 '#034D44',
                 '#002B24',
                 '#347C98',
                 '#0247FE',
                 '#4424D6',
                 '#C21460'
             ],
             datalabels: {
                 backgroundColor: 'white'
             }
         }]
     }
     var pieOptions = {
         maintainAspectRatio: false,
         responsive: true,
         legend: {
             reverse: true
         }
     }
     //Create pie or douhnut chart
     // You can switch between pie and douhnut using the method below.
     new Chart(pieChartCanvas, {
         type: 'pie',
         data: pieData,
         options: pieOptions,

     })
 </script>
 <script>
     var pieChartCanvas = $('#underload').get(0).getContext('2d')
     var pieData = {
         labels: [
             <?php foreach ($ul as $u) : ?> "<?= $u->lokasi ?>",
             <?php endforeach; ?>
         ],
         datasets: [{
             data: [
                 <?php foreach ($ul as $u) : ?> "<?= $u->count ?>",
                 <?php endforeach; ?>
             ],
             backgroundColor: [
                 ' #97A1D9',
                 '#6978C9',
                 '#4A5596 ',
                 '#2C3365',
                 '#111539',
                 '#347C98',
                 '#0247FE',
                 '#4424D6',
                 '#C21460'
             ],
             datalabels: {
                 backgroundColor: 'white'
             }

         }]
     }
     var pieOptions = {
         maintainAspectRatio: false,
         responsive: true,
         legend: {
             reverse: true
         }

     }
     //Create pie or douhnut chart
     // You can switch between pie and douhnut using the method below.
     new Chart(pieChartCanvas, {
         type: 'pie',
         data: pieData,
         options: pieOptions,
     })
 </script>
 <script>
     var pieChartCanvas = $('#tonkm').get(0).getContext('2d')
     var pieData = {
         labels: [
             <?php foreach ($tk as $u) : ?> "<?= $u->loading_point ?>",
             <?php endforeach; ?>
         ],
         datasets: [{
             data: [
                 <?php foreach ($tk as $u) : ?> "<?= round($u->a * $u->c) ?>",
                 <?php endforeach; ?>
             ],
             backgroundColor: [
                 ' #F88FB2',
                 '#ED5C8B',
                 '#D5255E',
                 '#A31246',
                 '#740030',
                 '#347C98',
                 '#0247FE',
                 '#4424D6',
                 '#C21460'
             ],
             datalabels: {
                 backgroundColor: 'white'
             }
         }]
     }
     var pieOptions = {
         maintainAspectRatio: false,
         responsive: true,
         legend: {
             reverse: true
         }
     }
     //Create pie or douhnut chart
     // You can switch between pie and douhnut using the method below.
     new Chart(pieChartCanvas, {
         type: 'pie',
         data: pieData,
         options: pieOptions
     })
 </script>
 <script>
     var ctx = document.getElementById("sumtriptiperaw");
     var myChart = new Chart(ctx, {
         type: 'bar',
         responsive: true,
         data: {
             labels: [
                 <?php foreach ($stvr as $u) : ?> "<?= $u->tipe_vessel1 ?>",
                 <?php endforeach; ?>
             ],
             datasets: [{
                     label: '# Total Trip Raw Coal',
                     yAxisID: 'A',
                     data: [
                         <?php foreach ($stvr as $u) : ?> <?= $u->raw ?>,
                         <?php endforeach; ?>

                     ],
                     backgroundColor: [
                         '#D6EAF8 ',
                         '#D6EAF8 ',
                         '#D6EAF8 ',
                         '#D6EAF8 ',
                         '#D6EAF8 ',
                         '#D6EAF8 '

                     ],
                     borderColor: [
                         '#21618C ',
                         '#21618C ',
                         '#21618C ',
                         '#21618C ',
                         '#21618C ',
                         '#21618C '

                     ],
                     datalabels: {
                         anchor: 'end',
                         align: 'end',
                         backgroundColor: '#D6EAF8',
                         borderColor: 'black',
                         borderWidth: 1
                     },
                     borderWidth: 2,
                 },
                 {
                     label: '# Average Ton',
                     yAxisID: 'B',
                     data: [
                         <?php foreach ($stvr as $u) : ?> <?= $u->total ?>,
                         <?php endforeach; ?>
                     ],
                     backgroundColor: [
                         'rgba(255, 159, 64, 0.2)',
                         'rgba(255, 159, 64, 0.2)',
                         'rgba(255, 159, 64, 0.2)',
                         'rgba(255, 159, 64, 0.2)',
                         'rgba(255, 159, 64, 0.2)',
                         'rgba(255, 159, 64, 0.2)'
                     ],
                     borderColor: [
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
                         //  backgroundColor: 'white'
                     },

                     borderWidth: 2,

                 },
                 {
                     label: '# Target Tonase',
                     data: [
                         <?php foreach ($stvr as $u) : ?> <?= $u->target ?>,
                         <?php endforeach; ?>

                     ],

                     // Changes this dataset to become a line
                     type: 'line',
                     borderColor: 'green',
                     datalabels: {
                         anchor: 'start',
                         align: 'end',
                         offset: 0,
                         //  backgroundColor: 'white'
                     },

                 }

             ]
         },
         options: {
             scales: {
                 yAxes: [{
                     id: 'B',
                     stacked: true,
                     ticks: {
                         beginAtZero: true,

                         max: 300
                     },

                 }, {
                     id: 'A',
                     stacked: true,
                     ticks: {
                         beginAtZero: true,
                         autoSkip: false,
                         max: <?php echo $max_trip[0]->count ?>

                     },

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
     var ctx = document.getElementById("sumtriptipercrush");
     var myChart = new Chart(ctx, {
         type: 'bar',
         responsive: true,
         data: {
             labels: [
                 <?php foreach ($stvc as $u) : ?> "<?= $u->tipe_vessel1 ?>",
                 <?php endforeach; ?>
             ],
             datasets: [{
                     label: '# Total Trip Crush Coal',
                     yAxisID: 'A',
                     data: [
                         <?php foreach ($stvc as $u) : ?> <?= $u->crush ?>,
                         <?php endforeach; ?>

                     ],
                     backgroundColor: [
                         'rgba(255, 99, 132, 0.2)',
                         'rgba(255, 99, 132, 0.2)',
                         'rgba(255, 99, 132, 0.2)',
                         'rgba(255, 99, 132, 0.2)',
                         'rgba(255, 99, 132, 0.2)',
                         'rgba(255, 99, 132, 0.2)'
                     ],
                     borderColor: [
                         'rgba(255,99,132,1)',
                         'rgba(255,99,132,1)',
                         'rgba(255,99,132,1)',
                         'rgba(255,99,132,1)',
                         'rgba(255,99,132,1)',
                         'rgba(255,99,132,1)'
                     ],
                     datalabels: {
                         anchor: 'end',
                         align: 'end',
                         backgroundColor: 'rgba(255, 99, 132, 0.2)',
                         borderColor: 'rgba(255,99,132,1)',
                         borderWidth: 1
                     },
                     borderWidth: 2
                 },
                 {
                     label: '# Average Ton',
                     yAxisID: 'B',
                     data: [
                         <?php foreach ($stvc as $u) : ?> <?= $u->total ?>,
                         <?php endforeach; ?>
                     ],
                     backgroundColor: [
                         'rgba(255, 159, 64, 0.2)',
                         'rgba(255, 159, 64, 0.2)',
                         'rgba(255, 159, 64, 0.2)',
                         'rgba(255, 159, 64, 0.2)',
                         'rgba(255, 159, 64, 0.2)',
                         'rgba(255, 159, 64, 0.2)'
                     ],
                     borderColor: [
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
                         //  backgroundColor: 'white'
                     },
                     borderWidth: 2
                 },
                 {
                     label: '# Target Tonase',
                     data: [
                         <?php foreach ($stvc as $u) : ?> <?= $u->target ?>,
                         <?php endforeach; ?>

                     ],

                     // Changes this dataset to become a line
                     type: 'line',
                     borderColor: 'green',
                     datalabels: {
                         anchor: 'start',
                         align: 'end',
                         offset: 0,
                         //  backgroundColor: 'white'
                     },

                 }
             ]
         },
         options: {
             scales: {
                 yAxes: [{
                     id: 'B',
                     stacked: true,
                     ticks: {
                         beginAtZero: true,

                         max: 300
                     },

                 }, {
                     id: 'A',
                     stacked: true,
                     ticks: {
                         beginAtZero: true,
                         autoSkip: false,
                         max: <?php echo $max_trip[0]->count ?>

                     },

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
     var ctx = document.getElementById('averagemuatan');
     var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
             labels: [
                 <?php foreach ($am as $u) : ?> "<?= $u->loading_point ?>",
                 <?php endforeach; ?>
             ],
             datasets: [{
                 label: 'Grafik average Muatan per lokasi',
                 data: [
                     <?php foreach ($am as $u) : ?> "<?= number_format($u->a) ?>",
                     <?php endforeach; ?>
                 ],
                 backgroundColor: [
                     ' #77C2FE',
                     '#249CFF',
                     '#1578CF',
                     '#0A579E',
                     '#003870',
                     '#347C98',
                     '#0247FE',
                     '#4424D6',
                     '#C21460'
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
                 borderWidth: 1,
                 beginAtZero: true

             }]
         },
         options: {
             scales: {
                 yAxes: [{
                     ticks: {
                         min: 100,
                         beginAtZero: true
                     }
                 }]
             }
         }
     });
 </script>
 <script>
     var ctx = document.getElementById('averagemuatan_tipevessel');
     var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
             labels: [
                 <?php foreach ($amt as $u) : ?> "<?= $u->tipe_vessel ?>",
                 <?php endforeach; ?>
             ],
             datasets: [{
                 label: 'Grafik average Muatan per tipe vessel',
                 data: [
                     <?php foreach ($amt as $u) : ?> "<?= number_format($u->a) ?>",
                     <?php endforeach; ?>
                 ],
                 backgroundColor: [
                     '#F57F17',
                     '#F9A825',
                     '#FBC02D',
                     '#FDD835',
                     '#FFEB3B',
                     '#FFEE58',
                     '#0247FE',
                     '#4424D6',
                     '#C21460'
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
                 borderWidth: 1,
                 beginAtZero: true

             }]
         },
         options: {
             scales: {
                 yAxes: [{
                     ticks: {
                         min: 100,
                         beginAtZero: true
                     }
                 }]
             }
         }
     });
 </script>
 <script>
     var speedCanvas = document.getElementById("totaltrip");

     Chart.defaults.global.defaultFontFamily = "Lato";
     Chart.defaults.global.defaultFontSize = 15;

     var speedData = {
         labels: [
             <?php
                date_default_timezone_set('Asia/Singapore');
                $jamini = date("H");

                if ($jamini == 7 || $jamini == 8 || $jamini == 9 || $jamini == 10 || $jamini == 11 || $jamini == 12 || $jamini == 13 || $jamini == 14 || $jamini == 15 || $jamini == 16 || $jamini == 17 || $jamini == 18) {  ?> "07:00", "08:00", "09:00", "10:00", "11:00", "12:00",
                 "13:00", "14:00", "15:00", "16:00", "17:00", "18:00",


             <?php } ?>
             <?php
                date_default_timezone_set('Asia/Singapore');
                $jamini = date("H");

                if ($jamini == 19 || $jamini == 20 || $jamini == 21 || $jamini == 22 || $jamini == 23 || $jamini == 0 || $jamini == 1 || $jamini == 2 || $jamini == 3 || $jamini == 4 || $jamini == 5 || $jamini == 6) {  ?> "19:00", "20:00", "21:00", "22:00", "23:00",
                 "00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00",
             <?php } ?>
         ],
         datasets: [{
             label: " Total of Unit",
             data: [
                 <?php
                    date_default_timezone_set('Asia/Singapore');
                    $jamini = date("H");

                    ?>
                 <?php



                    if ($jamini == 7) {
                        echo $aj7[0]->a . ',';
                    }

                    if ($jamini == 8) {
                        echo $aj7[0]->a . ',';
                        echo $aj8[0]->a . ',';
                    }
                    if ($jamini == 9) {
                        echo $aj7[0]->a . ',';
                        echo $aj8[0]->a . ',';
                        echo $aj9[0]->a . ',';
                    }
                    if ($jamini == 10) {
                        echo $aj7[0]->a . ',';
                        echo $aj8[0]->a . ',';
                        echo $aj9[0]->a . ',';
                        echo $aj10[0]->a . ',';
                    }
                    if ($jamini == 11) {
                        echo $aj7[0]->a . ',';
                        echo $aj8[0]->a . ',';
                        echo $aj9[0]->a . ',';
                        echo $aj10[0]->a . ',';
                        echo $aj11[0]->a . ',';
                    }
                    if ($jamini == 12) {
                        echo $aj7[0]->a . ',';
                        echo $aj8[0]->a . ',';
                        echo $aj9[0]->a . ',';
                        echo $aj10[0]->a . ',';
                        echo $aj11[0]->a . ',';
                        echo $aj12[0]->a . ',';
                    }
                    if ($jamini == 13) {
                        echo $aj7[0]->a . ',';
                        echo $aj8[0]->a . ',';
                        echo $aj9[0]->a . ',';
                        echo $aj10[0]->a . ',';
                        echo $aj11[0]->a . ',';
                        echo $aj12[0]->a . ',';
                        echo $aj13[0]->a . ',';
                    }
                    if ($jamini == 14) {
                        echo $aj7[0]->a . ',';
                        echo $aj8[0]->a . ',';
                        echo $aj9[0]->a . ',';
                        echo $aj10[0]->a . ',';
                        echo $aj11[0]->a . ',';
                        echo $aj12[0]->a . ',';
                        echo $aj13[0]->a . ',';
                        echo $aj14[0]->a . ',';
                    }
                    if ($jamini == 15) {
                        echo $aj7[0]->a . ',';
                        echo $aj8[0]->a . ',';
                        echo $aj9[0]->a . ',';
                        echo $aj10[0]->a . ',';
                        echo $aj11[0]->a . ',';
                        echo $aj12[0]->a . ',';
                        echo $aj13[0]->a . ',';
                        echo $aj14[0]->a . ',';
                        echo $aj15[0]->a . ',';
                    }
                    if ($jamini == 16) {
                        echo $aj7[0]->a . ',';
                        echo $aj8[0]->a . ',';
                        echo $aj9[0]->a . ',';
                        echo $aj10[0]->a . ',';
                        echo $aj11[0]->a . ',';
                        echo $aj12[0]->a . ',';
                        echo $aj13[0]->a . ',';
                        echo $aj14[0]->a . ',';
                        echo $aj15[0]->a . ',';
                        echo $aj16[0]->a . ',';
                    }
                    if ($jamini == 17) {
                        echo $aj7[0]->a . ',';
                        echo $aj8[0]->a . ',';
                        echo $aj9[0]->a . ',';
                        echo $aj10[0]->a . ',';
                        echo $aj11[0]->a . ',';
                        echo $aj12[0]->a . ',';
                        echo $aj13[0]->a . ',';
                        echo $aj14[0]->a . ',';
                        echo $aj15[0]->a . ',';
                        echo $aj16[0]->a . ',';
                        echo $aj17[0]->a . ',';
                    }
                    if ($jamini == 18) {
                        echo $aj7[0]->a . ',';
                        echo $aj8[0]->a . ',';
                        echo $aj9[0]->a . ',';
                        echo $aj10[0]->a . ',';
                        echo $aj11[0]->a . ',';
                        echo $aj12[0]->a . ',';
                        echo $aj13[0]->a . ',';
                        echo $aj14[0]->a . ',';
                        echo $aj15[0]->a . ',';
                        echo $aj16[0]->a . ',';
                        echo $aj17[0]->a . ',';
                        echo $aj18[0]->a . ',';
                    }
                    if ($jamini == 19) {

                        echo $aj19[0]->a . ',';
                    }
                    if ($jamini == 20) {
                        echo $aj19[0]->a . ',';
                        echo $aj20[0]->a . ',';
                    }
                    if ($jamini == 21) {

                        echo $aj19[0]->a . ',';
                        echo $aj20[0]->a . ',';
                        echo $aj21[0]->a . ',';
                    }
                    if ($jamini == 22) {

                        echo $aj19[0]->a . ',';
                        echo $aj20[0]->a . ',';
                        echo $aj21[0]->a . ',';
                        echo $aj22[0]->a . ',';
                    }
                    if ($jamini == 23) {

                        echo $aj19[0]->a . ',';
                        echo $aj20[0]->a . ',';
                        echo $aj21[0]->a . ',';
                        echo $aj22[0]->a . ',';
                        echo $aj23[0]->a . ',';
                    }
                    if ($jamini == 0) {

                        echo $aj19[0]->a . ',';
                        echo $aj20[0]->a . ',';
                        echo $aj21[0]->a . ',';
                        echo $aj22[0]->a . ',';
                        echo $aj23[0]->a . ',';
                        echo $aj00[0]->a . ',';
                    }
                    if ($jamini == 1) {

                        echo $aj19[0]->a . ',';
                        echo $aj20[0]->a . ',';
                        echo $aj21[0]->a . ',';
                        echo $aj22[0]->a . ',';
                        echo $aj23[0]->a . ',';
                        echo $aj00[0]->a . ',';
                        echo $aj01[0]->a . ',';
                    }
                    if ($jamini == 2) {

                        echo $aj19[0]->a . ',';
                        echo $aj20[0]->a . ',';
                        echo $aj21[0]->a . ',';
                        echo $aj22[0]->a . ',';
                        echo $aj23[0]->a . ',';
                        echo $aj00[0]->a . ',';
                        echo $aj01[0]->a . ',';
                        echo $aj02[0]->a . ',';
                    }
                    if ($jamini == 3) {

                        echo $aj19[0]->a . ',';
                        echo $aj20[0]->a . ',';
                        echo $aj21[0]->a . ',';
                        echo $aj22[0]->a . ',';
                        echo $aj23[0]->a . ',';
                        echo $aj00[0]->a . ',';
                        echo $aj01[0]->a . ',';
                        echo $aj02[0]->a . ',';
                        echo $aj03[0]->a . ',';
                    }
                    if ($jamini == 4) {

                        echo $aj19[0]->a . ',';
                        echo $aj20[0]->a . ',';
                        echo $aj21[0]->a . ',';
                        echo $aj22[0]->a . ',';
                        echo $aj23[0]->a . ',';
                        echo $aj00[0]->a . ',';
                        echo $aj01[0]->a . ',';
                        echo $aj02[0]->a . ',';
                        echo $aj03[0]->a . ',';
                        echo $aj04[0]->a . ',';
                    }
                    if ($jamini == 5) {

                        echo $aj19[0]->a . ',';
                        echo $aj20[0]->a . ',';
                        echo $aj21[0]->a . ',';
                        echo $aj22[0]->a . ',';
                        echo $aj23[0]->a . ',';
                        echo $aj00[0]->a . ',';
                        echo $aj01[0]->a . ',';
                        echo $aj02[0]->a . ',';
                        echo $aj03[0]->a . ',';
                        echo $aj04[0]->a . ',';
                        echo $aj05[0]->a . ',';
                    }
                    if ($jamini == 6) {

                        echo $aj19[0]->a . ',';
                        echo $aj20[0]->a . ',';
                        echo $aj21[0]->a . ',';
                        echo $aj22[0]->a . ',';
                        echo $aj23[0]->a . ',';
                        echo $aj00[0]->a . ',';
                        echo $aj01[0]->a . ',';
                        echo $aj02[0]->a . ',';
                        echo $aj03[0]->a . ',';
                        echo $aj04[0]->a . ',';
                        echo $aj05[0]->a . ',';
                        echo $aj06[0]->a . ',';
                    }
                    ?>


             ],
             lineTension: 0,
             fill: false,
             borderColor: 'orange',
             backgroundColor: 'transparent',
             borderDash: [5, 5],
             pointBorderColor: '',
             pointBackgroundColor: 'rgba(255,150,0,0.5)',
             pointRadius: 4,
             pointHoverRadius: 10,
             pointHitRadius: 30,
             pointBorderWidth: 3,
             pointStyle: 'squaRounded',
             datalabels: {
                 anchor: 'start',
                 align: 'start',
                 offset: 3,
                 backgroundColor: 'white'
             }

         }]
     };

     var chartOptions = {
         legend: {
             display: true,
             position: 'bottom',

             labels: {
                 boxWidth: 10,
                 fontColor: 'black'
             }
         }
     };

     var lineChart = new Chart(speedCanvas, {
         type: 'line',
         data: speedData,
         options: chartOptions,

     });
 </script>
 <script>
     var speedCanvas = document.getElementById("unitberedar");

     Chart.defaults.global.defaultFontFamily = "Lato";
     Chart.defaults.global.defaultFontSize = 15;

     var speedData = {
         labels: [
             <?php
                date_default_timezone_set('Asia/Singapore');
                $jamini = date("H");

                if ($jamini == 7 || $jamini == 8 || $jamini == 9 || $jamini == 10 || $jamini == 11 || $jamini == 12 || $jamini == 13 || $jamini == 14 || $jamini == 15 || $jamini == 16 || $jamini == 17 || $jamini == 18) {  ?> "07:00", "08:00", "09:00", "10:00", "11:00", "12:00",
                 "13:00", "14:00", "15:00", "16:00", "17:00", "18:00",


             <?php } ?>
             <?php
                date_default_timezone_set('Asia/Singapore');
                $jamini = date("H");

                if ($jamini == 19 || $jamini == 20 || $jamini == 21 || $jamini == 22 || $jamini == 23 || $jamini == 00 || $jamini == 01 || $jamini == 02 || $jamini == 03 || $jamini == 04 || $jamini == 05 || $jamini == 06) {  ?> "19:00", "20:00", "21:00", "22:00", "23:00",
                 "00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00",
             <?php } ?>
         ],
         datasets: [{
             label: " Ritasi(Total Trip)",
             data: [
                 <?php
                    date_default_timezone_set('Asia/Singapore');
                    $jamini = date("H");

                    ?>
                 <?php



                    if ($jamini == 7) {
                        echo $aj7[0]->b . ',';
                    }

                    if ($jamini == 8) {
                        echo $aj7[0]->b . ',';
                        echo $aj8[0]->b . ',';
                    }
                    if ($jamini == 9) {
                        echo $aj7[0]->b . ',';
                        echo $aj8[0]->b . ',';
                        echo $aj9[0]->b . ',';
                    }
                    if ($jamini == 10) {
                        echo $aj7[0]->b . ',';
                        echo $aj8[0]->b . ',';
                        echo $aj9[0]->b . ',';
                        echo $aj10[0]->b . ',';
                    }
                    if ($jamini == 11) {
                        echo $aj7[0]->b . ',';
                        echo $aj8[0]->b . ',';
                        echo $aj9[0]->b . ',';
                        echo $aj10[0]->b . ',';
                        echo $aj11[0]->b . ',';
                    }
                    if ($jamini == 12) {
                        echo $aj7[0]->b . ',';
                        echo $aj8[0]->b . ',';
                        echo $aj9[0]->b . ',';
                        echo $aj10[0]->b . ',';
                        echo $aj11[0]->b . ',';
                        echo $aj12[0]->b . ',';
                    }
                    if ($jamini == 13) {
                        echo $aj7[0]->b . ',';
                        echo $aj8[0]->b . ',';
                        echo $aj9[0]->b . ',';
                        echo $aj10[0]->b . ',';
                        echo $aj11[0]->b . ',';
                        echo $aj12[0]->b . ',';
                        echo $aj13[0]->b . ',';
                    }
                    if ($jamini == 14) {
                        echo $aj7[0]->b . ',';
                        echo $aj8[0]->b . ',';
                        echo $aj9[0]->b . ',';
                        echo $aj10[0]->b . ',';
                        echo $aj11[0]->b . ',';
                        echo $aj12[0]->b . ',';
                        echo $aj13[0]->b . ',';
                        echo $aj14[0]->b . ',';
                    }
                    if ($jamini == 15) {
                        echo $aj7[0]->b . ',';
                        echo $aj8[0]->b . ',';
                        echo $aj9[0]->b . ',';
                        echo $aj10[0]->b . ',';
                        echo $aj11[0]->b . ',';
                        echo $aj12[0]->b . ',';
                        echo $aj13[0]->b . ',';
                        echo $aj14[0]->b . ',';
                        echo $aj15[0]->b . ',';
                    }
                    if ($jamini == 16) {
                        echo $aj7[0]->b . ',';
                        echo $aj8[0]->b . ',';
                        echo $aj9[0]->b . ',';
                        echo $aj10[0]->b . ',';
                        echo $aj11[0]->b . ',';
                        echo $aj12[0]->b . ',';
                        echo $aj13[0]->b . ',';
                        echo $aj14[0]->b . ',';
                        echo $aj15[0]->b . ',';
                        echo $aj16[0]->b . ',';
                    }
                    if ($jamini == 17) {
                        echo $aj7[0]->b . ',';
                        echo $aj8[0]->b . ',';
                        echo $aj9[0]->b . ',';
                        echo $aj10[0]->b . ',';
                        echo $aj11[0]->b . ',';
                        echo $aj12[0]->b . ',';
                        echo $aj13[0]->b . ',';
                        echo $aj14[0]->b . ',';
                        echo $aj15[0]->b . ',';
                        echo $aj16[0]->b . ',';
                        echo $aj17[0]->b . ',';
                    }
                    if ($jamini == 18) {
                        echo $aj7[0]->b . ',';
                        echo $aj8[0]->b . ',';
                        echo $aj9[0]->b . ',';
                        echo $aj10[0]->b . ',';
                        echo $aj11[0]->b . ',';
                        echo $aj12[0]->b . ',';
                        echo $aj13[0]->b . ',';
                        echo $aj14[0]->b . ',';
                        echo $aj15[0]->b . ',';
                        echo $aj16[0]->b . ',';
                        echo $aj17[0]->b . ',';
                        echo $aj18[0]->b . ',';
                    }
                    if ($jamini == 19) {

                        echo $aj19[0]->b . ',';
                    }
                    if ($jamini == 20) {
                        echo $aj19[0]->b . ',';
                        echo $aj20[0]->b . ',';
                    }
                    if ($jamini == 21) {

                        echo $aj19[0]->b . ',';
                        echo $aj20[0]->b . ',';
                        echo $aj21[0]->b . ',';
                    }
                    if ($jamini == 22) {

                        echo $aj19[0]->b . ',';
                        echo $aj20[0]->b . ',';
                        echo $aj21[0]->b . ',';
                        echo $aj22[0]->b . ',';
                    }
                    if ($jamini == 23) {

                        echo $aj19[0]->b . ',';
                        echo $aj20[0]->b . ',';
                        echo $aj21[0]->b . ',';
                        echo $aj22[0]->b . ',';
                        echo $aj23[0]->b . ',';
                    }
                    if ($jamini == 0) {

                        echo $aj19[0]->b . ',';
                        echo $aj20[0]->b . ',';
                        echo $aj21[0]->b . ',';
                        echo $aj22[0]->b . ',';
                        echo $aj23[0]->b . ',';
                        echo $aj00[0]->b . ',';
                    }
                    if ($jamini == 1) {

                        echo $aj19[0]->b . ',';
                        echo $aj20[0]->b . ',';
                        echo $aj21[0]->b . ',';
                        echo $aj22[0]->b . ',';
                        echo $aj23[0]->b . ',';
                        echo $aj00[0]->b . ',';
                        echo $aj01[0]->b . ',';
                    }
                    if ($jamini == 2) {

                        echo $aj19[0]->b . ',';
                        echo $aj20[0]->b . ',';
                        echo $aj21[0]->b . ',';
                        echo $aj22[0]->b . ',';
                        echo $aj23[0]->b . ',';
                        echo $aj00[0]->b . ',';
                        echo $aj01[0]->b . ',';
                        echo $aj02[0]->b . ',';
                    }
                    if ($jamini == 3) {

                        echo $aj19[0]->b . ',';
                        echo $aj20[0]->b . ',';
                        echo $aj21[0]->b . ',';
                        echo $aj22[0]->b . ',';
                        echo $aj23[0]->b . ',';
                        echo $aj00[0]->b . ',';
                        echo $aj01[0]->b . ',';
                        echo $aj02[0]->b . ',';
                        echo $aj03[0]->b . ',';
                    }
                    if ($jamini == 4) {

                        echo $aj19[0]->b . ',';
                        echo $aj20[0]->b . ',';
                        echo $aj21[0]->b . ',';
                        echo $aj22[0]->b . ',';
                        echo $aj23[0]->b . ',';
                        echo $aj00[0]->b . ',';
                        echo $aj01[0]->b . ',';
                        echo $aj02[0]->b . ',';
                        echo $aj03[0]->b . ',';
                        echo $aj04[0]->b . ',';
                    }
                    if ($jamini == 5) {

                        echo $aj19[0]->b . ',';
                        echo $aj20[0]->b . ',';
                        echo $aj21[0]->b . ',';
                        echo $aj22[0]->b . ',';
                        echo $aj23[0]->b . ',';
                        echo $aj00[0]->b . ',';
                        echo $aj01[0]->b . ',';
                        echo $aj02[0]->b . ',';
                        echo $aj03[0]->b . ',';
                        echo $aj04[0]->b . ',';
                        echo $aj05[0]->b . ',';
                    }
                    if ($jamini == 6) {

                        echo $aj19[0]->b . ',';
                        echo $aj20[0]->b . ',';
                        echo $aj21[0]->b . ',';
                        echo $aj22[0]->b . ',';
                        echo $aj23[0]->b . ',';
                        echo $aj00[0]->b . ',';
                        echo $aj01[0]->b . ',';
                        echo $aj02[0]->b . ',';
                        echo $aj03[0]->b . ',';
                        echo $aj04[0]->b . ',';
                        echo $aj05[0]->b . ',';
                        echo $aj06[0]->b . ',';
                    }
                    ?>


             ],
             lineTension: 0,
             fill: false,
             borderColor: 'orange',
             backgroundColor: 'transparent',
             borderDash: [5, 5],
             pointBorderColor: '',
             pointBackgroundColor: 'rgba(255,150,0,0.5)',
             pointRadius: 4,
             pointHoverRadius: 10,
             pointHitRadius: 30,
             pointBorderWidth: 3,
             pointStyle: 'squaRounded',
             datalabels: {
                 anchor: 'start',
                 align: 'start',
                 offset: 3,
                 backgroundColor: 'white'
             }

         }]
     };

     var chartOptions = {
         legend: {
             display: true,
             position: 'bottom',

             labels: {
                 boxWidth: 10,
                 fontColor: 'black'
             }
         }
     };

     var lineChart = new Chart(speedCanvas, {
         type: 'line',
         data: speedData,
         options: chartOptions,

     });
 </script>


 </body>

 </html>