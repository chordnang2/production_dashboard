 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
         </div><!-- /.container-fluid -->
     </section>

     <!-- Main content -->
     <section class="content">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-12">
                     <div class="card">
                         <div class="card-header d-flex p-0">
                             <h3 class="card-title p-2"> DATA FMS </h3>
                             <form action="<?php echo base_url() ?>Isi_geofence/cycle_summary" method="GET">
                                 <input type="date" name="tanggal" value="<?php
                                                                            if (isset($isi_cycle[0]['date'])) {
                                                                                echo "tanggal " . $isi_cycle[0]['date'];
                                                                            } else {
                                                                                echo '<code> silahkan masukkan tanggal diatas</code>';
                                                                            }
                                                                            ?>">
                                 <button id="load" class="button button--primary button--blue" type="submit">Load data</button>&nbsp
                             </form>


                             <ul class="nav nav-pills ml-auto p-2">
                                 <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">FMS ALL</a></li>
                                 <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">FMS STANDBY</a></li>
                                 <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">ERROR/BUG</a></li>
                             </ul>
                             <a href="<?php echo base_url() ?>Isi_geofence/fms" class="btn btn-app">
                                 <i class="fas fa-redo-alt"></i> Ulang Summary Data
                             </a>
                             
                         </div><!-- /.card-header -->
                         <code>'Update terakhir tanggal <?= $last_date_update[0]['date']; ?>'</code>

                         <div class="card-body">
                             <div class="tab-content">
                                 <div class="tab-pane active" id="tab_1">
                                     <table id="example2" class="table table-bordered table-hover" style="width:100%">
                                         <thead>
                                             <tr>
                                                 <td>NO</td>
                                                 <td>Nomer Unit</td>
                                                 <td>Loading In</td>
                                                 <td>Loading Out</td>
                                                 <td>Total Jarak</td>
                                                 <td>Cycle Time</td>
                                                 <td>Total Parkir</td>
                                                 <td>Total Loading</td>
                                                 <td>Total Tipping</td>
                                                 <td>Total Travel</td>
                                                 <td>Total Standby</td>
                                                 <td>Cycle Transaksi</td>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <?php
                                                foreach ($isi_cycle as $key => $value) {
                                                    $cycle_transaksi = $value['cycle_transaction'];
                                                    $unit = $value['unit'];
                                                    list($idsatu, $iddua) = explode("-", $cycle_transaksi, 2);
                                                    print "<tr><td>"
                                                        . ($key + 1)
                                                        . "</td><td>"
                                                        . $unit
                                                        . "</td><td>"
                                                        . $value['load_awal']
                                                        . "</td><td>"
                                                        . $value['load_akhir']
                                                        . "</td><td>"
                                                        . $value['total_milage']
                                                        . "</td><td>"
                                                        . $value['total_waktu']
                                                        . "</td><td>"
                                                        . $value['total_durasiparkir']
                                                        . "</td><td>"
                                                        . $value['total_loading']
                                                        . "</td><td>"
                                                        . $value['total_tipping']
                                                        . "</td><td>"
                                                        . $value['total_travel']
                                                        . "</td><td>"
                                                        . $value['total_standby']
                                                        . "</td>";

                                                    // . " <button type='button' 'class='cycle_transaction_btn' unit='MHA PM-829' idsatu='" .  $idsatu . "'iddua='" . $iddua . "'>View Rit 1"
                                                    // . "</button></td>";
                                                    ?>

                                                 <td><button type="button" class="cycle_transaction_btn btn btn-default btn-block" unit="<?= $unit ?>" idsatu="<?= $idsatu ?>" iddua="<?= $iddua ?>">Detail</button></td>

                                                 </tr>
                                             <?php } ?>
                                         </tbody>
                                         <tfoot>
                                             <tr>
                                                 <td>NO</td>
                                                 <td>Nomer Unit</td>
                                                 <td>Loading In</td>
                                                 <td>Loading Out</td>
                                                 <td>Total Jarak</td>
                                                 <td>Cycle Time</td>
                                                 <td>Total Parkir</td>
                                                 <td>Total Loading</td>
                                                 <td>Total Tipping</td>
                                                 <td>Total Travel</td>
                                                 <td>Total Standby</td>
                                                 <td>Cycle Transaksi</td>
                                             </tr>
                                         </tfoot>
                                     </table>

                                 </div>
                                 <!-- /.tab-pane -->
                                 <div id="myModal" class="modal">

                                     <!-- Modal content -->
                                     <div class="modal-content">
                                     </div>
                                 </div>
                                 <div class="tab-pane" id="tab_2">
                                     <table id="example" class="table table-bordered table-hover" style="width:100%">
                                         <thead>
                                             <tr>
                                                 <td>NO</td>
                                                 <td>Nomer Unit</td>
                                                 <td>Loading In</td>
                                                 <td>Loading Out</td>
                                                 <td>Total ParkingBay</td>
                                                 <td>Total PitStop</td>
                                                 <td>Total Refueling</td>
                                                 <td>Total Weighbridge</td>
                                                 <td>Total Workshop</td>
                                                 <td>Total Standby</td>
                                                 <td>Cycle Transaksi</td>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <?php

                                                foreach ($isi_cycle as $key => $value) {
                                                    $cycle_transaksi = $value['cycle_transaction'];
                                                    $unit = $value['unit'];
                                                    list($idsatu, $iddua) = explode("-", $cycle_transaksi, 2);
                                                    print "<tr><td>"
                                                        . ($key + 1)
                                                        . "</td><td>"
                                                        . $unit
                                                        . "</td><td>"
                                                        . $value['load_awal']
                                                        . "</td><td>"
                                                        . $value['load_akhir']
                                                        . "</td><td>"
                                                        . $value['total_parkingbay']
                                                        . "</td><td>"
                                                        . $value['total_pitstop']
                                                        . "</td><td>"
                                                        . $value['total_refuelling']
                                                        . "</td><td>"
                                                        . $value['total_weighbridge']
                                                        . "</td><td>"
                                                        . $value['total_workshop']
                                                        . "</td><td>"
                                                        . $value['total_standby']
                                                        . "</td>";
                                                    ?>
                                                 <td><button type="button" class="cycle_transaction_btn btn btn-default btn-block" unit="<?= $unit ?>" idsatu="<?= $idsatu ?>" iddua="<?= $iddua ?>">Detail</button></td>

                                             <?php
                                                }
                                                ?>
                                         </tbody>
                                     </table>
                                 </div>
                                 <div class="tab-pane" id="tab_3">
                                     <table id="example4" class="table table-bordered table-hover" style="width:100%">
                                         <thead>
                                             <tr>
                                                 <td>NO</td>
                                                 <td>Nomer Unit</td>
                                                 <td>MSG</td>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <?php

                                                foreach ($bug_cycle as $key => $value) {
                                                    $unit = $value['unit'];
                                                    print "<tr><td>"
                                                        . ($key + 1)
                                                        . "</td><td>"
                                                        . $unit
                                                        . "</td><td>"
                                                        . $value['msg']
                                                        . "</td></tr>";
                                                    ?>

                                             <?php
                                                }
                                                ?>
                                         </tbody>
                                     </table>
                                 </div>
                                 <!-- /.tab-pane -->
                                 <!-- /.tab-pane -->
                             </div>
                             <!-- /.tab-content -->
                         </div><!-- /.card-body -->


                     </div>
                     <!-- /.card-body -->
                 </div>
                 <!-- /.card -->
             </div>
             <!-- /.col -->
         </div>
         <!-- /.row -->
 </div>
 <!-- /.container-fluid -->
 </section>
 <!-- /.content -->
 </div>
 <div class="modal fade" id="myModal">
     <div class="modal-dialog modal-sm">
         <div class="modal-content">

         </div>
     </div>
     <!-- /.modal-content -->
 </div>
 <!-- /.modal-dialog -->
 </div>
 <!-- The Modal -->

 <!-- <div class=" modal-dialog modal-xl" id=" myModal" class="modal">


     <div class="modal-content">
     </div>
 </div> -->