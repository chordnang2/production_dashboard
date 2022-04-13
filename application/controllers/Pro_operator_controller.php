<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pro_operator_controller extends CI_Controller
{
    private $filename = "import_data"; // Kita tentukan nama filenya

    public function __construct()
    {
        parent::__construct();
        $this->cek_login();
        $this->load->model('Isi_pro_operator');
        $this->load->library(['form_validation', 'session']);
        $this->load->helper(['url_helper', 'form']);
    }

    public function index()
    {
        $data["payroll"] = $this->Isi_pro_operator->get_payroll();
        $this->load->view('template/template_table/template_atas_table');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/data_gabungan/data_payroll', $data);
        $this->load->view('template/template_table/template_bawah_table');
    }
    public function ketersediaan_opt()
    {
        $data["get_ketersediaan_opt"] = $this->Isi_pro_operator->get_ketersediaan_opt();
        $this->load->view('template/template_table/template_atas_table');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/data_gabungan/data_ketersediaan_opt', $data);
        $this->load->view('template/template_table/template_bawah_table');
    }
    public function ketersediaan_opt_detail()
    {
        $this->load->view('template/template_table/template_atas_table');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/data_gabungan/data_ketersediaan_opt_detail');
        $this->load->view('template/template_table/template_bawah_table');
    }
    public function pro_opt()
    {
        $this->load->model('Hm_model');
        
        $tanggal = $this->input->get('tanggal');
        
        $data["avg_hm_daily"] = $this->Isi_pro_operator->avg_hm_daily();
        $data["detail_hm_daily"] = $this->Isi_pro_operator->detail_hm_daily();
        $data["detail_count_hm_daily"] = $this->Isi_pro_operator->detail_count_hm_daily();
        $data["avg_trip_daily"] = $this->Isi_pro_operator->avg_trip_daily();
        $data["detail_trip_daily"] = $this->Isi_pro_operator->detail_trip_daily();
        $data["detail_count_trip_daily"] = $this->Isi_pro_operator->detail_count_trip_daily();
        $data["opt_day"] = $this->Isi_pro_operator->opt_day($tanggal);
        $data["opt_night"] = $this->Isi_pro_operator->opt_night($tanggal);

        $data['last_date_update'] = $this->Hm_model->last_date_update();

        $this->load->view('template/template_dashboard/template_atas_dashboard _operator');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/data_dashboard/data_produktifitas_operator', $data);
        $this->load->view('template/template_dashboard/template_bawah_dashboard_operator');
    }

    public function form()
    {
        $data = array(); // Buat variabel $data sebagai array

        if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
            // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
            $upload = $this->Isi_pro_operator->upload_file($this->filename);

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
        $this->load->view('isi/form/form_excel_payroll', $data);
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
                    'date_produksi' => $row['A'],
                    'date_payroll1' => $row['B'], // Insert data nis dari kolom A di excel
                    'nrp1' => $row['C'], // Insert data nama dari kolom B di excel
                    'driver1' => $row['D'], // Insert data jenis kelamin dari kolom C di excel
                    'hm_insentif1' => $row['E'], // Insert data jenis kelamin dari kolom C di excel
                    'date_payroll2' => $row['F'], // Insert data alamat dari kolom D di excel
                    'nrp2' => $row['G'], // Insert data alamat dari kolom D di excel
                    'driver2' => $row['H'], // Insert data alamat dari kolom D di excel
                    'hm_insentif2' => $row['I'], // Insert data alamat dari kolom D di excel
                    'unit' => $row['J'], // Insert data alamat dari kolom D di excel
                    'vessel_type' => $row['K'], // Insert data alamat dari kolom D di excel
                    'shift' => $row['L'], // Insert data alamat dari kolom D di excel
                    'rekap_ritase_operator' => $row['M'], // Insert data alamat dari kolom D di excel
                    'num_trip' => $row['N'], // Insert data alamat dari kolom D di excel
                    'time_in' => $row['O'], // Insert data alamat dari kolom D di excel
                    'time_out' => $row['P'], // Insert data alamat dari kolom D di excel
                    'dari' => $row['Q'], // Insert data alamat dari kolom D di excel
                    'ke' => $row['R'], // Insert data alamat dari kolom D di excel
                    'tonase' => $row['S'], // Insert data alamat dari kolom D di excel
                    'wb	' => $row['T'], // Insert data alamat dari kolom D di excel
                    'kosongan	' => $row['U'], // Insert data alamat dari kolom D di excel
                    'net	' => $row['V'], // Insert data alamat dari kolom D di excel
                    'id_transaksi' => $row['W'], // Insert data alamat dari kolom D di excel
                    'tipe_coal' => $row['X'], // Insert data alamat dari kolom D di excel
                    'weighbridge' => $row['Y'], // Insert data alamat dari kolom D di excel

                ));
            }

            $numrow++; // Tambah 1 setiap kali looping
        }
        // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
        $this->Isi_pro_operator->insert_multiple($data);

        redirect("Pro_operator_controller"); // Redirect ke halaman awal (ke controller siswa fungsi index)
    }
    function load_data()
    {
        $data = $this->Isi_pro_operator->load_data();
        echo json_encode($data); // ubah array jadi json
    }
    function update_data()
    {
        $data = [
            $this->input->post('table_column') => $this->input->post('value')
        ];
        $this->Isi_pro_operator->update_data($data, $this->input->post('id'));
    }
}
