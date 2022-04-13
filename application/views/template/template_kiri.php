  <!-- Main Sidebar Container -->

  <aside class="main-sidebar sidebar-dark-primary elevation-4">

      <!-- Brand Logo -->

      <a href="<?= base_url('isi_timbangan/produksiperjam'); ?>" class="brand-link">

          <!-- <img src="<?= base_url(); ?>assets/img/mhaicon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->

          <span class="brand-text font-weight-light">Dashboard Produksi</span>

      </a>

      <?php



        date_default_timezone_set('Asia/Singapore');

        $t = strtotime("today");

        $y = strtotime("yesterday");

        $hariini = date("Y-m-d", $t);

        $kemaren = date("Y-m-d", $y);



        $jamini = date("H");

        $menitini = date("m", $t);

        $detikini = date("s", $t);





        if ($jamini >= 00 && $jamini < 07) {

            $a =  $kemaren;
        } else {

            $a =  $hariini;
        }

        ?>



      <div class="sidebar">



          <?php $current_url = current_url() ?>

          <?php

            $activedbtimbangan = '';

            $activedatatimbangan = '';

            $activedatagunungsari = '';

            $activeproduksisenyiur = '';

            $activeproduksigunungsari = '';

            $activeexcelwb = '';

            if ($current_url == base_url('isi_highlight/pro_jam')) {

                $itemtimbangan = 'nav-item menu-is-opening menu-open';

                $item2timbangan = 'active';

                $activedbtimbangan = 'active';
            } else if ($current_url == base_url('isi_wb/loadajaxhanson')) {

                $itemtimbangan = 'nav-item menu-is-opening menu-open';

                $item2timbangan = 'active';

                $activedatatimbangan = 'active';
            } else if ($current_url == base_url('isi_wb/loadajaxhanson_gunungsari')) {

                $itemtimbangan = 'nav-item menu-is-opening menu-open';

                $item2timbangan = 'active';

                $activedatagunungsari = 'active';
            } else if ($current_url == base_url('isi_highlight/pro_cek_bulan')) {

                $itemtimbangan = 'nav-item menu-is-opening menu-open';

                $item2timbangan = 'active';

                $activeproduksisenyiur = 'active';
            } else if ($current_url == base_url('isi_highlight/pro_cek_bulan_gunungsari')) {

                $itemtimbangan = 'nav-item menu-is-opening menu-open';

                $item2timbangan = 'active';

                $activeproduksigunungsari = 'active';
            } else {

                $itemtimbangan = '';

                $item2timbangan = '';

                $activedbtimbangan = '';

                $activedatatimbangan = '';

                $activecekdatawb = '';

                $activeexcelwb = '';
            } ?>

          <?php

            $activedbrunning = '';

            $activebdunit = '';

            $activestatusunit = '';

            if ($current_url == base_url('isi_highlight/produktifitas_unit_asli')) {

                $itemunit = 'nav-item menu-is-opening menu-open';

                $item2unit = 'active';

                $activedbrunning = 'active';
            } else if ($current_url == base_url('Isi_bd_dispatch/loadajaxhanson?date=' . $a)) {

                $itemunit = 'nav-item menu-is-opening menu-open';

                $item2unit = 'active';

                $activebdunit = 'active';
            } else if ($current_url == base_url('Isi_unit_running')) {

                $itemunit = 'nav-item menu-is-opening menu-open';

                $item2unit = 'active';

                $activestatusunit = 'active';
            } else {

                $itemunit = '';

                $item2unit = '';

                $activedbrunning = '';

                $activebdunit = '';

                $activestatusunit = '';
            } ?>

          <?php

            $activedbunitavg = '';

            $activehmunit = '';

            $activeuploadhm = '';

            $activehgunit = '';

            $activeuploadhg = '';

            $activedmbd = '';

            $activeuploaddmbd = '';

            if ($current_url == base_url('isi_highlight/produktifitas_unit_hm_hg')) {

                $itemunit2 = 'nav-item menu-is-opening menu-open';

                $item2unit2 = 'active';

                $activedbunitavg = 'active';
            } else if ($current_url == base_url('Hm_controller/crud_hm')) {

                $itemunit2 = 'nav-item menu-is-opening menu-open';

                $item2unit2 = 'active';

                $activehmunit = 'active';
            } else if ($current_url == base_url('Hm_controller/form')) {

                $itemunit2 = 'nav-item menu-is-opening menu-open';

                $item2unit2 = 'active';

                $activeuploadhm = 'active';
            } else if ($current_url == base_url('Isi_highlight/hasil_upload_hg')) {

                $itemunit2 = 'nav-item menu-is-opening menu-open';

                $item2unit2 = 'active';

                $activehgunit = 'active';
            } else if ($current_url == base_url('Isi_highlight/form')) {

                $itemunit2 = 'nav-item menu-is-opening menu-open';

                $item2unit2 = 'active';

                $activeuploadhg = 'active';
            } else if ($current_url == base_url('Dmbd_controller')) {

                $itemunit2 = 'nav-item menu-is-opening menu-open';

                $item2unit2 = 'active';

                $activedmbd = 'active';
            } else if ($current_url == base_url('Dmbd_controller/form')) {

                $itemunit2 = 'nav-item menu-is-opening menu-open';

                $item2unit2 = 'active';

                $activeuploaddmbd = 'active';
            } else {

                $itemunit2 = '';

                $item2unit2 = '';

                $activedbunitavg = '';

                $activehmunit = '';

                $activeuploadhm = '';

                $activehgunit = '';

                $activeuploadhg = '';

                $activedmbd = '';

                $activeuploaddmbd = '';
            } ?>

          <?php

            $activedbopt = '';

            $activeketersediaanopt = '';

            $activedataopt = '';

            $activepayroll = '';

            $activeuploadpayroll = '';

            if ($current_url == base_url('Pro_operator_controller/pro_opt')) {

                $itemopt = 'nav-item menu-is-opening menu-open';

                $itemopt2 = 'active';

                $activedbopt = 'active';
            } else if ($current_url == base_url('Pro_operator_controller/ketersediaan_opt')) {

                $itemopt = 'nav-item menu-is-opening menu-open';

                $itemopt2 = 'active';

                $activeketersediaanopt = 'active';
            } else if ($current_url == base_url('Pro_operator_controller/ketersediaan_opt_detail')) {

                $itemopt = 'nav-item menu-is-opening menu-open';

                $itemopt2 = 'active';

                $activedataopt = 'active';
            } else if ($current_url == base_url('Pro_operator_controller')) {

                $itemopt = 'nav-item menu-is-opening menu-open';

                $itemopt2 = 'active';

                $activepayroll = 'active';
            } else if ($current_url == base_url('Pro_operator_controller/form')) {

                $itemopt = 'nav-item menu-is-opening menu-open';

                $itemopt2 = 'active';

                $activeuploadpayroll = 'active';
            } else {

                $itemopt = '';

                $itemopt2 = '';

                $activedbopt = '';

                $activeketersediaanopt = '';

                $activedataopt = '';

                $activepayroll = '';

                $activeuploadpayroll = '';
            } ?>









          <?php if ($this->session->userdata('username') == "admin") { ?>

          <div class="user-panel mt-3 pb-3 mb-3 d-flex">

              <div class="info">

                  <a href="#" class="d-block">SELAMAT DATANG ADMIN</a>

              </div>

          </div>

          <nav class="mt-2">

              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                  <!-- Add icons to the links using the .nav-icon class

               with font-awesome or any other icon font library -->

                  <li class="nav-item ">

                      <a href="#" class="nav-link">

                          <i class="nav-icon fas fa-tachometer-alt"></i>

                          <p>

                              Dashboard

                              <i class="right fas fa-angle-left"></i>

                          </p>

                      </a>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('isi_highlight/pro_jam'); ?>" class="nav-link">

                                  <i class="nav-icon fas fa-chart-pie"></i>

                                  <p>Produksi Hourly </p>

                              </a>

                          </li>

                          <li class="nav-item">

                              <a href="<?= base_url('isi_highlight/produktifitas_unit_asli'); ?>" class="nav-link">

                                  <i class="far fa-circle nav-icon"></i>

                                  <p>Produktifitas Unit </p>

                              </a>

                          </li>

                          <li class="nav-item">

                              <a href="<?= base_url('p_operator/all_nrp'); ?>" class="nav-link">

                                  <i class="far fa-circle nav-icon"></i>

                                  <p>Produktifitas Operator </p>

                              </a>

                          </li>

                      </ul>

                  </li>

                  <!-- widget -->

                  <li class="nav-item">

                      <a href="#" class="nav-link">

                          <i class="nav-icon fas fa-copy"></i>

                          <p>

                              Master Data Statis

                              <i class="fas fa-angle-left right"></i>

                              <span class="badge badge-info right"></span>

                          </p>

                      </a>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('isi_operator/operator') ?>" class="nav-link">

                                  <i class="far fa-circle nav-icon"></i>

                                  <p>Data Operator</p>

                              </a>

                          </li>

                          <li class="nav-item">

                              <a href="<?= base_url('isi_unit/unit') ?>" class="nav-link">

                                  <i class="far fa-circle nav-icon"></i>

                                  <p>Data Unit</p>

                              </a>

                          </li>

                          <li class="nav-item">

                              <a href="<?= base_url('isi_vessel/vessel') ?>" class="nav-link">

                                  <i class="far fa-circle nav-icon"></i>

                                  <p>Data Vessel</p>

                              </a>

                          </li>

                          <li class="nav-item">

                              <a href="<?= base_url('isi_lokasi/lokasi') ?>" class="nav-link">

                                  <i class="far fa-circle nav-icon"></i>

                                  <p>Data Lokasi</p>

                              </a>

                          </li>

                      </ul>

                  </li>



                  <li class="nav-item">

                      <a href="#" class="nav-link">

                          <i class="nav-icon fas fa-copy"></i>

                          <p>

                              Master Data Dinamis

                              <i class="fas fa-angle-left right"></i>

                              <span class="badge badge-info right"></span>

                          </p>

                      </a>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('isi_wb/loadajaxhanson') ?>" class="nav-link">

                                  <i class="far fa-circle nav-icon"></i>

                                  <p> Weihbridge</p>

                              </a>

                          </li>

                      </ul>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('Isi_highlight') ?>" class="nav-link">

                                  <i class="far fa-circle nav-icon"></i>

                                  <p> Highlight</p>

                              </a>

                          </li>

                      </ul>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('Isi_highlight/rekonsil') ?>" class="nav-link">

                                  <i class="far fa-circle nav-icon"></i>

                                  <p> Rekonsil Highlight</p>

                              </a>

                          </li>

                      </ul>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('Isi_highlight/analisa_produksi') ?>" class="nav-link">

                                  <i class="far fa-circle nav-icon"></i>

                                  <p> Analisa Produksi </p>

                              </a>

                          </li>

                      </ul>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('Isi_highlight/analisa_muatan') ?>" class="nav-link">

                                  <i class="far fa-circle nav-icon"></i>

                                  <p> Analisa Muatan </p>

                              </a>

                          </li>

                      </ul>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('isi_highlight/produktifitas_unit_asli') ?>" class="nav-link">

                                  <i class="far fa-circle nav-icon"></i>

                                  <p> Produktifitas Unit</p>

                              </a>

                          </li>

                      </ul>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('Isi_bd_dispatch/loadajaxhanson?date=' . $a) ?>" class="nav-link">

                                  <i class="far fa-circle nav-icon"></i>

                                  <p>Data Dispatch Unit</p>

                              </a>

                          </li>

                      </ul>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('isi_geofence/cycle_unit') ?>" class="nav-link">

                                  <i class="far fa-circle nav-icon"></i>

                                  <p> Data Cycle Time</p>

                              </a>

                          </li>

                      </ul>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('isi_bd/bd') ?>" class="nav-link">

                                  <i class="far fa-circle nav-icon"></i>

                                  <p> BreakDown</p>

                              </a>

                          </li>

                      </ul>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('analisa_opt/load_anal_opt') ?>" class="nav-link">

                                  <i class="far fa-circle nav-icon"></i>

                                  <p>Produktifitas Operator</p>

                              </a>

                          </li>

                      </ul>



                  </li>

                  <li class="nav-item">

                      <a href="#" class="nav-link">

                          <i class="nav-icon fas fa-copy"></i>

                          <p>

                              Import Data EXCEL

                              <i class="fas fa-angle-left right"></i>

                              <span class="badge badge-info right"></span>

                          </p>

                      </a>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('isi_wb/form') ?>" class="nav-link">

                                  <i class="far fa-circle nav-icon"></i>

                                  <p> Import Excel WB</p>

                              </a>

                          </li>

                      </ul>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('Isi_geofence/form') ?>" class="nav-link">

                                  <i class="far fa-circle nav-icon"></i>

                                  <p> Import Excel Geofence</p>

                              </a>

                          </li>

                      </ul>

                  </li>

                  <li class="nav-item">

                      <a href="<?php echo base_url('auth/logout'); ?>" class="nav-link">

                          <!-- <i class="far fa-circle nav-icon"></i> -->

                          <p>LOGOUT</p>

                      </a>

                  </li>





              </ul>



          </nav>

          <?php } else if ($this->session->userdata('username') == "management") { ?>

          <div class="user-panel mt-3 pb-3 mb-3 d-flex">

              <div class="info">

                  <a href="#" class="d-block">SELAMAT DATANG Management</a>

              </div>

          </div>

          <nav class="mt-2">

              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                  <li class="nav-item <?= $itemtimbangan ?>">

                      <a href="#" class="nav-link <?= $item2timbangan ?>">

                          <i class="fas fa-weight"></i>

                          <p>

                              Timbangan

                              <i class="fas fa-angle-left right"></i>

                              <span class="badge badge-info right"></span>

                          </p>

                      </a>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('isi_highlight/pro_jam') ?>" class="nav-link <?= $activedbtimbangan ?>">

                                  <i class="nav-icon fas fa-chart-pie"></i>

                                  <p>Dashboard Timbangan/JAM</p>

                              </a>

                          </li>

                          <li class="nav-item">

                              <a href="<?= base_url('isi_highlight/pro_cek_bulan') ?>" class="nav-link <?= $activeproduksisenyiur ?>">

                                  <i class="nav-icon fas fa-file-signature "></i>

                                  <p>Produksi Senyiur</p>

                              </a>

                          </li>

                          <li class="nav-item">

                              <a href="<?= base_url('isi_highlight/pro_cek_bulan_gunungsari') ?>" class="nav-link <?= $activeproduksigunungsari ?>">

                                  <i class="nav-icon fas fa-file-signature"></i>

                                  <p>Produksi Gunungsari</p>

                              </a>

                          </li>

                          <!-- <li class="nav-item">

                    <a href="<?= base_url('isi_wb/form') ?>" class="nav-link <?= $activeexcelwb ?>">

                        <i class="far fa-file-excel nav-icon"></i>

                        <p> Import Excel WB</p>

                    </a>

                </li> -->

                      </ul>

                  </li>

                  <li class="nav-item <?= $itemunit ?>">

                      <a href="#" class="nav-link <?= $item2unit ?>">

                          <i class="fas fa-user-tie"></i>

                          <p>

                              Dispatch

                              <i class="fas fa-angle-left right"></i>

                              <span class="badge badge-info right"></span>

                          </p>

                      </a>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('isi_highlight/produktifitas_unit_asli') ?>" class="nav-link  <?= $activedbrunning ?>">

                                  <i class="fas fa-truck-moving nav-icon"></i>

                                  <p>Dashboard Unit Running</p>

                              </a>

                          </li>

                      </ul>

                  </li>

                  <li class="nav-item">

                      <a href="#" class="nav-link ">

                          <i class="fas fas fa-map-marked-alt"></i>

                          <p>

                              FMS

                              <i class="fas fa-angle-left right"></i>

                              <span class="badge badge-info right"></span>

                          </p>

                      </a>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('Isi_geofence/dashboard_fms') ?>" class="nav-link  ">

                                  <i class="nav-icon fas fa-chart-pie"></i>

                                  <p>DASHBOARD FMS</p>

                              </a>

                          </li>

                      </ul>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('Isi_geofence/cycle_summary') ?>" class="nav-link">

                                  <i class="fas fa-map-marker-alt nav-icon"></i>

                                  <p>DATA FMS</p>

                              </a>

                          </li>

                      </ul>

                  </li>

                  <li class="nav-item <?= $itemunit2 ?>">

                      <a href="#" class="nav-link <?= $item2unit2 ?>">

                          <i class="fas fa-truck-monster"></i>

                          <p>

                              Produktifity Unit

                              <i class="fas fa-angle-left right"></i>

                              <span class="badge badge-info right"></span>

                          </p>

                      </a>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('isi_highlight/produktifitas_unit_hm_hg') ?>" class="nav-link <?= $activedbunitavg ?>">

                                  <i class="fas fa-tachometer-alt nav-icon"></i>

                                  <p>Dashboard AVG</p>

                              </a>

                          </li>

                      </ul>

                  </li>

                  <li class="nav-item <?= $itemopt ?>">

                      <a href="#" class="nav-link <?= $itemopt2 ?>">

                          <i class="fas fa-user-friends"></i>

                          <p>

                              Produktifity Operator

                              <i class="fas fa-angle-left right"></i>

                              <span class="badge badge-info right"></span>

                          </p>

                      </a>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('Pro_operator_controller/pro_opt') ?>" class="nav-link <?= $activedbopt ?>">

                                  <i class="fas fa-users nav-icon"></i>

                                  <p>Dashboard OPT</p>

                              </a>

                          </li>

                      </ul>

                      <!-- <ul class="nav nav-treeview">

                              <li class="nav-item">

                                  <a href="<?= base_url('Pro_operator_controller/ketersediaan_opt') ?>" class="nav-link <?= $activeketersediaanopt ?>">

                                      <i class="fas fa-child nav-icon"></i>

                                      <p>Ketersediaan Operator</p>

                                  </a>

                              </li>

                          </ul> -->

                  </li>



                  <li class="nav-item">

                      <a href="<?php echo base_url('auth/logout'); ?>" class="nav-link">

                          <p>LOGOUT</p>

                      </a>

                  </li>





              </ul>



          </nav>

          <?php } else if ($this->session->userdata('username') == "mpppro") { ?>

          <div class="user-panel mt-3 pb-3 mb-3 d-flex">

              <div class="info">

                  <a href="#" class="d-block">SELAMAT DATANG MPP</a>

              </div>

          </div>

          <nav class="mt-2">

              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                  <!-- Add icons to the links using the .nav-icon class

               with font-awesome or any other icon font library -->

                  <li class="nav-item">

                      <a href="<?= base_url('Pro_operator_controller/ketersediaan_opt') ?>" class="nav-link">

                          <i class="far fa-circle nav-icon"></i>

                          <p>Ketersediaan Operator</p>

                      </a>

                  </li>

                  <li class="nav-item">

                      <a href="<?= base_url('Pro_operator_controller/ketersediaan_opt_detail') ?>" class="nav-link">

                          <i class="far fa-circle nav-icon"></i>

                          <p>Data Ketersediaan OPT</p>

                      </a>

                  </li>

                  <li class="nav-item">

                      <a href="<?= base_url('Pro_operator_controller/pro_opt'); ?>" class="nav-link">

                          <i class="far fa-circle nav-icon"></i>

                          <p>Produktifitas Operator </p>

                      </a>

                  </li>

                  <!-- widget -->

                  <li class="nav-item">

                      <a href="<?php echo base_url('auth/logout'); ?>" class="nav-link">

                          <!-- <i class="far fa-circle nav-icon"></i> -->

                          <p>LOGOUT</p>

                      </a>

                  </li>





              </ul>



          </nav>

          <?php } else if ($this->session->userdata('username') == "timbangan") { ?>



          <div class="user-panel mt-3 pb-3 mb-3 d-flex">

              <div class="info">

                  <a href="#" class="d-block">SELAMAT DATANG TIMBANGAN</a>

              </div>

          </div>

          <nav class="mt-2">

              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                  <!-- Add icons to the links using the .nav-icon class

               with font-awesome or any other icon font library -->

                  <li class="nav-item <?= $itemtimbangan ?>">

                      <a href="#" class="nav-link <?= $item2timbangan ?>">

                          <i class="fas fa-weight"></i>

                          <p>

                              Timbangan

                              <i class="fas fa-angle-left right"></i>

                              <span class="badge badge-info right"></span>

                          </p>

                      </a>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('isi_highlight/pro_jam') ?>" class="nav-link <?= $activedbtimbangan ?>">

                                  <i class="nav-icon fas fa-chart-pie"></i>

                                  <p>Dashboard Timbangan/JAM</p>

                              </a>

                          </li>

                          <li class="nav-item">

                              <a href="<?= base_url('isi_wb/loadajaxhanson') ?>" class="nav-link <?= $activedatatimbangan ?>">

                                  <i class="nav-icon fas fa-table"></i>

                                  <p>DATA Timbangan</p>

                              </a>

                          </li>

                          <li class="nav-item">

                              <a href="<?= base_url('isi_highlight/pro_cek_bulan') ?>" class="nav-link">

                                  <i class="nav-icon fas fa-file-signature "></i>

                                  <p>CEK DATA</p>

                              </a>

                          </li>

                          <!-- <li class="nav-item">

                                  <a href="<?= base_url('isi_wb/form') ?>" class="nav-link <?= $activeexcelwb ?>">

                                      <i class="far fa-file-excel nav-icon"></i>

                                      <p> Import Excel WB</p>

                                  </a>

                              </li> -->

                      </ul>

                  </li>

                  <li class="nav-item">

                      <a href="<?php echo base_url('auth/logout'); ?>" class="nav-link">

                          <!-- <i class="far fa-circle nav-icon"></i> -->

                          <p>LOGOUT</p>

                      </a>

                  </li>





              </ul>



          </nav>



          <?php } else if ($this->session->userdata('username') == "produksi") { ?>



          <div class="user-panel mt-3 pb-3 mb-3 d-flex">

              <div class="info">

                  <a href="#" class="d-block">SELAMAT DATANG</a>

                  <a href="#" class="d-block">User</a>

              </div>

          </div>

          <nav class="mt-2">

              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                  <li class="nav-item <?= $itemtimbangan ?>">

                      <a href="#" class="nav-link <?= $item2timbangan ?>">

                          <i class="fas fa-weight"></i>

                          <p>

                              Timbangan

                              <i class="fas fa-angle-left right"></i>

                              <span class="badge badge-info right"></span>

                          </p>

                      </a>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('isi_highlight/pro_jam') ?>" class="nav-link <?= $activedbtimbangan ?>">

                                  <i class="nav-icon fas fa-chart-pie"></i>

                                  <p>Dashboard Timbangan/JAM</p>

                              </a>

                          </li>

                          <li class="nav-item">

                              <a href="<?= base_url('isi_highlight/pro_cek_bulan') ?>" class="nav-link <?= $activeproduksisenyiur ?>">

                                  <i class="nav-icon fas fa-file-signature "></i>

                                  <p>Produksi Senyiur</p>

                              </a>

                          </li>

                          <li class="nav-item">

                              <a href="<?= base_url('isi_highlight/pro_cek_bulan_gunungsari') ?>" class="nav-link <?= $activeproduksigunungsari ?>">

                                  <i class="nav-icon fas fa-file-signature"></i>

                                  <p>Produksi Gunungsari</p>

                              </a>

                          </li>

                          <!-- <li class="nav-item">

                    <a href="<?= base_url('isi_wb/form') ?>" class="nav-link <?= $activeexcelwb ?>">

                        <i class="far fa-file-excel nav-icon"></i>

                        <p> Import Excel WB</p>

                    </a>

                </li> -->

                      </ul>

                  </li>

                  <li class="nav-item <?= $itemunit ?>">

                      <a href="#" class="nav-link <?= $item2unit ?>">

                          <i class="fas fa-user-tie"></i>

                          <p>

                              Dispatch

                              <i class="fas fa-angle-left right"></i>

                              <span class="badge badge-info right"></span>

                          </p>

                      </a>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('isi_highlight/produktifitas_unit_asli') ?>" class="nav-link  <?= $activedbrunning ?>">

                                  <i class="fas fa-truck-moving nav-icon"></i>

                                  <p>Dashboard Unit Running</p>

                              </a>

                          </li>

                      </ul>

                  </li>

                  <li class="nav-item">

                      <a href="#" class="nav-link ">

                          <i class="fas fas fa-map-marked-alt"></i>

                          <p>

                              FMS

                              <i class="fas fa-angle-left right"></i>

                              <span class="badge badge-info right"></span>

                          </p>

                      </a>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('Isi_geofence/dashboard_fms') ?>" class="nav-link  ">

                                  <i class="nav-icon fas fa-chart-pie"></i>

                                  <p>DASHBOARD FMS</p>

                              </a>

                          </li>

                      </ul>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('Isi_geofence/cycle_summary') ?>" class="nav-link">

                                  <i class="fas fa-map-marker-alt nav-icon"></i>

                                  <p>DATA FMS</p>

                              </a>

                          </li>

                      </ul>

                  </li>

                  <li class="nav-item <?= $itemunit2 ?>">

                      <a href="#" class="nav-link <?= $item2unit2 ?>">

                          <i class="fas fa-truck-monster"></i>

                          <p>

                              Produktifity Unit

                              <i class="fas fa-angle-left right"></i>

                              <span class="badge badge-info right"></span>

                          </p>

                      </a>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('isi_highlight/produktifitas_unit_hm_hg') ?>" class="nav-link <?= $activedbunitavg ?>">

                                  <i class="fas fa-tachometer-alt nav-icon"></i>

                                  <p>Dashboard AVG</p>

                              </a>

                          </li>

                      </ul>

                  </li>

                  <li class="nav-item <?= $itemopt ?>">

                      <a href="#" class="nav-link <?= $itemopt2 ?>">

                          <i class="fas fa-user-friends"></i>

                          <p>

                              Produktifity Operator

                              <i class="fas fa-angle-left right"></i>

                              <span class="badge badge-info right"></span>

                          </p>

                      </a>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('Pro_operator_controller/pro_opt') ?>" class="nav-link <?= $activedbopt ?>">

                                  <i class="fas fa-users nav-icon"></i>

                                  <p>Dashboard OPT</p>

                              </a>

                          </li>

                      </ul>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('Pro_operator_controller/ketersediaan_opt') ?>" class="nav-link <?= $activeketersediaanopt ?>">

                                  <i class="fas fa-child nav-icon"></i>

                                  <p>Ketersediaan Operator</p>

                              </a>

                          </li>

                      </ul>

                  </li>



                  <li class="nav-item">

                      <a href="<?php echo base_url('auth/logout'); ?>" class="nav-link">

                          <p>LOGOUT</p>

                      </a>

                  </li>





              </ul>



          </nav>

          <?php } else if ($this->session->userdata('username') == "ccradmin") { ?>



          <div class="user-panel mt-3 pb-3 mb-3 d-flex">

              <div class="info">

                  <a href="#" class="d-block">SELAMAT DATANG</a>

                  <a href="#" class="d-block">CCR- ADMIN</a>

              </div>

          </div>
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">

              <div class="info">

                  <a href="#" class="d-block">SELAMAT DATANG</a>


              </div>

          </div>

          <nav class="mt-2">

              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                  <li class="nav-item <?= $itemtimbangan ?>">

                      <a href="#" class="nav-link <?= $item2timbangan ?>">

                          <i class="fas fa-weight"></i>

                          <p>

                              Timbangan

                              <i class="fas fa-angle-left right"></i>

                              <span class="badge badge-info right"></span>

                          </p>

                      </a>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('isi_highlight/pro_jam') ?>" class="nav-link <?= $activedbtimbangan ?>">

                                  <i class="nav-icon fas fa-chart-pie"></i>

                                  <p>Dashboard Timbangan/JAM</p>

                              </a>

                          </li>



                          <li class="nav-item">

                              <a href="<?= base_url('isi_wb/loadajaxhanson') ?>" class="nav-link <?= $activedatatimbangan ?>">

                                  <i class="nav-icon fas fa-table"></i>

                                  <p>DATA Timbangan</p>

                              </a>

                          </li>

                          <li class="nav-item">

                              <a href="<?= base_url('isi_wb/loadajaxhanson_gunungsari') ?>" class="nav-link <?= $activedatagunungsari ?>">

                                  <i class="nav-icon fas fa-table"></i>

                                  <p>DATA Gunungsari</p>

                              </a>

                          </li>

                          <li class="nav-item">

                              <a href="<?= base_url('isi_highlight/pro_cek_bulan') ?>" class="nav-link <?= $activeproduksisenyiur ?>">

                                  <i class="nav-icon fas fa-file-signature "></i>

                                  <p>Produksi Senyiur</p>

                              </a>

                          </li>

                          <li class="nav-item">

                              <a href="<?= base_url('isi_highlight/pro_cek_bulan_gunungsari') ?>" class="nav-link <?= $activeproduksigunungsari ?>">

                                  <i class="nav-icon fas fa-file-signature"></i>

                                  <p>Produksi Gunungsari</p>

                              </a>

                          </li>

                          <!-- <li class="nav-item">

                                  <a href="<?= base_url('isi_wb/form') ?>" class="nav-link <?= $activeexcelwb ?>">

                                      <i class="far fa-file-excel nav-icon"></i>

                                      <p> Import Excel WB</p>

                                  </a>

                              </li> -->

                      </ul>

                  </li>

                  <li class="nav-item <?= $itemunit ?>">

                      <a href="#" class="nav-link <?= $item2unit ?>">

                          <i class="fas fa-user-tie"></i>

                          <p>

                              Dispatch

                              <i class="fas fa-angle-left right"></i>

                              <span class="badge badge-info right"></span>

                          </p>

                      </a>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('isi_highlight/produktifitas_unit_asli') ?>" class="nav-link  <?= $activedbrunning ?>">

                                  <i class="fas fa-truck-moving nav-icon"></i>

                                  <p>Dashboard Unit Running</p>

                              </a>

                          </li>

                          <li class="nav-item">



                              <a href="<?= base_url('Isi_bd_dispatch/loadajaxhanson?date=' . $a) ?>" class="nav-link  <?= $activebdunit ?>">

                                  <i class="fas fa-car-crash nav-icon"></i>

                                  <p>Data Dispatch by date</p>

                              </a>

                          </li>

                          <li class="nav-item">



                              <a href="<?= base_url('Isi_bd_dispatch/loadajaxhanson_byOperasi') ?>" class="nav-link ">

                                  <i class="fas fa-car-crash nav-icon"></i>

                                  <p>Data Dispatch Not</p>

                              </a>

                          </li>

                          <li class="nav-item">

                              <a href="<?= base_url('Isi_unit_running') ?>" class="nav-link  <?= $activestatusunit ?>">

                                  <i class="fas fa-truck nav-icon"></i>

                                  <p>Status Unit</p>

                              </a>

                          </li>

                      </ul>

                  </li>

                  <li class="nav-item">

                      <a href="#" class="nav-link ">

                          <i class="fas fas fa-map-marked-alt"></i>

                          <p>

                              FMS

                              <i class="fas fa-angle-left right"></i>

                              <span class="badge badge-info right"></span>

                          </p>

                      </a>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('Isi_geofence/dashboard_fms') ?>" class="nav-link  ">

                                  <i class="nav-icon fas fa-chart-pie"></i>

                                  <p>DASHBOARD FMS</p>

                              </a>

                          </li>

                      </ul>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('Isi_geofence/cycle_summary') ?>" class="nav-link">

                                  <i class="fas fa-map-marker-alt nav-icon"></i>

                                  <p>DATA FMS</p>

                              </a>

                          </li>

                      </ul>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('Isi_geofence/loadajaxhanson') ?>" class="nav-link">

                                  <i class="fas fa-table nav-icon"></i>

                                  <p>DATA FMS TO EXCEL</p>

                              </a>

                          </li>

                      </ul>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('Isi_geofence/form') ?>" class="nav-link">

                                  <i class="far fa-file-excel nav-icon"></i>

                                  <p>Upload Geofence FMS</p>

                              </a>

                          </li>

                      </ul>

                  </li>

                  <li class="nav-item <?= $itemunit2 ?>">

                      <a href="#" class="nav-link <?= $item2unit2 ?>">

                          <i class="fas fa-truck-monster"></i>

                          <p>

                              Produktifity Unit

                              <i class="fas fa-angle-left right"></i>

                              <span class="badge badge-info right"></span>

                          </p>

                      </a>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('isi_highlight/produktifitas_unit_hm_hg') ?>" class="nav-link <?= $activedbunitavg ?>">

                                  <i class="fas fa-tachometer-alt nav-icon"></i>

                                  <p>Dashboard AVG</p>

                              </a>

                          </li>

                          <li class="nav-item">

                              <a href="<?= base_url('Hm_controller/loadajaxhanson') ?>" class="nav-link <?= $activehmunit ?>">

                                  <i class="fas fa-stopwatch nav-icon"></i>

                                  <p>Data HM unit</p>

                              </a>

                          </li>

                          <!-- <li class="nav-item">

                                  <a href="<?= base_url('Hm_controller/form') ?>" class="nav-link <?= $activeuploadhm ?>">

                                      <i class="far fa-file-excel nav-icon"></i>

                                      <p>Upload HM</p>

                                  </a>

                              </li> -->

                          <li class="nav-item">

                              <a href="<?= base_url('/Isi_highlight/loadajaxhanson') ?>" class="nav-link <?= $activehgunit ?>">

                                  <i class="fas fa-highlighter nav-icon"></i>

                                  <p>Data Highlight Unit</p>

                              </a>

                          </li>

                          <!-- <li class="nav-item">

                                  <a href="<?= base_url('Isi_highlight/form') ?>" class="nav-link <?= $activeuploadhg ?>">

                                      <i class="far fa-file-excel nav-icon"></i>

                                      <p>Upload Highlight</p>

                                  </a>

                              </li> -->

                          <li class="nav-item">

                              <a href="<?= base_url('Dmbd_controller/loadajaxhanson') ?>" class="nav-link <?= $activedmbd ?>">

                                  <i class="fas fa-user-check nav-icon"></i>

                                  <p>Data DMBD </p>

                              </a>

                          </li>

                          <!-- <li class="nav-item">

                                  <a href="<?= base_url('Dmbd_controller/form') ?>" class="nav-link <?= $activeuploaddmbd ?>">

                                      <i class="far fa-file-excel nav-icon"></i>

                                      <p>Upload DMBD</p>

                                  </a>

                              </li> -->

                      </ul>

                  </li>

                  <li class="nav-item <?= $itemopt ?>">

                      <a href="#" class="nav-link <?= $itemopt2 ?>">

                          <i class="fas fa-user-friends"></i>

                          <p>

                              Produktifity Operator

                              <i class="fas fa-angle-left right"></i>

                              <span class="badge badge-info right"></span>

                          </p>

                      </a>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('Pro_operator_controller/pro_opt') ?>" class="nav-link <?= $activedbopt ?>">

                                  <i class="fas fa-users nav-icon"></i>

                                  <p>Dashboard OPT</p>

                              </a>

                          </li>

                      </ul>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('Pro_operator_controller/ketersediaan_opt') ?>" class="nav-link <?= $activeketersediaanopt ?>">

                                  <i class="fas fa-child nav-icon"></i>

                                  <p>Ketersediaan Operator</p>

                              </a>

                          </li>

                      </ul>

                      <ul class="nav nav-treeview">

                          <li class="nav-item">

                              <a href="<?= base_url('Pro_operator_controller/ketersediaan_opt_detail') ?>" class="nav-link <?= $activedataopt ?>">

                                  <i class="fas fa-people-carry nav-icon"></i>

                                  <p>Data Ketersediaan OPT</p>

                              </a>

                          </li>

                      </ul>

                      <!-- <ul class="nav nav-treeview">

                              <li class="nav-item">

                                  <a href="<?= base_url('Pro_operator_controller') ?>" class="nav-link <?= $activepayroll ?>">

                                      <i class="fas fa-comment-dollar nav-icon"></i>

                                      <p>Data Payroll</p>

                                  </a>

                              </li>

                          </ul>

                          <ul class="nav nav-treeview">

                              <li class="nav-item">

                                  <a href="<?= base_url('Pro_operator_controller/form') ?>" class="nav-link <?= $activeuploadpayroll ?>">

                                      <i class="fas fa-comments-dollar nav-icon"></i>

                                      <p>Upload Auto Input Payroll</p>

                                  </a>

                              </li>

                          </ul> -->

                  </li>



                  <li class="nav-item">

                      <a href="<?php echo base_url('auth/logout'); ?>" class="nav-link">

                          <p>LOGOUT</p>

                      </a>

                  </li>





              </ul>



          </nav>

          <?php } else if ($this->session->userdata('username') == "dispatch") { ?>



          <div class="user-panel mt-3 pb-3 mb-3 d-flex">

              <div class="info">

                  <a href="#" class="d-block">SELAMAT DATANG DISPATCH</a>

              </div>

          </div>

          <nav class="mt-2">

              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                  <!-- Add icons to the links using the .nav-icon class

 with font-awesome or any other icon font library -->

                  <li class="nav-item">

                      <a href="<?= base_url('isi_highlight/produktifitas_unit_asli'); ?>" class="nav-link">

                          <i class="far fa-circle nav-icon"></i>

                          <p>Dashboard Unit </p>

                      </a>

                  </li>

                  <li class="nav-item">

                      <a href="<?= base_url('Isi_bd_dispatch/loadajaxhanson?date=' . $a) ?>" class="nav-link">

                          <i class="far fa-circle nav-icon"></i>

                          <p>Data Breakdown Unit</p>

                      </a>

                  </li>

                  <li class="nav-item">

                      <a href="<?= base_url('Isi_bd_dispatch/loadajaxhanson_byOperasi') ?>" class="nav-link">

                          <i class="far fa-circle nav-icon"></i>

                          <p>Breakdown Kosong</p>

                      </a>

                  </li>

                  <li class="nav-item">

                      <a href="<?= base_url('Isi_unit_running') ?>" class="nav-link">

                          <i class="far fa-circle nav-icon"></i>

                          <p>Status Unit</p>

                      </a>

                  </li>

                  <li class="nav-item">

                      <a href="<?php echo base_url('auth/logout'); ?>" class="nav-link">

                          <!-- <i class="far fa-circle nav-icon"></i> -->

                          <p>LOGOUT</p>

                      </a>

                  </li>





              </ul>



          </nav>

          <?php } ?>

          <!-- /.sidebar-menu -->

      </div>

      <!-- /.sidebar -->

  </aside>