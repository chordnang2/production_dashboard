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
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <a href="<?php echo site_url('isi_bd/add_bd') ?>"><i class="fas fa-plus"></i>
                                  <h3 class="card-title">Tambah Data Breakdown Unit</h3>
                                  <br>
                              </a>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <td>Menu Admin</td>
                                          <td>Id</td>
                                          <td>Timestamp</td>
                                          <td>Nomer Unit</td>
                                          <td>NRP Operator</td>
                                          <td>Shift kerja</td>
                                          <td>Problem</td>
                                          <td>Jam Breakdown</td>
                                          <td>Jam Pengerjaan</td>
                                          <td>Selesai Pengerjaan</td>
                                          <td>Jam Operasi Kembali</td>
                                          <td>HM</td>
                                          <td>KM</td>
                                          <td>Lokasi</td>
                                          <td>Keterangan</td>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php foreach ($tbl_bd as $bd) : ?>
                                          <tr>
                                              <td>
                                                  <!-- <a href="<?= base_url() ?>isi_timbangan/edit_timbangan/<?= $timbangan->id_timbangan ?>" class="btn btn-small"><i class="fas fa-edit"></i> Ubah</a>
                                                  <a href="<?= base_url() ?>isi_timbangan/delete_timbangan/<?= $timbangan->id_timbangan ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i>Hapus</a> -->
                                              </td>
                                              <td><?php echo $bd->id ?></td>
                                              <td><?php echo $bd->timestamp ?></td>
                                              <td><?php echo $bd->no_unit ?></td>
                                              <td><?php echo $bd->nik_opt ?></td>
                                              <td><?php echo $bd->shift_kerja ?></td>
                                              <td><?php echo $bd->problem ?></td>
                                              <td><?php echo $bd->jam_breakdown ?></td>
                                              <td><?php echo $bd->jam_pengerjaan ?></td>
                                              <td><?php echo $bd->selesai_pengerjaan ?></td>
                                              <td><?php echo $bd->jam_operasi_kembali ?></td>
                                              <td><?php echo $bd->HM ?></td>
                                              <td><?php echo $bd->KM ?></td>
                                              <td><?php echo $bd->Lokasi ?></td>
                                              <td><?php echo $bd->Keterangan ?></td>
                                          </tr>
                                      <?php endforeach; ?>
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <td>Menu Admin</td>
                                          <td>Id</td>
                                          <td>Timestamp</td>
                                          <td>Nomer Unit</td>
                                          <td>NRP Operator</td>
                                          <td>Shift kerja</td>
                                          <td>Problem</td>
                                          <td>Jam Breakdown</td>
                                          <td>Jam Pengerjaan</td>
                                          <td>Selesai Pengerjaan</td>
                                          <td>Jam Operasi Kembali</td>
                                          <td>HM</td>
                                          <td>KM</td>
                                          <td>Lokasi</td>
                                          <td>Keterangan</td>
                                      </tr>
                                  </tfoot>
                              </table>
                          </div>
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