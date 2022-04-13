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
                    <div class="card">
                        <div class="card-header">
                            <form action="<?php echo base_url() ?>Pro_operator_controller/pro_opt" method="GET">
                                <input type="date" name="tanggal" value="<?php
                                                                            if (isset($opt_day[0]->date)) {
                                                                                echo  $opt_day[0]->date;
                                                                            } else { }
                                                                            ?>">
                                <button id="load" class="button button--primary button--blue" type="submit">Load data</button><br>
                                <?php
                                if (isset($opt_day[0]->date)) { } else {
                                    echo '<code>update terakhir tanggal ' . $last_date_update[0]['date'];
                                    '.</code>';
                                }
                                ?>
                            </form>
                        </div>
                        <div class="card-body">
                            <h5 class="mb-2">Produktifitas Operator<small><i>Tanggal </i></small></h5>
                            <div class="row">
                                <div class="col-lg-3 col-6">
                                    <!-- small card -->
                                    <div class="small-box bg-success">
                                        <div class="inner">

                                            <h3>

                                                Operator Siang



                                            </h3>

                                            <p>Jam operasi, Jam Stb, Jam BD</p>
                                        </div>
                                        <div class="icon">
                                            <!-- <i class="fas fa-shopping-cart"></i> -->
                                        </div>
                                        <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-hm">


                                            Detail<i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                        <!-- <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-hm_grafik">


                                    Grafik<i class="fas fa-arrow-circle-right"></i>
                                </a> -->
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small card -->
                                    <div class="small-box bg-info">
                                        <div class="inner">

                                            <h3>

                                                Operator Malam



                                            </h3>

                                            <p>Jam operasi, Jam Stb, Jam BD</p>
                                        </div>
                                        <div class="icon">
                                            <!-- <i class="fas fa-shopping-cart"></i> -->
                                        </div>
                                        <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-trip">


                                            Detail<i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                        <!-- <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-trip_grafik">


                                    Grafik<i class="fas fa-arrow-circle-right"></i>
                                </a> -->
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">

                                </div>

                                <div class="col-lg-3 col-6">

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-hm" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title">Detail Jam operasi, Jam Stb, Jam BD siang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table id="example" class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>NRP</th>
                                    <th>Nama Operator</th>
                                    <th>Jam Operasi </th>
                                    <th>Jam Standby</th>
                                    <th>Jam BD</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($opt_day as $a) : ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $a->nik ?></td>
                                        <td><?php echo $a->nama ?></td>
                                        <td><?php echo $a->wh_day ?> jam</td>
                                        <td><?php echo $a->stb_day ?> jam</td>
                                        <td><?php echo $a->bd_day ?> jam</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="modal-hm_grafik" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title">Grafik Jumlah HM Daily</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <canvas id="counthm"></canvas>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="modal-trip" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title">Jam operasi, Jam Stb, Jam BD malam</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table id="example2" class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>NRP</th>
                                    <th>Nama Operator</th>
                                    <th>Jam Operasi </th>
                                    <th>Jam Standby</th>
                                    <th>Jam BD</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($opt_night as $a) : ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $a->nik ?></td>
                                        <td><?php echo $a->nama ?></td>
                                        <td><?php echo $a->wh_night ?> jam</td>
                                        <td><?php echo $a->stb_night ?> jam</td>
                                        <td><?php echo $a->bd_night ?> jam</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="modal-trip_grafik" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title">Grafik Jumlah TRIP Daily</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <canvas id="counttrip"></canvas>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
</div><!-- /.container-fluid -->
</section>