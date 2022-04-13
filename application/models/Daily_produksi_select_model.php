<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daily_produksi_select_model extends CI_Model
{
    public function datatarget($tanggal_akhir)
    {
        $data = $this->db->query("SELECT * , DATE_FORMAT(tanggal,'%d %b %Y') as maxdate
        FROM tbl_target_parameterdailyproduksi
        WHERE tanggal <= '$tanggal_akhir' ORDER BY tanggal DESC LIMIT 1");
        return $data->result_array();
    }
    public function datapelengkap($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT *, DATE_FORMAT(tanggal,'%d %b %Y') as maxdate
        FROM tbl_pelengkap_parameterdailyproduksi
        WHERE tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function datapelengkap_date_update_sebelumnya($tanggal_akhir)
    {
        $data = $this->db->query("SELECT  DATE_FORMAT(tanggal,'%d %b %Y') as maxdate
        FROM tbl_pelengkap_parameterdailyproduksi
        WHERE tanggal <='$tanggal_akhir' ORDER BY tanggal DESC LIMIT 1");
        return $data->result_array();
    }
    public function datapelengkap_date_update_setelahnya($tanggal_akhir)
    {
        $data = $this->db->query("SELECT  DATE_FORMAT(tanggal,'%d %b %Y') as maxdate
        FROM tbl_pelengkap_parameterdailyproduksi
        WHERE tanggal >='$tanggal_akhir' ORDER BY tanggal DESC LIMIT 1");
        return $data->result_array();
    }
    public function data_terakhir_update()
    {
        // $data = $this->db->query("SELECT maxdate_hg,maxdate_wb2,maxdate_hm,maxdate_dispatch FROM
        // (SELECT MAX(date) as maxdate_hg FROM tbl_highlight) a,
        // (SELECT MAX(date) as maxdate_wb2 FROM tbl_wb2)b,
        // (SELECT MAX(date) as maxdate_hm FROM tbl_hm)c,
        // (SELECT MAX(date) as maxdate_dispatch FROM tbl_dispatch)d");
        // return $data->result_array();
        $data = $this->db->query("SELECT
        CASE
            WHEN maxdate_hg <= maxdate_wb2 AND maxdate_hg <= maxdate_dispatch  AND maxdate_hg <= maxdate_hm    THEN maxdate_hg
               WHEN maxdate_wb2 <= maxdate_hg AND maxdate_wb2 <= maxdate_dispatch  AND maxdate_wb2 <= maxdate_hm   THEN maxdate_wb2
                  WHEN maxdate_dispatch <= maxdate_wb2 AND maxdate_dispatch <= maxdate_hg  AND maxdate_dispatch <= maxdate_hm THEN maxdate_dispatch
                     WHEN maxdate_hm <= maxdate_dispatch AND maxdate_hm <= maxdate_wb2  AND maxdate_hm <= maxdate_hg  THEN maxdate_hm
                     
            ELSE                                        maxdate_wb2
        END AS data_terakhir_update FROM(
    SELECT maxdate_hg,maxdate_wb2,maxdate_hm,maxdate_dispatch FROM
        (SELECT max(date) as maxdate_hg FROM tbl_highlight WHERE date !='0000-00-00') a ,
            (SELECT max(date) as maxdate_wb2 FROM tbl_wb2  WHERE date !='0000-00-00')b,
            (SELECT max(date) as maxdate_hm FROM tbl_hm  WHERE date !='0000-00-00')c,
            (SELECT max(date) as maxdate_dispatch FROM tbl_dispatch  WHERE date !='0000-00-00')d
 ) aa");
        return $data->result_array();
    }
    public function data_sebelum_update()
    {
        $data = $this->db->query("SELECT
        CASE
            WHEN mindate_hg >= mindate_wb2 AND mindate_hg >= mindate_dispatch  AND mindate_hg >= mindate_hm  AND mindate_hg >= mindate_pelengkap_parameterdailyproduksi  AND mindate_hg >= mindate_target_parameterdailyproduksi  THEN mindate_hg
               WHEN mindate_wb2 >= mindate_hg AND mindate_wb2 >= mindate_dispatch  AND mindate_wb2 >= mindate_hm  AND mindate_wb2 >= mindate_pelengkap_parameterdailyproduksi  AND mindate_wb2 >= mindate_target_parameterdailyproduksi  THEN mindate_wb2
                  WHEN mindate_dispatch >= mindate_wb2 AND mindate_dispatch >= mindate_hg  AND mindate_dispatch >= mindate_hm  AND mindate_dispatch >= mindate_pelengkap_parameterdailyproduksi  AND mindate_dispatch >= mindate_target_parameterdailyproduksi  THEN mindate_dispatch
                     WHEN mindate_hm >= mindate_dispatch AND mindate_hm >= mindate_wb2  AND mindate_hm >= mindate_hg  AND mindate_hm >= mindate_pelengkap_parameterdailyproduksi  AND mindate_hm >= mindate_target_parameterdailyproduksi  THEN mindate_hm
                        WHEN mindate_pelengkap_parameterdailyproduksi >= mindate_hm AND mindate_pelengkap_parameterdailyproduksi >= mindate_dispatch  AND mindate_pelengkap_parameterdailyproduksi >= mindate_wb2  AND mindate_pelengkap_parameterdailyproduksi >= mindate_hg  AND mindate_pelengkap_parameterdailyproduksi >= mindate_target_parameterdailyproduksi  THEN mindate_pelengkap_parameterdailyproduksi
                           WHEN mindate_target_parameterdailyproduksi >= mindate_pelengkap_parameterdailyproduksi AND mindate_target_parameterdailyproduksi >= mindate_hm  AND mindate_target_parameterdailyproduksi >= mindate_dispatch  AND mindate_target_parameterdailyproduksi >= mindate_wb2  AND mindate_target_parameterdailyproduksi >= mindate_hg  THEN mindate_target_parameterdailyproduksi
        
            ELSE                                        mindate_hg
        END AS data_sebelum_update FROM(
    SELECT mindate_hg,mindate_wb2,mindate_hm,mindate_dispatch,mindate_pelengkap_parameterdailyproduksi,mindate_target_parameterdailyproduksi FROM
            (SELECT MIN(date) as mindate_hg FROM tbl_highlight WHERE date !='0000-00-00') a ,
            (SELECT MIN(date) as mindate_wb2 FROM tbl_wb2  WHERE date !='0000-00-00')b,
            (SELECT MIN(date) as mindate_hm FROM tbl_hm  WHERE date !='0000-00-00')c,
            (SELECT MIN(date) as mindate_dispatch FROM tbl_dispatch  WHERE date !='0000-00-00')d,
             (SELECT MIN(tanggal) as mindate_pelengkap_parameterdailyproduksi FROM tbl_pelengkap_parameterdailyproduksi  WHERE tanggal !='0000-00-00')e,
                (SELECT MIN(tanggal) as mindate_target_parameterdailyproduksi FROM tbl_target_parameterdailyproduksi  WHERE tanggal !='0000-00-00')f) aa");
        return $data->result_array();
    }
    public function tanggal_update_saja($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT DATE_FORMAT(date,'%d-%b-%Y') as maxdate,DATE_FORMAT(date,'%W') as harisaja
        FROM tbl_wb2
        WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir' LIMIT 1");
        return $data->result_array();
    }
    // ton_fuel
    public function ton_fuel($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND(sum(nett/1000)) as sumnett, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_wb2
        WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function ton_fuel_siang($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND(sum(nett/1000)) as sumnett, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_wb2
        WHERE shift='DS' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function ton_fuel_malam($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND(sum(nett/1000)) as sumnett, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_wb2
        WHERE shift='NS' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    // avg_distance_fuel
    public function avgdistance_fuel($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND(AVG(distance),1) as avgdistance, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_highlight
        WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function avgdistance_fuel_siang($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND(AVG(distance),1) as avgdistance, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_highlight
        WHERE shift='D' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function avgdistance_fuel_malam($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND(AVG(distance),1) as avgdistance, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_highlight
        WHERE shift='N' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }

    // produksi

    // ton
    public function ton($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND(sum(nett/1000)) as sumnett, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_wb2
        WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function ton_siang($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND(sum(nett/1000)) as sumnett, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_wb2
        WHERE shift='DS' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function ton_malam($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND(sum(nett/1000)) as sumnett, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_wb2
        WHERE shift='NS' AND  date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    // trip
    public function trip($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT DISTINCT count(id_wb) as sumtrip, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_wb2
        WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function trip_siang($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT DISTINCT count(id_wb) as sumtrip, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_wb2
        WHERE shift='DS' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function trip_malam($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT DISTINCT count(id_wb) as sumtrip, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_wb2
        WHERE shift='NS' AND  date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    // avgton
    public function avgton($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND(AVG(nett/1000)) as avgnett, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_wb2
        WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function avgton_siang($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND(AVG(nett/1000)) as avgnett, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_wb2
        WHERE shift='DS' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function avgton_malam($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND(AVG(nett/1000)) as avgnett, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_wb2
        WHERE shift='NS' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    // avgdistance
    public function avgdistance($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND(AVG(distance),1) as avgdistance, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_highlight
        WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function avgdistance_siang($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND(AVG(distance),1) as avgdistance, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_highlight
        WHERE shift='D' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function avgdistance_malam($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND(AVG(distance),1) as avgdistance, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_highlight
        WHERE shift='N' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    // sumdistance
    public function sumdistance($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT SUM(distance) as sumdistance, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_highlight
        WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function sumdistance_siang($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT SUM(distance) as sumdistance, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_highlight
        WHERE shift='D' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function sumdistance_malam($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT SUM(distance) as sumdistance, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_highlight
        WHERE shift='N' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    // tonhg
    public function tonhg($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT sum(tonase) as sumnett, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_highlight
        WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function tonhg_siang($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT sum(tonase) as sumnett, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_highlight
        WHERE shift ='D' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function tonhg_malam($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT sum(tonase) as sumnett, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_highlight
        WHERE shift ='N' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }

    // Unit
    public function ratarataunitready($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT DISTINCT count(DISTINCT(no_unit)) as ratarataunitready, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_wb2
        WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function ratarataunitreadysiang($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT DISTINCT count(DISTINCT(no_unit)) as ratarataunitready, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_wb2
        WHERE shift='DS' AND date  BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function ratarataunitreadymalam($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT DISTINCT count(DISTINCT(no_unit)) as ratarataunitready, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_wb2
        WHERE shift='NS' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function unitchangeshift3035($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT count(no_unit) as unitchangeshift3035, DATE_FORMAT(date,'%d %b %Y') as maxdate FROM tbl_dispatch  WHERE aktivity='CHANGE SHIFT' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function unitchangeshift3035_siang($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT count(no_unit) as unitchangeshift3035, DATE_FORMAT(date,'%d %b %Y') as maxdate FROM tbl_dispatch  WHERE shift='DAY' AND aktivity='CHANGE SHIFT' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function unitchangeshift3035_malam($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT count(no_unit) as unitchangeshift3035, DATE_FORMAT(date,'%d %b %Y') as maxdate FROM tbl_dispatch  WHERE shift='NIGHT' AND aktivity='CHANGE SHIFT' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    // unitservice
    public function unitservice($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT count(no_unit) as unitservice, DATE_FORMAT(date,'%d %b %Y') as maxdate FROM tbl_dispatch  WHERE aktivity='SERVICE' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function unitservice_siang($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT count(no_unit) as unitservice, DATE_FORMAT(date,'%d %b %Y') as maxdate FROM tbl_dispatch  WHERE  shift='DAY' AND aktivity='SERVICE' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function unitservice_malam($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT count(no_unit) as unitservice, DATE_FORMAT(date,'%d %b %Y') as maxdate FROM tbl_dispatch  WHERE  shift='NIGHT' AND aktivity='SERVICE' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    // unit_breakdown
    public function unitbreakdown($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT count(no_unit) as unitbreakdown, DATE_FORMAT(date,'%d %b %Y') as maxdate FROM tbl_dispatch  WHERE aktivity='BREAKDOWN' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function unitbreakdown_siang($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT count(no_unit) as unitbreakdown, DATE_FORMAT(date,'%d %b %Y') as maxdate FROM tbl_dispatch  WHERE shift='DAY' AND aktivity='BREAKDOWN' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function unitbreakdown_malam($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT count(no_unit) as unitbreakdown, DATE_FORMAT(date,'%d %b %Y') as maxdate FROM tbl_dispatch  WHERE shift='NIGHT' AND aktivity='BREAKDOWN' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    // totalhm
    public function totalhm($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND(sum(wh_day)+sum(wh_night)) as wh, DATE_FORMAT(date,'%d %b %Y') as maxdate FROM tbl_hm  WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function totalhm_siang($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND(sum(wh_day)) as wh, DATE_FORMAT(date,'%d %b %Y') as maxdate FROM tbl_hm  WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function totalhm_malam($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND(sum(wh_night)) as wh, DATE_FORMAT(date,'%d %b %Y') as maxdate FROM tbl_hm  WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    // totalbd
    public function totalbd($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND(sum(total_bd),1) as totalbd, DATE_FORMAT(date,'%d %b %Y') as maxdate FROM tbl_dmbd WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function totalbdsiang($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND(sum(total_bd),1) as totalbd, DATE_FORMAT(date,'%d %b %Y') as maxdate FROM tbl_dmbd WHERE shift=' Day ' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function totalbdmalam($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND(sum(total_bd),1) as totalbd, DATE_FORMAT(date,'%d %b %Y') as maxdate FROM tbl_dmbd WHERE shift=' Night ' AND  date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    // ratarataunitready2
    public function ratarataunitready2($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT DISTINCT count(no_unit) as ratarataunitready2, DATE_FORMAT(date,'%d %b %Y') as maxdate FROM tbl_wb2  WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function ratarataunitready2siang($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT DISTINCT count(no_unit) as ratarataunitready2, DATE_FORMAT(date,'%d %b %Y') as maxdate FROM tbl_wb2  WHERE shift='DS' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function ratarataunitready2malam($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT DISTINCT count(no_unit) as ratarataunitready2, DATE_FORMAT(date,'%d %b %Y') as maxdate FROM tbl_wb2  WHERE shift='NS' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function counttrip2($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT date,COUNT(*) as counttrip2 FROM (SELECT date,no_unit, COUNT( * )
        FROM tbl_wb2
        WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
        GROUP BY no_unit
        HAVING COUNT( * ) > 1) AS S");
        return $data->result_array();
    }
    public function counttrip2siang($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT date,COUNT(*) as counttrip2 FROM (SELECT date,no_unit, COUNT( * )
        FROM tbl_wb2
        WHERE shift='DS' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
        GROUP BY no_unit
        HAVING COUNT( * ) > 1) AS S");
        return $data->result_array();
    }
    public function counttrip2malam($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT date,COUNT(*) as counttrip2 FROM (SELECT date,no_unit, COUNT( * )
        FROM tbl_wb2
        WHERE shift='NS' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
        GROUP BY no_unit
        HAVING COUNT( * ) > 1) AS S");
        return $data->result_array();
    }
    // ratarataoptproduktifitasopt
    public function ratarataoptproduktifitasopt($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND((avg(countoptsiang)+avg(countoptmalam))/2,2) as ratarataoptproduktifitasopt,DATE_FORMAT(maxdate,'%d %b %Y') as maxdate FROM( 
            SELECT date as maxdate,driver_1, COUNT( driver_1 ) as countoptsiang
                FROM tbl_highlight
                WHERE driver_1!='0' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
                GROUP BY driver_1) as a,( 
            SELECT date as date2,driver_2, COUNT( driver_2 ) as countoptmalam
                FROM tbl_highlight
                WHERE driver_2!='0' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
                GROUP BY driver_2) as b");
        return $data->result_array();
    }
    public function ratarataoptproduktifitasopt_siang($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND((avg(countoptsiang)),2) as ratarataoptproduktifitasopt,DATE_FORMAT(maxdate,'%d %b %Y') as maxdate FROM( 
            SELECT date as maxdate,driver_1, COUNT( driver_1 ) as countoptsiang
                FROM tbl_highlight
                WHERE driver_1!='0' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
                GROUP BY driver_1) as a");
        return $data->result_array();
    }
    public function ratarataoptproduktifitasopt_malam($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND(avg(countoptmalam),2) as ratarataoptproduktifitasopt,DATE_FORMAT(maxdate,'%d %b %Y') as maxdate FROM(
            SELECT date as maxdate,driver_2, COUNT( driver_2 ) as countoptmalam
                FROM tbl_highlight
                WHERE driver_2!='0' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
                GROUP BY driver_2) as b");
        return $data->result_array();
    }
    public function countopt2trip($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT count_siang+count_malam as countopt2trip,DATE_FORMAT(maxdate,'%d %b %Y') as maxdate FROM( SELECT count(countoptsiang) as count_siang,maxdate FROM(SELECT date as maxdate,driver_1, COUNT( driver_1 ) as countoptsiang
        FROM tbl_highlight
        WHERE driver_1!='0' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
        GROUP BY driver_1
          HAVING COUNT( driver_1 ) > 1) as a)as aa,(SELECT count(countoptmalam) as count_malam FROM(SELECT date as maxdate2,driver_2, COUNT( driver_2 ) as countoptmalam
        FROM tbl_highlight
        WHERE driver_2!='0' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
        GROUP BY driver_2
          HAVING COUNT( driver_2 ) > 1) as a) as ab");
        return $data->result_array();
    }
    public function countopt2tripsiang($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT count_siang as countopt2trip,DATE_FORMAT(maxdate,'%d %b %Y') as maxdate FROM( SELECT count(countoptsiang) as count_siang,maxdate FROM(SELECT date as maxdate,driver_1, COUNT( driver_1 ) as countoptsiang
        FROM tbl_highlight
        WHERE driver_1!='0' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
        GROUP BY driver_1
          HAVING COUNT( driver_1 ) > 1) as a)as aa");
        return $data->result_array();
    }
    public function countopt2tripmalam($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT count_malam as countopt2trip,DATE_FORMAT(maxdate2,'%d %b %Y') as maxdate FROM(SELECT count(countoptmalam) as count_malam,maxdate2 FROM(SELECT date as maxdate2,driver_2, COUNT( driver_2 ) as countoptmalam
        FROM tbl_highlight
        WHERE driver_2!='0' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
        GROUP BY driver_2
          HAVING COUNT( driver_2 ) > 1) as a) as ab");
        return $data->result_array();
    }

    // breakdown
    public function breakdown($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT round(avg(total_bd),2) as breakdown,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_dmbd`  WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function breakdownsiang($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT round(avg(total_bd),2) as breakdown,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_dmbd`  WHERE shift=' Day ' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function breakdownmalam($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT round(avg(total_bd),2) as breakdown,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_dmbd`  WHERE shift=' Night  ' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    // changeshift
    public function change_shift($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND((ganti_shift_day+ganti_shift_night)/2,2) as change_shift, maxdate FROM( SELECT round(avg(ganti_shift_day),2) as ganti_shift_day,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_hm`  WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir')as a,
            ( SELECT round(avg(ganti_shift_night),2) as ganti_shift_night,DATE_FORMAT(date,'%d %b %Y') as maxdate2 FROM `tbl_hm`  WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir')as b");
        return $data->result_array();
    }
    public function change_shiftsiang($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND((ganti_shift_day),2) as change_shift, maxdate FROM( SELECT round(avg(ganti_shift_day),2) as ganti_shift_day,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_hm`  WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir')as a");
        return $data->result_array();
    }
    public function change_shiftmalam($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND((ganti_shift_night),2) as change_shift, maxdate2 FROM( SELECT round(avg(ganti_shift_night),2) as ganti_shift_night,DATE_FORMAT(date,'%d %b %Y') as maxdate2 FROM `tbl_hm`  WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir')as b");
        return $data->result_array();
    }
    // refueling
    public function refueling($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND((isi_solar_day+isi_solar_night)/2,2) as refueling, maxdate FROM
        ( SELECT round(avg(isi_solar_day),2) as isi_solar_day,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_hm`  WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir')as a,
        ( SELECT round(avg(isi_solar_night),2) as isi_solar_night,DATE_FORMAT(date,'%d %b %Y') as maxdate2 FROM `tbl_hm`  WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir')as b");
        return $data->result_array();
    }
    public function refuelingsiang($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND((isi_solar_day),2) as refueling, maxdate FROM
        ( SELECT round(avg(isi_solar_day),2) as isi_solar_day,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_hm`  WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir')as a");
        return $data->result_array();
    }
    public function refuelingmalam($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND((isi_solar_night),2) as refueling, maxdate2 FROM
        ( SELECT round(avg(isi_solar_night),2) as isi_solar_night,DATE_FORMAT(date,'%d %b %Y') as maxdate2 FROM `tbl_hm`  WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir')as b");
        return $data->result_array();
    }
    // antriload
    public function antri_load($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND((antri_load_day+antri_load_night)/2,2) as antri_load, maxdate FROM
        ( SELECT round(avg(antri_load_day),2) as antri_load_day,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_hm`  WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir')as a,
        ( SELECT round(avg(antri_load_night),2) as antri_load_night,DATE_FORMAT(date,'%d %b %Y') as maxdate2 FROM `tbl_hm`  WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir')as b");
        return $data->result_array();
    }
    public function antri_load_siang($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND((antri_load_day),2) as antri_load, maxdate FROM
        ( SELECT round(avg(antri_load_day),2) as antri_load_day,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_hm`  WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir')as a");
        return $data->result_array();
    }
    public function antri_load_malam($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND((antri_load_night),2) as antri_load, maxdate2 FROM
        ( SELECT round(avg(antri_load_night),2) as antri_load_night,DATE_FORMAT(date,'%d %b %Y') as maxdate2 FROM `tbl_hm`  WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir')as b");
        return $data->result_array();
    }
    // coallimit
    public function coal_limit($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND((coal_limit_day+coal_limit_night)/2,2) as coal_limit, maxdate FROM
        ( SELECT round(avg(coal_limit_day),2) as coal_limit_day,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_hm`  WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir')as a,
        ( SELECT round(avg(coal_limit_night),2) as coal_limit_night,DATE_FORMAT(date,'%d %b %Y') as maxdate2 FROM `tbl_hm`  WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir')as b");
        return $data->result_array();
    }
    public function coal_limit_siang($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND((coal_limit_day),2) as coal_limit, maxdate FROM
        ( SELECT round(avg(coal_limit_day),2) as coal_limit_day,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_hm`  WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir')as a");
        return $data->result_array();
    }
    public function coal_limit_malam($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND((coal_limit_night),2) as coal_limit, maxdate2 FROM
        ( SELECT round(avg(coal_limit_night),2) as coal_limit_night,DATE_FORMAT(date,'%d %b %Y') as maxdate2 FROM `tbl_hm`  WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir')as b");
        return $data->result_array();
    }
    // antridumping
    public function antri_dumping($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND((antri_dump_day+antri_dump_night)/2,2) as antri_dumping, maxdate FROM
        ( SELECT round(avg(antri_dump_day),2) as antri_dump_day,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_hm`  WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir')as a,
        ( SELECT round(avg(antri_dump_night),2) as antri_dump_night,DATE_FORMAT(date,'%d %b %Y') as maxdate2 FROM `tbl_hm`  WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir')as b");
        return $data->result_array();
    }
    public function antri_dumping_siang($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND((antri_dump_day),2) as antri_dumping, maxdate FROM
        ( SELECT round(avg(antri_dump_day),2) as antri_dump_day,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_hm`  WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir')as a");
        return $data->result_array();
    }
    public function antri_dumping_malam($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND((antri_dump_night),2) as antri_dumping, maxdate2 FROM
        ( SELECT round(avg(antri_dump_night),2) as antri_dump_night,DATE_FORMAT(date,'%d %b %Y') as maxdate2 FROM `tbl_hm`  WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir')as b");
        return $data->result_array();
    }
    // resttime
    public function rest_time($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND((ism_day+ism_night)/2,2) as rest_time, maxdate FROM
        ( SELECT round(avg(ism_day),2) as ism_day,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_hm`  WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir')as a,
        ( SELECT round(avg(ism_night),2) as ism_night,DATE_FORMAT(date,'%d %b %Y') as maxdate2 FROM `tbl_hm`  WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir')as b");
        return $data->result_array();
    }
    public function rest_time_siang($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND((ism_day),2) as rest_time, maxdate FROM
        ( SELECT round(avg(ism_day),2) as ism_day,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_hm`  WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir')as a");
        return $data->result_array();
    }
    public function rest_time_malam($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND((ism_night)/2,2) as rest_time, maxdate2 FROM
        ( SELECT round(avg(ism_night),2) as ism_night,DATE_FORMAT(date,'%d %b %Y') as maxdate2 FROM `tbl_hm`  WHERE date BETWEEN '$tanggal_awal' AND '$tanggal_akhir')as b");
        return $data->result_array();
    }
    // cylce_time
    public function cycle_time($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND(AVG(TIME_TO_SEC(cycle_time))/3600,2) as cycle_time, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_highlight
        WHERE  cycle_time!='00:00:00' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function cycle_time_siang($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND(AVG(TIME_TO_SEC(cycle_time))/3600,2) as cycle_time, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_highlight
        WHERE  shift='D' AND cycle_time!='00:00:00' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function cycle_time_malam($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND(AVG(TIME_TO_SEC(cycle_time))/3600,2) as cycle_time, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_highlight
        WHERE shift='N' AND cycle_time!='00:00:00' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function travel_time($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND(AVG(TIME_TO_SEC(travel_time))/3600,2) as travel_time, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_highlight
        WHERE  travel_time!='00:00:00' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function travel_time_siang($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND(AVG(TIME_TO_SEC(travel_time))/3600,2) as travel_time, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_highlight
        WHERE shift='D' AND travel_time!='00:00:00' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
    public function travel_time_malam($tanggal_awal, $tanggal_akhir)
    {
        $data = $this->db->query("SELECT ROUND(AVG(TIME_TO_SEC(travel_time))/3600,2) as travel_time, DATE_FORMAT(date,'%d %b %Y') as maxdate
        FROM tbl_highlight
        WHERE shift='N' AND travel_time!='00:00:00' AND date BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        return $data->result_array();
    }
}


/* End of file Daily_produksi_select_model.php and path \application\models\Daily_produksi_select_model.php */
