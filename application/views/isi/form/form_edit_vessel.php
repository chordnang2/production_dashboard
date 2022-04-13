  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Form Edit Data Vessel</h1>
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
                      <form action="" method="post" enctype="multipart/form-data">
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="id">id*</label>
                                      <input class="form-control <?php echo form_error('id') ? 'is-invalid' : '' ?>" type="text" name="id" value="<?= $tbl_vessel['id']; ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('id') ?>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="nama_vessel">NAMA VESSEL*</label>
                                      <input class="form-control <?php echo form_error('nama_vessel') ? 'is-invalid' : '' ?>" type="text" name="nama_vessel" value="<?= $tbl_vessel['nama_vessel']; ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('nama_vessel') ?>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="tipe">TIPE*</label>
                                      <input class="form-control <?php echo form_error('tipe') ? 'is-invalid' : '' ?>" type="text" name="tipe" value="<?= $tbl_vessel['tipe']; ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('tipe') ?>
                                      </div>
                                  </div>
                                  <!-- /.form-group -->
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="kapasitas">KAPASITAS*</label>
                                      <input class="form-control <?php echo form_error('kapasitas') ? 'is-invalid' : '' ?>" type="text" name="kapasitas" value="<?= $tbl_vessel['kapasitas']; ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('kapasitas') ?>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="kapasitas_overload">KAPASITAS OVERLOAD*</label>
                                      <input class="form-control <?php echo form_error('kapasitas_overload') ? 'is-invalid' : '' ?>" type="text" name="kapasitas_overload" value="<?= $tbl_vessel['kapasitas_overload']; ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('kapasitas_overload') ?>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="tipe_coal">TIPE COAL*</label>
                                      <input class="form-control <?php echo form_error('tipe_coal') ? 'is-invalid' : '' ?>" type="text" name="tipe_coal" value="<?= $tbl_vessel['tipe_coal']; ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('tipe_coal') ?>
                                      </div>
                                  </div>
                              </div>

                              <!-- /.col -->
                          </div>
                          <input class="btn btn-success" type="submit" name="btn" value="Save" />
                      </form>
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