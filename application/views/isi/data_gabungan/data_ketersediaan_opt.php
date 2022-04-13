<?php
date_default_timezone_set('Asia/Singapore');
$jamini = date("H");
?>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">

            <br>
            <div class="row">
                <div class="col-lg-12">

                    <h5 class="mb-2">Status Ketersediaan Operator<small><i> Informasi Tanggal <?= $get_ketersediaan_opt[7]->jumlah ?></i></small></h5>
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>
                                        <?= $get_ketersediaan_opt[0]->jumlah ?> orang
                                    </h3>
                                    <p>Operator Siap Operasi</p>
                                </div>
                                <div class="icon">
                                    <!-- <i class="fas fa-shopping-cart"></i> -->
                                </div>
                                <!-- <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-running">
                                    Detail <i class="fas fa-arrow-circle-right"></i>
                                </a> -->
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>
                                        <?= $get_ketersediaan_opt[1]->jumlah ?> orang
                                    </h3>
                                    <p>Operator Off</p>
                                </div>
                                <div class="icon">
                                    <!-- <i class="fas fa-shopping-cart"></i> -->
                                </div>
                                <!-- <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-nosetvessel">
                                    Detail <i class="fas fa-arrow-circle-right"></i>
                                </a> -->
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>
                                        <?= $get_ketersediaan_opt[2]->jumlah ?> orang
                                    </h3>
                                    <p>Operator tidak siap bekerja (Onsite)</p>
                                </div>
                                <div class="icon">
                                    <!-- <i class="fas fa-shopping-cart"></i> -->
                                </div>
                                <!-- <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-stb">
                                    Detail <i class="fas fa-arrow-circle-right"></i>
                                </a> -->
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-danger">
                                <div class="inner">

                                    <h3>
                                        <?= $get_ketersediaan_opt[3]->jumlah ?> orang
                                    </h3>

                                    <p>Operator Mangkir</p>
                                </div>
                                <div class="icon">
                                    <!-- <i class="fas fa-shopping-cart"></i> -->
                                </div>
                                <!-- <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-service">
                                    Detail <i class="fas fa-arrow-circle-right"></i>
                                </a> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>
                                        <?= $get_ketersediaan_opt[4]->jumlah ?> orang
                                    </h3>
                                    <p>Operator Cuti</p>
                                </div>
                                <div class="icon">
                                    <!-- <i class="fas fa-shopping-cart"></i> -->
                                </div>
                                <!-- <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-bd">
                                    Detail <i class="fas fa-arrow-circle-right"></i>
                                </a> -->
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-danger">
                                <div class="inner">

                                    <h3>
                                        <?= $get_ketersediaan_opt[5]->jumlah ?> orang
                                    </h3>

                                    <p>Operator Sakit</p>
                                </div>
                                <div class="icon">
                                    <!-- <i class="fas fa-shopping-cart"></i> -->
                                </div>
                                <!-- <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-accident">
                                    Detail <i class="fas fa-arrow-circle-right"></i>
                                </a> -->
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-info">
                                <div class="inner">

                                    <h3>
                                        <?= $get_ketersediaan_opt[6]->jumlah ?> orang
                                    </h3>

                                    <p>Operator Training</p>
                                </div>
                                <div class="icon">
                                    <!-- <i class="fas fa-shopping-cart"></i> -->
                                </div>
                                <!-- <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-accident">
                                    Detail <i class="fas fa-arrow-circle-right"></i>
                                </a> -->
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box ">
                                <div class="inner">
                                    <h3>
                                        <?= $get_ketersediaan_opt[0]->jumlah +
                                            $get_ketersediaan_opt[1]->jumlah +
                                            $get_ketersediaan_opt[2]->jumlah +
                                            $get_ketersediaan_opt[3]->jumlah +
                                            $get_ketersediaan_opt[4]->jumlah +
                                            $get_ketersediaan_opt[5]->jumlah +
                                            $get_ketersediaan_opt[6]->jumlah ?> orang
                                    </h3>
                                    <p>Total Operator</p>
                                </div>
                                <div class="icon">
                                </div>
                                <a href="#" class="small-box-footer">
                                </a>
                            </div>
                        </div>

                        <!-- ./col -->

                        <!-- ./col -->

                    </div>
                </div>
            </div>
        </div>

        <!-- ./row -->

        <!-- /. row -->
</div><!-- /.container-fluid -->
</section>