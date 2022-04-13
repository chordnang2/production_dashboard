  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Form Tambah Data Vessel</h1>
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
                      <a href="<?php echo site_url('isi_vessel/vessel') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-12">
                              <form action="<?php echo site_url('isi_vessel/add_vessel') ?>" method="post" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label for="id">ID*</label>
                                      <input class="form-control <?php echo form_error('id') ? 'is-invalid' : '' ?>" type="text" name="id" placeholder="Masukkan ID Vessel" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('id') ?>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="nama_vessel">NAMA VESSEL*</label>
                                      <input class="form-control <?php echo form_error('nama_vessel') ? 'is-invalid' : '' ?>" type="text" name="nama_vessel" placeholder="Masukkan Nama Vessel" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('nama_vessel') ?>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="tipe">TIPE*</label>
                                      <input class="form-control <?php echo form_error('tipe') ? 'is-invalid' : '' ?>" type="text" name="tipe" placeholder="Masukkan Tipe" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('tipe') ?>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="kapasitas">KAPASITAS*</label>
                                      <input class="form-control <?php echo form_error('kapasitas') ? 'is-invalid' : '' ?>" type="text" name="kapasitas" placeholder="Masukkan Kapasitas" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('kapasitas') ?>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="kapasitas_overload">KAPASITAS OVERLOAD*</label>
                                      <input class="form-control <?php echo form_error('kapasitas_overload') ? 'is-invalid' : '' ?>" type="text" name="kapasitas_overload" placeholder="Masukkan Kapasitas Overload" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('kapasitas_overload') ?>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="tipe_coal">TIPE COAL*</label>
                                      <input class="form-control <?php echo form_error('tipe_coal') ? 'is-invalid' : '' ?>" type="text" name="tipe_coal" placeholder="Masukkan Nama Tipe Coal" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('tipe_coal') ?>
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