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





                             <?php echo form_open('Isi_wb'); ?>

                             <!-- <label for="inputEmail3" class="col-sm-2 col-form-label"></label> -->
                             <div class="form-group row">
                                 <div class="col-sm-2">
                                     Pilih Tanggal,Bulan,Tahun
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-sm-1">
                                     <select class="form-control select2" name="tanggal" style="width: 100%;">
                                         <option selected="selected"></option>
                                         <?php foreach ($tanggal as $tanggal) : ?>
                                             <option><?php echo $tanggal->tanggal ?></option>
                                         <?php endforeach; ?>
                                     </select>
                                 </div>
                                 <div class="col-sm-1">
                                     <select class="form-control select2" name="bulan" style="width: 100%;">
                                         <option selected="selected"></option>
                                         <?php foreach ($bulan as $bulan) : ?>
                                             <option><?php echo $bulan->bulan ?></option>
                                         <?php endforeach; ?>
                                     </select>
                                 </div>
                                 <div class="col-sm-1">
                                     <select class="form-control select2" name="tahun" style="width: 100%;">
                                         <option selected="selected"></option>
                                         <?php foreach ($tahun as $tahun) : ?>
                                             <option><?php echo $tahun->tahun ?></option>
                                         <?php endforeach; ?>
                                     </select>
                                 </div>
                                 <div class="col-sm-1">
                                     <button style="width: 100%;" type="submit" class="btn btn-info">Cari</button>
                                     <?php echo form_close() ?>
                                 </div>
                             </div>

                             <!-- /.card-body -->

                         </div>

                         <!-- /.card-header -->
                         <div class="card-body">
                             <table id="example1" class="table table-bordered table-striped">
                                 <thead>
                                     <tr>
                                         <td> </td>
                                         <td>Menu Admin</td>
                                         <td>No</td>
                                         <td>Date</td>
                                         <td>Shift</td>
                                         <td>No Unit</td>
                                         <td>Tipe Vessel</td>
                                         <td>Loading Point</td>
                                         <td>Type</td>
                                         <td>Weighbridge</td>
                                         <td>Nomer Transaksi</td>
                                         <td>Gross</td>
                                         <td>Tare</td>
                                         <td>Nett</td>
                                         <td>Time in</td>
                                         <td>Time out</td>
                                         <td>Tipping</td>
                                         <td>Remaks</td>
                                         <td>Target</td>
                                         <td>Percentage</td>
                                         <td>Loss Weight</td>
                                         <td>Keterangan</td>
                                         <td>Status</td>


                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $i = 1 ?>
                                     <?php foreach ($wb as $wba) : ?>
                                         <tr>
                                             <td> </td>
                                             <td>
                                                 <a href="<?= base_url() ?>isi_wb/edit/<?= $wba->no_transaction ?>" class="btn btn-small"><i class="fas fa-edit"></i> Ubah</a>
                                                 <a href="<?= base_url() ?>isi_wb/delete_wb/<?= $wba->id_wb ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i>Hapus</a>
                                             </td>
                                             <td><?php echo $i++ ?></td>
                                             <td><?php echo $wba->date ?></td>
                                             <td><?php echo $wba->shift ?></td>
                                             <td><?php echo $wba->no_unit ?></td>
                                             <td><?php echo $wba->tipe_vessel ?></td>
                                             <td><?php echo $wba->loading_point ?></td>
                                             <td><?php echo $wba->type ?></td>
                                             <td><?php echo $wba->weighbridge ?></td>
                                             <td><?php echo $wba->no_transaction ?></td>
                                             <td><?php echo $wba->gross ?></td>
                                             <td><?php echo $wba->tare ?></td>
                                             <td><?php echo $wba->nett ?></td>
                                             <td><?php echo $wba->time_in ?></td>
                                             <td><?php echo $wba->time_out ?></td>
                                             <td><?php echo $wba->tipping ?></td>
                                             <td><?php echo $wba->remaks ?></td>
                                             <td><?php echo $wba->target ?></td>
                                             <td><?php echo $wba->precentage ?></td>
                                             <td><?php echo $wba->loss_weight ?></td>
                                             <td><?php echo $wba->keterangan ?></td>
                                             <td><?php echo $wba->status ?></td>



                                         </tr>
                                     <?php endforeach; ?>
                                 </tbody>
                                 <tfoot>
                                     <tr>
                                         <td> </td>
                                         <td>Menu Admin</td>
                                         <td>No</td>
                                         <td>Date</td>
                                         <td>Shift</td>
                                         <td>No Unit</td>
                                         <td>Tipe Vessel</td>
                                         <td>Loading Point</td>
                                         <td>Type</td>
                                         <td>Weighbridge</td>
                                         <td>Nomer Transaksi</td>
                                         <td>Gross</td>
                                         <td>Tare</td>
                                         <td>Nett</td>
                                         <td>Time in</td>
                                         <td>Time out</td>
                                         <td>Tipping</td>
                                         <td>Remaks</td>
                                         <td>Target</td>
                                         <td>Percentage</td>
                                         <td>Loss Weight</td>
                                         <td>Keterangan</td>
                                         <td>Status</td>


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