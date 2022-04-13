<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Isi_highlight extends CI_Controller

{



    private $filename = "import_data"; // Kita tentukan nama filenya



    public function __construct()

    {

        parent::__construct();

        $this->cek_login();

        $this->load->model('Isi_highlight_model');

        $this->load->model('Isi_unit_running_model');

        $this->load->model('Ritasi_highlight_model');

        $this->load->model('Isi_bd_dispatch_model');

        $this->load->model('Produktifitas_unit_hm_hg_model');

        $this->load->library(['form_validation', 'session']);

        $this->load->helper(['url_helper', 'form']);

    }

    public function index()

    {

        $data["gw"] = $this->Isi_highlight_model->get_wb();

        $this->load->view('template/template_table/template_atas_table');

        $this->load->view('template/template_kiri');

        $this->load->view('isi/data_gabungan/data_highlight', $data);

        $this->load->view('template/template_table/template_bawah_table');

    }

    public function hasil_upload_hg()

    {

        $data["gw"] = $this->Isi_highlight_model->get_hg();

        $this->load->view('template/template_table/template_atas_table');

        $this->load->view('template/template_kiri');

        $this->load->view('isi/data_gabungan/data_highlight_upload', $data);

        $this->load->view('template/template_table/template_bawah_table');

    }



    public function form()

    {

        $data = array(); // Buat variabel $data sebagai array



        if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form

            // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php

            $upload = $this->Isi_highlight_model->upload_file($this->filename);



            if ($upload['result'] == "success") { // Jika proses upload sukses

                // Load plugin PHPExcel nya

                include   'assets/PHPExcel/PHPExcel.php';



                $excelreader = new PHPExcel_Reader_Excel2007();

                $loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang tadi diupload ke folder excel

                $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);





                // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php

                // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya

                $data['sheet'] = $sheet;

            } else { // Jika proses upload gagal

                $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan

            }

        }

        $this->load->view('template/template_table/template_atas_table');

        $this->load->view('template/template_kiri');

        $this->load->view('isi/form/form_excel_hg', $data);

        $this->load->view('template/template_table/template_bawah_table');

    }

    public function import()

    {

        // Load plugin PHPExcel nya

        include  'assets/PHPExcel/PHPExcel.php';



        $excelreader = new PHPExcel_Reader_Excel2007();

        $loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang telah diupload ke folder excel

        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);



        // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database

        $data = array();

        // $s = strtotime("today");

        // $hariini = date("Y-m-d ", $s);

        $numrow = 1;

        foreach ($sheet as $row) {

            // Cek $numrow apakah lebih dari 1

            // Artinya karena baris pertama adalah nama-nama kolom

            // Jadi dilewat saja, tidak usah diimport

            if ($numrow > 1) {

                // Kita push (add) array data ke variabel data

                array_push($data, array(

                    'payment' => $row['B'], // Insert data nis dari kolom A di excel

                    'month' => $row['C'], // Insert data nama dari kolom B di excel

                    'tahun' => $row['D'], // Insert data jenis kelamin dari kolom C di excel

                    'date' => $row['E'], // Insert data jenis kelamin dari kolom C di excel

                    'nrp' => $row['F'], // Insert data alamat dari kolom D di excel

                    'driver_1' => $row['G'], // Insert data alamat dari kolom D di excel

                    'nrp_gantungan' => $row['H'], // Insert data alamat dari kolom D di excel

                    'driver_2' => $row['I'], // Insert data alamat dari kolom D di excel

                    'unit' => $row['J'], // Insert data alamat dari kolom D di excel

                    'vessel_type_1' => $row['K'], // Insert data alamat dari kolom D di excel

                    'vessel_type_2' => $row['L'], // Insert data alamat dari kolom D di excel

                    'shift' => $row['M'], // Insert data alamat dari kolom D di excel

                    'rekap_r_o' => $row['N'], // Insert data alamat dari kolom D di excel

                    'num_trip' => $row['O'], // Insert data alamat dari kolom D di excel

                    'time_in' => $row['P'], // Insert data alamat dari kolom D di excel

                    'time_out' => $row['Q'], // Insert data alamat dari kolom D di excel

                    'dari' => $row['R'], // Insert data alamat dari kolom D di excel

                    'ke' => $row['S'], // Insert data alamat dari kolom D di excel

                    'tonase' => $row['T'], // Insert data alamat dari kolom D di excel

                    'wb' => $row['U'], // Insert data alamat dari kolom D di excel

                    'kosongan' => $row['V'], // Insert data alamat dari kolom D di excel

                    'net' => $row['W'], // Insert data nis dari kolom A di excel

                    'code' => $row['X'], // Insert data nis dari kolom A di excel

                    'id_wb' => $row['Y'], // Insert data nis dari kolom A di excel

                    'type_coal' => $row['Z'], // Insert data nis dari kolom A di excel

                    'weighbridge' => $row['AA'], // Insert data nis dari kolom A di excel

                    'ct' => $row['AB'], // Insert data nis dari kolom A di excel

                    'target' => $row['AC'], // Insert data nis dari kolom A di excel

                    'unit_camp' => $row['AD'], // Insert data nis dari kolom A di excel

                    'target_monthly' => $row['AE'], // Insert data nis dari kolom A di excel

                    'vessel_capacity' => $row['AF'], // Insert data nis dari kolom A di excel

                    'hm' => $row['AG'], // Insert data nis dari kolom A di excel

                    'km' => $row['AH'], // Insert data nis dari kolom A di excel

                    'fuel' => $row['AI'], // Insert data nis dari kolom A di excel

                    'cycle_time' => $row['AJ'], // Insert data nis dari kolom A di excel

                    'travel_time' => $row['AK'], // Insert data nis dari kolom A di excel

                    'persen' => $row['AL'], // Insert data nis dari kolom A di excel

                    'status' => $row['AM'], // Insert data nis dari kolom A di excel

                    'modifikasi_vessel' => $row['AN'], // Insert data nis dari kolom A di excel

                    'primemover' => $row['AO'], // Insert data nis dari kolom A di excel

                    'vessel' => $row['AP'], // Insert data nis dari kolom A di excel

                    'target_monthly_rev' => $row['AQ'], // Insert data nis dari kolom A di excel

                    'target_internal' => $row['AR'], // Insert data nis dari kolom A di excel

                    'distance' => $row['AS'], // Insert data nis dari kolom A di excel

                ));

            }



            $numrow++; // Tambah 1 setiap kali looping

        }

        // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model

        $this->Isi_highlight_model->insert_multiple($data);



        redirect("Isi_highlight/hasil_upload_hg"); // Redirect ke halaman awal (ke controller siswa fungsi index)

    }

    public function rekonsil()

    {

        $data["rh"] = $this->Isi_highlight_model->rekonsil_highlight();

        $this->load->view('template/template_table/template_atas_table');

        $this->load->view('template/template_kiri');

        $this->load->view('isi/data_gabungan/data_rekonsil', $data);

        $this->load->view('template/template_table/template_bawah_table');

    }

    public function analisa_produksi()

    {

        $data["ap"] = $this->Isi_highlight_model->analisa_produksi();

        $this->load->view('template/template_table/template_atas_table');

        $this->load->view('template/template_kiri');

        $this->load->view('isi/data_gabungan/data_analisa_produksi', $data);

        $this->load->view('template/template_table/template_bawah_table');

    }

    public function analisa_muatan()

    {

        $data["am"] = $this->Isi_highlight_model->analisa_muatan();

        $this->load->view('template/template_table/template_atas_table');

        $this->load->view('template/template_kiri');

        $this->load->view('isi/data_gabungan/data_analisa_muatan', $data);

        $this->load->view('template/template_table/template_bawah_table');

    }



    public function add_highlight()

    {

        // $data["unit"] = $this->Isi_wb_model->get_no_unit();

        // $data["vessel"] = $this->Isi_wb_model->vessel();

        // $data["lp"] = $this->Isi_wb_model->get_load_point();

        $data["opt"] = $this->Isi_highlight_model->get_opt();

        $data["gi"] = $this->Isi_highlight_model->get_wb();

        // $data["gi"] = $this->Isi_highlight_model->getUserById();

        $this->load->view('template/template_form/template_atas_form');

        $this->load->view('template/template_kiri');

        $this->load->view("isi/form/form_add_highlight", $data);

        $this->load->view('template/template_form/template_bawah_form');

    }



    public function edit($no_transaction)

    {



        $no_transaction = urldecode($no_transaction);

        $wb = $this->Isi_highlight_model;

        $validation = $this->form_validation;

        $validation->set_rules($wb->rules());



        if ($validation->run()) {

            $wb->update();

            $this->session->set_flashdata('success', 'Berhasil disimpan');

        }

        $data['hg'] = $this->Isi_highlight_model->getUserById($no_transaction);

        $data['opt'] = $this->Isi_highlight_model->get_opt();

        $data['tpp'] = $this->Isi_highlight_model->target_produksi();

        $this->load->view('template/template_form/template_atas_form');

        $this->load->view('template/template_kiri');

        $this->load->view('Isi/form/form_edit_highlight', $data);

        $this->load->view('template/template_form/template_bawah_form');

    }



    public function get_target_wb()

    {

        date_default_timezone_set('Asia/Singapore');

        $t = strtotime("today");

        $y = strtotime("yesterday");

        $hariini = date("Y-m-d", $t);

        $kemaren = date("Y-m-d", $y);



        $jamini = date("H");

        $menitini = date("m", $t);

        $detikini = date("s", $t);

        $no_transaction = $this->input->post('no_transaction');

        $data = $this->Isi_highlight_model->get_wb_include($no_transaction);

        echo json_encode($data);

    }





    public function pro_jam2()

    {

        $data["aj7"] = $this->Ritasi_highlight_model->average_ritasi_jam_7();

        $data["aj8"] = $this->Ritasi_highlight_model->average_ritasi_jam_8();

        $data["aj9"] = $this->Ritasi_highlight_model->average_ritasi_jam_9();

        $data["aj10"] = $this->Ritasi_highlight_model->average_ritasi_jam_10();

        $data["aj11"] = $this->Ritasi_highlight_model->average_ritasi_jam_11();

        $data["aj12"] = $this->Ritasi_highlight_model->average_ritasi_jam_12();

        $data["aj13"] = $this->Ritasi_highlight_model->average_ritasi_jam_13();

        $data["aj14"] = $this->Ritasi_highlight_model->average_ritasi_jam_14();

        $data["aj15"] = $this->Ritasi_highlight_model->average_ritasi_jam_15();

        $data["aj16"] = $this->Ritasi_highlight_model->average_ritasi_jam_16();

        $data["aj17"] = $this->Ritasi_highlight_model->average_ritasi_jam_17();

        $data["aj18"] = $this->Ritasi_highlight_model->average_ritasi_jam_18();

        $data["aj19"] = $this->Ritasi_highlight_model->average_ritasi2_jam_19();

        $data["aj20"] = $this->Ritasi_highlight_model->average_ritasi2_jam_20();

        $data["aj21"] = $this->Ritasi_highlight_model->average_ritasi2_jam_21();

        $data["aj22"] = $this->Ritasi_highlight_model->average_ritasi2_jam_22();

        $data["aj23"] = $this->Ritasi_highlight_model->average_ritasi2_jam_23();

        $data["aj00"] = $this->Ritasi_highlight_model->average_ritasi2_jam_00();

        $data["aj01"] = $this->Ritasi_highlight_model->average_ritasi2_jam_01();

        $data["aj02"] = $this->Ritasi_highlight_model->average_ritasi2_jam_02();

        $data["aj03"] = $this->Ritasi_highlight_model->average_ritasi2_jam_03();

        $data["aj04"] = $this->Ritasi_highlight_model->average_ritasi2_jam_04();

        $data["aj05"] = $this->Ritasi_highlight_model->average_ritasi2_jam_05();

        $data["aj06"] = $this->Ritasi_highlight_model->average_ritasi2_jam_06();



        $data["net3"] = $this->Isi_highlight_model->net3();



        $data["tu"] = $this->Isi_highlight_model->total_unit();

        $data["tl"] = $this->Isi_highlight_model->trip_lokasi();

        $data["ul"] = $this->Isi_highlight_model->under_lokasi();



        $data["tk"] = $this->Isi_highlight_model->tonkm();

        $data["am"] = $this->Isi_highlight_model->avgmuatan();

        $this->load->view('template/template_dashboard/template_atas_dashboard');

        $this->load->view('template/template_kiri');

        $this->load->view('isi/data_dashboard/highlight_coba', $data);

        $this->load->view('template/template_dashboard/template_bawah_dashboard', $data);

    }



    public function pro_jam()

    {



        $data["fy"] = $this->Isi_highlight_model->forecast_yearly();

        $data["fm"] = $this->Isi_highlight_model->forecast_monthly();

        $data["fd"] = $this->Isi_highlight_model->forecast_daily();



        $data["aj7"] = $this->Ritasi_highlight_model->average_ritasi_jam_7();

        $data["aj8"] = $this->Ritasi_highlight_model->average_ritasi_jam_8();

        $data["aj9"] = $this->Ritasi_highlight_model->average_ritasi_jam_9();

        $data["aj10"] = $this->Ritasi_highlight_model->average_ritasi_jam_10();

        $data["aj11"] = $this->Ritasi_highlight_model->average_ritasi_jam_11();

        $data["aj12"] = $this->Ritasi_highlight_model->average_ritasi_jam_12();

        $data["aj13"] = $this->Ritasi_highlight_model->average_ritasi_jam_13();

        $data["aj14"] = $this->Ritasi_highlight_model->average_ritasi_jam_14();

        $data["aj15"] = $this->Ritasi_highlight_model->average_ritasi_jam_15();

        $data["aj16"] = $this->Ritasi_highlight_model->average_ritasi_jam_16();

        $data["aj17"] = $this->Ritasi_highlight_model->average_ritasi_jam_17();

        $data["aj18"] = $this->Ritasi_highlight_model->average_ritasi_jam_18();

        $data["aj19"] = $this->Ritasi_highlight_model->average_ritasi2_jam_19();

        $data["aj20"] = $this->Ritasi_highlight_model->average_ritasi2_jam_20();

        $data["aj21"] = $this->Ritasi_highlight_model->average_ritasi2_jam_21();

        $data["aj22"] = $this->Ritasi_highlight_model->average_ritasi2_jam_22();

        $data["aj23"] = $this->Ritasi_highlight_model->average_ritasi2_jam_23();

        $data["aj00"] = $this->Ritasi_highlight_model->average_ritasi2_jam_00();

        $data["aj01"] = $this->Ritasi_highlight_model->average_ritasi2_jam_01();

        $data["aj02"] = $this->Ritasi_highlight_model->average_ritasi2_jam_02();

        $data["aj03"] = $this->Ritasi_highlight_model->average_ritasi2_jam_03();

        $data["aj04"] = $this->Ritasi_highlight_model->average_ritasi2_jam_04();

        $data["aj05"] = $this->Ritasi_highlight_model->average_ritasi2_jam_05();

        $data["aj06"] = $this->Ritasi_highlight_model->average_ritasi2_jam_06();



        $data["net3"] = $this->Isi_highlight_model->net3();



        $data["tl"] = $this->Isi_highlight_model->trip_lokasi();

        $data["ul"] = $this->Isi_highlight_model->under_lokasi();



        $data["tk"] = $this->Isi_highlight_model->tonkm();

        $data["am"] = $this->Isi_highlight_model->avgmuatan();

        $data["amt"] = $this->Isi_highlight_model->avgmuatan_tipevessel();



        $data["stvr"] = $this->Isi_highlight_model->sumtriptipevesselraw();

        $data["stvc"] = $this->Isi_highlight_model->sumtriptipevesselcrush();

        $data["max_nett"] = $this->Isi_highlight_model->max_nett();

        $data["max_trip"] = $this->Isi_highlight_model->max_trip();



        $data["sum_gunungsari"] = $this->Isi_highlight_model->sum_gunungsari();

        $data["last_date_update_id"] = $this->Isi_highlight_model->last_date_update_id();



        $data["filterdate"] = $this->Isi_highlight_model->filter_date();

        

        $data["a"] = $this->Isi_highlight_model->senyiur();

        $data["b"] = $this->Isi_highlight_model->gunungsari();

        $data["c"] = $this->Isi_highlight_model->dispatch();

        $data["d"] = $this->Isi_highlight_model->fms();

        $data["e"] = $this->Isi_highlight_model->hm();

        $data["f"] = $this->Isi_highlight_model->highlight();

        $data["g"] = $this->Isi_highlight_model->dmbd();
        
        
        $data["forecast"] = $this->Isi_highlight_model->forecast();


        
        $data["avg_tonbagihm"] = $this->Isi_highlight_model->avg_tonbagihm();
        $data["last_date_avg_tonhm"] = $this->Isi_highlight_model->last_date_avg_tonhm();

        $this->load->view('template/template_dashboard/template_atas_dashboard_timbangan');

        $this->load->view('template/template_kiri');

        $this->load->view('isi/data_dashboard/data_highlight_perjam', $data);

        $this->load->view('template/template_dashboard/template_bawah_dashboard', $data);

    }

    public function pro_cek_bulan()

    {

        $data["sb"] = $this->Isi_highlight_model->sum_bulan();
        $data["sb2"] = $this->Isi_highlight_model->sum_bulan2();

        $data["sh"] = $this->Isi_highlight_model->sum_harian();
        $data["sh2"] = $this->Isi_highlight_model->sum_harian2();
        
      
        $this->load->view('template/template_dashboard/template_atas_dashboard_timbangan');

        $this->load->view('template/template_kiri');

        $this->load->view('isi/data_dashboard/data_cek', $data);

        $this->load->view('template/template_dashboard/template_bawah_cek', $data);

    }

    public function pro_cek_bulan_gunungsari()

    {

        $data["sbg"] = $this->Isi_highlight_model->sum_bulan_gunungsari();

        $data["shg"] = $this->Isi_highlight_model->sum_harian_gunungsari();

        $data["sh"] = $this->Isi_highlight_model->sum_harian();

        $this->load->view('template/template_dashboard/template_atas_dashboard_timbangan');

        $this->load->view('template/template_kiri');

        $this->load->view('isi/data_dashboard/data_gunungsari', $data);

        $this->load->view('template/template_dashboard/template_bawah_gunungsari', $data);

    }



    public function pro_jam_bydate()

    {

        $a = $this->input->post('a');



        $data["filterdate"] = $this->Isi_highlight_model->filter_date();

        $data["fy"] = $this->Isi_highlight_model->forecast_yearly();

        $data["fm"] = $this->Isi_highlight_model->forecast_monthly();

        $data["fd"] = $this->Isi_highlight_model->forecast_daily();



        $data["aj7"] = $this->Isi_highlight_model->average_ritasi_jam_7($a);

        $data["aj8"] = $this->Isi_highlight_model->average_ritasi_jam_8($a);

        $data["aj9"] = $this->Isi_highlight_model->average_ritasi_jam_9($a);

        $data["aj10"] = $this->Isi_highlight_model->average_ritasi_jam_10($a);

        $data["aj11"] = $this->Isi_highlight_model->average_ritasi_jam_11($a);

        $data["aj12"] = $this->Isi_highlight_model->average_ritasi_jam_12($a);

        $data["aj13"] = $this->Isi_highlight_model->average_ritasi_jam_13($a);

        $data["aj14"] = $this->Isi_highlight_model->average_ritasi_jam_14($a);

        $data["aj15"] = $this->Isi_highlight_model->average_ritasi_jam_15($a);

        $data["aj16"] = $this->Isi_highlight_model->average_ritasi_jam_16($a);

        $data["aj17"] = $this->Isi_highlight_model->average_ritasi_jam_17($a);

        $data["aj18"] = $this->Isi_highlight_model->average_ritasi_jam_18($a);

        $data["aj19"] = $this->Isi_highlight_model->average_ritasi2_jam_19($a);

        $data["aj20"] = $this->Isi_highlight_model->average_ritasi2_jam_20($a);

        $data["aj21"] = $this->Isi_highlight_model->average_ritasi2_jam_21($a);

        $data["aj22"] = $this->Isi_highlight_model->average_ritasi2_jam_22($a);

        $data["aj23"] = $this->Isi_highlight_model->average_ritasi2_jam_23($a);

        $data["aj00"] = $this->Isi_highlight_model->average_ritasi2_jam_00($a);

        $data["aj01"] = $this->Isi_highlight_model->average_ritasi2_jam_01($a);

        $data["aj02"] = $this->Isi_highlight_model->average_ritasi2_jam_02($a);

        $data["aj03"] = $this->Isi_highlight_model->average_ritasi2_jam_03($a);

        $data["aj04"] = $this->Isi_highlight_model->average_ritasi2_jam_04($a);

        $data["aj05"] = $this->Isi_highlight_model->average_ritasi2_jam_05($a);

        $data["aj06"] = $this->Isi_highlight_model->average_ritasi2_jam_06($a);



        $data["net3"] = $this->Isi_highlight_model->net3_select($a);

        $data["tl"] = $this->Isi_highlight_model->trip_lokasi_select($a);

        $data["ul"] = $this->Isi_highlight_model->under_lokasi_select($a);

        $data["tk"] = $this->Isi_highlight_model->tonkm_select($a);

        $data["am"] = $this->Isi_highlight_model->avgmuatan_select($a);

        $data["amt"] = $this->Isi_highlight_model->avgmuatan_tipevessel_select($a);



        $data["stva"] = $this->Isi_highlight_model->sumtriptipevesselall_select($a);

        $data["stvr"] = $this->Isi_highlight_model->sumtriptipevesselraw_select($a);

        $data["stvc"] = $this->Isi_highlight_model->sumtriptipevesselcrush_select($a);



        $this->load->view('template/template_dashboard/template_atas_dashboard_select');

        $this->load->view('template/template_kiri');

        $this->load->view('isi/data_dashboard/data_highlight_perjam_select', $data);

        $this->load->view('template/template_dashboard/template_bawah_dashboard_select', $data);

    }





    public function produktifitas_unit_asli()

    {

        $data["running"] = $this->Isi_bd_dispatch_model->get_unit_running();

        $data["no_running"] = $this->Isi_bd_dispatch_model->get_unit_not_running();



        $data["running_detail"] = $this->Isi_bd_dispatch_model->running_detail();

        $data["not_running_detail"] = $this->Isi_bd_dispatch_model->not_running_detail();

        $data["last_date_update"] = $this->Isi_bd_dispatch_model->last_date_update();

        $this->load->view('template/template_dashboard/template_atas_dashboard');

        $this->load->view('template/template_kiri');

        $this->load->view('isi/data_dashboard/data_produktifitas_unit_asli', $data);

        $this->load->view('template/template_table/template_bawah_table_fms', $data);

    }

    public function produktifitas_unit_hm_hg()

    {



        $tanggal = $this->input->get('tanggal');

        $data["tanggal"] = $this->Produktifitas_unit_hm_hg_model->get_tanggal();

        $data["bulan"] = $this->Produktifitas_unit_hm_hg_model->get_bulan();

        $data["tahun"] = $this->Produktifitas_unit_hm_hg_model->get_tahun();


        // Detail All Data Unit
        $data['getall'] = $this->Produktifitas_unit_hm_hg_model->getall($tanggal);
        $data['getall_siang'] = $this->Produktifitas_unit_hm_hg_model->getall_siang($tanggal);
        $data['getall_malam'] = $this->Produktifitas_unit_hm_hg_model->getall_malam($tanggal);
        

        $data['gtv'] = $this->Produktifitas_unit_hm_hg_model->gettonhmvolvo($tanggal);

        $data['getdetailtonhmvolvo'] = $this->Produktifitas_unit_hm_hg_model->getdetailtonhmvolvo($tanggal);



        $data['gettonvolvo'] = $this->Produktifitas_unit_hm_hg_model->gettonvolvo($tanggal);

        $data['getdetailtonvolvo'] = $this->Produktifitas_unit_hm_hg_model->getdetailtonvolvo($tanggal);

        $data['getdetailtonvolvo_graph'] = $this->Produktifitas_unit_hm_hg_model->getdetailtonvolvo_graph($tanggal);



        $data['gettripvolvo'] = $this->Produktifitas_unit_hm_hg_model->gettripvolvo($tanggal);

        $data['getdetailtripvolvo'] = $this->Produktifitas_unit_hm_hg_model->getdetailtripvolvo($tanggal);

        $data['getdetailtripvolvo_graph'] = $this->Produktifitas_unit_hm_hg_model->getdetailtripvolvo_graph($tanggal);



        $data['avgton'] = $this->Produktifitas_unit_hm_hg_model->avgton($tanggal);

        $data['detailavgton'] = $this->Produktifitas_unit_hm_hg_model->detailavgton($tanggal);



        $data['avgdistance'] = $this->Produktifitas_unit_hm_hg_model->avgdistance($tanggal);

        $data['detailavgdistance'] = $this->Produktifitas_unit_hm_hg_model->detailavgdistance($tanggal);



        $data['total_distance'] = $this->Produktifitas_unit_hm_hg_model->total_distance($tanggal);

        $data['detail_total_distance'] = $this->Produktifitas_unit_hm_hg_model->detail_total_distance($tanggal);



        $data['detail_total_ton_km'] = $this->Produktifitas_unit_hm_hg_model->detail_total_ton_km($tanggal);



        $data['unit_running'] = $this->Produktifitas_unit_hm_hg_model->unit_running($tanggal);

        $data['detail_unit_running'] = $this->Produktifitas_unit_hm_hg_model->detail_unit_running($tanggal);



        $data['total_bd'] = $this->Produktifitas_unit_hm_hg_model->total_bd($tanggal);

        $data['detail_total_bd'] = $this->Produktifitas_unit_hm_hg_model->detail_total_bd($tanggal);



        $data['total_hm'] = $this->Produktifitas_unit_hm_hg_model->total_hm($tanggal);

        $data['detail_total_hm'] = $this->Produktifitas_unit_hm_hg_model->detail_total_hm($tanggal);



        $data['avg_pa'] = $this->Produktifitas_unit_hm_hg_model->avg_pa($tanggal);

        $data['detail_avg_pa'] = $this->Produktifitas_unit_hm_hg_model->detail_avg_pa($tanggal);

        $data['detail_avg_pa_graph'] = $this->Produktifitas_unit_hm_hg_model->detail_avg_pa_graph($tanggal);



        $data['avg_ua'] = $this->Produktifitas_unit_hm_hg_model->avg_ua($tanggal);

        $data['detail_avg_ua'] = $this->Produktifitas_unit_hm_hg_model->detail_avg_ua($tanggal);



        $data['avg_cyle_time'] = $this->Produktifitas_unit_hm_hg_model->avg_cyle_time($tanggal);

        $data['detail_avg_cyle_time'] = $this->Produktifitas_unit_hm_hg_model->detail_avg_cyle_time($tanggal);



        $data['avg_travel_time'] = $this->Produktifitas_unit_hm_hg_model->avg_travel_time($tanggal);

        $data['detail_avg_travel_time'] = $this->Produktifitas_unit_hm_hg_model->detail_avg_travel_time($tanggal);



        $data['avg_stb'] = $this->Produktifitas_unit_hm_hg_model->avg_stb($tanggal);

        $data['detail_avg_stb'] = $this->Produktifitas_unit_hm_hg_model->detail_avg_stb($tanggal);



        $data['avg_bd'] = $this->Produktifitas_unit_hm_hg_model->avg_bd($tanggal);

        $data['detail_avg_bd'] = $this->Produktifitas_unit_hm_hg_model->detail_avg_bd($tanggal);

        

        $data['last_date_update_highlight'] = $this->Produktifitas_unit_hm_hg_model->last_date_update_highlight();

        $data['last_date_update_hm'] = $this->Produktifitas_unit_hm_hg_model->last_date_update_hm();

        $data['last_date_update_dmbd'] = $this->Produktifitas_unit_hm_hg_model->last_date_update_dmbd();

        $this->load->view('template/template_dashboard/template_atas_dashboard');

        $this->load->view('template/template_kiri');

        $this->load->view('isi/data_dashboard/data_produktifitas_unit_hm_hg', $data);

        $this->load->view('isi/modal/modal_produktifitas_unit', $data);

        $this->load->view('isi/modal/grafik_modal_produktifitas_unit', $data);

        $this->load->view('template/template_dashboard/template_bawah_dashboard_unit', $data);

    }

    public function produktifitas_unit_daily()

    {

        $tanggal = '01';



        $data['gtv'] = $this->Produktifitas_unit_hm_hg_model->gettonhmvolvo($tanggal);



        $this->load->view('template/template_dashboard/template_atas_dashboard');

        $this->load->view('template/template_kiri');

        $this->load->view('isi/data_dashboard/data_produktifitas_unit_hm_hg', $data);

        $this->load->view('template/template_dashboard/template_bawah_dashboard_unit', $data);

    }

    public function loadajaxhanson()

    {

        if ($this->input->get('date')) {

            $data['date'] = $this->input->get('date');

            $data['data'] = $this->Isi_highlight_model->wb_hanson($data);



            $handson_data = array();

            foreach ($data['data'] as $key => $wb) {

                $temp = array();

                foreach ($wb as $key2 => $wb_value) {

                    if ($key2 == "id") {

                        continue;

                    } else {

                        $temp[] = "'" . $wb_value . "'";

                    }

                }



                if ($temp) {

                    if ($key + 1 == count($data['data']))

                        $comma = "";

                    else

                        $comma = ",";



                    $handson_data[] = "[" . implode(",", $temp) . "]" . $comma;

                }

            }



            $data['handson'] = $handson_data;

        } else {

            $data['date'] = "";

        }

        $data['last_date_update'] = $this->Isi_highlight_model->highlight();

        $this->load->view('template/template_table/template_atas_table_hanson');

        $this->load->view('template/template_kiri');

        $this->load->view('isi/data_gabungan/crud_highlight_handsontable', $data);

    }



    public function ajaxHandson()

    {

        $data = (array) json_decode(file_get_contents('php://input'), true);

        $data = $data['data'];

        $temp['result'] = $this->Isi_highlight_model->update_handson($data);

        echo json_encode($temp);

    }

}

