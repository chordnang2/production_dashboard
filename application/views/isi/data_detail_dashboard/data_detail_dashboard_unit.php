 <div class="content-wrapper">
   <section class="content">
     <div class="container-fluid">
       <br>

       <div class="col-12">
         <div class="card">
           <div class="card-header">
             <?php echo form_open('Isi_geofence/detail_unit'); ?>
             <div class="col-md-2">
               <div class="form-group">
                 <label>Date</label>
                 <select class="form-control select2" name="kemaren" style="width: 100%;">
                   <option selected="selected"></option>
                   <?php foreach ($group_by_time_in as $gb) : ?>
                     <option><?php echo $gb->count ?></option>
                   <?php endforeach; ?>
                 </select>
               </div>
             </div>
             <div class="col-md-2">
               <div class="form-group">
                 <label>Unit</label>
                 <select class="form-control select2" name="unit" style="width: 100%;">
                   <option selected="selected"></option>
                   <?php foreach ($grup_unit as $gu) : ?>
                     <option><?php echo $gu->unit ?></option>
                   <?php endforeach; ?>
                 </select>
               </div>
             </div>
             <div class="col-md-2">
               <input type="submit" value="Cari"></input>
             </div>
             <?php echo form_close() ?>
           </div>
         </div>
       </div>



       <div class="col-12">
         <?php foreach ($all as $trip => $value) { ?>
           <div class="card">
             <div class="card-header">
               <h2 class="card-title"><?php echo $trip; ?></h2>
               <!-- <h3><?php echo $trip; ?> </h3> -->
               <div class="card-tools">
                 <button type="button" class="btn btn-tool" data-card-widget="collapse">
                   <i class="fas fa-minus"></i>
                 </button>
               </div>
             </div>
             <div class="card-body ">
               <table class="table table-hover text-nowrap">
                 <thead>
                   <tr>
                     <th>No</th>
                     <th>Unit</th>
                     <th>Time In</th>
                     <th>Time Out</th>
                     <th>Durasi</th>
                     <th>Geofence</th>
                     <th>Tipe</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php $i = 1 ?>

                   <?php foreach ($value as $key2 => $value) { ?>
                     <tr>
                       <th><?= $i++ ?></th>
                       <th> <?php echo $value['unit'] ?></th>
                       <th> <?php echo $value['time_in'] ?> </th>
                       <th> <?php echo $value['time_out'] ?> </th>
                       <th> <?php echo $value['duration'] ?> </th>
                       <th> <?php echo $value['geofence'] ?></th>
                       <th> <?php echo $value['tipe'] ?></th>
                     </tr>
                   <?php } ?>

                 </tbody>
               </table>

             </div>

           </div>
         <?php } ?>

         <!-- /.row -->
       </div><!-- /.container-fluid -->
   </section>
 </div><!-- /.container-fluid -->
 </section>