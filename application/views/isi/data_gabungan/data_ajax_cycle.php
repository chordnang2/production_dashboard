<div class="modal-header">
    <h4 class="modal-title">DATA DETAIL FMS TANGGAL </h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">

    <div class="card-body">
        <table id="example3" class="table table-bordered table-hover" style="width:100%">
            <thead>
                <tr>
                    <td>NO</td>
                    <td>Nomer Unit</td>
                    <td>Geofence</td>
                    <td>Tipe Lokasi</td>
                    <td>Time In</td>
                    <td>Time Out</td>
                    <td>Duration</td>
                    <td>Mileage</td>
                    <td>Total Waktu</td>
                    <td>Durasi Parkir</td>
                </tr>
            </thead>
            <?php

            foreach ($isi_cycle as $key => $value) {
                print "<tr><td>"
                    . ($key + 1)
                    . "</td><td>"
                    . $value['unit']
                    . "</td><td>"
                    . $value['geofence']
                    . "</td><td>"
                    . $value['tipe_inner']
                    . "</td><td>"
                    . $value['time_in']
                    . "</td><td>"
                    . $value['time_out']
                    . "</td><td>"
                    . $value['duration']
                    . "</td><td>"
                    . $value['mileage']
                    . "</td><td>"
                    . $value['total_waktu']
                    . "</td><td>"
                    . $value['durasi_parkir']
                    . "</td></tr>";
            }
            ?>
        </table>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script>
    $(document).ready(function() {
        $('#example3').DataTable();
    });
</script>