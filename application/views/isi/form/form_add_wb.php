 <?php date_default_timezone_set('Asia/Singapore');
    $t = strtotime("today");
    $y = strtotime("yesterday");
    $hariini = date("Y-m-d", $t);
    $kemaren = date("Y-m-d", $y);

    $jamini = date("H:i:s");
    $menitini = date("m", $t);
    $detikini = date("s", $t);


    if ($jamini >= 00 && $jamini < 07) {
        $a =  $kemaren;
    } else {
        $a =  $hariini;
    } ?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Form Tambah Data WB</h1>
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
                     <a href="<?php echo site_url('Isi_wb/uncomplete') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                 </div>
                 <!-- /.card-header -->
                 <div class="card-body">
                     <form method="post" action="<?php echo site_url('Isi_wb/store') ?>">
                         <!-- <?php
                                if ($this->session->flashdata('errors')) {
                                    echo '<div class="alert alert-danger">';
                                    echo $this->session->flashdata('errors');
                                    echo "</div>";
                                }
                                ?> -->
                         <div class="row">
                             <div class="col-md-2">
                                 <div class="form-group">
                                     <label>No Unit </label>
                                     <select class="form-control select2" name="no_unit" style="width: 100%;">
                                         <option selected="selected"></option>
                                         <?php foreach ($unit as $u) : ?>
                                             <option><?php echo $u->no_unit4 ?></option>
                                         <?php endforeach; ?>
                                     </select>
                                 </div>
                             </div>
                             <div class="col-md-2">
                                 <div class="form-group">
                                     <label>Loading Point</label>
                                     <select class="form-control select2" name="loading_point" style="width: 100%;">
                                         <option selected="selected"></option>
                                         <?php foreach ($lp as $lpa) : ?>
                                             <option><?php echo $lpa->nama_lokasi ?></option>
                                         <?php endforeach; ?>
                                     </select>
                                 </div>
                             </div>
                             <div class="col-md-2">
                                 <div class="form-group">
                                     <label>Weighbridge</label>
                                     <select class="select2" name="weighbridge" style="width: 100%;">
                                         <option selected="selected"></option>
                                         <option>WB 1</option>
                                         <option>WB 2</option>
                                         <option>WB 3</option>
                                     </select>
                                 </div>
                             </div>
                             <div class="col-md-2">
                                 <div class="form-group">
                                     <label>Time In</label>
                                     <div class="input-group date" id="timepicker1" data-target-input="nearest">
                                         <input value="<?= $jamini?>" type="text" name="time_in" class="form-control datetimepicker-input" data-target="#timepicker1" />
                                         <div class="input-group-append" data-target="#timepicker1" data-toggle="datetimepicker">
                                             <div class="input-group-text"><i class="far fa-clock"></i></div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-2">
                                 <div class="form-group">
                                     <label>Date</label>
                                     <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                         <input value="<?= $hariini?>" type="text" name="date" class="form-control datetimepicker-input" data-target="#reservationdate" />
                                         <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                             <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <!-- <div class="col-md-2">
                                  <div class="form-group">
                                      <label>Shift</label>
                                      <select class="select2" name="shift" style="width: 100%;">
                                          <option selected="selected"></option>
                                          <option>DS</option>
                                          <option>NS</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <label>Tipe Vessel</label>
                                  <select class="form-control select2" name="tipe_vessel" id="id" style="width: 100%;">
                                      <option selected="selected"></option>
                                      <?php foreach ($vessel as $vs) : ?>
                                          <option><?php echo $vs->id ?></option>
                                      <?php endforeach; ?>
                                  </select>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="exampleInputBorder">Tipe</label>
                                      <input type="text" id="tipe_coal" name="type" class="form-control">
                                  </div>
                              </div>

                          </div>
                          <div class="row">
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="exampleInputBorder">No Transaction</label>
                                      <input type="text" name="no_transaction" class="form-control" id="exampleInputBorder" value="IP-WB ">
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="exampleInputBorder">Gross</label>
                                      <input type="text" name="gross" class="form-control" id="gross">
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="exampleInputBorder">Nett</label>
                                      <input type="text" name="nett" class="form-control" id="inputNett">
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="exampleInputBorder">Tare</label>
                                      <input type="text" name="tare" class="form-control" id="tare">
                                  </div>
                              </div>
                             
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label>Time out</label>
                                      <div class="input-group date" id="timepicker2" data-target-input="nearest">
                                          <input type="text" name="time_out" class="form-control datetimepicker-input" data-target="#timepicker2" />
                                          <div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
                                              <div class="input-group-text"><i class="far fa-clock"></i></div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label>Tipping</label>
                                      <select class="form-control select2" name="tipping" style="width: 100%;" id="tipping">
                                          <option selected="selected"></option>
                                          <?php foreach ($tipping as $t) : ?>
                                              <option><?php echo $t->tipping ?></option>
                                          <?php endforeach; ?>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="exampleInputBorder">Remarks</label>
                                      <input type="text" name="remaks" class="form-control">
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="exampleInputBorder">Target</label>
                                      <input type="text" id="kapasitas" name="target" class="form-control">
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="exampleInputBorder">Percentage</label>
                                      <input type="text" name="precentage" class="form-control" id="percentage">
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="exampleInputBorder">Loss Weight</label>
                                      <input type="text" name="loss_weight" class="form-control" id="lw">
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="exampleInputBorder">Keterangan</label>
                                      <input type="text" name="keterangan" class="form-control" id="inputStatus">
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="exampleInputBorder">Status</label>
                                      <input type="text" name="status" class="form-control" id="status" value="Uncomplete">
                                  </div>
                              </div>
                             -->
                             <!-- <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="exampleInputBorder">No</label>
                                      <input type="text" name="no" class="form-control" id="exampleInputBorder">
                                  </div>
                              </div> -->
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