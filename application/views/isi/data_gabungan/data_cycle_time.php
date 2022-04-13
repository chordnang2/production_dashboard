<!-- Content Wrapper. Contains page content -->
<style>
  html {
    font-family: helvetica, arial;
  }

  .htimeline {
    list-style: none;
    padding: 0;
    margin: 20px 0 0;
  }

  .htimeline .step {
    float: left;
    border-top-style: solid;
    border-top-width: 5px;
    position: relative;
    margin-bottom: 15px;
    text-align: left;
    padding: 3px 0 5px 10px;
    background-color: #ddd;
    color: #333;
    height: 160px;
    vertical-align: middle;
    border-right: solid 1px #bbb;
    transition: all 0.5s ease;
  }

  .htimeline .step:nth-child(odd) {
    background-color: #eee;
  }

  .htimeline .step:first-child {
    border-left: solid 1px #bbb;
  }

  .htimeline .step:hover {
    background-color: #ccc;
    border-bottom-width: 6px;
  }

  .htimeline .step>div {
    margin: 0 5px;
    font-size: 14px;
    vertical-align: top;
    padding: 0;
  }

  .htimeline .step.green {
    border-top-color: #348F50;
  }

  .htimeline .step.orange {
    border-top-color: #F09819;
  }

  .htimeline .step.red {
    border-top-color: #C04848;
  }

  .htimeline .step.blue {
    border-top-color: #49a09d;
  }

  .htimeline .step::before {
    width: 15px;
    height: 15px;
    border-radius: 50px;
    content: ' ';
    background-color: white;
    position: absolute;
    top: -10px;
    left: 0px;
    border-style: solid;
    border-width: 3px;
    transition: all 0.5s ease;
  }

  .htimeline .step:hover::before {
    width: 18px;
    height: 18px;
    bottom: -12px;
  }

  .htimeline .step.green::before {
    border-color: #348F50;
  }

  .htimeline .step.orange::before {
    border-color: #F09819;
  }

  .htimeline .step.red::before {
    border-color: #C04848;
  }

  .htimeline .step.blue::before {
    border-color: #49a09d;
  }

  .htimeline .step::after {
    content: attr(data-date);
    position: absolute;
    top: -20px;
    left: 17px;
    font-size: 11px;
    font-style: italic;
    color: #888
  }

  /*TASKS*/
  .htimeline .step .tasks {
    margin-top: 10px;
  }

  .htimeline .step .tasks .resource {
    position: relative;
    height: 40px;
  }

  .htimeline .step .tasks .resource::before {
    position: absolute;
    bottom: 2px;
    left: -5px;
    content: attr(data-name);
    font-size: 10px;
    font-style: italic;
    color: #888
  }

  .htimeline .step .tasks .task {
    overflow: hidden;
    font-size: 10px;
    padding: 3px;
    border: solid 1px white;
    border-radius: 4px;
    min-height: 20px;
  }

  .htimeline .step.green .tasks .task {
    background-color: #348F50;
    color: white;
  }

  .htimeline .step.orange .tasks .task {
    background-color: #F09819;
    color: white;
  }

  .htimeline .step.red .tasks .task {
    background-color: #C04848;
    color: white;
  }

  .htimeline .step.blue .tasks .task {
    background-color: #49a09d;
    color: white;
  }
</style>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Buttons</li> -->
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-edit"></i>
                Dashboard Unit
              </h3>

              <!-- <div class="col-md-3">
                <form method="get" action="<?php echo base_url("analisa_opt/pencarian/") ?>">
                  <div align="center">Tanggal
                    <select class="form-control" name="tanggal">
                      <option>Semua</option>
                    </select>
                  </div>

                  <div align="center">NRP
                    <select class="form-control" name="nrp">
                      <option>Status</option>
                    </select>
                  </div>
                  <br><input type="submit" class="btn btn-primary" value="Cari">
                </form>
              </div> -->


            </div>
          </div>
          <div class='container-fluid'>
            <ul class='htimeline'>
              <li data-date='03/10/2016' class='step col-sm-3 orange'>
                <div>Inserted</div>
                <div class='tasks container-fluid'>
                  <div class='resource' data-name='John Doe'>
                    <div class='task col-sm-6'>Necessity</div>
                    <div class='task col-sm-6'>Approval</div>
                  </div>
                  <div class='resource' data-name='Finances'>
                    <div class='task col-sm-3 col-sm-offset-6'>credit</div>
                  </div>
                </div>
              </li>
              <li data-date='08/10/2016' class='step col-sm-2 green'>
                <div>Published</div>
                <div class='tasks container-fluid'>
                  <div class='resource'>
                    <div class='task col-sm-12'>Receipt of tenders</div>
                  </div>
                </div>
              </li>
              <li data-date='20/10/2016' class='step col-sm-1 red'>
                <div>Deadline</div>
              </li>
              <li data-date='9/11/2016' class='step col-sm-3 blue'>
                <div>Evaluation</div>
                <div class='tasks container-fluid'>
                  <div class='resource' data-name='Meetings'>
                    <div class='task col-sm-4'>Administrative</div>
                    <div class='task col-sm-4'>Technical</div>
                    <div class='task col-sm-4'>Economic</div>
                  </div>
                  <div class='resource' data-name='Rectifications'>
                    <div class='task col-sm-2 col-sm-offset-2'>Retrieval</div>
                    <div class='task col-sm-2 col-sm-offset-2'>Clarification</div>
                    <div class='task col-sm-2 col-sm-offset-2'>Clarification</div>
                  </div>
                  <div class='resource' data-name='Notifications'>
                    <div class='task col-sm-1 col-sm-offset-2'></div>
                    <div class='task col-sm-1 col-sm-offset-3'></div>
                    <div class='task col-sm-1 col-sm-offset-3'></div>
                  </div>
                </div>
              </li>
              <li data-date='20/1/2017' class='step col-sm-1 green'>
                <div>Decision</div>
                <div class='tasks container-fluid'>
                  <div class='resource' data-name='Meetings'>
                    <div class='task col-sm-6'></div>
                  </div>
                  <div class='resource' data-name='Notifications'>
                    <div class='task col-sm-1 col-sm-offset-6'></div>
                  </div>
                  <div class='resource' data-name='complaints'>
                    <div class='task col-sm-5 col-sm-offset-7'></div>
                  </div>
                </div>
              </li>
              <li data-date='25/1/2017' class='step col-sm-1 green'>
                <div>Award</div>
                <div class='tasks container-fluid'>
                  <div class='resource' data-name='Meetings'>
                    <div class='task col-sm-6'></div>
                  </div>
                  <div class='resource' data-name='Notifications'>
                    <div class='task col-sm-1 col-sm-offset-6'></div>
                  </div>
                  <div class='resource' data-name='complaints'>
                    <div class='task col-sm-5 col-sm-offset-7'></div>
                  </div>
                </div>
              </li>
              <li data-date='5/2/2017' class='step col-sm-1 green'>
                <div>Contract sign</div>
              </li>
            </ul>
          </div>
          <div>
            <?php
            $totalall = 0;
            $totalnol = 0;
            foreach ($units as $trip => $value) {
              $totalall++; ?>
              <div>
                <!-- <label><?php echo $trip;  ?></label> -->

                <?php
                $jam_total = 0;
                $menit_total = 0;
                $detik_total = 0;
                $floattotimetotal = 0;

                foreach ($value as $key2 => $value) {

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
                if ($total < "14400") {
                  $totalif = 0;
                  $totalnol++;
                } else {
                  $totalif = $total;
                }
                ?>

                <!-- <?php $totaltotal += $totalif; ?> -->

                <?= $totalif ?>



              </div>
            <?php }
            ?>
            <?= $totalall; ?>
            <?= $totalnol; ?>
            <?= $countsummary=$totalall-$totalnol; ?>
                
            <?= $totaltotal ?> ||

            <?php echo $summary = $totaltotal / $countsummary / 3600 ?>
            <?php echo sprintf('%02d:%02d', (int) $summary, fmod($summary, 1) * 60) . "<br>"; ?>
          </div>


          <!-- <div class="card-body pad table-responsive">
            <table class="table table-bordered text-center">
              <tr>
              </tr>
              <?php foreach ($unitsc as $trip => $value) { ?>
                <tbody>

                  <?php echo $trip; ?>
                  <?php foreach ($value as $key2 => $value) { ?>
                    <tr>
                      <td> <?php echo $trip; ?><?php echo $value['time_in'] ?> <?php echo $value['time_out'] ?> : <?php echo $value['geofence'] ?> (<?php echo $value['tipe'] ?>)</td>
                    </tr>
                  <?php } ?>
                </tbody>
              <?php } ?>
            </table>
          </div> -->
          <!-- /.card -->
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- ./row -->

    <!-- /. row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>