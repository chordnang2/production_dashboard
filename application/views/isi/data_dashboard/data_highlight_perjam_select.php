 <!-- Content Wrapper. Contains page content -->
 <div>
     <div class="content-wrapper">

         <div class="row clearfix">
         </div>


         <br>
         <?php
            $daily = 39752;
            $monthly = 1192562;
            $year = 13710000;
            $dailypersen = number_format($fd[0]->sum / $daily * 100, 1, '.', '');
            $monthlypersen = number_format(($fm[0]->sum + 582840) / $monthly * 100, 1, '.', '');
            $yearlypersen = number_format(($fy[0]->sum + 9476727) / $year * 100, 1, '.', '');
            date_default_timezone_set('Asia/Singapore');
            $t = strtotime("today");
            $tanggalsekarang = date("d", $t);
            $bulansekarang = date("m", $t);
            $tahunsekarang = date("Y", $t);
            $MTD = number_format($daily * $tanggalsekarang, 0, ',', '.');
            $YTD = 9530945.60085124;
            $MTDpersen = round(number_format((582840 + $fm[0]->sum) / ($daily * $tanggalsekarang) * 100, 1, ',', ','));
            $YTDpersen = round(number_format((9476727 + $fy[0]->sum) / $YTD * 100, 1, ',', ''));



            if ($dailypersen < 30) {
                $statusdaily = "danger";
            } else if ($dailypersen > 60) {
                $statusdaily = "success";
            } else {
                $statusdaily = "warning";
            }

            if ($monthlypersen < 30) {
                $statusmontly = "danger";
            } else if ($monthlypersen > 60) {
                $statusmontly = "success";
            } else {
                $statusmontly = "warning";
            }


            if ($yearlypersen < 30) {
                $statusyearly = "danger";
            } else if ($yearlypersen > 60) {
                $statusyearly = "success";
            } else {
                $statusyearly = "warning";
            }

            if ($MTDpersen < 30) {
                $statusmtd = "danger";
            } else if ($MTDpersen > 60) {
                $statusmtd = "success";
            } else {
                $statusmtd = "warning";
            }
            if ($YTDpersen < 30) {
                $statusytd = "danger";
            } else if ($YTDpersen > 60) {
                $statusytd = "success";
            } else {
                $statusytd = "warning";
            }


            ?>
         <div class="content">
             <div class="container-fluid">

                 <div class="col-12">
                     <div class="card card-info">
                         <div class="card-header">
                             <?php echo form_open('Isi_highlight/pro_jam_bydate'); ?>
                             <h3 class="card-title">Filter Date</h3>
                         </div>
                         <!-- /.card-header -->
                         <!-- form start -->
                         <form class="form-horizontal">
                             <div class="card-body">
                                 <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
                                 <div class="form-group row">
                                     <div class="col-sm-6">
                                         <select class="form-control select2" name="a" style="width: 100%;">
                                             <option selected="selected"></option>
                                             <?php foreach ($filterdate as $g) : ?>
                                                 <option><?php echo $g->date ?></option>
                                             <?php endforeach; ?>
                                         </select>
                                     </div>
                                     <div class="col-sm-2">
                                         <button style="width: 100%;" type="submit" class="btn btn-info">Cari</button>
                                         <?php echo form_close() ?>
                                     </div>
                                     <div class="col-sm-2">
                                         <a href="<?php echo site_url('Isi_highlight/pro_jam') ?>">
                                             <button style="width: 100%;" type="submit" class="btn btn-default float-right">Kembali</button>
                                         </a>
                                     </div>
                                     <div class="col-sm-2">
                                         <button style="width: 100%;" class="btn btn-block btn-outline-info float-right">Tanggal : <?php echo $ul[0]->date ?></button>
                                     </div>
                                 </div>
                             </div>
                     </div>
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
                                 <h3 class="card-title">TOTAL TRIP PER TIPE VESSEL RAW COAL</h3>
                             </div>
                         </div>
                         <div class="card-body">
                             <canvas id="sumtriptiperaw" height="250" widht=""></canvas>
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
                                 <h3 class="card-title">TOTAL TRIP PER TIPE VESSEL CRUSH COAL</h3>
                             </div>
                         </div>
                         <div class="card-body">
                             <canvas id="sumtriptipercrush" height="250" widht=""></canvas>
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