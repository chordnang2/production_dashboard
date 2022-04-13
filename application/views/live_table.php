<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CDN Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- CDN Jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/07323268fb.js"></script>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body>
    <div class=" container">
        <h3 align=center>Live Table With Ajax</h3>
        <br />
        <div class="">
            <br />
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SHIFT</th>
                        <th>NO UNIT </th>
                        <th>TIPE VESSEL</th>
                        <th>LOADING POINT</th>
                        <th>TYPE</th>
                        <th>WB</th>
                        <th>NO TRANSAKSI</th>
                        <th>GROSS</th>
                        <th>TARE</th>
                        <th>NETT</th>
                        <th>TIME IN</th>
                        <th>TIME OUT</th>
                        <th>TIPPING</th>
                        <th>REMAKS</th>
                        <th>TARGET</th>
                        <th>PRECENTAGE</th>
                        <th>LOSS WEIGHT</th>
                        <th>KETERANGAN</th>
                        <th>STATUS</th>
                        <th>DATE</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
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
                </tfoot>
            </table>
        </div>
    </div>
</body>

</html>
<script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": false,
            "lengthChange": false,
            "autoWidth": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            "searching": false,
            "ordering": true,
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
    $('.dataTables_filter input').unbind().keyup(function(e) {
        var value = $(this).val();
        if (value.length > 3) {
            alert(value);
            table.search(value).draw();
        } else {
            //optional, reset the search if the phrase 
            //is less then 3 characters long
            table.search('').draw();
        }
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
                    html += '<td id="tanggal" contenteditable ></td>';
                    html += '<td id="shift" contenteditable ></td>';
                    html += '<td id="no_unit" contenteditable></td>';
                    html += '<td id="problem" contenteditable></td>';
                    html += '<td id="aktivity" contenteditable></td>';
                    html += '<td id="preparation" contenteditable></td>';
                    html += '<td id="start" contenteditable></td>';
                    html += '<td id="time_out" contenteditable></td>';
                    html += '<td id="operasi" contenteditable></td>';
                    html += '<td id="hm" contenteditable></td>';
                    html += '<td id="km" contenteditable></td>';
                    html += '<td id="location" contenteditable></td>';
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

                        html += '<td><button type="button" name="delete_btn" id_dispatch="' + data[count].id_dispatch + '" class="btn btn-sm btn-danger btn_delete"><span class="fa fa-trash"></span></button></td></tr>';
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
                    id: id_dispatch,
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
            var id_wb = $(this).attr('id_wb'); // ambil nilai dr attribut id

            if (confirm("apakah kamu yakin hapus data ini?")) {
                $.ajax({
                    url: "<?= base_url(); ?>Live_table_wb_controller/delete",
                    method: 'POST',
                    data: {
                        id_wb: id_wb,
                    },
                    success: function(data) {
                        load_data();
                    }
                });
            }
        });
    });
</script>