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
                              <a href="<?php echo site_url('Pro_operator_controller/form') ?>"><i class="fas fa-plus"></i>
                                  <h3 class="card-title">Import Data payroll</h3>
                                  <br>
                              </a>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>Tanggal Produksi</th>
                                          <th>Tanggal Payroll</th>
                                          <th>NRP 1</th>
                                          <th>Nama Operator 1</th>
                                          <th>HM Insentif 1</th>
                                          <th>Tanggal Payroll 2</th>
                                          <th>NRP 2</th>
                                          <th>Nama Operator 2</th>
                                          <th>HM Insentif 2</th>
                                          <th>Unit</th>
                                          <th>Vessel Type </th>
                                          <th>Shift</th>
                                          <th>Rekap Ritase Operator</th>
                                          <th>Number Trip</th>
                                          <th>Time In</th>
                                          <th>Time Out</th>
                                          <th>Dari</th>
                                          <th>Ke</th>
                                          <th>Tonase</th>
                                          <th>WB</th>
                                          <th>Kosongan</th>
                                          <th>Net</th>
                                          <th>Id Transaksi</th>
                                          <th>Tipe Coal</th>
                                          <th>Weighbridge</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php foreach ($payroll as $payroll) : ?>
                                          <?php
                                                echo "<tr>                                              <td>" . $payroll->date_produksi . "</td>";
                                                echo "<td>" . $payroll->date_payroll1 . "</td>";
                                                echo "<td>" . $payroll->nrp1 . "</td>";
                                                echo "<td>" . $payroll->driver1 . "</td>";
                                                echo "<td>" . $payroll->hm_insentif1 . "</td>";
                                                echo "<td>" . $payroll->date_payroll2 . "</td>";
                                                echo "<td>" . $payroll->nrp2 . "</td>";
                                                echo "<td>" . $payroll->driver2 . "</td>";
                                                echo "<td>" . $payroll->hm_insentif2 . "</td>";
                                                echo "<td>" . $payroll->unit . "</td>";
                                                echo "<td>" . $payroll->vessel_type . "</td>";
                                                echo "<td>" . $payroll->shift . "</td>";
                                                echo "<td>" . $payroll->rekap_ritase_operator . "</td>";
                                                echo "<td>" . $payroll->num_trip . "</td>";
                                                echo "<td>" . $payroll->time_in . "</td>";
                                                echo "<td>" . $payroll->time_out . "</td>";
                                                echo "<td>" . $payroll->dari . "</td>";
                                                echo "<td>" . $payroll->ke . "</td>";
                                                echo "<td>" . $payroll->tonase . "</td>";
                                                echo "<td>" . $payroll->wb . "</td>";
                                                echo "<td>" . $payroll->kosongan . "</td>";
                                                echo "<td>" . $payroll->net . "</td>";
                                                echo "<td>" . $payroll->id_transaksi . "</td>";
                                                echo "<td>" . $payroll->tipe_coal . "</td>";
                                                echo "<td>" . $payroll->weighbridge . "</td> </tr>";
                                                ?>
                                      <?php endforeach; ?>
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <th>Tanggal Produksi</th>
                                          <th>Tanggal Payroll</th>
                                          <th>NRP 1</th>
                                          <th>Nama Operator 1</th>
                                          <th>HM Insentif 1</th>
                                          <th>Tanggal Payroll 2</th>
                                          <th>NRP 2</th>
                                          <th>Nama Operator 2</th>
                                          <th>HM Insentif 2</th>
                                          <th>Unit</th>
                                          <th>Vessel Type </th>
                                          <th>Shift</th>
                                          <th>Rekap Ritase Operator</th>
                                          <th>Number Trip</th>
                                          <th>Time In</th>
                                          <th>Time Out</th>
                                          <th>Dari</th>
                                          <th>Ke</th>
                                          <th>Tonase</th>
                                          <th>WB</th>
                                          <th>Kosongan</th>
                                          <th>Net</th>
                                          <th>Id Transaksi</th>
                                          <th>Tipe Coal</th>
                                          <th>Weighbridge</th>
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