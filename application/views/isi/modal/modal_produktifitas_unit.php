<div class="modal fade" id="modal-alldataunit" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail All Data Unit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <font size="2">
                            <ul class="nav nav-pills ml-auto p-2">
                                <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">ALL</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Shift Siang</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Shift Malam</a></li>
                            </ul>
                        </font>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <font size="0.5">
                                    <table id="" class="display table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Nomer Unit</th>
                                                <th>OPT</th>
                                                <th>OPT Gantungan</th>
                                                <th>Shift</th>
                                                <th style="width: 100px">Vessel</th>
                                                <th>Ton/HM</th>
                                                <th>PA</th>
                                                <th>UA</th>
                                                <th>JAM BD</th>
                                                <th>JAM Ready</th>
                                                <th>JAM Operasi</th>
                                                <th>JAM Standby</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($getall as $a) : ?>
                                                <tr>
                                                    <td><?php echo $i++ ?></td>
                                                    <td><?php echo $a->unit ?></td>
                                                    <td><?php echo $a->driver_1 ?></td>
                                                    <td><?php echo $a->driver_2 ?></td>
                                                    <td><?php echo $a->shift ?></td>
                                                    <td><?php echo $a->vessel ?></td>
                                                    <td><?php echo $a->tonbagihm ?> ton/hm</td>
                                                    <td><?php echo $a->pa ?> %</td>
                                                    <td><?php echo $a->ua ?> %</td>
                                                    <td><?php echo $a->jambd ?> jam</td>
                                                    <td><?php echo $a->jamready ?> jam</td>
                                                    <td><?php echo $a->jamoperasi ?> jam</td>
                                                    <td><?php echo $a->jamstb ?> jam</td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </font>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                                <font size="0.5">
                                    <table id="" class="display table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Nomer Unit</th>
                                                <th>OPT</th>
                                                <th>OPT Gantungan</th>
                                                <th style="width: 100px">Vessel</th>
                                                <th>Ton/HM</th>
                                                <th>PA</th>
                                                <th>UA</th>
                                                <th>JAM BD</th>
                                                <th>JAM Ready</th>
                                                <th>JAM Operasi</th>
                                                <th>JAM Standby</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($getall_siang as $a) : ?>
                                                <tr>
                                                    <td><?php echo $i++ ?></td>
                                                    <td><?php echo $a->unit ?></td>
                                                    <td><?php echo $a->driver_1 ?></td>
                                                    <td><?php echo $a->driver_2 ?></td>
                                                    <td><?php echo $a->vessel ?></td>
                                                    <td><?php echo $a->tonbagihm ?> ton/hm</td>
                                                    <td><?php echo $a->pa ?> %</td>
                                                    <td><?php echo $a->ua ?> %</td>
                                                    <td><?php echo $a->jambd ?> jam</td>
                                                    <td><?php echo $a->jamready ?> jam</td>
                                                    <td><?php echo $a->jamoperasi ?> jam</td>
                                                    <td><?php echo $a->jamstb ?> jam</td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </font>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
                                <font size="0.5">
                                    <table id="" class="display table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Nomer Unit</th>
                                                <th>OPT</th>
                                                <th>OPT Gantungan</th>
                                                <th style="width: 100px">Vessel</th>
                                                <th>Ton/HM</th>
                                                <th>PA</th>
                                                <th>UA</th>
                                                <th>JAM BD</th>
                                                <th>JAM Ready</th>
                                                <th>JAM Operasi</th>
                                                <th>JAM Standby</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($getall_malam as $a) : ?>
                                                <tr>
                                                    <td><?php echo $i++ ?></td>
                                                    <td><?php echo $a->unit ?></td>
                                                    <td><?php echo $a->driver_1 ?></td>
                                                    <td><?php echo $a->driver_2 ?></td>
                                                    <td><?php echo $a->vessel ?></td>
                                                    <td><?php echo $a->tonbagihm ?> ton/hm</td>
                                                    <td><?php echo $a->pa ?> %</td>
                                                    <td><?php echo $a->ua ?> %</td>
                                                    <td><?php echo $a->jambd ?> jam</td>
                                                    <td><?php echo $a->jamready ?> jam</td>
                                                    <td><?php echo $a->jamoperasi ?> jam</td>
                                                    <td><?php echo $a->jamstb ?> jam</td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </font>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>

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
<div class="modal fade" id="modal-avgtonhm" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Average Ton/HM</h4>
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
                            <th>Trip</th>
                            <th>Tonase</th>
                            <th>Total HM</th>
                            <th>Ton/HM</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($getdetailtonhmvolvo as $a) : ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $a->unit ?></td>
                                <td><?php echo $a->trip ?> trip</td>
                                <td><?php echo $a->tonase ?> ton</td>
                                <td><?php echo $a->total_hm ?> jam</td>
                                <td><?php echo number_format($a->tonbagihm, 2, ',', '.') ?></td>
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
<div class="modal fade" id="modal-sumton" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Total Tonase</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="display table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nomer Unit</th>
                            <th>Trip</th>
                            <th>Tonase</th>
                            <th>Type Coal</th>
                            <th>Vessel Capacity</th>
                            <th>Selisih</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($getdetailtonvolvo as $a) : ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $a->unit ?></td>
                                <td><?php echo $a->trip ?> trip</td>
                                <td><?php echo $a->ton ?> ton</td>
                                <td><?php echo $a->type_coal ?> </td>
                                <td><?php echo $a->vessel_capacity ?></td>
                                <td><?php echo $a->selisih ?></td>
                                <td><?php echo $a->status1 ?></td>
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
<div class="modal fade" id="modal-totaltrip" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Total Trip</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="display table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nomer Unit</th>
                            <th>Trip</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($getdetailtripvolvo as $a) : ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $a->unit ?></td>
                                <td><?php echo $a->trip ?> trip</td>
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
<div class="modal fade" id="modal-avgton" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Average Ton</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="display table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nomer Unit</th>
                            <th>Average Ton</th>
                            <th>Jumlah Underload</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($detailavgton as $a) : ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $a->unit ?></td>
                                <td><?php echo number_format($a->a, 2, ',', ' ')  ?> ton</td>
                                <td><?php echo $a->underload ?></td>
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
<div class="modal fade" id="modal-avgdistance" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Average Distance</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="display table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nomer Unit</th>
                            <th>Average Distance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($detailavgdistance as $a) : ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $a->unit ?></td>
                                <td><?php echo number_format($a->distance, 2, ',', ' ')  ?> km</td>
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
<div class="modal fade" id="modal-totaldistance" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Total Distance</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="display table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nomer Unit</th>
                            <th>Average Distance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($detail_total_distance as $a) : ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $a->unit ?></td>
                                <td><?php echo number_format($a->distance, 2, ',', ' ')  ?> km</td>
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
<div class="modal fade" id="modal-totaltonkm" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Total TON * KM</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="display table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nomer Unit</th>
                            <th>Ton</th>
                            <th>Average Distance</th>
                            <th>SUM Distance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($detail_total_ton_km as $a) : ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $a->unit ?></td>
                                <td><?php echo $a->ton ?></td>
                                <td><?php echo number_format($a->distance, 2, ',', ' ')  ?> km</td>
                                <td><?php echo number_format($a->sum, 2, ',', '.')  ?> km</td>
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
<div class="modal fade" id="modal-unitrunning" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Unit Running</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="display table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nomer Unit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($detail_unit_running as $a) : ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $a->unit ?></td>
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
<div class="modal fade" id="modal-bd" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Total Jam Breakdown</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="display table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nomer Unit</th>
                            <th>Total Jam Breakdown</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($detail_total_bd as $a) : ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $a->unit ?></td>
                                <td><?php echo  number_format($a->bd, 2, ',', ' ') ?> jam</td>
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
<div class="modal fade" id="modal-hm" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Total Jam HM</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="display table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nomer Unit</th>
                            <th>Total Jam HM</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($detail_total_hm as $a) : ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $a->unit ?></td>
                                <td><?php echo  $a->hm ?> jam</td>
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
<div class="modal fade" id="modal-pa" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Average PA</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <table class="display table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nomer Unit</th>
                            <th>Average PA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($detail_avg_pa as $a) : ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $a->unit ?></td>
                                <td><?php echo  $a->paa ?></td>
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
<div class="modal fade" id="modal-ma" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Average UA</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="display table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nomer Unit</th>
                            <th>Average UA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($detail_avg_ua as $a) : ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $a->unit ?></td>
                                <td><?php echo  $a->ua ?> %</td>
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
<div class="modal fade" id="modal-cycle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Cycle Time</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="display table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nomer Unit</th>
                            <th>Cycle Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($detail_avg_cyle_time as $a) : ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $a->unit ?></td>
                                <td>0<?php echo  $a->avg_cycle_time ?> jam </td>
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
<div class="modal fade" id="modal-travel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Travel Time</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="display table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nomer Unit</th>
                            <th>Travel Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($detail_avg_travel_time as $a) : ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $a->unit ?></td>
                                <td>0<?php echo  $a->avg_travel_time ?> jam </td>
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
<div class="modal fade" id="modal-stb" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Standby Time</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="display table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nomer Unit</th>
                            <th>Standby Time Day Shift</th>
                            <th>Standby Time Night Shift</th>
                            <th>Total Standby Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($detail_avg_stb as $a) : ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $a->unit ?></td>
                                <td><?php echo $a->total_stb_day ?> jam</td>
                                <td><?php echo $a->total_stb_night ?> jam</td>
                                <td><?php echo  $a->total_stb ?> jam </td>
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
<div class="modal fade" id="modal-bd2" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Breakdown Time</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="display table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nomer Unit</th>
                            <th>BD Time Day Shift</th>
                            <th>BD Time Night Shift</th>
                            <th>Total BD Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($detail_avg_bd as $a) : ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $a->unit ?></td>
                                <td><?php echo $a->total_bd_day ?> jam</td>
                                <td><?php echo $a->total_bd_night ?> jam</td>
                                <td><?php echo  $a->total_bd ?> jam </td>
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