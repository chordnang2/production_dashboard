<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Isi_db_opt extends CI_Controller {


public function __construct() {

        parent::__construct();

        $this->load->model('isi_db_opt_model', 'opt_chart');

    }

    public function index() {

        $this->load->view('isi/data_dashboard/data_produktifitas_operator');

    }

    public function get_chart_data() {

        if (isset($_POST['start']) AND isset($_POST['end'])) {

            $start_date = $_POST['start'];

            $end_date = $_POST['end'];

            $results = $this->chart->get_chart_data($start_date, $end_date);

            if ($results === NULL) {

                echo json_encode('Tidak ada data ditemukan');

            } else {

                $json = '[';

                $counter = 1;

                foreach ($results as $result) {

                    $json .= '[';

                    $json .= strtotime($result->date);

                    $json .= ',';

                    $json .= $result->min;

                    $json .= ',';

                    $json .= $result->max;

                    $json .= ']';

                    if ($counter < count($results)) {

                        $json .= ',';

                    }

                    $counter++;

                }

                $json .= ']';

                echo $json;

            }

        } else {

            echo json_encode('Tanggal wajib dipilih');

        }

    }

}
