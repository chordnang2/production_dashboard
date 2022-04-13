<?php defined('BASEPATH') or die('No direct script access allowed');

require ('vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Isi_bd_dispatch_model');
    }

    public function index()
    {
        $data['semua_pengguna'] = $this->Isi_bd_dispatch_model->getAll()->result();
        $this->load->view('export', $data);
    }

    public function export()
    {
        $semua_pengguna = $this->Isi_bd_dispatch_model->getAll()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Tanggal')
            ->setCellValue('C1', 'Shift')
            ->setCellValue('D1', 'Nomer Unit')
            ->setCellValue('E1', 'Problem')
            ->setCellValue('F1', 'Aktifitas')
            ->setCellValue('G1', 'Time Preparation')
            ->setCellValue('H1', 'Time Start')
            ->setCellValue('I1', 'Time Out')
            ->setCellValue('J1', 'Time Operasi')
            ->setCellValue('K1', 'HM')
            ->setCellValue('L1', 'KM')
            ->setCellValue('M1', 'Lokasi');


        $kolom = 2;
        $nomor = 1;
        foreach ($semua_pengguna as $pengguna) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $pengguna->tanggal)
                ->setCellValue('C' . $kolom, $pengguna->shift)
                ->setCellValue('D' . $kolom, $pengguna->no_unit)
                ->setCellValue('E' . $kolom, $pengguna->problem)
                ->setCellValue('F' . $kolom, $pengguna->aktivity)
                ->setCellValue('G' . $kolom, $pengguna->preparation)
                ->setCellValue('H' . $kolom, $pengguna->start)
                ->setCellValue('I' . $kolom, $pengguna->time_out)
                ->setCellValue('J' . $kolom, $pengguna->operasi)
                ->setCellValue('K' . $kolom, $pengguna->hm)
                ->setCellValue('L' . $kolom, $pengguna->km)
                ->setCellValue('M' . $kolom, $pengguna->location);
         

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="bd_dispatch.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
