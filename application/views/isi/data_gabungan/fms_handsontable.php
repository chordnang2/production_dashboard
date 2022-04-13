 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
         </div><!-- /.container-fluid -->
     </section>
     <?php

        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t);


        if ($jamini >= 00 && $jamini < 07) {
            $a =  $kemaren;
        } else {
            $a =  $hariini;
        }
        ?>
     <!-- Main content -->
     <section class="content">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-12">
                     <div class="card">
                         <div class="card-header">
                             <h3>FORM FMS COPY EXCEL</h3>
                         </div>
                         <!-- /.card-header -->
                         <form action="<?php echo base_url() ?>Isi_geofence/loadajaxhanson" method="GET">
                             <input type="date" name="date" value="<?php echo $date ?>">
                             <button id="load" class="button button--primary button--blue" type="submit">Load data</button>&nbsp;
                             <input id="search_field" type="search" placeholder="Search" />
                         </form>
                         <code>'Update terakhir tanggal <?= $last_date_update[0]['date']; ?>'</code>
                         <?php if ($date) { ?>
                             <div id="ht" class="hot"></div>
                             <div class="controls">
                                 <!-- <button id="save" class="button button--primary button--blue">Simpan Data</button>
                                 <button id="new" class="button button--primary button--blue">Tambah Baris</button>
                                 <button id="delete" class="button button--primary button--blue">Hapus Baris</button> -->
                                 <!-- <label>
                                     <input type="checkbox" name="autosave" id="autosave" />
                                     Autosave
                                 </label> -->
                             </div>

                             <pre id="example1console" class="console">Click "Load" to load data from server</pre>
                             <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.js"></script>
                             <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.css" />

                             <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

                             <script type="text/javascript">
                                 const container = document.querySelector('#ht');
                                 const exampleConsole = document.querySelector('#example1console');
                                 const autosave = document.querySelector('#autosave');
                                 const load = document.querySelector('#load');
                                 const save = document.querySelector('#save');
                                 const searchField = document.querySelector('#search_field');

                                 let autosaveNotification;


                                 <?php if (isset($handson) && $handson) { ?>
                                     const data = [
                                         <?php foreach ($handson as $key => $value) {
                                                        echo $value;
                                                    } ?>
                                     ];
                                 <?php } ?>

                                 var wrong_flag = 0;

                                 function log(event) {
                                     console.log(event)
                                 }
                                 const hot = new Handsontable(container, {
                                     <?php if (isset($handson) && $handson) { ?>
                                         data,
                                     <?php } ?>
                                     startRows: 1,
                                     startCols: 12,
                                     columnSorting: true,
                                     rowHeaders: true,
                                     //  columnSorting: true,
                                     search: true,
                                     dropdownMenu: true,
                                     //  contextMenu: true,
                                     afterChange: log.bind(this, 'afterChange'),
                                     afterRemoveRow: log.bind(this, 'removeRow'),
                                     afterRemoveCol: log.bind(this, 'removeCol'),
                                     afterCreateRow: log.bind(this, 'createRow'),
                                     afterCreateCol: log.bind(this, 'createCol'),
                                     //  contextMenu: ['copy', 'cut', 'paste'],
                                     colHeaders: ['unit', 'date', 'loading in', 'loading out', 'total_duration', 'total_milage', 'Cycle Time', 'total_durasiparkir', 'total_loading', 'total_tipping', 'total_travel', 'total_parkingbay', 'total_pitstop', 'total_refuelling', 'total_weighbridge', 'total_workshop', 'total_standby'],
                                     height: 'auto',
                                     licenseKey: 'non-commercial-and-evaluation',
                                     columns: [{}, {}, {}, {}, {}, {}, {}, {}, {}, {},
                                         {}, {}, {}, {}, {}, {}, {},
                                     ],
                                     afterChange: function(change, source) {
                                         /*if (source === 'loadData') {
                                           return; //don't save this change
                                         }*/
                                     }
                                 });

                                 Handsontable.dom.addEvent(searchField, 'keyup', function(event) {
                                     // get the `Search` plugin's instance
                                     const search = hot.getPlugin('search');
                                     // use the `Search` plugin's `query()` method
                                     const queryResult = search.query(this.value);

                                     console.log(queryResult);

                                     hot.render();
                                 });

                                 Handsontable.dom.addEvent(save, 'click', () => {
                                     hot.validateCells();
                                     // save all cell's data
                                     ajax('<?php echo base_url() ?>Isi_bd_dispatch/ajaxHandson', 'POST', JSON.stringify({
                                         data: hot.getData()
                                     }), res => {
                                         const response = JSON.parse(res.response);

                                         if (response.result === 'ok') {
                                             exampleConsole.innerText = 'Data saved';
                                         } else {
                                             exampleConsole.innerText = 'Fill all data';
                                         }
                                     });
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

                                 $('#new').on('click', function() {
                                     hot.alter('insert_row');
                                     hot.validateCells();
                                 });

                                 $('#delete').on('click', function() {
                                     hot.alter('remove_row');
                                     hot.validateCells();
                                 });
                             </script>

                         <?php } ?>

                         <!-- /.card-body -->
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



 </body>

 </html>