  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Form Edit Data Operator</h1>
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
                      <a href="<?php echo site_url('isi_operator/operator') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-12">
                              <form action="" method="post" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label for="nrp">NRP*</label>
                                      <input class="form-control <?php echo form_error('nrp') ? 'is-invalid' : '' ?>" type="number" name="nrp" value="<?= $tbl_opt['nrp'];?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('nrp') ?>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label for="nama_operator">Nama*</label>
                                      <input class="form-control <?php echo form_error('nama_operator') ? 'is-invalid' : '' ?>" type="text" name="nama_operator" value="<?= $tbl_opt['nama_operator'];?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('nama_operator') ?>
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