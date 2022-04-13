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
                              <a href="<?php echo site_url('isi_timbangan/add_timbangan') ?>"><i class="fas fa-plus"></i>
                                  <h3 class="card-title">Tambah Data Timbangan</h3>
                                  <br>

                              </a>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <td>Menu Admin</td>
                                          <td>NRP 1</td>
                                          <td>Nama 1</td>
                                          <td>NRP 2</td>
                                          <td>Nama 2</td>
                                          <td>No Unit</td>
                                          <td>Id Vessel</td>
                                          <td>Date</td>
                                          <td>Time_in</td>
                                          <td>Time_out</td>
                                          <td>Dari</td>
                                          <td>Ke</td>
                                          <td>Bruto</td>
                                          <td>Net</td>
                                          <td>Kosongan</td>
                                          <td>Km Awal</td>
                                          <td>Km Akhir</td>
                                          <td>Hm Awal</td>
                                          <td>Hm Akhir</td>
                                          <td>Trip ke</td>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php foreach ($data_timbangan as $timbangan) : ?>
                                          <tr>
                                              <td>
                                                  <a href="<?= base_url() ?>isi_timbangan/edit_timbangan/<?= $timbangan->id_timbangan ?>" class="btn btn-small"><i class="fas fa-edit"></i> Ubah</a>
                                                  <a href="<?= base_url() ?>isi_timbangan/delete_timbangan/<?= $timbangan->id_timbangan ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i>Hapus</a>
                                              </td>
                                              <td><?php echo $timbangan->nrp ?></td>
                                              <td><?php echo $timbangan->nrp_nama ?></td>
                                              <td><?php echo $timbangan->nrp_peganagan ?></td>
                                              <td><?php echo $timbangan->nrp_peganagan_nama ?></td>
                                              <td><?php echo $timbangan->no_unit ?></td>
                                              <td><?php echo $timbangan->id_vessel ?></td>
                                              <td><?php echo $timbangan->date ?></td>
                                              <td><?php echo $timbangan->time_in ?></td>
                                              <td><?php echo $timbangan->time_out ?></td>
                                              <td><?php echo $timbangan->dari ?></td>
                                              <td><?php echo $timbangan->ke ?></td>
                                              <td><?php echo $timbangan->berat_kotor ?></td>
                                              <td><?php echo $timbangan->berat_bersih ?></td>
                                              <td><?php echo $timbangan->berat_kosongan ?></td>
                                              <td><?php echo $timbangan->km_awal ?></td>
                                              <td><?php echo $timbangan->km_akhir ?></td>
                                              <td><?php echo $timbangan->hm_awal ?></td>
                                              <td><?php echo $timbangan->hm_akhir ?></td>
                                              <td><?php echo $timbangan->trip ?></td>
                                          </tr>
                                      <?php endforeach; ?>
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <td>Menu Admin</td>
                                          <td>NRP Pegangan</td>
                                          <td>Nama Operator</td>
                                          <td>NRP Pengangan</td>
                                          <td>Nama</td>
                                          <td>No Unit</td>
                                          <td>Id Vessel</td>
                                          <td>Date</td>
                                          <td>Time_in</td>
                                          <td>Time_out</td>
                                          <td>Dari</td>
                                          <td>Ke</td>
                                          <td>Bruto</td>
                                          <td>Net</td>
                                          <td>Kosongan</td>
                                          <td>Km Awal</td>
                                          <td>Km Akhir</td>
                                          <td>Hm Awal</td>
                                          <td>Hm Akhir</td>
                                          <td>Trip ke</td>
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