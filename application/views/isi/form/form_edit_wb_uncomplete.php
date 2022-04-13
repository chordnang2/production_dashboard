  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Form Edit Data Weighbridge</h1>
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
                      <a href="<?php echo site_url('isi_wb/uncomplete') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                  </div>
                  <!-- /.card-header -->
                  <form action="" method="post" enctype="multipart/form-data">
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="no_transaction">Nomer Transaksi*</label>
                                              <input class="form-control <?php echo form_error('no_transaction') ? 'is-invalid' : '' ?>" type="text" name="no_transaction" value="<?= $tbl_wb['no_transaction']; ?>" />
                                              <div class="invalid-feedback">
                                                  <?php echo form_error('no_transaction') ?>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label>Time out</label>
                                              <div class="input-group date" id="timepicker2" data-target-input="nearest">
                                                  <input type="text" name="time_out" class="form-control datetimepicker-input <?php echo form_error('time_out') ? 'is-invalid' : '' ?>" data-target="#timepicker2" value="<?= $tbl_wb['time_out']; ?>" />
                                                  <div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
                                                      <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                  </div>
                                                  <?php echo form_error('time_out') ?>
                                              </div>
                                          </div>
                                          <input class="btn btn-success" type="submit" name="btn" value="Save" />
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label>Tipping</label>
                                              <select class="form-control select2 <?php echo form_error('tipping') ? 'is-invalid' : '' ?>" name="tipping" style="width: 100%;" id="tipping">
                                                  <option selected="selected"><?= $tbl_wb['tipping']; ?></option>
                                                  <?php foreach ($tipping as $t) : ?>
                                                      <option><?php echo $t->tipping ?></option>
                                                  <?php endforeach; ?>
                                              </select>
                                              <?php echo form_error('tipping') ?>
                                          </div>

                                          <div class="form-group">
                                              <label for="status">STATUS*</label>
                                              <input class="form-control <?php echo form_error('status') ? 'is-invalid' : '' ?>" type="text" name="status" id="status" value="<?= $tbl_wb['status']; ?>" />
                                              <div class="invalid-feedback">
                                                  <?php echo form_error('status') ?>
                                              </div>
                                          </div>

                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="no_unit">NO UNIT*</label>
                                      <input class="form-control <?php echo form_error('no_unit') ? 'is-invalid' : '' ?>" type="text" name="no_unit" value="<?= $tbl_wb['no_unit']; ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('no_unit') ?>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="shift">SHIFT*</label>
                                      <input class="form-control <?php echo form_error('shift') ? 'is-invalid' : '' ?>" type="text" name="shift" value="<?= $tbl_wb['shift']; ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('shift') ?>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="tipe_vessel">TIPE VESSEL*</label>
                                      <input class="form-control <?php echo form_error('tipe_vessel') ? 'is-invalid' : '' ?>" type="text" name="tipe_vessel" value="<?= $tbl_wb['tipe_vessel']; ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('tipe_vessel') ?>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="loading_point ">LOADING POINT*</label>
                                      <input class="form-control <?php echo form_error('loading_point') ? 'is-invalid' : '' ?>" type="text" name="loading_point" value="<?= $tbl_wb['loading_point']; ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('loading_point') ?>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="type">TYPE*</label>
                                      <input class="form-control <?php echo form_error('type') ? 'is-invalid' : '' ?>" type="text" name="type" value="<?= $tbl_wb['type']; ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('type') ?>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="weighbridge">WEIGHBRIDGE*</label>
                                      <input class="form-control <?php echo form_error('weighbridge') ? 'is-invalid' : '' ?>" type="text" name="weighbridge" value="<?= $tbl_wb['weighbridge']; ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('weighbridge') ?>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="gross">GROSS*</label>
                                      <input class="form-control <?php echo form_error('gross') ? 'is-invalid' : '' ?>" type="text" name="gross" value="<?= $tbl_wb['gross']; ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('gross') ?>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="tare">TARE*</label>
                                      <input class="form-control <?php echo form_error('tare') ? 'is-invalid' : '' ?>" type="text" name="tare" value="<?= $tbl_wb['tare']; ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('tare') ?>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="nett">NETT*</label>
                                      <input class="form-control <?php echo form_error('nett') ? 'is-invalid' : '' ?>" type="text" name="nett" value="<?= $tbl_wb['nett']; ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('nett') ?>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="time_in">TIME IN*</label>
                                      <input class="form-control <?php echo form_error('time_in') ? 'is-invalid' : '' ?>" type="text" name="time_in" value="<?= $tbl_wb['time_in']; ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('time_in') ?>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label for="target">TARGET*</label>
                                      <input class="form-control <?php echo form_error('target') ? 'is-invalid' : '' ?>" type="text" name="target" value="<?= $tbl_wb['target']; ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('target') ?>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="precentage">PERCENTAGE*</label>
                                      <input class="form-control <?php echo form_error('precentage') ? 'is-invalid' : '' ?>" type="text" name="precentage" value="<?= $tbl_wb['precentage']; ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('precentage') ?>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="loss_weight">LOSS WEIGHT*</label>
                                      <input class="form-control <?php echo form_error('loss_weight') ? 'is-invalid' : '' ?>" type="text" name="loss_weight" value="<?= $tbl_wb['loss_weight']; ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('loss_weight') ?>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="keterangan">KETERANGAN*</label>
                                      <input class="form-control <?php echo form_error('keterangan') ? 'is-invalid' : '' ?>" type="text" name="keterangan" value="<?= $tbl_wb['keterangan']; ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('keterangan') ?>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label for="date">Date*</label>
                                      <input class="form-control <?php echo form_error('date') ? 'is-invalid' : '' ?>" type="text" name="date" value="<?= $tbl_wb['date']; ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('date') ?>
                                      </div>
                                  </div>

                                  <!-- /.form-group -->

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
  <script type="text/javascript">
      $(document).ready(function() {
          $(document).on('change', '#id', function(e) {
              e.preventDefault();
              $.ajax({
                  type: "POST",
                  url: "<?php echo base_url('Isi_wb/get_target') ?>",
                  data: {
                      id: $(this).val(),

                  },
                  success: function(data) {
                      var jsonx = JSON.parse(data);
                      $("#tipe_coal").val(jsonx["0"]['tipe_coal'])
                      $("#kapasitas").val(jsonx["0"]['kapasitas'])
                      $("#kapasitas_overload").val(jsonx["0"]['kapasitas_overload'])
                  }
              })
          });
          //   
          $(document).on('change', '#inputNett', function(e) {
              var val = $(this).val();
              var gross = $("#gross").val();
              $("#tare").val(gross - val);
          });

          $(document).on('change', '#inputNett', function(e) {
              var val = $(this).val();
              var kapasitas = $("#kapasitas").val();
              var nett = (val - kapasitas) / kapasitas * 100;
              $("#percentage").val(nett.toFixed(0) + "%");
              $("#lw").val(val - kapasitas);
              var kapasitas_overload = $("#kapasitas_overload").val();
              if (val > kapasitas_overload) {
                  $("#inputStatus").val("Overload");
              } else if (val < kapasitas) {
                  $("#inputStatus").val("Underload");
              } else {
                  $("#inputStatus").val("OK");
              }
          });
          $(document).on('change', '#tipping', function(e) {
              var val = $(this).val();
              var tipping = $("#tipping").val();
              if ((val = "SD1") || (val = "SD2") || (val = "SD3") || (val = "SD5")) {
                  $("#status").val("Completed");
              }
          });
      });
      //Date picker
      $('#reservationdate').datetimepicker({
          format: 'Y-MM-DD'
      });

      //Date and time picker

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
  </script>