<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Isi_wb extends CI_Controller
{

    private $filename = "import_data"; // Kita tentukan nama filenya

    public function __construct()
    {
        parent::__construct();
        $this->cek_login();
        $this->load->model('Isi_wb_model');
        $this->load->library(['form_validation', 'session']);
        $this->load->helper(['url_helper', 'form']);
    }
    public function index()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $data["tanggal"] = $this->Isi_wb_model->get_tanggal();
        $data["bulan"] = $this->Isi_wb_model->get_bulan();
        $data["tahun"] = $this->Isi_wb_model->get_tahun();
        $data["wb"] = $this->Isi_wb_model->get_all($tanggal, $bulan, $tahun);
        $this->load->view('template/template_table/template_atas_table');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/data_gabungan/data_wb', $data);
        $this->load->view('template/template_table/template_bawah_table');
    }

    // public function wb_handsontable()
    // {
    //     $data["wb"] = $this->Isi_wb_model->get_wb_hariini();
    //     $this->load->view('template/template_table/template_atas_table');
    //     $this->load->view('template/template_kiri');
    //     $this->load->view('isi/data_gabungan/data_wb_hansontable', $data);
    //     $this->load->view('template/template_table/template_bawah_table');
    // }
    public function loadajaxhanson()
    {
        if ($this->input->get('date')) {
            $data['date'] = $this->input->get('date');
            $data['data'] = $this->Isi_wb_model->wb_hanson($data);

            $handson_data = array();
            foreach ($data['data'] as $key => $wb) {
                $temp = array();
                foreach ($wb as $key2 => $wb_value) {
                    if ($key2 == "id_wb") {
                        continue;
                    } elseif ($key2 == "payment") {
                        break;
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
        $data['last_date_update'] = $this->Isi_wb_model->last_date_update();
        $this->load->view('template/template_table/template_atas_table_hanson');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/data_gabungan/data_wb_hansontable', $data);
    }

    public function ajaxHandson()
    {
        $data = (array) json_decode(file_get_contents('php://input'), true);
        $data = $data['data'];
        $temp['result'] = $this->Isi_wb_model->update_handson($data);
        echo json_encode($temp);
    }
    public function loadajaxhanson_gunungsari()
    {
        if ($this->input->get('date')) {
            $data['date'] = $this->input->get('date');
            $data['data'] = $this->Isi_wb_model->wb_hanson_gunungsari($data);

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
        $data['last_date_update_gunungsari'] = $this->Isi_wb_model->last_date_update_gunungsari();
        $this->load->view('template/template_table/template_atas_table_hanson');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/data_gabungan/data_wb_hansontable_gunungsari', $data);
    }

    public function ajaxHandson_gunungsari()
    {
        $data = (array) json_decode(file_get_contents('php://input'), true);
        $data = $data['data'];
        $temp['result'] = $this->Isi_wb_model->update_handson_gunungsari($data);
        echo json_encode($temp);
    }
    public function double()
    {
        $data["wb"] = $this->Isi_wb_model->double();
        $this->load->view('template/template_table/template_atas_table');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/data_gabungan/data_double', $data);
        $this->load->view('template/template_table/template_bawah_table');
    }
    public function uncomplete()
    {
        $data["wb"] = $this->Isi_wb_model->get_uncomplete();
        $this->load->view('template/template_table/template_atas_table');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/data_gabungan/data_wb_uncomplete', $data);
        $this->load->view('template/template_table/template_bawah_table');
    }
    public function complete()
    {
        $data["wb"] = $this->Isi_wb_model->get_complete();
        $this->load->view('template/template_table/template_atas_table');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/data_gabungan/data_wb', $data);
        $this->load->view('template/template_table/template_bawah_table');
    }
    public function vessel()
    {
        $id = $this->input->post('id');
        $data = $this->m_pos->get_vessel($id);
        echo json_encode($data);
    }

    public function add_wb()
    {
        $data["unit"] = $this->Isi_wb_model->get_no_unit();
        $data["vessel"] = $this->Isi_wb_model->vessel();
        $data["lp"] = $this->Isi_wb_model->get_load_point();
        $data["w"] = $this->Isi_wb_model->get_wb();
        $data["tipping"] = $this->Isi_wb_model->get_tipping();
        $data["wb"] = $this->Isi_wb_model->get_all();
        $this->load->view('template/template_form/template_atas_form');
        $this->load->view('template/template_kiri');
        $this->load->view("isi/form/form_add_wb", $data);
        $this->load->view('template/template_form/template_bawah_form');
    }

    public function edit($no_transaction)
    {

        $no_transaction = urldecode($no_transaction);
        $wb = $this->Isi_wb_model;
        $validation = $this->form_validation;
        $validation->set_rules($wb->rules());

        if ($validation->run()) {
            $wb->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data['tbl_wb'] = $this->Isi_wb_model->getUserById($no_transaction);
        $this->load->view('template/template_form/template_atas_form');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/form/form_edit_wb', $data);
        $this->load->view('template/template_form/template_bawah_form');
    }
    public function edit_double($no_transaction)
    {

        $no_transaction = urldecode($no_transaction);
        $wb = $this->Isi_wb_model;
        $validation = $this->form_validation;
        $validation->set_rules($wb->rules());

        if ($validation->run()) {
            $wb->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data['tbl_wb'] = $this->Isi_wb_model->getUserById($no_transaction);
        $this->load->view('template/template_form/template_atas_form');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/form/form_edit_wb_double', $data);
        $this->load->view('template/template_form/template_bawah_form');
    }
    public function edit_uncomplete($no_transaction)
    {

        $no_transaction = urldecode($no_transaction);
        $wb = $this->Isi_wb_model;
        $validation = $this->form_validation;
        $validation->set_rules($wb->rules());

        if ($validation->run()) {
            $wb->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data["tipping"] = $this->Isi_wb_model->get_tipping();
        $data['tbl_wb'] = $this->Isi_wb_model->getUserById($no_transaction);
        $this->load->view('template/template_form/template_atas_form');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/form/form_edit_wb_uncomplete', $data);
        $this->load->view('template/template_form/template_bawah_form');
    }

    public function store()
    {

        $data = [
            'no_unit' => $this->input->post('no_unit'),
            'loading_point' => $this->input->post('loading_point'),
            'weighbridge' => $this->input->post('weighbridge'),
            // 'shift' => $this->input->post('shift'),
            // 'tipe_vessel' => $this->input->post('tipe_vessel'),
            // 'type' => $this->input->post('type'),
            // 'no_transaction' => $this->input->post('no_transaction'),
            // 'gross' => $this->input->post('gross'),
            // 'tare' => $this->input->post('tare'),
            // 'nett' => $this->input->post('nett'),
            'time_in' => $this->input->post('time_in'),
            // 'time_out	' => $this->input->post('time_out'),
            // 'tipping' => $this->input->post('tipping'),
            // 'remaks' => $this->input->post('remaks'),
            // 'target' => $this->input->post('target'),
            // 'precentage' => $this->input->post('precentage'),
            // 'loss_weight' => $this->input->post('loss_weight'),
            // 'keterangan' => $this->input->post('keterangan'),
            // 'status' => $this->input->post('status'),
            'date' => $this->input->post('date')
        ];


        // $this->form_validation->set_rules('shift', 'shift', 'required');
        $this->form_validation->set_rules('no_unit', 'no_unit', 'required');
        // $this->form_validation->set_rules('tipe_vessel', 'tipe_vessel', 'required');
        // $this->form_validation->set_rules('loading_point', 'loading_point', 'required');
        // $this->form_validation->set_rules('type', 'type', 'required');
        // $this->form_validation->set_rules('weighbridge', 'weighbridge', 'required');
        // $this->form_validation->set_rules('no_transaction', 'no_transaction', 'required');
        // $this->form_validation->set_rules('gross', 'no_ungrossit', 'required');
        // $this->form_validation->set_rules('tare', 'tare', 'required');
        // $this->form_validation->set_rules('nett', 'nett', 'required');
        // $this->form_validation->set_rules('time_in', 'time_in', 'required');
        // // $this->form_validation->set_rules('remaks', 'remaks', 'required');
        // $this->form_validation->set_rules('target', 'target', 'required');
        // $this->form_validation->set_rules('precentage', 'precentage', 'required');
        // $this->form_validation->set_rules('loss_weight', 'loss_weight', 'required');
        // $this->form_validation->set_rules('keterangan', 'keterangan', 'required');
        // $this->form_validation->set_rules('status', 'status', 'required');
        // $this->form_validation->set_rules('date', 'date', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('Isi_wb/add_wb'));
        } else {
            $this->Isi_wb_model->insert_item($data);
            redirect(base_url('Isi_wb/uncomplete'));
        }
    }

    public function get_target()
    {
        $id = $this->input->post('id');
        $data = $this->Isi_wb_model->get_vessel($id);
        echo json_encode($data);
    }



    public function form()
    {
        $data = array(); // Buat variabel $data sebagai array

        if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
            // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
            $upload = $this->Isi_wb_model->upload_file($this->filename);

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
        $this->load->view('isi/form/form_excel_wb', $data);
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
                    'shift' => $row['A'], // Insert data nis dari kolom A di excel
                    'no_unit' => $row['B'], // Insert data nama dari kolom B di excel
                    'tipe_vessel' => $row['C'], // Insert data jenis kelamin dari kolom C di excel
                    'loading_point' => $row['D'], // Insert data alamat dari kolom D di excel
                    'type' => $row['E'], // Insert data alamat dari kolom D di excel
                    'weighbridge' => $row['F'], // Insert data alamat dari kolom D di excel
                    'no_transaction' => $row['G'], // Insert data alamat dari kolom D di excel
                    'gross' => $row['H'], // Insert data alamat dari kolom D di excel
                    'tare' => $row['I'], // Insert data alamat dari kolom D di excel
                    'nett' => $row['J'], // Insert data alamat dari kolom D di excel
                    'time_in' => $row['K'], // Insert data alamat dari kolom D di excel
                    'time_out' => $row['L'], // Insert data alamat dari kolom D di excel
                    'tipping' => $row['M'], // Insert data alamat dari kolom D di excel
                    'remaks' => $row['N'], // Insert data alamat dari kolom D di excel
                    'target' => $row['O'], // Insert data alamat dari kolom D di excel
                    'precentage' => $row['P'], // Insert data alamat dari kolom D di excel
                    'loss_weight' => $row['Q'], // Insert data alamat dari kolom D di excel
                    'keterangan' => $row['R'], // Insert data alamat dari kolom D di excel
                    'status' => $row['S'], // Insert data alamat dari kolom D di excel
                    'date' => $row['T'], // Insert data alamat dari kolom D di excel
                    'id_wb' => $row['U'], // Insert data nis dari kolom A di excel
                ));
            }

            $numrow++; // Tambah 1 setiap kali looping
        }
        // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
        $this->Isi_wb_model->insert_multiple($data);

        redirect("Isi_wb"); // Redirect ke halaman awal (ke controller siswa fungsi index)
    }

    public function delete_wb_u($no_transaction)
    {
        $no_transaction = urldecode($no_transaction);
        $this->Isi_wb_model->delete_wb($no_transaction);
        redirect('Isi_wb/uncomplete');
    }
    public function delete_wb($no_transaction)
    {
        $no_transaction = urldecode($no_transaction);
        $this->Isi_wb_model->delete_wb($no_transaction);
        redirect('Isi_wb');
    }
    public function delete_wb_double($no_transaction)
    {
        $no_transaction = urldecode($no_transaction);
        $this->Isi_wb_model->delete_wb($no_transaction);
        redirect('Isi_wb/double');
    }
}
