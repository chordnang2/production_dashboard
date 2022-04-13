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
                              DATA REKONSIL PRODUKSI
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <td>NO</td>
                                          <td>Date</td>
                                          <td>Coalpad 1 ICF</td>
                                          <td>Coalpad 2</td>
                                          <td>Coalpad 3 ICF</td>
                                          <td>Coalpad 3</td>
                                          <td>Coalpad 3 A</td>
                                          <td>ICF</td>
                                          <td>Panel 1 ICF</td>
                                          <td>Silo</td>
                                          <td>Total</td>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $i = 1;
                                        foreach ($rh as $hgwba) : ?>
                                          <tr>
                                              <td><?= $i++ ?></td>
                                              <td><?php echo $hgwba->date  ?></td>
                                              <td><?php echo $hgwba->c1f  ?></td>
                                              <td><?php echo $hgwba->c2 ?></td>
                                              <td><?php echo $hgwba->c3l ?></td>
                                              <td><?php echo $hgwba->c3 ?></td>
                                              <td><?php echo $hgwba->c3a ?></td>
                                              <td><?php echo $hgwba->i ?></td>
                                              <td><?php echo $hgwba->p1i ?></td>
                                              <td><?php echo $hgwba->s ?></td>
                                              <td><?php echo $hgwba->total ?></td>
                                          </tr>
                                      <?php endforeach; ?>
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <td>NO</td>
                                          <td>Date</td>
                                          <td>Coalpad 1 ICF</td>
                                          <td>Coalpad 2</td>
                                          <td>Coalpad 3 ICF</td>
                                          <td>Coalpad 3</td>
                                          <td>Coalpad 3 A</td>
                                          <td>ICF</td>
                                          <td>Panel 1 ICF</td>
                                          <td>Silo</td>
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