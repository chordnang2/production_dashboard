<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dmbd_controller extends CI_Controller
{
    private $filename = "import_data"; // Kita tentukan nama filenya

    public function __construct()
    {
        parent::__construct();
        $this->cek_login();
        $this->load->model('Isi_dmbd_model');
        $this->load->library(['form_validation', 'session']);
        $this->load->helper(['url_helper', 'form']);
    }

    public function index()
    {
        $data["dmbd"] = $this->Isi_dmbd_model->get_all();
        $this->load->view('template/template_table/template_atas_table');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/data_gabungan/data_dmbd', $data);
        $this->load->view('template/template_table/template_bawah_table');
    }

    public function form()
    {
        $data = array(); // Buat variabel $data sebagai array

        if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
            // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
            $upload = $this->Isi_dmbd_model->upload_file($this->filename);

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
        $this->load->view('isi/form/form_excel_dmbd', $data);
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
                    'bulan' => $row['A'],
                    'tanggal' => $row['B'], // Insert data nis dari kolom A di excel
                    'mo' => $row['C'], // Insert data nama dari kolom B di excel
                    'kode_unit' => $row['D'], // Insert data jenis kelamin dari kolom C di excel
                    'kode_vessel' => $row['E'], // Insert data jenis kelamin dari kolom C di excel
                    'model_unit' => $row['F'], // Insert data alamat dari kolom D di excel
                    'model_vessel' => $row['G'], // Insert data alamat dari kolom D di excel
                    'hm' => $row['H'], // Insert data alamat dari kolom D di excel
                    'km' => $row['I'], // Insert data alamat dari kolom D di excel
                    'task' => $row['J'], // Insert data alamat dari kolom D di excel
                    'job_type' => $row['K'], // Insert data alamat dari kolom D di excel
                    'kerusakan' => $row['L'], // Insert data alamat dari kolom D di excel
                    'jenis_perbaikan' => $row['M'], // Insert data alamat dari kolom D di excel
                    'jam_mulai' => $row['N'], // Insert data alamat dari kolom D di excel
                    'jam_selesai' => $row['O'], // Insert data alamat dari kolom D di excel
                    'total_bd' => $row['P'], // Insert data alamat dari kolom D di excel
                    'status' => $row['Q'], // Insert data alamat dari kolom D di excel
                    'lokasi' => $row['R'], // Insert data alamat dari kolom D di excel
                    'remark' => $row['S'], // Insert data alamat dari kolom D di excel
                    'pic' => $row['T'], // Insert data alamat dari kolom D di excel
                    'pa' => $row['U'], // Insert data alamat dari kolom D di excel
                    'shift' => $row['V'], // Insert data alamat dari kolom D di excel
                ));
            }

            $numrow++; // Tambah 1 setiap kali looping
        }
        // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
        $this->Isi_dmbd_model->insert_multiple($data);

        redirect("Dmbd_controller"); // Redirect ke halaman awal (ke controller siswa fungsi index)
    }
}
