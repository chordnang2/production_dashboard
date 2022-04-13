 <!-- Content Wrapper. Contains page content -->
 <div>
     <div class="content-wrapper">

         <div class="row clearfix">
         </div>


         <br>
         <div class="content">
             <div class="col-12 ">
                 <div class="card card-info collapsed-card">
                     <div class="card-header">
                         <h3 class="card-title">Filter Date</h3>

                         <div class="card-tools">
                             <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                 <i class="fas fa-plus"></i>
                             </button>
                             <button type="button" class="btn btn-tool" data-card-widget="remove">
                                 <i class="fas fa-times"></i>
                             </button>
                         </div>
                         <?php echo form_open('Isi_highlight/pro_jam_bydate'); ?>
                     </div>
                     <div class="card-body">
                         <div class="card-body">
                             <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
                             <div class="form-group row">
                                 <div class="col-sm-8">
                                     <select class="form-control select2" name="a" style="width: 100%;">
                                         <option selected="selected"></option>
                                         <?php foreach ($filterdate as $g) : ?>
                                             <option><?php echo $g->date ?></option>
                                         <?php endforeach; ?>
                                     </select>
                                 </div>
                                 <div class="col-sm-4">
                                     <button style="width: 100%;" type="submit" class="btn btn-info">Cari</button>
                                     <?php echo form_close() ?>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- /.card-body -->
                 </div>
             </div>
             <div class="row">
                 <div class="col-lg-6">
                     <div class="card">
                         <div class="card-header border-0">
                             <div class="d-flex justify-content-between">
                                 <h3 class="card-title">Monitoring Produksi



                                     <?php

                                        ?>
                                 </h3>
                             </div>
                         </div>
                         <div class="card-body">
                             <canvas id="speedChart3" height="250" widht=""></canvas>
                         </div>
                     </div>
                     <div class="card">
                         <div class="card-header border-0">
                             <div class="d-flex justify-content-between">
                                 <h3 class="card-title">Total of Unit



                                     <?php

                                        ?>
                                 </h3>
                             </div>
                         </div>
                         <div class="card-body">
                             <canvas id="totaltrip" height="250" widht=""></canvas>
                         </div>
                     </div>
                     <!-- /.card -->
                     <div class="card">
                         <div class="card-header border-0">
                             <div class="d-flex justify-content-between">
                                 <h3 class="card-title">Average Muatan/Lokasi</h3>
                             </div>
                         </div>
                         <div class="card-body">
                             <canvas id="averagemuatan" height="250" widht=""></canvas>
                         </div>
                     </div>
                     <div class="card">
                         <div class="card-header border-0">
                             <div class="d-flex justify-content-between">
                                 <h3 class="card-title">Average Muatan/Tipe Vessel</h3>
                             </div>
                         </div>
                         <div class="card-body">
                             <canvas id="averagemuatan_tipevessel" height="250" widht=""></canvas>
                         </div>
                     </div>
                     <div class="card">
                         <div class="card-header border-0">
                             <div class="d-flex justify-content-between">
                                 <h3 class="card-title">Trip per lokasi</h3>
                             </div>
                         </div>
                         <div class="card-body">
                             <canvas id="triplokasi" height="250" widht=""></canvas>
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
                             <canvas id="ritasi" height="250" widht=""></canvas>
                         </div>
                     </div>
                     <div class="card">
                         <div class="card-header border-0">
                             <div class="d-flex justify-content-between">
                                 <h3 class="card-title">Ritasi(Total Trip)



                                     <?php

                                        ?>
                                 </h3>
                             </div>
                         </div>
                         <div class="card-body">
                             <canvas id="unitberedar" height="250" widht=""></canvas>
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



                             <canvas id="underload" height="250" widht=""></canvas>

                             <!-- <?php foreach ($ul as $u) : ?>
                 <p class="font-weight-normal"> <?= $u->lokasi ?>=<?= $u->count ?></h7>
                 </p>
               <?php endforeach; ?> -->
                         </div>
                     </div>
                     <div class="card">
                         <div class="card-header border-0">
                             <div class="d-flex justify-content-between">
                                 <h3 class="card-title">Total Ton KM per lokasi</h3>
                                 <!-- <a href="javascript:void(0);">View Report</a> -->
                             </div>
                         </div>
                         <div class="card-body">

                             <canvas id="tonkm" height="250" widht=""></canvas>

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