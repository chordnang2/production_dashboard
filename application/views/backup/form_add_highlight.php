  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Form Tambah Data Highlight(CCR ADMIN)</h1>
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
          <div class="container-fluid ">
              <!-- SELECT2 EXAMPLE -->
              <div class="card card-default">
                  <div class="card-header">
                      <a href="<?php echo site_url('Isi_highlight') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <form method="post" action="<?php echo site_url('Isi_highlight/store') ?>">
                          <?php
                            if ($this->session->flashdata('errors')) {
                                echo '<div class="alert alert-danger">';
                                echo $this->session->flashdata('errors');
                                echo "</div>";
                            }
                            ?>
                          <div class="row">
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label>Nomer Transaksi WB</label>
                                      <select class="form-control select2" name="nomer_wb" id="no_transaction" style="width: 100%;">
                                          <option selected="selected"></option>
                                          <?php foreach ($gi as $wba) : ?>
                                              <option><?php echo $wba->no_transaction  ?></option>
                                          <?php endforeach; ?>

                                      </select>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="exampleInputBorder">No Unit</label>
                                      <input disabled type="text" class="form-control" id="no_unit">
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="exampleInputBorder">Date</label>
                                      <input disabled type="text" class="form-control" id="date">
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label>Status</label>
                                      <select class="select2" name="status" style="width: 100%;">
                                          <option selected="selected"></option>
                                          <option>OK</option>
                                          <option>NOT OK</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="exampleInputBorder">Payment</label>
                                      <input type="text" id="tipe_coal" name="payment" class="form-control">
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label>NRP</label>
                                      <select class="form-control select2" name="nrp" id="" style="width: 100%;">
                                          <option selected="selected"></option>
                                          <?php foreach ($opt as $opta) : ?>
                                              <option><?php echo $opta->nrp  ?></option>
                                          <?php endforeach; ?>
                                      </select>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label>NRP Gantungan</label>
                                      <select class="form-control select2" name="nrp_gantungan" id="" style="width: 100%;">
                                          <option selected="selected"></option>
                                          <?php foreach ($opt as $opta) : ?>
                                              <option><?php echo $opta->nrp  ?></option>
                                          <?php endforeach; ?>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label>Time In</label>
                                      <div class="input-group date" id="timepicker1" data-target-input="nearest">
                                          <input type="text" name="time_in_hg" class="form-control datetimepicker-input" data-target="#timepicker1" />
                                          <div class="input-group-append" data-target="#timepicker1" data-toggle="datetimepicker">
                                              <div class="input-group-text"><i class="far fa-clock"></i></div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="exampleInputBorder">Tonase</label>
                                      <input type="text" name="tonase" class="form-control" id="inputNett">
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label>Unit Camp</label>
                                      <select class="select2" name="unit_camp" style="width: 100%;">
                                          <option selected="selected"></option>
                                          <option>KM 6</option>
                                          <option>KM 68</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="exampleInputBorder">Target Bulanan</label>
                                      <input type="text" name="taget_monthly" class="form-control" id="inputNett">
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="exampleInputBorder">HM</label>
                                      <input type="text" name="hm" class="form-control" id="inputNett">
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="exampleInputBorder">KM</label>
                                      <input type="text" name="km" class="form-control" id="inputNett">
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="exampleInputBorder">Fuel </label>
                                      <input type="text" name="fuel" class="form-control" id="inputNett">
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label>Modifikasi Vessel</label>
                                      <select class="select2" name="modifikasi_vessel" style="width: 100%;">
                                          <option selected="selected"></option>
                                          <option>Belum</option>
                                          <option>Extension Wall</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="exampleInputBorder">Target Bulanan Rev </label>
                                      <input type="text" name="target_monthy_rev" class="form-control" id="inputNett">
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="exampleInputBorder">Target Internal </label>
                                      <input type="text" name="target_internal" class="form-control" id="inputNett">
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="exampleInputBorder">Distance </label>
                                      <input type="text" name="distance" class="form-control" id="inputNett">
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="exampleInputBorder">Status Time Sheet</label>
                                      <input type="text" name="status_time_sheet" class="form-control" id="status_time_sheet">
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-2">
                              <input class="btn btn-success" type="submit" name="btn"></input>
                          </div>
                      </form>
                  </div>



              </div>


          </div>
          <!-- /.card-body -->
          <div class="card-footer">
              <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
          </div>
  </div>
  </section>
  <section class="content">
      <div class="container-fluid ">
          <!-- SELECT2 EXAMPLE -->
          <div class="card card-default">
              <div class="card-header">
                  <div class="form-group">
                      <div class="col-md-2">
                          <label for="exampleInputBorder">Kapasitas Overload</label>
                          <input disabled type="text" class="form-control" id="kapasitas_overload">
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
      $(document).ready(function() {
          $(document).on('change', '#no_transaction', function(e) {
              e.preventDefault();
              $.ajax({
                  type: "POST",
                  url: "<?php echo base_url('Isi_highlight/get_target_wb') ?>",
                  data: {
                      no_transaction: $(this).val(),

                  },
                  success: function(data) {
                      var jsonx = JSON.parse(data);
                      $("#no_unit").val(jsonx["0"]['no_unit'])
                      $("#date").val(jsonx["0"]['date'])
                      $("#status_time_sheet").val(jsonx["0"]['status_time_sheet'])
                  }
              })
          });

          //   $(document).on('change', '#inputNett', function(e) {
          //       var val = $(this).val();
          //       var kapasitas = $("#kapasitas").val();
          //       var nett = (val - kapasitas) / kapasitas * 100;
          //       $("#percentage").val(nett.toFixed(0) + "%");
          //       $("#lw").val(val - kapasitas);
          //       var kapasitas_overload = $("#kapasitas_overload").val();
          //       if (val > kapasitas_overload) {
          //           $("#inputStatus").val("Overload");
          //       } else if (val < kapasitas) {
          //           $("#inputStatus").val("underload");
          //       } else {
          //           $("#inputStatus").val("OK");
          //       }
          //   });
          //   $(document).on('change', '#tipping', function(e) {
          //       var val = $(this).val();
          //       var tipping = $("#tipping").val();
          //       if ((val = "SD1") || (val = "SD2") || (val = "SD3") || (val = "SD5")) {
          //           $("#status").val("Completed");
          //       }
          //   });
      });
      //Date picker
      $('#reservationdate').datetimepicker({
          format: 'Y-MM-DD'
      });

      //   //Date and time picker

      //   $('#reservationdatetime').datetimepicker({
      //       icons: {
      //           time: 'far fa-clock'
      //       }
      //   });
      $('#timepicker1').datetimepicker({
          format: 'HH:mm:ss'
      })
      //   $('#timepicker2').datetimepicker({
      //       format: 'HH:mm:ss'
      //   })
  </script>