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
                              ANALISA PRODUKSI
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <td>NO</td>
                                          <td>Date</td>
                                          <td>Loading Point</td>
                                          <td>SCANIA sst 82-82</td>
                                          <td>VOLVO sdt 85-115</td>
                                          <td>VOLVO sst 105-120</td>
                                          <td>VOLVO sst 82-120</td>
                                          <td>Total</td>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $i = 1;
                                        foreach ($ap as $hgwba) : ?>
                                          <tr>
                                              <td><?= $i++ ?></td>
                                              <td><?php echo $hgwba->date  ?></td>
                                              <td><?php echo $hgwba->loading_point  ?></td>
                                              <td><?php echo $hgwba->sca8282 ?></td>
                                              <td><?php echo $hgwba->vol85115 ?></td>
                                              <td><?php echo $hgwba->vol105120 ?></td>
                                              <td><?php echo $hgwba->vol82120 ?></td>
                                              <td><?php echo $hgwba->total ?></td>
                                          </tr>
                                      <?php endforeach; ?>
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <td>NO</td>
                                          <td>Date</td>
                                          <td>Loading Point</td>
                                          <td>SCANIA sst 82-82</td>
                                          <td>VOLVO sdt 85-115</td>
                                          <td>VOLVO sst 105-120</td>
                                          <td>VOLVO sst 82-120</td>
                                          <td>Total</td>
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