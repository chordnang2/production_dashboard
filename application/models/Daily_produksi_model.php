<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daily_produksi_model extends CI_Model
{
    // crudtarget
    public function insert_target($data)
    {
        $query = $this->db->insert('tbl_target_parameterdailyproduksi', $data);
        return $query;
    }
    // crud
    public function insert($data)
    {
        $query = $this->db->insert('tbl_pelengkap_parameterdailyproduksi', $data);
        return $query;
    }
    public function datatarget()
    {
        $data = $this->db->query("SELECT *, MAX(DATE_FORMAT(tanggal,'%d %b %Y')) as maxdate
        FROM tbl_target_parameterdailyproduksi
        WHERE tanggal=(
        SELECT MAX(tanggal) as maxdate FROM tbl_target_parameterdailyproduksi )");
        return $data->result_array();
    }
    public function datapelengkap()
    {
        $data = $this->db->query("SELECT *, MAX(DATE_FORMAT(tanggal,'%d %b %Y')) as maxdate
        FROM tbl_pelengkap_parameterdailyproduksi
        WHERE tanggal=(
        SELECT MAX(tanggal) as maxdate FROM tbl_pelengkap_parameterdailyproduksi )");
        return $data->result_array();
    }
    // tonfuel
    public function ton_fuel($tanggalfuel)
    {
        $data = $this->db->query("SELECT ROUND(sum(nett/1000)) as sumnett, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_wb2
        WHERE date='$tanggalfuel'");
        return $data->result_array();
    }
    public function ton_fuel_siang($tanggalfuel)
    {
        $data = $this->db->query("SELECT ROUND(sum(nett/1000)) as sumnett, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_wb2
        WHERE shift='DS' AND date='$tanggalfuel'");
        return $data->result_array();
    }
    public function ton_fuel_malam($tanggalfuel)
    {
        $data = $this->db->query("SELECT ROUND(sum(nett/1000)) as sumnett, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_wb2
        WHERE shift='NS' AND  date='$tanggalfuel'");
        return $data->result_array();
    }
    // avgdistance_fuel
    public function avgdistance_fuel($tanggalfuel)
    {
        $data = $this->db->query("SELECT ROUND(AVG(distance),1) as avgdistance, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_highlight
        WHERE date='$tanggalfuel'");
        return $data->result_array();
    }
    public function avgdistance_fuel_siang($tanggalfuel)
    {
        $data = $this->db->query("SELECT ROUND(AVG(distance),1) as avgdistance, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_highlight
        WHERE shift='D' AND  date='$tanggalfuel'");
        return $data->result_array();
    }
    public function avgdistance_fuel_malam($tanggalfuel)
    {
        $data = $this->db->query("SELECT ROUND(AVG(distance),1) as avgdistance, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_highlight
        WHERE shift='N' AND  date='$tanggalfuel'");
        return $data->result_array();
    }

    // produksi
    // ton
    public function ton()
    {
        $data = $this->db->query("SELECT date,ROUND(sum(nett/1000)) as sumnett, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_wb2
        WHERE date=(
        SELECT MAX(date) as maxdate FROM tbl_wb2 )");
        return $data->result_array();
    }
    public function ton_siang()
    {
        $data = $this->db->query("SELECT date,ROUND(sum(nett/1000)) as sumnett, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_wb2
        WHERE shift='DS' AND date=(
        SELECT MAX(date) as maxdate FROM tbl_wb2 )");
        return $data->result_array();
    }
    public function ton_malam()
    {
        $data = $this->db->query("SELECT date,COALESCE(ROUND(sum(nett/1000)),0) as sumnett, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_wb2
        WHERE shift='NS' AND date=(
        SELECT MAX(date) as maxdate FROM tbl_wb2 )");
        return $data->result_array();
    }

    // trip
    public function trip()
    {
        $data = $this->db->query("SELECT DISTINCT count(id_wb) as sumtrip, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_wb2
        WHERE date=(
        SELECT MAX(date) as maxdate FROM tbl_wb2 )");
        return $data->result_array();
    }
    public function trip_siang()
    {
        $data = $this->db->query("SELECT DISTINCT count(id_wb) as sumtrip, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_wb2
        WHERE shift='DS' AND date=(
        SELECT MAX(date) as maxdate FROM tbl_wb2 )");
        return $data->result_array();
    }
    public function trip_malam()
    {
        $data = $this->db->query("SELECT DISTINCT count(id_wb) as sumtrip, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_wb2
        WHERE shift='NS' AND date=(
        SELECT MAX(date) as maxdate FROM tbl_wb2 )");
        return $data->result_array();
    }

    // avgton
    public function avgton()
    {
        $data = $this->db->query("SELECT ROUND(AVG(nett/1000)) as avgnett, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_wb2
        WHERE date=(
        SELECT MAX(date) as maxdate FROM tbl_wb2 )");
        return $data->result_array();
    }
    public function avgton_siang()
    {
        $data = $this->db->query("SELECT ROUND(AVG(nett/1000)) as avgnett, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_wb2
        WHERE shift='DS' AND date=(
        SELECT MAX(date) as maxdate FROM tbl_wb2 )");
        return $data->result_array();
    }
    public function avgton_malam()
    {
        $data = $this->db->query("SELECT COALESCE(ROUND(AVG(nett/1000)),0) as avgnett, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_wb2
        WHERE shift='NS' AND date=(
        SELECT MAX(date) as maxdate FROM tbl_wb2 )");
        return $data->result_array();
    }

    // avg_distance
    public function avgdistance()
    {
        $data = $this->db->query("SELECT ROUND(AVG(distance),1) as avgdistance, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_highlight
        WHERE date=(
        SELECT MAX(date) as maxdate FROM tbl_highlight )");
        return $data->result_array();
    }
    public function avgdistance_siang()
    {
        $data = $this->db->query("SELECT ROUND(AVG(distance),1) as avgdistance, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_highlight
        WHERE shift='D' AND date=(
        SELECT MAX(date) as maxdate FROM tbl_highlight )");
        return $data->result_array();
    }
    public function avgdistance_malam()
    {
        $data = $this->db->query("SELECT ROUND(AVG(distance),1) as avgdistance, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_highlight
        WHERE shift='N' AND  date=(
        SELECT MAX(date) as maxdate FROM tbl_highlight )");
        return $data->result_array();
    }

    // sumdistance
    public function sumdistance()
    {
        $data = $this->db->query("SELECT SUM(distance) as sumdistance, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_highlight
        WHERE  date=(
        SELECT MAX(date) as maxdate FROM tbl_highlight )");
        return $data->result_array();
    }
    public function sumdistance_siang()
    {
        $data = $this->db->query("SELECT SUM(distance) as sumdistance, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_highlight
        WHERE shift='D' AND date=(
        SELECT MAX(date) as maxdate FROM tbl_highlight )");
        return $data->result_array();
    }
    public function sumdistance_malam()
    {
        $data = $this->db->query("SELECT SUM(distance) as sumdistance, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_highlight
        WHERE shift='N' AND date=(
        SELECT MAX(date) as maxdate FROM tbl_highlight )");
        return $data->result_array();
    }

    // tonhg
    public function tonhg()
    {
        $data = $this->db->query("SELECT sum(tonase) as sumnett, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_highlight
        WHERE  date=(
        SELECT MAX(date) as maxdate FROM tbl_highlight )");
        return $data->result_array();
    }
    public function tonhg_siang()
    {
        $data = $this->db->query("SELECT sum(tonase) as sumnett, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_highlight
        WHERE shift='D' AND  date=(
        SELECT MAX(date) as maxdate FROM tbl_highlight )");
        return $data->result_array();
    }
    public function tonhg_malam()
    {
        $data = $this->db->query("SELECT sum(tonase) as sumnett, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_highlight
        WHERE  shift='N' AND date=(
        SELECT MAX(date) as maxdate FROM tbl_highlight )");
        return $data->result_array();
    }
    // endproduksi

    // Unit
    public function ratarataunitready()
    {
        $data = $this->db->query("SELECT DISTINCT count(DISTINCT(no_unit)) as ratarataunitready, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_wb2
        WHERE date=(
        SELECT MAX(date) as maxdate FROM tbl_wb2 )");
        return $data->result_array();
    }
    public function ratarataunitreadysiang()
    {
        $data = $this->db->query("SELECT DISTINCT count(DISTINCT(no_unit)) as ratarataunitready, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_wb2
        WHERE shift='DS' AND date=(
        SELECT MAX(date) as maxdate FROM tbl_wb2 )");
        return $data->result_array();
    }
    public function ratarataunitreadymalam()
    {
        $data = $this->db->query("SELECT DISTINCT count(DISTINCT(no_unit)) as ratarataunitready, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_wb2
        WHERE shift='NS' AND date=(
        SELECT MAX(date) as maxdate FROM tbl_wb2 )");
        return $data->result_array();
    }
    // unitchangeshift3035
    public function unitchangeshift3035()
    {
        $data = $this->db->query("SELECT count(no_unit) as unitchangeshift3035, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate FROM tbl_dispatch  WHERE aktivity='CHANGE SHIFT' AND date=(
            SELECT MAX(date) as maxdate FROM tbl_dispatch )");
        return $data->result_array();
    }
    public function unitchangeshift3035_siang()
    {
        $data = $this->db->query("SELECT count(no_unit) as unitchangeshift3035, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate FROM tbl_dispatch  WHERE shift='DAY' AND  aktivity='CHANGE SHIFT' AND date=(
            SELECT MAX(date) as maxdate FROM tbl_dispatch )");
        return $data->result_array();
    }
    public function unitchangeshift3035_malam()
    {
        $data = $this->db->query("SELECT count(no_unit) as unitchangeshift3035, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate FROM tbl_dispatch  WHERE shift='NIGHT' AND  aktivity='CHANGE SHIFT' AND date=(
            SELECT MAX(date) as maxdate FROM tbl_dispatch )");
        return $data->result_array();
    }
    // unitservice
    public function unitservice()
    {
        $data = $this->db->query("SELECT count(no_unit) as unitservice, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate FROM tbl_dispatch  WHERE aktivity='SERVICE' AND date=(
            SELECT MAX(date) as maxdate FROM tbl_dispatch )");
        return $data->result_array();
    }
    public function unitservice_siang()
    {
        $data = $this->db->query("SELECT count(no_unit) as unitservice, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate FROM tbl_dispatch  WHERE aktivity='SERVICE' AND shift='DAY' AND date=(
            SELECT MAX(date) as maxdate FROM tbl_dispatch )");
        return $data->result_array();
    }
    public function unitservice_malam()
    {
        $data = $this->db->query("SELECT count(no_unit) as unitservice, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate FROM tbl_dispatch  WHERE aktivity='SERVICE' AND shift='NIGHT' AND date=(
            SELECT MAX(date) as maxdate FROM tbl_dispatch )");
        return $data->result_array();
    }

    // unitbreakdown
    public function unitbreakdown()
    {
        $data = $this->db->query("SELECT count(no_unit) as unitbreakdown, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate FROM tbl_dispatch  WHERE aktivity='BREAKDOWN' AND date=(
            SELECT MAX(date) as maxdate FROM tbl_dispatch )");
        return $data->result_array();
    }
    public function unitbreakdown_siang()
    {
        $data = $this->db->query("SELECT count(no_unit) as unitbreakdown, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate FROM tbl_dispatch  WHERE aktivity='BREAKDOWN' AND shift='DAY' AND date=(
            SELECT MAX(date) as maxdate FROM tbl_dispatch )");
        return $data->result_array();
    }
    public function unitbreakdown_malam()
    {
        $data = $this->db->query("SELECT count(no_unit) as unitbreakdown, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate FROM tbl_dispatch  WHERE aktivity='BREAKDOWN' AND shift='NIGHT' AND date=(
            SELECT MAX(date) as maxdate FROM tbl_dispatch )");
        return $data->result_array();
    }

    // totalhm
    public function totalhm()
    {
        $data = $this->db->query("SELECT ROUND(sum(wh_day)+sum(wh_night)) as wh, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate FROM tbl_hm  WHERE date=(
            SELECT MAX(date) as maxdate FROM tbl_hm )");
        return $data->result_array();
    }
    public function totalhm_siang()
    {
        $data = $this->db->query("SELECT ROUND(sum(wh_day)) as wh, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate FROM tbl_hm  WHERE date=(
            SELECT MAX(date) as maxdate FROM tbl_hm )");
        return $data->result_array();
    }
    public function totalhm_malam()
    {
        $data = $this->db->query("SELECT ROUND(sum(wh_night)) as wh, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate FROM tbl_hm  WHERE date=(
            SELECT MAX(date) as maxdate FROM tbl_hm )");
        return $data->result_array();
    }

    // totalbd
    public function totalbd()
    {
        $data = $this->db->query("SELECT ROUND(sum(total_bd),1) as totalbd, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate FROM tbl_dmbd WHERE date=(
            SELECT MAX(date) as maxdate FROM tbl_dmbd )");
        return $data->result_array();
    }
    public function totalbdsiang()
    {
        $data = $this->db->query("SELECT ROUND(sum(total_bd),1) as totalbd, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate FROM tbl_dmbd WHERE shift=' Day ' AND date=(
            SELECT MAX(date) as maxdate FROM tbl_dmbd )");
        return $data->result_array();
    }
    public function totalbdmalam()
    {
        $data = $this->db->query("SELECT ROUND(sum(total_bd),1) as totalbd, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate FROM tbl_dmbd WHERE shift=' Night ' AND date=(
            SELECT MAX(date) as maxdate FROM tbl_dmbd )");
        return $data->result_array();
    }

    // ratarataunitready
    public function ratarataunitready2($waktutotalbd)
    {
        $data = $this->db->query("SELECT DISTINCT count(no_unit) as ratarataunitready2, DATE_FORMAT(date,'%d %b %Y') as maxdate FROM tbl_wb2  WHERE DATE_FORMAT(date,'%d %b %Y')='$waktutotalbd'");
        return $data->result_array();
    }
    public function ratarataunitready2siang($waktutotalbd)
    {
        $data = $this->db->query("SELECT DISTINCT count(no_unit) as ratarataunitready2, DATE_FORMAT(date,'%d %b %Y') as maxdate FROM tbl_wb2  WHERE shift='DS' AND DATE_FORMAT(date,'%d %b %Y')='$waktutotalbd'");
        return $data->result_array();
    }
    public function ratarataunitready2malam($waktutotalbd)
    {
        $data = $this->db->query("SELECT DISTINCT count(no_unit) as ratarataunitready2, DATE_FORMAT(date,'%d %b %Y') as maxdate FROM tbl_wb2  WHERE shift='NS' AND DATE_FORMAT(date,'%d %b %Y')='$waktutotalbd'");
        return $data->result_array();
    }
    public function counttrip2()
    {
        $data = $this->db->query("SELECT date,COUNT(*) as counttrip2 FROM (SELECT date,no_unit, COUNT( * )
        FROM tbl_wb2
        WHERE date=(
                SELECT MAX(date) as maxdate FROM tbl_wb2 )
        GROUP BY no_unit
        HAVING COUNT( * ) > 1) AS S");
        return $data->result_array();
    }
    public function ratarataoptproduktifitasopt()
    {
        $data = $this->db->query("SELECT ROUND((avg(countoptsiang)+avg(countoptmalam))/2,2) as ratarataoptproduktifitasopt,DATE_FORMAT(maxdate,'%d %b %Y') as maxdate FROM( 
            SELECT date as maxdate,driver_1, COUNT( driver_1 ) as countoptsiang
                FROM tbl_highlight
                WHERE driver_1!='0' AND date=(
                        SELECT MAX(date) as maxdate FROM tbl_highlight )
                GROUP BY driver_1) as a,( 
            SELECT date as date2,driver_2, COUNT( driver_2 ) as countoptmalam
                FROM tbl_highlight
                WHERE driver_2!='0' AND date=(
                        SELECT MAX(date) as maxdate FROM tbl_highlight )
                GROUP BY driver_2) as b");
        return $data->result_array();
    }
    public function countopt2trip()
    {
        $data = $this->db->query("SELECT count_siang+count_malam as countopt2trip,DATE_FORMAT(maxdate,'%d %b %Y') as maxdate FROM( SELECT count(countoptsiang) as count_siang,maxdate FROM(SELECT date as maxdate,driver_1, COUNT( driver_1 ) as countoptsiang
        FROM tbl_highlight
        WHERE driver_1!='0' AND date=(
                SELECT MAX(date) as maxdate FROM tbl_highlight )
        GROUP BY driver_1
          HAVING COUNT( driver_1 ) > 1) as a)as aa,(SELECT count(countoptmalam) as count_malam FROM(SELECT date as maxdate2,driver_2, COUNT( driver_2 ) as countoptmalam
        FROM tbl_highlight
        WHERE driver_2!='0' AND date=(
                SELECT MAX(date) as maxdate FROM tbl_highlight )
        GROUP BY driver_2
          HAVING COUNT( driver_2 ) > 1) as a) as ab");
        return $data->result_array();
    }

    // breakdown
    public function breakdown()
    {
        $data = $this->db->query("SELECT round(avg(total_bd),2) as breakdown,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_dmbd`  WHERE date=(
            SELECT MAX(date) as maxdate FROM tbl_dmbd )");
        return $data->result_array();
    }
    public function breakdownsiang()
    {
        $data = $this->db->query("SELECT round(avg(total_bd),2) as breakdown,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_dmbd`  WHERE shift=' Day ' AND date=(
            SELECT MAX(date) as maxdate FROM tbl_dmbd )");
        return $data->result_array();
    }
    public function breakdownmalam()
    {
        $data = $this->db->query("SELECT round(avg(total_bd),2) as breakdown,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_dmbd`  WHERE shift=' Night ' AND date=(
            SELECT MAX(date) as maxdate FROM tbl_dmbd )");
        return $data->result_array();
    }

    // changeshift
    public function change_shift()
    {
        $data = $this->db->query("SELECT ROUND((ganti_shift_day+ganti_shift_night)/2,2) as change_shift, maxdate FROM( SELECT round(avg(ganti_shift_day),2) as ganti_shift_day,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_hm`  WHERE date=(
            SELECT MAX(date) as maxdate FROM tbl_hm ))as a,
            ( SELECT round(avg(ganti_shift_night),2) as ganti_shift_night,DATE_FORMAT(date,'%d %b %Y') as maxdate2 FROM `tbl_hm`  WHERE date=(
            SELECT MAX(date) as maxdate2 FROM tbl_hm ))as b");
        return $data->result_array();
    }
    public function change_shiftsiang()
    {
        $data = $this->db->query("SELECT ROUND((ganti_shift_day),2) as change_shift, maxdate FROM( SELECT round(avg(ganti_shift_day),2) as ganti_shift_day,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_hm`  WHERE date=(
            SELECT MAX(date) as maxdate FROM tbl_hm ))as a");
        return $data->result_array();
    }
    public function change_shiftmalam()
    {
        $data = $this->db->query("SELECT ROUND((ganti_shift_night),2) as change_shift, maxdate2 FROM
            ( SELECT round(avg(ganti_shift_night),2) as ganti_shift_night,DATE_FORMAT(date,'%d %b %Y') as maxdate2 FROM `tbl_hm`  WHERE date=(
            SELECT MAX(date) as maxdate2 FROM tbl_hm ))as b");
        return $data->result_array();
    }
    // refueling
    public function refueling()
    {
        $data = $this->db->query("SELECT ROUND((isi_solar_day+isi_solar_night)/2,2) as refueling, maxdate FROM
        ( SELECT round(avg(isi_solar_day),2) as isi_solar_day,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_hm`  WHERE date=(
        SELECT MAX(date) as maxdate FROM tbl_hm ))as a,
        ( SELECT round(avg(isi_solar_night),2) as isi_solar_night,DATE_FORMAT(date,'%d %b %Y') as maxdate2 FROM `tbl_hm`  WHERE date=(
        SELECT MAX(date) as maxdate2 FROM tbl_hm ))as b");
        return $data->result_array();
    }
    public function refuelingsiang()
    {
        $data = $this->db->query("SELECT ROUND((isi_solar_day),2) as refueling, maxdate FROM
        ( SELECT round(avg(isi_solar_day),2) as isi_solar_day,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_hm`  WHERE date=(
        SELECT MAX(date) as maxdate FROM tbl_hm ))as a");
        return $data->result_array();
    }
    public function refuelingmalam()
    {
        $data = $this->db->query("SELECT ROUND((isi_solar_night),2) as refueling, maxdate2 FROM
       ( SELECT round(avg(isi_solar_night),2) as isi_solar_night,DATE_FORMAT(date,'%d %b %Y') as maxdate2 FROM `tbl_hm`  WHERE date=(
        SELECT MAX(date) as maxdate2 FROM tbl_hm ))as b");
        return $data->result_array();
    }
    // antri_load
    public function antri_load()
    {
        $data = $this->db->query("SELECT ROUND((antri_load_day+antri_load_night)/2,2) as antri_load, maxdate FROM
        ( SELECT round(avg(antri_load_day),2) as antri_load_day,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_hm`  WHERE date=(
        SELECT MAX(date) as maxdate FROM tbl_hm ))as a,
        ( SELECT round(avg(antri_load_night),2) as antri_load_night,DATE_FORMAT(date,'%d %b %Y') as maxdate2 FROM `tbl_hm`  WHERE date=(
        SELECT MAX(date) as maxdate2 FROM tbl_hm ))as b");
        return $data->result_array();
    }
    public function antri_load_siang()
    {
        $data = $this->db->query("SELECT ROUND((antri_load_day),2) as antri_load, maxdate FROM
        ( SELECT round(avg(antri_load_day),2) as antri_load_day,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_hm`  WHERE date=(
        SELECT MAX(date) as maxdate FROM tbl_hm ))as a");
        return $data->result_array();
    }
    public function antri_load_malam()
    {
        $data = $this->db->query("SELECT ROUND((antri_load_night),2) as antri_load, maxdate2 FROM
        ( SELECT round(avg(antri_load_night),2) as antri_load_night,DATE_FORMAT(date,'%d %b %Y') as maxdate2 FROM `tbl_hm`  WHERE date=(
        SELECT MAX(date) as maxdate2 FROM tbl_hm ))as b");
        return $data->result_array();
    }
    // coal_limit
    public function coal_limit()
    {
        $data = $this->db->query("SELECT ROUND((coal_limit_day+coal_limit_night)/2,2) as coal_limit, maxdate FROM
        ( SELECT round(avg(coal_limit_day),2) as coal_limit_day,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_hm`  WHERE date=(
        SELECT MAX(date) as maxdate FROM tbl_hm ))as a,
        ( SELECT round(avg(coal_limit_night),2) as coal_limit_night,DATE_FORMAT(date,'%d %b %Y') as maxdate2 FROM `tbl_hm`  WHERE date=(
        SELECT MAX(date) as maxdate2 FROM tbl_hm ))as b");
        return $data->result_array();
    }
    public function coal_limit_siang()
    {
        $data = $this->db->query("SELECT ROUND((coal_limit_day),2) as coal_limit, maxdate FROM
        ( SELECT round(avg(coal_limit_day),2) as coal_limit_day,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_hm`  WHERE date=(
        SELECT MAX(date) as maxdate FROM tbl_hm ))as a");
        return $data->result_array();
    }
    public function coal_limit_malam()
    {
        $data = $this->db->query("SELECT ROUND((coal_limit_night),2) as coal_limit, maxdate2 FROM
        ( SELECT round(avg(coal_limit_night),2) as coal_limit_night,DATE_FORMAT(date,'%d %b %Y') as maxdate2 FROM `tbl_hm`  WHERE date=(
        SELECT MAX(date) as maxdate2 FROM tbl_hm ))as b");
        return $data->result_array();
    }
    // antri_dumping 
    public function antri_dumping()
    {
        $data = $this->db->query("SELECT ROUND((antri_dump_day+antri_dump_night)/2,2) as antri_dumping, maxdate FROM
        ( SELECT round(avg(antri_dump_day),2) as antri_dump_day,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_hm`  WHERE date=(
        SELECT MAX(date) as maxdate FROM tbl_hm ))as a,
        ( SELECT round(avg(antri_dump_night),2) as antri_dump_night,DATE_FORMAT(date,'%d %b %Y') as maxdate2 FROM `tbl_hm`  WHERE date=(
        SELECT MAX(date) as maxdate2 FROM tbl_hm ))as b");
        return $data->result_array();
    }
    public function antri_dumping_siang()
    {
        $data = $this->db->query("SELECT ROUND((antri_dump_day),2) as antri_dumping, maxdate FROM
        ( SELECT round(avg(antri_dump_day),2) as antri_dump_day,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_hm`  WHERE date=(
        SELECT MAX(date) as maxdate FROM tbl_hm ))as a
        ");
        return $data->result_array();
    }
    public function antri_dumping_malam()
    {
        $data = $this->db->query("SELECT ROUND((antri_dump_night),2) as antri_dumping, maxdate2 FROM
        ( SELECT round(avg(antri_dump_night),2) as antri_dump_night,DATE_FORMAT(date,'%d %b %Y') as maxdate2 FROM `tbl_hm`  WHERE date=(
        SELECT MAX(date) as maxdate2 FROM tbl_hm ))as b");
        return $data->result_array();
    }
    // rest_time
    public function rest_time()
    {
        $data = $this->db->query("SELECT ROUND((ism_day+ism_night)/2,2) as rest_time, maxdate FROM
        ( SELECT round(avg(ism_day),2) as ism_day,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_hm`  WHERE date=(
        SELECT MAX(date) as maxdate FROM tbl_hm ))as a,
        ( SELECT round(avg(ism_night),2) as ism_night,DATE_FORMAT(date,'%d %b %Y') as maxdate2 FROM `tbl_hm`  WHERE date=(
        SELECT MAX(date) as maxdate2 FROM tbl_hm ))as b");
        return $data->result_array();
    }
    public function rest_time_siang()
    {
        $data = $this->db->query("SELECT ROUND((ism_day),2) as rest_time, maxdate FROM
        ( SELECT round(avg(ism_day),2) as ism_day,DATE_FORMAT(date,'%d %b %Y') as maxdate FROM `tbl_hm`  WHERE date=(
        SELECT MAX(date) as maxdate FROM tbl_hm ))as a");
        return $data->result_array();
    }
    public function rest_time_malam()
    {
        $data = $this->db->query("SELECT ROUND((ism_night),2) as rest_time, maxdate2 FROM
        ( SELECT round(avg(ism_night),2) as ism_night,DATE_FORMAT(date,'%d %b %Y') as maxdate2 FROM `tbl_hm`  WHERE date=(
        SELECT MAX(date) as maxdate2 FROM tbl_hm ))as b");
        return $data->result_array();
    }
    // cycle_time
    public function cycle_time()
    {
        $data = $this->db->query("SELECT ROUND(AVG(TIME_TO_SEC(cycle_time))/3600,2) as cycle_time, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_highlight
        WHERE cycle_time!='00:00:00' AND  date=(
        SELECT MAX(date) as maxdate FROM tbl_highlight )");
        return $data->result_array();
    }
    public function cycle_time_siang()
    {
        $data = $this->db->query("SELECT ROUND(AVG(TIME_TO_SEC(cycle_time))/3600,2) as cycle_time, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_highlight
        WHERE shift='D' AND cycle_time!='00:00:00' AND  date=(
        SELECT MAX(date) as maxdate FROM tbl_highlight )");
        return $data->result_array();
    }
    public function cycle_time_malam()
    {
        $data = $this->db->query("SELECT ROUND(AVG(TIME_TO_SEC(cycle_time))/3600,2) as cycle_time, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_highlight
        WHERE shift='N' AND cycle_time!='00:00:00' AND  date=(
        SELECT MAX(date) as maxdate FROM tbl_highlight )");
        return $data->result_array();
    }
    // travel_time
    public function travel_time()
    {
        $data = $this->db->query("SELECT ROUND(AVG(TIME_TO_SEC(travel_time))/3600,2) as travel_time, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_highlight
        WHERE  travel_time!='00:00:00' AND date=(
        SELECT MAX(date) as maxdate FROM tbl_highlight )");
        return $data->result_array();
    }
    public function travel_time_siang()
    {
        $data = $this->db->query("SELECT ROUND(AVG(TIME_TO_SEC(travel_time))/3600,2) as travel_time, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_highlight
        WHERE shift='D' AND  travel_time!='00:00:00' AND date=(
        SELECT MAX(date) as maxdate FROM tbl_highlight )");
        return $data->result_array();
    }
    public function travel_time_malam()
    {
        $data = $this->db->query("SELECT ROUND(AVG(TIME_TO_SEC(travel_time))/3600,2) as travel_time, MAX(DATE_FORMAT(date,'%d %b %Y')) as maxdate
        FROM tbl_highlight
        WHERE  shift='N' AND  travel_time!='00:00:00' AND date=(
        SELECT MAX(date) as maxdate FROM tbl_highlight )");
        return $data->result_array();
    }
}


/* End of file Daily_produksi_model.php and path \application\models\Daily_produksi_model.php */
