<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Hogo– Creative Admin Multipurpose Responsive Bootstrap4 Dashboard HTML Template" name="description">
    <meta content="Spruko Technologies Private Limited" name="author">
    <meta name="keywords" content="html admin template, bootstrap admin template premium, premium responsive admin template, admin dashboard template bootstrap, bootstrap simple admin template premium, web admin template, bootstrap admin template, premium admin template html5, best bootstrap admin template, premium admin panel template, admin template" />

    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url(); ?>/assets/hogo/assets/images/brand/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>/assets/hogo/assets/images/brand/favicon.ico" />
    <!-- Title -->
    <title>Parameter Daily Produksi</title>

    <!--Bootstrap.min css-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/hogo/assets/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Dashboard css -->
    <link href="<?php echo base_url(); ?>/assets/hogo/assets/css-dark/style.css" rel="stylesheet" />

    <!-- Custom scroll bar css-->
    <link href="<?php echo base_url(); ?>/assets/hogo/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

    <!-- Horizontal-menu css -->
    <link href="<?php echo base_url(); ?>/assets/hogo/assets/plugins/horizontal-menu/dropdown-effects/fade-down.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/hogo/assets/plugins/horizontal-menu/dark-horizontalmenu.css" rel="stylesheet">

    <!--Daterangepicker css-->
    <link href="<?php echo base_url(); ?>/assets/hogo/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />

    <!-- Rightsidebar css -->
    <link href="<?php echo base_url(); ?>/assets/hogo/assets/plugins/sidebar/dark-sidebar.css" rel="stylesheet">

    <!-- Sidebar Accordions css -->
    <link href="<?php echo base_url(); ?>/assets/hogo/assets/plugins/accordion1/css/dark-easy-responsive-tabs.css" rel="stylesheet">

    <!-- Owl Theme css-->
    <link href="<?php echo base_url(); ?>/assets/hogo/assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">

    <!-- Morris  Charts css-->
    <link href="<?php echo base_url(); ?>/assets/hogo/assets/plugins/morris/morris.css" rel="stylesheet" />

    <!---Font icons css-->
    <link href="<?php echo base_url(); ?>/assets/hogo/assets/plugins/iconfonts/plugin.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/hogo/assets/plugins/iconfonts/icons.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/hogo/assets/fonts/fonts/font-awesome.min.css" rel="stylesheet">
    <style>
        .feature .icon {

            width: 1em;

        }

        .progress-sm,
        .progress-sm .progress-bar {
            height: 1rem;
        }

        .btn {
            font-size: 0.7em;
        }
    </style>
</head>

<body class="app sidebar-mini rtl">

    <!--Global-Loader-->
    <!-- <div id="global-loader">
        <img src="<?php echo base_url(); ?>/assets/hogo/assets/images/icons/loader.svg" alt="loader">
    </div> -->

    <div class="page">
        <div class="page-main">
            <!--app-header-->

            <!--app-header end-->

            <!-- Horizontal-menu -->

            <!-- Horizontal-menu end -->

            <!--Header submenu -->


            <!-- app-content-->
            <div class="container content-area">
                <div class="side-app">

                    <!-- page-header -->
                    <div class="page-header">
                        <ol class="breadcrumb">
                            <!-- breadcrumb -->
                            <li class="breadcrumb-item active" aria-current="page">Daily Produksi</li>
                            <li style="color: #007bff;" class="breadcrumb-item"><a href="<?= base_url('daily_produksi') ?>"><i class="fa fa-play" data-toggle="tooltip" title="" data-original-title="fa fa-play"></i> Data Terupdate</a></li>
                            <!-- <li class="breadcrumb-item active" aria-current="page">Produksi</li>
                            <li class="breadcrumb-item active" aria-current="page">Unit</li>
                            <li class="breadcrumb-item active" aria-current="page">Operator</li>
                            <li class="breadcrumb-item active" aria-current="page">Operasional</li> -->
                            <!-- <li class="breadcrumb-item active" aria-current="page">Eksternal</li> -->
                        </ol><!-- End breadcrumb -->
                        <div class="ml-auto">
                            <div class="input-group">
                            <form action="<?= base_url('daily_produksi/select'); ?>" method="get">
                                    <input style="width:160px;" class="btn btn-primary text-white mr-2" type="text" name="daterange" />
                                    <button class="btn btn-primary text-white mr-2" type="submit" value="Submit">Filter</button>
                                    <a type="button" class="btn btn-success text-white  mr-2" data-toggle="modal" data-target="#exampleModal3" title="Terkahir Update Tanggal = <?php echo  $datapelengkap[0]['maxdate'] ?>">
                                        <i class="fe fe-plus"> 1</i>
                                    </a>
                                    <a type="button" class="btn btn-success text-white  mr-2" data-toggle="modal" data-target="#exampleModal4" title="Terkahir Update Tanggal = <?php echo  $datatarget[0]['maxdate'] ?>">
                                        <i class="fe fe-plus"> 2</i>
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End page-header -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-bgimg br-7">
                                <div class="row">
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Ton</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $ton[0]['sumnett'] ?></h2>
                                            <span class="text-white">ton</span>
                                            <!-- <p>target 44488 ton</p> -->
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_ton ?>%" aria-valuenow="<?= $percent_ton ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_ton ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $ton[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Trip</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $trip[0]['sumtrip'] ?></h2>
                                            <span class="text-white">unit</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_trip ?>%" aria-valuenow="<?= $percent_trip ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_trip ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $trip[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Average Ton</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $avgton[0]['avgnett'] ?></h2>
                                            <span class="text-white">ton</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_average_ton ?>%" aria-valuenow="<?= $percent_average_ton ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_average_ton ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $avgton[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Average Distance</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $avgdistance[0]['avgdistance'] ?></h2>
                                            <span class="text-white">km</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_totaltonkm ?>%" aria-valuenow="<?= $percent_totaltonkm ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_totaltonkm ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $avgdistance[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Total Distance</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $sumdistance[0]['sumdistance'] ?></h2>
                                            <span class="text-white">km</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_populasi ?>%" aria-valuenow="<?= $percent_populasi ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_populasi ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $sumdistance[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Total Ton KM</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $totaltonkm ?></h2>
                                            <span class="text-white">tonkm</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_totaltonkm ?>%" aria-valuenow="<?= $percent_totaltonkm ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_totaltonkm ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $sumdistance[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-bgimg br-7">
                                <div class="row">
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Populasi</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $datapelengkap[0]['populasi'] ?></h2>
                                            <span class="text-white">unit</span>
                                            <!-- <p>target 44488 ton</p> -->
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_populasi ?>%" aria-valuenow="<?= $percent_populasi ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_populasi ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $datapelengkap[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Rata-rata Unit Ready</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $ratarataunitready[0]['ratarataunitready'] ?></h2>
                                            <span class="text-white">unit</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_ratarataunitready ?>%" aria-valuenow="<?= $percent_ratarataunitready ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_ratarataunitready ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $ratarataunitready[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Jumlah Unit Service</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $unitservice[0]['unitservice'] ?></h2>
                                            <span class="text-white">unit</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_ratarataunitservice ?>%" aria-valuenow="<?= $percent_ratarataunitservice ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_ratarataunitservice ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $ratarataunitready[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Jumlah Unit Breakdown</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $unitbreakdown[0]['unitbreakdown'] ?></h2>
                                            <span class="text-white">unit</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_ratarataunitbreakdown ?>%" aria-valuenow="<?= $percent_ratarataunitbreakdown ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_ratarataunitbreakdown ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $ratarataunitready[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Hours Meter Unit</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $totalhm[0]['wh'] ?></h2>
                                            <span class="text-white">jam</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_totalhm ?>%" aria-valuenow="<?= $percent_totalhm ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_totalhm ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $totalhm[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Jumlah Jam Breakdown</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $totalbd[0]['totalbd'] ?></h2>
                                            <span class="text-white">jam</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_totalbd ?>%" aria-valuenow="<?= $percent_totalbd ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_totalbd ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $totalbd[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">PA</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $pa ?></h2>
                                            <span class="text-white">%</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_pa ?>%" aria-valuenow="<?= $percent_pa ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_pa ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $ratarataunitready2[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">MA</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo  $ma ?> </h2>
                                            <span class="text-white">%</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_ma ?>%" aria-valuenow="<?= $percent_ma ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_ma ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $totalbd[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-bgimg br-7">
                                <div class="row">
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Jumlah Operator</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $datapelengkap[0]['jumlahoperator'] ?></h2>
                                            <span class="text-white">unit</span>
                                            <!-- <p>target 44488 ton</p> -->
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <h5 class="text-white"><?php echo $datapelengkap[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Jumlah Operator Training</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $datapelengkap[0]['jumlahoperatortraining'] ?></h2>
                                            <span class="text-white">unit</span>
                                            <!-- <p>target 44488 ton</p> -->
                                            <div class="progress progress-sm mb-0">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info w-<?php echo ROUND(16316 / 44488 * 100) ?>"></div>
                                            </div>
                                            <h5 class="text-white"><?php echo $datapelengkap[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Jumlah Operator Sakit/Follow up</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $datapelengkap[0]['jumlahoperatorsakit'] ?></h2>
                                            <span class="text-white">unit</span>
                                            <!-- <p>target 44488 ton</p> -->
                                            <div class="progress progress-sm mb-0">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info w-<?php echo ROUND(16316 / 44488 * 100) ?>"></div>
                                            </div>
                                            <h5 class="text-white"><?php echo $datapelengkap[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Jumlah Operator Cuti</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $datapelengkap[0]['jumlahoperatorcuti'] ?></h2>
                                            <span class="text-white">unit</span>
                                            <!-- <p>target 44488 ton</p> -->
                                            <div class="progress progress-sm mb-0">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info w-<?php echo ROUND(16316 / 44488 * 100) ?>"></div>
                                            </div>
                                            <h5 class="text-white"><?php echo $datapelengkap[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Jumlah Operator Mangkir</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $datapelengkap[0]['jumlahoperatormangkir'] ?></h2>
                                            <span class="text-white">unit</span>
                                            <!-- <p>target 44488 ton</p> -->
                                            <div class="progress progress-sm mb-0">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info w-<?php echo ROUND(16316 / 44488 * 100) ?>"></div>
                                            </div>
                                            <h5 class="text-white"><?php echo $datapelengkap[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Jumlah Operator tidak siap bekerja</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $datapelengkap[0]['jumlahoperatortidaksiapbekerja'] ?></h2>
                                            <span class="text-white">unit</span>
                                            <!-- <p>target 44488 ton</p> -->
                                            <div class="progress progress-sm mb-0">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info w-<?php echo ROUND(16316 / 44488 * 100) ?>"></div>
                                            </div>
                                            <h5 class="text-white"><?php echo $datapelengkap[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Jumlah Operator Off</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $datapelengkap[0]['jumlahoperatoroff'] ?></h2>
                                            <span class="text-white">unit</span>
                                            <!-- <p>target 44488 ton</p> -->
                                            <div class="progress progress-sm mb-0">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info w-<?php echo ROUND(16316 / 44488 * 100) ?>"></div>
                                            </div>
                                            <h5 class="text-white"><?php echo $datapelengkap[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Jumlah Operator Siap Operasi</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $datapelengkap[0]['jumlahoperatorsiapoperasi'] ?></h2>
                                            <span class="text-white">unit</span>
                                            <!-- <p>target 44488 ton</p> -->
                                            <div class="progress progress-sm mb-0">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info w-<?php echo ROUND(16316 / 44488 * 100) ?>"></div>
                                            </div>
                                            <h5 class="text-white"><?php echo $datapelengkap[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-bgimg br-7">
                                <div class="row">
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Jumlah Unit Operasi</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $ratarataunitready[0]['ratarataunitready'] ?></h2>
                                            <span class="text-white">unit</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_ratarataunitready ?>%" aria-valuenow="<?= $percent_ratarataunitready ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_ratarataunitready ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $ratarataunitready[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Jumlah Unit Change Shift di Km 30 / 35</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $unitchangeshift3035[0]['unitchangeshift3035'] ?></h2>
                                            <span class="text-white">unit</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_unitchangeshift3035 ?>%" aria-valuenow="<?= $percent_unitchangeshift3035 ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_unitchangeshift3035 ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $ratarataunitready[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Rata2 Produktifitas Unit Operasi</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $ratarataproduktifitasunitoperasi ?></h2>
                                            <span class="text-white">unit</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: %" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <h5 class="text-white"><?php echo $ratarataunitready[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Jumlah Unit Yang Mendapat >= 2 Trip</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $counttrip2[0]['counttrip2'] ?></h2>
                                            <span class="text-white">unit</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: %" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <h5 class="text-white"><?php echo $ratarataunitready[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Rata2 Produktifitas Operator</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $ratarataoptproduktifitasopt[0]['ratarataoptproduktifitasopt'] ?></h2>
                                            <span class="text-white">unit</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: %" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <h5 class="text-white"><?php echo $ratarataoptproduktifitasopt[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Jumlah Operator Yang Mendapat >= 2 Trip</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $countopt2trip[0]['countopt2trip'] ?></h2>
                                            <span class="text-white">unit</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: %" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <h5 class="text-white"><?php echo $countopt2trip[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-bgimg br-7">
                                <div class="row">
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Standby Time</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $standby_time ?></h2>
                                            <span class="text-white">jam</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_standbytime ?>%" aria-valuenow="<?= $percent_standbytime ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_standbytime ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $change_shift[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Breakdown</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $breakdown[0]['breakdown'] ?></h2>
                                            <span class="text-white">jam</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_breakdown ?>%" aria-valuenow="<?= $percent_breakdown ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_breakdown ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $breakdown[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Change Shift</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $change_shift[0]['change_shift'] ?></h2>
                                            <span class="text-white">jam</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_change_shift ?>%" aria-valuenow="<?= $percent_change_shift ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_change_shift ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $change_shift[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Refueling</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $refueling[0]['refueling'] ?></h2>
                                            <span class="text-white">jam</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_refueling ?>%" aria-valuenow="<?= $percent_refueling ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_refueling ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $refueling[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Antri Loading</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $antri_loading ?></h2>
                                            <span class="text-white">jam</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_antri_loading ?>%" aria-valuenow="<?= $percent_antri_loading ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_antri_loading ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $antri_load[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Antri Dumping</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $antri_dumping[0]['antri_dumping'] ?></h2>
                                            <span class="text-white">jam</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_antri_dumping ?>%" aria-valuenow="<?= $percent_antri_dumping ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_antri_dumping ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $antri_dumping[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Rest Time</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $rest_time[0]['rest_time'] ?></h2>
                                            <span class="text-white">unit</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_rest_time ?>%" aria-valuenow="<?= $percent_rest_time ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_rest_time ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $rest_time[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-bgimg br-7">
                                <div class="row">
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Cycle Time</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $cycle_time[0]['cycle_time'] ?></h2>
                                            <span class="text-white">jam</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_cycle_time ?>%" aria-valuenow="<?= $percent_cycle_time ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_cycle_time ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $cycle_time[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Travel Time</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $travel_time[0]['travel_time'] ?></h2>
                                            <span class="text-white">jam</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_travel_time ?>%" aria-valuenow="<?= $percent_travel_time ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_travel_time ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $travel_time[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">EWH</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $ewh ?></h2>
                                            <span class="text-white">jam</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_ewh ?>%" aria-valuenow="<?= $percent_ewh ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_ewh ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $change_shift[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">UA</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $ua ?></h2>
                                            <span class="text-white">%</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_ua ?>%" aria-valuenow="<?= $percent_ua ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_ua ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $change_shift[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Kecepatan Rata-rata</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $kecepatanratarata ?></h2>
                                            <span class="text-white">Km/Jam</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_kecepatan_rata_rata ?>%" aria-valuenow="<?= $percent_kecepatan_rata_rata ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_kecepatan_rata_rata ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $sumdistance[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Fuel Consumtion</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo round($datapelengkap[0]['fuelconsumtionunittrailer'], 2) ?></h2>
                                            <span class="text-white">Liter</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_fuel_consumtion_trailer ?>%" aria-valuenow="<?= $percent_fuel_consumtion_trailer ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_fuel_consumtion_trailer ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $datapelengkap[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Fuel Index Unit Trailer</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $fuelindextrailerliterton ?></h2>
                                            <span class="text-white">Liter/Ton</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_fuel_index_unit_trailer_liter_ton ?>%" aria-valuenow="<?= $percent_fuel_index_unit_trailer_liter_ton ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_fuel_index_unit_trailer_liter_ton ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $datapelengkap[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                                        <div class="card-body text-center">
                                            <h5 class="text-white">Fuel Index Unit Trailer</h5>
                                            <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"><?php echo $fuelindextrailerlitertonkm ?></h2>
                                            <span class="text-white">Liter/TonKm</span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: <?= $percent_fuel_index_unit_trailer_liter_ton_km ?>%" aria-valuenow="<?= $percent_fuel_index_unit_trailer_liter_ton_km ?>" aria-valuemin="0" aria-valuemax="100"><?= $percent_fuel_index_unit_trailer_liter_ton_km ?>%</div>
                                            </div>
                                            <h5 class="text-white"><?php echo $datapelengkap[0]['maxdate'] ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal datapelengkap-->
                <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <!-- unit -->
                            <div class="modal-header">
                                <h5 class="modal-title" id="example-Modal3">Form Tambah Data Pelengkap</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('daily_produksi/insert'); ?>" method="post">
                                <div class="modal-body">
                                    Tanggal terupdate: <?php echo $datapelengkap[0]['maxdate'] ?>
                                    <hr>
                                    <div class="form-group">
                                        <label for="recipient-name" class="form-control-label">Tanggal:</label>
                                        <input type="date" class="form-control" id="recipient-name" name="tanggal">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="form-control-label">Populasi:</label>
                                        <input type="number" class="form-control" id="recipient-name" name="populasi">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="form-control-label">Jumlah Operator:</label>
                                        <input type="number" class="form-control" id="recipient-name" name="jumlahoperator">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="form-control-label">Jumlah Operator Training:</label>
                                        <input type="number" class="form-control" id="recipient-name" name="jumlahoperatortraining">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="form-control-label">Jumlah Operator Sakit/Follow up:</label>
                                        <input type="number" class="form-control" id="recipient-name" name="jumlahoperatorsakit">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="form-control-label">Jumlah Operator Cuti:</label>
                                        <input type="number" class="form-control" id="recipient-name" name="jumlahoperatorcuti">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="form-control-label">Jumlah Operator Mangkir:</label>
                                        <input type="number" class="form-control" id="recipient-name" name="jumlahoperatormangkir">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="form-control-label">Jumlah Operator tidak siap bekerja:</label>
                                        <input type="number" class="form-control" id="recipient-name" name="jumlahoperatortidaksiapbekerja">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="form-control-label">Jumlah Operator Off:</label>
                                        <input type="number" class="form-control" id="recipient-name" name="jumlahoperatoroff">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="form-control-label">Jumlah Operator Siap Operasi:</label>
                                        <input type="number" class="form-control" id="recipient-name" name="jumlahoperatorsiapoperasi">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="form-control-label">Fuel Consumtion:</label>
                                        <input type="text" class="form-control" id="recipient-name" name="fuelconsumtionunittrailer">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" value="Submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal datatarget -->
                <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModal2" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="example-Modal3">Form Tambah Data Target</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form action="<?= base_url('daily_produksi/insert_target'); ?>" method="post">
                                <div class="modal-body">
                                    Tanggal terupdate: <?php echo $datapelengkap[0]['maxdate'] ?>
                                    <hr>
                                    <div class="form-group">
                                        <label for="recipient-name" class="form-control-label">Tanggal:</label>
                                        <input type="date" class="form-control" id="recipient-name" name="tanggal">
                                    </div>
                                    <?php $table_kolom = $this->db->list_fields('tbl_target_parameterdailyproduksi');
                                    foreach (array_slice($table_kolom, 2) as $key => $value) { ?>
                                    <div class="form-group">
                                        <label for="recipient-name" class="form-control-label"><?php echo str_replace('_', ' ', ucfirst($value)) ?>:</label>
                                        <input type="number" step="0.001" class="form-control" id="recipient-name" name="<?php echo $value ?>">
                                    </div>
                                    <?php } ?>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" value="Submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--End side app-->

                <!-- Right-sidebar-->


                <!--footer-->

                <!-- End Footer-->

            </div>
            <!-- End app-content-->
        </div>
    </div>
    <!-- End Page -->

    <!-- Back to top -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- Jquery js-->
    <script src="<?php echo base_url(); ?>/assets/hogo/assets/js-dark/vendors/jquery-3.2.1.min.js"></script>

    <!--Bootstrap.min js-->
    <script src="<?php echo base_url(); ?>/assets/hogo/assets/plugins/bootstrap/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/hogo/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!--Jquery Sparkline js-->
    <script src="<?php echo base_url(); ?>/assets/hogo/assets/js-dark/vendors/jquery.sparkline.min.js"></script>

    <!-- Chart Circle js-->
    <script src="<?php echo base_url(); ?>/assets/hogo/assets/js-dark/vendors/circle-progress.min.js"></script>

    <!-- Star Rating js-->
    <script src="<?php echo base_url(); ?>/assets/hogo/assets/plugins/rating/jquery.rating-stars.js"></script>

    <!--Moment js-->
    <script src="<?php echo base_url(); ?>/assets/hogo/assets/plugins/moment/moment.min.js"></script>

    <!-- Daterangepicker js-->
    <script src="<?php echo base_url(); ?>/assets/hogo/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Horizontal-menu js -->
    <script src="<?php echo base_url(); ?>/assets/hogo/assets/plugins/horizontal-menu/horizontalmenu.js"></script>

    <!-- Sidebar Accordions js -->
    <script src="<?php echo base_url(); ?>/assets/hogo/assets/plugins/accordion1/js/easyResponsiveTabs.js"></script>

    <!-- Custom scroll bar js-->
    <script src="<?php echo base_url(); ?>/assets/hogo/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

    <!--Owl Carousel js -->
    <script src="<?php echo base_url(); ?>/assets/hogo/assets/plugins/owl-carousel/owl.carousel.js"></script>
    <script src="<?php echo base_url(); ?>/assets/hogo/assets/plugins/owl-carousel/owl-main.js"></script>

    <!-- Rightsidebar js -->
    <script src="<?php echo base_url(); ?>/assets/hogo/assets/plugins/sidebar/sidebar.js"></script>

    <!-- Charts js-->
    <script src="<?php echo base_url(); ?>/assets/hogo/assets/plugins/chart/chart.bundle-dark.js"></script>
    <script src="<?php echo base_url(); ?>/assets/hogo/assets/plugins/chart/utils.js"></script>

    <!--Peitychart js -->
    <script src="<?php echo base_url(); ?>/assets/hogo/assets/plugins/peitychart/jquery.peity.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/hogo/assets/plugins/peitychart/peitychart.init.js"></script>

    <!--Time Counter js-->
    <script src="<?php echo base_url(); ?>/assets/hogo/assets/plugins/counters/jquery.missofis-countdown.js"></script>
    <script src="<?php echo base_url(); ?>/assets/hogo/assets/plugins/counters/counter.js"></script>

    <!--Morris  Charts js-->
    <script src="<?php echo base_url(); ?>/assets/hogo/assets/plugins/morris/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/hogo/assets/plugins/morris/morris.js"></script>

    <!-- Custom-charts js-->
    <script src="<?php echo base_url(); ?>/assets/hogo/assets/js-dark/index1.js"></script>

    <!-- Custom js-->
    <script src="<?php echo base_url(); ?>/assets/hogo/assets/js-dark/custom.js"></script>

    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                locale: {
                    format: 'YYYY-MM-DD'
                }
            });
        });
    </script>
</body>

</html>