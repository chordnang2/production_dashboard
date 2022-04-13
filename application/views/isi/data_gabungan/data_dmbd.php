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
                              <a href="<?php echo site_url('Dmbd_controller/form') ?>"><i class="fas fa-plus"></i>
                                  <h3 class="card-title">Import Data DMBD</h3>
                                  <br>
                              </a>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                             
                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>Bulan</th>
                                          <th>Tanggal</th>
                                          <th>MO</th>
                                          <th>Kode Unit</th>
                                          <th>Kode Vessel</th>
                                          <th>Modal Unit</th>
                                          <th>Modal Vessel</th>
                                          <th>HM</th>
                                          <th>KM</th>
                                          <th>Task</th>
                                          <th>Job Type</th>
                                          <th>Kerusakan</th>
                                          <th>Jenis Perbaikan</th>
                                          <th>Jam Mulai</th>
                                          <th>Jam Selesai</th>
                                          <th>Total Breakdown</th>
                                          <th>Status</th>
                                          <th>Lokasi</th>
                                          <th>Remark</th>
                                          <th>PIC</th>
                                          <th>PA</th>
                                          <th>Shift</th>

                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php foreach ($dmbd as $dmbd) : ?>
                                          <?php
                                                echo "<tr>                                              <td>" . $dmbd->bulan . "</td>";
                                                echo "<td>" . $dmbd->tanggal . "</td>";
                                                echo "<td>" . $dmbd->mo . "</td>";
                                                echo "<td>" . $dmbd->kode_unit . "</td>";
                                                echo "<td>" . $dmbd->kode_vessel . "</td>";
                                                echo  "<td>" . $dmbd->model_unit . "</td>";
                                                echo "<td>" . $dmbd->model_vessel . "</td>";
                                                echo "<td>" . $dmbd->hm . "</td>";
                                                echo "<td>" . $dmbd->km . "</td>";
                                                echo "<td>" . $dmbd->task . "</td>";
                                                echo  "<td>" . $dmbd->job_type . "</td>";
                                                echo  "<td>" . $dmbd->kerusakan . "</td>";
                                                echo "<td>" . $dmbd->jenis_perbaikan . "</td>";
                                                echo "<td>" . $dmbd->jam_mulai . "</td>";
                                                echo "<td>" . $dmbd->jam_selesai . "</td>";
                                                echo  "<td>" . $dmbd->total_bd . "</td>";
                                                echo  "<td>" . $dmbd->status . "</td>";
                                                echo  "<td>" . $dmbd->lokasi . "</td>";
                                                echo  "<td>" . $dmbd->remark . "</td>";
                                                echo "<td>" . $dmbd->pic . "</td>";
                                                echo  "<td>" . $dmbd->pa . "</td>";
                                                echo "<td>" . $dmbd->shift . "</td> </tr>";
                                                ?>
                                      <?php endforeach; ?>
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <th>Bulan</th>
                                          <th>Tanggal</th>
                                          <th>MO</th>
                                          <th>Kode Unit</th>
                                          <th>Kode Vessel</th>
                                          <th>Modal Unit</th>
                                          <th>Modal Vessel</th>
                                          <th>HM</th>
                                          <th>KM</th>
                                          <th>Task</th>
                                          <th>Job Type</th>
                                          <th>Kerusakan</th>
                                          <th>Jenis Perbaikan</th>
                                          <th>Jam Mulai</th>
                                          <th>Jam Selesai</th>
                                          <th>Total Breakdown</th>
                                          <th>Status</th>
                                          <th>Lokasi</th>
                                          <th>Remark</th>
                                          <th>PIC</th>
                                          <th>PA</th>
                                          <th>Shift</th>
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
  </div>