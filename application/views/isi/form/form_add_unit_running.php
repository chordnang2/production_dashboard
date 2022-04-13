  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Form Tambah Data Workshop Dispatch</h1>
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
                      <a href="<?php echo site_url('Isi_unit_running/running') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-12">
                              <form action="<?php echo site_url('Isi_unit_running/add_bd') ?>" method="post" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label>NO UNIT*</label>
                                      <select class="form-control select2" name="unit" style="width: 100%;">
                                          <option selected="selected"></option>
                                          <?php foreach ($unit as $a) : ?>
                                              <option><?php echo $a->no_unit4 ?></option>
                                          <?php endforeach; ?>
                                      </select>
                                      <?php echo form_error('unit') ?>
                                  </div>
                                  <div class="form-group">
                                      <label>STATUS*</label>
                                      <select class="form-control select" name="status" style="width: 100%;">
                                          <option selected="selected"></option>
                                          <option>NO SET VESSEL</option>
                                          <option>BD</option>
                                          <option>SERVICE</option>
                                          <option>STANDBY READY</option>
                                          <option>ACCIDENT</option>
                                          <option>READY</option>
                                      </select>
                                      <?php echo form_error('status') ?>
                                  </div>
                                  <div class="form-group">
                                      <label>JAM*</label>
                                      <div class="input-group date " id="timepicker1" data-target-input="nearest">
                                          <input type="text" name="jam" class="form-control datetimepicker-input <?php echo form_error('jam') ? 'is-invalid' : '' ?>" data-target="#timepicker1" />
                                          <div class="input-group-append" data-target="#timepicker1" data-toggle="datetimepicker">
                                              <div class="input-group-text"><i class="far fa-clock"></i></div>
                                          </div>
                                      </div>
                                      <?php echo form_error('jam') ?>

                                  </div>
                                  <div class="form-group">
                                      <?php
                                        date_default_timezone_set('Asia/Singapore');
                                        $t = strtotime("today");
                                        $y = strtotime("yesterday");
                                        $hariini = date("Y-m-d", $t);
                                        $kemaren = date("Y-m-d", $y);
                                        ?>
                                      <label>TANGGAL*</label>
                                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                          <input value="$hariini" type="text" name="tanggal" class="form-control datetimepicker-input <?php echo form_error('tanggal') ? 'is-invalid' : '' ?>" data-target="#reservationdate" />
                                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="keterangan">KETERANGAN*</label>
                                      <input class="form-control <?php echo form_error('keterangan') ? 'is-invalid' : '' ?>" type="text" name="keterangan" />
                                      <?php echo form_error('keterangan') ?>
                                  </div>

                          </div>
                      </div>
                      <!-- /.form-group -->
                      <input class="btn btn-success" type="submit" name="btn" value="Save" />
                      </form>
                  </div>

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
  <script type="text/javascript">
      $('#reservationdate').datetimepicker({
          format: 'Y-MM-DD'
      });

      $('#reservationdatetime').datetimepicker({
          icons: {
              time: 'far fa-clock'
          }
      });
      $('#timepicker1').datetimepicker({
          format: 'HH:mm:ss'
      })
      $('#timepicker2').datetimepicker({
          format: 'HH:mm:ss'
      })
      $('#timepicker3').datetimepicker({
          format: 'HH:mm:ss'
      })
      $('#timepicker4').datetimepicker({
          format: 'HH:mm:ss'
      })
      $('#timepicker5').datetimepicker({
          format: 'HH:mm:ss'
      })
      $('#timepicker6').datetimepicker({
          format: 'HH:mm:ss'
      })
      $('#timepicker7').datetimepicker({
          format: 'HH:mm:ss'
      })
      $('#timepicker8').datetimepicker({
          format: 'HH:mm:ss'
      })
      $('#timepicker9').datetimepicker({
          format: 'HH:mm:ss'
      })
      $('#timepicker10').datetimepicker({
          format: 'HH:mm:ss'
      })
  </script>