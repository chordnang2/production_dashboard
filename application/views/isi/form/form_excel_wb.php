
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Form Import Excel WB</h1>
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
                      <a href="<?php echo site_url('Isi_wb') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <form method="post" action="<?php echo site_url('Isi_wb/form') ?>" enctype="multipart/form-data">
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
                echo "<form method='post' action='" . base_url("Isi_wb/import") . "'>";

                // Buat sebuah div untuk alert validasi kosong
                echo "<div style='color: red;' id='kosong'>
    
    </div>";

                echo

                "
                <div class='card-body'>
                <table id='example1' class='table table-bordered table-striped'>
       <thead>
    <tr>
      <th>ID</th>
      <th>Shift</th>
      <th>No Unit</th>
      <th>Tipe Vessel</th>
      <th>Loading Point</th>
      <th>Type</th>
      <th>Weighbridge</th>
      <th>No Transaction</th>
      <th>Gross</th>
      <th>Tare</th>
      <th>Nett</th>
      <th>Time In</th>
      <th>Time Out</th>
      <th>Tipping</th>
      <th>Remaks</th>
      <th>Target</th>
      <th>Percetage</th>
      <th>Loss Weigh</th>
      <th>Keterangan</th>
      <th>Status</th>
      <th>Date</th>
  
    </tr>
    </thead><tbody>";

                $s = strtotime("today");
                $hariini = date("Y-m-d ", $s);
                $numrow = 1;
                $kosong = 0;

                // Lakukan perulangan dari data yang ada di excel
                // $sheet adalah variabel yang dikirim dari controller
                foreach ($sheet as $row) {
                    // Ambil data pada excel sesuai Kolom
                    $id_wb = $row['U']; // Insert data nis dari kolom A di excel
                    $shift = $row['A']; // Insert data nis dari kolom A di excel
                    $no_unit = $row['B']; // Insert data nama dari kolom B di excel
                    $tipe_vessel = $row['C']; // Insert data jenis kelamin dari kolom C di excel
                    $loading_point = $row['D']; // Insert data alamat dari kolom D di excel
                    $type = $row['E']; // Insert data alamat dari kolom D di excel
                    $weighbridge = $row['F']; // Insert data alamat dari kolom D di excel
                    $no_transaction = $row['G']; // Insert data alamat dari kolom D di excel
                    $gross = $row['H']; // Insert data alamat dari kolom D di excel
                    $tare = $row['I']; // Insert data alamat dari kolom D di excel
                    $nett = $row['J']; // Insert data alamat dari kolom D di excel
                    $time_in = $row['K']; // Insert data alamat dari kolom D di excel
                    $time_out = $row['L']; // Insert data alamat dari kolom D di excel
                    $tipping = $row['M']; // Insert data alamat dari kolom D di excel
                    $remaks = $row['N']; // Insert data alamat dari kolom D di excel
                    $target = $row['O']; // Insert data alamat dari kolom D di excel
                    $precentage = $row['P']; // Insert data alamat dari kolom D di excel
                    $loss_weight = $row['Q']; // Insert data alamat dari kolom D di excel
                    $keterangan = $row['R']; // Insert data alamat dari kolom D di excel
                    $status = $row['S']; // Insert data alamat dari kolom D di excel
                    $date = $row['T']; // Insert data alamat dari kolom D di excel

                    // Cek jika semua data tidak diisi
                    if ($id_wb == "" && $shift == "" && $no_unit == "" && $tipe_vessel == "" && $loading_point == "" && $type == "" && $weighbridge == "" && $no_transaction == "" && $gross == "" && $tare == "" && $nett == "" && $time_in == "" && $time_out == "" && $tipping == "" && $remaks == "" && $target == "" && $precentage == "" && $loss_weight == "" && $loading_point == "" && $keterangan == "" && $status == "" && $date == "" )
                        continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

                    // Cek $numrow apakah lebih dari 1
                    // Artinya karena baris pertama adalah nama-nama kolom
                    // Jadi dilewat saja, tidak usah diimport
                    if ($numrow > 1) {
                        // Validasi apakah semua data telah diisi
                        $id_wb_td = (!empty($id_wb)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                        $shift_td = (!empty($shift)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                        $no_unit_td = (!empty($no_unit)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                        $tipe_vessel_td = (!empty($tipe_vessel)) ? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                        $loading_point_td = (!empty($loading_point)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                        $type_td = (!empty($type)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                        $weighbridge_td = (!empty($weighbridge)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                        $no_transaction_td = (!empty($no_transaction)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                        $gross_td = (!empty($gross)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                        $tare_td = (!empty($tare)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                        $nett_td = (!empty($nett)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                        $time_in_td = (!empty($time_in)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                        $time_out_td = (!empty($time_out)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                        $tipping_td = (!empty($tipping)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                        $remaks_td = (!empty($remaks)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                        $target_td = (!empty($target)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                        $precentage_td = (!empty($precentage)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                        $loss_weight_td = (!empty($loss_weight)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                        $keterangan_td = (!empty($keterangan)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                        $status_td = (!empty($status)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                        $date_td = (!empty($date)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah

                        // Jika salah satu data ada yang kosong
                        if ($id_wb == "" && $shift == "" && $no_unit == "" && $tipe_vessel == "" && $loading_point == "" && $type == "" && $weighbridge == "" && $no_transaction == "" && $gross == "" && $tare == "" && $nett == "" && $time_in == "" && $time_out == "" && $tipping == "" && $remaks == "" && $target == "" && $precentage == "" && $loss_weight == "" && $loading_point == "" && $keterangan == "" && $status == "" && $date == "" ) {
                            $kosong++; // Tambah 1 variabel $kosong
                        }

                        echo "<tr>";
                        echo "<td" . $id_wb_td . ">" . $id_wb . "</td>";
                        echo "<td" . $shift_td . ">" . $shift . "</td>";
                        echo "<td" . $no_unit_td . ">" . $no_unit . "</td>";
                        echo "<td" . $tipe_vessel_td . ">" . $tipe_vessel . "</td>";
                        echo "<td" . $loading_point_td . ">" . $loading_point . "</td>";
                        echo "<td" . $type_td . ">" . $type . "</td>";
                        echo "<td" . $weighbridge_td . ">"  . $weighbridge . "</td>";
                        echo "<td" . $no_transaction_td . ">" . $no_transaction . "</td>";
                        echo "<td" . $gross_td . ">"  . $gross . "</td>";
                        echo "<td" . $tare_td . ">" . $tare . "</td>";
                        echo "<td" . $nett_td . ">"  . $nett . "</td>";
                        echo "<td" . $time_in_td . ">" . $time_in . "</td>";
                        echo "<td" . $time_out_td . ">"  . $time_out . "</td>";
                        echo "<td" . $tipping_td . ">" . $tipping . "</td>";
                        echo "<td" . $remaks_td . ">"  . $remaks . "</td>";
                        echo "<td" . $target_td . ">" . $target . "</td>";
                        echo "<td" . $precentage_td . ">"  . $precentage . "</td>";
                        echo "<td" . $loss_weight_td . ">" . $loss_weight . "</td>";
                        echo "<td" . $keterangan_td . ">" . $keterangan . "</td>";
                        echo "<td" . $status_td . ">"  . $status . "</td>";
                        echo "<td" . $date_td . ">"  . $date . "</td>";
                        echo "</tr>";
                    }

                    $numrow++; // Tambah 1 setiap kali looping
                }

                echo "</tbody>
                <tfoot>
    <tr>
      <th>ID</th>
      <th>Shift</th>
      <th>No Unit</th>
      <th>Tipe Vessel</th>
      <th>Loading Point</th>
      <th>Type</th>
      <th>Weighbridge</th>
      <th>No Transaction</th>
      <th>Gross</th>
      <th>Tare</th>
      <th>Nett</th>
      <th>Time In</th>
      <th>Time Out</th>
      <th>Tipping</th>
      <th>Remaks</th>
      <th>Target</th>
      <th>Percetage</th>
      <th>Loss Weigh</th>
      <th>Keterangan</th>
      <th>Status</th>
      <th>Date</th>

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