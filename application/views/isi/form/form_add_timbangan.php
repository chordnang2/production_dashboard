  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Form Tambah Data Timbangan</h1>
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
              <?php if ($this->session->flashdata('success')) : ?>
                  <div class="alert alert-success" role="alert">
                      <?php echo $this->session->flashdata('success'); ?>
                  </div>
              <?php endif; ?>
              <!-- SELECT2 EXAMPLE -->
              <div class="card card-default">
                  <div class="card-header">
                      <a href="<?php echo site_url('isi_timbangan/load_timbangan') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <form action="<?php echo site_url('isi_timbangan/add_timbangan') ?>" method="post" enctype="multipart/form-data">
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="row">
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>NRP Operator 1</label>
                                              <select class="select2" name="nrp" style="width: 100%;">
                                                  <option selected="selected"></option>
                                                  <?php foreach ($opt as $timbangan) : ?>
                                                      <option><?php echo $timbangan->nrp ?></option>
                                                  <?php endforeach; ?>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Nrp Operator 2 (gantungan)</label>
                                              <select class="form-control select2" name="nrp_peganagan" style="width: 100%;">
                                                  <option selected="selected"></option>
                                                  <?php foreach ($opt as $timbangan) : ?>
                                                      <option><?php echo $timbangan->nrp ?></option>
                                                  <?php endforeach; ?>
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>No Unit</label>
                                              <select class="form-control select2" name="no_unit" style="width: 100%;">
                                                  <option selected="selected"></option>
                                                  <?php foreach ($unit as $timbangan) : ?>
                                                      <option><?php echo $timbangan->no_unit ?></option>
                                                  <?php endforeach; ?>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Id_vessel</label>
                                              <select class="form-control select2" name="id_vessel" style="width: 100%;">
                                                  <option selected="selected"></option>
                                                  <?php foreach ($vessel as $timbangan) : ?>
                                                      <option><?php echo $timbangan->id_vessel ?></option>
                                                  <?php endforeach; ?>
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Date</label>
                                              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                  <input type="text" name="date" class="form-control datetimepicker-input" data-target="#reservationdate" />
                                                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Time In</label>
                                              <div class="input-group date" id="timepicker1" data-target-input="nearest">
                                                  <input type="text" name="time_in" class="form-control datetimepicker-input" data-target="#timepicker1" />
                                                  <div class="input-group-append" data-target="#timepicker1" data-toggle="datetimepicker">
                                                      <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                  </div>
                                              </div>
                                              <!-- /.input group -->
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Time Out</label>
                                              <div class="input-group date" id="timepicker2" data-target-input="nearest">
                                                  <input type="text" name="time_out" class="form-control datetimepicker-input" data-target="#timepicker2" />
                                                  <div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
                                                      <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                  </div>
                                              </div>
                                              <!-- /.input group -->
                                          </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <!-- <div class="form-group">
                                              <label for="exampleInputBorder">Dari</label>
                                              <input type="text" class="form-control" id="exampleInputBorder">
                                          </div> -->
                                          <div class="form-group">
                                              <label>Dari </label>
                                              <select class="form-control select2" name="id_lokasi_from" style="width: 100%;">
                                                  <option selected="selected"></option>
                                                  <?php foreach ($lokasi as $timbangan) : ?>
                                                      <option><?php echo $timbangan->id_lokasi ?></option>
                                                  <?php endforeach; ?>
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="exampleInputBorder">Id WB</label>
                                              <input type="text" name="no_timbangan" class="form-control" id="exampleInputBorder">
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label>Nomer WB </label>
                                              <select class="form-control select2" name="nama_wb" style="width: 100%;">
                                                  <option selected="selected"></option>
                                                  <option>Weighbridge 1</option>
                                                  <option>Weighbridge 2</option>
                                                  <option>Weighbridge 3</option>
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                                  <!-- /.form-group -->
                              </div>
                              <!-- /.col -->
                              <div class="col-md-6">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label>Ke </label>
                                              <select class="form-control select2" name="id_lokasi_to" style="width: 100%;">
                                                  <option selected="selected"></option>
                                                  <?php foreach ($lokasi as $timbangan) : ?>
                                                      <option><?php echo $timbangan->id_lokasi ?></option>
                                                  <?php endforeach; ?>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="exampleInputBorder">Berat Kotor(Bruto)</label>
                                              <input type="text" name="berat_kotor" class="form-control" id="exampleInputBorder">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="exampleInputBorder">Berat Bersih(Netto)</label>
                                              <input type="text" name="berat_bersih" class="form-control" id="exampleInputBorder">
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="exampleInputBorder">Berat Kosongan</label>
                                              <input type="text" name="berat_kosongan" class="form-control" id="exampleInputBorder">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="exampleInputBorder">KM Awal</label>
                                              <input type="text" name="km_awal" class="form-control" id="exampleInputBorder">
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="exampleInputBorder">KM Akhir</label>
                                              <input type="text" name="km_akhir" class="form-control" id="exampleInputBorder">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="exampleInputBorder">HM Awal</label>
                                              <input type="text" name="hm_awal" class="form-control" id="exampleInputBorder">
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="exampleInputBorder">HM Akhir</label>
                                              <input type="text" name="hm_akhir" class="form-control" id="exampleInputBorder">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- /.row -->
                          <input class="btn btn-success" type="submit" name="btn" value="Save" />
                      </form>
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