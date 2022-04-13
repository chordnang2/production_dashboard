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
                      <a href="<?php echo site_url('Isi_bd_dispatch/bd') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-12">
                              <form action="" method="post" enctype="multipart/form-data">
                                  <div class="row">
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label>TANGGAL*</label>
                                              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                  <input type="text" name="tanggal" class="form-control datetimepicker-input <?php echo form_error('tanggal') ? 'is-invalid' : '' ?>" data-target="#reservationdate" value="<?= $unit['tanggal']; ?>" />
                                                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label>SHIFT*</label>
                                              <select class="form-control select" name="shift" style="width: 100%;">
                                                  <option selected="selected"><?= $unit['shift']; ?></option>
                                                  <option>DAY</option>
                                                  <option>NIGHT</option>
                                              </select>
                                              <?php echo form_error('shift') ?>
                                          </div>
                                          <div class="form-group">
                                              <label>NO UNIT*</label>
                                              <select class="form-control select2" name="no_unit" style="width: 100%;">
                                                  <option selected="selected"><?= $unit['no_unit']; ?></option>
                                                  <?php foreach ($unit4 as $a) : ?>
                                                      <option><?php echo $a->no_unit4?></option>
                                                  <?php endforeach; ?>
                                              </select>
                                              <?php echo form_error('no_unit') ?>
                                          </div>
                                          <div class="form-group">
                                              <label for="problem">PROBLEM*</label>
                                              <input value="<?= $unit['problem']; ?>" class="form-control <?php echo form_error('problem') ? 'is-invalid' : '' ?>" type="text" name="problem"  />
                                              <?php echo form_error('problem') ?>
                                          </div>
                                          <div class="form-group">
                                              <label for="aktivity">AKTIFITAS*</label>
                                              <input value="<?= $unit['aktivity']; ?>" class="form-control <?php echo form_error('aktivity') ? 'is-invalid' : '' ?>" type="text" name="aktivity"  />
                                              <?php echo form_error('aktivity') ?>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label>PREPARATION*</label>
                                              <div class="input-group date " id="timepicker1" data-target-input="nearest">
                                                  <input value="<?= $unit['preparation']; ?>" type="text" name="preparation" class="form-control datetimepicker-input <?php echo form_error('preparation') ? 'is-invalid' : '' ?>" data-target="#timepicker1" />
                                                  <div class="input-group-append" data-target="#timepicker1" data-toggle="datetimepicker">
                                                      <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                  </div>
                                              </div>
                                              <?php echo form_error('preparation') ?>

                                          </div>
                                          <div class="form-group">
                                              <label>START*</label>
                                              <div class="input-group date" id="timepicker2" data-target-input="nearest">
                                                  <input value="<?= $unit['start']; ?>" type="text" name="start" class="form-control datetimepicker-input <?php echo form_error('start') ? 'is-invalid' : '' ?>" data-target="#timepicker2" />
                                                  <div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
                                                      <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                  </div>
                                              </div>
                                              <?php echo form_error('start') ?>

                                          </div>
                                          <div class="form-group">
                                              <label>WAITING SATU*</label>
                                              <div class="input-group date" id="timepicker3" data-target-input="nearest">
                                                  <input value="<?= $unit['waiting_satu']; ?>" type="text" name="waiting_satu" class="form-control datetimepicker-input <?php echo form_error('waiting_satu') ? 'is-invalid' : '' ?>" data-target="#timepicker3" />
                                                  <div class="input-group-append" data-target="#timepicker3" data-toggle="datetimepicker">
                                                      <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                  </div>
                                              </div>

                                              <?php echo form_error('waiting_satu') ?>


                                          </div>
                                          <div class="form-group">
                                              <label>TIME OUT*</label>
                                              <div class="input-group date" id="timepicker4" data-target-input="nearest">
                                                  <input value="<?= $unit['time_out']; ?>" type="text" name="time_out" class="form-control datetimepicker-input <?php echo form_error('time_out') ? 'is-invalid' : '' ?>" data-target="#timepicker4" />
                                                  <div class="input-group-append" data-target="#timepicker4" data-toggle="datetimepicker">
                                                      <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                  </div>
                                              </div>

                                              <?php echo form_error('time_out') ?>


                                          </div>
                                          <div class="form-group">
                                              <label>TIME OPERASI*</label>
                                              <div class="input-group date" id="timepicker5" data-target-input="nearest">
                                                  <input value="<?= $unit['time_operasi']; ?>" type="text" name="time_operasi" class="form-control datetimepicker-input <?php echo form_error('time_operasi') ? 'is-invalid' : '' ?>" data-target="#timepicker5" />
                                                  <div class="input-group-append" data-target="#timepicker5" data-toggle="datetimepicker">
                                                      <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                  </div>
                                              </div>

                                              <?php echo form_error('time_operasi') ?>


                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label>WAITING DUA*</label>
                                              <div class="input-group date" id="timepicker6" data-target-input="nearest">
                                                  <input value="<?= $unit['waiting_dua']; ?>" type="text" name="waiting_dua" class="form-control datetimepicker-input <?php echo form_error('waiting_dua') ? 'is-invalid' : '' ?>" data-target="#timepicker6" />
                                                  <div class="input-group-append" data-target="#timepicker6" data-toggle="datetimepicker">
                                                      <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                  </div>
                                              </div>

                                              <?php echo form_error('waiting_dua') ?>


                                          </div>
                                          <div class="form-group">
                                              <label>TOTAL*</label>
                                              <div class="input-group date" id="timepicker7" data-target-input="nearest">
                                                  <input value="<?= $unit['total']; ?>" type="text" name="total" class="form-control datetimepicker-input <?php echo form_error('total') ? 'is-invalid' : '' ?>" data-target="#timepicker7" />
                                                  <div class="input-group-append" data-target="#timepicker7" data-toggle="datetimepicker">
                                                      <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                  </div>
                                              </div>

                                              <?php echo form_error('total') ?>


                                          </div>
                                          <div class="form-group">
                                              <label>TOTAL HOURS*</label>
                                              <div class="input-group date" id="timepicker8" data-target-input="nearest">
                                                  <input value="<?= $unit['total_hours']; ?>" type="text" name="total_hours" class="form-control datetimepicker-input <?php echo form_error('total_hours') ? 'is-invalid' : '' ?>" data-target="#timepicker8" />
                                                  <div class="input-group-append" data-target="#timepicker8" data-toggle="datetimepicker">
                                                      <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                  </div>
                                              </div>

                                              <?php echo form_error('total_hours') ?>


                                          </div>
                                          <div class="form-group">
                                              <label for="hm">HM*</label>
                                              <input value="<?= $unit['hm']; ?>" class="form-control <?php echo form_error('hm') ? 'is-invalid' : '' ?>" type="text" name="hm"  />

                                              <?php echo form_error('hm') ?>
                                          </div>
                                          <div class="form-group">
                                              <label for="km">KM*</label>
                                              <input value="<?= $unit['km']; ?>" class="form-control <?php echo form_error('km') ? 'is-invalid' : '' ?>" type="text" name="km"  />

                                              <?php echo form_error('km') ?>

                                          </div>
                                      </div>

                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="location">LOCATION*</label>
                                              <input value="<?= $unit['location']; ?>" class="form-control <?php echo form_error('location') ? 'is-invalid' : '' ?>" type="text" name="location"  />

                                              <?php echo form_error('location') ?>

                                          </div>


                                          <div class="form-group">
                                              <label for="keterangan">KETERANGAN*</label>
                                              <input value="<?= $unit['keterangan']; ?>" class="form-control <?php echo form_error('keterangan') ? 'is-invalid' : '' ?>" type="text" name="keterangan"  />

                                              <?php echo form_error('keterangan') ?>

                                          </div>
                                          <div class="form-group">
                                              <label>ANTRIAN SATU*</label>
                                              <div class="input-group date" id="timepicker9" data-target-input="nearest">
                                                  <input value="<?= $unit['antrian_satu']; ?>" type="text" name="antrian_satu" class="form-control datetimepicker-input <?php echo form_error('antrian_satu') ? 'is-invalid' : '' ?>" data-target="#timepicker9" />
                                                  <div class="input-group-append" data-target="#timepicker9 " data-toggle="datetimepicker">
                                                      <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                  </div>
                                              </div>

                                              <?php echo form_error('antrian_satu') ?>


                                          </div>
                                          <div class="form-group">
                                              <label>ANTRIAN DUA*</label>
                                              <div class="input-group date" id="timepicker10" data-target-input="nearest">
                                                  <input value="<?= $unit['antrian_dua']; ?>" type="text" name="antrian_dua" class="form-control datetimepicker-input <?php echo form_error('antrian_dua') ? 'is-invalid' : '' ?>" data-target="#timepicker9" />
                                                  <div class="input-group-append" data-target="#timepicker10" data-toggle="datetimepicker">
                                                      <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                  </div>
                                              </div>

                                              <?php echo form_error('antrian_dua') ?>
                                          </div>
                                          <div class="form-group">
                                              <label for="id_dispatch">ID*</label>
                                              <input value="<?= $unit['id_dispatch']; ?>" class="form-control <?php echo form_error('id_dispatch') ? 'is-invalid' : '' ?>" type="text" name="id_dispatch"  />

                                              <?php echo form_error('id_dispatch') ?>

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