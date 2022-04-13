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
                              <a href="<?php echo site_url('isi_geofence/add_geofence') ?>"><i class="fas fa-plus"></i>
                                  <h3 class="card-title">Tambah Data Geofence</h3>
                                  <br>
                              </a>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <td>Menu Admin</td>
                                          <td>Id</td>
                                          <td>Unit</td>
                                          <td>Geofence</td>
                                          <td>Time in</td>
                                          <td>Time out</td>
                                          <td>Duration</td>
                                          <td>Mileage</td>
                                          <td>Total Waktu</td>
                                          <td>Durasi Parkir</td>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php foreach ($tbl_geofence as $geofence) : ?>
                                          <tr>
                                              <td>
                                                  <!-- <a href="<?= base_url() ?>isi_timbangan/edit_timbangan/<?= $timbangan->id_timbangan ?>" class="btn btn-small"><i class="fas fa-edit"></i> Ubah</a>
                                                  <a href="<?= base_url() ?>isi_timbangan/delete_timbangan/<?= $timbangan->id_timbangan ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i>Hapus</a> -->
                                                  a
                                              </td>
                                              <td><?php echo $geofence->id?></td>
                                              <td><?php echo $geofence->unit ?></td>
                                              <td><?php echo $geofence->geofence ?></td>
                                              <td><?php echo $geofence->time_in ?></td>
                                              <td><?php echo $geofence->time_out ?></td>
                                              <td><?php echo $geofence->duration ?></td>
                                              <td><?php echo $geofence->mileage ?></td>
                                              <td><?php echo $geofence->total_waktu ?></td>
                                              <td><?php echo $geofence->durasi_parkir ?></td>
                                          </tr>
                                      <?php endforeach; ?>
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <td>Menu Admin</td>
                                          <td>Id</td>
                                          <td>Unit</td>
                                          <td>Geofence</td>
                                          <td>Time in</td>
                                          <td>Time out</td>
                                          <td>Duration</td>
                                          <td>Mileage</td>
                                          <td>Total Waktu</td>
                                          <td>Durasi Parkir</td>
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