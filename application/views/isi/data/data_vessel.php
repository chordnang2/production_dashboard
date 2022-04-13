  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <h3>DATA VESSEL</h3>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <a href="<?php echo site_url('Isi_vessel/add_vessel') ?>"><i class="fas fa-plus"></i>
                                  <h3 class="card-title">Tambah Data Vessel</h3>
                              </a>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>ID</th>
                                          <th>NAMA VESSEL</th>
                                          <th>TIPE</th>
                                          <th>KAPASITAS</th>
                                          <th>KAPASITAS OVERLOAD</th>
                                          <th>TIPE COAL</th>
                                          <th>MENU ADMIN</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      
                                      <?php
                                        foreach ($tbl_vessel as $vessel) : ?>
                                          <tr>

                                              <td><?php echo $vessel->id ?></td>
                                              <td><?php echo $vessel->nama_vessel ?></td>
                                              <td><?php echo $vessel->tipe ?></td>
                                              <td><?php echo $vessel->kapasitas ?></td>
                                              <td><?php echo $vessel->kapasitas_overload ?></td>
                                              <td><?php echo $vessel->tipe_coal ?></td>
                                              <td>
                                                  <a href="<?= base_url() ?>Isi_vessel/edit_vessel/<?= $vessel->id ?>" class="btn btn-small"><i class="fas fa-edit"></i> Ubah</a>
                                                  <a href="<?= base_url() ?>Isi_vessel/delete_vessel/<?= $vessel->id ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i>Hapus</a>
                                              </td>
                                          </tr>
                                      <?php endforeach; ?>
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <th>ID</th>
                                          <th>NAMA VESSEL</th>
                                          <th>TIPE</th>
                                          <th>KAPASITAS</th>
                                          <th>KAPASITAS OVERLOAD</th>
                                          <th>TIPE COAL</th>
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