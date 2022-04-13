<?php defined('BASEPATH') or exit('No direct script access allowed');



class Isi_highlight_model extends CI_Model



{







    public function rules()

    {

        return [

            [

                'field' => 'no_transaction',

                'label' => 'NOMER TRANSAKSI',

                'rules' => 'required'

            ],

            [

                'field' => 'payment',

                'label' => 'PAYMENT',

                'rules' => 'required'

            ],

            [

                'field' => 'nrp',

                'label' => 'NRP',

                'rules' => 'required'

            ],

            [

                'field' => 'nrp_gantungan',

                'label' => 'NRP GANTUNGAN',

                'rules' => 'required'

            ],

            [

                'field' => 'time_in_hg',

                'label' => 'TIME IN LOADING',

                'rules' => 'required'

            ],

            [

                'field' => 'tonase',

                'label' => 'TONASE',

                'rules' => 'required'

            ],

            [

                'field' => 'hm',

                'label' => 'HM',

                'rules' => 'required'

            ],

            [

                'field' => 'km',

                'label' => 'KM',

                'rules' => 'required'

            ],

        ];
    }







    public function get_wb()

    {

        $query = $this->db->query("SELECT tbl_wb2.* FROM tbl_wb2 WHERE status='COMPLETE'");

        // status_highlight IS NULL OR status_highlight='' AND 

        return $query->result();
    }



    public function get_hg()

    {

        $query = $this->db->query("SELECT tbl_highlight.* FROM tbl_highlight");

        // status_highlight IS NULL OR status_highlight='' AND 

        return $query->result();
    }

    public function getUserById($no_transaction)

    {

        return $this->db->get_where('tbl_wb2', ['no_transaction ' => $no_transaction])->row_array();
    }



    public function target_produksi()

    {

        $query = $this->db->query("SELECT target_produksi_capacity as tp, target_contract as tc, target_contract_rev as tcr, target_internal as tino , bulan FROM tbl_target_produksi GROUP BY bulan DESC ORDER BY `tbl_target_produksi`.`no` ASC");





        return $query->result();
    }



    public function upload_file($filename)

    {

        $this->load->library('upload'); // Load librari upload



        $config['upload_path'] = './excel/';

        $config['allowed_types'] = 'xlsx';

        $config['max_size']  = '50000';

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

        $this->db->insert_batch('tbl_highlight', $data);
    }

    public function update()

    {

        $post = $this->input->post();

        $this->no_transaction = $post["no_transaction"];

        $this->payment = $post["payment"];

        $this->nrp = $post["nrp"];

        $this->nrp_gantungan = $post["nrp_gantungan"];

        $this->time_in_hg = $post["time_in_hg"];

        $this->tonase = $post["tonase"];

        $this->hm = $post["hm"];

        $this->km = $post["km"];

        return $this->db->update('tbl_wb2', $this, array('no_transaction' => $post['no_transaction']));
    }







    public function get_opt()

    {

        return $this->db->get('tbl_opt')->result();
    }





    public function get_wb_include($no_transaction)

    {

        $hsl = $this->db->query("SELECT * FROM tbl_wb2 WHERE no_transaction ='$no_transaction'");



        return $hsl->result();
    }



    // GRAGIK

    public function net3()

    {

        date_default_timezone_set('Asia/Singapore');

        $t = strtotime("today");

        $y = strtotime("yesterday");

        $hariini = date("Y-m-d", $t);

        $kemaren = date("Y-m-d", $y);



        $jamini = date("H");

        $menitini = date("m", $t);

        $detikini = date("s", $t);





        if ($jamini >= 00 && $jamini < 07) {

            $a =  $kemaren;
        } else {

            $a =  $hariini;
        }

        // $a =  "2021-09-11";

        $query = $this->db->query("SELECT  

        (SELECT   round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '07:59:00' AND date = '$a')as a,

        (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '08:59:00' AND date = '$a')as b,

        (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '09:59:00' AND date = '$a')as c,

        (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '10:59:00' AND date = '$a')as d,

        (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '11:59:00' AND date = '$a')as e,

        (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '12:59:00' AND date = '$a')as f,

        (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '13:59:00' AND date = '$a')as g,

        (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '14:59:00' AND date = '$a')as h,

        (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '15:59:00' AND date = '$a')as i,

        (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '16:59:00' AND date = '$a')as j,

        (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '17:59:00' AND date = '$a')as k,

        (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '18:59:00' AND date = '$a')as l,

        (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '19:59:00' AND date = '$a')as m,

        (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '20:59:00' AND date = '$a')as n,

        (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '21:59:00' AND date = '$a')as o,

        (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '22:59:00' AND date = '$a')as p,

        (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '23:59:00' AND date = '$a')as q,

       

        (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'00:01:00'AND '00:59:00' AND date = '$kemaren')as r,

        (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'00:01:00'AND '01:59:00' AND date = '$kemaren')as s,

        (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'00:01:00'AND '02:59:00' AND date = '$kemaren')as t,

        (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'00:01:00'AND '03:59:00' AND date = '$kemaren')as u,

        (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'00:01:00'AND '04:59:00' AND date = '$kemaren')as v,

        (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'00:01:00'AND '05:59:00' AND date = '$kemaren')as w,

        (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'00:01:00'AND '06:59:00' AND date = '$kemaren')as x");





        return $query->result();
    }



    public function avgmuatan()

    {



        date_default_timezone_set('Asia/Singapore');

        $t = strtotime("today");

        $y = strtotime("yesterday");

        $hariini = date("Y-m-d", $t);

        $kemaren = date("Y-m-d", $y);



        $jamini = date("H");

        $menitini = date("m", $t);

        $detikini = date("s", $t);





        if ($jamini >= 00 && $jamini < 07) {

            $a = $kemaren;
        } else {

            $a =  $hariini;
        }



        $query = $this->db->query("SELECT AVG(nett)/1000 as a,nett,`tbl_wb2`.loading_point,no_unit,`tbl_km_lokasi`.nama_lokasi



        FROM `tbl_wb2`LEFT JOIN `tbl_km_lokasi` ON `tbl_km_lokasi`.`nama_lokasi` = `tbl_wb2`.`loading_point` WHERE date =  '$a'  group by loading_point order by a ASC ");





        return $query->result();
    }

    public function avgmuatan_tipevessel()

    {



        date_default_timezone_set('Asia/Singapore');

        $t = strtotime("today");

        $y = strtotime("yesterday");

        $hariini = date("Y-m-d", $t);

        $kemaren = date("Y-m-d", $y);



        $jamini = date("H");

        $menitini = date("m", $t);

        $detikini = date("s", $t);





        if ($jamini >= 00 && $jamini < 07) {

            $a = $kemaren;
        } else {

            $a =  $hariini;
        }



        $query = $this->db->query("SELECT AVG(nett)/1000 as a,nett,`tbl_wb2`.tipe_vessel,no_unit,`tbl_km_lokasi`.nama_lokasi



        FROM `tbl_wb2`LEFT JOIN `tbl_km_lokasi` ON `tbl_km_lokasi`.`nama_lokasi` = `tbl_wb2`.`loading_point` WHERE date =  '$a'  group by tipe_vessel order by a ASC");





        return $query->result();
    }

    // public function sumtriptipevesselall()

    // {



    //     date_default_timezone_set('Asia/Singapore');

    //     $t = strtotime("today");

    //     $y = strtotime("yesterday");

    //     $hariini = date("Y-m-d", $t);

    //     $kemaren = date("Y-m-d", $y);



    //     $jamini = date("H");

    //     $menitini = date("m", $t);

    //     $detikini = date("s", $t);





    //     if ($jamini >= 00 && $jamini < 07) {

    //         $a = $kemaren;

    //     } else {

    //         $a =  $hariini;

    //     }



    //     $query = $this->db->query("SELECT COUNT(no_transaction) as a,count(`type`) as raw,nett,`tbl_wb2`.tipe_vessel,no_unit,`tbl_km_lokasi`.nama_lokasi



    //     FROM `tbl_wb2`LEFT JOIN `tbl_km_lokasi` ON `tbl_km_lokasi`.`nama_lokasi` = `tbl_wb2`.`loading_point` WHERE date =  '$a'  group by tipe_vessel order by a ASC");





    //     return $query->result();

    // }

    public function sumtriptipevesselraw()

    {



        date_default_timezone_set('Asia/Singapore');

        $t = strtotime("today");

        $y = strtotime("yesterday");

        $hariini = date("Y-m-d", $t);

        $kemaren = date("Y-m-d", $y);



        $jamini = date("H");

        $menitini = date("m", $t);

        $detikini = date("s", $t);





        if ($jamini >= 00 && $jamini < 07) {

            $a = $kemaren;
        } else {

            $a =  $hariini;
        }



        $query = $this->db->query("SELECT

        total,target, raw,tipe_vessel1

    FROM

        (

            SELECT

                ROUND(AVG(`nett`)/1000) as total,

                ROUND(target/1000) as target,

                `tbl_wb2`.tipe_vessel as tipe_vessel1,

                no_unit,

                `tbl_km_lokasi`.nama_lokasi

            FROM

                `tbl_wb2`

                LEFT JOIN `tbl_km_lokasi` ON `tbl_km_lokasi`.`nama_lokasi` = `tbl_wb2`.`loading_point`

          WHERE

                date = '$a'

                AND type = 'RAW COAL'

            group by

                tipe_vessel

            order by

                total ASC

        ) as total_inner

        LEFT JOIN (

            SELECT

                count(`no_transaction`) as raw,

                nett,

                `tbl_wb2`.tipe_vessel as tipe_vessel2,

                no_unit,

                `tbl_km_lokasi`.nama_lokasi

            FROM

                `tbl_wb2`

                LEFT JOIN `tbl_km_lokasi` ON `tbl_km_lokasi`.`nama_lokasi` = `tbl_wb2`.`loading_point`

            WHERE

                date = '$a'

                AND type = 'RAW COAL'

            group by

                tipe_vessel

            order by

                raw ASC

        ) as raw_inner ON total_inner.tipe_vessel1 =raw_inner.tipe_vessel2");





        return $query->result();
    }

    public function sumtriptipevesselcrush()

    {



        date_default_timezone_set('Asia/Singapore');

        $t = strtotime("today");

        $y = strtotime("yesterday");

        $hariini = date("Y-m-d", $t);

        $kemaren = date("Y-m-d", $y);



        $jamini = date("H");

        $menitini = date("m", $t);

        $detikini = date("s", $t);





        if ($jamini >= 00 && $jamini < 07) {

            $a = $kemaren;
        } else {

            $a =  $hariini;
        }



        $query = $this->db->query("SELECT

        total,target, crush,tipe_vessel1

    FROM

        (

            SELECT

            ROUND(AVG(`nett`)/1000) as total,

                ROUND(target/1000) as target,

                nett,

                `tbl_wb2`.tipe_vessel as tipe_vessel1,

                no_unit,

                `tbl_km_lokasi`.nama_lokasi

            FROM

                `tbl_wb2`

                LEFT JOIN `tbl_km_lokasi` ON `tbl_km_lokasi`.`nama_lokasi` = `tbl_wb2`.`loading_point`

            WHERE

                date = '$a'

                AND type = 'CRUSH COAL'

            group by

                tipe_vessel

            order by

                total ASC

        ) as total_inner

        LEFT JOIN (

            SELECT

                count(`no_transaction`) as crush,

                nett,

                `tbl_wb2`.tipe_vessel as tipe_vessel2,

                no_unit,

                `tbl_km_lokasi`.nama_lokasi

            FROM

                `tbl_wb2`

                LEFT JOIN `tbl_km_lokasi` ON `tbl_km_lokasi`.`nama_lokasi` = `tbl_wb2`.`loading_point`

            WHERE

                date = '$a'

                AND type = 'CRUSH COAL'

            group by

                tipe_vessel

            order by

                crush ASC

        ) as raw_inner ON total_inner.tipe_vessel1 =raw_inner.tipe_vessel2");





        return $query->result();
    }

    public function under_lokasi()

    {

        date_default_timezone_set('Asia/Singapore');

        $t = strtotime("today");

        $y = strtotime("yesterday");

        $hariini = date("Y-m-d", $t);

        $kemaren = date("Y-m-d", $y);



        $jamini = date("H");

        $menitini = date("m", $t);

        $detikini = date("s", $t);





        if ($jamini >= 00 && $jamini < 07) {

            $a =  $kemaren;
        } else {

            $a =  $hariini;
        }

        // $query = $this->db->query(" SELECT tbl_wb2.loading_point as lokasi, COUNT(`no_transaction`) as count FROM `tbl_wb2`   WHERE time_out BETWEEN'07:00:00'AND '18:59:00' AND date = '$a' AND keterangan='UNDERLOAD' OR time_out BETWEEN '00:01:00'AND '06:59:00' AND date = '$a' AND keterangan='UNDERLOAD' GROUP BY loading_point ");

        $query = $this->db->query(" SELECT tbl_wb2.loading_point as lokasi, COUNT(`no_transaction`) as count FROM `tbl_wb2`   WHERE  date = '$a' AND keterangan='UNDERLOAD'  GROUP BY loading_point");



        return $query->result();
    }



    public function trip_lokasi()

    {



        date_default_timezone_set('Asia/Singapore');

        $t = strtotime("today");

        $y = strtotime("yesterday");

        $hariini = date("Y-m-d", $t);

        $kemaren = date("Y-m-d", $y);



        $jamini = date("H");

        $menitini = date("m", $t);

        $detikini = date("s", $t);





        if ($jamini >= 00 && $jamini < 07) {

            $a = $kemaren;
        } else {

            $a =  $hariini;
        }

        $query = $this->db->query(" SELECT tbl_wb2.loading_point as lokasi, COUNT(`no_transaction`) as count FROM `tbl_wb2`   WHERE  date =  '$a'  GROUP BY loading_point  ");





        return $query->result();
    }





    public function tonkm()

    {



        date_default_timezone_set('Asia/Singapore');

        $t = strtotime("today");

        $y = strtotime("yesterday");

        $hariini = date("Y-m-d", $t);

        $kemaren = date("Y-m-d", $y);



        $jamini = date("H");

        $menitini = date("m", $t);

        $detikini = date("s", $t);



        if ($jamini >= 00 && $jamini < 07) {

            $a = $kemaren;
        } else {

            $a =  $hariini;
        }

        $query = $this->db->query("SELECT sum(nett)/1000 as a, COUNT(no_transaction)as b, tbl_km_lokasi.km as c,`tbl_wb2`.loading_point,no_unit

        FROM `tbl_wb2`LEFT JOIN `tbl_km_lokasi` ON `tbl_km_lokasi`.`nama_lokasi` = `tbl_wb2`.`loading_point` WHERE  date =  '$a'  GROUP BY loading_point");





        return $query->result();
    }

    public function sum_bulan()

    {

        $query = $this->db->query("SELECT ROUND(sum(nett)/1000) as sum, DATE_FORMAT(date, '%m') as month2 , DATE_FORMAT(date, '%M') as month FROM `tbl_wb2` WHERE nett IS NOT NULL and date is NOT NULL and  DATE_FORMAT(date, '%Y')='2021' group by month order by month2 ASC");


        return $query->result();
    }
    public function sum_bulan2()

    {

        $query = $this->db->query("SELECT ROUND(sum(nett)/1000) as sum, DATE_FORMAT(date, '%m') as month2 , DATE_FORMAT(date, '%M') as month FROM `tbl_wb2` WHERE nett IS NOT NULL and date is NOT NULL and  DATE_FORMAT(date, '%Y')='2022' group by month order by month2 ASC");


        return $query->result();
    }

    public function sum_bulan_gunungsari()

    {

        $query = $this->db->query("SELECT ROUND(sum(nett)/1000) as sum, DATE_FORMAT(date, '%m') as month2 , DATE_FORMAT(date, '%M') as month FROM tbl_driver_ritasi_gunungsari WHERE nett IS NOT NULL and date is NOT NULL group by month order by month2 ASC");





        return $query->result();
    }

    public function sum_harian2()

    {


        $query = $this->db->query("SELECT *

               

        FROM

            (

                SELECT

                    ROUND(sum(nett) / 1000) as sumjan,

                    DATE_FORMAT(date, '%d') as dayjan

                    FROM

                    `tbl_wb2`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '01'
                    and DATE_FORMAT(date, '%Y')='2022'

                group by

                    dayjan

                order by

                    dayjan ASC

            ) as jan

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as sumfeb,

                    DATE_FORMAT(date, '%d') as dayfeb

                FROM

                    `tbl_wb2`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '02'
                  and DATE_FORMAT(date, '%Y')='2022'

                group by

                    dayfeb

                order by

                    dayfeb ASC

            ) as feb ON jan.dayjan = feb.dayfeb

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as summar,

                    DATE_FORMAT(date, '%d') as daymar

                FROM

                    `tbl_wb2`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '03'
                  and DATE_FORMAT(date, '%Y')='2022'

                group by

                    daymar

                order by

                    daymar ASC

            ) as mar ON jan.dayjan = mar.daymar

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as sumapr,

                    DATE_FORMAT(date, '%d') as dayapr

                FROM

                    `tbl_wb2`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '04'
                  and DATE_FORMAT(date, '%Y')='2022'

                group by

                    dayapr

                order by

                    dayapr ASC

            ) as apr ON jan.dayjan = apr.dayapr

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as summei,

                    DATE_FORMAT(date, '%d') as daymei

                FROM

                    `tbl_wb2`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '05'
                  and DATE_FORMAT(date, '%Y')='2022'

                group by

                    daymei

                order by

                    daymei ASC

            ) as mei ON jan.dayjan = mei.daymei

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as sumjun,

                    DATE_FORMAT(date, '%d') as dayjun

                FROM

                    `tbl_wb2`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '06'
                  and DATE_FORMAT(date, '%Y')='2022'

                group by

                    dayjun

                order by

                    dayjun ASC

            ) as jun ON jan.dayjan = jun.dayjun

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as sumjul,

                    DATE_FORMAT(date, '%d') as dayjul

                FROM

                    `tbl_wb2`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '07'
                  and DATE_FORMAT(date, '%Y')='2022'

                group by

                    dayjul

                order by

                    dayjul ASC

            ) as jul ON jan.dayjan = jul.dayjul

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as sumagu,

                    DATE_FORMAT(date, '%d') as dayagu

                FROM

                    `tbl_wb2`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '08'
                  and DATE_FORMAT(date, '%Y')='2022'

                group by

                    dayagu

                order by

                    dayagu ASC

            ) as agu ON jan.dayjan = agu.dayagu

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as sumsep,

                    DATE_FORMAT(date, '%d') as daysep

                FROM

                    `tbl_wb2`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '09'
                  and DATE_FORMAT(date, '%Y')='2022'

                group by

                    daysep

                order by

                    daysep ASC

            ) as sep ON jan.dayjan = sep.daysep

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as sumokt,

                    DATE_FORMAT(date, '%d') as dayokt

                FROM

                    `tbl_wb2`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '10'
                  and DATE_FORMAT(date, '%Y')='2022'

                group by

                    dayokt

                order by

                    dayokt ASC

            ) as okt ON jan.dayjan = okt.dayokt

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as sumnov,

                    DATE_FORMAT(date, '%d') as daynov

                FROM

                    `tbl_wb2`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '11'
                  and DATE_FORMAT(date, '%Y')='2022'

                group by

                    daynov

                order by

                    daynov ASC

            ) as nov ON jan.dayjan = nov.daynov

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as sumdes,

                    DATE_FORMAT(date, '%d') as daydes

                FROM

                    `tbl_wb2`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '12'
                  and DATE_FORMAT(date, '%Y')='2022'

                group by

                    daydes

                order by

                    daydes ASC

            ) as des ON jan.dayjan = des.daydes");





        return $query->result();
    }
    public function sum_harian()

    {



        date_default_timezone_set('Asia/Singapore');

        $t = strtotime("today");

        $y = strtotime("yesterday");

        $hariini = date("Y-m-d", $t);

        $kemaren = date("Y-m-d", $y);



        $jamini = date("H");

        $menitini = date("m", $t);

        $detikini = date("s", $t);



        if ($jamini >= 00 && $jamini < 07) {

            $a = $kemaren;
        } else {

            $a =  $hariini;
        }

        $query = $this->db->query("SELECT *

               

        FROM

            (

                SELECT

                    ROUND(sum(nett) / 1000) as sumjan,

                    DATE_FORMAT(date, '%d') as dayjan

                    FROM

                    `tbl_wb2`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '01'

                group by

                    dayjan

                order by

                    dayjan ASC

            ) as jan

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as sumfeb,

                    DATE_FORMAT(date, '%d') as dayfeb

                FROM

                    `tbl_wb2`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '02'

                group by

                    dayfeb

                order by

                    dayfeb ASC

            ) as feb ON jan.dayjan = feb.dayfeb

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as summar,

                    DATE_FORMAT(date, '%d') as daymar

                FROM

                    `tbl_wb2`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '03'

                group by

                    daymar

                order by

                    daymar ASC

            ) as mar ON jan.dayjan = mar.daymar

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as sumapr,

                    DATE_FORMAT(date, '%d') as dayapr

                FROM

                    `tbl_wb2`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '04'

                group by

                    dayapr

                order by

                    dayapr ASC

            ) as apr ON jan.dayjan = apr.dayapr

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as summei,

                    DATE_FORMAT(date, '%d') as daymei

                FROM

                    `tbl_wb2`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '05'

                group by

                    daymei

                order by

                    daymei ASC

            ) as mei ON jan.dayjan = mei.daymei

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as sumjun,

                    DATE_FORMAT(date, '%d') as dayjun

                FROM

                    `tbl_wb2`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '06'

                group by

                    dayjun

                order by

                    dayjun ASC

            ) as jun ON jan.dayjan = jun.dayjun

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as sumjul,

                    DATE_FORMAT(date, '%d') as dayjul

                FROM

                    `tbl_wb2`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '07'

                group by

                    dayjul

                order by

                    dayjul ASC

            ) as jul ON jan.dayjan = jul.dayjul

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as sumagu,

                    DATE_FORMAT(date, '%d') as dayagu

                FROM

                    `tbl_wb2`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '08'

                group by

                    dayagu

                order by

                    dayagu ASC

            ) as agu ON jan.dayjan = agu.dayagu

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as sumsep,

                    DATE_FORMAT(date, '%d') as daysep

                FROM

                    `tbl_wb2`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '09'

                group by

                    daysep

                order by

                    daysep ASC

            ) as sep ON jan.dayjan = sep.daysep

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as sumokt,

                    DATE_FORMAT(date, '%d') as dayokt

                FROM

                    `tbl_wb2`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '10'

                group by

                    dayokt

                order by

                    dayokt ASC

            ) as okt ON jan.dayjan = okt.dayokt

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as sumnov,

                    DATE_FORMAT(date, '%d') as daynov

                FROM

                    `tbl_wb2`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '11'

                group by

                    daynov

                order by

                    daynov ASC

            ) as nov ON jan.dayjan = nov.daynov

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as sumdes,

                    DATE_FORMAT(date, '%d') as daydes

                FROM

                    `tbl_wb2`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '12'

                group by

                    daydes

                order by

                    daydes ASC

            ) as des ON jan.dayjan = des.daydes");





        return $query->result();
    }



    public function sum_harian_gunungsari()

    {



        date_default_timezone_set('Asia/Singapore');

        $t = strtotime("today");

        $y = strtotime("yesterday");

        $hariini = date("Y-m-d", $t);

        $kemaren = date("Y-m-d", $y);



        $jamini = date("H");

        $menitini = date("m", $t);

        $detikini = date("s", $t);



        if ($jamini >= 00 && $jamini < 07) {

            $a = $kemaren;
        } else {

            $a =  $hariini;
        }

        $query = $this->db->query("SELECT *

               

        FROM

            (

                SELECT

                    ROUND(sum(nett) / 1000) as sumjan,

                    DATE_FORMAT(date, '%d') as dayjan

                    FROM

                    `tbl_wb2`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '01'

                group by

                    dayjan

                order by

                    dayjan ASC

                    ) as jan

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as sumfeb,

                    DATE_FORMAT(date, '%d') as dayfeb

                FROM

                    `tbl_driver_ritasi_gunungsari`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '02'

                group by

                    dayfeb

                order by

                    dayfeb ASC

            ) as feb ON jan.dayjan = feb.dayfeb

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as summar,

                    DATE_FORMAT(date, '%d') as daymar

                FROM

                    `tbl_driver_ritasi_gunungsari`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '03'

                group by

                    daymar

                order by

                    daymar ASC

            ) as mar ON jan.dayjan = mar.daymar

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as sumapr,

                    DATE_FORMAT(date, '%d') as dayapr

                FROM

                    `tbl_driver_ritasi_gunungsari`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '04'

                group by

                    dayapr

                order by

                    dayapr ASC

            ) as apr ON jan.dayjan = apr.dayapr

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as summei,

                    DATE_FORMAT(date, '%d') as daymei

                FROM

                    `tbl_driver_ritasi_gunungsari`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '05'

                group by

                    daymei

                order by

                    daymei ASC

            ) as mei ON jan.dayjan = mei.daymei

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as sumjun,

                    DATE_FORMAT(date, '%d') as dayjun

                FROM

                    `tbl_driver_ritasi_gunungsari`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '06'

                group by

                    dayjun

                order by

                    dayjun ASC

            ) as jun ON jan.dayjan = jun.dayjun

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as sumjul,

                    DATE_FORMAT(date, '%d') as dayjul

                FROM

                    `tbl_driver_ritasi_gunungsari`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '07'

                group by

                    dayjul

                order by

                    dayjul ASC

            ) as jul ON jan.dayjan = jul.dayjul

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as sumagu,

                    DATE_FORMAT(date, '%d') as dayagu

                FROM

                    `tbl_driver_ritasi_gunungsari`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '08'

                group by

                    dayagu

                order by

                    dayagu ASC

            ) as agu ON jan.dayjan = agu.dayagu

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as sumsep,

                    DATE_FORMAT(date, '%d') as daysep

                FROM

                    `tbl_driver_ritasi_gunungsari`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '09'

                group by

                    daysep

                order by

                    daysep ASC

            ) as sep ON jan.dayjan = sep.daysep

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as sumokt,

                    DATE_FORMAT(date, '%d') as dayokt

                FROM

                    `tbl_driver_ritasi_gunungsari`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '10'

                group by

                    dayokt

                order by

                    dayokt ASC

            ) as okt ON jan.dayjan = okt.dayokt

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as sumnov,

                    DATE_FORMAT(date, '%d') as daynov

                FROM

                    `tbl_driver_ritasi_gunungsari`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '11'

                group by

                    daynov

                order by

                    daynov ASC

            ) as nov ON jan.dayjan = nov.daynov

            LEFT JOIN (

                SELECT

                    ROUND(sum(nett) / 1000) as sumdes,

                    DATE_FORMAT(date, '%d') as daydes

                FROM

                    `tbl_driver_ritasi_gunungsari`

                WHERE

                    nett IS NOT NULL

                    and date is NOT NULL

                    and DATE_FORMAT(date, '%m') = '12'

                group by

                    daydes

                order by

                    daydes ASC

            ) as des ON jan.dayjan = des.daydes");





        return $query->result();
    }

    // GRAFIK





    // GRAFIK|SELECT|DATE



    public function net3_select($a)

    {

        $query = $this->db->query("SELECT

    (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '07:59:00' AND date = '$a')as a,

    (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '08:59:00' AND date = '$a')as b,

    (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '09:59:00' AND date = '$a')as c,

    (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '10:59:00' AND date = '$a')as d,

    (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '11:59:00' AND date = '$a')as e,

    (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '12:59:00' AND date = '$a')as f,

    (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '13:59:00' AND date = '$a')as g,

    (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '14:59:00' AND date = '$a')as h,

    (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '15:59:00' AND date = '$a')as i,

    (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '16:59:00' AND date = '$a')as j,

    (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '17:59:00' AND date = '$a')as k,

    (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '18:59:00' AND date = '$a')as l,

    (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '19:59:00' AND date = '$a')as m,

    (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '20:59:00' AND date = '$a')as n,

    (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '21:59:00' AND date = '$a')as o,

    (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '22:59:00' AND date = '$a')as p,

    (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'07:00:00'AND '23:59:00' AND date = '$a')as q,  

    (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'00:01:00'AND '00:59:00' AND date = '$a')as r,

    (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'00:01:00'AND '01:59:00' AND date = '$a')as s,

    (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'00:01:00'AND '02:59:00' AND date = '$a')as t,

    (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'00:01:00'AND '03:59:00' AND date = '$a')as u,

    (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'00:01:00'AND '04:59:00' AND date = '$a')as v,

    (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'00:01:00'AND '05:59:00' AND date = '$a')as w,

    (SELECT  round(SUM(nett)/1000) FROM tbl_wb2 WHERE time_out BETWEEN'00:01:00'AND '06:59:00' AND date = '$a')as x");

        return $query->result();
    }



    public function avgmuatan_select($a)

    {

        $query = $this->db->query("SELECT AVG(nett)/1000 as a,nett,`tbl_wb2`.loading_point,no_unit,`tbl_km_lokasi`.nama_lokasi



        FROM `tbl_wb2`LEFT JOIN `tbl_km_lokasi` ON `tbl_km_lokasi`.`nama_lokasi` = `tbl_wb2`.`loading_point` WHERE date =  '$a'  group by loading_point ");

        return $query->result();
    }

    public function avgmuatan_tipevessel_select($a)

    {

        $query = $this->db->query("SELECT AVG(nett)/1000 as a,nett,`tbl_wb2`.tipe_vessel,no_unit,`tbl_km_lokasi`.nama_lokasi



        FROM `tbl_wb2`LEFT JOIN `tbl_km_lokasi` ON `tbl_km_lokasi`.`nama_lokasi` = `tbl_wb2`.`loading_point` WHERE date =  '$a'  group by tipe_vessel ");

        return $query->result();
    }



    public function under_lokasi_select($a)

    {

        $query = $this->db->query(" SELECT DATE_FORMAT(date, '%d %M %Y') as date, tbl_wb2.loading_point as lokasi, COUNT(`no_transaction`) as count FROM `tbl_wb2`   WHERE  date = '$a' AND keterangan='UNDERLOAD'  GROUP BY loading_point");

        return $query->result();
    }



    public function trip_lokasi_select($a)

    {

        $query = $this->db->query(" SELECT tbl_wb2.loading_point as lokasi, COUNT(`no_transaction`) as count FROM `tbl_wb2`   WHERE  date =  '$a'  GROUP BY loading_point  ");

        return $query->result();
    }



    public function tonkm_select($a)

    {

        $query = $this->db->query("SELECT sum(nett)/1000 as a, COUNT(no_transaction)as b, tbl_km_lokasi.km as c,`tbl_wb2`.loading_point,no_unit

    FROM `tbl_wb2`LEFT JOIN `tbl_km_lokasi` ON `tbl_km_lokasi`.`nama_lokasi` = `tbl_wb2`.`loading_point` WHERE  date =  '$a'  GROUP BY loading_point");





        return $query->result();
    }

    public function sumtriptipevesselall_select($a)

    {



        $query = $this->db->query("SELECT COUNT(no_transaction) as a,count(`type`) as raw,nett,`tbl_wb2`.tipe_vessel,no_unit,`tbl_km_lokasi`.nama_lokasi



        FROM `tbl_wb2`LEFT JOIN `tbl_km_lokasi` ON `tbl_km_lokasi`.`nama_lokasi` = `tbl_wb2`.`loading_point` WHERE date =  '$a'  group by tipe_vessel order by a ASC");





        return $query->result();
    }

    public function sumtriptipevesselraw_select($a)

    {

        $query = $this->db->query("SELECT COUNT(no_transaction) as a,count(`type`) as raw,nett,`tbl_wb2`.tipe_vessel,no_unit,`tbl_km_lokasi`.nama_lokasi



        FROM `tbl_wb2`LEFT JOIN `tbl_km_lokasi` ON `tbl_km_lokasi`.`nama_lokasi` = `tbl_wb2`.`loading_point` WHERE date =  '$a' AND type='RAW COAL'  group by tipe_vessel order by a ASC");





        return $query->result();
    }

    public function sumtriptipevesselcrush_select($a)

    {



        $query = $this->db->query("SELECT COUNT(no_transaction) as a,count(`type`) as crush,nett,`tbl_wb2`.tipe_vessel,no_unit,`tbl_km_lokasi`.nama_lokasi



        FROM `tbl_wb2`LEFT JOIN `tbl_km_lokasi` ON `tbl_km_lokasi`.`nama_lokasi` = `tbl_wb2`.`loading_point` WHERE date =  '$a' AND type='CRUSH COAL'  group by tipe_vessel order by a ASC");





        return $query->result();
    }



    public function average_ritasi_jam_7($a)

    {





        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit

        from (

            SELECT  COUNT(DISTINCT(no_unit)) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'07:00:00'AND '07:59:00' AND date = '$a'

        ) a,

        (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'07:00:00'AND '07:59:00' AND date ='$a'

        ) b ");





        return $query->result();
    }

    public function average_ritasi_jam_8($a)

    {





        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit

        from (

            SELECT  COUNT(DISTINCT(no_unit)) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'07:00:00'AND '08:59:00' AND date = '$a'

        ) a,

        (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'07:00:00'AND '08:59:00' AND date ='$a'

        ) b ");





        return $query->result();
    }

    public function average_ritasi_jam_9($a)

    {





        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit

        from (

            SELECT  COUNT(DISTINCT(no_unit)) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'07:00:00'AND '09:59:00' AND date = '$a'

        ) a,

        (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'07:00:00'AND '09:59:00' AND date ='$a'

        ) b ");





        return $query->result();
    }

    public function average_ritasi_jam_10($a)

    {





        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit

        from (

            SELECT  COUNT(DISTINCT(no_unit)) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'07:00:00'AND '10:59:00' AND date = '$a'

        ) a,

        (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'07:00:00'AND '10:59:00' AND date ='$a'

        ) b ");





        return $query->result();
    }

    public function average_ritasi_jam_11($a)

    {





        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit

        from (

            SELECT  COUNT(DISTINCT(no_unit)) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'07:00:00'AND '11:59:00' AND date = '$a'

        ) a,

        (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'07:00:00'AND '11:59:00' AND date ='$a'

        ) b ");





        return $query->result();
    }

    public function average_ritasi_jam_12($a)

    {





        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit

        from (

            SELECT  COUNT(DISTINCT(no_unit)) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'07:00:00'AND '12:59:00' AND date = '$a'

        ) a,

        (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'07:00:00'AND '12:59:00' AND date ='$a'

        ) b ");





        return $query->result();
    }

    public function average_ritasi_jam_13($a)

    {





        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit

        from (

            SELECT  COUNT(DISTINCT(no_unit)) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'07:00:00'AND '13:59:00' AND date = '$a'

        ) a,

        (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'07:00:00'AND '13:59:00' AND date ='$a'

        ) b ");





        return $query->result();
    }

    public function average_ritasi_jam_14($a)

    {





        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit

        from (

            SELECT  COUNT(DISTINCT(no_unit)) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'07:00:00'AND '14:59:00' AND date = '$a'

        ) a,

        (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'07:00:00'AND '14:59:00' AND date ='$a'

        ) b ");





        return $query->result();
    }

    public function average_ritasi_jam_15($a)

    {





        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit

        from (

            SELECT  COUNT(DISTINCT(no_unit)) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'07:00:00'AND '15:59:00' AND date = '$a'

        ) a,

        (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'07:00:00'AND '15:59:00' AND date ='$a'

        ) b ");





        return $query->result();
    }

    public function average_ritasi_jam_16($a)

    {





        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit

        from (

            SELECT  COUNT(DISTINCT(no_unit)) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'07:00:00'AND '16:59:00' AND date = '$a'

        ) a,

        (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'07:00:00'AND '16:59:00' AND date ='$a'

        ) b ");





        return $query->result();
    }

    public function average_ritasi_jam_17($a)

    {





        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit

        from (

            SELECT  COUNT(DISTINCT(no_unit)) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'07:00:00'AND '17:59:00' AND date = '$a'

        ) a,

        (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'07:00:00'AND '17:59:00' AND date ='$a'

        ) b ");





        return $query->result();
    }

    public function average_ritasi_jam_18($a)

    {





        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit

        from (

            SELECT  COUNT(DISTINCT(no_unit)) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'07:00:00'AND '18:59:00' AND date = '$a'

        ) a,

        (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'07:00:00'AND '18:59:00' AND date ='$a'

        ) b ");





        return $query->result();
    }

    public function average_ritasi2_jam_19($a)

    {





        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit

        from (

            SELECT  COUNT(DISTINCT(no_unit)) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'19:00:00'AND '19:59:00' AND date = '$a'

        ) a,

        (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'19:00:00'AND '19:59:00' AND date ='$a'

        ) b ");





        return $query->result();
    }

    public function average_ritasi2_jam_20($a)

    {







        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit

        from (

            SELECT  COUNT(DISTINCT(no_unit)) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'19:00:00'AND '20:59:00' AND date = '$a'

        ) a,

        (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'19:00:00'AND '20:59:00' AND date ='$a'

        ) b ");





        return $query->result();
    }

    public function average_ritasi2_jam_21($a)

    {





        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit

        from (

            SELECT  COUNT(DISTINCT(no_unit)) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'19:00:00'AND '21:59:00' AND date = '$a'

        ) a,

        (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'19:00:00'AND '21:59:00' AND date ='$a'

        ) b ");





        return $query->result();
    }

    public function average_ritasi2_jam_22($a)

    {





        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit

        from (

            SELECT  COUNT(DISTINCT(no_unit)) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'19:00:00'AND '22:59:00' AND date = '$a'

        ) a,

        (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'19:00:00'AND '22:59:00' AND date ='$a'

        ) b ");





        return $query->result();
    }

    public function average_ritasi2_jam_23($a)

    {









        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit

        from (

            SELECT  COUNT(DISTINCT(no_unit)) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date = '$a'

        ) a,

        (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date ='$a'

        ) b ");





        return $query->result();
    }

    public function average_ritasi2_jam_00($a)

    {





        $query = $this->db->query(" SELECT c.curval + b.curval as b, a.curval as a, ((b.curVal+c.curval) / a.curVal) as avgrit

        from (

            SELECT  COUNT(DISTINCT(no_unit)) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date = '$a' 

            OR time_out BETWEEN'00:01:00'AND '00:59:00' AND date = '$a'

        ) a,

              (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date ='$a'

        ) b,

        (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'00:01:00'AND '00:59:00' AND date ='$a'

        ) c 

        

        ");





        return $query->result();
    }

    public function average_ritasi2_jam_01($a)

    {





        $query = $this->db->query(" SELECT c.curval + b.curval as b, a.curval as a, ((b.curVal+c.curval) / a.curVal) as avgrit

        from (

            SELECT  COUNT(DISTINCT(no_unit)) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date = '$a' 

            OR time_out BETWEEN'00:01:00'AND '01:59:00' AND date = '$a'

        ) a,

              (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date ='$a'

        ) b,

        (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'00:01:00'AND '01:59:00' AND date ='$a'

        ) c 

        

        ");





        return $query->result();
    }

    public function average_ritasi2_jam_02($a)

    {



        $query = $this->db->query(" SELECT c.curval + b.curval as b, a.curval as a, ((b.curVal+c.curval) / a.curVal) as avgrit

        from (

            SELECT  COUNT(DISTINCT(no_unit)) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date = '$a' 

            OR time_out BETWEEN'00:01:00'AND '02:59:00' AND date = '$a'

        ) a,

              (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date ='$a'

        ) b,

        (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'00:01:00'AND '02:59:00' AND date ='$a'

        ) c 

        

        ");





        return $query->result();
    }

    public function average_ritasi2_jam_03($a)

    {







        $query = $this->db->query(" SELECT c.curval + b.curval as b, a.curval as a, ((b.curVal+c.curval) / a.curVal) as avgrit

        from (

            SELECT  COUNT(DISTINCT(no_unit)) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date = '$a' 

            OR time_out BETWEEN'00:01:00'AND '03:59:00' AND date = '$a'

        ) a,

              (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date ='$a'

        ) b,

        (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'00:01:00'AND '03:59:00' AND date ='$a'

        ) c 

        

        ");





        return $query->result();
    }

    public function average_ritasi2_jam_04($a)

    {







        $query = $this->db->query(" SELECT c.curval + b.curval as b, a.curval as a, ((b.curVal+c.curval) / a.curVal) as avgrit

        from (

            SELECT  COUNT(DISTINCT(no_unit)) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date = '$a' 

            OR time_out BETWEEN'00:01:00'AND '04:59:00' AND date = '$a'

        ) a,

              (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date ='$a'

        ) b,

        (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'00:01:00'AND '04:59:00' AND date ='$a'

        ) c 

        

        ");





        return $query->result();
    }



    public function average_ritasi2_jam_05($a)

    {





        $query = $this->db->query(" SELECT c.curval + b.curval as b, a.curval as a, ((b.curVal+c.curval) / a.curVal) as avgrit

        from (

            SELECT  COUNT(DISTINCT(no_unit)) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date = '$a' 

            OR time_out BETWEEN'00:01:00'AND '05:59:00' AND date = '$a'

        ) a,

              (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date ='$a'

        ) b,

        (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'00:01:00'AND '05:59:00' AND date ='$a'

        ) c 

        

        ");





        return $query->result();
    }



    public function average_ritasi2_jam_06($a)

    {





        $query = $this->db->query(" SELECT c.curval + b.curval as b, a.curval as a, ((b.curVal+c.curval) / a.curVal) as avgrit

        from (

            SELECT  COUNT(DISTINCT(no_unit)) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date = '$a' 

            OR time_out BETWEEN'00:01:00'AND '06:59:00' AND date = '$a'

        ) a,

              (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date ='$a'

        ) b,

        (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE time_out BETWEEN'00:01:00'AND '06:59:00' AND date ='$a'

        ) c 

        

        ");





        return $query->result();
    }



    // GRAFIK|SELECT|DATE







    public function rekonsil_highlight()

    {

        $query  = $this->db->query("SELECT  date,

        (SELECT SUM(nett) FROM tbl_wb2 WHERE loading_point = 'COALPAD 1 FSP') as c1f, 

        (SELECT SUM(nett) FROM tbl_wb2 WHERE loading_point = 'COALPAD 2') as c2 ,

        (SELECT SUM(nett) FROM tbl_wb2 WHERE loading_point = 'COALPAD 2 LH') as c3l ,

        (SELECT SUM(nett) FROM tbl_wb2 WHERE loading_point = 'COALPAD 3') as c3 ,

        (SELECT SUM(nett) FROM tbl_wb2 WHERE loading_point = 'COALPAD 3 A') as c3a, 

        (SELECT SUM(nett) FROM tbl_wb2 WHERE loading_point = 'ICF 2') as i ,

        (SELECT SUM(nett) FROM tbl_wb2 WHERE loading_point = 'PANEL 1 ICF') as p1i ,

        (SELECT SUM(nett) FROM tbl_wb2 WHERE loading_point = 'SILO') as s ,

        (SELECT SUM(nett) FROM tbl_wb2 ) as total

        FROM tbl_wb2 AS m GROUP by date");





        return $query->result();
    }

    public function analisa_produksi()

    {

        $query  = $this->db->query("SELECT loading_point, date, 

        (SELECT SUM(nett) FROM tbl_wb2 WHERE tipe_vessel = 'SCANIA sst 82-82') as sca8282 ,

      (SELECT SUM(nett) FROM tbl_wb2 WHERE tipe_vessel = 'VOLVO sdt 85-115') as vol85115,

      (SELECT SUM(nett) FROM tbl_wb2 WHERE tipe_vessel = 'VOLVO sst 105-120') as vol105120,

      (SELECT SUM(nett) FROM tbl_wb2 WHERE tipe_vessel = 'VOLVO sst 82-120') as vol82120,

      (SELECT SUM(nett) FROM tbl_wb2 ) as total

        FROM tbl_wb2 AS m GROUP by date");





        return $query->result();
    }

    public function analisa_muatan()

    {

        $query  = $this->db->query("SELECT date, tipe_vessel, 

        (SELECT AVG(nett) FROM tbl_wb2 WHERE tipe_vessel = 'SCANIA sst 82-82') as sca8282 ,

      (SELECT AVG(nett) FROM tbl_wb2 WHERE tipe_vessel = 'VOLVO sdt 85-115') as vol85115,

      (SELECT AVG(nett) FROM tbl_wb2 WHERE tipe_vessel = 'VOLVO sst 105-120') as vol105120,

      (SELECT AVG(nett) FROM tbl_wb2 WHERE tipe_vessel = 'VOLVO sst 82-120') as vol82120,

      (SELECT AVG(nett) FROM tbl_wb2 ) as total

        FROM tbl_wb2 AS m GROUP by date");





        return $query->result();
    }



    public function hm_daily()

    {

        date_default_timezone_set('Asia/Singapore');

        $t = strtotime("yesterday");

        $y = strtotime("2 days ago");

        $kemaren = date("Y-m-d", $t);

        $kemarenlusa = date("Y-m-d", $y);





        $jamini = date("H");

        if ($jamini >= 00 && $jamini < 07) {

            $a = $kemarenlusa;
        } else {

            $a =  $kemaren;
        }

        $query  = $this->db->query("SELECT ROUND(AVG(`tbl_highlight`.`hm`)) as a

        FROM tbl_highlight WHERE date='$a'");





        return $query->result();
    }

    public function km_daily()

    {

        date_default_timezone_set('Asia/Singapore');

        $t = strtotime("yesterday");

        $y = strtotime("2 days ago");

        $kemaren = date("Y-m-d", $t);

        $kemarenlusa = date("Y-m-d", $y);





        $jamini = date("H");

        if ($jamini >= 00 && $jamini < 07) {

            $a = $kemarenlusa;
        } else {

            $a =  $kemaren;
        }

        $query  = $this->db->query("SELECT ROUND(AVG(`tbl_highlight`.`km`))as a

        FROM tbl_highlight WHERE date='$a'");





        return $query->result();
    }

    public function cycle_time_daily()

    {

        date_default_timezone_set('Asia/Singapore');

        $t = strtotime("yesterday");

        $y = strtotime("2 days ago");

        $kemaren = date("Y-m-d", $t);

        $kemarenlusa = date("Y-m-d", $y);





        $jamini = date("H");

        if ($jamini >= 00 && $jamini < 07) {

            $a = $kemarenlusa;
        } else {

            $a =  $kemaren;
        }

        $query  = $this->db->query("SELECT DATE_FORMAT(SEC_TO_TIME(AVG(TIME_TO_SEC(`tbl_highlight`.`cycle_time`))),'%H:%i')as a

        FROM tbl_highlight WHERE date='$a'");





        return $query->result();
    }

    public function travel_time_daily()

    {

        date_default_timezone_set('Asia/Singapore');

        $t = strtotime("yesterday");

        $y = strtotime("2 days ago");

        $kemaren = date("Y-m-d", $t);

        $kemarenlusa = date("Y-m-d", $y);





        $jamini = date("H");

        if ($jamini >= 00 && $jamini < 07) {

            $a = $kemarenlusa;
        } else {

            $a =  $kemaren;
        }

        $query  = $this->db->query("SELECT DATE_FORMAT(SEC_TO_TIME(AVG(TIME_TO_SEC(`tbl_highlight`.`travel_time`))),'%H:%i')as a

        FROM tbl_highlight WHERE date='$a'");





        return $query->result();
    }

    public function fuel_daily()

    {

        date_default_timezone_set('Asia/Singapore');

        $t = strtotime("yesterday");

        $y = strtotime("2 days ago");

        $kemaren = date("Y-m-d", $t);

        $kemarenlusa = date("Y-m-d", $y);





        $jamini = date("H");

        if ($jamini >= 00 && $jamini < 07) {

            $a = $kemarenlusa;
        } else {

            $a =  $kemaren;
        }

        $query  = $this->db->query("SELECT ROUND(AVG(`tbl_highlight`.`fuel`))as a

        FROM tbl_highlight WHERE date='$a' AND fuel is NOT NULL AND fuel>1");





        return $query->result();
    }

    public function trip_daily()

    {

        date_default_timezone_set('Asia/Singapore');

        $t = strtotime("yesterday");

        $y = strtotime("2 days ago");

        $kemaren = date("Y-m-d", $t);

        $kemarenlusa = date("Y-m-d", $y);





        $jamini = date("H");

        if ($jamini >= 00 && $jamini < 07) {

            $a = $kemarenlusa;
        } else {

            $a =  $kemaren;
        }

        $query  = $this->db->query("SELECT TRUNCATE(SUM(tbl_highlight.num_trip)/COUNT(DISTINCT unit),2) as avg , unit FROM `tbl_highlight` WHERE date='$a'");





        return $query->result();
    }

    public function forecast_daily()

    {

        date_default_timezone_set('Asia/Singapore');

        $t = strtotime("today");

        $y = strtotime("yesterday");

        $hariini = date("Y-m-d", $t);

        $kemaren = date("Y-m-d", $y);



        $jamini = date("H");

        $menitini = date("m", $t);

        $detikini = date("s", $t);



        if ($jamini >= 00 && $jamini < 07) {

            $a = $kemaren;
        } else {

            $a =  $hariini;
        }

        $query  = $this->db->query("SELECT DISTINCT no_transaction, ROUND(SUM(nett)/1000) as sum,  date FROM `tbl_wb2` WHERE date='$a'");





        return $query->result();
    }

    public function forecast_monthly()

    {

        date_default_timezone_set('Asia/Singapore');

        $t = strtotime("today");

        $y = strtotime("yesterday");

        $bulan = date("m", $t);

        $year = date("Y", $t);

        $kemaren = date("Y-m-d", $y);





        // $query  = $this->db->query("SELECT DISTINCT no_transaction, ROUND(SUM(nett)/1000) as sum,  date FROM `tbl_wb2` WHERE MONTH(date) = MONTH(CURDATE())");

        $query  = $this->db->query("SELECT DISTINCT no_transaction, ROUND(SUM(nett)/1000) as sum,  date FROM `tbl_wb2` WHERE date BETWEEN '$year-$bulan-01' AND '$year-$bulan-31'");





        return $query->result();
    }

    public function forecast_yearly()

    {

        date_default_timezone_set('Asia/Singapore');

        $t = strtotime("today");

        $y = strtotime("yesterday");

        $year = date("Y", $t);

        $kemaren = date("Y-m-d", $y);





        // $query  = $this->db->query("SELECT DISTINCT no_transaction, ROUND(SUM(nett)/1000) as sum,  date FROM `tbl_wb2` WHERE YEAR(date) = YEAR(CURDATE())");

        $query  = $this->db->query("SELECT DISTINCT no_transaction, sum(nett/1000) as sum,  date FROM `tbl_wb2` WHERE date BETWEEN '2022-01-01' AND '2022-12-31'");





        return $query->result();
    }

    public function filter_date()

    {

        date_default_timezone_set('Asia/Singapore');

        $t = strtotime("today");

        $y = strtotime("yesterday");

        $hariini = date("Y-m-d", $t);

        $kemaren = date("Y-m-d", $y);



        $jamini = date("H");



        if ($jamini >= 00 && $jamini < 07) {

            $a =  $kemaren;
        } else {

            $a =  $hariini;
        }

        $query  = $this->db->query("SELECT tbl_wb2.date FROM `tbl_wb2` WHERE date NOT IN ('NULL','$a') GROUP BY date ");

        return $query->result();
    }

    public function max_nett()

    {

        date_default_timezone_set('Asia/Singapore');

        $t = strtotime("today");

        $y = strtotime("yesterday");

        $hariini = date("Y-m-d", $t);

        $kemaren = date("Y-m-d", $y);



        $jamini = date("H");

        $menitini = date("m", $t);

        $detikini = date("s", $t);





        if ($jamini >= 00 && $jamini < 07) {

            $a = $kemaren;
        } else {

            $a =  $hariini;
        }

        $query = $this->db->query("SELECT ROUND(MAX(nett)/1000) as max FROM `tbl_wb2` WHERE date =  '$a' ");





        return $query->result();
    }

    public function max_trip()

    {

        date_default_timezone_set('Asia/Singapore');

        $t = strtotime("today");

        $y = strtotime("yesterday");

        $hariini = date("Y-m-d", $t);

        $kemaren = date("Y-m-d", $y);



        $jamini = date("H");

        $menitini = date("m", $t);

        $detikini = date("s", $t);





        if ($jamini >= 00 && $jamini < 07) {

            $a = $kemaren;
        } else {

            $a =  $hariini;
        }

        $query = $this->db->query("SELECT COUNT(no_transaction) as count FROM `tbl_wb2` WHERE date = '$a' AND no_transaction is not NULL ");





        return $query->result();
    }

    function sum_gunungsari()

    {

        $query = $this->db->query("SELECT sum(nett)/1000 as sum FROM `tbl_driver_ritasi_gunungsari`");

        return $query->result();
    }



    public function wb_hanson($data = null, $limit = null, $not = null, $order = null)

    {

        $condition = '';

        if (!empty($data)) {





            foreach ($data as $key => $value) {

                $condition .= ' AND ' . $key . " LIKE '$value'";
            }

            if (!empty($not)) {

                $not = string_esc($not);

                foreach ($not as $key => $value) {

                    $condition .= ' AND ' . $key . " NOT LIKE '$value'";
                }
            }

            if (!empty($limit)) {

                $limit = " LIMIT $limit";
            }

            if (empty($order)) {

                $order = " ORDER BY id ASC";
            } else {

                $order = " ORDER BY" . $order;
            }

            $sql = "SELECT * FROM tbl_highlight WHERE 1=1 $condition $order $limit";





            $model = $this->db->query($sql);

            $model = $model->result_array();



            return $model;
        }
    }



    public function update_handson($data)

    {

        $column = ["payment", "month", "tahun", "date", "nrp", "driver_1", "nrp_gantungan", "driver_2", "unit", "vessel_type_1", "vessel_type_2", "shift", "rekap_r_o", "num_trip", "time_in", "time_out", "dari", "ke", "tonase", "wb", "kosongan", "net", "code", "id_wb", "type_coal", "weighbridge", "ct", "target", "unit_camp", "target_monthly", "vessel_capacity", "hm", "km", "fuel", "cycle_time", "travel_time", "persen", "status", "modifikasi_vessel", "primemover", "vessel", "target_monthly_rev", "target_internal", "distance"];



        $final_data = array();

        // $final_data = str_replace(".", "", $final_data);

        $data_complete = 1;

        foreach ($data as $key => $detail_data) {

            if (!$detail_data[count($column) - 1]) {

                $data_complete = 0;

                break;
            }



            foreach ($detail_data as $key2 => $value) {

                $final_data[$key][] = "'" . $this->db->escape_str($value) . "'";
            }
        }



        if ($data_complete == 1) {

            $insert_column = "(" . implode(",", $column) . ")";

            $insert_sql = array();

            foreach ($final_data as $key => $value) {

                $value_dalam = "(" . implode(",", str_replace(",", "", $value)) . ")";

                $insert_sql[] = "INSERT INTO tbl_highlight $insert_column VALUES $value_dalam";
            }




            $value_date = $data[0][3];
            // echo "<pre>";
            // print_r($value_date);
            // echo "</pre>";
            // die();
            $this->db->trans_start();

            $delete_query = "DELETE FROM tbl_highlight WHERE date LIKE '$value_date'";



            $this->db->query($delete_query);

            foreach ($insert_sql as $key => $value) {

                $this->db->query($value);
            }

            // $this->db->query($no_0);

            $this->db->trans_complete();

            return "ok";
        } else

            return "error";
    }

    public function last_date_update()

    {

        $hsl = $this->db->query("SELECT DATE_FORMAT(date, '%e %M %Y') as date FROM tbl_highlight ORDER BY date DESC");



        return $hsl->result_array();
    }



    public function last_date_update_id()

    {

        $hsl = $this->db->query("SELECT id_wb,(replace(replace(shift,'DS','Siang'),'NS','Malam'))as shift,DATE_FORMAT(date, '%e %M %Y') as date, time_out FROM `tbl_wb2`  

        ORDER BY `tbl_wb2`.`id_wb` DESC");



        return $hsl->result_array();
    }



    public function senyiur()

    {

        $hsl = $this->db->query("SELECT id_wb,(replace(replace(shift,'DS','Siang'),'NS','Malam'))as shift,DATE_FORMAT(date, '%e %M %Y') as date, time_out FROM `tbl_wb2`  

        ORDER BY `tbl_wb2`.`id_wb` DESC LIMIT 1");



        return $hsl->result();
    }

    public function gunungsari()

    {

        $hsl = $this->db->query("SELECT id,DATE_FORMAT(date, '%e %M %Y') as date FROM `tbl_driver_ritasi_gunungsari`  

        ORDER BY `tbl_driver_ritasi_gunungsari`.`id`  DESC LIMIT 1");



        return $hsl->result();
    }

    public function dispatch()

    {

        $hsl = $this->db->query("SELECT id,DATE_FORMAT(date, '%e %M %Y') as date FROM `tbl_dispatch`  

        ORDER BY `tbl_dispatch`.`id` DESC LIMIT 1");



        return $hsl->result();
    }

    public function fms()

    {

        $hsl = $this->db->query("SELECT DATE_FORMAT(date, '%e %M %Y') as date FROM `cycle_summary`  

        ORDER BY `cycle_summary`.`date` DESC LIMIT 1");



        return $hsl->result();
    }

    public function hm()

    {

        $hsl = $this->db->query("SELECT id,DATE_FORMAT(date, '%e %M %Y') as date FROM `tbl_hm`  

        ORDER BY `tbl_hm`.`id`  DESC LIMIT 1");



        return $hsl->result_array();
    }

    public function highlight()

    {

        $hsl = $this->db->query("SELECT id,DATE_FORMAT(date, '%e %M %Y') as date FROM `tbl_highlight`  

        ORDER BY `tbl_highlight`.`id`  DESC LIMIT 1");



        return $hsl->result_array();
    }

    public function dmbd()

    {

        $hsl = $this->db->query("SELECT id,DATE_FORMAT(date, '%e %M %Y') as date FROM `tbl_dmbd`  

        ORDER BY `tbl_dmbd`.`date`  DESC LIMIT 1");



        return $hsl->result_array();
    }

    public function forecast()

    {

        $hsl = $this->db->query("SELECT *, DATE_FORMAT(bulan,'%Y-%m') as bulan2  FROM `forecast_produksi`");



        return $hsl->result_array();
    }

    public function avg_tonbagihm()
    {
        $hsl = $this->db->query("SELECT ROUND(AVG(tonbagihm),2) as avg_tonbagihm FROM( SELECT tbl_wb2.date, no_unit,SUM(`tbl_wb2`.`nett`/1000) as nett,total_hm  ,ROUND(SUM(`tbl_wb2`.`nett`/1000)/tbl_hm.total_hm,2) as tonbagihm                     

        FROM `tbl_unit4digit` 

            LEFT JOIN `tbl_wb2` ON `tbl_wb2`.`no_unit` = `tbl_unit4digit`.`id` 

            LEFT JOIN `tbl_hm` ON `tbl_hm`.`unit_day` = `tbl_unit4digit`.`id` 
            WHERE   date_format(tbl_hm.date,'%Y')='2022'

        AND date_format(tbl_wb2.date,'%Y')='2022' 
        AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82') 
        AND tbl_wb2.date=tbl_hm.date
        group by tbl_unit4digit.id, tbl_wb2.date
        order by tbl_wb2.date DESC)as inner_query");



        return $hsl->result_array();
    }
    public function last_date_avg_tonhm()
    {
        $hsl = $this->db->query("SELECT date_format(tbl_wb2.date,'%d %M% %Y')  as date                

        FROM `tbl_unit4digit` 

            LEFT JOIN `tbl_wb2` ON `tbl_wb2`.`no_unit` = `tbl_unit4digit`.`id` 

            LEFT JOIN `tbl_hm` ON `tbl_hm`.`unit_day` = `tbl_unit4digit`.`id` 
            WHERE   date_format(tbl_hm.date,'%Y')='2022'

        AND date_format(tbl_wb2.date,'%Y')='2022' 
        AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82') 
        AND tbl_wb2.date=tbl_hm.date
        group by tbl_unit4digit.id, tbl_wb2.date
        order by tbl_wb2.date DESC LIMIT 1");



        return $hsl->result_array();
    }
}
