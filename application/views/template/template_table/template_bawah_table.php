 <!-- Main Footer -->
 <footer class="main-footer">
     <strong>Copyright &copy; 2021 <a href="#">Departemen Produksi</a>.</strong>
     All rights reserved.
     <div class="float-right d-none d-sm-inline-block">
         <b>Version</b> 3.1.0
     </div>
 </footer>
 </div>
 <!-- ./wrapper -->

 <!-- REQUIRED SCRIPTS -->
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
 <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.js"></script>


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
     $(document).ready(function() {
         $('#fms').DataTable();
     });
 </script>
 <script type="text/javascript">
     const container = document.querySelector('#ht');
     const exampleConsole = document.querySelector('#example1console');
     const autosave = document.querySelector('#autosave');
     const load = document.querySelector('#load');
     const save = document.querySelector('#save');

     let autosaveNotification;


     <?php if (isset($handson) && $handson) { ?>
         const data = [
             <?php foreach ($handson as $key => $value) {
                        echo $value;
                    } ?>
         ];
     <?php } ?>


     const hot = new Handsontable(container, {
         <?php if (isset($handson) && $handson) { ?>
             data,
         <?php } ?>
         startRows: 8,
         startCols: 6,
         colHeaders: ['Shift', 'No Unit', 'Tipe Vessel', 'Loading Point', 'Type', 'Weighbridge', 'No Transaksi', 'Gross', 'Tare', 'Nett', 'Time In', 'Time Out', 'Tipping', 'Remaks', 'Target', 'Percent', 'Loss_weigh', 'Keterangan', 'Status', 'Date'],
         rowHeaders: ["1", "2", "3"],
         minSpareRows: 3,
         height: 'auto',
         licenseKey: 'non-commercial-and-evaluation',
         afterChange: function(change, source) {
             /*if (source === 'loadData') {
               return; //don't save this change
             }*/

             if (!autosave.checked) {
                 return;
             }

             clearTimeout(autosaveNotification);

             ajax('/docs/10.0/scripts/json/save.json', 'GET', JSON.stringify({
                 data: change
             }), data => {
                 exampleConsole.innerText = 'Autosaved (' + change.length + ' ' + 'cell' + (change.length > 1 ? 's' : '') + ')';
                 autosaveNotification = setTimeout(() => {
                     exampleConsole.innerText = 'Changes will be autosaved';
                 }, 1000);
             });
         }
     });

     Handsontable.dom.addEvent(save, 'click', () => {
         // save all cell's data
         ajax('<?php echo base_url() ?>Handson/ajaxHandson', 'POST', JSON.stringify({
             data: hot.getData()
         }), res => {
             const response = JSON.parse(res.response);

             if (response.result === 'ok') {
                 exampleConsole.innerText = 'Data saved';
             } else {
                 exampleConsole.innerText = 'Save error';
             }
         });
     });

     Handsontable.dom.addEvent(autosave, 'click', () => {
         if (autosave.checked) {
             exampleConsole.innerText = 'Changes will be autosaved';
         } else {
             exampleConsole.innerText = 'Changes will not be autosaved';
         }
     });

     function ajax(url, method, params, callback) {
         let obj;

         try {
             obj = new XMLHttpRequest();
         } catch (e) {
             try {
                 obj = new ActiveXObject('Msxml2.XMLHTTP');
             } catch (e) {
                 try {
                     obj = new ActiveXObject('Microsoft.XMLHTTP');
                 } catch (e) {
                     alert('Your browser does not support Ajax.');
                     return false;
                 }
             }
         }
         obj.onreadystatechange = () => {
             if (obj.readyState == 4) {
                 callback(obj);
             }
         };
         obj.open(method, url, true);
         obj.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
         obj.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
         obj.send(params);

         return obj;
     }
 </script>
 <!-- <script>
     dataisi = [
         [1, 2, 3],
         [2, 3, 4],
         [5, 6, 7]
     ];

     konfigurasi = {
         data: dataisi,
         colHeaders: ['a', 'b', 'c'],
         rowHeaders: ["1", "2", "3"],
         licenseKey: 'non-commercial-and-evaluation' // for non-commercial use only
     };
     tblExcel = new Handsontable(document.getElementById('ht'), konfigurasi);
     tblExcel.render();
 </script> -->

 <script>
     $(function() {
         $("#example1").DataTable({
             "paging": true,
             "responsive": true,
             "lengthChange": true,
             "autoWidth": false,
             "scrollX": false,
             "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
         }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
         $("#example3").DataTable({
             "paging": true,
             "responsive": true,
             "lengthChange": true,
             "autoWidth": false,
             "scrollX": false,
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
 <!-- <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script> -->
 <!-- <script>
     $(document).ready(function() {

         // load semua data
         function load_data() {
             $.ajax({
                 url: "<?= base_url(); ?>/Pro_operator_controller/load_data",
                 dataType: "JSON",
                 success: function(data) {
                     // buat kolom inputan
                     var html = '<tr>';
                     html += '<td id="nama_status" contenteditable ></td>';
                     html += '<td id="jumlah" contenteditable ></td>';
                     //data dalam bentuk json di looping disini
                     for (var count = 0; count < data.length; count++) {
                         html += '<tr>';
                         html += '<td class="table_data" data-row_id="' +
                             data[count].id + '" data-column_name="nama_status" contenteditable>' + data[count].nama_status +
                             '</td>';
                         html += '<td class="table_data" data-row_id="' +
                             data[count].id + '" data-column_name="jumlah" contenteditable>' + data[count].jumlah +
                             '</td>';
                     }
                     // hasil looping masukan kesini
                     $('tbody').html(html);
                 }
             });
         }
         load_data(); // panggil fungsi load data

         // simpan data

         // update data
         $(document).on('blur', '.table_data', function() {
             var id = $(this).data('row_id'); // ambil nilai attribut data row_id dari class table_data
             var table_column = $(this).data('column_name'); // ambil nilai attribut data column_name dari class table_data
             var value = $(this).text(); // ambil value text dari class table_data

             $.ajax({
                 url: '<?= base_url(); ?>Pro_operator_controller/update_data',
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

     });
 </script> -->



 </body>

 </html>