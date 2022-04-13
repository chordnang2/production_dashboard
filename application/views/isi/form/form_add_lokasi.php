  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Form Tambah Data Lokasi</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <?php if ($this->session->flashdata('success')) : ?>
                  <div class="alert alert-success" role="alert">
                      <?php echo $this->session->flashdata('success'); ?>
                  </div>
              <?php endif; ?>
              <!-- SELECT2 EXAMPLE -->
              <div class="card card-default">
                  <div class="card-header">
                      <a href="<?php echo site_url('isi_lokasi/lokasi') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-12">
                              <form action="<?php echo site_url('isi_lokasi/add_lokasi') ?>" method="post" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label for="id_lokasi">NAMA LOKASI*</label>
                                      <input class="form-control <?php echo form_error('id_lokasi') ? 'is-invalid' : '' ?>" type="text" name="id_lokasi" placeholder="Masukkan Nama Lokasi" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('id_lokasi') ?>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label for="tipe">TIPE LOKASI*</label>
                                      <input class="form-control <?php echo form_error('tipe') ? 'is-invalid' : '' ?>" type="text" name="tipe" placeholder="Masukkan Tipe Lokasi" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('tipe') ?>
                                      </div>
                                  </div>
                                  <!-- /.form-group -->
                                  <input class="btn btn-success" type="submit" name="btn" value="Save" />
                              </form>
                          </div>
                          <!-- /.col -->
                      </div>
                      <!-- /.row -->

                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                      <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                  </div>
              </div>
              <!-- /.card -->
              <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->