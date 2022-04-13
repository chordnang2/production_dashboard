  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <h3>DATA DISPATCH WORKSHOP KM 6</h3>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <div class="col-4">
                                  <a href="<?php echo base_url("Isi_bd_dispatch/export"); ?>"> <button style="width: 100%;" class="btn btn-block btn-outline-info float-right">Exsport ke Excel Semua Data</button></a>
                                  <a href="<?php echo base_url("Isi_bd_dispatch/export_today"); ?>"> <button style="width: 100%;" class="btn btn-block btn-outline-info float-right">Exsport ke Excel Data Kemaren</button></a>
                              </div>
                          </div>

                          <div class="card-body">

                              <font size="2">
                                  <table class="table table-striped">
                                      <thead>
                                          <tr>
                                              <th>TANGGAL</th>
                                              <th>SHIFT</th>
                                              <th>NOMER UNIT</th>
                                              <th>PROBLEM</th>
                                              <th>AKTIFITAS</th>
                                              <th>PREPARATION</th>
                                              <th>START</th>
                                              <th>OUT</th>
                                              <th>OPERASI</th>
                                              <th>HM</th>
                                              <th>KM</th>
                                              <th>LOCATION</th>
                                              <th>MENU ADMIN</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                      </tbody>
                                  </table>
                          </div>
                      </div>
                      <!-- /.card -->
                  </div>
                  <!-- /.col -->
              </div>
              <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  <!-- Main Footer -->
  <footer class="main-footer">
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.1.0
      </div>
  </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->


  <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>

  <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>

  <script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>

  <script>
      $(function() {
          $("#example1").DataTable({
              "responsive": true,
              "lengthChange": false,
              "autoWidth": false,
              "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": true,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
          });
      });
  </script>
  <script>
      $(document).ready(function() {

          // load semua data
          function load_data() {
              $.ajax({
                  url: "<?= base_url(); ?>/Isi_bd_dispatch/load_data",
                  dataType: "JSON",
                  success: function(data) {
                      // buat kolom inputan
                      var html = '<tr>';
                      <?php date_default_timezone_set('Asia/Singapore');
                        $t = strtotime("today");
                        $y = strtotime("yesterday");
                        $hariini = date("Y-m-d", $t);
                        $kemaren = date("Y-m-d", $y);

                        $jamini = date("H");
                        $jamdanmenit = date("H-m", $t);
                        $detikini = date("s", $t);


                        if ($jamini >= 00 && $jamini < 06) {
                            $a =  $kemaren;
                        } else {
                            $a =  $hariini;
                        }
                        if ($jamini >= 06 && $jamini <= 19) {
                            $b =  'DAY';
                        } else {
                            $b =  'NIGHT';
                        } ?>
                      html += '<td id="tanggal" contenteditable ><?= $a ?></td>';
                      html += '<td id="shift" contenteditable ><?= $b ?></td>';
                      html += '<td id="no_unit" contenteditable></td>';
                      html += '<td id="problem" contenteditable></td>';
                      html += '<td id="aktivity" contenteditable></td>';
                      html += '<td id="preparation" contenteditable><?= $hariini ?> 00:00:00</td>';
                      html += '<td id="start" contenteditable><?= $hariini ?> 00:00:00</td>';
                      html += '<td id="time_out" contenteditable><?= $hariini ?> 00:00:00</td>';
                      html += '<td id="operasi" contenteditable><?= $hariini ?> 00:00:00</td>';
                      html += '<td id="hm" contenteditable></td>';
                      html += '<td id="km" contenteditable></td>';
                      html += '<td id="location" contenteditable>KM </td>';
                      html += '<td><button type="button" name="btn_add" id="btn_add" class="btn btn-sm btn-primary"><span class="fa fa-plus"></span> Tambah</td></tr>';
                      //data dalam bentuk json di looping disini
                      for (var count = 0; count < data.length; count++) {
                          html += '<tr>';
                          html += '<td class="table_data" data-row_id="' +
                              data[count].id + '" data-column_name="tanggal" contenteditable>' + data[count].tanggal +
                              '</td>';
                          html += '<td class="table_data" data-row_id="' +
                              data[count].id + '" data-column_name="shift" contenteditable>' + data[count].shift +
                              '</td>';
                          html += '<td class="table_data" data-row_id="' +
                              data[count].id + '" data-column_name="no_unit" contenteditable>' + data[count].no_unit +
                              '</td>';
                          html += '<td class="table_data" data-row_id="' +
                              data[count].id + '" data-column_name="problem" contenteditable>' + data[count].problem +
                              '</td>';
                          html += '<td class="table_data" data-row_id="' +
                              data[count].id + '" data-column_name="aktivity" contenteditable>' + data[count].aktivity +
                              '</td>';
                          html += '<td class="table_data" data-row_id="' +
                              data[count].id + '" data-column_name="preparation" contenteditable>' + data[count].preparation +
                              '</td>';
                          html += '<td class="table_data" data-row_id="' +
                              data[count].id + '" data-column_name="start" contenteditable>' + data[count].start +
                              '</td>';
                          html += '<td class="table_data" data-row_id="' +
                              data[count].id + '" data-column_name="time_out" contenteditable>' + data[count].time_out +
                              '</td>';
                          html += '<td class="table_data" data-row_id="' +
                              data[count].id + '" data-column_name="operasi" contenteditable>' + data[count].operasi +
                              '</td>';
                          html += '<td class="table_data" data-row_id="' +
                              data[count].id + '" data-column_name="hm" contenteditable>' + data[count].hm +
                              '</td>';
                          html += '<td class="table_data" data-row_id="' +
                              data[count].id + '" data-column_name="km" contenteditable>' + data[count].km +
                              '</td>';
                          html += '<td class="table_data" data-row_id="' +
                              data[count].id + '" data-column_name="location" contenteditable>' + data[count].location +
                              '</td>';

                          html += '<td><button type="button" name="delete_btn" id="' + data[count].id + '" class="btn btn-sm btn-danger btn_delete"><span class="fa fa-trash"></span> Hapus</button></td></tr>';
                      }
                      // hasil looping masukan kesini
                      $('tbody').html(html);
                  }
              });
          }
          load_data(); // panggil fungsi load data

          // simpan data
          $(document).on('click', '#btn_add', function() {
              var tanggal = $('#tanggal').text(); // ambil text dr id kode
              var shift = $('#shift').text(); // ambil text dr id kode
              var no_unit = $('#no_unit').text(); // ambil text dr id kode
              var problem = $('#problem').text(); // ambil text dr id kode
              var aktivity = $('#aktivity').text(); // ambil text dr id kode
              var preparation = $('#preparation').text(); // ambil text dr id kode
              var start = $('#start').text(); // ambil text dr id kode
              var time_out = $('#time_out').text(); // ambil text dr id kode
              var operasi = $('#operasi').text(); // ambil text dr id kode
              var hm = $('#hm').text(); // ambil text dr id kode
              var km = $('#km').text(); // ambil text dr id kode
              var location = $('#location').text(); // ambil text dr id kode


              // cek jika inputan kosong
              if (tanggal == '') {
                  alert('masukkan tanggal');
                  return false;
              }

              // jika inputan ada isinya kirim request dengan ajax
              $.ajax({
                  url: '<?= base_url(); ?>Isi_bd_dispatch/insert_data',
                  method: 'POST',
                  // data yg dikirim (name : value)
                  data: {
                      tanggal: tanggal,
                      shift: shift,
                      no_unit: no_unit,
                      problem: problem,
                      aktivity: aktivity,
                      preparation: preparation,
                      start: start,
                      time_out: time_out,
                      operasi: operasi,
                      hm: hm,
                      km: km,
                      location: location,
                  },
                  // callback jika data berhasil disimpan
                  success: function(data) {
                      //panggil fungsi
                      alert('data berhasil ditambah');
                      load_data();
                  }
              });

          });

          // update data
          $(document).on('blur', '.table_data', function() {
              var id = $(this).data('row_id'); // ambil nilai attribut data row_id dari class table_data
              var table_column = $(this).data('column_name'); // ambil nilai attribut data column_name dari class table_data
              var value = $(this).text(); // ambil value text dari class table_data

              $.ajax({
                  url: '<?= base_url(); ?>Isi_bd_dispatch/update_data',
                  method: 'POST',
                  // data yg dikirim ke server untuk update data (name:value)
                  data: {
                      id: id,
                      table_column: table_column,
                      value: value
                  },
                  success: function(data) {
                      load_data(); // panggil fungsi load data jika berhasil update
                  }
              });
          });

          // delete data
          $(document).on('click', '.btn_delete', function() {
              var id = $(this).attr('id'); // ambil nilai dr attribut id

              if (confirm("apakah kamu yakin hapus data ini?")) {
                  $.ajax({
                      url: "<?= base_url(); ?>Isi_bd_dispatch/delete",
                      method: 'POST',
                      data: {
                          id: id,
                      },
                      success: function(data) {
                          load_data();
                      }
                  });
              }
          });
      });
  </script>



  </body>

  </html>