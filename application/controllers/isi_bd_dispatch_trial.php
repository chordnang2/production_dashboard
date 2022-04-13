<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Isi_bd_dispatch_trial extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->cek_login();
        $this->load->library('form_validation');
        $this->load->model('Isi_bd_dispatch_model_trial', 'MLiveTable');
    }

    public function index()
    {
        $data["unit"] = $this->MLiveTable->get_no_unit();
        $this->load->view('template/template_table/template_atas_table');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/data_gabungan/data_bd_dispatch', $data);
    }
    public function kosong()
    {
        // $data["unit"] = $this->MLiveTable->get_no_unit();
        $this->load->view('template/template_table/template_atas_table');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/data_gabungan/data_bd_dispatch_kosong');
    }

    function load_data()
    {
        $data = $this->MLiveTable->load_data();
        echo json_encode($data); // ubah array jadi json
    }
    function load_kosong()
    {
        $data = $this->MLiveTable->get_kosong();
        echo json_encode($data); // ubah array jadi json
    }


    function insert_data()
    {
        $data =
            [
                'date' => $this->input->post('date'),
                'shift'  => $this->input->post('shift'),
                'no_unit'   => $this->input->post('no_unit'),
                'problem'   => $this->input->post('problem'),
                'aktivity'   => $this->input->post('aktivity'),
                'preparation'   => $this->input->post('preparation'),
                'start'   => $this->input->post('start'),
                'time_out'   => $this->input->post('time_out'),
                'operasi'   => $this->input->post('operasi'),
                'hm'   => $this->input->post('hm'),
                'km'   => $this->input->post('km'),
                'location'   => $this->input->post('location')
            ];

        $this->MLiveTable->insert_data($data);
    }

    function update_data()
    {
        $data = [
            $this->input->post('table_column') => $this->input->post('value')
        ];
        $this->MLiveTable->update_data($data, $this->input->post('id'));
    }



    function delete()
    {
        $this->MLiveTable->delete($this->input->post('id'));
    }

    public function export()
    {
        // Load plugin PHPExcel nya
        include   'assets/PHPExcel/PHPExcel.php';

        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        // Settingan awal fil excel
        $excel->getProperties()->setCreator('My Notes Code')
            ->setLastModifiedBy('My Notes Code')
            ->setTitle("Data BD Workshop Dispatch")
            ->setSubject("Dispatch")
            ->setDescription("Laporan Semua Data Dispatch")
            ->setKeywords("Data Dispatch");
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
            'font' => array('bold' => true), // Set font nya jadi bold
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );
        // Buat header tabel nya pada baris ke 1
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "NO"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('B1', "TANGGAL"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('C1', "SHIFT"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('D1', "NOMOR UNIT"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('E1', "PROBLEM");
        $excel->setActiveSheetIndex(0)->setCellValue('F1', "AKTIFITAS");
        $excel->setActiveSheetIndex(0)->setCellValue('G1', "TIME PREPARATION");
        $excel->setActiveSheetIndex(0)->setCellValue('H1', "TIME START");
        $excel->setActiveSheetIndex(0)->setCellValue('I1', "TIME OUT");
        $excel->setActiveSheetIndex(0)->setCellValue('J1', "TIME OPERASI");
        $excel->setActiveSheetIndex(0)->setCellValue('K1', "HM");
        $excel->setActiveSheetIndex(0)->setCellValue('L1', "KM");
        $excel->setActiveSheetIndex(0)->setCellValue('M1', "LOKASI");
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('H1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('I1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('J1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('K1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('L1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('M1')->applyFromArray($style_col);
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $siswa = $this->MLiveTable->getAll();
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($siswa as $data) { // Lakukan looping pada variabel siswa
            $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->tanggal);
            $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->shift);
            $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->no_unit);
            $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->problem);
            $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->aktivity);
            $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data->preparation);
            $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data->start);
            $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data->time_out);
            $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $data->operasi);
            $excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data->hm);
            $excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $data->km);
            $excel->setActiveSheetIndex(0)->setCellValue('M' . $numrow, $data->location);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('J' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('K' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('L' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('M' . $numrow)->applyFromArray($style_row);

            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(15); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(40); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(15); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(15); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(15); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(15); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('J')->setWidth(15); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('K')->setWidth(15); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('L')->setWidth(15); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('M')->setWidth(15); // Set width kolom E

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Laporan Data Dispatch");
        $excel->setActiveSheetIndex(0);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Dispatch Semua.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }
    public function export_today()
    {
        // Load plugin PHPExcel nya
        include   'assets/PHPExcel/PHPExcel.php';

        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        // Settingan awal fil excel
        $excel->getProperties()->setCreator('My Notes Code')
            ->setLastModifiedBy('My Notes Code')
            ->setTitle("Data BD Workshop Dispatch")
            ->setSubject("Dispatch")
            ->setDescription("Laporan Semua Data Dispatch")
            ->setKeywords("Data Dispatch");
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
            'font' => array('bold' => true), // Set font nya jadi bold
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );
        // Buat header tabel nya pada baris ke 1
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "NO"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('B1', "TANGGAL"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('C1', "SHIFT"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('D1', "NOMOR UNIT"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('E1', "PROBLEM");
        $excel->setActiveSheetIndex(0)->setCellValue('F1', "AKTIFITAS");
        $excel->setActiveSheetIndex(0)->setCellValue('G1', "TIME PREPARATION");
        $excel->setActiveSheetIndex(0)->setCellValue('H1', "TIME START");
        $excel->setActiveSheetIndex(0)->setCellValue('I1', "TIME OUT");
        $excel->setActiveSheetIndex(0)->setCellValue('J1', "TIME OPERASI");
        $excel->setActiveSheetIndex(0)->setCellValue('K1', "HM");
        $excel->setActiveSheetIndex(0)->setCellValue('L1', "KM");
        $excel->setActiveSheetIndex(0)->setCellValue('M1', "LOKASI");
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('H1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('I1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('J1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('K1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('L1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('M1')->applyFromArray($style_col);
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $siswa = $this->MLiveTable->get_bd_today();
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($siswa as $data) { // Lakukan looping pada variabel siswa
            $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->tanggal);
            $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->shift);
            $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->no_unit);
            $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->problem);
            $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->aktivity);
            $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data->preparation);
            $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data->start);
            $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data->time_out);
            $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $data->operasi);
            $excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data->hm);
            $excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $data->km);
            $excel->setActiveSheetIndex(0)->setCellValue('M' . $numrow, $data->location);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('J' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('K' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('L' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('M' . $numrow)->applyFromArray($style_row);

            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(15); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(40); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(15); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(15); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(15); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(15); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('J')->setWidth(15); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('K')->setWidth(15); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('L')->setWidth(15); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('M')->setWidth(15); // Set width kolom E

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Laporan Data Dispatch");
        $excel->setActiveSheetIndex(0);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data_dispatch_hari_ini.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }

    public function loadajaxhanson()
    {
        if ($this->input->get('date')) {
            $data['date'] = $this->input->get('date');
            $data['data'] = $this->MLiveTable->wb_hanson($data);

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
        $data["aktifity"] = $this->MLiveTable->get_aktifity_group();
        $this->load->view('template/template_table/template_atas_table_hanson');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/data_gabungan/crud_bd_km6_trial', $data);
    }

    public function ajaxHandson()
    {
        $data = (array) json_decode(file_get_contents('php://input'), true);
        $data = $data['data'];
        $temp['result'] = $this->MLiveTable->update_handson($data);
        echo json_encode($temp);
    }
}
            /* End of file Isi_bd_dispatch.php and path /application/controllers/isi_bd_dispatch.php */
