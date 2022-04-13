 <!-- Content Wrapper. Contains page content -->

 <div>

     <div class="content-wrapper">



         <div class="row clearfix">

         </div>





         <br>

         <?php

            date_default_timezone_set('Asia/Singapore');

            $t = strtotime("today");
            $tgl = date('d', $t);
            $bulan_actual = date('Y-m', $t);
            $your_date = strtotime("2021-09-00");

            $datediff = $t - $your_date;

            // $YTD_daily = $tgl * $numberDays;
            if ($bulan_actual == $forecast[0]['bulan2']) {
                $YTD_daily = ($forecast[0]['target_kontrak_bulanan'] / ($forecast[0]['jumlah_hari'] - $forecast[0]['day_off'] - $forecast[0]['suspend'])) * $tgl;
            }
            if ($bulan_actual == $forecast[1]['bulan2']) {
                $YTD_daily = ($forecast[0]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[1]['target_kontrak_bulanan'] / ($forecast[1]['jumlah_hari'] - $forecast[1]['day_off'] - $forecast[1]['suspend'])) * $tgl;
            }
            if ($bulan_actual == $forecast[2]['bulan2']) {
                $YTD_daily = ($forecast[0]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[1]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[2]['target_kontrak_bulanan'] / ($forecast[2]['jumlah_hari'] - $forecast[2]['day_off'] - $forecast[2]['suspend'])) * $tgl;
            }
            if ($bulan_actual == $forecast[3]['bulan2']) {
                $YTD_daily = ($forecast[0]['target_kontrak_bulanan'])
                    +  $YTD_daily = ($forecast[1]['target_kontrak_bulanan'])
                    +  $YTD_daily = ($forecast[2]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[3]['target_kontrak_bulanan'] / ($forecast[3]['jumlah_hari'] - $forecast[3]['day_off'] - $forecast[3]['suspend'])) * $tgl;
            }
            if ($bulan_actual == $forecast[4]['bulan2']) {
                $YTD_daily = ($forecast[0]['target_kontrak_bulanan'])
                    +  $YTD_daily = ($forecast[1]['target_kontrak_bulanan'])
                    +  $YTD_daily = ($forecast[2]['target_kontrak_bulanan'])
                    +  $YTD_daily = ($forecast[3]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[4]['target_kontrak_bulanan'] / ($forecast[4]['jumlah_hari'] - $forecast[4]['day_off'] - $forecast[4]['suspend'])) * $tgl;
            }
            if ($bulan_actual == $forecast[5]['bulan2']) {
                $YTD_daily = ($forecast[0]['target_kontrak_bulanan'])
                    +  $YTD_daily = ($forecast[1]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[2]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[3]['target_kontrak_bulanan'])
                    +  $YTD_daily = ($forecast[4]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[5]['target_kontrak_bulanan'] / ($forecast[5]['jumlah_hari'] - $forecast[5]['day_off'] - $forecast[5]['suspend'])) * $tgl;
            }
            if ($bulan_actual == $forecast[6]['bulan2']) {
                $YTD_daily = ($forecast[0]['target_kontrak_bulanan'])
                    +  $YTD_daily = ($forecast[1]['target_kontrak_bulanan'])
                    +  $YTD_daily = ($forecast[2]['target_kontrak_bulanan'])
                    +  $YTD_daily = ($forecast[3]['target_kontrak_bulanan'])
                    +  $YTD_daily = ($forecast[4]['target_kontrak_bulanan'])
                    +  $YTD_daily = ($forecast[5]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[6]['target_kontrak_bulanan'] / ($forecast[6]['jumlah_hari'] - $forecast[6]['day_off'] - $forecast[6]['suspend'])) * $tgl;
            }
            if ($bulan_actual == $forecast[7]['bulan2']) {
                $YTD_daily = ($forecast[0]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[1]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[2]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[3]['target_kontrak_bulanan'])
                    +  $YTD_daily = ($forecast[4]['target_kontrak_bulanan'])
                    +  $YTD_daily = ($forecast[5]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[6]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[7]['target_kontrak_bulanan'] / ($forecast[7]['jumlah_hari'] - $forecast[7]['day_off'] - $forecast[7]['suspend'])) * $tgl;
            }
            if ($bulan_actual == $forecast[8]['bulan2']) {
                $YTD_daily = ($forecast[0]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[1]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[2]['target_kontrak_bulanan'])
                    +  $YTD_daily = ($forecast[3]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[4]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[5]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[6]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[7]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[8]['target_kontrak_bulanan'] / ($forecast[8]['jumlah_hari'] - $forecast[8]['day_off'] - $forecast[8]['suspend'])) * $tgl;
            }
            if ($bulan_actual == $forecast[9]['bulan2']) {
                $YTD_daily = ($forecast[0]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[1]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[2]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[3]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[4]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[5]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[6]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[7]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[8]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[9]['target_kontrak_bulanan'] / ($forecast[9]['jumlah_hari'] - $forecast[9]['day_off'] - $forecast[9]['suspend'])) * $tgl;
            }
            if ($bulan_actual == $forecast[10]['bulan2']) {
                $YTD_daily = ($forecast[0]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[1]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[2]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[3]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[4]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[5]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[6]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[7]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[8]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[9]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[10]['target_kontrak_bulanan'] / ($forecast[10]['jumlah_hari'] - $forecast[10]['day_off'] - $forecast[10]['suspend'])) * $tgl;
            }
            if ($bulan_actual == $forecast[11]['bulan2']) {
                $YTD_daily = ($forecast[0]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[1]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[2]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[3]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[4]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[5]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[6]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[7]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[8]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[9]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[10]['target_kontrak_bulanan'])
                    + $YTD_daily = ($forecast[11]['target_kontrak_bulanan'] / ($forecast[11]['jumlah_hari'] - $forecast[11]['day_off'] - $forecast[11]['suspend'])) * $tgl;
            }

            $jumhariplan = round($datediff / (60 * 60 * 24));



            ?>

         <?php for ($i = 0; $i < 12; $i++) {
                if ($bulan_actual == $forecast[$i]['bulan2']) {
                    $daily = $forecast[$i]['target_kontrak_bulanan'] / ($forecast[$i]['jumlah_hari'] - $forecast[$i]['day_off'] - $forecast[$i]['suspend']);
                    $monthly = $forecast[$i]['target_kontrak_bulanan'];
                };
            };

            $year = $forecast[0]['target_kontrak_bulanan']
                + $forecast[1]['target_kontrak_bulanan']
                + $forecast[2]['target_kontrak_bulanan']
                + $forecast[3]['target_kontrak_bulanan']
                + $forecast[4]['target_kontrak_bulanan']
                + $forecast[5]['target_kontrak_bulanan']
                + $forecast[6]['target_kontrak_bulanan']
                + $forecast[7]['target_kontrak_bulanan']
                + $forecast[8]['target_kontrak_bulanan']
                + $forecast[9]['target_kontrak_bulanan']
                + $forecast[10]['target_kontrak_bulanan']
                + $forecast[11]['target_kontrak_bulanan'] - 10000;

            $dailypersen = number_format($fd[0]->sum / $daily * 100, 1, '.', '');

            $monthlypersen = number_format(($fm[0]->sum) / $monthly * 100, 1, '.', '');

            $yearlypersen = number_format(($fy[0]->sum) / $year * 100, 1, '.', '');

            date_default_timezone_set('Asia/Singapore');

            $t = strtotime("today");

            $tanggalsekarang = date("d", $t);

            $bulansekarang = date("m", $t);

            $tahunsekarang = date("Y", $t);

            $MTD = number_format($daily * $tanggalsekarang, 0, ',', '.');


            $MTDpersen = round(number_format(($fm[0]->sum) / ($daily * $tanggalsekarang) * 100, 1, ',', ','));

            $YTDpersen = round(number_format(($fy[0]->sum) / $YTD_daily * 100, 1, ',', ''));







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
            } else if ($yearlypersen > 95) {

                $statusyearly = "success";
            } else {

                $statusyearly = "warning";
            }



            if ($MTDpersen < 90) {

                $statusmtd = "danger";
            } else if ($MTDpersen > 97) {

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

            if (ROUND($avg_tonbagihm[0]['avg_tonbagihm'] / 48.5 * 100, 1) < 100) {

                $statusavgtonhm = "danger";
            } else {

                $statusavgtonhm = "success";
            }





            ?>




         <div class="content">

             <div class="container-fluid">

                 <div class="row">

                     <!-- <div class="col-lg-6">

                         <div class="card">

                             <div class="card-header">

                                 <code>'Update terakhir tanggal <?= $last_date_update_id[0]['date']; ?> jam <?= $last_date_update_id[0]['time_out']; ?> shift <?= $last_date_update_id[0]['shift']; ?>'</code>

                             </div>

                         </div>

                     </div>
                     <div class="col-lg-6">

                         <div class="card">

                             <div class="card-header">
                                 <div class="row">
                                     <div class="col-lg-4"><span class="info-box-text"> Average Ton/HM = <?php echo $avg_tonbagihm[0]['avg_tonbagihm'] ?></span></div>
                                     <div class="col-lg-8"><code>Update Ton/Hm terakhir tanggal <?php echo $last_date_avg_tonhm[0]['date'] ?> </code></div>
                                 </div>

                             </div>

                         </div>

                     </div> -->

                     <div class="col-lg-4">

                         <div class="progress">

                             <div class="progress-bar bg-<?= $statusdaily ?> progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $dailypersen ?>%">

                             </div>

                         </div>

                         <div class="info-box">

                             <div class="col-lg-5">

                                 <div class="info-box-content">

                                     <span class="info-box-text"> Daily Plan</span>

                                     <span class="info-box-number"><?php echo number_format($daily, 0, ',', '.')  ?> Ton</span>

                                 </div>

                             </div>

                             <div class="col-lg-5">

                                 <div class="info-box-content">

                                     <span class="info-box-text">Daily Actual</span>

                                     <span class="info-box-number"><?php echo number_format($fd[0]->sum, 0, ',', '.') ?> Ton</span>

                                 </div>

                             </div>

                             <div class="col-lg-2">

                                 <div class="info-box-content">

                                     <span class="info-box-text">%</span>

                                     <span class="info-box-number"><?php echo number_format($fd[0]->sum / $daily * 100, 1, ',', ',') ?>%</span>

                                 </div>

                             </div>

                         </div>

                     </div>

                     <div class="col-lg-4">

                         <div class="progress">

                             <div class="progress-bar bg-<?= $statusmontly ?> progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $monthlypersen ?>%">

                             </div>

                         </div>

                         <div class="info-box">

                             <div class="col-lg-5">

                                 <div class="info-box-content">

                                     <span class="info-box-text"> Monthly Plan</span>

                                     <span class="info-box-number"><?php echo number_format($monthly, 0, ',', '.') ?> Ton</span>

                                 </div>

                             </div>

                             <div class="col-lg-5">

                                 <div class="info-box-content">

                                     <span class="info-box-text">Monthly Actual</span>

                                     <span class="info-box-number"><?php echo  number_format($fm[0]->sum, 0, ',', '.') ?> Ton</span>

                                 </div>

                             </div>

                             <div class="col-lg-2">

                                 <div class="info-box-content">

                                     <span class="info-box-text">%</span>

                                     <span class="info-box-number"><?php echo number_format(($fm[0]->sum) / $monthly * 100, 1, ',', '') ?>%</span>

                                 </div>

                             </div>

                         </div>

                     </div>



                     <div class="col-lg-4">

                         <div class="progress">

                             <div class="progress-bar bg-<?= $statusyearly ?> progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo  $yearlypersen ?>%">

                             </div>

                         </div>

                         <div class="info-box">

                             <div class="col-lg-5">

                                 <div class="info-box-content">

                                     <span class="info-box-text"> Yearly Plan</span>

                                     <span class="info-box-number"><?php echo  number_format($year, 0, ',', '.')  ?> Ton</span>

                                 </div>

                             </div>

                             <div class="col-lg-5">

                                 <div class="info-box-content">

                                     <span class="info-box-text">Yearly Actual</span>

                                     <span class="info-box-number"><?php echo   number_format($fy[0]->sum, 0, ',', '.') ?> Ton</span>

                                 </div>

                             </div>

                             <div class="col-lg-2">

                                 <div class="info-box-content">

                                     <span class="info-box-text">%</span>

                                     <span class="info-box-number"><?php echo number_format(($fy[0]->sum) / $year * 100, 1, ',', '') ?>%</span>

                                 </div>

                             </div>

                         </div>

                     </div>

                 </div>



                 <div class="row">

                     <div class="col-lg-4">

                         <div class="progress">

                             <div class="progress-bar bg-<?= $statusmtd ?> progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo ROUND(number_format(+$fm[0]->sum / ($daily * $tanggalsekarang) * 100, 1, ',', ',')) ?>%">

                             </div>

                         </div>

                         <div class="info-box">

                             <div class="col-lg-5">

                                 <div class="info-box-content">

                                     <span class="info-box-text"> MTD Plan</span>

                                     <span class="info-box-number"><?php echo number_format($daily * $tanggalsekarang, 0, ',', '.')  ?> Ton</span>

                                 </div>

                             </div>

                             <div class="col-lg-5">

                                 <div class="info-box-content">

                                     <span class="info-box-text">MTD Actual</span>

                                     <span class="info-box-number"><?php echo  number_format($fm[0]->sum, 0, ',', '.') ?> Ton</span>

                                 </div>

                             </div>

                             <div class="col-lg-2">

                                 <div class="info-box-content">

                                     <span class="info-box-text">%</span>

                                     <span class="info-box-number"><?php echo number_format(+$fm[0]->sum / ($daily * $tanggalsekarang) * 100, 1, ',', ',') ?>%</span>

                                 </div>

                             </div>

                         </div>

                     </div>



                     <div class="col-lg-4">

                         <div class="progress">

                             <div class="progress-bar bg-<?= $statusytd ?> progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $YTDpersen ?>%">

                             </div>

                         </div>

                         <div class="info-box">

                             <div class="col-lg-5">

                                 <div class="info-box-content">

                                     <span class="info-box-text"> YTD Plan</span>

                                     <span class="info-box-number"><?php echo number_format($YTD_daily, 0, ',', '.') ?> Ton</span>

                                 </div>

                             </div>

                             <div class="col-lg-5">

                                 <div class="info-box-content">

                                     <span class="info-box-text">YTD Actual</span>

                                     <span class="info-box-number"><?php echo   number_format($fy[0]->sum, 0, ',', '.') ?> Ton</span>

                                 </div>

                             </div>

                             <div class="col-lg-2">

                                 <div class="info-box-content">

                                     <span class="info-box-text">%</span>

                                     <span class="info-box-number"><?php echo number_format(($fy[0]->sum) / $YTD_daily * 100, 1, ',', '') ?>%</span>

                                 </div>

                             </div>

                         </div>

                     </div>
                     <div class="col-lg-4">

                         <div class="progress">
                             <div class="progress-bar bg-<?php echo $statusavgtonhm ?> progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:   <?php echo ROUND($avg_tonbagihm[0]['avg_tonbagihm'] / 48.5 * 100, 1) ?>%">

                             </div>

                         </div>

                         <div class="info-box">

                             <div class="col-lg-5">

                                 <div class="info-box-content">

                                     <span class="info-box-text"> AVG Ton/Hm Plan</span>

                                     <span class="info-box-number"><?php echo number_format(48.5, 1, ',', '.') ?> Ton/Hm</span>

                                 </div>

                             </div>

                             <div class="col-lg-5">

                                 <div class="info-box-content">

                                     <span class="info-box-text">AVG Ton/Hm Actual</span>

                                     <span class="info-box-number"><?php echo   number_format($avg_tonbagihm[0]['avg_tonbagihm'], 1, ',', '.') ?> Ton/Hm</span>

                                 </div>

                             </div>

                             <div class="col-lg-2">

                                 <div class="info-box-content">

                                     <span class="info-box-text">%</span>

                                     <span class="info-box-number"><?php echo ROUND($avg_tonbagihm[0]['avg_tonbagihm'] / 48.5 * 100, 1) ?>%</span>

                                 </div>

                             </div>

                         </div>

                     </div>

                 </div>

             </div>



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