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
                          <div class="card-header">
                              <a href="<?php echo site_url('Isi_highlight/form') ?>"><i class="fas fa-plus"></i>
                                  <h3 class="card-title">Import Excel Data Highlight</h3>
                                  <br>
                              </a>
                              <!-- <a href="<?php echo site_url('isi_wb/form') ?>"><i class="fas fa-plus"></i>
                                  <h3 class="card-title">Import Excel</h3>
                                  <br>
                              </a> -->
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <td> </td>
                                          <td>Menu Admin</td>
                                          <td>No</td>
                                          <td>Payment</td>
                                          <td>Month</td>
                                          <td>Tahun</td>
                                          <td>Date</td>
                                          <td>NRP</td>
                                          <td>DRIVER 1</td>
                                          <td>NRP GANTUNGAN</td>
                                          <td>DRIVER 2</td>
                                          <td>Unit</td>
                                          <td>Vessel Type 1</td>
                                          <td>Vessel Type 2</td>
                                          <td>Shift</td>
                                          <td>Rekap RO</td>
                                          <td>Number Trip</td>
                                          <td>Time In</td>
                                          <td>Time Out</td>
                                          <td>Dari</td>
                                          <td>Ke</td>
                                          <td>Tonase</td>
                                          <td>WB</td>
                                          <td>Kosongan</td>
                                          <td>Net</td>
                                          <td>Code</td>
                                          <td>ID WB</td>
                                          <td>Type Coal</td>
                                          <td>Weighbridge</td>
                                          <td>CT</td>
                                          <td>Target</td>
                                          <td>Unit Camp</td>
                                          <td>Target Monthly</td>
                                          <td>Vessel Capacity</td>
                                          <td>HM</td>
                                          <td>KM</td>
                                          <td>Fuel</td>
                                          <td>Cycle Time</td>
                                          <td>Travel Time</td>
                                          <td>Persen</td>
                                          <td>Status</td>
                                          <td>Modifikasi Vessel</td>
                                          <td>Prime Over</td>
                                          <td>Vessel</td>
                                          <td>Target Monthly Rev</td>
                                          <td>Target Internal</td>
                                          <td>Distance</td>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $i = 1 ?>
                                      <?php foreach ($gw as $wba) : ?>
                                          <tr>
                                              <td> </td>
                                              <td>
                                                  <a href="<?= base_url() ?>isi_wb/edit/<?= $wba->no ?>" class="btn btn-small"><i class="fas fa-edit"></i> Ubah</a>
                                                  <a href="<?= base_url() ?>isi_wb/delete_wb/<?= $wba->no ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i>Hapus</a>
                                              </td>
                                              <td><?php echo $i++ ?></td>
                                              <td><?php echo $wba->payment ?></td>
                                              <td><?php echo $wba->month ?></td>
                                              <td><?php echo $wba->tahun ?></td>
                                              <td><?php echo $wba->date ?></td>
                                              <td><?php echo $wba->nrp ?></td>
                                              <td><?php echo $wba->driver_1 ?></td>
                                              <td><?php echo $wba->nrp_gantungan ?></td>
                                              <td><?php echo $wba->driver_2 ?></td>
                                              <td><?php echo $wba->unit ?></td>
                                              <td><?php echo $wba->vessel_type_1 ?></td>
                                              <td><?php echo $wba->vessel_type_2 ?></td>
                                              <td><?php echo $wba->shift ?></td>
                                              <td><?php echo $wba->rekap_r_o ?></td>
                                              <td><?php echo $wba->num_trip ?></td>
                                              <td><?php echo $wba->time_in ?></td>
                                              <td><?php echo $wba->time_out ?></td>
                                              <td><?php echo $wba->dari ?></td>
                                              <td><?php echo $wba->ke ?></td>
                                              <td><?php echo $wba->tonase ?></td>
                                              <td><?php echo $wba->wb ?></td>
                                              <td><?php echo $wba->kosongan ?></td>
                                              <td><?php echo $wba->net ?></td>
                                              <td><?php echo $wba->code ?></td>
                                              <td><?php echo $wba->id_wb ?></td>
                                              <td><?php echo $wba->type_coal ?></td>
                                              <td><?php echo $wba->weighbridge ?></td>
                                              <td><?php echo $wba->ct ?></td>
                                              <td><?php echo $wba->target ?></td>
                                              <td><?php echo $wba->unit_camp  ?></td>
                                              <td><?php echo $wba->target_monthly ?></td>
                                              <td><?php echo $wba->vessel_capacity ?></td>
                                              <td><?php echo $wba->hm ?></td>
                                              <td><?php echo $wba->km ?></td>
                                              <td><?php echo $wba->fuel ?></td>
                                              <td><?php echo $wba->cycle_time ?></td>
                                              <td><?php echo $wba->travel_time ?></td>
                                              <td><?php echo $wba->persen ?></td>
                                              <td><?php echo $wba->status ?></td>
                                              <td><?php echo $wba->modifikasi_vessel ?></td>
                                              <td><?php echo $wba->primemover ?></td>
                                              <td><?php echo $wba->vessel ?></td>
                                              <td><?php echo $wba->target_monthly_rev ?></td>
                                              <td><?php echo $wba->target_internal ?></td>
                                              <td><?php echo $wba->distance ?></td>


                                          </tr>
                                      <?php endforeach; ?>
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                      <td> </td>
                                          <td>Menu Admin</td>
                                          <td>No</td>
                                          <td>Payment</td>
                                          <td>Month</td>
                                          <td>Tahun</td>
                                          <td>Date</td>
                                          <td>NRP</td>
                                          <td>DRIVER 1</td>
                                          <td>NRP GANTUNGAN</td>
                                          <td>DRIVER 2</td>
                                          <td>Unit</td>
                                          <td>Vessel Type 1</td>
                                          <td>Vessel Type 2</td>
                                          <td>Shift</td>
                                          <td>Rekap RO</td>
                                          <td>Number Trip</td>
                                          <td>Time In</td>
                                          <td>Time Out</td>
                                          <td>Dari</td>
                                          <td>Ke</td>
                                          <td>Tonase</td>
                                          <td>WB</td>
                                          <td>Kosongan</td>
                                          <td>Net</td>
                                          <td>Code</td>
                                          <td>ID WB</td>
                                          <td>Type Coal</td>
                                          <td>Weighbridge</td>
                                          <td>CT</td>
                                          <td>Target</td>
                                          <td>Unit Camp</td>
                                          <td>Target Monthly</td>
                                          <td>Vessel Capacity</td>
                                          <td>HM</td>
                                          <td>KM</td>
                                          <td>Fuel</td>
                                          <td>Cycle Time</td>
                                          <td>Travel Time</td>
                                          <td>Persen</td>
                                          <td>Status</td>
                                          <td>Modifikasi Vessel</td>
                                          <td>Prime Over</td>
                                          <td>Vessel</td>
                                          <td>Target Monthly Rev</td>
                                          <td>Target Internal</td>
                                          <td>Distance</td>

                                      </tr>
                                  </tfoot>
                              </table>
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