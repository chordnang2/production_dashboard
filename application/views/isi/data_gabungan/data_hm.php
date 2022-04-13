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
                              <a href="<?php echo site_url('Hm_controller/form') ?>"><i class="fas fa-plus"></i>
                                  <h3 class="card-title">Import Data HM</h3>
                                  <br>
                              </a>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>Tanggal</th>
                                          <th>NIK Day</th>
                                          <th>Nama Day</th>
                                          <th>Ritase Day</th>
                                          <th>Unit Day</th>
                                          <th>Start Day</th>
                                          <th>End Day</th>
                                          <th>Hours Day</th>
                                          <th>Working Hours Day</th>
                                          <th>Ganti Shift Day</th>
                                          <th>P5M Day</th>
                                          <th>P2H Day</th>
                                          <th>Isi Solar Day</th>
                                          <th>Coal Limit Day</th>
                                          <th>Istirahat dan Makan Day</th>
                                          <th>No Driver Day</th>
                                          <th>Periksa Ban Day</th>
                                          <th>Sholat Day</th>
                                          <th>Cuci Unit Day</th>
                                          <th>Silo BD Day</th>
                                          <th>Hopper BD Day</th>
                                          <th>External Problem Day</th>
                                          <th>Antri Loading Day</th>
                                          <th>Antri Dumping Day</th>
                                          <th>Antri WB Day</th>
                                          <th>Total STB Day</th>
                                          <th>Repair Day</th>
                                          <th>Service Day</th>
                                          <th>Accident Day</th>
                                          <th>Total BD Day</th>
                                          <th>PA Day</th>
                                          <th>UA Day</th>

                                          <th>NIK Night</th>
                                          <th>Nama Nght</th>
                                          <th>Ritase Nght</th>
                                          <th>Start Nght</th>
                                          <th>End Nght</th>
                                          <th>Hours Nght</th>
                                          <th>Working Hours Nght</th>
                                          <th>Ganti Shift Nght</th>
                                          <th>P5M Nght</th>
                                          <th>P2H Nght</th>
                                          <th>Isi Solar Nght</th>
                                          <th>Coal Limit Nght</th>
                                          <th>Istirahat dan Makan Nght</th>
                                          <th>No Driver Nght</th>
                                          <th>Periksa Ban Nght</th>
                                          <th>Sholat Nght</th>
                                          <th>Cuci Unit Nght</th>
                                          <th>Silo BD Nght</th>
                                          <th>Hopper BD Nght</th>
                                          <th>External Problem Nght</th>
                                          <th>Antri Loading Nght</th>
                                          <th>Antri Dumping Nght</th>
                                          <th>Antri WB Nght</th>
                                          <th>Total STB Nght</th>
                                          <th>Repair Nght</th>
                                          <th>Service Nght</th>
                                          <th>Accident Nght</th>
                                          <th>Total BD Nght</th>
                                          <th>PA Nght</th>
                                          <th>UA Nght</th>
                                          <th>Total HM</th>

                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php foreach ($tbl_bd as $bd) : ?>
                                          <?php
                                            echo "<tr>
                                              <td>" . $bd->tanggal . "</td>";
                                            echo "<td>" . $bd->nik_day . "</td>";
                                            echo "<td>" . $bd->nama_day . "</td>";
                                            echo "<td>" . $bd->ritase_day . "</td>";
                                            echo "<td>" . $bd->unit_day . "</td>";
                                            echo "<td>" . $bd->start_day . "</td>";
                                            echo "<td>" . $bd->end_day . "</td>";
                                            echo "<td>" . $bd->hours_day . "</td>";
                                            echo "<td>" . $bd->wh_day . "</td>";
                                            echo "<td>" . $bd->ganti_shift_day . "</td>";
                                            echo "<td>" . $bd->p5m_day . "</td>";
                                            echo "<td>" . $bd->p2h_day . "</td>";
                                            echo "<td>" . $bd->isi_solar_day . "</td>";
                                            echo "<td>" . $bd->coal_limit_day . "</td>";
                                            echo "<td>" . $bd->ism_day . "</td>";
                                            echo "<td>" . $bd->no_driver_day . "</td>";
                                            echo "<td>" . $bd->periksa_ban_day . "</td>";
                                            echo "<td>" . $bd->sholat_day . "</td>";
                                            echo "<td>" . $bd->cuci_unit_day . "</td>";
                                            echo "<td>" . $bd->silo_bd_day . "</td>";
                                            echo "<td>" . $bd->hopper_bd_day . "</td>";
                                            echo "<td>" . $bd->external_prob_day . "</td>";
                                            echo "<td>" . $bd->antri_load_day . "</td>";
                                            echo "<td>" . $bd->antri_dump_day . "</td>";
                                            echo "<td>" . $bd->antri_wb_day . "</td>";
                                            echo "<td>" . $bd->total_stb_day . "</td>";
                                            echo "<td>" . $bd->repair_day . "</td>";
                                            echo "<td>" . $bd->service_day . "</td>";
                                            echo "<td>" . $bd->accident_day . "</td>";
                                            echo "<td>" . $bd->total_bd_day . "</td>";
                                            echo "<td>" . $bd->pa_day . "</td>";
                                            echo "<td>" . $bd->ua_day . "</td>";

                                            echo "<td>" . $bd->nik_night . "</td>";
                                            echo "<td>" . $bd->nama_night . "</td>";
                                            echo "<td>" . $bd->ritase_night . "</td>";

                                            echo "<td>" . $bd->start_night . "</td>";
                                            echo "<td>" . $bd->end_night . "</td>";
                                            echo "<td>" . $bd->hours_night . "</td>";
                                            echo "<td>" . $bd->wh_night . "</td>";
                                            echo "<td>" . $bd->ganti_shift_night . "</td>";
                                            echo "<td>" . $bd->p5m_night . "</td>";
                                            echo "<td>" . $bd->p2h_night . "</td>";
                                            echo "<td>" . $bd->isi_solar_night . "</td>";
                                            echo "<td>" . $bd->coal_limit_night . "</td>";
                                            echo "<td>" . $bd->ism_night . "</td>";
                                            echo "<td>" . $bd->no_driver_night . "</td>";
                                            echo "<td>" . $bd->periksa_ban_night . "</td>";
                                            echo "<td>" . $bd->sholat_night . "</td>";
                                            echo "<td>" . $bd->cuci_unit_night . "</td>";
                                            echo "<td>" . $bd->silo_bd_night . "</td>";
                                            echo "<td>" . $bd->hopper_bd_night . "</td>";
                                            echo "<td>" . $bd->external_prob_night . "</td>";
                                            echo "<td>" . $bd->antri_load_night . "</td>";
                                            echo "<td>" . $bd->antri_dump_night . "</td>";
                                            echo "<td>" . $bd->antri_wb_night . "</td>";
                                            echo "<td>" . $bd->total_stb_night . "</td>";
                                            echo "<td>" . $bd->repair_night . "</td>";
                                            echo "<td>" . $bd->service_night . "</td>";
                                            echo "<td>" . $bd->accident_night . "</td>";
                                            echo "<td>" . $bd->total_bd_night . "</td>";
                                            echo "<td>" . $bd->pa_night . "</td>";
                                            echo "<td>" . $bd->ua_night . "</td>";
                                            echo "<td>" . $bd->total_hm . "</td>
                                          </tr>";
                                            ?>
                                      <?php endforeach; ?>
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <th>Tanggal</th>
                                          <th>NIK Day</th>
                                          <th>Nama Day</th>
                                          <th>Ritase Day</th>
                                          <th>Unit Day</th>
                                          <th>Start Day</th>
                                          <th>End Day</th>
                                          <th>Hours Day</th>
                                          <th>Working Hours Day</th>
                                          <th>Ganti Shift Day</th>
                                          <th>P5M Day</th>
                                          <th>P2H Day</th>
                                          <th>Isi Solar Day</th>
                                          <th>Coal Limit Day</th>
                                          <th>Istirahat dan Makan Day</th>
                                          <th>No Driver Day</th>
                                          <th>Periksa Ban Day</th>
                                          <th>Sholat Day</th>
                                          <th>Cuci Unit Day</th>
                                          <th>Silo BD Day</th>
                                          <th>Hopper BD Day</th>
                                          <th>External Problem Day</th>
                                          <th>Antri Loading Day</th>
                                          <th>Antri Dumping Day</th>
                                          <th>Antri WB Day</th>
                                          <th>Total STB Day</th>
                                          <th>Repair Day</th>
                                          <th>Service Day</th>
                                          <th>Accident Day</th>
                                          <th>Total BD Day</th>
                                          <th>PA Day</th>
                                          <th>UA Day</th>

                                          <th>NIK Night</th>
                                          <th>Nama Nght</th>
                                          <th>Ritase Nght</th>
                                          <th>Start Nght</th>
                                          <th>End Nght</th>
                                          <th>Hours Nght</th>
                                          <th>Working Hours Nght</th>
                                          <th>Ganti Shift Nght</th>
                                          <th>P5M Nght</th>
                                          <th>P2H Nght</th>
                                          <th>Isi Solar Nght</th>
                                          <th>Coal Limit Nght</th>
                                          <th>Istirahat dan Makan Nght</th>
                                          <th>No Driver Nght</th>
                                          <th>Periksa Ban Nght</th>
                                          <th>Sholat Nght</th>
                                          <th>Cuci Unit Nght</th>
                                          <th>Silo BD Nght</th>
                                          <th>Hopper BD Nght</th>
                                          <th>External Problem Nght</th>
                                          <th>Antri Loading Nght</th>
                                          <th>Antri Dumping Nght</th>
                                          <th>Antri WB Nght</th>
                                          <th>Total STB Nght</th>
                                          <th>Repair Nght</th>
                                          <th>Service Nght</th>
                                          <th>Accident Nght</th>
                                          <th>Total BD Nght</th>
                                          <th>PA Nght</th>
                                          <th>UA Nght</th>
                                          <th>Total HM</th>
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