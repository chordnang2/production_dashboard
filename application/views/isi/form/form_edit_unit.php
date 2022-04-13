  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Form Edit Data UNIT</h1>
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
                      <a href="<?php echo site_url('isi_unit/unit') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-12">
                              <form action="" method="post" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label for="no_unit">Nomer Unit*</label>
                                      <input class="form-control <?php echo form_error('no_unit') ? 'is-invalid' : '' ?>" type="text" name="no_unit" value="<?= $tbl_unit['no_unit']; ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('no_unit') ?>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="tipe">TIPE UNIT*</label>
                                      <input class="form-control <?php echo form_error('tipe') ? 'is-invalid' : '' ?>" type="text" name="tipe" value="<?= $tbl_unit['tipe']; ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('tipe') ?>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="status">STATUS*</label>
                                      <input class="form-control <?php echo form_error('status') ? 'is-invalid' : '' ?>" type="text" name="status" value="<?= $tbl_unit['status']; ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('status') ?>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="keterangan">KETERANGAN*</label>
                                      <input class="form-control <?php echo form_error('keterangan') ? 'is-invalid' : '' ?>" type="text" name="keterangan" value="<?= $tbl_unit['keterangan']; ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('keterangan') ?>
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