  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <h3>DATA UNIT</h3>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              
                              <a href="<?php echo site_url('isi_geofence/p_unit') ?>">
                                  <h3 class="card-title">Kembali ke Dashboard Unit </h3>
                              </a>
                              <br> <br>
                              <a href="<?php echo site_url('isi_unit/add_unit') ?>">
                                  <i class="fas fa-plus">
                                  </i>
                                  <h3 class="card-title">Tambah Data Unit</h3>
                              </a>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>NO UNIT</th>
                                          <th>TIPE</th>
                                          <th>STATUS</th>
                                          <th>KETERANGAN</th>
                                          <th>MENU ADMIN</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php foreach ($tbl_unit as $unit) : ?>
                                          <tr>
                                              <td><?php echo $unit->no_unit ?></td>
                                              <td><?php echo $unit->tipe ?></td>
                                              <td><?php echo $unit->status ?></td>
                                              <td><?php echo $unit->keterangan ?></td>
                                              <td>
                                                  <a href="<?= base_url() ?>isi_unit/edit_unit/<?= $unit->no_unit ?>" class="btn btn-small"><i class="fas fa-edit"></i> Ubah</a>
                                                  <a href="<?= base_url() ?>isi_unit/delete_unit/<?= $unit->no_unit ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i>Hapus</a>
                                              </td>
                                          </tr>
                                      <?php endforeach; ?>
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <th>NO UNIT</th>
                                          <th>TIPE</th>
                                          <th>STATUS</th>
                                          <th>KETERANGAN</th>
                                          <th>MENU ADMIN</th>
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