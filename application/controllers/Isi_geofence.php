<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Isi_geofence extends CI_Controller

{



    private $filename = "import_geofence"; // Kita tentukan nama filenya





    public function __construct()

    {

        parent::__construct();

        $this->cek_login();

        // $this->load->library('form_validation');

        $this->load->model('Analisa_opt_model');

    }



    public function index()

    { }





    public function cycle_unit()

    {

        $data["group_by_time_in"] = $this->Analisa_opt_model->group_by_time_in();

        $data["grup_unit"] = $this->Analisa_opt_model->grup_unit();

        $data["all"] = $this->Analisa_opt_model->cycle_time();



        $this->load->view('template/template_simpletable/template_atas_table');

        $this->load->view('template/template_kiri');

        $this->load->view('isi/data_detail_dashboard/data_detail_dashboard_unit', $data);

        $this->load->view('template/template_simpletable/template_bawah_table');

    }

    public function detail_unit()

    {

        $data["group_by_time_in"] = $this->Analisa_opt_model->group_by_time_in();

        $data["grup_unit"] = $this->Analisa_opt_model->grup_unit();

        $unit = $this->input->post('unit');

        $kemaren = $this->input->post('kemaren');

        $data["all"] = $this->Analisa_opt_model->detail_cycle_time($unit, $kemaren);



        $this->load->view('template/template_simpletable/template_atas_table');

        $this->load->view('template/template_kiri');

        $this->load->view('isi/data_detail_dashboard/data_detail_dashboard_unit', $data);

        $this->load->view('template/template_simpletable/template_bawah_table');

    }

    public function p_unit()

    {

        // $data["unit_bd_schedule_"] = $this->Analisa_opt_model->unit_bd_schedule_();

        // $data["unit_bd_unsceduleminor"] = $this->Analisa_opt_model->unit_bd_unsceduleminor_();

        // $data["unit_bd_unscedulemayor"] = $this->Analisa_opt_model->unit_bd_unscedulemayor_();

        // $data["unit_produksi"] = $this->Analisa_opt_model->unit_produksi();

        // $data["cycle_time"] = $this->Analisa_opt_model->cycle_time();

        // $data["travel_time"] = $this->Analisa_opt_model->travel_time();

        // $data["top_travel_delay"] = $this->Analisa_opt_model->top_travel_delay();

        // $data["loading_time"] = $this->Analisa_opt_model->loading_time();

        // $data["top_loading_delay"] = $this->Analisa_opt_model->top_loading_delay();

        // $data["tipping_time"] = $this->Analisa_opt_model->tipping_time();

        // $data["top_tipping_delay"] = $this->Analisa_opt_model->top_tipping_delay();

        // $data["top_pitstop_delay"] = $this->Analisa_opt_model->top_pitstop_delay();



        // // $data["count"] = $this->Analisa_opt_model->count();

        // // $data["sum_detik"] = $this->Analisa_opt_model->sum_detik();

        // $this->load->view('template/template_dashboard/template_atas_dashboard');

        // $this->load->view('template/template_kiri');

        // $this->load->view('isi/data_dashboard/data_produktifitas_unit', $data);

        // $this->load->view('template/template_dashboard/template_bawah_dashboard');

    }

    public function cycle_time()

    {

        $data["units"] = $this->Analisa_opt_model->unitSchedule();

        $this->load->view('template/template_dashboard/template_atas_dashboard');

        $this->load->view('template/template_kiri');

        $this->load->view('isi/data_gabungan/data_cycle_time', $data);

        $this->load->view('template/template_dashboard/template_bawah_dashboard');

    }



    public function geofence()

    {

        $data["tbl_geofence"] = $this->m_829->getAll();

        $this->load->view('template/template_table/template_atas_table');

        $this->load->view('template/template_kiri');

        $this->load->view('isi/data_gabungan/data_geofence', $data);

        $this->load->view('template/template_table/template_bawah_table');

    }



    public function add_geofence()

    {

        $geofence = $this->isi_geofence_m;

        $validation = $this->form_validation;

        $validation->set_rules($geofence->rules());



        if ($validation->run()) {

            $geofence->save();

            $this->session->set_flashdata('success', 'Berhasil disimpan');

        }

        $this->load->view('template/template_form/template_atas_form');

        $this->load->view('template/template_kiri');

        $this->load->view("isi/form/form_add_geofence");

        $this->load->view('template/template_form/template_bawah_form');

    }



    public function edit_geofence($id)

    {

        $data["tbl_geofence"] = $this->isi_geofence_m->getAll();

        $data['tbl_geofence'] = $this->isi_geofence_m->getUserById($id);

        $this->load->view('template/template_form/template_atas_form');

        $this->load->view('template/template_kiri');

        $this->load->view('isi/form/form_edit_geofence', $data);

        $this->load->view('template/template_form/template_bawah_form');

    }



    public function delete_geofence($id)

    {

        $this->isi_geofence_m->delete_geofence($id);

        redirect('isi_geofence/geofence');

    }



    public function trip_polosan()

    {

        $data['unitsc'] = $this->Analisa_opt_model->unitSchedule_polosan();



        foreach ($data['unitsc'] as $key => $value) {

            $tripdata[$key]["time_in"] = $value[0]['time_in'];

            $next_trip = explode("-", $key)[1] + 1;



            //Time_out = next loading (time_in)

            if (isset($data['unitsc']["TRIP-$next_trip"]))

                $tripdata[$key]["time_out"] = $data['unitsc']["TRIP-$next_trip"][0]['time_in'];

            else

                $tripdata[$key]["time_out"] = $value[count($value) - 1]['time_out'];



            $tripdata[$key]["travel_duration"] = 0;

            $tripdata[$key]["loading_duration"] = 0;

            $tripdata[$key]["tipping_duration"] = 0;



            foreach ($value as $key2 => $value2) {

                if ($value2["tipe"] == "Travel")

                    $tripdata[$key]["travel_duration"] += strtotime($value2['time_out']) - strtotime($value2['time_in']);

            }

            foreach ($value as $key2 => $value2) {

                if ($value2["tipe"] == "Loading")

                    $tripdata[$key]["loading_duration"] += strtotime($value2['time_out']) - strtotime($value2['time_in']);

            }

            foreach ($value as $key2 => $value2) {

                if ($value2["tipe"] == "Tipping")

                    $tripdata[$key]["tipping_duration"] += strtotime($value2['time_out']) - strtotime($value2['time_in']);

            }

        }



        foreach ($tripdata as $key => $value) {

            $trip_duration = strtotime($value['time_out']) - strtotime($value['time_in']);

            $tripdata[$key]["trip_duration"] = gmdate("H:i:s", $trip_duration);

            $tripdata[$key]["travel_duration"] = gmdate("H:i:s", $value["travel_duration"]);

            $tripdata[$key]["loading_duration"] = gmdate("H:i:s", $value["loading_duration"]);

            $tripdata[$key]["tipping_duration"] = gmdate("H:i:s", $value["tipping_duration"]);

            $total_duration = $value["travel_duration"] + $value["loading_duration"] + $value["tipping_duration"];

            $tripdata[$key]["total_duration"] = gmdate("H:i:s", $total_duration);

            $tripdata[$key]["standby_duration"] = gmdate("H:i:s", $trip_duration - $total_duration);

        }



        $data['tripdata'] = $tripdata;









        $data["group_by_time_in"] = $this->Analisa_opt_model->group_by_time_in();

        $data["grup_unit"] = $this->Analisa_opt_model->grup_unit();



        $this->load->view('template/template_simpletable/template_atas_table');

        $this->load->view('template/template_kiri');

        $this->load->view('isi/data_detail_dashboard/data_detail_dashboard_unit_trial', $data);

        $this->load->view('template/template_simpletable/template_bawah_table');

    }

    public function trip()

    {

        $kemaren = $this->input->post('kemaren');

        $unit = $this->input->post('unit');

        $data['unitsc'] = $this->Analisa_opt_model->unitSchedule($unit, $kemaren);



        foreach ($data['unitsc'] as $key => $value) {

            $tripdata[$key]["time_in"] = $value[0]['time_in'];

            $next_trip = explode("-", $key)[1] + 1;



            //Time_out = next loading (time_in)

            if (isset($data['unitsc']["TRIP-$next_trip"]))

                $tripdata[$key]["time_out"] = $data['unitsc']["TRIP-$next_trip"][0]['time_in'];

            else

                $tripdata[$key]["time_out"] = $value[count($value) - 1]['time_out'];





            $tripdata[$key]["travel_duration"] = 0;

            $tripdata[$key]["loading_duration"] = 0;

            $tripdata[$key]["tipping_duration"] = 0;



            foreach ($value as $key2 => $value2) {

                if ($value2["tipe"] == "Travel")

                    $tripdata[$key]["travel_duration"] += strtotime($value2['time_out']) - strtotime($value2['time_in']);

            }

            foreach ($value as $key2 => $value2) {

                if ($value2["tipe"] == "Loading")

                    $tripdata[$key]["loading_duration"] += strtotime($value2['time_out']) - strtotime($value2['time_in']);

            }

            foreach ($value as $key2 => $value2) {

                if ($value2["tipe"] == "Tipping")

                    $tripdata[$key]["tipping_duration"] += strtotime($value2['time_out']) - strtotime($value2['time_in']);

            }

        }



        foreach ($tripdata as $key => $value) {

            $trip_duration = strtotime($value['time_out']) - strtotime($value['time_in']);

            $tripdata[$key]["trip_duration"] = gmdate("H:i:s", $trip_duration);

            $tripdata[$key]["travel_duration"] = gmdate("H:i:s", $value["travel_duration"]);

            $tripdata[$key]["loading_duration"] = gmdate("H:i:s", $value["loading_duration"]);

            $tripdata[$key]["tipping_duration"] = gmdate("H:i:s", $value["tipping_duration"]);



            $total_duration = $value["travel_duration"] + $value["loading_duration"] + $value["tipping_duration"];

            $tripdata[$key]["total_duration"] = gmdate("H:i:s", $total_duration);

            $tripdata[$key]["standby_duration"] = gmdate("H:i:s", $trip_duration - $total_duration);

        }



        $data['tripdata'] = $tripdata;



        $data["group_by_time_in"] = $this->Analisa_opt_model->group_by_time_in();

        $data["grup_unit"] = $this->Analisa_opt_model->grup_unit();



        $this->load->view('template/template_simpletable/template_atas_table');

        $this->load->view('template/template_kiri');

        $this->load->view('isi/data_detail_dashboard/data_detail_dashboard_unit_trial', $data);

        $this->load->view('template/template_simpletable/template_bawah_table');

    }



    public function form()

    {

        $data = array(); // Buat variabel $data sebagai array



        if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form

            // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php

            $upload = $this->Analisa_opt_model->upload_file($this->filename);



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

        $this->load->view('isi/form/form_excel_geo', $data);

        $this->load->view('template/template_table/template_bawah_table');

    }

    public function form_geofence_loading()

    {

        $data = array(); // Buat variabel $data sebagai array



        if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form

            // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php

            $upload = $this->Analisa_opt_model->upload_file_loading($this->filename);



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

        $this->load->view('isi/form/form_excel_geo_loading', $data);

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

        // $s = strtotime("yesterday");

        // $hariini = date("Y-m-d ", $s);

        $numrow = 1;

        foreach ($sheet as $row) {

            // Cek $numrow apakah lebih dari 1

            // Artinya karena baris pertama adalah nama-nama kolom

            // Jadi dilewat saja, tidak usah diimport

            if ($numrow > 1) {

                // Kita push (add) array data ke variabel data

                array_push($data, array(

                    'unit' => $row['A'], // Insert data nis dari kolom A di excel

                    'geofence' => $row['B'], // Insert data nama dari kolom B di excel

                    'time_in' => $row['C'], // Insert data jenis kelamin dari kolom C di excel

                    'time_out' => $row['D'], // Insert data alamat dari kolom D di excel

                    'duration' => $row['E'], // Insert data alamat dari kolom D di excel

                    'mileage' => $row['F'], // Insert data alamat dari kolom D di excel

                    'total_waktu' => $row['G'], // Insert data alamat dari kolom D di excel

                    'durasi_parkir' => $row['H'], // Insert data alamat dari kolom D di excel

                ));

            }



            $numrow++; // Tambah 1 setiap kali looping                   

        }

        // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model

        $this->Analisa_opt_model->insert_multiple($data);



        redirect("Isi_geofence/fms"); // Redirect ke halaman awal (ke controller siswa fungsi index)

    }

    public function import_loading()

    {

        // Load plugin PHPExcel nya

        include  'assets/PHPExcel/PHPExcel.php';



        $excelreader = new PHPExcel_Reader_Excel2007();

        $loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang telah diupload ke folder excel

        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);



        // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database

        $data = array();

        // $s = strtotime("yesterday");

        // $hariini = date("Y-m-d ", $s);

        $numrow = 1;

        foreach ($sheet as $row) {

            // Cek $numrow apakah lebih dari 1

            // Artinya karena baris pertama adalah nama-nama kolom

            // Jadi dilewat saja, tidak usah diimport

            if ($numrow > 1) {

                // Kita push (add) array data ke variabel data

                array_push($data, array(

                    'unit' => $row['A'], // Insert data nis dari kolom A di excel

                    'geofence' => $row['B'], // Insert data nama dari kolom B di excel

                    'description' => $row['C'], // Insert data alamat dari kolom D di excel

                    'time_in' => $row['D'], // Insert data jenis kelamin dari kolom C di excel

                    'time_out' => $row['E'], // Insert data alamat dari kolom D di excel

                    'duration' => $row['F'], // Insert data alamat dari kolom D di excel

                    'durasi_parkir' => $row['G'], // Insert data alamat dari kolom D di excel

                ));

            }



            $numrow++; // Tambah 1 setiap kali looping

        }

        // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model

        $this->Analisa_opt_model->insert_multiple_loading($data);



        redirect("Isi_geofence/p_unit"); // Redirect ke halaman awal (ke controller siswa fungsi index)

    }



    public function fms()

    {

        $this->load->model('M_FMS');

        $max_timein = $this->M_FMS->max_timein_geofence();

        $date = $max_timein[0]['kemaren'];



        // date_default_timezone_set('Asia/Singapore');

        // $t = strtotime("yesterday");

        // $hariini = date("Y-m-d", $t);

        // $date = $this->input->get('date');

        // $date = $hariini;

        // $date = '2022-03-12';



        $this->load->model('M_FMS');

        $unit = $this->M_FMS->getUnitperDate($date);



        // for ($i=0; $i <= 10; $i++) { 

        //    $temp_model = $this->M_FMS->get($unit[$i]['unit'], $date);

        //    $this->M_FMS->insertToCycleSummary($temp_model);

        // }



        // $temp_model = $this->M_FMS->get("MHA R580-826", $date);

        // die();



        $need_tobe_checked = array();

        foreach ($unit as $key => $value) {

            $temp_model = $this->M_FMS->get($value['unit'], $date);

            $model = 0;

            if (!isset($temp_model['message']))

                $model = $this->M_FMS->insertToCycleSummary($temp_model);



            if ($model == 0) {

                if (isset($temp_model['message']))

                    $need_tobe_checked[] = $temp_model;

                else

                    $need_tobe_checked[] = array("unit" => $value['unit'], "date" => $date, "message" => "Perlu dilakukan pengecekan manual pada data FMS");

            }

        }



        if ($need_tobe_checked) {

            $model = $this->M_FMS->insertCycleWarning($need_tobe_checked);

        }

        redirect("Isi_geofence/cycle_summary?tanggal=$date");

    }



    public function cycle_summary()

    {

        $tanggal = $this->input->get('tanggal');

        // $tanggal = $this->input->get('unit');

        // $tanggal = '2021-11-12';

        // $unit = 'MHA PM-837';



        $this->load->model('M_FMS');

        $data['isi_cycle'] = $this->M_FMS->get_cycle_summary($tanggal);

        $data['bug_cycle'] = $this->M_FMS->get_bug_cycle($tanggal);

        $data['last_date_update'] = $this->M_FMS->last_date_update();



        $this->load->view('template/template_table/template_atas_table_fms');

        $this->load->view('template/template_kiri');

        $this->load->view('isi/data_gabungan/data_fms', $data);

        $this->load->view('template/template_table/template_bawah_table_fms', $data);

    }



    public function ajax_CyleTransaction()

    {

        $idsatu = $this->input->post('idsatu');

        $iddua = $this->input->post('iddua');

        $unit = $this->input->post('unit');

        $this->load->model('M_FMS');

        $data['isi_cycle'] = $this->M_FMS->get_cycle_transaksi($idsatu, $iddua, $unit);

        $this->load->view('isi/data_gabungan/data_ajax_cycle', $data);

    }



    public function dashboard_fms()

    {

        $bulan = $this->input->post('bulan');

        $this->load->model('M_FMS');

        $data['sum_fms'] = $this->M_FMS->summary_fms($bulan);

        $this->load->view('template/template_dashboard/template_atas_dashboard_fms');

        $this->load->view('template/template_kiri');

        $this->load->view('isi/data_dashboard/data_fms', $data);

        $this->load->view('template/template_dashboard/template_bawah_fms', $data);

    }



    public function loadajaxhanson()

    {

        $this->load->model('M_FMS');

        if ($this->input->get('date')) {

            $data['date'] = $this->input->get('date');

            $data['data'] = $this->M_FMS->wb_hanson($data);



            $handson_data = array();

            foreach ($data['data'] as $key => $wb) {

                $temp = array();

                foreach ($wb as $key2 => $wb_value) {

                    if ($key2 == "no") {

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

        $data['last_date_update'] = $this->M_FMS->last_date_update();

        $this->load->view('template/template_table/template_atas_table_hanson');

        $this->load->view('template/template_kiri');

        $this->load->view('isi/data_gabungan/fms_handsontable', $data);

    }

}

