  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Form Import Excel Geofence</h1>
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
                  <!-- <div class="card-header">
                      <a href="<?php echo site_url('Isi_wb') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                  </div> -->
                  <!-- /.card-header -->
                  <div class="card-body">
                      <form method="post" action="<?php echo site_url('Isi_geofence/form') ?>" enctype="multipart/form-data">
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
                echo "<form method='post' action='" . base_url("Isi_geofence/import") . "'>";

                // Buat sebuah div untuk alert validasi kosong
                echo "<div style='color: red;' id='kosong'>
 
    </div>";

                echo
                
                "
                <div class='card-body'>
                <table id='example1' class='table table-bordered table-striped'>
                <thead>
    <tr>
      <th>Unit </th>
      <th>Geofence</th>
      <th>Time In</th>
      <th>Time Out</th>
      <th>Duration</th>
      <th>Mileage</th>
      <th>Total Waktu</th>
      <th>Durasi Parkir</th>
    </tr> </thead><tbody>";

                $s = strtotime("today");
                $hariini = date("Y-m-d ", $s);
                $numrow = 1;
                $kosong = 0;

                // Lakukan perulangan dari data yang ada di excel
                // $sheet adalah variabel yang dikirim dari controller
                foreach ($sheet as $row) {
                    // Ambil data pada excel sesuai Kolom
                    $unit = $row['A']; // Insert data nis dari kolom A di excel
                    $geofence = $row['B']; // Insert data nama dari kolom B di excel
                    $time_in = $row['C']; // Insert data jenis kelamin dari kolom C di excel
                    $time_out = $row['D']; // Insert data alamat dari kolom D di excel
                    $duration = $row['E']; // Insert data alamat dari kolom D di excel
                    $mileage = $row['F']; // Insert data alamat dari kolom D di excel
                    $total_waktu = $row['G']; // Insert data alamat dari kolom D di excel
                    $durasi_parkir = $row['H']; // Insert data alamat dari kolom D di excel

                    // Cek jika semua data tidak diisi
                    if ($unit == "")
                        continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

                    // Cek $numrow apakah lebih dari 1
                    // Artinya karena baris pertama adalah nama-nama kolom
                    // Jadi dilewat saja, tidak usah diimport
                    if ($numrow > 1) {
                        // Validasi apakah semua data telah diisi
                        $unit_td = (!empty($unit)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah


                        // Jika salah satu data ada yang kosong
                        if ($unit == "") {
                            $kosong++; // Tambah 1 variabel $kosong
                        }

                        echo "<tr>";
                        echo "<td" . $unit_td . ">" . $unit . "</td>";
                        echo "<td>" . $geofence . "</td>";
                        echo "<td>" . $time_in . "</td>";
                        echo "<td>" . $time_out . "</td>";
                        echo "<td>" . $duration . "</td>";
                        echo "<td>" . $mileage . "</td>";
                        echo "<td>" . $total_waktu . "</td>";
                        echo "<td>" . $durasi_parkir . "</td>";
                        echo "</tr>";
                    }

                    $numrow++; // Tambah 1 setiap kali looping
                }

                echo "
                
                </tbody>
                <tfoot>
                <tr>
                <th>Unit </th>
                <th>Geofence</th>
                <th>Time In</th>
                <th>Time Out</th>
                <th>Duration</th>
                <th>Mileage</th>
                <th>Total Waktu</th>
                <th>Durasi Parkir</th>
              </tr>
              </tfoot>
              </table>
              </div>";

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