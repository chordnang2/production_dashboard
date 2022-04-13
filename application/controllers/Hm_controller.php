<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hm_controller extends CI_Controller
{
    private $filename = "import_data"; // Kita tentukan nama filenya

    public function __construct()
    {
        parent::__construct();
        $this->cek_login();
        $this->load->library(['form_validation', 'session']);
        $this->load->helper(['url_helper', 'form']);
        $this->load->model('Hm_model');
    }

    public function index()
    {
        $data['tbl_bd'] = $this->Hm_model->all();
        $this->load->view('template/template_table/template_atas_table');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/data_gabungan/data_hm', $data);
        $this->load->view('template/template_table/template_bawah_table');
    }
    public function form()
    {
        $data = array(); // Buat variabel $data sebagai array

        if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
            // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
            $upload = $this->Hm_model->upload_file($this->filename);

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
        $this->load->view('isi/form/form_excel_hm', $data);
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
                    'tanggal' => $row['A'],
                    'nik_day' => $row['C'], // Insert data nis dari kolom A di excel
                    'nama_day' => $row['D'], // Insert data nama dari kolom B di excel
                    'ritase_day' => $row['E'], // Insert data jenis kelamin dari kolom C di excel
                    'unit_day' => $row['F'], // Insert data jenis kelamin dari kolom C di excel
                    'start_day' => $row['G'], // Insert data alamat dari kolom D di excel
                    'end_day' => $row['H'], // Insert data alamat dari kolom D di excel
                    'hours_day' => $row['I'], // Insert data alamat dari kolom D di excel
                    'wh_day' => $row['J'], // Insert data alamat dari kolom D di excel
                    'ganti_shift_day' => $row['K'], // Insert data alamat dari kolom D di excel
                    'p5m_day' => $row['L'], // Insert data alamat dari kolom D di excel
                    'p2h_day' => $row['M'], // Insert data alamat dari kolom D di excel
                    'isi_solar_day' => $row['N'], // Insert data alamat dari kolom D di excel
                    'coal_limit_day' => $row['O'], // Insert data alamat dari kolom D di excel
                    'ism_day' => $row['P'], // Insert data alamat dari kolom D di excel
                    'no_driver_day' => $row['Q'], // Insert data alamat dari kolom D di excel
                    'periksa_ban_day' => $row['R'], // Insert data alamat dari kolom D di excel
                    'sholat_day' => $row['S'], // Insert data alamat dari kolom D di excel
                    'cuci_unit_day' => $row['T'], // Insert data alamat dari kolom D di excel
                    'silo_bd_day' => $row['U'], // Insert data alamat dari kolom D di excel
                    'hopper_bd_day' => $row['V'], // Insert data alamat dari kolom D di excel
                    'external_prob_day' => $row['W'], // Insert data alamat dari kolom D di excel
                    'antri_load_day' => $row['X'], // Insert data alamat dari kolom D di excel
                    'antri_dump_day' => $row['Y'], // Insert data alamat dari kolom D di excel
                    'antri_wb_day' => $row['Z'], // Insert data alamat dari kolom D di excel
                    'total_stb_day' => $row['AA'], // Insert data alamat dari kolom D di excel
                    'repair_day' => $row['AB'], // Insert data alamat dari kolom D di excel
                    'service_day' => $row['AC'], // Insert data alamat dari kolom D di excel
                    'accident_day' => $row['AD'], // Insert data alamat dari kolom D di excel
                    'total_bd_day' => $row['AE'], // Insert data alamat dari kolom D di excel
                    'pa_day' => $row['AF'], // Insert data alamat dari kolom D di excel
                    'ua_day' => $row['AG'], // Insert data alamat dari kolom D di excel

                    'nik_night' => $row['AI'], // Insert data nis dari kolom A di excel
                    'nama_night' => $row['AJ'], // Insert data nama dari kolom B di excel
                    'ritase_night' => $row['AK'], // Insert data jenis kelamin dari kolom C di excel

                    'start_night' => $row['AM'], // Insert data alamat dari kolom D di excel
                    'end_night' => $row['AN'], // Insert data alamat dari kolom D di excel
                    'hours_night' => $row['AO'], // Insert data alamat dari kolom D di excel
                    'wh_night' => $row['AP'], // Insert data alamat dari kolom D di excel
                    'ganti_shift_night' => $row['AQ'], // Insert data alamat dari kolom D di excel
                    'p5m_night' => $row['AR'], // Insert data alamat dari kolom D di excel
                    'p2h_night' => $row['AS'], // Insert data alamat dari kolom D di excel
                    'isi_solar_night' => $row['AT'], // Insert data alamat dari kolom D di excel
                    'coal_limit_night' => $row['AU'], // Insert data alamat dari kolom D di excel
                    'ism_night' => $row['AV'], // Insert data alamat dari kolom D di excel
                    'no_driver_night' => $row['AW'], // Insert data alamat dari kolom D di excel
                    'periksa_ban_night' => $row['AX'], // Insert data alamat dari kolom D di excel
                    'sholat_night' => $row['AY'], // Insert data alamat dari kolom D di excel
                    'cuci_unit_night' => $row['AZ'], // Insert data alamat dari kolom D di excel
                    'silo_bd_night' => $row['BA'], // Insert data alamat dari kolom D di excel
                    'hopper_bd_night' => $row['BB'], // Insert data alamat dari kolom D di excel
                    'external_prob_night' => $row['BC'], // Insert data alamat dari kolom D di excel
                    'antri_load_night' => $row['BD'], // Insert data alamat dari kolom D di excel
                    'antri_dump_night' => $row['BE'], // Insert data alamat dari kolom D di excel
                    'antri_wb_night' => $row['BF'], // Insert data alamat dari kolom D di excel
                    'total_stb_night' => $row['BG'], // Insert data alamat dari kolom D di excel
                    'repair_night' => $row['BH'], // Insert data alamat dari kolom D di excel
                    'service_night' => $row['BI'], // Insert data alamat dari kolom D di excel
                    'accident_night' => $row['BJ'], // Insert data alamat dari kolom D di excel
                    'total_bd_night' => $row['BK'], // Insert data alamat dari kolom D di excel
                    'pa_night' => $row['BL'], // Insert data alamat dari kolom D di excel
                    'ua_night' => $row['BM'], // Insert data alamat dari kolom D di excel
                    'total_hm' => $row['BN'], // Insert data alamat dari kolom D di excel

                ));
            }

            $numrow++; // Tambah 1 setiap kali looping
        }
        // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
        $this->Hm_model->insert_multiple($data);

        redirect("Hm_controller"); // Redirect ke halaman awal (ke controller siswa fungsi index)
    }



    public function crud_hm()
    {
        $data = array(
            "all" => $this->db->get('tbl_hm_2')->result(),
            "judul" => "Modal",
        );
        $this->load->view('template/template_table/template_atas_table');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/data_gabungan/crud_hm', $data);
    }



    public function add()
    {
        $this->form_validation->set_rules('tanggal', 'nik', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', "Data Gagal Di Tambahkan");
            redirect('Hm_controller/crud_hm');
        } else {
            $data = array(
                "tanggal" => $_POST['tanggal'],
                "nik" => $_POST['nik'],
                "shift" => $_POST['shift'],
                "nama" => $_POST['nama'],
                "ritase" => $_POST['ritase'],
                "unit" => $_POST['unit'],
                "hmawal" => $_POST['hmawal'],
                "hmakhir" => $_POST['hmakhir'],
                "hmunit" => $_POST['hmunit'],
            );
            $this->db->insert('tbl_hm_2', $data);
            $this->session->set_flashdata('sukses', "Data Berhasil Disimpan");
            redirect('Hm_controller/crud_hm');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('tanggal', 'nik', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', "Data Gagal Di Edit");
            redirect('Hm_controller/crud_hm');
        } else {
            $data = array(
                "tanggal" => $_POST['tanggal'],
                "nik" => $_POST['nik'],
                "shift" => $_POST['shift'],
                "nama" => $_POST['nama'],
                "ritase" => $_POST['ritase'],
                "unit" => $_POST['unit'],
                "hmawal" => $_POST['hmawal'],
                "hmakhir" => $_POST['hmakhir'],
                "hmunit" => $_POST['hmunit'],
            );
            $this->db->where('id', $_POST['id']);
            $this->db->update('tbl_hm_2', $data);
            $this->session->set_flashdata('sukses', "Data Berhasil Diedit");
            redirect('Hm_controller/crud_hm');
        }
    }

    public function hapus($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('error', "Data Anda Gagal Di Hapus");
            redirect('Hm_controller/crud_hm');
        } else {
            $this->db->where('id', $id);
            $this->db->delete('tbl_hm_2');
            $this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
            redirect('Hm_controller/crud_hm');
        }
    }
    public function get_nik_nama()
    {
        $nrp = $this->input->post('nrp');
        $data = $this->Hm_model->get_opt_nik_nama($nrp);
        echo json_encode($data);
    }
    public function get_nik_nama2()
    {
        $nrp2 = $this->input->post('nrp2');
        $data = $this->Hm_model->get_opt_nik_nama2($nrp2);
        echo json_encode($data);
    }
    public function loadajaxhanson()
    {
        if ($this->input->get('date')) {
            $data['date'] = $this->input->get('date');
            $data['data'] = $this->Hm_model->wb_hanson($data);

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
        $this->load->model('Isi_highlight_model');

        $data['last_date_update'] = $this->Isi_highlight_model->hm();

        $this->load->view('template/template_table/template_atas_table_hanson');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/data_gabungan/crud_hm_handsontable', $data);
    }

    public function ajaxHandson()
    {
        $data = (array) json_decode(file_get_contents('php://input'), true);
        $data = $data['data'];
        $temp['result'] = $this->Hm_model->update_handson($data);
        echo json_encode($temp);
    }
}
