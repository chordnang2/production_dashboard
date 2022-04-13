  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-8">
                      <div class="card">
                          <div class="card-header">
                              <h3>DATA DISPATCH WORKSHOP KM 6</h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <font size="2">
                                  <table class="display table table-striped">
                                      <thead>
                                          <tr>
                                              <th>NOMER UNIT</th>
                                              <th>TIPE VESSEL</th>
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

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <!-- <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> -->
  <!-- <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script> -->

  <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- <script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script> -->
  <!-- <script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script> -->
  <!-- <script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script> -->
  <!-- <script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script> -->
  <!-- <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script> -->
  <!-- <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script> -->
  <script src="<?= base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
  <!-- <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script> -->
  <!-- <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script> -->
  <!-- <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script> -->

  <script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>

  <script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
  <script>
      $(document).ready(function() {
          $('table.display').DataTable();
      });
  </script>
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
                  url: "<?= base_url(); ?>/Isi_unit_running/load_data",
                  dataType: "JSON",
                  success: function(data) {
                      // buat kolom inputan
                      var html = '<tr>';
                      //   html += '<td id="no_unit4" contenteditable></td>';
                      //   html += '<td id="status" contenteditable></td>';
                      //   html += '<td><button type="button" name="btn_add" id="btn_add" class="btn btn-sm btn-primary"><span class="fa fa-plus"></span> Tambah</td></tr>';
                      //data dalam bentuk json di looping disini
                      for (var count = 0; count < data.length; count++) {
                          html += '<tr>';
                          html += '<td class="table_data" data-row_id="' +
                              data[count].id + '" data-column_name="id" contenteditable>' + data[count].id +
                              '</td>';
                          html += '<td class="table_data" data-row_id="' +
                              data[count].id + '" data-column_name="vessel4" contenteditable>' + data[count].vessel4 +
                              '</td>';
                          //   html += '<td><button type="button" name="delete_btn" id="' + data[count].id + '" class="btn btn-sm btn-danger btn_delete"><span class="fa fa-trash"></span> Hapus</button></td></tr>';
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
                  url: '<?= base_url(); ?>Isi_unit_running/update_data',
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