  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Form Edit Data Highlight</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <br>
      <?php
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $hariini = date("MY", $t);
        ?>
      <form action="" method="post" enctype="multipart/form-data">
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
                          <a href="<?php echo site_url('isi_highlight') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="no_transaction">Nomer Transaksi*</label>
                                      <input class="form-control <?php echo form_error('no_transaction') ? 'is-invalid' : '' ?>" type="text" name="no_transaction" value="<?= $hg['no_transaction']; ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('no_transaction') ?>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="shift">SHIFT*</label>
                                      <input disabled class="form-control <?php echo form_error('shift') ? 'is-invalid' : '' ?>" type="text" name="shift" value="<?= $hg['shift']; ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('shift') ?>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="no_unit">NO UNIT*</label>
                                      <input disabled class="form-control <?php echo form_error('no_unit') ? 'is-invalid' : '' ?>" type="text" name="no_unit" value="<?= $hg['no_unit']; ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('no_unit') ?>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="date">Date*</label>
                                      <input disabled class="form-control <?php echo form_error('date') ? 'is-invalid' : '' ?>" type="text" name="date" value="<?= $hg['date']; ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('date') ?>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- /.form-group -->
                          <!-- </div> -->
                      </div>
                  </div>
                  <div class="card card-default">
                      <div class="card-header">
                          INPUT DISINI
                      </div>

                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="payment">PAYMENT*</label>
                                      <select class="form-control select2  <?php echo form_error('payment') ? 'is-invalid' : '' ?>" name="payment">
                                          <option selected="selected"><?= $hg['payment']; ?></option>
                                          <?php foreach ($tpp as $a) : ?>
                                              <option ><?php echo $a->bulan ?></option>
                                          <?php endforeach; ?>
                                      </select>
                                      <div class="invalid-feedback">
                                          <?php echo form_error('payment') ?>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="nrp">NRP*</label>
                                      <select class="form-control select2  <?php echo form_error('nrp') ? 'is-invalid' : '' ?>" name="nrp">
                                          <option selected="selected"> <?= $hg['nrp']; ?></option>
                                          <?php foreach ($opt as $a) : ?>
                                              <option><?php echo $a->nrp ?></option>
                                          <?php endforeach; ?>
                                      </select>
                                      <div class="invalid-feedback">
                                          <?php echo form_error('nrp') ?>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="nrp_gantungan">NRP GANTUNGAN*</label>
                                      <select class="form-control select2  <?php echo form_error('nrp_gantungan') ? 'is-invalid' : '' ?>" name="nrp_gantungan">
                                          <option selected="selected"> <?= $hg['nrp_gantungan']; ?></option>
                                          <?php foreach ($opt as $a) : ?>
                                              <option><?php echo $a->nrp ?></option>
                                          <?php endforeach; ?>
                                      </select>
                                      <div class="invalid-feedback">
                                          <?php echo form_error('nrp_gantungan') ?>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="tonase">TONASE*</label>
                                      <input class="form-control <?php echo form_error('tonase') ? 'is-invalid' : '' ?>" type="text" name="tonase" value="<?= number_format((str_replace(',', '.', $hg['nett'])), 0, ",", "."); ?>" />
                                      <div class="invalid-feedback">
                                          <?php echo form_error('tonase') ?>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="time_in_hg">TIME IN LOADING*</label>
                                      <div class="input-group date" id="timepicker1" data-target-input="nearest">
                                          <input type="text" name="time_in_hg" class="form-control datetimepicker-input" data-target="#timepicker1" value="<?= $hg['time_in_hg']; ?>" />
                                          <div class="input-group-append" data-target="#timepicker1" data-toggle="datetimepicker">
                                              <div class="input-group-text"><i class="far fa-clock"></i></div>
                                          </div>
                                          <div class="invalid-feedback">
                                              <?php echo form_error('time_in_hg') ?>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">

                                          <label for="hm">HM AWAL</label>
                                          <input class="form-control" type="text" id="hmawal" />

                                      </div>
                                      <div class="col-md-4">
                                          <label for="hm">HM AKHIR</label>
                                          <input class="form-control" type="text" id="hmakhir" />
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label for="hm">HM*</label>
                                              <input class="form-control <?php echo form_error('hm') ? 'is-invalid' : '' ?>" type="text" name="hm" value="<?= $hg['hm']; ?>" id="hm" />
                                              <div class="invalid-feedback">
                                                  <?php echo form_error('hm') ?>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">

                                          <label for="km">KM AWAL</label>
                                          <input class="form-control " type="text" id="kmawal" />

                                      </div>
                                      <div class="col-md-4">

                                          <label for="km">KM AKHIR</label>
                                          <input class="form-control" type="text" id="kmakhir" />

                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label for="km">KM*</label>
                                              <input class="form-control <?php echo form_error('km') ? 'is-invalid' : '' ?>" type="text" name="km" value="<?= $hg['km']; ?>" id="km" />
                                              <div class="invalid-feedback">
                                                  <?php echo form_error('km') ?>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- /.form-group -->
                          </div>
                          <input class="btn btn-success" type="submit" name="btn" value="Save" />
      </form>
  </div>
  </div>
  <!-- /.row -->
  </div>
  </div>
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
      $(document).ready(function() {
          $(document).on('change', '#hmawal', function(e) {
              var val = $(this).val();
              var hmakhir = $("#hmakhir").val();
              var hm = $("#hm").val();
              var a = (hmakhir - val);
              $("#hm").val(a);
          });
      });
      $(document).ready(function() {
          $(document).on('change', '#kmawal', function(e) {
              var val = $(this).val();
              var kmakhir = $("#kmakhir").val();
              var km = $("#km").val();
              var a = (kmakhir - val);
              $("#km").val(a);

          });
      });

      function myFunction() {
          /* Get the text field */
          var copyText = document.getElementById("myInput");

          /* Select the text field */
          copyText.select();
          copyText.setSelectionRange(0, 99999); /* For mobile devices */

          /* Copy the text inside the text field */
          navigator.clipboard.writeText(copyText.value);

          /* Alert the copied text */
          alert("Copied the text: " + copyText.value);
      }
  </script>