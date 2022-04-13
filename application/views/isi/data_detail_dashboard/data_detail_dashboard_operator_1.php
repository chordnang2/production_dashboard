<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <br>
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <?php echo form_open('P_operator/select_nrp'); ?>
            <div class="col-md-2">
              <div class="form-group">
                <label>Date</label>
                <select class="form-control select2" name="" style="width: 100%;">
                  <option selected="selected"></option>
                  <!-- <?php foreach ($gn as $g) : ?>
                    <option><?php echo $g->nrp ?></option>
                  <?php endforeach; ?> -->
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label>Unit</label>
                <select class="form-control select2" name="nrp" style="width: 100%;">
                  <option selected="selected"></option>
                  <?php foreach ($gn as $g) : ?>
                    <option><?php echo $g->nrp ?></option>
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
        <div class="card">
          <div class="card-header">
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
                  <th>NO</th>
                  <th>NRP</th>
                  <th>NAMA OPERATOR</th>
                  <th>JUMLAH TRIP</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 ?>
                <?php $nrp_pegangan = $cb[0]->count ?>
                <?php $nrp_gantungan = $cg[0]->count ?>
                <tr>
                  <th> <?= $i++ ?></th>
                  <th> <?php echo $cb[0]->nrp ?> </th>
                  <th> <?php echo $cb[0]->nama_operator  ?> </th>
                  <th> <?php echo ($nrp_pegangan - $nrp_gantungan) + ($nrp_gantungan * (1 / 2)) ?> </th>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>



  </section>
</div><!-- /.container-fluid -->
</section>