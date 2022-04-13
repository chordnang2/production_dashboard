  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <h3>DATA LOKASI</h3>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <a href="<?php echo site_url('isi_lokasi/add_lokasi') ?>"><i class="fas fa-plus"></i>
                                  <h3 class="card-title">Tambah Data Lokasi</h3>
                              </a>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>NO</th>
                                          <th>NAMA LOKASI</th>
                                          <th>TIPE LOKASI</th>
                                          <th>MENU ADMIN</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $no = 1; 
                                      foreach ($tbl_lokasi as $lokasi) : ?>
                                          <tr>
                                              <td><?php echo $no++; ?></td>
                                              <td><?php echo $lokasi->id_lokasi ?></td>
                                              <td><?php echo $lokasi->tipe ?></td>
                                              <td>
                                                  <a href="<?= base_url() ?>isi_lokasi/edit_lokasi/<?= $lokasi->id_lokasi ?>" class="btn btn-small"><i class="fas fa-edit"></i> Ubah</a>
                                                  <a href="<?= base_url() ?>isi_lokasi/delete_lokasi/<?= $lokasi->id_lokasi ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i>Hapus</a>
                                              </td>
                                          </tr>
                                      <?php endforeach; ?>
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <th>NO</th>
                                          <th>NAMA LOKASI</th>
                                          <th>TIPE LOKASI</th>
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