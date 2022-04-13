  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Form Import Excel HM</h1>
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
                      <a href="<?php echo site_url('Hm_controller') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <form method="post" action="<?php echo site_url('Hm_controller/form') ?>" enctype="multipart/form-data">
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
                echo "<form method='post' action='" . base_url("Hm_controller/import") . "'>";

                // Buat sebuah div untuk alert validasi kosong
                echo "<div style='color: red;' id='kosong'>
    
    </div>";

                echo

                "
                <div class='card-body'>
                <table id='example1' class='table table-bordered table-striped'>
       <thead>
    <tr>
      <th>Tanggal</th>
      <th>NIK Day</th>
      <th>Nama Day</th>
      <th>Ritase Day</th>
      <th>Unit Day</th>
      <th>Start Day</th>
      <th>End Day</th>
      <th>Hours Day</th>
      <th>Working Hours Day</th>
      <th>Ganti Shift Day</th>
      <th>P5M Day</th>
      <th>P2H Day</th>
      <th>Isi Solar Day</th>
      <th>Coal Limit Day</th>
      <th>Istirahat dan Makan Day</th>
      <th>No Driver Day</th>
      <th>Periksa Ban Day</th>
      <th>Sholat Day</th>
      <th>Cuci Unit Day</th>
      <th>Silo BD Day</th>
      <th>Hopper BD Day</th>
      <th>External Problem Day</th>
      <th>Antri Loading Day</th>
      <th>Antri Dumping Day</th>
      <th>Antri WB Day</th>
      <th>Total STB Day</th>
      <th>Repair Day</th>
      <th>Service Day</th>
      <th>Accident Day</th>
      <th>Total BD Day</th>
      <th>PA Day</th>
      <th>UA Day</th>
     
      <th>NIK Night</th>
      <th>Nama Nght</th>
      <th>Ritase Nght</th>
      <th>Start Nght</th>
      <th>End Nght</th>
      <th>Hours Nght</th>
      <th>Working Hours Nght</th>
      <th>Ganti Shift Nght</th>
      <th>P5M Nght</th>
      <th>P2H Nght</th>
      <th>Isi Solar Nght</th>
      <th>Coal Limit Nght</th>
      <th>Istirahat dan Makan Nght</th>
      <th>No Driver Nght</th>
      <th>Periksa Ban Nght</th>
      <th>Sholat Nght</th>
      <th>Cuci Unit Nght</th>
      <th>Silo BD Nght</th>
      <th>Hopper BD Nght</th>
      <th>External Problem Nght</th>
      <th>Antri Loading Nght</th>
      <th>Antri Dumping Nght</th>
      <th>Antri WB Nght</th>
      <th>Total STB Nght</th>
      <th>Repair Nght</th>
      <th>Service Nght</th>
      <th>Accident Nght</th>
      <th>Total BD Nght</th>
      <th>PA Nght</th>
      <th>UA Nght</th>
      <th>Total HM</th>
 
     
  
    </tr>
    </thead><tbody>";

                // $s = strtotime("today");
                // $hariini = date("Y-m-d ", $s);
                $numrow = 1;
                $kosong = 0;

                // Lakukan perulangan dari data yang ada di excel
                // $sheet adalah variabel yang dikirim dari controller
                foreach ($sheet as $row) {

                    $tanggal = $row['A'];
                    $nik_day = $row['C']; // Insert data nis dari kolom A di excel
                    $nama_day = $row['D'];
                    $ritase_day = $row['E'];
                    $unit_day = $row['F'];
                    $start_day = $row['G'];
                    $end_day = $row['H'];
                    $hours_day = $row['I'];
                    $wh_day = $row['J'];
                    $ganti_shift_day = $row['K'];
                    $p5m_day = $row['L'];
                    $p2h_day = $row['M'];
                    $isi_solar_day = $row['N'];
                    $coal_limit_day = $row['O'];
                    $ism_day = $row['P'];
                    $no_driver_day = $row['Q'];
                    $periksa_ban_day = $row['R'];
                    $sholat_day = $row['S'];
                    $cuci_unit_day = $row['T'];
                    $silo_bd_day = $row['U'];
                    $hopper_bd_day = $row['V'];
                    $external_prob_day = $row['W'];
                    $antri_load_day = $row['X'];
                    $antri_dump_day = $row['Y'];
                    $antri_wb_day = $row['Z'];
                    $total_stb_day = $row['AA'];
                    $repair_day = $row['AB'];
                    $service_day = $row['AC'];
                    $accident_day = $row['AD'];
                    $total_bd_day = $row['AE'];
                    $pa_day = $row['AF'];
                    $ua_day = $row['AG'];

                    $nik_night = $row['AI'];
                    $nama_night = $row['AJ'];
                    $ritase_night = $row['AK'];

                    $start_night = $row['AM'];
                    $end_night = $row['AN'];
                    $hours_night = $row['AO'];
                    $wh_night = $row['AP'];
                    $ganti_shift_night = $row['AQ'];
                    $p5m_night = $row['AR'];
                    $p2h_night = $row['AS'];
                    $isi_solar_night = $row['AT'];
                    $coal_limit_night = $row['AU'];
                    $ism_night = $row['AV'];
                    $no_driver_night = $row['AW'];
                    $periksa_ban_night = $row['AX'];
                    $sholat_night = $row['AY'];
                    $cuci_unit_night = $row['AZ'];
                    $silo_bd_night = $row['BA'];
                    $hopper_bd_night = $row['BB'];
                    $external_prob_night = $row['BC'];
                    $antri_load_night = $row['BD'];
                    $antri_dump_night = $row['BE'];
                    $antri_wb_night = $row['BF'];
                    $total_stb_night = $row['BG'];
                    $repair_night = $row['BH'];
                    $service_night = $row['BI'];
                    $accident_night = $row['BJ'];
                    $total_bd_night = $row['BK'];
                    $pa_night = $row['BL'];
                    $ua_night = $row['BM'];
                    $total_hm = $row['BN'];


                    // // Cek jika semua data tidak diisi
                    // if (
                    //     $no = "" &&
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

                    //     $no_td = (!empty($no)) ? "" : " style='background: #E07171;'";
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
                    //     if ($no = "" &&
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

                    echo "<tr><td>" . $tanggal . "</td>";
                    echo "<td>" . $nik_day . "</td>";
                    echo "<td>" . $nama_day . "</td>";
                    echo "<td>" . $ritase_day . "</td>";
                    echo "<td>" . $unit_day . "</td>";
                    echo "<td>" . $start_day . "</td>";
                    echo "<td>" . $end_day . "</td>";
                    echo "<td>" . $hours_day . "</td>";
                    echo "<td>" . $wh_day . "</td>";
                    echo "<td>" . $ganti_shift_day . "</td>";
                    echo "<td>" . $p5m_day . "</td>";
                    echo "<td>" . $p2h_day . "</td>";
                    echo "<td>" . $isi_solar_day . "</td>";
                    echo "<td>" . $coal_limit_day . "</td>";
                    echo "<td>" . $ism_day . "</td>";
                    echo "<td>" . $no_driver_day . "</td>";
                    echo "<td>" . $periksa_ban_day . "</td>";
                    echo "<td>" . $sholat_day . "</td>";
                    echo "<td>" . $cuci_unit_day . "</td>";
                    echo "<td>" . $silo_bd_day . "</td>";
                    echo "<td>" . $hopper_bd_day . "</td>";
                    echo "<td>" . $external_prob_day . "</td>";
                    echo "<td>" . $antri_load_day . "</td>";
                    echo "<td>" . $antri_dump_day . "</td>";
                    echo "<td>" . $antri_wb_day . "</td>";
                    echo "<td>" . $total_stb_day . "</td>";
                    echo "<td>" . $repair_day . "</td>";
                    echo "<td>" . $service_day . "</td>";
                    echo "<td>" . $accident_day . "</td>";
                    echo "<td>" . $total_bd_day . "</td>";
                    echo "<td>" . $pa_day . "</td>";
                    echo "<td>" . $ua_day . "</td>";

                    echo "<td>" . $nik_night . "</td>";
                    echo "<td>" . $nama_night . "</td>";
                    echo "<td>" . $ritase_night . "</td>";

                    echo "<td>" . $start_night . "</td>";
                    echo "<td>" . $end_night . "</td>";
                    echo "<td>" . $hours_night . "</td>";
                    echo "<td>" . $wh_night . "</td>";
                    echo "<td>" . $ganti_shift_night . "</td>";
                    echo "<td>" . $p5m_night . "</td>";
                    echo "<td>" . $p2h_night . "</td>";
                    echo "<td>" . $isi_solar_night . "</td>";
                    echo "<td>" . $coal_limit_night . "</td>";
                    echo "<td>" . $ism_night . "</td>";
                    echo "<td>" . $no_driver_night . "</td>";
                    echo "<td>" . $periksa_ban_night . "</td>";
                    echo "<td>" . $sholat_night . "</td>";
                    echo "<td>" . $cuci_unit_night . "</td>";
                    echo "<td>" . $silo_bd_night . "</td>";
                    echo "<td>" . $hopper_bd_night . "</td>";
                    echo "<td>" . $external_prob_night . "</td>";
                    echo "<td>" . $antri_load_night . "</td>";
                    echo "<td>" . $antri_dump_night . "</td>";
                    echo "<td>" . $antri_wb_night . "</td>";
                    echo "<td>" . $total_stb_night . "</td>";
                    echo "<td>" . $repair_night . "</td>";
                    echo "<td>" . $service_night . "</td>";
                    echo "<td>" . $accident_night . "</td>";
                    echo "<td>" . $total_bd_night . "</td>";
                    echo "<td>" . $pa_night . "</td>";
                    echo "<td>" . $ua_night . "</td>";
                    echo "<td>" . $total_hm . "</td></tr>";




                    $numrow++; // Tambah 1 setiap kali looping
                }

                echo "</tbody>
                <tfoot>
    <tr>
    <th>Tanggal</th>
    <th>NIK Day</th>
    <th>Nama Day</th>
    <th>Ritase Day</th>
    <th>Unit Day</th>
    <th>Start Day</th>
    <th>End Day</th>
    <th>Hours Day</th>
    <th>Working Hours Day</th>
    <th>Ganti Shift Day</th>
    <th>P5M Day</th>
    <th>P2H Day</th>
    <th>Isi Solar Day</th>
    <th>Coal Limit Day</th>
    <th>Istirahat dan Makan Day</th>
    <th>No Driver Day</th>
    <th>Periksa Ban Day</th>
    <th>Sholat Day</th>
    <th>Cuci Unit Day</th>
    <th>Silo BD Day</th>
    <th>Hopper BD Day</th>
    <th>External Problem Day</th>
    <th>Antri Loading Day</th>
    <th>Antri Dumping Day</th>
    <th>Antri WB Day</th>
    <th>Total STB Day</th>
    <th>Repair Day</th>
    <th>Service Day</th>
    <th>Accident Day</th>
    <th>Total BD Day</th>
    <th>PA Day</th>
    <th>UA Day</th>
   
    <th>NIK Night</th>
    <th>Nama Nght</th>
    <th>Ritase Nght</th>
    <th>Start Nght</th>
    <th>End Nght</th>
    <th>Hours Nght</th>
    <th>Working Hours Nght</th>
    <th>Ganti Shift Nght</th>
    <th>P5M Nght</th>
    <th>P2H Nght</th>
    <th>Isi Solar Nght</th>
    <th>Coal Limit Nght</th>
    <th>Istirahat dan Makan Nght</th>
    <th>No Driver Nght</th>
    <th>Periksa Ban Nght</th>
    <th>Sholat Nght</th>
    <th>Cuci Unit Nght</th>
    <th>Silo BD Nght</th>
    <th>Hopper BD Nght</th>
    <th>External Problem Nght</th>
    <th>Antri Loading Nght</th>
    <th>Antri Dumping Nght</th>
    <th>Antri WB Nght</th>
    <th>Total STB Nght</th>
    <th>Repair Nght</th>
    <th>Service Nght</th>
    <th>Accident Nght</th>
    <th>Total BD Nght</th>
    <th>PA Nght</th>
    <th>UA Nght</th>
    <th>Total HM</th>

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