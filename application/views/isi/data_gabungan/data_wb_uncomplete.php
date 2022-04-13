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
                              DATA TIMBANGAN UNCOMPLETE
                              <br>
                              <a href="<?php echo site_url('isi_wb/add_wb') ?>"><i class="fas fa-plus"></i>
                                  <h3 class="card-title">Tambah Data Wb</h3>
                                  <br>
                              </a>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <td>NO</td>
                                          <td>No Unit</td>
                                          <td>Loading Point</td>
                                          <td>Weighbridge</td>
                                          <td>Time in</td>
                                          <td>Date</td>
                                          <td>Menu Admin</td>
                                          <!-- <td>No</td>
                                          <td>Shift</td>
                                          <td>Tipe Vessel</td>
                                          <td>Type</td>
                                          <td>Nomer Transaksi</td>
                                          <td>Gross</td>
                                          <td>Tare</td>
                                          <td>Nett</td>
                                        
                                          <td>Time out</td>
                                          <td>Tipping</td>
                                          <td>Remaks</td>
                                          <td>Target</td>
                                          <td>Percentage</td>
                                          <td>Loss Weight</td>
                                          <td>Keterangan</td>
                                          <td>Status</td>
                                          -->

                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $i = 1 ?>
                                      <?php foreach ($wb as $wba) : ?>
                                          <tr>
                                              <td><?php echo $i++ ?></td>
                                              <td><?php echo $wba->no_unit ?></td>
                                              <td><?php echo $wba->loading_point ?></td>
                                              <td><?php echo $wba->weighbridge ?></td>
                                              <td><?php echo $wba->time_in ?></td>
                                              <td><?php echo $wba->date ?></td>
                                              <td>
                                                  <a href="<?= base_url() ?>isi_wb/edit_uncomplete/<?= $wba->no_transaction ?>" class="btn btn-small"><i class="fas fa-edit"></i> Ubah</a>
                                                  <a href="<?= base_url() ?>isi_wb/delete_wb_u/<?= $wba->id_wb ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i>Hapus</a>
                                              </td>

                                              <!-- <td><?php echo $wba->shift ?></td>
                                              <td><?php echo $wba->tipe_vessel ?></td>
                                              <td><?php echo $wba->type ?></td>
                                              <td><?php echo $wba->no_transaction ?></td>
                                              <td><?php echo $wba->gross ?></td>
                                              <td><?php echo $wba->tare ?></td>
                                              <td><?php echo $wba->nett ?></td>
                                     
                                              <td><?php echo $wba->time_out ?></td>
                                              <td><?php echo $wba->tipping ?></td>
                                              <td><?php echo $wba->remaks ?></td>
                                              <td><?php echo $wba->target ?></td>
                                              <td><?php echo $wba->precentage ?></td>
                                              <td><?php echo $wba->loss_weight ?></td>
                                              <td><?php echo $wba->keterangan ?></td>
                                              <td><?php echo $wba->status ?></td>
                                          -->


                                          </tr>
                                      <?php endforeach; ?>
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <td>No</td>
                                          <td>No Unit</td>
                                          <td>Loading Point</td>
                                          <td>Weighbridge</td>
                                          <td>Time in</td>
                                          <td>Date</td>
                                          <td>Menu Admin</td>
                                          <!-- <td>Shift</td>
                                      
                                          <td>Tipe Vessel</td>
                                          <td>Type</td>
                                          <td>Nomer Transaksi</td>
                                          <td>Gross</td>
                                          <td>Tare</td>
                                          <td>Nett</td>
                                        
                                          <td>Time out</td>
                                          <td>Tipping</td>
                                          <td>Remaks</td>
                                          <td>Target</td>
                                          <td>Percentage</td>
                                          <td>Loss Weight</td>
                                          <td>Keterangan</td>
                                          <td>Status</td>
                                           -->

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