  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Form Import Excel Highlight</h1>
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
                      <a href="<?php echo site_url('Isi_highlight/hasil_upload_hg') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <form method="post" action="<?php echo site_url('Isi_highlight/form') ?>" enctype="multipart/form-data">
                          <input type="file" name="file">
                          <input type="submit" name="preview" value="Preview">
                      </form>
                  </div>
              </div>
          </div>
          <?php
            if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form 
                if (isset($upload_error)) { // Jika proses upload gagal
                    echo "<div style='color: red;'>" . $upload_error . "</div>"; // Muncul pesan error upload
                    die; // stop skrip
                }

                // Buat sebuah tag form untuk proses import data ke database
                echo "<form method='post' action='" . base_url("Isi_highlight/import") . "'>";

                // Buat sebuah div untuk alert validasi kosong
                echo "<div style='color: red;' id='kosong'>
    
    </div>";

                echo

                "
                <div class='card-body'>
                <table id='example1' class='table table-bordered table-striped'>
       <thead>
    <tr>
           <th>Payment</th>
      <th>Month</th>
      <th>Tahun</th>
      <th>Date</th>
      <th>NRP</th>
      <th>Driver 1</th>
      <th>NRP GANTUNGAN</th>
      <th>Driver 2</th>
      <th>Unit</th>
      <th>Vessel Type 1</th>
      <th>Vessel Type 2</th>
      <th>Shift</th>
      <th>Rekap Ritase OPT</th>
      <th>Num Trip</th>
      <th>Time In</th>
      <th>Time out</th>
      <th>Dari</th>
      <th>Ke</th>
      <th>Tonase</th>
      <th>WB</th>
      <th>Kosongan</th>
      <th>Net</th>
      <th>Code</th>
      <th>Id WB</th>
      <th>Type Coal</th>
      <th>Weighbridge</th>
      <th>CT</th>
      <th>Target</th>
      <th>Unit Camp</th>
      <th>Target Monthly</th>
      <th>Vessel Capacity</th>
      <th>HM</th>
      <th>KM</th>
      <th>Fuel</th>
      <th>Cycle Time</th>
      <th>Travel Time</th>
      <th>%</th>
      <th>Status</th>
      <th>Modifikasi Vessel</th>
      <th>Primeover</th>
      <th>Vessel</th>
      <th>Target Monthly Rev</th>
      <th>Target Internal</th>
      <th>Distance</th>
  
    </tr>
    </thead><tbody>";

                // $s = strtotime("today");
                // $hariini = date("Y-m-d ", $s);
                $numrow = 1;
                $kosong = 0;

                // Lakukan perulangan dari data yang ada di excel
                // $sheet adalah variabel yang dikirim dari controller
                foreach ($sheet as $row) {

                    $payment = $row['B']; // Insert data nis dari kolom A di excel
                    $month = $row['C']; // Insert data nama dari kolom B di excel
                    $tahun = $row['D']; // Insert data jenis kelamin dari kolom C di excel
                    $date = $row['E']; // Insert data jenis kelamin dari kolom C di excel
                    $nrp = $row['F']; // Insert data alamat dari kolom D di excel
                    $driver_1 = $row['G']; // Insert data alamat dari kolom D di excel
                    $nrp_gantungan = $row['H']; // Insert data alamat dari kolom D di excel
                    $driver_2 = $row['I']; // Insert data alamat dari kolom D di excel
                    $unit = $row['J']; // Insert data alamat dari kolom D di excel
                    $vessel_type_1 = $row['K']; // Insert data alamat dari kolom D di excel
                    $vessel_type_2 = $row['L']; // Insert data alamat dari kolom D di excel
                    $shift = $row['M']; // Insert data alamat dari kolom D di excel
                    $rekap_r_o = $row['N']; // Insert data alamat dari kolom D di excel
                    $num_trip = $row['O']; // Insert data alamat dari kolom D di excel
                    $time_in = $row['P']; // Insert data alamat dari kolom D di excel
                    $time_out = $row['Q']; // Insert data alamat dari kolom D di excel
                    $dari = $row['R']; // Insert data alamat dari kolom D di excel
                    $ke = $row['S']; // Insert data alamat dari kolom D di excel
                    $tonase = $row['T']; // Insert data alamat dari kolom D di excel
                    $wb = $row['U']; // Insert data alamat dari kolom D di excel
                    $kosongan = $row['V']; // Insert data alamat dari kolom D di excel
                    $net = $row['W']; // Insert data nis dari kolom A di excel
                    $code = $row['X']; // Insert data nis dari kolom A di excel
                    $id_wb = $row['Y']; // Insert data nis dari kolom A di excel
                    $type_coal = $row['Z']; // Insert data nis dari kolom A di excel
                    $weighbridge = $row['AA']; // Insert data nis dari kolom A di excel
                    $ct = $row['AB']; // Insert data nis dari kolom A di excel
                    $target = $row['AC']; // Insert data nis dari kolom A di excel
                    $unit_camp = $row['AD']; // Insert data nis dari kolom A di excel
                    $target_monthly = $row['AE']; // Insert data nis dari kolom A di excel
                    $vessel_capacity = $row['AF']; // Insert data nis dari kolom A di excel
                    $hm = $row['AG']; // Insert data nis dari kolom A di excel
                    $km = $row['AH']; // Insert data nis dari kolom A di excel
                    $fuel = $row['AI']; // Insert data nis dari kolom A di excel
                    $cycle_time = $row['AJ']; // Insert data nis dari kolom A di excel
                    $travel_time = $row['AK']; // Insert data nis dari kolom A di excel
                    $persen = $row['AL']; // Insert data nis dari kolom A di excel
                    $status = $row['AM']; // Insert data nis dari kolom A di excel
                    $modifikasi_vessel = $row['AN']; // Insert data nis dari kolom A di excel
                    $primemover = $row['AO']; // Insert data nis dari kolom A di excel
                    $vessel = $row['AP']; // Insert data nis dari kolom A di excel
                    $target_monthly_rev = $row['AQ']; // Insert data nis dari kolom A di excel
                    $target_internal = $row['AR']; // Insert data nis dari kolom A di excel
                    $distance = $row['AS']; // Insert data nis dari kolom A di excel

                    // Cek jika semua data tidak diisi
                    // if (
                    //     $payment = "" &&
                    //     $month = "" &&
                    //     $tahun = "" &&
                    //     $date = "" &&
                    //     $nrp = "" &&
                    //     $driver_1 = "" && // Insert data alamat dari kolom D di excel
                    //     $nrp_gantungan = "" && // Insert data alamat dari kolom D di excel
                    //     $driver_2 = "" && // Insert data alamat dari kolom D di excel
                    //     $unit = "" && // Insert data alamat dari kolom D di excel
                    //     $vessel_type_1 = "" && // Insert data alamat dari kolom D di excel
                    //     $vessel_type_2 = "" && // Insert data alamat dari kolom D di excel
                    //     $shift = "" && // Insert data alamat dari kolom D di excel
                    //     $rekap_r_o = "" && // Insert data alamat dari kolom D di excel
                    //     $num_trip = "" && // Insert data alamat dari kolom D di excel
                    //     $time_in = "" && // Insert data alamat dari kolom D di excel
                    //     $time_out = "" && // Insert data alamat dari kolom D di excel
                    //     $dari = "" && // Insert data alamat dari kolom D di excel
                    //     $ke = "" && // Insert data alamat dari kolom D di excel
                    //     $tonase = "" && // Insert data alamat dari kolom D di excel
                    //     $wb = "" && // Insert data alamat dari kolom D di excel
                    //     $kosongan = "" && // Insert data alamat dari kolom D di excel
                    //     $net = "" && // Insert data nis dari kolom A di excel
                    //     $code = "" && // Insert data nis dari kolom A di excel
                    //     $id_wb = "" && // Insert data nis dari kolom A di excel
                    //     $type_coal = "" && // Insert data nis dari kolom A di excel
                    //     $weighbridge = "" && // Insert data nis dari kolom A di excel
                    //     $ct = "" && // Insert data nis dari kolom A di excel
                    //     $target = "" && // Insert data nis dari kolom A di excel
                    //     $unit_camp = "" && // Insert data nis dari kolom A di excel
                    //     $target_monthly = "" && // Insert data nis dari kolom A di excel
                    //     $vessel_capacity = "" && // Insert data nis dari kolom A di excel
                    //     $hm = "" && // Insert data nis dari kolom A di excel
                    //     $km = "" && // Insert data nis dari kolom A di excel
                    //     $fuel = "" && // Insert data nis dari kolom A di excel
                    //     $cycle_time = "" && // Insert data nis dari kolom A di excel
                    //     $travel_time = "" && // Insert data nis dari kolom A di excel
                    //     $persen = "" && // Insert data nis dari kolom A di excel
                    //     $status = "" && // Insert data nis dari kolom A di excel
                    //     $modifikasi_vessel = "" && // Insert data nis dari kolom A di excel
                    //     $primemover = "" && // Insert data nis dari kolom A di excel
                    //     $vessel = "" && // Insert data nis dari kolom A di excel
                    //     $target_monthly_rev = "" && // Insert data nis dari kolom A di excel
                    //     $target_internal = "" && // Insert data nis dari kolom A di excel
                    //     $distance = "" // Insert data nis dari kolom A di excel

                    // )
                    //     continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

                    // // Cek $numrow apakah lebih dari 1
                    // // Artinya karena baris pertama adalah nama-nama kolom
                    // // Jadi dilewat saja, tidak usah diimport
                    // if ($numrow > 1) {
                    //     // Validasi apakah semua data telah diisi

                    //     $payment_td = (!empty($payment)) ? "" : " style='background: #E07171;'";
                    //     $month_td = (!empty($month)) ? "" : " style='background: #E07171;'";
                    //     $tahun_td = (!empty($tahun)) ? "" : " style='background: #E07171;'";
                    //     $date_td = (!empty($date)) ? "" : " style='background: #E07171;'";
                    //     $nrp_td = (!empty($nrp)) ? "" : " style='background: #E07171;'";
                    //     $driver_1_td = (!empty($driver_1)) ? "" : " style='background: #E07171;'";
                    //     $nrp_gantungan_td = (!empty($nrp_gantungan)) ? "" : " style='background: #E07171;'";
                    //     $driver_2_td = (!empty($driver_2)) ? "" : " style='background: #E07171;'";
                    //     $unit_td = (!empty($unit)) ? "" : " style='background: #E07171;'";
                    //     $vessel_type_1_td = (!empty($vessel_type_1)) ? "" : " style='background: #E07171;'";
                    //     $vessel_type_2_td = (!empty($vessel_type_2)) ? "" : " style='background: #E07171;'";
                    //     $shift_td = (!empty($shift)) ? "" : " style='background: #E07171;'";
                    //     $rekap_r_o_td = (!empty($rekap_r_o)) ? "" : " style='background: #E07171;'";
                    //     $num_trip_td = (!empty($num_trip)) ? "" : " style='background: #E07171;'";
                    //     $time_in_td = (!empty($time_in)) ? "" : " style='background: #E07171;'";
                    //     $time_out_td = (!empty($time_out)) ? "" : " style='background: #E07171;'";
                    //     $dari_td = (!empty($dari)) ? "" : " style='background: #E07171;'";
                    //     $ke_td = (!empty($ke)) ? "" : " style='background: #E07171;'";
                    //     $tonase_td = (!empty($tonase)) ? "" : " style='background: #E07171;'";
                    //     $wb_td = (!empty($wb)) ? "" : " style='background: #E07171;'";
                    //     $kosongan_td = (!empty($kosongan)) ? "" : " style='background: #E07171;'";
                    //     $net_td = (!empty($net)) ? "" : " style='background: #E07171;'";  // 
                    //     $code_td = (!empty($code)) ? "" : " style='background: #E07171;'";  // 
                    //     $id_wb_td = (!empty($id_wb)) ? "" : " style='background: #E07171;'";  // 
                    //     $type_coal_td = (!empty($type_coal)) ? "" : " style='background: #E07171;'";  // 
                    //     $weighbridge_td = (!empty($weighbridge)) ? "" : " style='background: #E07171;'";  // 
                    //     $ct_td = (!empty($ct)) ? "" : " style='background: #E07171;'";  // 
                    //     $target_td = (!empty($target)) ? "" : " style='background: #E07171;'";  // 
                    //     $unit_camp_td = (!empty($unit_camp)) ? "" : " style='background: #E07171;'";  // 
                    //     $target_monthly_td = (!empty($target_monthly)) ? "" : " style='background: #E07171;'";  // 
                    //     $vessel_capacity_td = (!empty($vessel_capacity)) ? "" : " style='background: #E07171;'";  // 
                    //     $hm_td = (!empty($hm)) ? "" : " style='background: #E07171;'";  // 
                    //     $km_td = (!empty($km)) ? "" : " style='background: #E07171;'";  // 
                    //     $fuel_td = (!empty($fuel)) ? "" : " style='background: #E07171;'";  // 
                    //     $cycle_time_td = (!empty($cycle_time)) ? "" : " style='background: #E07171;'";  // 
                    //     $travel_time_td = (!empty($travel_time)) ? "" : " style='background: #E07171;'";  // 
                    //     $persen_td = (!empty($persen)) ? "" : " style='background: #E07171;'";  // 
                    //     $status_td = (!empty($status)) ? "" : " style='background: #E07171;'";  // 
                    //     $modifikasi_vessel_td = (!empty($modifikasi_vessel)) ? "" : " style='background: #E07171;'";  // 
                    //     $primemover_td = (!empty($primemover)) ? "" : " style='background: #E07171;'";  // 
                    //     $vessel_td = (!empty($vessel)) ? "" : " style='background: #E07171;'";  // 
                    //     $target_monthly_rev_td = (!empty($target_monthly_rev)) ? "" : " style='background: #E07171;'";  // 
                    //     $target_internal_td = (!empty($target_internal)) ? "" : " style='background: #E07171;'";  // 
                    //     $distance_td = (!empty($distance)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah

                    //     // Jika salah satu data ada yang kosong
                    //     if (
                    //         $payment = "" &&
                    //         $month = "" &&
                    //         $tahun = "" &&
                    //         $date = "" &&
                    //         $nrp = "" &&
                    //         $driver_1 = "" && // Insert data alamat dari kolom D di excel
                    //         $nrp_gantungan = "" && // Insert data alamat dari kolom D di excel
                    //         $driver_2 = "" && // Insert data alamat dari kolom D di excel
                    //         $unit = "" && // Insert data alamat dari kolom D di excel
                    //         $vessel_type_1 = "" && // Insert data alamat dari kolom D di excel
                    //         $vessel_type_2 = "" && // Insert data alamat dari kolom D di excel
                    //         $shift = "" && // Insert data alamat dari kolom D di excel
                    //         $rekap_r_o = "" && // Insert data alamat dari kolom D di excel
                    //         $num_trip = "" && // Insert data alamat dari kolom D di excel
                    //         $time_in = "" && // Insert data alamat dari kolom D di excel
                    //         $time_out = "" && // Insert data alamat dari kolom D di excel
                    //         $dari = "" && // Insert data alamat dari kolom D di excel
                    //         $ke = "" && // Insert data alamat dari kolom D di excel
                    //         $tonase = "" && // Insert data alamat dari kolom D di excel
                    //         $wb = "" && // Insert data alamat dari kolom D di excel
                    //         $kosongan = "" && // Insert data alamat dari kolom D di excel
                    //         $net = "" && // Insert data nis dari kolom A di excel
                    //         $code = "" && // Insert data nis dari kolom A di excel
                    //         $id_wb = "" && // Insert data nis dari kolom A di excel
                    //         $type_coal = "" && // Insert data nis dari kolom A di excel
                    //         $weighbridge = "" && // Insert data nis dari kolom A di excel
                    //         $ct = "" && // Insert data nis dari kolom A di excel
                    //         $target = "" && // Insert data nis dari kolom A di excel
                    //         $unit_camp = "" && // Insert data nis dari kolom A di excel
                    //         $target_monthly = "" && // Insert data nis dari kolom A di excel
                    //         $vessel_capacity = "" && // Insert data nis dari kolom A di excel
                    //         $hm = "" && // Insert data nis dari kolom A di excel
                    //         $km = "" && // Insert data nis dari kolom A di excel
                    //         $fuel = "" && // Insert data nis dari kolom A di excel
                    //         $cycle_time = "" && // Insert data nis dari kolom A di excel
                    //         $travel_time = "" && // Insert data nis dari kolom A di excel
                    //         $persen = "" && // Insert data nis dari kolom A di excel
                    //         $status = "" && // Insert data nis dari kolom A di excel
                    //         $modifikasi_vessel = "" && // Insert data nis dari kolom A di excel
                    //         $primemover = "" && // Insert data nis dari kolom A di excel
                    //         $vessel = "" && // Insert data nis dari kolom A di excel
                    //         $target_monthly_rev = "" && // Insert data nis dari kolom A di excel
                    //         $target_internal = "" && // Insert data nis dari kolom A di excel
                    //         $distance = "" // Insert data nis dari kolom A di excel
                    //     ) {
                    //         $kosong++; // Tambah 1 variabel $kosong
                    //     }

                    echo "<tr>";
                    echo "<td>" . $payment . "</td>";
                    echo "<td>" . $month . "</td>";
                    echo "<td>" . $tahun . "</td>";
                    echo "<td>" . $date . "</td>";
                    echo "<td>" . $nrp . "</td>";
                    echo "<td>" . $driver_1 . "</td>";
                    echo "<td>" . $nrp_gantungan . "</td>";
                    echo "<td>" . $driver_2 . "</td>";
                    echo "<td>" . $unit . "</td>";
                    echo "<td>" . $vessel_type_1 . "</td>";
                    echo "<td>" . $vessel_type_2 . "</td>";
                    echo "<td>" . $shift . "</td>";
                    echo "<td>" . $rekap_r_o . "</td>";
                    echo "<td>" . $num_trip . "</td>";
                    echo "<td>" . $time_in . "</td>";
                    echo "<td>" . $time_out . "</td>";
                    echo "<td>" . $dari . "</td>";
                    echo "<td>" . $ke . "</td>";
                    echo "<td>" . $tonase . "</td>";
                    echo "<td>" . $wb . "</td>";
                    echo "<td>" . $kosongan . "</td>";
                    echo "<td>" . $net . "</td>";
                    echo "<td>" . $code . "</td>";
                    echo "<td>" . $id_wb . "</td>";
                    echo "<td>" . $type_coal . "</td>";
                    echo "<td>" . $weighbridge . "</td>";
                    echo "<td>" . $ct . "</td>";
                    echo "<td>" . $target . "</td>";
                    echo "<td>" . $unit_camp . "</td>";
                    echo "<td>" . $target_monthly . "</td>";
                    echo "<td>" . $vessel_capacity . "</td>";
                    echo "<td>" . $hm . "</td>";
                    echo "<td>" . $km . "</td>";
                    echo "<td>" . $fuel . "</td>";
                    echo "<td>" . $cycle_time . "</td>";
                    echo "<td>" . $travel_time . "</td>";
                    echo "<td>" . $persen . "</td>";
                    echo "<td>" . $status . "</td>";
                    echo "<td>" . $modifikasi_vessel . "</td>";
                    echo "<td>" . $primemover . "</td>";
                    echo "<td>" . $vessel . "</td>";
                    echo "<td>" . $target_monthly_rev . "</td>";
                    echo "<td>" . $target_internal . "</td>";
                    echo "<td>" . $distance . "</td>";
                    // }

                    $numrow++; // Tambah 1 setiap kali looping
                }

                echo "</tbody>
                <tfoot>
    <tr>
     <th>Payment</th>
    <th>Month</th>
    <th>Tahun</th>
    <th>Date</th>
    <th>NRP</th>
    <th>Driver 1</th>
    <th>NRP GANTUNGAN</th>
    <th>Driver 2</th>
    <th>Unit</th>
    <th>Vessel Type 1</th>
    <th>Vessel Type 2</th>
    <th>Shift</th>
    <th>Rekap Ritase OPT</th>
    <th>Num Trip</th>
    <th>Time In</th>
    <th>Time out</th>
    <th>Dari</th>
    <th>Ke</th>
    <th>Tonase</th>
    <th>WB</th>
    <th>Kosongan</th>
    <th>Net</th>
    <th>Code</th>
    <th>Id WB</th>
    <th>Type Coal</th>
    <th>Weighbridge</th>
    <th>CT</th>
    <th>Target</th>
    <th>Unit Camp</th>
    <th>Target Monthly</th>
    <th>Vessel Capacity</th>
    <th>HM</th>
    <th>KM</th>
    <th>Fuel</th>
    <th>Cycle Time</th>
    <th>Travel Time</th>
    <th>%</th>
    <th>Status</th>
    <th>Modifikasi Vessel</th>
    <th>Primeover</th>
    <th>Vessel</th>
    <th>Target Monthly Rev</th>
    <th>Target Internal</th>
    <th>Distance</th>

    </tr>
    <tfoot>
                </table>
                </div>
                ";

                // Cek apakah variabel kosong lebih dari 0
                // Jika lebih dari 0, berarti ada data yang masih kosong
                if ($kosong > 0) {
            ?>
                  <script>
                      $(document).ready(function() {
                          // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                          $("#jumlah_kosong").html('<?php echo $kosong; ?>');

                          $("#kosong").show(); // Munculkan alert validasi kosong
                      });
                  </script>
          <?php
                } else { // Jika semua data sudah diisi
                    echo "<hr>";

                    // Buat sebuah tombol untuk mengimport data ke database
                    echo "<button type='submit' name='import'>Import</button>";
                    // echo "<a href='" . base_url("index.php/Siswa") . "'>Cancel</a>";
                }

                echo "</form>";
            }
            ?>
          <!-- /.card-body -->
          <div class="card-footer">
              <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
          </div>

      </section>
  </div>
  <!-- /.content-wrapper -->