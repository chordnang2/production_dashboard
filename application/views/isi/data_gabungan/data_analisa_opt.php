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
                              <a href="<?php echo site_url('isi_bd/add_bd') ?>"><i class="fas fa-plus"></i>
                                  <h3 class="card-title">Tambah Data Analisa OPT</h3>

                              </a>
                              <br>
                              <br>

                              <div class="col-12 col-sm-6">


                              </div>
                          </div>
                          <!-- /.card-header -->

                          <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Tanggal</th>
                                          <th>NRP</th>
                                          <th>Trip</th>
                                          <th>Lcoation</th>
                                          <th>Shift</th>
                                          <th>Unit</th>
                                          <th>Hm Operator</th>
                                          <th>Jam per Trip</th>
                                          <th>Keterangan</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php foreach ($opt as $bd) : ?>
                                          <tr>
                                              <td><?php echo $bd->id_a_opt ?></td>
                                              <td><?php echo $bd->tanggal ?></td>
                                              <td><?php echo $bd->nrp ?></td>
                                              <td><?php echo $bd->trip ?></td>
                                              <td><?php echo $bd->location ?></td>
                                              <td><?php echo $bd->shift ?></td>
                                              <td><?php echo $bd->unit ?></td>
                                              <td><?php echo $bd->hm_unit ?></td>
                                              <td><?php echo number_format($bd->a, 1, '.', '') ?></td>
                                              <td><?php echo $bd->keterangan ?></td>
                                          </tr>
                                      <?php endforeach; ?>
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <th>No</th>
                                          <th>Tanggal</th>
                                          <th>NRP</th>
                                          <th>Trip</th>
                                          <th>Lcoation</th>
                                          <th>Shift</th>
                                          <th>Unit</th>
                                          <th>Hm Unit</th>
                                          <th>Jam Trip</th>
                                          <th>Keterangan</th>
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