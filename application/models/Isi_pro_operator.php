<?php defined('BASEPATH') or exit('No direct script access allowed');

class Isi_pro_operator extends CI_Model

{
    var $table = 'tbl_ketersediaan_opt';
    var $column_order = array('id', 'nama_status', 'jumlah', null); //set column field database for datatable orderable
    var $column_search = array('id', 'nama_status', 'jumlah'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('id' => 'asc'); // default order 

    public function get_payroll()
    {
        return $this->db->get('tbl_payroll')->result();
    }
    public function get_ketersediaan_opt()
    {
        return $this->db->get('tbl_ketersediaan_opt')->result();
    }

    public function upload_file($filename)
    {
        $this->load->library('upload'); // Load librari upload

        $config['upload_path'] = './excel/';
        $config['allowed_types'] = 'xlsx';
        $config['max_size']  = '10000';
        $config['overwrite'] = true;
        $config['file_name'] = $filename;

        $this->upload->initialize($config); // Load konfigurasi uploadnya
        if ($this->upload->do_upload('file')) { // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function insert_multiple($data)
    {
        $this->db->insert_batch('tbl_payroll', $data);
    }

    public function avg_hm_daily()
    {
        $query = $this->db->query("  SELECT
        ROUND(AVG((`hm1` + IFNULL(`hm2`, 0))),2) as a
        FROM
    (
        SELECT
            `nrp1`,
            driver1,
            SUM(hm_insentif1) as hm1
        FROM
            `tbl_payroll`
            INNER JOIN `tbl_opt` ON `tbl_payroll`.`nrp1` = `tbl_opt`.`nrp`
        WHERE
            date_payroll1 = '2021-09-30'
        group by
            nrp
        order by
            nrp ASC
    ) as inner_query
    LEFT JOIN (
        SELECT
            `nrp2`,
            SUM(hm_insentif2) as hm2
        FROM
            `tbl_payroll`
            INNER JOIN `tbl_opt` ON `tbl_payroll`.`nrp2` = `tbl_opt`.`nrp`
        WHERE
            date_payroll2 = '2021-09-30'
        group by
            nrp
        order by
            nrp ASC
    ) as inner_query2 ON inner_query.nrp1 = inner_query2.nrp2 ");

        return $query->result();
    }

    public function detail_hm_daily()
    {
        $query = $this->db->query(" SELECT
        nrp1,
        driver1,
        hm1,
        hm2,
        (`hm1` + IFNULL(`hm2`, 0)) as a
    FROM
        (
            SELECT
                `nrp1`,
                driver1,
                SUM(hm_insentif1) as hm1
            FROM
                `tbl_payroll`
                INNER JOIN `tbl_opt` ON `tbl_payroll`.`nrp1` = `tbl_opt`.`nrp`
            WHERE
                date_payroll1 = '2021-09-30'
            group by
                nrp
            order by
                nrp ASC
        ) as inner_query
        LEFT JOIN (
            SELECT
                `nrp2`,
                SUM(hm_insentif2) as hm2
            FROM
                `tbl_payroll`
                INNER JOIN `tbl_opt` ON `tbl_payroll`.`nrp2` = `tbl_opt`.`nrp`
            WHERE
                date_payroll2 = '2021-09-30'
            group by
                nrp
            order by
                nrp ASC
        ) as inner_query2 ON inner_query.nrp1 = inner_query2.nrp2");

        return $query->result();
    }
    public function detail_count_hm_daily()
    {
        $query = $this->db->query("SELECT
        count(nrp1) as count,
        hm1,
        hm2,
        (`hm1` +  IFNULL(`hm2`, 0)) as a
    FROM
        (
            SELECT
                `nrp1`,
                driver1,
                SUM(hm_insentif1) as hm1
            FROM
                `tbl_payroll`
                INNER JOIN `tbl_opt` ON `tbl_payroll`.`nrp1` = `tbl_opt`.`nrp`
            WHERE
                date_payroll1 = '2021-09-30'
            group by
                nrp
            order by
                nrp ASC
        ) as inner_query
        LEFT JOIN (
            SELECT
                `nrp2`,
                SUM(hm_insentif2) as hm2
            FROM
                `tbl_payroll`
                INNER JOIN `tbl_opt` ON `tbl_payroll`.`nrp2` = `tbl_opt`.`nrp`
            WHERE
                date_payroll2 = '2021-09-30'
            group by
                nrp
            order by
                nrp ASC
        ) as inner_query2 ON inner_query.nrp1 = inner_query2.nrp2 group by a order by count ASC");

        return $query->result();
    }

    public function avg_trip_daily()
    {
        $query = $this->db->query("  SELECT
        ROUND(AVG((`hm1` + IFNULL(`hm2`, 0))),2) as a
        FROM
    (
        SELECT
            `nrp1`,
            driver1,
            SUM(hm_insentif1)/5 as hm1
        FROM
            `tbl_payroll`
            INNER JOIN `tbl_opt` ON `tbl_payroll`.`nrp1` = `tbl_opt`.`nrp`
        WHERE
            date_payroll1 = '2021-09-30'
        group by
            nrp
        order by
            nrp ASC
    ) as inner_query
    LEFT JOIN (
        SELECT
            `nrp2`,
            SUM(hm_insentif2)/5 as hm2
        FROM
            `tbl_payroll`
            INNER JOIN `tbl_opt` ON `tbl_payroll`.`nrp2` = `tbl_opt`.`nrp`
        WHERE
            date_payroll2 = '2021-09-30'
        group by
            nrp
        order by
            nrp ASC
    ) as inner_query2 ON inner_query.nrp1 = inner_query2.nrp2 ");

        return $query->result();
    }

    public function detail_trip_daily()
    {
        $query = $this->db->query(" SELECT
        nrp1,
        driver1,
        hm1,
        hm2,
        (`hm1` + IFNULL(`hm2`, 0)) as a
    FROM
        (
            SELECT
                `nrp1`,
                driver1,
                SUM(hm_insentif1)/5 as hm1
            FROM
                `tbl_payroll`
                INNER JOIN `tbl_opt` ON `tbl_payroll`.`nrp1` = `tbl_opt`.`nrp`
            WHERE
                date_payroll1 = '2021-09-30'
            group by
                nrp
            order by
                nrp ASC
        ) as inner_query
        LEFT JOIN (
            SELECT
                `nrp2`,
                SUM(hm_insentif2)/5 as hm2
            FROM
                `tbl_payroll`
                INNER JOIN `tbl_opt` ON `tbl_payroll`.`nrp2` = `tbl_opt`.`nrp`
            WHERE
                date_payroll2 = '2021-09-30'
            group by
                nrp
            order by
                nrp ASC
        ) as inner_query2 ON inner_query.nrp1 = inner_query2.nrp2");

        return $query->result();
    }
    public function detail_count_trip_daily()
    {
        $query = $this->db->query("SELECT
        count(nrp1) as count,
        hm1,
        hm2,
        (`hm1` +  IFNULL(`hm2`, 0)) as a
    FROM
        (
            SELECT
                `nrp1`,
                driver1,
                SUM(hm_insentif1)/5 as hm1
            FROM
                `tbl_payroll`
                INNER JOIN `tbl_opt` ON `tbl_payroll`.`nrp1` = `tbl_opt`.`nrp`
            WHERE
                date_payroll1 = '2021-09-30'
            group by
                nrp
            order by
                nrp ASC
        ) as inner_query
        LEFT JOIN (
            SELECT
                `nrp2`,
                SUM(hm_insentif2)/5 as hm2
            FROM
                `tbl_payroll`
                INNER JOIN `tbl_opt` ON `tbl_payroll`.`nrp2` = `tbl_opt`.`nrp`
            WHERE
                date_payroll2 = '2021-09-30'
            group by
                nrp
            order by
                nrp ASC
        ) as inner_query2 ON inner_query.nrp1 = inner_query2.nrp2 group by a order by count ASC");

        return $query->result();
    }
    public function avg_opt_day($tanggal)
    {
        $query = $this->db->query("SELECT nik_day as nik,nama_day as nama,
        ROUND(SUM(wh_day),0) as wh_day,ROUND(SUM(total_stb_day)) as stb_day,ROUND(SUM(total_bd_day)) as bd_day
                FROM   tbl_hm
 WHERE  wh_day not in ('0') AND tanggal='$tanggal' group by nik_day
");

        return $query->result();
    }
    public function opt_day($tanggal)
    {
        $query = $this->db->query("SELECT nik_day as nik,nama_day as nama,date,
        ROUND(SUM(wh_day),0) as wh_day,ROUND(SUM(total_stb_day)) as stb_day,ROUND(SUM(total_bd_day)) as bd_day
                FROM   tbl_hm
 WHERE  wh_day not in ('0') AND date='$tanggal' group by nik_day
");

        return $query->result();
    }
    public function opt_night($tanggal)
    {
        $query = $this->db->query("SELECT nik_night as nik,nama_night as nama,
        ROUND(SUM(wh_night),0) as wh_night,ROUND(SUM(total_stb_night)) as stb_night,ROUND(SUM(total_bd_night)) as bd_night
                FROM   tbl_hm
 WHERE  wh_night not in ('0') AND date='$tanggal' group by nik_night
");

        return $query->result();
    }

    function load_data()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('tbl_ketersediaan_opt');
        return $query->result_array();


        return $query->result();
    }
    function update_data($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_ketersediaan_opt', $data);
    }
}
