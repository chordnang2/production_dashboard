<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Load library phpspreadsheet
require('./vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet

class Daily_produksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Daily_produksi_model');
        $this->load->model('Daily_produksi_select_model');

        $this->load->library(['form_validation', 'session']);

        $this->load->helper(['url_helper', 'form']);
    }
    // crud
    public function insert_target()
    {
        // $table_kolom = $this->db->list_fields('tbl_target_parameterdailyproduksi');
        $data = array(
            'tanggal' => $this->input->post('tanggal'),
            'ton' => $this->input->post('ton'),
            'average_ton' => $this->input->post('average_ton'),
            'populasi' => $this->input->post('populasi'),
            'jumlah_unit_service' => $this->input->post('jumlah_unit_service'),
            'jumlah_unit_breakdown' => $this->input->post('jumlah_unit_breakdown'),
            'pa' => $this->input->post('pa'),
            'ma' => $this->input->post('ma'),
            'jumlah_change_shift_km_30_35' => $this->input->post('jumlah_change_shift_km_30_35'),
            'breakdown' => $this->input->post('breakdown'),
            'change_shift' => $this->input->post('change_shift'),
            'refueling' => $this->input->post('refueling'),
            'antri_loading' => $this->input->post('antri_loading'),
            'antri_dumping' => $this->input->post('antri_dumping'),
            'rest_time' => $this->input->post('rest_time'),
            'cycle_time' => $this->input->post('cycle_time'),
            'travel_time' => $this->input->post('travel_time'),
            'ewh' => $this->input->post('ewh'),
            'ua' => $this->input->post('ua'),
            'kecepatan_rata_rata' => $this->input->post('kecepatan_rata_rata'),
            'fuel_consumtion_trailer' => $this->input->post('fuel_consumtion_trailer'),
            'fuel_index_unit_trailer_liter_ton' => $this->input->post('fuel_index_unit_trailer_liter_ton'),
            'fuel_index_unit_trailer_liter_ton_km' => $this->input->post('fuel_index_unit_trailer_liter_ton_km')
        );


        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();

        $data = $this->Daily_produksi_model->insert_target($data);
        redirect(base_url('daily_produksi'), 'refresh');
    }
    public function insert()
    {
        $data = array(
            'tanggal' => $this->input->post('tanggal'),
            'populasi' => $this->input->post('populasi'),
            'jumlahoperator' => $this->input->post('jumlahoperator'),
            'jumlahoperatortraining' => $this->input->post('jumlahoperatortraining'),
            'jumlahoperatorsakit' => $this->input->post('jumlahoperatorsakit'),
            'jumlahoperatorcuti' => $this->input->post('jumlahoperatorcuti'),
            'jumlahoperatormangkir' => $this->input->post('jumlahoperatormangkir'),
            'jumlahoperatortidaksiapbekerja' => $this->input->post('jumlahoperatortidaksiapbekerja'),
            'jumlahoperatoroff' => $this->input->post('jumlahoperatoroff'),
            'jumlahoperatorsiapoperasi' => $this->input->post('jumlahoperatorsiapoperasi'),
            'fuelconsumtionunittrailer' => $this->input->post('fuelconsumtionunittrailer')
        );

        $data = $this->Daily_produksi_model->insert($data);
        redirect(base_url('daily_produksi'), 'refresh');
    }
    // endcrud

    // public function select_date()
    // {
    //     $daterange = $this->input->get('daterange');
    //     $daterange = explode("- ", $daterange);

    //     echo "<pre>";
    //     print_r($daterange[0]);
    //     echo "</pre>";
    // }

    public function error_belum_update()
    {
        $this->load->view('errors/error_belumupdate');
    }

    public function index()
    {

        // data_target
        $data["datatarget"] = $this->Daily_produksi_model->datatarget();

        // datapelengkap
        $data["datapelengkap"] = $this->Daily_produksi_model->datapelengkap();

        // produksi
        //ton
        $data["ton"] = $this->Daily_produksi_model->ton();
        $data["ton_siang"] = $this->Daily_produksi_model->ton_siang();
        $data["ton_malam"] = $this->Daily_produksi_model->ton_malam();


        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();

        // trip 
        $data["trip"] = $this->Daily_produksi_model->trip();
        $data["trip_siang"] = $this->Daily_produksi_model->trip_siang();
        $data["trip_malam"] = $this->Daily_produksi_model->trip_malam();

        // avg_ton
        $data["avgton"] = $this->Daily_produksi_model->avgton();
        $data["avgton_siang"] = $this->Daily_produksi_model->avgton_siang();
        $data["avgton_malam"] = $this->Daily_produksi_model->avgton_malam();

        // avg_distance
        $data["avgdistance"] = $this->Daily_produksi_model->avgdistance();
        $data["avgdistance_siang"] = $this->Daily_produksi_model->avgdistance_siang();
        $data["avgdistance_malam"] = $this->Daily_produksi_model->avgdistance_malam();

        // sumdistance
        $data["sumdistance"] = $this->Daily_produksi_model->sumdistance();
        $data["sumdistance_siang"] = $this->Daily_produksi_model->sumdistance_siang();
        $data["sumdistance_malam"] = $this->Daily_produksi_model->sumdistance_malam();

        // totaltonkm
        $data["tonhg"] = $this->Daily_produksi_model->tonhg();
        $data["tonhg_siang"] = $this->Daily_produksi_model->tonhg_siang();
        $data["tonhg_malam"] = $this->Daily_produksi_model->tonhg_malam();

        $data["totaltonkm"] = ROUND($data["tonhg"][0]['sumnett'] *  $data["avgdistance"][0]['avgdistance']);
        $data["totaltonkm_siang"] = ROUND($data["tonhg_siang"][0]['sumnett'] *  $data["avgdistance_siang"][0]['avgdistance']);
        $data["totaltonkm_malam"] = ROUND($data["tonhg_malam"][0]['sumnett'] *  $data["avgdistance_malam"][0]['avgdistance']);
        // endproduksi

        // unit
        $data["ratarataunitready"] = $this->Daily_produksi_model->ratarataunitready();
        $data["ratarataunitreadysiang"] = $this->Daily_produksi_model->ratarataunitreadysiang();
        $data["ratarataunitreadymalam"] = $this->Daily_produksi_model->ratarataunitreadymalam();
        $data["unitchangeshift3035"] = $this->Daily_produksi_model->unitchangeshift3035();
        $data["unitchangeshift3035_siang"] = $this->Daily_produksi_model->unitchangeshift3035_siang();
        $data["unitchangeshift3035_malam"] = $this->Daily_produksi_model->unitchangeshift3035_malam();
        // unitservice
        $data["unitservice"] = $this->Daily_produksi_model->unitservice();
        $data["unitservice_siang"] = $this->Daily_produksi_model->unitservice_siang();
        $data["unitservice_malam"] = $this->Daily_produksi_model->unitservice_malam();

        // unitbreakdown
        $data["unitbreakdown"] = $this->Daily_produksi_model->unitbreakdown();
        $data["unitbreakdown_siang"] = $this->Daily_produksi_model->unitbreakdown_siang();
        $data["unitbreakdown_malam"] = $this->Daily_produksi_model->unitbreakdown_malam();

        // total_hm
        $data["totalhm"] = $this->Daily_produksi_model->totalhm();
        $data["totalhm_siang"] = $this->Daily_produksi_model->totalhm_siang();
        $data["totalhm_malam"] = $this->Daily_produksi_model->totalhm_malam();

        $data["totalbd"] = $this->Daily_produksi_model->totalbd();
        $data["totalbdsiang"] = $this->Daily_produksi_model->totalbdsiang();
        $data["totalbdmalam"] = $this->Daily_produksi_model->totalbdmalam();
        // endunit

        //operasional
        $waktutotalbd = $data["totalbd"][0]['maxdate'];
        // ratarataunitready
        $data["ratarataunitready2"] = $this->Daily_produksi_model->ratarataunitready2($waktutotalbd);
        $data["ratarataunitready2siang"] = $this->Daily_produksi_model->ratarataunitready2siang($waktutotalbd);
        $data["ratarataunitready2malam"] = $this->Daily_produksi_model->ratarataunitready2malam($waktutotalbd);

        $data["ratarataproduktifitasunitoperasi"] = round($data["trip"][0]['sumtrip'] / $data["ratarataunitready"][0]['ratarataunitready'], 2);
        $data["counttrip2"] = $this->Daily_produksi_model->counttrip2();
        $data["ratarataoptproduktifitasopt"] = $this->Daily_produksi_model->ratarataoptproduktifitasopt();
        $data["countopt2trip"] = $this->Daily_produksi_model->countopt2trip();
        // breakdown
        $data["breakdown"] = $this->Daily_produksi_model->breakdown();
        $data["breakdownsiang"] = $this->Daily_produksi_model->breakdownsiang();
        $data["breakdownmalam"] = $this->Daily_produksi_model->breakdownmalam();
        // changeshift
        $data["change_shift"] = $this->Daily_produksi_model->change_shift();
        $data["change_shiftsiang"] = $this->Daily_produksi_model->change_shiftsiang();
        $data["change_shiftmalam"] = $this->Daily_produksi_model->change_shiftmalam();
        // refueling
        $data["refueling"] = $this->Daily_produksi_model->refueling();
        $data["refuelingsiang"] = $this->Daily_produksi_model->refuelingsiang();
        $data["refuelingmalam"] = $this->Daily_produksi_model->refuelingmalam();
        // antriload
        $data["antri_load"] = $this->Daily_produksi_model->antri_load();
        $data["antri_load_siang"] = $this->Daily_produksi_model->antri_load_siang();
        $data["antri_load_malam"] = $this->Daily_produksi_model->antri_load_malam();
        // coal_limit
        $data["coal_limit"] = $this->Daily_produksi_model->coal_limit();
        $data["coal_limit_siang"] = $this->Daily_produksi_model->coal_limit_siang();
        $data["coal_limit_malam"] = $this->Daily_produksi_model->coal_limit_malam();
        // antri_loading
        $data["antri_loading"] = $data["antri_load"][0]['antri_load'] + $data["coal_limit"][0]['coal_limit'];
        $data["antri_loading_siang"] = $data["antri_load_siang"][0]['antri_load'] + $data["coal_limit_siang"][0]['coal_limit'];
        $data["antri_loading_malam"] = $data["antri_load_malam"][0]['antri_load'] + $data["coal_limit_malam"][0]['coal_limit'];
        // antri_dumping
        $data["antri_dumping"] = $this->Daily_produksi_model->antri_dumping();
        $data["antri_dumping_siang"] = $this->Daily_produksi_model->antri_dumping_siang();
        $data["antri_dumping_malam"] = $this->Daily_produksi_model->antri_dumping_malam();
        // rest_time
        $data["rest_time"] = $this->Daily_produksi_model->rest_time();
        $data["rest_time_siang"] = $this->Daily_produksi_model->rest_time_siang();
        $data["rest_time_malam"] = $this->Daily_produksi_model->rest_time_malam();
        // standby_time
        $data["standby_time"] =
            $data["change_shift"][0]['change_shift']
            +  $data["refueling"][0]['refueling']
            +  $data["antri_load"][0]['antri_load']
            +  $data["coal_limit"][0]['coal_limit']
            +  $data["antri_dumping"][0]['antri_dumping']
            +  $data["rest_time"][0]['rest_time'];
        $data["standby_time_siang"] =
            $data["change_shiftsiang"][0]['change_shift']
            +  $data["refuelingsiang"][0]['refueling']
            +  $data["antri_load_siang"][0]['antri_load']
            +  $data["coal_limit_siang"][0]['coal_limit']
            +  $data["antri_dumping_siang"][0]['antri_dumping']
            +  $data["rest_time_siang"][0]['rest_time'];
        $data["standby_time_malam"] =
            $data["change_shiftmalam"][0]['change_shift']
            +  $data["refuelingmalam"][0]['refueling']
            +  $data["antri_load_malam"][0]['antri_load']
            +  $data["coal_limit_malam"][0]['coal_limit']
            +  $data["antri_dumping_malam"][0]['antri_dumping']
            +  $data["rest_time_malam"][0]['rest_time'];
        // cyle_time
        $data["cycle_time"] = $this->Daily_produksi_model->cycle_time();
        $data["cycle_time_siang"] = $this->Daily_produksi_model->cycle_time_siang();
        $data["cycle_time_malam"] = $this->Daily_produksi_model->cycle_time_malam();
        // travel_time
        $data["travel_time"] = $this->Daily_produksi_model->travel_time();
        $data["travel_time_siang"] = $this->Daily_produksi_model->travel_time_siang();
        $data["travel_time_malam"] = $this->Daily_produksi_model->travel_time_malam();
        // ewh
        $data["ewh"] = 24 - $data["standby_time"];
        $data["ewh_siang"] = 24 - $data["standby_time_siang"];
        $data["ewh_malam"] = 24 - $data["standby_time_malam"];
        // ua
        $data["ua"] =   ROUND(($data["ewh"] / ($data["breakdown"][0]['breakdown'] + $data["ewh"])) * 100);
        $data["ua_siang"] =   ROUND(($data["ewh_siang"] / ($data["breakdownsiang"][0]['breakdown'] + $data["ewh_siang"])) * 100);
        $data["ua_malam"] =   ROUND(($data["ewh_malam"] / ($data["breakdownmalam"][0]['breakdown'] + $data["ewh_malam"])) * 100);
        // kecepatanratarata
        $data["kecepatanratarata"] = ROUND($data["sumdistance"][0]['sumdistance'] / $data["totalhm"][0]['wh'], 2);
        $data["kecepatanratarata_siang"] = ROUND($data["sumdistance_siang"][0]['sumdistance'] / $data["totalhm_siang"][0]['wh'], 2);
        $data["kecepatanratarata_malam"] = ROUND($data["sumdistance_malam"][0]['sumdistance'] / $data["totalhm_malam"][0]['wh'], 2);

        // fuel
        $tanggalfuel =  $data["datapelengkap"][0]['tanggal'];
        // tonfuel
        $data["ton_fuel"] = $this->Daily_produksi_model->ton_fuel($tanggalfuel);
        $data["ton_fuel_siang"] = $this->Daily_produksi_model->ton_fuel_siang($tanggalfuel);
        $data["ton_fuel_malam"] = $this->Daily_produksi_model->ton_fuel_malam($tanggalfuel);
        // avgdistancefuel
        $data["avg_distance_fuel"] = $this->Daily_produksi_model->avgdistance_fuel($tanggalfuel);
        $data["avgdistance_fuel_siang"] = $this->Daily_produksi_model->avgdistance_fuel_siang($tanggalfuel);
        $data["avgdistance_fuel_malam"] = $this->Daily_produksi_model->avgdistance_fuel_malam($tanggalfuel);

        // echo "<pre>";
        // print_r($data["avg_distance_fuel"]);
        // echo "</pre>";
        // die();

        $data["fuelindextrailer"] = $data["datapelengkap"][0]['fuelconsumtionunittrailer_siang'] + $data["datapelengkap"][0]['fuelconsumtionunittrailer_malam'];
        // fuelindextrailerliterton
        $data["fuelindextrailerliterton"] = ROUND($data["fuelindextrailer"]  / $data["ton_fuel"][0]['sumnett'], 2);
        $data["fuelindextrailerliterton_siang"] = ROUND($data["datapelengkap"][0]['fuelconsumtionunittrailer_siang'] / $data["ton_fuel_siang"][0]['sumnett'], 2);
        $data["fuelindextrailerliterton_malam"] = ROUND($data["datapelengkap"][0]['fuelconsumtionunittrailer_malam'] / $data["ton_fuel_malam"][0]['sumnett'], 2);

        if (isset($data["avg_distance_fuel"][0]['avgdistance'])) {
            $data["fuelindextrailerlitertonkm"] = ROUND($data["fuelindextrailer"] / ($data["ton_fuel"][0]['sumnett'] * $data["avg_distance_fuel"][0]['avgdistance']), 3);
        } else {
            $data["fuelindextrailerlitertonkm"] = 0;
        }
        if (isset($data["avgdistance_fuel_siang"][0]['avgdistance'])) {
            $data["fuelindextrailerlitertonkm_siang"] = ROUND($data["datapelengkap"][0]['fuelconsumtionunittrailer_siang'] / ($data["ton_fuel_siang"][0]['sumnett'] * $data["avgdistance_fuel_siang"][0]['avgdistance']), 3);
        } else {
            $data["fuelindextrailerlitertonkm_siang"] = 0;
        }
        if (isset($data["avgdistance_fuel_malam"][0]['avgdistance'])) {
            $data["fuelindextrailerlitertonkm_malam"] = ROUND($data["datapelengkap"][0]['fuelconsumtionunittrailer_malam'] / ($data["ton_fuel_malam"][0]['sumnett'] * $data["avgdistance_fuel_malam"][0]['avgdistance']), 3);
        } else {
            $data["fuelindextrailerlitertonkm_malam"] = 0;
        }

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();


        // $data["fuelindextrailerlitertonkm"] = ROUND($data["datapelengkap"][0]['fuelconsumtionunittrailer'] / ($data["ton_fuel"][0]['sumnett'] * $data["avg_distance_fuel"][0]['avgdistance']), 3);

        // PA & MA harusdibawah
        // bd
        $bd = $data["totalbd"][0]['totalbd'];
        $bdsiang = $data["totalbdsiang"][0]['totalbd'];
        $bdmalam = $data["totalbdmalam"][0]['totalbd'];
        // ratarataunitready
        $ready =  $data["ratarataunitready2"][0]['ratarataunitready2'];
        $readysiang =  $data["ratarataunitready2siang"][0]['ratarataunitready2'];
        $readymalam =  $data["ratarataunitready2malam"][0]['ratarataunitready2'];
        // pa
        $data["pa"] = ROUND(((($bd * 24) - $ready) / ($bd * 24)) * 100);
        $data["pasiang"] = ROUND(((($bdsiang * 24) - $readysiang) / ($bdsiang * 24)) * 100);
        $data["pamalam"] = ROUND(((($bdmalam * 24) - $readymalam) / ($bdmalam * 24)) * 100);
        // ma
        $data["ma"] = ROUND(((60 *  $data["ewh"]) / ((60 *  $data["ewh"]) +   $data["totalbd"][0]['totalbd'])) * 100);
        $data["ma_siang"] = ROUND(((60 *  $data["ewh_siang"]) / ((60 *  $data["ewh_siang"]) +   $data["totalbdsiang"][0]['totalbd'])) * 100);
        $data["ma_malam"] = ROUND(((60 *  $data["ewh_malam"]) / ((60 *  $data["ewh_malam"]) +   $data["totalbdmalam"][0]['totalbd'])) * 100);

        // target
        $data['target_ton'] =  $data["datatarget"][0]['ton'];
        $data['target_trip'] =  ROUND($data["datatarget"][0]['ton'] / $data["datatarget"][0]['average_ton']);
        $data['target_average_ton'] = $data["datatarget"][0]['average_ton'];
        $data['target_totaltonkm'] = $data["avgdistance"][0]['avgdistance'] * $data['target_ton'];
        $data['target_populasi'] = $data["datatarget"][0]['populasi'];
        $data['target_ratarataunitready'] =  ROUND($data['target_populasi'] * $data["datatarget"][0]['pa'] / 100);
        $data['target_ratarataunitservice'] =  $data["datatarget"][0]['jumlah_unit_service'];
        $data['target_ratarataunitbreakdown'] =  $data["datatarget"][0]['jumlah_unit_breakdown'];
        #pa diatas target totalhm
        $data['target_pa'] =  $data["datatarget"][0]['pa'];
        $data['target_ma'] =  $data["datatarget"][0]['ma'];
        $data['target_totalhm'] =  24 * $data['target_pa'] * $data['target_populasi'] / 100;
        $data['target_totalbd'] = (100 - $data['target_pa']) *  $data['target_totalhm'] / 100;
        $data['target_unitchangeshift3035'] =   $data["datatarget"][0]['jumlah_change_shift_km_30_35'];
        $data['target_breakdown'] = $data["datatarget"][0]['breakdown'];
        $data['target_change_shift'] = $data["datatarget"][0]['change_shift'];
        $data['target_refueling'] = $data["datatarget"][0]['refueling'];
        $data['target_antri_loading'] = $data["datatarget"][0]['antri_loading'];
        $data['target_antri_dumping'] = $data["datatarget"][0]['antri_dumping'];
        $data['target_rest_time'] = $data["datatarget"][0]['rest_time'];
        $data['target_standbytime'] =   $data['target_change_shift']
            + $data['target_refueling']
            + $data['target_antri_loading']
            + $data['target_antri_dumping']
            + $data['target_rest_time'];

        $data['target_cycle_time'] = $data["datatarget"][0]['cycle_time'];
        $data['target_travel_time'] = $data["datatarget"][0]['travel_time'];
        $data['target_ewh'] = $data["datatarget"][0]['ewh'];
        $data['target_ua'] = $data["datatarget"][0]['ua'];
        $data['target_kecepatan_rata_rata'] = $data["datatarget"][0]['kecepatan_rata_rata'];
        $data['target_fuel_consumtion_trailer'] = $data["datatarget"][0]['fuel_consumtion_trailer'];
        $data['target_fuel_index_unit_trailer_liter_ton'] = $data["datatarget"][0]['fuel_index_unit_trailer_liter_ton'];
        $data['target_fuel_index_unit_trailer_liter_ton_km'] = $data["datatarget"][0]['fuel_index_unit_trailer_liter_ton_km'];

        // target_percent
        $data['percent_ton'] =   ROUND($data["ton"][0]['sumnett'] / $data["datatarget"][0]['ton'] * 100);
        $data['percent_trip'] =   ROUND($data["trip"][0]['sumtrip'] / $data['target_trip'] * 100);
        $data['percent_average_ton'] =   ROUND($data["avgton"][0]['avgnett'] / $data['target_average_ton'] * 100);
        $data['percent_totaltonkm'] = ROUND($data["totaltonkm"] / $data['target_totaltonkm'] * 100);
        $data['percent_populasi'] = ROUND($data["datapelengkap"][0]['populasi'] / $data['target_populasi'] * 100);
        $data['percent_ratarataunitready'] =    ROUND($data["ratarataunitready"][0]['ratarataunitready'] / $data['target_ratarataunitready'] * 100);
        $data['percent_ratarataunitservice'] =    ROUND($data["unitservice"][0]['unitservice']  /  $data['target_ratarataunitservice']  * 100);
        $data['percent_ratarataunitbreakdown'] =    ROUND($data["unitbreakdown"][0]['unitbreakdown']  /  $data['target_ratarataunitbreakdown']  * 100);
        $data['percent_totalhm'] =   ROUND($data["totalhm"][0]['wh'] / $data['target_totalhm'] * 100);
        $data['percent_totalbd'] =   ROUND($data["totalbd"][0]['totalbd'] / $data['target_totalbd'] * 100);
        $data['percent_pa'] =    ROUND($data["pa"] / $data['target_pa'] * 100);
        $data['percent_ma'] =    ROUND($data["ma"] / $data['target_ma'] * 100);
        $data['percent_unitchangeshift3035'] =     ROUND($data["unitchangeshift3035"][0]['unitchangeshift3035'] / $data["datatarget"][0]['jumlah_change_shift_km_30_35'] * 100);
        $data['percent_standbytime'] =   ROUND($data["standby_time"] / $data['target_standbytime'] * 100);
        $data['percent_breakdown'] =   ROUND($data["breakdown"][0]['breakdown'] / $data["datatarget"][0]['breakdown'] * 100);
        $data['percent_change_shift'] =   ROUND($data["change_shift"][0]['change_shift'] / $data["datatarget"][0]['change_shift'] * 100);
        $data['percent_refueling'] =   ROUND($data["refueling"][0]['refueling'] / $data["datatarget"][0]['refueling'] * 100);
        $data['percent_antri_loading'] =   ROUND($data["antri_loading"] / $data["datatarget"][0]['antri_loading'] * 100);
        $data['percent_antri_dumping'] =   ROUND($data["antri_dumping"][0]['antri_dumping'] / $data["datatarget"][0]['antri_dumping'] * 100);
        $data['percent_rest_time'] =   ROUND($data["rest_time"][0]['rest_time'] / $data["datatarget"][0]['rest_time'] * 100);
        $data['percent_cycle_time'] =   ROUND($data["cycle_time"][0]['cycle_time'] / $data["datatarget"][0]['cycle_time'] * 100);
        $data['percent_travel_time'] =   ROUND($data["travel_time"][0]['travel_time'] / $data["datatarget"][0]['travel_time'] * 100);
        $data['percent_ewh'] =     ROUND($data["ewh"] /   $data['target_ewh'] * 100);
        $data['percent_ua'] =  ROUND($data["ua"] /   $data['target_ua'] * 100);
        $data['percent_kecepatan_rata_rata'] = ROUND($data["kecepatanratarata"] /   $data['target_kecepatan_rata_rata'] * 100);
        $data['percent_fuel_consumtion_trailer'] = ROUND($data["fuelindextrailer"] /   $data['target_fuel_consumtion_trailer'] * 100);
        $data['percent_fuel_index_unit_trailer_liter_ton'] = ROUND($data["fuelindextrailerliterton"] /   $data['target_fuel_index_unit_trailer_liter_ton'] * 100);
        $data['percent_fuel_index_unit_trailer_liter_ton_km'] = ROUND($data["fuelindextrailerlitertonkm"] /   $data['target_fuel_index_unit_trailer_liter_ton_km'] * 100);
        $data["tanggal_akhir"] = $data["datapelengkap"][0]['tanggal'];
        $data["datapelengkap2"] = $this->Daily_produksi_model->datapelengkap();
        $this->load->view('isi/data_dashboard/data_daily_produksi', $data);
    }
    public function select()
    {


        // $daterange = $this->input->get('daterange');
        // $daterange = explode("- ", $daterange);
        // $tanggal_awal = $daterange[0];
        // $tanggal_akhir = $daterange[1];
        $tanggal_akhir = $this->input->get('tanggal_akhir');
        $tanggal_awal = $this->input->get('tanggal_akhir');

        $data["data_terakhir_update"] = $this->Daily_produksi_select_model->data_terakhir_update();
        $data["data_sebelum_update"] = $this->Daily_produksi_select_model->data_sebelum_update();
        $tanggal_terakhir_update = $data["data_terakhir_update"][0]['data_terakhir_update'];
        $tanggal_sebelum_update = $data["data_sebelum_update"][0]['data_sebelum_update'];

        // echo "<pre>";
        // print_r($tanggal_terakhir_update .'>'. $tanggal_akhir .'&&'. $tanggal_sebelum_update .'<'.  $tanggal_akhir);
        // echo "</pre>";
        // die();


        if (
            $tanggal_terakhir_update >= $tanggal_akhir && $tanggal_sebelum_update  <=  $tanggal_awal

        ) {
            // data_target
            $data["datatarget"] = $this->Daily_produksi_select_model->datatarget($tanggal_akhir);

            $table_target_namakolom = $this->db->list_fields('tbl_target_parameterdailyproduksi');
            foreach ($table_target_namakolom as $key => $value) {
                # code...

                if (isset($data["datatarget"][0][$value])) {
                    $data["datatarget"][0][$value] =  $data["datatarget"][0][$value];
                } else {
                    $data["datatarget"][0][$value] = false;
                }
            }

            // datapelengkap
            $data["datapelengkap"] = $this->Daily_produksi_select_model->datapelengkap($tanggal_awal, $tanggal_akhir);
            $data["datapelengkap_date_update_sebelumnya"] = $this->Daily_produksi_select_model->datapelengkap_date_update_sebelumnya($tanggal_akhir);
            $data["datapelengkap_date_update_setelahnya"] = $this->Daily_produksi_select_model->datapelengkap_date_update_setelahnya($tanggal_akhir);
            $table_pelengkap_namakolom = $this->db->list_fields('tbl_pelengkap_parameterdailyproduksi');
            foreach ($table_pelengkap_namakolom as $key => $value) {
                # code...

                if (isset($data["datapelengkap"][0][$value])) {
                    $data["datapelengkap"][0][$value] =  $data["datapelengkap"][0][$value];
                } else {
                    $data["datapelengkap"][0][$value] = false;
                }
            }
            if (isset($data["datapelengkap"][0]['maxdate'])) {
                $data["datapelengkap"][0]['maxdate'] =  $data["datapelengkap"][0]['maxdate'];
            } else {
                if (isset($data["datapelengkap_date_update_sebelumnya"][0]['maxdate'])) {
                    $data["datapelengkap"][0]['maxdate'] =  $data["datapelengkap_date_update_sebelumnya"][0]['maxdate'];
                } else {

                    $data["datapelengkap"][0]['maxdate'] =   $data["datapelengkap_date_update_setelahnya"][0]['maxdate'];
                }

                // $data["datapelengkap"][0]['maxdate'] =   $data["datapelengkap_date_update_sebelumnya"][0]['maxdate'];
            }



            // produksi
            // ton
            $data["ton"] = $this->Daily_produksi_select_model->ton($tanggal_awal, $tanggal_akhir);
            $data["ton_siang"] = $this->Daily_produksi_select_model->ton_siang($tanggal_awal, $tanggal_akhir);
            $data["ton_malam"] = $this->Daily_produksi_select_model->ton_malam($tanggal_awal, $tanggal_akhir);
            // trip
            $data["trip"] = $this->Daily_produksi_select_model->trip($tanggal_awal, $tanggal_akhir);
            $data["trip_siang"] = $this->Daily_produksi_select_model->trip_siang($tanggal_awal, $tanggal_akhir);
            $data["trip_malam"] = $this->Daily_produksi_select_model->trip_malam($tanggal_awal, $tanggal_akhir);
            // avgton
            $data["avgton"] = $this->Daily_produksi_select_model->avgton($tanggal_awal, $tanggal_akhir);
            $data["avgton_siang"] = $this->Daily_produksi_select_model->avgton_siang($tanggal_awal, $tanggal_akhir);
            $data["avgton_malam"] = $this->Daily_produksi_select_model->avgton_malam($tanggal_awal, $tanggal_akhir);
            // avg_distance
            $data["avgdistance"] = $this->Daily_produksi_select_model->avgdistance($tanggal_awal, $tanggal_akhir);
            $data["avgdistance_siang"] = $this->Daily_produksi_select_model->avgdistance_siang($tanggal_awal, $tanggal_akhir);
            $data["avgdistance_malam"] = $this->Daily_produksi_select_model->avgdistance_malam($tanggal_awal, $tanggal_akhir);
            // sumdistance
            $data["sumdistance"] = $this->Daily_produksi_select_model->sumdistance($tanggal_awal, $tanggal_akhir);
            $data["sumdistance_siang"] = $this->Daily_produksi_select_model->sumdistance_siang($tanggal_awal, $tanggal_akhir);
            $data["sumdistance_malam"] = $this->Daily_produksi_select_model->sumdistance_malam($tanggal_awal, $tanggal_akhir);
            // tonhg
            $data["tonhg"] = $this->Daily_produksi_select_model->tonhg($tanggal_awal, $tanggal_akhir);
            $data["tonhg_siang"] = $this->Daily_produksi_select_model->tonhg_siang($tanggal_awal, $tanggal_akhir);
            $data["tonhg_malam"] = $this->Daily_produksi_select_model->tonhg_malam($tanggal_awal, $tanggal_akhir);
            // totaltonkm
            $data["totaltonkm"] = ROUND($data["tonhg"][0]['sumnett'] *  $data["avgdistance"][0]['avgdistance']);
            $data["totaltonkm_siang"] = ROUND($data["tonhg_siang"][0]['sumnett'] *  $data["avgdistance_siang"][0]['avgdistance']);
            $data["totaltonkm_malam"] = ROUND($data["tonhg_malam"][0]['sumnett'] *  $data["avgdistance_malam"][0]['avgdistance']);

            // unit
            // ratarataunitready
            $data["ratarataunitready"] = $this->Daily_produksi_select_model->ratarataunitready($tanggal_awal, $tanggal_akhir);
            $data["ratarataunitreadysiang"] = $this->Daily_produksi_select_model->ratarataunitreadysiang($tanggal_awal, $tanggal_akhir);
            $data["ratarataunitreadymalam"] = $this->Daily_produksi_select_model->ratarataunitreadymalam($tanggal_awal, $tanggal_akhir);
            // unitchangeshift3035
            $data["unitchangeshift3035"] = $this->Daily_produksi_select_model->unitchangeshift3035($tanggal_awal, $tanggal_akhir);
            $data["unitchangeshift3035_siang"] = $this->Daily_produksi_select_model->unitchangeshift3035_siang($tanggal_awal, $tanggal_akhir);
            $data["unitchangeshift3035_malam"] = $this->Daily_produksi_select_model->unitchangeshift3035_malam($tanggal_awal, $tanggal_akhir);
            // unitservice
            $data["unitservice"] = $this->Daily_produksi_select_model->unitservice($tanggal_awal, $tanggal_akhir);
            $data["unitservice_siang"] = $this->Daily_produksi_select_model->unitservice_siang($tanggal_awal, $tanggal_akhir);
            $data["unitservice_malam"] = $this->Daily_produksi_select_model->unitservice_malam($tanggal_awal, $tanggal_akhir);
            // unitbreakdown
            $data["unitbreakdown"] = $this->Daily_produksi_select_model->unitbreakdown($tanggal_awal, $tanggal_akhir);
            $data["unitbreakdown_siang"] = $this->Daily_produksi_select_model->unitbreakdown_siang($tanggal_awal, $tanggal_akhir);
            $data["unitbreakdown_malam"] = $this->Daily_produksi_select_model->unitbreakdown_malam($tanggal_awal, $tanggal_akhir);
            // totalhm
            $data["totalhm"] = $this->Daily_produksi_select_model->totalhm($tanggal_awal, $tanggal_akhir);
            $data["totalhm_siang"] = $this->Daily_produksi_select_model->totalhm_siang($tanggal_awal, $tanggal_akhir);
            $data["totalhm_malam"] = $this->Daily_produksi_select_model->totalhm_malam($tanggal_awal, $tanggal_akhir);
            // totalbd
            $data["totalbd"] = $this->Daily_produksi_select_model->totalbd($tanggal_awal, $tanggal_akhir);
            $data["totalbdsiang"] = $this->Daily_produksi_select_model->totalbdsiang($tanggal_awal, $tanggal_akhir);
            $data["totalbdmalam"] = $this->Daily_produksi_select_model->totalbdmalam($tanggal_awal, $tanggal_akhir);

            //operasional
            $waktutotalbd = $data["totalbd"][0]['maxdate'];
            // ratarataunitready
            $data["ratarataunitready2"] = $this->Daily_produksi_select_model->ratarataunitready2($tanggal_awal, $tanggal_akhir);
            $data["ratarataunitready2siang"] = $this->Daily_produksi_select_model->ratarataunitready2siang($tanggal_awal, $tanggal_akhir);
            $data["ratarataunitready2malam"] = $this->Daily_produksi_select_model->ratarataunitready2malam($tanggal_awal, $tanggal_akhir);

            $data["ratarataproduktifitasunitoperasi"] = round($data["trip"][0]['sumtrip'] / $data["ratarataunitready"][0]['ratarataunitready'], 2);
            $data["counttrip2"] = $this->Daily_produksi_select_model->counttrip2($tanggal_awal, $tanggal_akhir);
            $data["ratarataoptproduktifitasopt"] = $this->Daily_produksi_select_model->ratarataoptproduktifitasopt($tanggal_awal, $tanggal_akhir);
            $data["countopt2trip"] = $this->Daily_produksi_select_model->countopt2trip($tanggal_awal, $tanggal_akhir);

            $data["breakdown"] = $this->Daily_produksi_select_model->breakdown($tanggal_awal, $tanggal_akhir);
            $data["breakdownsiang"] = $this->Daily_produksi_select_model->breakdownsiang($tanggal_awal, $tanggal_akhir);
            $data["breakdownmalam"] = $this->Daily_produksi_select_model->breakdownmalam($tanggal_awal, $tanggal_akhir);
            // changeshift
            $data["change_shift"] = $this->Daily_produksi_select_model->change_shift($tanggal_awal, $tanggal_akhir);
            $data["change_shiftsiang"] = $this->Daily_produksi_select_model->change_shiftsiang($tanggal_awal, $tanggal_akhir);
            $data["change_shiftmalam"] = $this->Daily_produksi_select_model->change_shiftmalam($tanggal_awal, $tanggal_akhir);
            // refueling
            $data["refueling"] = $this->Daily_produksi_select_model->refueling($tanggal_awal, $tanggal_akhir);
            $data["refuelingsiang"] = $this->Daily_produksi_select_model->refuelingsiang($tanggal_awal, $tanggal_akhir);
            $data["refuelingmalam"] = $this->Daily_produksi_select_model->refuelingmalam($tanggal_awal, $tanggal_akhir);
            // antriload
            $data["antri_load"] = $this->Daily_produksi_select_model->antri_load($tanggal_awal, $tanggal_akhir);
            $data["antri_load_siang"] = $this->Daily_produksi_select_model->antri_load_siang($tanggal_awal, $tanggal_akhir);
            $data["antri_load_malam"] = $this->Daily_produksi_select_model->antri_load_malam($tanggal_awal, $tanggal_akhir);
            // coallimit
            $data["coal_limit"] = $this->Daily_produksi_select_model->coal_limit($tanggal_awal, $tanggal_akhir);
            $data["coal_limit_siang"] = $this->Daily_produksi_select_model->coal_limit_siang($tanggal_awal, $tanggal_akhir);
            $data["coal_limit_malam"] = $this->Daily_produksi_select_model->coal_limit_malam($tanggal_awal, $tanggal_akhir);
            // antriloading
            $data["antri_loading"] = $data["antri_load"][0]['antri_load'] + $data["coal_limit"][0]['coal_limit'];
            $data["antri_loading_siang"] = $data["antri_load_siang"][0]['antri_load'] + $data["coal_limit_siang"][0]['coal_limit'];
            $data["antri_loading_malam"] = $data["antri_load_malam"][0]['antri_load'] + $data["coal_limit_malam"][0]['coal_limit'];
            // antri_dumping
            $data["antri_dumping"] = $this->Daily_produksi_select_model->antri_dumping($tanggal_awal, $tanggal_akhir);
            $data["antri_dumping_siang"] = $this->Daily_produksi_select_model->antri_dumping_siang($tanggal_awal, $tanggal_akhir);
            $data["antri_dumping_malam"] = $this->Daily_produksi_select_model->antri_dumping_malam($tanggal_awal, $tanggal_akhir);
            // resttime
            $data["rest_time"] = $this->Daily_produksi_select_model->rest_time($tanggal_awal, $tanggal_akhir);
            $data["rest_time_siang"] = $this->Daily_produksi_select_model->rest_time_siang($tanggal_awal, $tanggal_akhir);
            $data["rest_time_malam"] = $this->Daily_produksi_select_model->rest_time_malam($tanggal_awal, $tanggal_akhir);
            // standby
            $data["standby_time"] =
                $data["change_shift"][0]['change_shift']
                +  $data["refueling"][0]['refueling']
                +  $data["antri_load"][0]['antri_load']
                +  $data["coal_limit"][0]['coal_limit']
                +  $data["antri_dumping"][0]['antri_dumping']
                +  $data["rest_time"][0]['rest_time'];
            $data["standby_time_siang"] =
                $data["change_shiftsiang"][0]['change_shift']
                +  $data["refuelingsiang"][0]['refueling']
                +  $data["antri_load_siang"][0]['antri_load']
                +  $data["coal_limit_siang"][0]['coal_limit']
                +  $data["antri_dumping_siang"][0]['antri_dumping']
                +  $data["rest_time_siang"][0]['rest_time'];
            $data["standby_time_malam"] =
                $data["change_shiftmalam"][0]['change_shift']
                +  $data["refuelingmalam"][0]['refueling']
                +  $data["antri_load_malam"][0]['antri_load']
                +  $data["coal_limit_malam"][0]['coal_limit']
                +  $data["antri_dumping_malam"][0]['antri_dumping']
                +  $data["rest_time_malam"][0]['rest_time'];
            // cycle_time
            $data["cycle_time"] = $this->Daily_produksi_select_model->cycle_time($tanggal_awal, $tanggal_akhir);
            $data["cycle_time_siang"] = $this->Daily_produksi_select_model->cycle_time_siang($tanggal_awal, $tanggal_akhir);
            $data["cycle_time_malam"] = $this->Daily_produksi_select_model->cycle_time_malam($tanggal_awal, $tanggal_akhir);
            // traveltime
            $data["travel_time"] = $this->Daily_produksi_select_model->travel_time($tanggal_awal, $tanggal_akhir);
            $data["travel_time_siang"] = $this->Daily_produksi_select_model->travel_time_siang($tanggal_awal, $tanggal_akhir);
            $data["travel_time_malam"] = $this->Daily_produksi_select_model->travel_time_malam($tanggal_awal, $tanggal_akhir);
            // ewh
            $data["ewh"] = 24 - $data["standby_time"];
            $data["ewh_siang"] = 24 - $data["standby_time_siang"];
            $data["ewh_malam"] = 24 - $data["standby_time_malam"];
            // ua
            $data["ua"] =   ROUND(($data["ewh"] / ($data["breakdown"][0]['breakdown'] + $data["ewh"])) * 100);
            $data["ua_siang"] =   ROUND(($data["ewh_siang"] / ($data["breakdownsiang"][0]['breakdown'] + $data["ewh_siang"])) * 100);
            $data["ua_malam"] =   ROUND(($data["ewh_malam"] / ($data["breakdownmalam"][0]['breakdown'] + $data["ewh_malam"])) * 100);
            // kecepatanratarata
            $data["kecepatanratarata"] = ROUND($data["sumdistance"][0]['sumdistance'] / $data["totalhm"][0]['wh'], 2);
            $data["kecepatanratarata_siang"] = ROUND($data["sumdistance_siang"][0]['sumdistance'] / $data["totalhm_siang"][0]['wh'], 2);
            $data["kecepatanratarata_malam"] = ROUND($data["sumdistance_malam"][0]['sumdistance'] / $data["totalhm_malam"][0]['wh'], 2);

            // fuel
            // $tanggal_awal =  $data["datapelengkap"][0]['tanggal'];
            // tonfuel
            $data["ton_fuel"] = $this->Daily_produksi_select_model->ton_fuel($tanggal_awal, $tanggal_akhir);
            $data["ton_fuel_siang"] = $this->Daily_produksi_select_model->ton_fuel_siang($tanggal_awal, $tanggal_akhir);
            $data["ton_fuel_malam"] = $this->Daily_produksi_select_model->ton_fuel_malam($tanggal_awal, $tanggal_akhir);
            // avg_distance_fuel
            $data["avg_distance_fuel"] = $this->Daily_produksi_select_model->avgdistance_fuel($tanggal_awal, $tanggal_akhir);
            $data["avg_distance_fuel_siang"] = $this->Daily_produksi_select_model->avgdistance_fuel_siang($tanggal_awal, $tanggal_akhir);
            $data["avg_distance_fuel_malam"] = $this->Daily_produksi_select_model->avgdistance_fuel_malam($tanggal_awal, $tanggal_akhir);
            // fuelindextrailer
            $data["fuelindextrailer"] = $data["datapelengkap"][0]['fuelconsumtionunittrailer_siang'] + $data["datapelengkap"][0]['fuelconsumtionunittrailer_malam'];
            // fuelindextrailerliterton
            $data["fuelindextrailerliterton"] = ROUND($data["fuelindextrailer"]  / $data["ton_fuel"][0]['sumnett'], 2);
            $data["fuelindextrailerliterton_siang"] = ROUND($data["datapelengkap"][0]['fuelconsumtionunittrailer_siang'] / $data["ton_fuel_siang"][0]['sumnett'], 2);
            $data["fuelindextrailerliterton_malam"] = ROUND($data["datapelengkap"][0]['fuelconsumtionunittrailer_malam'] / $data["ton_fuel_malam"][0]['sumnett'], 2);
            // fuelindextrailerlitertonkm
            $data["fuelindextrailerlitertonkm"] = ROUND($data["fuelindextrailer"]   / ($data["ton_fuel"][0]['sumnett'] * $data["avg_distance_fuel"][0]['avgdistance']), 3);
            $data["fuelindextrailerlitertonkm_siang"] = ROUND($data["datapelengkap"][0]['fuelconsumtionunittrailer_siang'] / ($data["ton_fuel_siang"][0]['sumnett'] * $data["avg_distance_fuel_siang"][0]['avgdistance']), 3);
            $data["fuelindextrailerlitertonkm_malam"] = ROUND($data["datapelengkap"][0]['fuelconsumtionunittrailer_malam'] / ($data["ton_fuel_malam"][0]['sumnett'] * $data["avg_distance_fuel_malam"][0]['avgdistance']), 3);

            // PA & MA harusdibawah
            $bd = $data["totalbd"][0]['totalbd'];
            $bd_siang = $data["totalbdsiang"][0]['totalbd'];
            $bd_malam = $data["totalbdmalam"][0]['totalbd'];


            $ready =  $data["ratarataunitready2"][0]['ratarataunitready2'];
            $readysiang =  $data["ratarataunitready2siang"][0]['ratarataunitready2'];
            $readymalam =  $data["ratarataunitready2malam"][0]['ratarataunitready2'];
            // pa
            $data["pa"] = ROUND(((($bd * 24) - $ready) / ($bd * 24)) * 100);
            $data["pasiang"] = ROUND(((($bd_siang * 24) - $readysiang) / ($bd_siang * 24)) * 100);
            $data["pamalam"] = ROUND(((($bd_malam * 24) - $readymalam) / ($bd_malam * 24)) * 100);
            // ma
            $data["ma"] = ROUND(((60 *  $data["ewh"]) / ((60 *  $data["ewh"]) +   $data["totalbd"][0]['totalbd'])) * 100);
            $data["ma_siang"] = ROUND(((60 *  $data["ewh_siang"]) / ((60 *  $data["ewh_siang"]) +   $data["totalbdsiang"][0]['totalbd'])) * 100);
            $data["ma_malam"] = ROUND(((60 *  $data["ewh_malam"]) / ((60 *  $data["ewh_malam"]) +   $data["totalbdmalam"][0]['totalbd'])) * 100);

            // target
            $data['target_ton'] =  $data["datatarget"][0]['ton'];
            $data['target_trip'] =  ROUND($data["datatarget"][0]['ton'] / $data["datatarget"][0]['average_ton']);

            // echo "<pre>";
            // print_r($data["datatarget"][0]['ton']);
            // echo "</pre>";
            // die();

            // if ($data["datatarget"][0]['ton'] = 0) {
            //     $data['target_trip'] = 0;
            // } else {
            //     $data["datatarget"][0]['ton'] = $data["datatarget"][0]['ton'];
            // }

            $data['target_average_ton'] = $data["datatarget"][0]['average_ton'];
            $data['target_totaltonkm'] = $data["avgdistance"][0]['avgdistance'] * $data['target_ton'];
            $data['target_populasi'] = $data["datatarget"][0]['populasi'];
            $data['target_ratarataunitready'] =  ROUND($data['target_populasi'] * $data["datatarget"][0]['pa'] / 100);
            $data['target_ratarataunitservice'] =  $data["datatarget"][0]['jumlah_unit_service'];
            $data['target_ratarataunitbreakdown'] =  $data["datatarget"][0]['jumlah_unit_breakdown'];
            #pa diatas target totalhm
            $data['target_pa'] =  $data["datatarget"][0]['pa'];
            $data['target_ma'] =  $data["datatarget"][0]['ma'];
            $data['target_totalhm'] =  24 * $data['target_pa'] * $data['target_populasi'] / 100;
            $data['target_totalbd'] = (100 - $data['target_pa']) *  $data['target_totalhm'] / 100;
            $data['target_unitchangeshift3035'] =   $data["datatarget"][0]['jumlah_change_shift_km_30_35'];
            $data['target_breakdown'] = $data["datatarget"][0]['breakdown'];
            $data['target_change_shift'] = $data["datatarget"][0]['change_shift'];
            $data['target_refueling'] = $data["datatarget"][0]['refueling'];
            $data['target_antri_loading'] = $data["datatarget"][0]['antri_loading'];
            $data['target_antri_dumping'] = $data["datatarget"][0]['antri_dumping'];
            $data['target_rest_time'] = $data["datatarget"][0]['rest_time'];
            $data['target_standbytime'] =   $data['target_change_shift']
                + $data['target_refueling']
                + $data['target_antri_loading']
                + $data['target_antri_dumping']
                + $data['target_rest_time'];

            $data['target_cycle_time'] = $data["datatarget"][0]['cycle_time'];
            $data['target_travel_time'] = $data["datatarget"][0]['travel_time'];
            $data['target_ewh'] = $data["datatarget"][0]['ewh'];
            $data['target_ua'] = $data["datatarget"][0]['ua'];
            $data['target_kecepatan_rata_rata'] = $data["datatarget"][0]['kecepatan_rata_rata'];
            $data['target_fuel_consumtion_trailer'] = $data["datatarget"][0]['fuel_consumtion_trailer'];
            $data['target_fuel_index_unit_trailer_liter_ton'] = $data["datatarget"][0]['fuel_index_unit_trailer_liter_ton'];
            $data['target_fuel_index_unit_trailer_liter_ton_km'] = $data["datatarget"][0]['fuel_index_unit_trailer_liter_ton_km'];

            // target_percent
            $data['percent_ton'] =   ROUND($data["ton"][0]['sumnett'] / $data["datatarget"][0]['ton'] * 100);
            $data['percent_trip'] =   ROUND($data["trip"][0]['sumtrip'] / $data['target_trip'] * 100);
            $data['percent_average_ton'] =   ROUND($data["avgton"][0]['avgnett'] / $data['target_average_ton'] * 100);
            $data['percent_totaltonkm'] = ROUND($data["totaltonkm"] / $data['target_totaltonkm'] * 100);
            $data['percent_populasi'] = ROUND($data["datapelengkap"][0]['populasi'] / $data['target_populasi'] * 100);
            $data['percent_ratarataunitready'] =    ROUND($data["ratarataunitready"][0]['ratarataunitready'] / $data['target_ratarataunitready'] * 100);
            $data['percent_ratarataunitservice'] =    ROUND($data["unitservice"][0]['unitservice']  /  $data['target_ratarataunitservice']  * 100);
            $data['percent_ratarataunitbreakdown'] =    ROUND($data["unitbreakdown"][0]['unitbreakdown']  /  $data['target_ratarataunitbreakdown']  * 100);
            $data['percent_totalhm'] =   ROUND($data["totalhm"][0]['wh'] / $data['target_totalhm'] * 100);
            $data['percent_totalbd'] =   ROUND($data["totalbd"][0]['totalbd'] / $data['target_totalbd'] * 100);
            $data['percent_pa'] =    ROUND($data["pa"] / $data['target_pa'] * 100);
            $data['percent_ma'] =    ROUND($data["ma"] / $data['target_ma'] * 100);
            $data['percent_unitchangeshift3035'] =     ROUND($data["unitchangeshift3035"][0]['unitchangeshift3035'] / $data["datatarget"][0]['jumlah_change_shift_km_30_35'] * 100);
            $data['percent_standbytime'] =   ROUND($data["standby_time"] / $data['target_standbytime'] * 100);
            $data['percent_breakdown'] =   ROUND($data["breakdown"][0]['breakdown'] / $data["datatarget"][0]['breakdown'] * 100);
            $data['percent_change_shift'] =   ROUND($data["change_shift"][0]['change_shift'] / $data["datatarget"][0]['change_shift'] * 100);
            $data['percent_refueling'] =   ROUND($data["refueling"][0]['refueling'] / $data["datatarget"][0]['refueling'] * 100);
            $data['percent_antri_loading'] =   ROUND($data["antri_loading"] / $data["datatarget"][0]['antri_loading'] * 100);
            $data['percent_antri_dumping'] =   ROUND($data["antri_dumping"][0]['antri_dumping'] / $data["datatarget"][0]['antri_dumping'] * 100);
            $data['percent_rest_time'] =   ROUND($data["rest_time"][0]['rest_time'] / $data["datatarget"][0]['rest_time'] * 100);
            $data['percent_cycle_time'] =   ROUND($data["cycle_time"][0]['cycle_time'] / $data["datatarget"][0]['cycle_time'] * 100);
            $data['percent_travel_time'] =   ROUND($data["travel_time"][0]['travel_time'] / $data["datatarget"][0]['travel_time'] * 100);
            $data['percent_ewh'] =     ROUND($data["ewh"] /   $data['target_ewh'] * 100);
            $data['percent_ua'] =  ROUND($data["ua"] /   $data['target_ua'] * 100);
            $data['percent_kecepatan_rata_rata'] = ROUND($data["kecepatanratarata"] /   $data['target_kecepatan_rata_rata'] * 100);
            $data['percent_fuel_consumtion_trailer'] = ROUND($data["fuelindextrailer"] /   $data['target_fuel_consumtion_trailer'] * 100);
            $data['percent_fuel_index_unit_trailer_liter_ton'] = ROUND($data["fuelindextrailerliterton"] /   $data['target_fuel_index_unit_trailer_liter_ton'] * 100);
            $data['percent_fuel_index_unit_trailer_liter_ton_km'] = ROUND($data["fuelindextrailerlitertonkm"] /   $data['target_fuel_index_unit_trailer_liter_ton_km'] * 100);

            $data["tanggal_akhir"] = $tanggal_akhir;
            $data["datapelengkap2"] = $this->Daily_produksi_model->datapelengkap();




            $this->load->view('isi/data_dashboard/data_daily_produksi', $data);
        } else {
            $this->load->view('errors/error_belumupdate');
        }
    }
    public function export_select_excel()
    {


        $tanggal_akhir = $this->input->get('tanggal_akhir');
        $tanggal_awal = $this->input->get('tanggal_akhir');

        $data["data_terakhir_update"] = $this->Daily_produksi_select_model->data_terakhir_update();
        $data["data_sebelum_update"] = $this->Daily_produksi_select_model->data_sebelum_update();
        $tanggal_update_saja = $this->Daily_produksi_select_model->tanggal_update_saja($tanggal_awal, $tanggal_akhir);
        $data["datapelengkap"] = $this->Daily_produksi_select_model->datapelengkap($tanggal_awal, $tanggal_akhir);
        // produksi
        // ton
        $data["ton"] = $this->Daily_produksi_select_model->ton($tanggal_awal, $tanggal_akhir);
        $data["ton_siang"] = $this->Daily_produksi_select_model->ton_siang($tanggal_awal, $tanggal_akhir);
        $data["ton_malam"] = $this->Daily_produksi_select_model->ton_malam($tanggal_awal, $tanggal_akhir);
        // trip
        $data["trip"] = $this->Daily_produksi_select_model->trip($tanggal_awal, $tanggal_akhir);
        $data["trip_siang"] = $this->Daily_produksi_select_model->trip_siang($tanggal_awal, $tanggal_akhir);
        $data["trip_malam"] = $this->Daily_produksi_select_model->trip_malam($tanggal_awal, $tanggal_akhir);
        // avgton
        $data["avgton"] = $this->Daily_produksi_select_model->avgton($tanggal_awal, $tanggal_akhir);
        $data["avgton_siang"] = $this->Daily_produksi_select_model->avgton_siang($tanggal_awal, $tanggal_akhir);
        $data["avgton_malam"] = $this->Daily_produksi_select_model->avgton_malam($tanggal_awal, $tanggal_akhir);
        // avg_distance
        $data["avgdistance"] = $this->Daily_produksi_select_model->avgdistance($tanggal_awal, $tanggal_akhir);
        $data["avgdistance_siang"] = $this->Daily_produksi_select_model->avgdistance_siang($tanggal_awal, $tanggal_akhir);
        $data["avgdistance_malam"] = $this->Daily_produksi_select_model->avgdistance_malam($tanggal_awal, $tanggal_akhir);
        // sumdistance
        $data["sumdistance"] = $this->Daily_produksi_select_model->sumdistance($tanggal_awal, $tanggal_akhir);
        $data["sumdistance_siang"] = $this->Daily_produksi_select_model->sumdistance_siang($tanggal_awal, $tanggal_akhir);
        $data["sumdistance_malam"] = $this->Daily_produksi_select_model->sumdistance_malam($tanggal_awal, $tanggal_akhir);
        // tonhg
        $data["tonhg"] = $this->Daily_produksi_select_model->tonhg($tanggal_awal, $tanggal_akhir);
        $data["tonhg_siang"] = $this->Daily_produksi_select_model->tonhg_siang($tanggal_awal, $tanggal_akhir);
        $data["tonhg_malam"] = $this->Daily_produksi_select_model->tonhg_malam($tanggal_awal, $tanggal_akhir);
        // totaltonkm
        $data["totaltonkm"] = ROUND($data["tonhg"][0]['sumnett'] *  $data["avgdistance"][0]['avgdistance']);
        $data["totaltonkm_siang"] = ROUND($data["tonhg_siang"][0]['sumnett'] *  $data["avgdistance_siang"][0]['avgdistance']);
        $data["totaltonkm_malam"] = ROUND($data["tonhg_malam"][0]['sumnett'] *  $data["avgdistance_malam"][0]['avgdistance']);

        // unit
        // ratarataunitready
        $data["ratarataunitready"] = $this->Daily_produksi_select_model->ratarataunitready($tanggal_awal, $tanggal_akhir);
        $data["ratarataunitreadysiang"] = $this->Daily_produksi_select_model->ratarataunitreadysiang($tanggal_awal, $tanggal_akhir);
        $data["ratarataunitreadymalam"] = $this->Daily_produksi_select_model->ratarataunitreadymalam($tanggal_awal, $tanggal_akhir);
        // unitchangeshift3035
        $data["unitchangeshift3035"] = $this->Daily_produksi_select_model->unitchangeshift3035($tanggal_awal, $tanggal_akhir);
        $data["unitchangeshift3035_siang"] = $this->Daily_produksi_select_model->unitchangeshift3035_siang($tanggal_awal, $tanggal_akhir);
        $data["unitchangeshift3035_malam"] = $this->Daily_produksi_select_model->unitchangeshift3035_malam($tanggal_awal, $tanggal_akhir);
        // unitservice
        $data["unitservice"] = $this->Daily_produksi_select_model->unitservice($tanggal_awal, $tanggal_akhir);
        $data["unitservice_siang"] = $this->Daily_produksi_select_model->unitservice_siang($tanggal_awal, $tanggal_akhir);
        $data["unitservice_malam"] = $this->Daily_produksi_select_model->unitservice_malam($tanggal_awal, $tanggal_akhir);
        // unitbreakdown
        $data["unitbreakdown"] = $this->Daily_produksi_select_model->unitbreakdown($tanggal_awal, $tanggal_akhir);
        $data["unitbreakdown_siang"] = $this->Daily_produksi_select_model->unitbreakdown_siang($tanggal_awal, $tanggal_akhir);
        $data["unitbreakdown_malam"] = $this->Daily_produksi_select_model->unitbreakdown_malam($tanggal_awal, $tanggal_akhir);
        // totalhm
        $data["totalhm"] = $this->Daily_produksi_select_model->totalhm($tanggal_awal, $tanggal_akhir);
        $data["totalhm_siang"] = $this->Daily_produksi_select_model->totalhm_siang($tanggal_awal, $tanggal_akhir);
        $data["totalhm_malam"] = $this->Daily_produksi_select_model->totalhm_malam($tanggal_awal, $tanggal_akhir);
        // totalbd
        $data["totalbd"] = $this->Daily_produksi_select_model->totalbd($tanggal_awal, $tanggal_akhir);
        $data["totalbdsiang"] = $this->Daily_produksi_select_model->totalbdsiang($tanggal_awal, $tanggal_akhir);
        $data["totalbdmalam"] = $this->Daily_produksi_select_model->totalbdmalam($tanggal_awal, $tanggal_akhir);

        //operasional
        $waktutotalbd = $data["totalbd"][0]['maxdate'];
        // ratarataunitready
        $data["ratarataunitready2"] = $this->Daily_produksi_select_model->ratarataunitready2($tanggal_awal, $tanggal_akhir);
        $data["ratarataunitready2siang"] = $this->Daily_produksi_select_model->ratarataunitready2siang($tanggal_awal, $tanggal_akhir);
        $data["ratarataunitready2malam"] = $this->Daily_produksi_select_model->ratarataunitready2malam($tanggal_awal, $tanggal_akhir);
        // ratarataproduktifitasunitoperasi
        $data["ratarataproduktifitasunitoperasi"] = round($data["trip"][0]['sumtrip'] / $data["ratarataunitready"][0]['ratarataunitready'], 2);
        $data["ratarataproduktifitasunitoperasi_siang"] = round($data["trip_siang"][0]['sumtrip'] / $data["ratarataunitreadysiang"][0]['ratarataunitready'], 2);
        $data["ratarataproduktifitasunitoperasi_malam"] = round($data["trip_malam"][0]['sumtrip'] / $data["ratarataunitreadymalam"][0]['ratarataunitready'], 2);
        // trip>2
        $data["counttrip2"] = $this->Daily_produksi_select_model->counttrip2($tanggal_awal, $tanggal_akhir);
        $data["counttrip2siang"] = $this->Daily_produksi_select_model->counttrip2siang($tanggal_awal, $tanggal_akhir);
        $data["counttrip2malam"] = $this->Daily_produksi_select_model->counttrip2malam($tanggal_awal, $tanggal_akhir);
        // ratarataoptproduktifitasopt
        $data["ratarataoptproduktifitasopt"] = $this->Daily_produksi_select_model->ratarataoptproduktifitasopt($tanggal_awal, $tanggal_akhir);
        $data["ratarataoptproduktifitasopt_siang"] = $this->Daily_produksi_select_model->ratarataoptproduktifitasopt_siang($tanggal_awal, $tanggal_akhir);
        $data["ratarataoptproduktifitasopt_malam"] = $this->Daily_produksi_select_model->ratarataoptproduktifitasopt_malam($tanggal_awal, $tanggal_akhir);
        // countopt2trip
        $data["countopt2trip"] = $this->Daily_produksi_select_model->countopt2trip($tanggal_awal, $tanggal_akhir);
        $data["countopt2trip_siang"] = $this->Daily_produksi_select_model->countopt2tripsiang($tanggal_awal, $tanggal_akhir);
        $data["countopt2trip_malam"] = $this->Daily_produksi_select_model->countopt2tripmalam($tanggal_awal, $tanggal_akhir);

        $data["breakdown"] = $this->Daily_produksi_select_model->breakdown($tanggal_awal, $tanggal_akhir);
        $data["breakdownsiang"] = $this->Daily_produksi_select_model->breakdownsiang($tanggal_awal, $tanggal_akhir);
        $data["breakdownmalam"] = $this->Daily_produksi_select_model->breakdownmalam($tanggal_awal, $tanggal_akhir);
        // changeshift
        $data["change_shift"] = $this->Daily_produksi_select_model->change_shift($tanggal_awal, $tanggal_akhir);
        $data["change_shiftsiang"] = $this->Daily_produksi_select_model->change_shiftsiang($tanggal_awal, $tanggal_akhir);
        $data["change_shiftmalam"] = $this->Daily_produksi_select_model->change_shiftmalam($tanggal_awal, $tanggal_akhir);
        // refueling
        $data["refueling"] = $this->Daily_produksi_select_model->refueling($tanggal_awal, $tanggal_akhir);
        $data["refuelingsiang"] = $this->Daily_produksi_select_model->refuelingsiang($tanggal_awal, $tanggal_akhir);
        $data["refuelingmalam"] = $this->Daily_produksi_select_model->refuelingmalam($tanggal_awal, $tanggal_akhir);
        // antriload
        $data["antri_load"] = $this->Daily_produksi_select_model->antri_load($tanggal_awal, $tanggal_akhir);
        $data["antri_load_siang"] = $this->Daily_produksi_select_model->antri_load_siang($tanggal_awal, $tanggal_akhir);
        $data["antri_load_malam"] = $this->Daily_produksi_select_model->antri_load_malam($tanggal_awal, $tanggal_akhir);
        // coallimit
        $data["coal_limit"] = $this->Daily_produksi_select_model->coal_limit($tanggal_awal, $tanggal_akhir);
        $data["coal_limit_siang"] = $this->Daily_produksi_select_model->coal_limit_siang($tanggal_awal, $tanggal_akhir);
        $data["coal_limit_malam"] = $this->Daily_produksi_select_model->coal_limit_malam($tanggal_awal, $tanggal_akhir);
        // antriloading
        $data["antri_loading"] = $data["antri_load"][0]['antri_load'] + $data["coal_limit"][0]['coal_limit'];
        $data["antri_loading_siang"] = $data["antri_load_siang"][0]['antri_load'] + $data["coal_limit_siang"][0]['coal_limit'];
        $data["antri_loading_malam"] = $data["antri_load_malam"][0]['antri_load'] + $data["coal_limit_malam"][0]['coal_limit'];
        // antri_dumping
        $data["antri_dumping"] = $this->Daily_produksi_select_model->antri_dumping($tanggal_awal, $tanggal_akhir);
        $data["antri_dumping_siang"] = $this->Daily_produksi_select_model->antri_dumping_siang($tanggal_awal, $tanggal_akhir);
        $data["antri_dumping_malam"] = $this->Daily_produksi_select_model->antri_dumping_malam($tanggal_awal, $tanggal_akhir);
        // resttime
        $data["rest_time"] = $this->Daily_produksi_select_model->rest_time($tanggal_awal, $tanggal_akhir);
        $data["rest_time_siang"] = $this->Daily_produksi_select_model->rest_time_siang($tanggal_awal, $tanggal_akhir);
        $data["rest_time_malam"] = $this->Daily_produksi_select_model->rest_time_malam($tanggal_awal, $tanggal_akhir);
        // standby
        $data["standby_time"] =
            $data["change_shift"][0]['change_shift']
            +  $data["refueling"][0]['refueling']
            +  $data["antri_load"][0]['antri_load']
            +  $data["coal_limit"][0]['coal_limit']
            +  $data["antri_dumping"][0]['antri_dumping']
            +  $data["rest_time"][0]['rest_time'];
        $data["standby_time_siang"] =
            $data["change_shiftsiang"][0]['change_shift']
            +  $data["refuelingsiang"][0]['refueling']
            +  $data["antri_load_siang"][0]['antri_load']
            +  $data["coal_limit_siang"][0]['coal_limit']
            +  $data["antri_dumping_siang"][0]['antri_dumping']
            +  $data["rest_time_siang"][0]['rest_time'];
        $data["standby_time_malam"] =
            $data["change_shiftmalam"][0]['change_shift']
            +  $data["refuelingmalam"][0]['refueling']
            +  $data["antri_load_malam"][0]['antri_load']
            +  $data["coal_limit_malam"][0]['coal_limit']
            +  $data["antri_dumping_malam"][0]['antri_dumping']
            +  $data["rest_time_malam"][0]['rest_time'];
        // cycle_time
        $data["cycle_time"] = $this->Daily_produksi_select_model->cycle_time($tanggal_awal, $tanggal_akhir);
        $data["cycle_time_siang"] = $this->Daily_produksi_select_model->cycle_time_siang($tanggal_awal, $tanggal_akhir);
        $data["cycle_time_malam"] = $this->Daily_produksi_select_model->cycle_time_malam($tanggal_awal, $tanggal_akhir);
        // traveltime
        $data["travel_time"] = $this->Daily_produksi_select_model->travel_time($tanggal_awal, $tanggal_akhir);
        $data["travel_time_siang"] = $this->Daily_produksi_select_model->travel_time_siang($tanggal_awal, $tanggal_akhir);
        $data["travel_time_malam"] = $this->Daily_produksi_select_model->travel_time_malam($tanggal_awal, $tanggal_akhir);
        // ewh
        $data["ewh"] = 24 - $data["standby_time"];
        $data["ewh_siang"] = 24 - $data["standby_time_siang"];
        $data["ewh_malam"] = 24 - $data["standby_time_malam"];
        // ua
        $data["ua"] =   ROUND(($data["ewh"] / ($data["breakdown"][0]['breakdown'] + $data["ewh"])) * 100);
        $data["ua_siang"] =   ROUND(($data["ewh_siang"] / ($data["breakdownsiang"][0]['breakdown'] + $data["ewh_siang"])) * 100);
        $data["ua_malam"] =   ROUND(($data["ewh_malam"] / ($data["breakdownmalam"][0]['breakdown'] + $data["ewh_malam"])) * 100);
        // kecepatanratarata
        $data["kecepatanratarata"] = ROUND($data["sumdistance"][0]['sumdistance'] / $data["totalhm"][0]['wh'], 2);
        $data["kecepatanratarata_siang"] = ROUND($data["sumdistance_siang"][0]['sumdistance'] / $data["totalhm_siang"][0]['wh'], 2);
        $data["kecepatanratarata_malam"] = ROUND($data["sumdistance_malam"][0]['sumdistance'] / $data["totalhm_malam"][0]['wh'], 2);

        // fuel
        // $tanggal_awal =  $data["datapelengkap"][0]['tanggal'];
        // tonfuel
        $data["ton_fuel"] = $this->Daily_produksi_select_model->ton_fuel($tanggal_awal, $tanggal_akhir);
        $data["ton_fuel_siang"] = $this->Daily_produksi_select_model->ton_fuel_siang($tanggal_awal, $tanggal_akhir);
        $data["ton_fuel_malam"] = $this->Daily_produksi_select_model->ton_fuel_malam($tanggal_awal, $tanggal_akhir);
        // avg_distance_fuel
        $data["avg_distance_fuel"] = $this->Daily_produksi_select_model->avgdistance_fuel($tanggal_awal, $tanggal_akhir);
        $data["avg_distance_fuel_siang"] = $this->Daily_produksi_select_model->avgdistance_fuel_siang($tanggal_awal, $tanggal_akhir);
        $data["avg_distance_fuel_malam"] = $this->Daily_produksi_select_model->avgdistance_fuel_malam($tanggal_awal, $tanggal_akhir);
        // fuelindextrailer
        $data["fuelindextrailer"] = $data["datapelengkap"][0]['fuelconsumtionunittrailer_siang'] + $data["datapelengkap"][0]['fuelconsumtionunittrailer_malam'];
        // fuelindextrailerliterton
        $data["fuelindextrailerliterton"] = ROUND($data["fuelindextrailer"]  / $data["ton_fuel"][0]['sumnett'], 2);
        $data["fuelindextrailerliterton_siang"] = ROUND($data["datapelengkap"][0]['fuelconsumtionunittrailer_siang'] / $data["ton_fuel_siang"][0]['sumnett'], 2);
        $data["fuelindextrailerliterton_malam"] = ROUND($data["datapelengkap"][0]['fuelconsumtionunittrailer_malam'] / $data["ton_fuel_malam"][0]['sumnett'], 2);
        // fuelindextrailerlitertonkm
        $data["fuelindextrailerlitertonkm"] = ROUND($data["fuelindextrailer"]   / ($data["ton_fuel"][0]['sumnett'] * $data["avg_distance_fuel"][0]['avgdistance']), 3);
        $data["fuelindextrailerlitertonkm_siang"] = ROUND($data["datapelengkap"][0]['fuelconsumtionunittrailer_siang'] / ($data["ton_fuel_siang"][0]['sumnett'] * $data["avg_distance_fuel_siang"][0]['avgdistance']), 3);
        $data["fuelindextrailerlitertonkm_malam"] = ROUND($data["datapelengkap"][0]['fuelconsumtionunittrailer_malam'] / ($data["ton_fuel_malam"][0]['sumnett'] * $data["avg_distance_fuel_malam"][0]['avgdistance']), 3);

        // PA & MA harusdibawah
        $bd = $data["totalbd"][0]['totalbd'];
        $bd_siang = $data["totalbdsiang"][0]['totalbd'];
        $bd_malam = $data["totalbdmalam"][0]['totalbd'];


        $ready =  $data["ratarataunitready2"][0]['ratarataunitready2'];
        $readysiang =  $data["ratarataunitready2siang"][0]['ratarataunitready2'];
        $readymalam =  $data["ratarataunitready2malam"][0]['ratarataunitready2'];
        // pa
        $data["pa"] = ROUND(((($bd * 24) - $ready) / ($bd * 24)) * 100);
        $data["pasiang"] = ROUND(((($bd_siang * 24) - $readysiang) / ($bd_siang * 24)) * 100);
        $data["pamalam"] = ROUND(((($bd_malam * 24) - $readymalam) / ($bd_malam * 24)) * 100);
        // ma
        $data["ma"] = ROUND(((60 *  $data["ewh"]) / ((60 *  $data["ewh"]) +   $data["totalbd"][0]['totalbd'])) * 100);
        $data["ma_siang"] = ROUND(((60 *  $data["ewh_siang"]) / ((60 *  $data["ewh_siang"]) +   $data["totalbdsiang"][0]['totalbd'])) * 100);
        $data["ma_malam"] = ROUND(((60 *  $data["ewh_malam"]) / ((60 *  $data["ewh_malam"]) +   $data["totalbdmalam"][0]['totalbd'])) * 100);

        $inputFileName = './assets/PHPExcel/dailiy_parameter_template.xlsx';
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);


        // Create new Spreadsheet object
        // $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator('Andoyo - Java Web Media')
            ->setLastModifiedBy('Andoyo - Java Web Medi')
            ->setTitle('Office 2007 XLSX Test Document')
            ->setSubject('Office 2007 XLSX Test Document')
            ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Test result file');

        // Add some data
        // $spreadsheet->setActiveSheetIndex(0)

        //     ->setCellValue('A1', 'KODE PROVINSI')
        //     ->setCellValue('B1', 'NAMA PROVINSI');

        // Miscellaneous glyphs, UTF-8

        $spreadsheet->setActiveSheetIndex(0)
            // tanggal
            ->setCellValue('C3',      $tanggal_update_saja[0]['harisaja'])
            ->setCellValue('C4',      $tanggal_update_saja[0]['maxdate'])
            // produksi
            // ton
            ->setCellValue('F8',   $data["ton_siang"][0]['sumnett'])
            ->setCellValue('H8', $data["ton_malam"][0]['sumnett'])
            ->setCellValue('J8', $data["ton"][0]['sumnett'])
            // trip
            ->setCellValue('F9',   $data["trip_siang"][0]['sumtrip'])
            ->setCellValue('H9', $data["trip_malam"][0]['sumtrip'])
            ->setCellValue('J9', $data["trip"][0]['sumtrip'])
            // avgton
            ->setCellValue('F10',   $data["avgton_siang"][0]['avgnett'])
            ->setCellValue('H10', $data["avgton_malam"][0]['avgnett'])
            ->setCellValue('J10', $data["avgton"][0]['avgnett'])
            // avg_distance
            ->setCellValue('F11',   $data["avgdistance_siang"][0]['avgdistance'])
            ->setCellValue('H11', $data["avgdistance_malam"][0]['avgdistance'])
            ->setCellValue('J11', $data["avgdistance"][0]['avgdistance'])
            // sumdistance
            ->setCellValue('F12',   $data["sumdistance_siang"][0]['sumdistance'])
            ->setCellValue('H12', $data["sumdistance_malam"][0]['sumdistance'])
            ->setCellValue('J12', $data["sumdistance"][0]['sumdistance'])
            // totaltonkm
            ->setCellValue('F13', $data["totaltonkm_siang"])
            ->setCellValue('H13', $data["totaltonkm_malam"])
            ->setCellValue('J13', $data["totaltonkm"])
            // unit
            // populasi
            ->setCellValue('F14', $data["datapelengkap"][0]['populasi'])
            ->setCellValue('H14', $data["datapelengkap"][0]['populasi'])
            ->setCellValue('J14', $data["datapelengkap"][0]['populasi'])
            // ratarataunitready
            ->setCellValue('F15', $data["ratarataunitreadysiang"][0]['ratarataunitready'])
            ->setCellValue('H15', $data["ratarataunitreadymalam"][0]['ratarataunitready'])
            ->setCellValue('J15', $data["ratarataunitready"][0]['ratarataunitready'])
            // unitservice
            ->setCellValue('F16', $data["unitservice_siang"][0]['unitservice'])
            ->setCellValue('H16', $data["unitservice_malam"][0]['unitservice'])
            ->setCellValue('J16', $data["unitservice"][0]['unitservice'])
            // unitbreakdown
            ->setCellValue('F17', $data["unitbreakdown_siang"][0]['unitbreakdown'])
            ->setCellValue('H17', $data["unitbreakdown_malam"][0]['unitbreakdown'])
            ->setCellValue('J17', $data["unitbreakdown"][0]['unitbreakdown'])
            // totalhm
            ->setCellValue('F18', $data["totalhm_siang"][0]['wh'])
            ->setCellValue('H18', $data["totalhm_malam"][0]['wh'])
            ->setCellValue('J18', $data["totalhm"][0]['wh'])
            // totalbd
            ->setCellValue('F19', $data["totalbdsiang"][0]['totalbd'])
            ->setCellValue('H19', $data["totalbdmalam"][0]['totalbd'])
            ->setCellValue('J19', $data["totalbd"][0]['totalbd'])
            // pa
            ->setCellValue('F20', $data["pasiang"] . '%')
            ->setCellValue('H20', $data["pamalam"] . '%')
            ->setCellValue('J20', $data["pa"] . '%')
            // ma
            ->setCellValue('F21', $data["ma_siang"] . '%')
            ->setCellValue('H21', $data["ma_malam"] . '%')
            ->setCellValue('J21', $data["ma"] . '%')
            // operator
            // jumlahoperator
            ->setCellValue('F22', $data["datapelengkap"][0]['jumlahoperator_siang'])
            ->setCellValue('H22', $data["datapelengkap"][0]['jumlahoperator_malam'])
            ->setCellValue('J22', $data["datapelengkap"][0]['jumlahoperator_siang'] + $data["datapelengkap"][0]['jumlahoperator_malam'])
            // jumlahoperatortraining
            ->setCellValue('F23', $data["datapelengkap"][0]['jumlahoperatortraining'])
            ->setCellValue('H23', $data["datapelengkap"][0]['jumlahoperatortraining'])
            ->setCellValue('J23', $data["datapelengkap"][0]['jumlahoperatortraining'])
            // jumlahoperatorsakit
            ->setCellValue('F24', $data["datapelengkap"][0]['jumlahoperatorsakit'])
            ->setCellValue('H24', $data["datapelengkap"][0]['jumlahoperatorsakit'])
            ->setCellValue('J24', $data["datapelengkap"][0]['jumlahoperatorsakit'])
            // jumlahoperatorcuti
            ->setCellValue('F25', $data["datapelengkap"][0]['jumlahoperatorcuti'])
            ->setCellValue('H25', $data["datapelengkap"][0]['jumlahoperatorcuti'])
            ->setCellValue('J25', $data["datapelengkap"][0]['jumlahoperatorcuti'])
            // jumlahoperatormangkir
            ->setCellValue('F26', $data["datapelengkap"][0]['jumlahoperatormangkir'])
            ->setCellValue('H26', $data["datapelengkap"][0]['jumlahoperatormangkir'])
            ->setCellValue('J26', $data["datapelengkap"][0]['jumlahoperatormangkir'])
            // jumlahoperatortidaksiapbekerja
            ->setCellValue('F27', $data["datapelengkap"][0]['jumlahoperatortidaksiapbekerja'])
            ->setCellValue('H27', $data["datapelengkap"][0]['jumlahoperatortidaksiapbekerja'])
            ->setCellValue('J27', $data["datapelengkap"][0]['jumlahoperatortidaksiapbekerja'])
            // jumlahoperatoroff
            ->setCellValue('F28', $data["datapelengkap"][0]['jumlahoperatoroff'])
            ->setCellValue('H28', $data["datapelengkap"][0]['jumlahoperatoroff'])
            ->setCellValue('J28', $data["datapelengkap"][0]['jumlahoperatoroff'])
            // jumlahoperatorsiapoperasi
            ->setCellValue('F29', $data["datapelengkap"][0]['jumlahoperatorsiapoperasi_siang'])
            ->setCellValue('H29', $data["datapelengkap"][0]['jumlahoperatorsiapoperasi_malam'])
            ->setCellValue('J29', $data["datapelengkap"][0]['jumlahoperatorsiapoperasi_siang'] + $data["datapelengkap"][0]['jumlahoperatorsiapoperasi_malam'])
            // operasional
            // jumlahunitoperasi
            ->setCellValue('F30', $data["ratarataunitreadysiang"][0]['ratarataunitready'])
            ->setCellValue('H30', $data["ratarataunitreadymalam"][0]['ratarataunitready'])
            ->setCellValue('J30', $data["ratarataunitready"][0]['ratarataunitready'])
            // unitchangeshift3035
            ->setCellValue('F31', $data["unitchangeshift3035_siang"][0]['unitchangeshift3035'])
            ->setCellValue('H31', $data["unitchangeshift3035_malam"][0]['unitchangeshift3035'])
            ->setCellValue('J31', $data["unitchangeshift3035"][0]['unitchangeshift3035'])
            // ratarataproduktifitasunitoperasi
            ->setCellValue('F32', $data["ratarataproduktifitasunitoperasi"])
            ->setCellValue('H32', $data["ratarataproduktifitasunitoperasi_siang"])
            ->setCellValue('J32', $data["ratarataproduktifitasunitoperasi_malam"])
            // counttrip2
            ->setCellValue('F33', $data["counttrip2"][0]['counttrip2'])
            ->setCellValue('H33', $data["counttrip2siang"][0]['counttrip2'])
            ->setCellValue('J33', $data["counttrip2malam"][0]['counttrip2'])
            // ratarataproduktifitasoperator
            ->setCellValue('F34', $data["ratarataoptproduktifitasopt"][0]['ratarataoptproduktifitasopt'])
            ->setCellValue('H34', $data["ratarataoptproduktifitasopt_siang"][0]['ratarataoptproduktifitasopt'])
            ->setCellValue('J34', $data["ratarataoptproduktifitasopt_malam"][0]['ratarataoptproduktifitasopt'])
            // countopt2trip
            ->setCellValue('F35', $data["countopt2trip_siang"][0]['countopt2trip'])
            ->setCellValue('H35', $data["countopt2trip_malam"][0]['countopt2trip'])
            ->setCellValue('J35', $data["countopt2trip"][0]['countopt2trip'])

            // stbtime
            ->setCellValue('F36', $data["standby_time_siang"])
            ->setCellValue('H36', $data["standby_time_malam"])
            ->setCellValue('J36', $data["standby_time"])
            // breakdown
            ->setCellValue('F37',   $data["breakdownsiang"][0]['breakdown'])
            ->setCellValue('H37',   $data["breakdownmalam"][0]['breakdown'])
            ->setCellValue('J37',   $data["breakdown"][0]['breakdown'])
            // changeshift
            ->setCellValue('F38',   $data["change_shiftsiang"][0]['change_shift'])
            ->setCellValue('H38',   $data["change_shiftmalam"][0]['change_shift'])
            ->setCellValue('J38',   $data["change_shift"][0]['change_shift'])
            // refueling
            ->setCellValue('F39',   $data["refuelingsiang"][0]['refueling'])
            ->setCellValue('H39',   $data["refuelingmalam"][0]['refueling'])
            ->setCellValue('J39',   $data["refueling"][0]['refueling'])
            // antri_loading
            ->setCellValue('F40',   $data["antri_loading_siang"])
            ->setCellValue('H40',   $data["antri_loading_malam"])
            ->setCellValue('J40',     $data["antri_loading"])
            // antri_dumping
            ->setCellValue('F41',   $data["antri_dumping_siang"][0]['antri_dumping'])
            ->setCellValue('H41',   $data["antri_dumping_malam"][0]['antri_dumping'])
            ->setCellValue('J41',   $data["antri_dumping"][0]['antri_dumping'])
            // resttime
            ->setCellValue('F42',   $data["rest_time_siang"][0]['rest_time'])
            ->setCellValue('H42',   $data["rest_time_malam"][0]['rest_time'])
            ->setCellValue('J42',   $data["rest_time"][0]['rest_time'])
            // cycle_time
            ->setCellValue('F43',   $data["cycle_time_siang"][0]['cycle_time'])
            ->setCellValue('H43',   $data["cycle_time_malam"][0]['cycle_time'])
            ->setCellValue('J43',   $data["cycle_time"][0]['cycle_time'])
            // travel_time
            ->setCellValue('F44',   $data["travel_time_siang"][0]['travel_time'])
            ->setCellValue('H44',   $data["travel_time_malam"][0]['travel_time'])
            ->setCellValue('J44',   $data["travel_time"][0]['travel_time'])
            // ewh
            ->setCellValue('F45',     $data["ewh_siang"])
            ->setCellValue('H45',   $data["ewh_malam"])
            ->setCellValue('J45',    $data["ewh"])
            // ua
            ->setCellValue('F46',     $data["ua_siang"])
            ->setCellValue('H46',   $data["ua_malam"])
            ->setCellValue('J46',    $data["ua"])
            // ua
            ->setCellValue('F47',      $data["kecepatanratarata_siang"])
            ->setCellValue('H47',     $data["kecepatanratarata_malam"])
            ->setCellValue('J47',     $data["kecepatanratarata"])
            // fuelindextrailer
            ->setCellValue('F48',    $data["datapelengkap"][0]['fuelconsumtionunittrailer_siang'])
            ->setCellValue('H48',     $data["datapelengkap"][0]['fuelconsumtionunittrailer_malam'])
            ->setCellValue('J48',       $data["fuelindextrailer"])
            // fuelindextrailerliterton
            ->setCellValue('F49',       $data["fuelindextrailerliterton_siang"])
            ->setCellValue('H49',        $data["fuelindextrailerliterton_malam"])
            ->setCellValue('J49',      $data["fuelindextrailerliterton"])
            // fuelindextrailerliterton
            ->setCellValue('F50',      $data["fuelindextrailerlitertonkm_siang"])
            ->setCellValue('H50',      $data["fuelindextrailerlitertonkm_malam"])
            ->setCellValue('J50',        $data["fuelindextrailerlitertonkm"]);



        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle($data['ton'][0]['maxdate']);

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Daily Produksi ' . $data['ton'][0]['maxdate'] . '.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }
}

/* End of file Daily_produksi.php and path \application\controllers\Daily_produksi.php */
