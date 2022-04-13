 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <!-- <?php date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
            $now = date('H:m');
            $jam_sebelum_shif1 = date('07:00');
            $jam_selesai_shif1 = date('18:59');
            $jam_sebelum_shif2 = date('19:00');
            $jam_selesai_shif2 = date('06:59'); ?>
 -->
     <!-- Main content -->
     <!-- <? echo $net3[0]->a ?>
     <? echo $net3[0]->b ?>
     <? echo $net3[0]->c ?>
     <? echo $net3[0]->d ?>
     <? echo $net3[0]->e ?>
     <? echo $net3[0]->f ?>
     <? echo $net3[0]->g ?>
     <? echo $net3[0]->h ?>
     <? echo $net3[0]->i ?>
     <? echo $net3[0]->j ?>
     <? echo $net3[0]->k ?>
     <? echo $net3[0]->l ?>
     <? echo $net3[0]->m ?>
     <? echo $net3[0]->n ?>
     <? echo $net3[0]->o ?>
     <? echo $net3[0]->p ?>
     <? echo $net3[0]->q ?>
     <? echo $net3[0]->q ?>

     <? echo $net3[0]->q + $net3[0]->r ?>
     <? echo $net3[0]->q + $net3[0]->s ?>
     <? echo $net3[0]->q + $net3[0]->t ?>
     <? echo $net3[0]->q + $net3[0]->u ?>
     <? echo $net3[0]->q + $net3[0]->v ?>
     <? echo $net3[0]->q + $net3[0]->w ?>
     <? echo $net3[0]->q + $net3[0]->x ?>
     <? echo $net3[0]->q + $net3[0]->y ?> -->

     <div class="row clearfix">
         <!-- Bar Chart -->

         <!-- #END# Bar Chart -->
     </div>
     <br>
     <div class="content">
         <div class="container-fluid">
             <div class="row">

                 <div class="col-lg-6">
                     <div class="card">
                         <div class="card-header border-0">
                             <div class="d-flex justify-content-between">
                                 <h3 class="card-title">Monitoring Produksi</h3>
                             </div>
                         </div>
                         <div class="card-body">
                             <canvas id="speedChart3" height="200" widht=""></canvas>
                         </div>
                     </div>
                     <!-- /.card -->
                     <div class="card">
                         <div class="card-header border-0">
                             <div class="d-flex justify-content-between">
                                 <h3 class="card-title">Average Muatan</h3>
                             </div>
                         </div>
                         <div class="card-body">
                             <canvas id="averagemuatan" height="200" widht=""></canvas>
                             <!-- <?php foreach ($am as $u) : ?>
                 <p class="font-weight-normal"> <?= $u->loading_point ?>=<?= number_format($u->a, 2, ",", ".") ?></h7>
                 </p>
               <?php endforeach; ?> -->
                         </div>
                     </div>
                     <div class="card">
                         <div class="card-header border-0">
                             <div class="d-flex justify-content-between">
                                 <h3 class="card-title">Trip per lokasi</h3>
                             </div>
                         </div>
                         <div class="card-body">
                             <canvas id="" height="200" widht=""></canvas>
                             <!-- <?php foreach ($tl as $u) : ?>
                 <p class="font-weight-normal"> <?= $u->lokasi ?>=<?= $u->count ?></h7>
                 </p>
               <?php endforeach; ?> -->
                         </div>
                     </div>
                 </div>
                 <!-- /.col-md-6 -->
                 <div class="col-lg-6">

                     <!-- /.card -->
                     <div class="card">
                         <div class="card-header border-0">
                             <div class="d-flex justify-content-between">
                                 <h3 class="card-title">Average Ritasi</h3>
                                 <!-- <a href="javascript:void(0);">View Report</a> -->
                             </div>
                         </div>
                         <div class="card-body">
                             <canvas id="ritasi" height="200" widht=""></canvas>
                         </div>
                     </div>
                     <div class="card">
                         <div class="card-header border-0">
                             <div class="d-flex justify-content-between">
                                 <h3 class="card-title">Underload per lokasi</h3>
                                 <!-- <a href="javascript:void(0);">View Report</a> -->
                             </div>
                         </div>
                         <div class="card-body">



                             <canvas id="underload" height="200" widht=""></canvas>

                             <!-- <?php foreach ($ul as $u) : ?>
                 <p class="font-weight-normal"> <?= $u->lokasi ?>=<?= $u->count ?></h7>
                 </p>
               <?php endforeach; ?> -->
                         </div>
                     </div>
                     <div class="card">
                         <div class="card-header border-0">
                             <div class="d-flex justify-content-between">
                                 <h3 class="card-title">Total Ton/KM per lokasi</h3>
                                 <!-- <a href="javascript:void(0);">View Report</a> -->
                             </div>
                         </div>
                         <div class="card-body">

                             <canvas id="tonkm" height="200" widht=""></canvas>

                             <!-- <?php foreach ($tk as $u) : ?>
                 <p class="font-weight-normal"> <?= $u->loading_point ?>=<?= $u->a ?></p>
               <?php endforeach; ?> -->

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