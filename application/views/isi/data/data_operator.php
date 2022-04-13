  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <h3>DATA OPERATOR</h3>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <a href="<?php echo site_url('isi_operator/add_opt') ?>"><i class="fas fa-plus"></i>
                                  <h3 class="card-title">Tambah Data Opeator</h3>
                              </a>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>NRP</th>
                                          <th>NAMA OPERATOR</th>
                                          <th>MENU ADMIN</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php foreach ($tbl_opt as $operator) : ?>
                                          <tr>
                                              <td><?php echo $operator->nrp ?></td>
                                              <td><?php echo $operator->nama_operator ?></td>
                                              <td>
                                                  <a href="<?= base_url()?>isi_operator/edit_opt/<?=$operator->nrp?>" class="btn btn-small"><i class="fas fa-edit"></i> Ubah</a>
                                                  <a href="<?= base_url()?>isi_operator/delete_opt/<?=$operator->nrp?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i>Hapus</a>
                                                  
                                              </td>
                                          </tr>
                                      <?php endforeach; ?>
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <th>NRP</th>
                                          <th>NAMA OPERATOR</th>
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