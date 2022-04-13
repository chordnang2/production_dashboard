<?php
date_default_timezone_set('Asia/Singapore');
$jamini = date("H");

?>

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
    <?php
    $planton = 39752;
    $plantrip = 208;
    $plantonhm = 39.43;
    $planhm =  $planton / $plantonhm;
    $planavgton =  $planton / $plantrip;
    $planavgdistance = 68.56;
    // $plantonhm =   $planton / $planhm;
    $plantotaltonkm = $planton * $planavgdistance;
    $planttotalhm =    1315.44;
    $plancyletime = 4.80;
    $plantraveltime = 4.00;

    ?>
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <form action="<?php echo base_url() ?>Isi_highlight/produktifitas_unit_hm_hg" method="GET">
                        <input type="date" name="tanggal" value="">
                        <button id="load" class="button button--primary button--blue" type="submit">Load data</button>&nbsp
                    </form>
                    <code>'Update highlight terakhir tanggal <?= $last_date_update_highlight[0]['date']; ?>'</code><br>
                    <code>'Update hm terakhir tanggal <?= $last_date_update_hm[0]['date']; ?>'</code><br>
                    <code>'Update dmbd terakhir tanggal <?= $last_date_update_dmbd[0]['date']; ?>'</code>
                </div>
                <div class="card-body">
                    <h5 class="mt-4 mb-2">Produktifitas Unit </h5>
                    <div class="row">
                        <div class="col-sm-2">
                            <button type="button" data-toggle="modal" data-target="#modal-alldataunit" class="btn btn-outline-primary btn-block"><i class="fas fa-tachometer-alt nav-icon"></i> Detail All Data Unit</button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box bg-info">
                                <span class="info-box-icon"><i class="fa fa-truck"></i></span>


                                <div class="info-box-content">
                                    <span class="info-box-text">Average Ton/HM </span>
                                    <span class="info-box-number"> <?= number_format($gtv[0]->a, 2, ',', ' ') ?> Ton/HM </span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: <?php echo round(number_format($gtv[0]->a, 0, ',', ' ') / $plantonhm * 100) ?>%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <?php echo round(number_format($gtv[0]->a, 0, ',', ' ') / $plantonhm * 100) ?> % , Plan = <?= number_format($plantonhm, 2, ',', ' ')  ?> ton/hm
                                    </span>
                                    <div class="row">
                                        <div class="info-box-content">
                                            <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-avgtonhm">
                                                <button type="button" class="btn btn-block btn-info">
                                                    Detail
                                                </button>
                                            </a>
                                        </div>
                                        <div class="info-box-content">
                                            <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-graph_avgtonhm">
                                                <button type="button" class="btn btn-block btn-info">
                                                    Grafik
                                                </button> </a>
                                        </div>
                                    </div>



                                </div>

                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box bg-success">
                                <span class="info-box-icon"><i class="fa fa-truck"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Ton</span>
                                    <span class="info-box-number"><?= number_format($gettonvolvo[0]->ton, 0, ',', '.') ?> Ton</span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: <?php echo number_format($gettonvolvo[0]->ton / $planton * 100, 0, ',', '.') ?>%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <?php echo number_format($gettonvolvo[0]->ton / $planton * 100, 0, ',', '.') ?> % , Plan = <?= number_format($planton, 0, ',', '.') ?> ton
                                    </span>
                                    <div class="row">
                                        <div class="info-box-content">
                                            <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-sumton">
                                                <button type="button" class="btn btn-block btn-success">
                                                    Detail
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box bg-warning">
                                <span class="info-box-icon"><i class="fa fa-truck"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Trip</span>
                                    <span class="info-box-number"><?= $gettripvolvo[0]->trip ?> Trip</span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: <?= number_format($gettripvolvo[0]->trip / $plantrip, 0, ',', '.') * 100 ?>%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <?= number_format($gettripvolvo[0]->trip / $plantrip * 100) ?>% , Plan = <?= $plantrip ?> trip
                                    </span>
                                    <div class="row">
                                        <div class="info-box-content">
                                            <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-totaltrip">
                                                <button type="button" class="btn btn-block btn-warning">
                                                    Detail
                                                </button>
                                            </a>
                                        </div>
                                        <div class="info-box-content">
                                            <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-graph_totaltrip">
                                                <button type="button" class="btn btn-block btn-warning">
                                                    Grafik
                                                </button> </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box bg-danger">
                                <span class="info-box-icon"><i class="fas fa-comments"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Average Ton</span>
                                    <span class="info-box-number">
                                        <?= number_format($avgton[0]->a, 2, ',', '.') ?> Ton

                                    </span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: <?= number_format($avgton[0]->a / $planavgton, 0, ',', '.') * 100 ?>%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <?= number_format($avgton[0]->a / $planavgton * 100) ?>%, Plan =<?= number_format($planavgton, 2, ',', '.') ?> ton
                                    </span>
                                    <div class="row">
                                        <div class="info-box-content">
                                            <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-avgton">
                                                <button type="button" class="btn btn-block btn-danger">
                                                    Detail
                                                </button>
                                            </a>
                                        </div>
                                        <div class="info-box-content">
                                            <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-graph_avgton">
                                                <button type="button" class="btn btn-block btn-danger">
                                                    Grafik
                                                </button> </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box bg-info">
                                <span class="info-box-icon"><i class="fa fa-truck"></i></span>


                                <div class="info-box-content">
                                    <span class="info-box-text">Average Distance </span>
                                    <span class="info-box-number"> <?= number_format($avgdistance[0]->distance, 2, ',', ' ') ?> KM </span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: <?php echo round(number_format($avgdistance[0]->distance, 0, ',', ' ') / $planavgdistance * 100) ?>%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <?php echo round(number_format($avgdistance[0]->distance, 0, ',', ' ') / $planavgdistance * 100) ?> % , Plan = <?= number_format($planavgdistance, 2, ',', ' ')   ?> km
                                    </span>
                                    <div class="row">
                                        <div class="info-box-content">
                                            <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-avgdistance">
                                                <button type="button" class="btn btn-block btn-info">
                                                    Detail
                                                </button>
                                            </a>
                                        </div>
                                        <!-- <div class="info-box-content">
                                <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-graph_avgdistance">
                                    <button type="button" class="btn btn-block btn-info">
                                        Grafik
                                    </button> </a>
                            </div> -->
                                    </div>
                                </div>

                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box bg-success">
                                <span class="info-box-icon"><i class="fa fa-truck"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Distance</span>
                                    <span class="info-box-number"><?= number_format($total_distance[0]->distance, 2, ',', '.') ?> KM</span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: 0%"></div>
                                    </div>
                                    <span class="progress-description">
                                        % , Plan = none
                                    </span>
                                    <div class="row">
                                        <div class="info-box-content">
                                            <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-totaldistance">
                                                <button type="button" class="btn btn-block btn-success">
                                                    Detail
                                                </button>
                                            </a>
                                        </div>
                                        <!-- <div class="info-box-content">
                                <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-graph_totaldistance">
                                    <button type="button" class="btn btn-block btn-success">
                                        Grafik
                                    </button> </a>
                            </div> -->
                                    </div>
                                </div>

                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box bg-warning">
                                <span class="info-box-icon"><i class="fa fa-truck"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Ton KM</span>
                                    <span class="info-box-number">
                                        <?= number_format($gettonvolvo[0]->ton * $avgdistance[0]->distance, 2, ',', '.') ?> TONKM</span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: <?php echo round($gettonvolvo[0]->ton * $avgdistance[0]->distance / $plantotaltonkm * 100) ?>%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <?php echo round($gettonvolvo[0]->ton * $avgdistance[0]->distance / $plantotaltonkm * 100) ?> % , Plan = <?= number_format($plantotaltonkm, 0, ',', '.') ?> tonkm
                                    </span>
                                    <div class="row">
                                        <div class="info-box-content">
                                            <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-totaltonkm">
                                                <button type="button" class="btn btn-block btn-warning">
                                                    Detail
                                                </button>
                                            </a>
                                        </div>
                                        <!-- <div class="info-box-content">
                                <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-graph_totaltonkm">
                                    <button type="button" class="btn btn-block btn-warning">
                                    Grafik
                                    </button> 
                                </a>
                            </div> -->
                                    </div>
                                </div>

                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box bg-danger">
                                <span class="info-box-icon"><i class="fas fa-comments"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Unit Running</span>
                                    <span class="info-box-number"><?= $unit_running[0]->unit ?> Unit</span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: <?= round($unit_running[0]->unit / 55 * 100) ?>%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <?= round($unit_running[0]->unit / 55 * 100) ?> % , Plan = 55 unit
                                    </span>
                                    <div class="row">
                                        <div class="info-box-content">
                                            <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-unitrunning">
                                                <button type="button" class="btn btn-block btn-danger">
                                                    Detail
                                                </button>
                                            </a>
                                        </div>
                                        <!-- <div class="info-box-content">
                                <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-graph_unitrunning">
                                    <button type="button" class="btn btn-block btn-danger">
                                        Grafik
                                    </button> </a>
                            </div> -->
                                    </div>
                                </div>

                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box bg-info">
                                <span class="info-box-icon"><i class="fa fa-truck"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Jam Breakdown</span>
                                    <span class="info-box-number"><?= number_format($total_bd[0]->bd, 2, ',', ' ') ?> Jam</span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width:0%"></div>
                                    </div>
                                    <span class="progress-description">
                                        0% , Plan = jam
                                    </span>
                                    <div class="row">
                                        <div class="info-box-content">
                                            <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-bd">
                                                <button type="button" class="btn btn-block btn-info">
                                                    Detail
                                                </button>
                                            </a>
                                        </div>
                                        <div class="info-box-content">
                                            <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-graph_bd">
                                                <button type="button" class="btn btn-block btn-info">
                                                    Grafik
                                                </button> </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box bg-success">
                                <span class="info-box-icon"><i class="fa fa-truck"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Jam HM</span>
                                    <span class="info-box-number"><?= number_format($total_hm[0]->hm, 0, ',', '.') ?> Jam</span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: <?= number_format($total_hm[0]->hm / $planttotalhm * 100, 0, ',', ' ') ?>%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <?= number_format($total_hm[0]->hm / $planttotalhm * 100, 0, ',', ' ') ?> % , Plan = <?= number_format($planttotalhm, 0, ',', '.') ?> jam
                                    </span>
                                    <div class="row">
                                        <div class="info-box-content">
                                            <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-hm">
                                                <button type="button" class="btn btn-block btn-success">
                                                    Detail
                                                </button>
                                            </a>
                                        </div>
                                        <div class="info-box-content">
                                            <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-graph_hm">
                                                <button type="button" class="btn btn-block btn-success">
                                                    Grafik
                                                </button> </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box bg-warning">
                                <span class="info-box-icon"><i class="fa fa-truck"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Average PA</span>
                                    <span class="info-box-number">
                                        <?= number_format($avg_pa[0]->pa, 2, ',', '.') ?> %</span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: <?php echo round($avg_pa[0]->pa / 87  * 100) ?>%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <?php echo round($avg_pa[0]->pa / 87  * 100) ?> % , Plan = 87 %
                                    </span>
                                    <div class="row">
                                        <div class="info-box-content">
                                            <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-pa">
                                                <button type="button" class="btn btn-block btn-warning ">
                                                    Detail
                                                </button>
                                            </a>
                                        </div>
                                        <div class="info-box-content">
                                            <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-graph_pa">
                                                <button type="button" class="btn btn-block btn-warning">
                                                    Grafik
                                                </button> </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box bg-danger">
                                <span class="info-box-icon"><i class="fas fa-comments"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Average UA</span>
                                    <span class="info-box-number">
                                        <?= number_format($avg_ua[0]->ua, 2, ',', '.') ?> %</span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: <?php echo round($avg_ua[0]->ua / 87  * 100) ?>%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <?php echo round($avg_ua[0]->ua / 87  * 100) ?> % , Plan = 87 %
                                    </span>
                                    <div class="row">
                                        <div class="info-box-content">
                                            <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-ma">
                                                <button type="button" class="btn btn-block btn-danger">
                                                    Detail
                                                </button>
                                            </a>
                                        </div>
                                        <div class="info-box-content">
                                            <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-graph_ma">
                                                <button type="button" class="btn btn-block btn-danger">
                                                    Grafik
                                                </button> </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box bg-info">
                                <span class="info-box-icon"><i class="fa fa-truck"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Average Cycle Time</span>
                                    <span class="info-box-number">0<?= number_format($avg_cyle_time[0]->cycle_time, 2, ',', ' ') ?> Jam</span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: <?php echo ROUND($avg_cyle_time[0]->cycle_time / $plancyletime * 100) ?>%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <?php echo ROUND($avg_cyle_time[0]->cycle_time / $plancyletime * 100) ?> % , Plan = 0<?= number_format($plancyletime, 2, ',', ' ') ?> jam
                                    </span>
                                    <div class="row">
                                        <div class="info-box-content">
                                            <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-cycle">
                                                <button type="button" class="btn btn-block btn-info">
                                                    Detail
                                                </button>
                                            </a>
                                        </div>
                                        <div class="info-box-content">
                                            <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-graph_cycle">
                                                <button type="button" class="btn btn-block btn-info">
                                                    Grafik
                                                </button> </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box bg-success">
                                <span class="info-box-icon"><i class="fa fa-truck"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Average Travel Time</span>
                                    <span class="info-box-number">0<?= number_format($avg_travel_time[0]->travel_time, 2, ',', ' ') ?> Jam</span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: <?php echo ROUND($avg_travel_time[0]->travel_time / $plantraveltime * 100) ?>%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <?php echo ROUND($avg_travel_time[0]->travel_time / $plantraveltime * 100) ?> % , Plan = 0<?= number_format($plantraveltime, 2, ',', ' ') ?> jam
                                    </span>
                                    <div class="row">
                                        <div class="info-box-content">
                                            <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-travel">
                                                <button type="button" class="btn btn-block btn-success">
                                                    Detail
                                                </button>
                                            </a>
                                        </div>
                                        <div class="info-box-content">
                                            <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-graph_travel">
                                                <button type="button" class="btn btn-block btn-success">
                                                    Grafik
                                                </button> </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box bg-warning">
                                <span class="info-box-icon"><i class="fa fa-truck"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Average Standby Time</span>
                                    <span class="info-box-number">0<?= number_format($avg_stb[0]->avg_total_stb, 2, ',', ' ') ?> Jam</span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width:0%"></div>
                                    </div>
                                    <span class="progress-description">

                                    </span>
                                    <div class="row">
                                        <div class="info-box-content">
                                            <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-stb">
                                                <button type="button" class="btn btn-block btn-warning">
                                                    Detail
                                                </button>
                                            </a>
                                        </div>
                                        <div class="info-box-content">
                                            <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-graph_stb">
                                                <button type="button" class="btn btn-block btn-warning">
                                                    Grafik
                                                </button> </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>

                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box bg-danger">
                                <span class="info-box-icon"><i class="fa fa-truck"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Average Breakdown Time</span>
                                    <span class="info-box-number">0<?= number_format($avg_bd[0]->total_bd, 2, ',', ' ') ?> Jam</span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width:0%"></div>
                                    </div>
                                    <span class="progress-description">

                                    </span>
                                    <div class="row">
                                        <div class="info-box-content">
                                            <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-bd2">
                                                <button type="button" class="btn btn-block btn-danger">
                                                    Detail
                                                </button>
                                            </a>
                                        </div>
                                        <div class="info-box-content">
                                            <a href="#" class="info-box-text" data-toggle="modal" data-target="#modal-graph_bd2">
                                                <button type="button" class="btn btn-block btn-danger">
                                                    Grafik
                                                </button> </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>
            <br>

            <!--         -->
            <!--  -->
            <!--  -->
            <!--  -->


            <!-- ./row -->

            <!-- /. row -->
        </div><!-- /.container-fluid -->
    </section>