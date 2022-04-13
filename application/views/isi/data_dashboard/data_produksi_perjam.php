 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <!-- <?php date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
    $now = date('H:m');
    $jam_sebelum_shif1 = date('07:00');
    $jam_selesai_shif1 = date('18:59');
    $jam_sebelum_shif2 = date('19:00');
    $jam_selesai_shif2 = date('06:59'); ?>
   <?= $now ?>
   <?= $jam_sebelum_shif1 ?>
   <?= $jam_selesai_shif1 ?>
   <?= $jam_sebelum_shif2 ?>
   <?= $jam_selesai_shif2 ?> -->
   <!-- /.content-header -->
   
<br>
   <!-- Main content -->
   <div class="content">
     <div class="container-fluid">
       <div class="row">
       <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Online Store Visitors</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">820</span>
                    <span>Visitors Over Time</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 12.5%
                    </span>
                    <span class="text-muted">Since last week</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="visitors-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This Week
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last Week
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Products</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Sales</th>
                    <th>More</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Some Product
                    </td>
                    <td>$13 USD</td>
                    <td>
                      <small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i>
                        12%
                      </small>
                      12,000 Sold
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Another Product
                    </td>
                    <td>$29 USD</td>
                    <td>
                      <small class="text-warning mr-1">
                        <i class="fas fa-arrow-down"></i>
                        0.5%
                      </small>
                      123,234 Sold
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Amazing Product
                    </td>
                    <td>$1,230 USD</td>
                    <td>
                      <small class="text-danger mr-1">
                        <i class="fas fa-arrow-down"></i>
                        3%
                      </small>
                      198 Sold
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Perfect Item
                      <span class="badge bg-danger">NEW</span>
                    </td>
                    <td>$199 USD</td>
                    <td>
                      <small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i>
                        63%
                      </small>
                      87 Sold
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
         <div class="col-lg-6">
           <div class="card">
             <div class="card-header border-0">
               <div class="d-flex justify-content-between">
                 <h3 class="card-title">Monitoring Produksi</h3>
                 <!-- <a href="javascript:void(0);">View Report</a> -->
               </div>
             </div>
             <div class="card-body">
               <div class="d-flex">
                 <p class="d-flex flex-column">
                   <!-- <span class="text-bold text-lg">820</span>
                    <span>Visitors Over Time</span> -->
                 </p>
                 <p class="ml-auto d-flex flex-column text-right">
                   <span class="text-success">
                     <!-- <i class="fas fa-arrow-up"></i> 12.5% -->
                   </span>
                   <!-- <span class="text-muted">Since last week</span> -->
                 </p>
               </div>
               <!-- /.d-flex -->

               <div class="position-relative mb-4">
                 <?php if ($now > $jam_sebelum_shif1 && $now < $jam_selesai_shif1) { ?>
                   <canvas id="speedChart" height="100" widht=""></canvas>
                 <?php } else if ($now > $jam_sebelum_shif2 && $now < $jam_selesai_shif2) { ?>
                   <canvas id="speedChartmalam" height="100" widht=""></canvas>
                 <?php } else {
                  }; ?>
               </div>

               <div class="d-flex flex-row justify-content-end">
                 <span class="mr-2">
                   <!-- <i class="fas fa-square text-primary"></i> This Week -->
                 </span>

                 <span>
                   <!-- <i class="fas fa-square text-gray"></i> Last Week -->
                 </span>
               </div>
             </div>
           </div>
           <!-- /.card -->
<?php var_dump($rt2)?>;
           <div class="card">
             <div class="card-header border-0">
               <div class="d-flex justify-content-between">
                 <h3 class="card-title">Average Ritasi</h3>
                 <!-- <a href="javascript:void(0);">View Report</a> -->
               </div>
             </div>
             <div class="card-body">
               <div class="d-flex">
                 <p class="d-flex flex-column">
                   <!-- <span class="text-bold text-lg">820</span>
                    <span>Visitors Over Time</span> -->
                 </p>
                 <p class="ml-auto d-flex flex-column text-right">
                   <span class="text-success">
                     <!-- <i class="fas fa-arrow-up"></i> 12.5% -->
                   </span>
                   <!-- <span class="text-muted">Since last week</span> -->
                 </p>
               </div>
               <!-- /.d-flex -->

               <div class="position-relative mb-4">
                 <?php if ($now > $jam_sebelum_shif1 && $now < $jam_selesai_shif1) { ?>
                   <canvas id="ritasi" height="100" widht=""></canvas>
                 <?php } else if ($now > $jam_sebelum_shif2 && $now < $jam_selesai_shif2) { ?>
                   <canvas id="ritasimalam" height="100" widht=""></canvas>
                 <?php } else {
                  }; ?>
               </div>

               <div class="d-flex flex-row justify-content-end">
                 <span class="mr-2">
                   <!-- <i class="fas fa-square text-primary"></i> This Week -->
                 </span>

                 <span>
                   <!-- <i class="fas fa-square text-gray"></i> Last Week -->
                 </span>
               </div>
             </div>
           </div>
           <!-- /.card -->
         </div>
         <!-- /.col-md-6 -->
         <div class="col-lg-6">
           <div class="card">
             <div class="card-header border-0">
               <div class="d-flex justify-content-between">
                 <h3 class="card-title">Trip per lokasi</h3>
                 <!-- <a href="javascript:void(0);">View Report</a> -->
               </div>
             </div>
             <div class="card-body">
               <div class="d-flex">
                 <p class="d-flex flex-column">
                   <!-- <span class="text-bold text-lg">820</span>
                    <span>Visitors Over Time</span> -->
                 </p>
                 <p class="ml-auto d-flex flex-column text-right">
                   <span class="text-success">
                     <!-- <i class="fas fa-arrow-up"></i> 12.5% -->
                   </span>
                   <!-- <span class="text-muted">Since last week</span> -->
                 </p>
               </div>
               <!-- /.d-flex -->

               <div class="position-relative mb-4">
               <?php if ($now > $jam_sebelum_shif1 && $now < $jam_selesai_shif1) { ?>
                   <canvas id="triplokasi" height="100" widht=""></canvas>
                 <?php } else if ($now > $jam_sebelum_shif2 && $now < $jam_selesai_shif2) { ?>
                   <canvas id="triplokasimalam" height="100" widht=""></canvas>
                 <?php } else {
                  }; ?>
               </div>

               <div class="d-flex flex-row justify-content-end">
                 <span class="mr-2">
                   <!-- <i class="fas fa-square text-primary"></i> This Week -->
                 </span>

                 <span>
                   <!-- <i class="fas fa-square text-gray"></i> Last Week -->
                 </span>
               </div>
             </div>
           </div>
           <!-- /.card -->

           <div class="card">
             <div class="card-header border-0">
               <div class="d-flex justify-content-between">
                 <h3 class="card-title">Underload per lokasi</h3>
                 <!-- <a href="javascript:void(0);">View Report</a> -->
               </div>
             </div>
             <div class="card-body">
               <div class="d-flex">
                 <p class="d-flex flex-column">
                   <!-- <span class="text-bold text-lg">820</span>
                    <span>Visitors Over Time</span> -->
                 </p>
                 <p class="ml-auto d-flex flex-column text-right">
                   <span class="text-success">
                     <!-- <i class="fas fa-arrow-up"></i> 12.5% -->
                   </span>
                   <!-- <span class="text-muted">Since last week</span> -->
                 </p>
               </div>
               <!-- /.d-flex -->

               <div class="position-relative mb-4">
               <?php if ($now > $jam_sebelum_shif1 && $now < $jam_selesai_shif1) { ?>
                   <canvas id="underload" height="100" widht=""></canvas>
                 <?php } else if ($now > $jam_sebelum_shif2 && $now < $jam_selesai_shif2) { ?>
                   <canvas id="underloadmalam" height="100" widht=""></canvas>
                 <?php } else {
                  }; ?>
               </div>

               <div class="d-flex flex-row justify-content-end">
                 <span class="mr-2">
                   <!-- <i class="fas fa-square text-primary"></i> This Week -->
                 </span>

                 <span>
                   <!-- <i class="fas fa-square text-gray"></i> Last Week -->
                 </span>
               </div>
             </div>
           </div>
         </div>
         <!-- /.col-md-6 -->
       </div>
       <!-- /.row -->
     </div>
     <!-- /.container-fluid -->
   </div>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
   <!-- Control sidebar content goes here -->
 </aside>
 <!-- /.control-sidebar -->