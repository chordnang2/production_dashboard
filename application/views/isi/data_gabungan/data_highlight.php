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
                            DATA HIGHLIGHT
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <td>Menu Admin</td>
                                          <td>No Transaksi</td>
                                          <td>Shift</td>
                                          <td>Nomer unit</td>
                                          <td>Date</td>
                                          <td>Payment</td>
                                          <td>NRP</td>
                                          <td>NRP Gantungan</td>
                                          <td>Time in Loading</td>
                                          <td>Tonase</td>
                                      
                                          <!-- <td>Target Monthly</td> -->
                                          <td>HM</td>
                                          <td>KM</td>
                                          <td>Fuel</td>
                                          <!-- <td>Modifikasi Vessel</td> -->
                                          <!-- <td>Target Monthy Rev</td>
                                          <td>Target Internal</td>
                                          <td>Distance</td> -->
                                 
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php foreach ($gw as $hgwba) : ?>
                                          <tr>
                                              <td>
                                                  <a href="<?= base_url() ?>isi_highlight/edit/<?= $hgwba->no_transaction ?>" class="btn btn-small"><i class="fas fa-edit"></i> Ubah</a>
                                              </td>
                                              <td><?php echo $hgwba->no_transaction  ?></td>
                                              <td><?php echo $hgwba->shift ?></td>
                                              <td><?php echo $hgwba->no_unit ?></td>
                                              <td><?php echo $hgwba->date ?></td>
                                              <td><?php echo $hgwba->payment ?></td>
                                              <td><?php echo $hgwba->nrp ?></td>
                                              <td><?php echo $hgwba->nrp_gantungan ?></td>
                                              <td><?php echo $hgwba->time_in_hg ?></td>
                                              <td><?php echo $hgwba->tonase ?></td>
                                          
                                              <!-- <td><?php echo $hgwba->target_monthly ?></td> -->
                                              <td><?php echo $hgwba->hm ?></td>
                                              <td><?php echo $hgwba->km ?></td>
                                              <td><?php echo $hgwba->fuel ?></td>
                                              <!-- <td><?php echo $hgwba->modifikasi_vessel ?></td>
                                              <td><?php echo $hgwba->target_monthy_rev ?></td>
                                              <td><?php echo $hgwba->target_internal ?></td>
                                              <td><?php echo $hgwba->distance ?></td>
                                    -->

                                          </tr>
                                      <?php endforeach; ?>
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <td>Menu Admin</td>
                                          <td>No Transaksi</td>
                                          <td>Shift</td>
                                          <td>Nomer unit</td>
                                          <td>Date</td>
                                          <td>Payment</td>
                                          <td>NRP</td>
                                          <td>NRP Gantungan</td>
                                          <td>Time in Loading</td>
                                          <td>Tonase</td>
         
                                          <!-- <td>Target Monthly</td> -->
                                          <td>HM</td>
                                          <td>KM</td>
                                          <td>Fuel</td>
                                          <!-- <td>Modifikasi Vessel</td>
                                          <td>Target Monthy Rev</td>
                                          <td>Target Internal</td>
                                          <td>Distance</td> -->
                            
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