<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">

        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h1 style="font-size:20pt">TABLE DETAIL KAPASITAS OPERATOR UPDATE</h1>
                </div>
                <div class="card-body">
                    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>STATUS OPERATOR</th>
                                <th>JUMLAH</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <!-- /. row -->
</div><!-- /.container-fluid -->
</section>
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // load semua data
        function load_data() {
            $.ajax({
                url: "<?= base_url(); ?>/Pro_operator_controller/load_data",
                dataType: "JSON",
                success: function(data) {
                    // buat kolom inputan
                    var html = '<tr>';

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
</script>