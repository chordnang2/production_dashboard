<!--OUTPUT UTAMA  -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <!-- <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">

          </ol>
        </div>
      </div>
    </div>
  </section> -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- <div class="row">
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="row">
              <div class="col-md-12">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fas fa-edit"></i>
                    Dashboard Unit
                  </h3>
                </div>
              </div>
              <div class="col-md-2">
                <div class="card-header">
                  <h3 class="card-title">
                    <?php date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
                    $d = strtotime("yesterday");
                    echo date("Y-m-d ", $d) . "<br>"; ?>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
      <h1>Dashboard Unit</h1>
      <br>
      <div class="row">
        <div class="col-lg-12">
          <h5 class="mb-2">Jumlah Unit dan Breakdown <small><i>Informasi Per Jam</i></small></h5>
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo $unit_produksi; ?></h3>

                  <p>Jumlah Unit Running</p>
                </div>
                <div class="icon">
                  <!-- <i class="fas fa-shopping-cart"></i> -->
                </div>
                <a href="<?= base_url('isi_unit/unit'); ?>" class="small-box-footer">
                  Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo $unit_bd_unsceduleminor; ?></h3>
                  <!-- <sup style="font-size: 20px">%</sup> -->
                  <p>Unit Breakdown Unscedule Minor</p>
                </div>
                <div class="icon">
                  <!-- <i class="ion ion-stats-bars"></i> -->
                </div>
                <a href="<?= base_url('isi_unit/unit'); ?>" class="small-box-footer">
                  Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3><?php echo $unit_bd_unscedulemayor; ?></h3>

                  <p>Unit Breakdown Unscedule Mayor</p>
                </div>
                <div class="icon">
                  <!-- <i class="fas fa-user-plus"></i> -->
                </div>
                <a href="<?= base_url('isi_unit/unit'); ?>" class="small-box-footer">
                  Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo $unit_bd_schedule_; ?></h3>

                  <p>Unit Breakdown Schedule</p>
                </div>
                <div class="icon">
                  <!-- <i class="fas fa-chart-pie"></i> -->
                </div>
                <a href="<?= base_url('isi_unit/unit'); ?>" class="small-box-footer">
                  Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <h5 class="mb-2">Cycle Unit dan Standby Time <small><i>Informasi Hari Sebelumnya</i></small></h5>
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-info">
                <div class="inner">

                  <!-- phpin -->
                  <?php
                  $totalall = 0;
                  $totalnol = 0;
                  foreach ($cycle_time as $trip => $value) {
                    $totalall++; ?>

                    <!-- <label><?php echo $trip;  ?></label><br> -->

                    <?php
                    $jam_total = 0;
                    $menit_total = 0;
                    $detik_total = 0;
                    $floattotimetotal = 0;

                    foreach ($value as $key2 => $value) {
                      // echo $value['geofence']. "<br>";
                      // echo $value['duration']. "<br>";
                      // echo $value['tipe']. "<br>";
                      // echo $value['geofence']. "<br>";
                      $timecore = $value['duration'];
                      $parts = explode(':', $timecore);
                      $jam = $parts[0] * 3600;
                      $menit = $parts[1] * 60;
                      $detik = $parts[2];
                      $jam_total += $jam;
                      $menit_total += $menit;
                      $detik_total += $detik;
                    } ?>
                    <!-- <?= $jam_total . "<br>"; ?><?= $menit_total . "<br>"; ?><?= $detik_total . "<br>"; ?> -->
                    <?php $total = $jam_total + $menit_total + $detik_total ?>
                    <?php $floattotime = $total / 3600 ?>
                    <?php $floattotimetotal += $floattotime; ?>
                    <?php
                    if ($total < "1") {
                      $totalif = 0;
                      $totalnol++;
                    } else {
                      $totalif = $total;
                    }
                    ?>

                    <!-- <?php $totaltotal += $totalif; ?> -->

                    <!-- <?= $totalif ?> -->
                    <!-- munculkan semua data cycle time -->


                  <?php }
                  ?>
                  <!-- <?= $totalall; ?> -->
                  <!-- <?= $totalnol; ?> -->
                  <!-- <?= $countsummary = $totalall - $totalnol; ?> -->

                  <!-- <?= $totaltotal ?> || -->

                  <!-- <?php echo $summary = $totaltotal / $countsummary / 3600 ?> -->
                  <h3><?php echo sprintf('%02d:%02d', (int) $summary, fmod($summary, 1) * 60); ?> </h3>
                  <!-- phpout -->
                  <p>Summary Cycle Time</p>
                </div>
                <div class="icon">
                  <!-- <i class="fas fa-shopping-cart"></i> -->
                </div>
                <a href="#" class="small-box-footer">
                  Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo $travel_time; ?></h3>
                  <!-- <sup style="font-size: 20px">%</sup> -->
                  <p>Travel lebih dari 30 Menit Per lokasi</p>
                </div>
                <div class="icon">
                  <!-- <i class="ion ion-stats-bars"></i> -->
                </div>
                <a href="#" class="small-box-footer">
                  Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo $loading_time; ?></h3>

                  <p>Loading lebih dari 30 Menit</p>
                </div>
                <div class="icon">
                  <!-- <i class="fas fa-user-plus"></i> -->
                </div>
                <a href="#" class="small-box-footer">
                  Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo $tipping_time; ?></h3>

                  <p>Tipping lebih dari 30 Menit</p>
                </div>
                <div class="icon">
                  <!-- <i class="fas fa-chart-pie"></i> -->
                </div>
                <a href="#" class="small-box-footer">
                  Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
          </div>

          <h5 class="mb-2">Jumlah Kejadian Penyumbang Terbesar Lost Time <small><i>Informasi Hari Sebelumnya</i></small></h5>
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <?php foreach ($top_travel_delay as $td) : ?>
                    <h4>
                      <?php echo $td->travel_delay; ?>
                      <sup style="font-size: 15px">
                        <?php echo $td->geofence; ?>
                      </sup>
                    </h4>
                  <?php endforeach; ?>
                  <p>Top Delay Travel</p>
                </div>
                <div class="icon">
                  <!-- <i class="fas fa-shopping-cart"></i> -->
                </div>
                <a href="#" class="small-box-footer">
                  Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <?php foreach ($top_loading_delay as $ld) : ?>
                    <h4>
                      <?php echo $ld->loading_delay; ?>
                      <sup style="font-size: 12px">
                        <?php echo $ld->geofence; ?>
                      </sup>
                    </h4>
                  <?php endforeach; ?>
                  <p>Top Delay Loading</p>
                </div>
                <div class="icon">
                  <!-- <i class="ion ion-stats-bars"></i> -->
                </div>
                <a href="#" class="small-box-footer">
                  Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <?php foreach ($top_tipping_delay as $td) : ?>
                    <h4>
                      <?php echo $td->tipping_delay; ?>
                      <sup style="font-size: 10px">
                        <?php echo $td->geofence; ?>
                      </sup>
                    </h4>
                  <?php endforeach; ?>
                  <p>Top Delay Tipping</p>
                </div>
                <div class="icon">
                  <!-- <i class="fas fa-user-plus"></i> -->
                </div>
                <a href="#" class="small-box-footer">
                  Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <?php foreach ($top_pitstop_delay as $pd) : ?>
                    <h4>
                      <?php echo $pd->pitstop_delay; ?>
                      <sup style="font-size: 10px">
                        <?php echo $pd->geofence; ?>
                      </sup>
                    </h4>
                  <?php endforeach; ?>
                  <p>Top Delay Pitstop</p>
                </div>
                <div class="icon">
                  <!-- <i class="fas fa-chart-pie"></i> -->
                </div>
                <a href="#" class="small-box-footer">
                  Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
          </div>
        </div>
      </div>
    </div>
    <!-- ./row -->

    <!-- /. row -->
</div><!-- /.container-fluid -->
</section>