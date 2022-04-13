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
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <?php echo $jum_ri_shift1; ?>
                                          <?php echo $jum_net_shift1; ?>
                                          <?php echo $jum_unit_rfu; ?>
                                          <?php
                                            $averitase = $jum_ri_shift1 / $jum_unit_rfu;
                                            echo number_format($averitase, 2, '.', '')
                                            ?>
                                          <?php echo $jum_silo_shift1; ?>
                                          <?php echo $jum_coalpad2_shift1; ?>
                                          <?php echo $jum_coalpad3a__shift1; ?>
                                          <?php echo $jum_coalpad2_shift1; ?>
                                          <?php echo $jum_coalpad3_shift1; ?>
                                          <?php echo $jum_icfrom1_shift1; ?>
                                          <?php echo $jum_panel1icf_shift1; ?>
                                          <?php echo $jum_f31icf_shift1; ?>
                                          <?php echo $jum_coalpadfsp_shift1; ?>
                                          <?php echo $jum_underload_shift1; ?>
                                          <?php $percent = $jum_underload_shift1 / $jum_ri_shift1 * 100;
                                            echo number_format($percent, 0, '.', '') . '%';
                                            ?>
                                          <?php echo $under_silo_shift1; ?>
                                          <?php echo $under_silo_minus_shift1; ?>
                                          <?php echo $under_coalpad2lh_shift1; ?>
                                          <?php echo $under_coalpad2lh_minus_shift1; ?>
                                          <?php echo $under_coalpad3a_shift1; ?>
                                          <?php echo $under_coalpad3a_minus_shift1; ?>
                                          <?php echo $under_coalpad2_shift1; ?>
                                          <?php echo $under_coalpad2_minus_shift1; ?>
                                          <?php echo $under_coalpad3_shift1; ?>
                                          <?php echo $under_coalpad3_minus_shift1; ?>
                                          <?php echo $under_icfrom1_shift1; ?>
                                          <?php echo $under_icfrom1_minus_shift1; ?>
                                          <?php echo $under_panel1icf_shift1; ?>
                                          <?php echo $under_panel1icf_minus_shift1; ?>
                                          <?php echo $under_f31icf_shift1; ?>
                                          <?php echo $under_f31icf_minus_shift1; ?>
                                          <?php echo $under_coalpadfsp_shift1; ?>
                                          <?php echo $under_coalpadfsp_minus_shift1; ?>

                                      </tr>
                                  </thead>
                                  <tbody>

                                  </tbody>
                                  <tfoot>
                                      <tr>

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