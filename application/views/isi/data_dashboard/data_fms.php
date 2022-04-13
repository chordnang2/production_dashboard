 <!-- Content Wrapper. Contains page content -->
 <div>
     <div class="content-wrapper">

         <div class="row clearfix">
         </div>

         <br>
         <div class="content">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-header">
                                 <form action="<?php echo base_url() ?>Isi_geofence/dashboard_fms" method="post">
                                     <input type="month" name="bulan">
                                     <button id="load" type="submit">Load data</button>&nbsp;
                                 </form>
                             </div>
                             <div class="card-header ui-sortable-handle" style="cursor: move;">
                                 <h3 class="card-title">
                                     <i class="fas fa-chart-pie mr-1"></i>
                                     Average Detail Waktu 1 Cycle (jam) <code>based on FMS</code>
                                 </h3>
                                 <!-- <div class="card-tools">
                                     <ul class="nav nav-pills ml-auto">
                                         <div class="chart tab-pane active" id="avg_durasi-chart">
                                             BULAN :
                                             <button id="fms1" type="button"> November</button>
                                             <button id="fms2" type="button"> Desember</button>
                                         </div>
                                     </ul>
                                 </div> -->
                             </div>
                             <div class="card-body">
                                 <div class="tab-content">
                                 </div>
                                 <canvas id="avg_durasi" height="200" style="height: 100px; display: block; width: 577px;" width="577"></canvas>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-header ui-sortable-handle" style="cursor: move;">
                                 <h3 class="card-title">
                                     <i class="fas fa-chart-pie mr-1"></i>
                                     Average Standby 1 Cycle (jam) <code>based on FMS</code>
                                 </h3>
                                 <!-- <div class="card-tools">
                                     <ul class="nav nav-pills ml-auto">
                                         <div class="chart tab-pane active" id="avg_durasi-chart">
                                             BULAN :
                                             <button id="stb1" type="button"> November</button>
                                             <button id="stb2" type="button"> Desember</button>
                                         </div>
                                     </ul>
                                 </div> -->
                             </div>
                             <div class="card-body">
                                 <div class="tab-content">
                                 </div>
                                 <canvas id="avg_stb" height="200" style="height: 100px; display: block; width: 577px;" width="577"></canvas>
                             </div>
                         </div>
                     </div>

                 </div>
                 <!-- /.col-md-6 -->
             </div>
             <!-- /.row -->
         </div>
         <!-- /.container-fluid -->
     </div>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
     <!-- Control sidebar content goes here -->
 </aside>
 <!-- /.control-sidebar -->