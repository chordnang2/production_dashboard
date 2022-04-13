<?php

date_default_timezone_set('Asia/Singapore');

$jamini = date("H");

?>

<div class="content-wrapper">

    <section class="content">

        <div class="container-fluid">

            <?php

          //  echo "<pre>";

          //  print_r($no_running);

           // echo "</pre>";

           // die();

            ?>

            <br>

            <div class="row">

                <div class="col-lg-12">

                    <div class="card-header d-flex p-0">

                        <h5 class="mb-2">Status Unit Running<small><i>Informasi Hari Ini</i></small></h5>

                        <ul class="nav nav-pills ml-auto p-2">

                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Summary</a></li>

                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Unit Running</a></li>

                            <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Unit Tidak Running</a></li>

                        </ul>

                    </div><!-- /.card-header -->

                    <code>'Update terakhir tanggal <?= $last_date_update[0]['date']; ?>'</code>



                    <div class="tab-content">

                        <div class="tab-pane active" id="tab_1">

                            <div class="card-body">

                                <div class="row">

                                    <div class="col-lg-3 col-6">

                                        <div class="small-box bg-success">

                                            <div class="inner">

                                                <h3>

                                                    <?= $running[0]->running ?> unit

                                                </h3>

                                                <p>Unit Running</p>

                                            </div>

                                            <div class="icon">

                                            </div>

                                        </div>

                                    </div>

                                    <?php foreach ($no_running as $g) : ?>

                                        <?php if ($g->aktivity == 'ACCIDENT') {

                                                $warna = 'danger';

                                            } elseif ($g->aktivity == 'BREAKDOWN') {

                                                $warna = 'danger';

                                            } elseif ($g->aktivity == 'GREASING') {

                                                $warna = 'warning';

                                            } elseif ($g->aktivity == 'SERVICE') {

                                                $warna = 'warning';

                                            } elseif ($g->aktivity == 'NO SET VESSEL') {

                                                $warna = 'info';

                                            } elseif ($g->aktivity == 'REPAIR') {

                                                $warna = 'warning';

                                            } elseif ($g->aktivity == 'RETORQUE') {

                                                $warna = 'warning';

                                            } elseif ($g->aktivity == 'STANDBY READY') {

                                                $warna = 'info';

                                            } elseif ($g->aktivity == '') {

                                                $warna = '';

                                            } else { } ?>

                                        <div class="col-lg-3 col-6">

                                            <div class="small-box bg-<?= $warna ?>">

                                                <div class="inner">

                                                    <h3>

                                                        <?php echo $g->no_unit ?> unit

                                                    </h3>

                                                    <p>Unit <?php echo $g->aktivity ?></p>

                                                </div>

                                                <div class="icon">

                                                    <!-- <i class="fas fa-shopping-cart"></i> -->

                                                </div>

                                                <!-- <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-running">

                                        Detail <i class="fas fa-arrow-circle-right"></i>

                                    </a> -->

                                            </div>

                                        </div>

                                    <?php endforeach; ?>

                                </div>

                            </div>

                        </div>

                        <div class="tab-pane" id="tab_2">

                            <table id="unitrunning" class="table table-bordered table-hover" style="width:100%">

                                <thead>

                                    <tr>

                                        <td>NO</td>

                                        <td>Nomer Unit</td>

                                        <td>Tipe Vessel</td>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php



                                    foreach ($running_detail as $key => $value) {

                                        print "<tr><td>"

                                            . ($key + 1)

                                            . "</td><td>"

                                            . $value['id']

                                            . "</td><td>"

                                            . $value['vessel4']

                                            . "</td></tr>"

                                        ?>

                                    <?php

                                    }

                                    ?>

                                </tbody>

                            </table>

                        </div>

                        <div class="tab-pane" id="tab_3">

                            <table id="unitnotrunning" class="table table-bordered table-hover" style="width:100%">

                                <thead>

                                    <tr>

                                        <td>NO</td>

                                        <td>Nomer Unit</td>

                                        <td>Tipe Vessel</td>

                                        <td>Detail Problem</td>

                                        <td>Tipe Problem</td>

                                        <td>Lokasi Problem</td>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php



                                    foreach ($not_running_detail as $key => $value) {

                                        print "<tr><td>"

                                            . ($key + 1)

                                            . "</td><td>"

                                            . $value['id']

                                            . "</td><td>"

                                            . $value['vessel4']

                                            . "</td><td>"

                                            . $value['problem']

                                            . "</td><td>"

                                            . $value['aktivity']

                                            . "</td><td>"

                                            . $value['location']

                                            . "</td></tr>"

                                        ?>

                                    <?php

                                    }

                                    ?>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="modal fade" id="modal-running" style="display: none;" aria-hidden="true">

            <div class="modal-dialog modal-lg">

                <div class="modal-content">

                    <div class="modal-header">

                        <h4 class="modal-title">Detail Unit Running</h4>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">×</span>

                        </button>

                    </div>

                    <div class="modal-body">

                        <table id="" class="display table table-striped">

                            <thead>

                                <tr>

                                    <th style="width: 10px">#</th>

                                    <th>Nomer Unit</th>

                                    <th>Vessel</th>

                                    <th>Lokasi</th>

                                    <th style="width: 40px">Status</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php $i = 1; ?>

                                <?php foreach ($get_detail_unit_running as $a) : ?>

                                    <tr>

                                        <td><?php echo $i++ ?></td>

                                        <td><?php echo $a->id ?></td>

                                        <td><?php echo $a->vessel4 ?></td>

                                        <td><?php echo $a->unit_camp4 ?></td>

                                        <td><?php echo $a->status ?></td>

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

        <!-- ./row -->



        <!-- /. row -->

</div><!-- /.container-fluid -->

</section>