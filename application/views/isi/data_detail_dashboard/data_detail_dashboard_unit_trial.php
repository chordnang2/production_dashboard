<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <br>
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <?php echo form_open('Isi_geofence/trip'); ?>
            <div class="col-md-2">
              <div class="form-group">
                <label>Date</label>
                <select class="form-control select2" name="kemaren" style="width: 100%;">
                  <option selected="selected"></option>
                  <?php foreach ($group_by_time_in as $gb) : ?>
                    <option><?php echo $gb->count ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label>Unit</label>
                <select class="form-control select2" name="unit" style="width: 100%;">
                  <option selected="selected"></option>
                  <?php foreach ($grup_unit as $gu) : ?>
                    <option><?php echo $gu->unit ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <input type="submit" value="Cari"></input>
            </div>
            <?php echo form_close() ?>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <!-- <h3><?php echo $trip; ?> </h3> -->
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body ">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>TRIP</th>
                  <th>TRAVEL DURATION</th>
                  <th>LOADING DURATION</th>
                  <th>TIPPING DURATION</th>
                  <th>TOTAL DURATION</th>
                  <th>TRIP DURATION</th>
                  <th>STANDBY DURATION</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 ?>
                <?php $jam_total = 0; ?>
                <?php $menit_total = 0; ?>
                <?php $detik_total = 0; ?>
                <?php $jam_total2 = 0; ?>
                <?php $menit_total2 = 0; ?>
                <?php $detik_total2 = 0; ?>
                <?php $jam_total3 = 0; ?>
                <?php $menit_total3 = 0; ?>
                <?php $detik_total3 = 0; ?>
                <?php $jam_total4 = 0; ?>
                <?php $menit_total4 = 0; ?>
                <?php $detik_total4 = 0; ?>
                <?php $jam_total5 = 0; ?>
                <?php $menit_total5 = 0; ?>
                <?php $detik_total5 = 0; ?>
                <?php $jam_total6 = 0; ?>
                <?php $menit_total6 = 0; ?>
                <?php $detik_total6 = 0; ?>
                <?php foreach ($tripdata as $tp) { ?>
                  <tr>
                    <th> <?= $i++ ?></th>
                    <th> <?php echo $tp['travel_duration'] ?> </th>
                    <th> <?php echo $tp['loading_duration'] ?> </th>
                    <th> <?php echo $tp['tipping_duration'] ?> </th>
                    <th> <?php echo $tp['trip_duration'] ?> </th>
                    <th> <?php echo $tp['total_duration'] ?> </th>
                    <th> <?php echo $tp['standby_duration'] ?> </th>
                    <?php
                    $timecore = $tp['travel_duration'];
                    $parts = explode(':', $timecore);
                    $jam = $parts[0] * 3600;
                    $menit = $parts[1] * 60;
                    $detik = $parts[2];
                    $jam_total += $jam;
                    $menit_total += $menit;
                    $detik_total += $detik;

                    $total = $jam_total + $menit_total + $detik_total;
                    $detikkejam = $total / 3600;
                    ?>

                    <?php
                    $timecore2 = $tp['loading_duration'];
                    $parts2 = explode(':', $timecore2);
                    $jam2 = $parts2[0] * 3600;
                    $menit2 = $parts2[1] * 60;
                    $detik2 = $parts2[2];
                    $jam_total2 += $jam2;
                    $menit_total2 += $menit2;
                    $detik_total2 += $detik2;

                    $total2 = $jam_total2 + $menit_total2 + $detik_total2;
                    $detikkejam2 = $total2 / 3600;
                    ?>

                    <?php
                    $timecore3 = $tp['tipping_duration'];
                    $parts3 = explode(':', $timecore3);
                    $jam3 = $parts3[0] * 3600;
                    $menit3 = $parts3[1] * 60;
                    $detik3 = $parts3[2];
                    $jam_total3 += $jam3;
                    $menit_total3 += $menit3;
                    $detik_total3 += $detik3;

                    $total3 = $jam_total3 + $menit_total3 + $detik_total3;
                    $detikkejam3 = $total3 / 3600;
                    ?>

                    <?php
                    $timecore4 = $tp['trip_duration'];
                    $parts4 = explode(':', $timecore4);
                    $jam4 = $parts4[0] * 3600;
                    $menit4 = $parts4[1] * 60;
                    $detik4 = $parts4[2];
                    $jam_total4 += $jam4;
                    $menit_total4 += $menit4;
                    $detik_total4 += $detik4;

                    $total4 = $jam_total4 + $menit_total4 + $detik_total4;
                    $detikkejam4 = $total4 / 3600;
                    ?>

                    <?php
                    $timecore5 = $tp['total_duration'];
                    $parts5 = explode(':', $timecore5);
                    $jam5 = $parts5[0] * 3600;
                    $menit5 = $parts5[1] * 60;
                    $detik5 = $parts5[2];
                    $jam_total5 += $jam5;
                    $menit_total5 += $menit5;
                    $detik_total5 += $detik5;

                    $total5 = $jam_total5 + $menit_total5 + $detik_total5;
                    $detikkejam5 = $total5 / 3600;
                    ?>

                    <?php
                    $timecore6 = $tp['standby_duration'];
                    $parts6 = explode(':', $timecore6);
                    $jam6 = $parts6[0] * 3600;
                    $menit6 = $parts6[1] * 60;
                    $detik6 = $parts6[2];
                    $jam_total6 += $jam6;
                    $menit_total6 += $menit6;
                    $detik_total6 += $detik6;

                    $total6 = $jam_total6 + $menit_total6 + $detik_total6;
                    $detikkejam6 = $total6 / 3600;
                    ?>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-body ">
            <?php $a = $i - 1; ?>
            <?php $summary = $detikkejam / $a ?>
            <?php $summary2 = $detikkejam2 / $a ?>
            <?php $summary3 = $detikkejam3 / $a ?>
            <?php $summary4 = $detikkejam4 / $a ?>
            <?php $summary5 = $detikkejam5 / $a ?>
            <?php $summary6 = $detikkejam6 / $a ?>


            <table class="table table-hover text-nowrap">
              <tr>
                <th>TOTAL TRIP</th>
                <th>TOTAL TRAVEL DURATION</th>
                <th> TOTAL LOADING DURATION</th>
                <th>TOTAL TIPPING DURATION</th>
                <th> SUM TOTAL DURATION</th>
                <th>TOTAL TRIP DURATION</th>
                <th> TOTAL STANDBY DURATION</th>
              </tr>
              <tr>
                <th><?= $a ?></th>
                <th><?php echo sprintf('%02d:%02d', (int) $summary, fmod($summary, 1) * 60); ?></th>
                <th><?php echo sprintf('%02d:%02d', (int) $summary2, fmod($summary2, 1) * 60); ?></th>
                <th><?php echo sprintf('%02d:%02d', (int) $summary3, fmod($summary3, 1) * 60); ?></th>
                <th><?php echo sprintf('%02d:%02d', (int) $summary4, fmod($summary4, 1) * 60); ?></th>
                <th><?php echo sprintf('%02d:%02d', (int) $summary5, fmod($summary5, 1) * 60); ?></th>
                <th><?php echo sprintf('%02d:%02d', (int) $summary6, fmod($summary6, 1) * 60); ?></th>
              </tr>
            </table>
          </div>
        </div>
      </div>


  </section>
</div><!-- /.container-fluid -->
</section>