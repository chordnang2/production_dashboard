<?php



defined('BASEPATH') or exit('No direct script access allowed');



class Produktifitas_unit_hm_hg_model extends CI_Model

{

    public function get_tanggal()

    {

        $query  = $this->db->query("SELECT DATE_FORMAT(date,'%d') as tanggal FROM `tbl_highlight` WHERE  date IS NOT NULL group by tanggal ORDER BY tanggal DESC");

        return $query->result();
    }

    public function get_bulan()

    {

        $query  = $this->db->query("SELECT DATE_FORMAT(date,'%m') as bulan FROM `tbl_highlight` WHERE   date IS NOT NULL group by bulan ORDER BY bulan DESC ");

        return $query->result();
    }

    public function get_tahun()

    {

        $query  = $this->db->query("SELECT DATE_FORMAT(date,'%Y') as tahun FROM `tbl_highlight` WHERE  date IS NOT NULL group by tahun ORDER BY tahun DESC ");

        return $query->result();
    }

    // detail_all_data_unit

    public function getall($tanggal)

    {

        $query = $this->db->query("SELECT

        unit,
        driver_1 ,
        driver_2 ,
        shift,

        vessel_type_2 as vessel,

        ROUND(SUM(`tbl_highlight`.`tonase`) / tbl_hm.total_hm, 2) as tonbagihm,

         (pa_day+pa_night)/2 as pa,

       (ua_day+ua_night)/2 as ua,

          ROUND(total_bd_day+total_bd_night,2) as jambd,

               ROUND(hours_day+hours_night+total_stb_day+total_stb_night+total_bd_day+total_bd_night,2) as jamready,

          ROUND(wh_day+wh_night,2) as jamoperasi,

         ROUND(total_stb_day+total_stb_night,2) as jamstb

    

        FROM

        `tbl_unit4digit`

        LEFT JOIN `tbl_highlight` ON `tbl_highlight`.`unit` = `tbl_unit4digit`.`id`

        LEFT JOIN `tbl_hm` ON `tbl_hm`.`unit_day` = `tbl_unit4digit`.`id`

    WHERE

    tbl_hm.date='$tanggal'

        AND tbl_highlight.date='$tanggal'

        AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82')

    group by

        tbl_unit4digit.id

    order by

        jamready ASC");



        return $query->result();
    }

    public function getall_siang($tanggal)

    {

        $query = $this->db->query("SELECT

        unit,
        driver_1 ,
        driver_2 ,
  
        vessel_type_2 as vessel,

        ROUND(SUM(`tbl_highlight`.`tonase`) / tbl_hm.total_hm, 2) as tonbagihm,

         (pa_day) as pa,

       (ua_day) as ua,

          ROUND(total_bd_day,2) as jambd,

               ROUND(hours_day+total_stb_day+total_bd_day,2) as jamready,

          ROUND(wh_day,2) as jamoperasi,

         ROUND(total_stb_day,2) as jamstb

    

        FROM

        `tbl_unit4digit`

        LEFT JOIN `tbl_highlight` ON `tbl_highlight`.`unit` = `tbl_unit4digit`.`id`

        LEFT JOIN `tbl_hm` ON `tbl_hm`.`unit_day` = `tbl_unit4digit`.`id`

    WHERE

    tbl_hm.date='$tanggal'

        AND tbl_highlight.date='$tanggal'

        AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82')
        AND shift='D'

    group by

        tbl_unit4digit.id

    order by

        jamready ASC");



        return $query->result();
    }
    public function getall_malam($tanggal)

    {

        $query = $this->db->query("SELECT

        unit,
        driver_1 ,
        driver_2 ,

        vessel_type_2 as vessel,

        ROUND(SUM(`tbl_highlight`.`tonase`) / tbl_hm.total_hm, 2) as tonbagihm,

         (pa_night) as pa,

       (ua_night) as ua,

          ROUND(total_bd_night,2) as jambd,

               ROUND(hours_night+total_stb_night+total_bd_night,2) as jamready,

          ROUND(wh_night,2) as jamoperasi,

         ROUND(total_stb_night,2) as jamstb

    

        FROM

        `tbl_unit4digit`

        LEFT JOIN `tbl_highlight` ON `tbl_highlight`.`unit` = `tbl_unit4digit`.`id`

        LEFT JOIN `tbl_hm` ON `tbl_hm`.`unit_day` = `tbl_unit4digit`.`id`

    WHERE

    tbl_hm.date='$tanggal'

        AND tbl_highlight.date='$tanggal'

        AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82')
        AND shift='N'

    group by

        tbl_unit4digit.id

    order by

        jamready ASC");



        return $query->result();
    }



    public function gettonhmvolvo($tanggal)

    {

        $query = $this->db->query("    SELECT AVG(a) as a

        FROM

        (

            SELECT unit,SUM(`tbl_highlight`.`tonase`)/tbl_hm.total_hm as a                     

        FROM `tbl_unit4digit` 

            LEFT JOIN `tbl_highlight` ON `tbl_highlight`.`unit` = `tbl_unit4digit`.`id` 

            LEFT JOIN `tbl_hm` ON `tbl_hm`.`unit_day` = `tbl_unit4digit`.`id` WHERE  tbl_hm.date='$tanggal'

        AND tbl_highlight.date='$tanggal' AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82')  group by tbl_unit4digit.id) as inner_query");



        return $query->result();
    }

    public function getdetailtonhmvolvo($tanggal)

    {

        $query = $this->db->query("  SELECT unit,SUM(`tbl_highlight`.`tonase`) as tonase,SUM(num_trip) as trip,total_hm  ,ROUND(SUM(`tbl_highlight`.`tonase`)/tbl_hm.total_hm,2) as tonbagihm                     

        FROM `tbl_unit4digit` 

            LEFT JOIN `tbl_highlight` ON `tbl_highlight`.`unit` = `tbl_unit4digit`.`id` 

            LEFT JOIN `tbl_hm` ON `tbl_hm`.`unit_day` = `tbl_unit4digit`.`id` WHERE   tbl_hm.date='$tanggal'

        AND tbl_highlight.date='$tanggal' AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82')  group by tbl_unit4digit.id order by tonbagihm ASC ");



        return $query->result();
    }



    public function gettonvolvo($tanggal)

    {

        $query = $this->db->query("SELECT SUM(tonase) as ton, DATE_FORMAT(date,'%d-%M-%Y') as date

        FROM `tbl_highlight`  

        LEFT JOIN `tbl_unit4digit` ON `tbl_highlight`.`unit` = `tbl_unit4digit`.`id` 

        WHERE date='$tanggal' AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82')");



        return $query->result();
    }

    public function getdetailtonvolvo($tanggal)

    {

        $query = $this->db->query("SELECT unit,type_coal, vessel_capacity,num_trip as trip,  tonase as ton ,tbl_highlight.status as status1 ,vessel_capacity-net as selisih

        FROM `tbl_highlight`  

        LEFT JOIN `tbl_unit4digit` ON `tbl_highlight`.`unit` = `tbl_unit4digit`.`id` 

        WHERE date='$tanggal'  AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82') AND tbl_highlight.status in (' UNDERLOAD ','UNDERLOAD') order by `tbl_unit4digit`.`id`");



        return $query->result();
    }

    public function getdetailtonvolvo_graph($tanggal)

    {

        $query = $this->db->query("SELECT unit,type_coal, vessel_capacity,num_trip as trip,  tonase as ton ,tbl_highlight.status as status1

        FROM `tbl_highlight`  

        LEFT JOIN `tbl_unit4digit` ON `tbl_highlight`.`unit` = `tbl_unit4digit`.`id` 

        WHERE date='$tanggal'  AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82') AND tbl_highlight.status=' UNDERLOAD ' order by `tbl_unit4digit`.`id` ");



        return $query->result();
    }



    public function gettripvolvo($tanggal)

    {

        $query = $this->db->query("SELECT SUM(num_trip) as trip

        FROM `tbl_highlight`  

        LEFT JOIN `tbl_unit4digit` ON `tbl_highlight`.`unit` = `tbl_unit4digit`.`id` 

        WHERE date='$tanggal' AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82')");



        return $query->result();
    }

    public function getdetailtripvolvo($tanggal)

    {

        $query = $this->db->query("SELECT unit, SUM(num_trip) as trip

        FROM `tbl_highlight`  

        LEFT JOIN `tbl_unit4digit` ON `tbl_highlight`.`unit` = `tbl_unit4digit`.`id` 

        WHERE date='$tanggal' AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82')  group by tbl_unit4digit.id order by trip ASC");



        return $query->result();
    }

    public function getdetailtripvolvo_graph($tanggal)

    {

        $query = $this->db->query("SELECT unit, trip

    FROM

    (

        SELECT unit,SUM(num_trip) as trip                   

    FROM `tbl_unit4digit` 

        LEFT JOIN `tbl_highlight` ON `tbl_highlight`.`unit` = `tbl_unit4digit`.`id` 

        LEFT JOIN `tbl_hm` ON `tbl_hm`.`unit_day` = `tbl_unit4digit`.`id`  WHERE  tbl_hm.date='$tanggal'

        AND tbl_highlight.date='$tanggal' AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82') group by tbl_unit4digit.id order by trip ASC) as inner_query WHERE trip<=4.2

    

");



        return $query->result();
    }



    public function avgton($tanggal)

    {

        $query = $this->db->query("   SELECT AVG(a) as a

        FROM

        (

            SELECT unit ,SUM(`tbl_highlight`.`tonase`)/SUM(`tbl_highlight`.`num_trip`) as a                  

        FROM `tbl_unit4digit` 

            LEFT JOIN `tbl_highlight` ON `tbl_highlight`.`unit` = `tbl_unit4digit`.`id` 

            WHERE  date='$tanggal'  AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82')  group by tbl_unit4digit.id) as inner_query");



        return $query->result();
    }

    public function detailavgton($tanggal)

    {

        $query = $this->db->query(" SELECT unit ,ROUND(SUM(`tbl_highlight`.`tonase`)/COUNT(tonase),2) as a ,COUNT(tbl_highlight.status) as underload                   

        FROM `tbl_unit4digit` 

            LEFT JOIN `tbl_highlight` ON `tbl_highlight`.`unit` = `tbl_unit4digit`.`id` 

            WHERE  date='$tanggal'  AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82') AND tbl_highlight.status in (' UNDERLOAD ','UNDERLOAD')  group by tbl_unit4digit.id order by underload DESC");



        return $query->result();
    }





    public function avgdistance($tanggal)

    {

        $query = $this->db->query("SELECT AVG(distance) as distance

        FROM `tbl_highlight`  

        LEFT JOIN `tbl_unit4digit` ON `tbl_highlight`.`unit` = `tbl_unit4digit`.`id` 

        WHERE date='$tanggal' AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82')");



        return $query->result();
    }

    public function detailavgdistance($tanggal)

    {

        $query = $this->db->query("SELECT unit, AVG(distance) as distance

        FROM `tbl_highlight`  

        LEFT JOIN `tbl_unit4digit` ON `tbl_highlight`.`unit` = `tbl_unit4digit`.`id` 

        WHERE date='$tanggal' AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82') group by unit");



        return $query->result();
    }



    public function total_distance($tanggal)

    {

        $query = $this->db->query("SELECT SUM(distance) as distance

        FROM `tbl_highlight`  

        LEFT JOIN `tbl_unit4digit` ON `tbl_highlight`.`unit` = `tbl_unit4digit`.`id` 

        WHERE date='$tanggal' AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82')");



        return $query->result();
    }

    public function detail_total_distance($tanggal)

    {

        $query = $this->db->query("SELECT unit, SUM(distance) as distance

        FROM `tbl_highlight`  

        LEFT JOIN `tbl_unit4digit` ON `tbl_highlight`.`unit` = `tbl_unit4digit`.`id` 

        WHERE date='$tanggal' AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82') group by unit");



        return $query->result();
    }



    public function detail_total_ton_km($tanggal)

    {

        $query = $this->db->query("SELECT unit, SUM(tonase) as ton, SUM(distance) as distance, SUM(tonase)*SUM(distance) as sum

        FROM `tbl_highlight`  

        LEFT JOIN `tbl_unit4digit` ON `tbl_highlight`.`unit` = `tbl_unit4digit`.`id` 

        WHERE date='$tanggal' AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82') group by unit order by sum ASC");



        return $query->result();
    }



    public function unit_running($tanggal)

    {

        $query = $this->db->query("SELECT COUNT(DISTINCT(`unit`)) as unit FROM `tbl_highlight`   LEFT JOIN `tbl_unit4digit` ON `tbl_highlight`.`unit` = `tbl_unit4digit`.`id`  WHERE date='$tanggal' AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82')");



        return $query->result();
    }

    public function detail_unit_running($tanggal)

    {

        $query = $this->db->query("SELECT DISTINCT(`unit`) as unit FROM `tbl_highlight`   LEFT JOIN `tbl_unit4digit` ON `tbl_highlight`.`unit` = `tbl_unit4digit`.`id`  WHERE date='$tanggal' AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82')");



        return $query->result();
    }



    public function total_bd($tanggal)

    {

        $query = $this->db->query("SELECT SUM(tbl_hm.total_bd_day+tbl_hm.total_bd_night) as bd  FROM `tbl_hm` 

        LEFT JOIN `tbl_unit4digit` ON `tbl_hm`.`unit_day` = `tbl_unit4digit`.`id` 

        WHERE `date`='$tanggal' AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82')");



        return $query->result();
    }

    public function detail_total_bd($tanggal)

    {

        $query = $this->db->query("SELECT unit_day as unit, SUM(tbl_hm.total_bd_day+tbl_hm.total_bd_night) as bd  FROM `tbl_hm` 

        LEFT JOIN `tbl_unit4digit` ON `tbl_hm`.`unit_day` = `tbl_unit4digit`.`id` 

        WHERE `date`='$tanggal' AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82') AND total_bd_day NOT in ('0') AND total_bd_night NOT in ('0')  group by unit_day order by bd DESC");



        return $query->result();
    }



    public function total_hm($tanggal)

    {

        $query = $this->db->query("SELECT SUM(`total_hm`) as hm FROM `tbl_hm` 

        LEFT JOIN `tbl_unit4digit` ON `tbl_hm`.`unit_day` = `tbl_unit4digit`.`id` 

        WHERE `date`='$tanggal'  AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82')");



        return $query->result();
    }

    public function detail_total_hm($tanggal)

    {

        $query = $this->db->query("SELECT unit_day as unit ,SUM(`total_hm`) as hm FROM `tbl_hm` 

        LEFT JOIN `tbl_unit4digit` ON `tbl_hm`.`unit_day` = `tbl_unit4digit`.`id` 

        WHERE `date`='$tanggal'  AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82') AND total_bd_day NOT in ('0') AND total_bd_night NOT in ('0') group by unit_day order by hm");



        return $query->result();
    }



    public function avg_pa($tanggal)

    {

        $query = $this->db->query("SELECT kode_unit as unit,SUM(REPLACE(pa, '%', ''))/COUNT(pa) AS pa FROM tbl_dmbd WHERE date='$tanggal'");



        return $query->result();
    }

    public function detail_avg_pa($tanggal)

    {

        $query = $this->db->query("SELECT unit, AVG(paa) as paa

        FROM

        (SELECT kode_unit as unit,REPLACE(pa, '%', '') AS paa FROM `tbl_dmbd`  WHERE date='$tanggal' ) as inner_query WHERE paa<'87' AND paa NOT IN ('100') group by unit order by paa ASC  ");



        return $query->result();
    }

    public function detail_avg_pa_graph($tanggal)

    {

        $query = $this->db->query("SELECT unit, AVG(paa) as paa

        FROM

        (SELECT kode_unit as unit,REPLACE(pa, '%', '') AS paa FROM `tbl_dmbd`  WHERE date='$tanggal' ) as inner_query WHERE paa<'87' AND paa NOT IN ('100') group by unit order by paa ASC  ");



        return $query->result();
    }



    public function avg_ua($tanggal)

    {

        $query = $this->db->query("SELECT (SUM(REPLACE(`ua_day`, '%', ''))/COUNT(ua_day)+ SUM(REPLACE(`ua_night`, '%', ''))/COUNT(`ua_night`))/2  AS ua FROM tbl_hm WHERE date='$tanggal' ");



        return $query->result();
    }

    public function detail_avg_ua($tanggal)

    {

        $query = $this->db->query("SELECT unit, ua 

        FROM(

        SELECT unit_day as unit,

            (SUM(REPLACE(`ua_day`, '%', ''))/COUNT(ua_day)+ SUM(REPLACE(`ua_night`, '%', ''))/COUNT(`ua_night`))/2  AS ua 

            FROM tbl_hm WHERE date='$tanggal' group by unit_day) as inner_query WHERE ua<'87'  order by ua ASC");



        return $query->result();
    }



    public function avg_cyle_time($tanggal)

    {

        $query = $this->db->query("SELECT DISTINCT(unit), ROUND(AVG(TIME_TO_SEC(`cycle_time`))/3600,2) as cycle_time

        FROM `tbl_highlight`  

        LEFT JOIN `tbl_unit4digit` ON `tbl_highlight`.`unit` = `tbl_unit4digit`.`id` 

        WHERE date='$tanggal' AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82') AND cycle_time NOT in ('00:00:00')  ");



        return $query->result();
    }

    public function detail_avg_cyle_time($tanggal)

    {

        $query = $this->db->query("    SELECT unit,avg_cycle_time FROM(

            SELECT DISTINCT(unit), ROUND(AVG(TIME_TO_SEC(`cycle_time`))/3600,2) as avg_cycle_time

            FROM `tbl_highlight`  

            LEFT JOIN `tbl_unit4digit` ON `tbl_highlight`.`unit` = `tbl_unit4digit`.`id` 

            WHERE date='$tanggal' AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82') AND cycle_time NOT in ('00:00:00')group by unit)as inner_value WHERE avg_cycle_time>4.8 group by unit order by avg_cycle_time DESC");



        return $query->result();
    }



    public function avg_travel_time($tanggal)

    {

        $query = $this->db->query("SELECT DISTINCT(unit), ROUND(AVG(TIME_TO_SEC(`travel_time`))/3600,2) as travel_time

        FROM `tbl_highlight`  

        LEFT JOIN `tbl_unit4digit` ON `tbl_highlight`.`unit` = `tbl_unit4digit`.`id` 

        WHERE date='$tanggal' AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82') AND travel_time NOT in ('00:00:00')  ");



        return $query->result();
    }

    public function detail_avg_travel_time($tanggal)

    {

        $query = $this->db->query("  SELECT unit,avg_travel_time FROM(SELECT DISTINCT(unit), ROUND(AVG(TIME_TO_SEC(`travel_time`))/3600,2) as avg_travel_time

        FROM `tbl_highlight`  

        LEFT JOIN `tbl_unit4digit` ON `tbl_highlight`.`unit` = `tbl_unit4digit`.`id` 

        WHERE date='$tanggal' AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82') AND travel_time NOT in ('00:00:00') group by unit )as a WHERE avg_travel_time >4.00 order by avg_travel_time DESC ");



        return $query->result();
    }

    public function avg_stb($tanggal)

    {

        $query = $this->db->query(" SELECT ROUND(AVG(total_stb),2)as avg_total_stb FROM(

            SELECT unit_day as unit,total_stb_day,total_stb_night ,ROUND(`total_stb_day`+total_stb_night,2) as total_stb FROM `tbl_hm` 

                LEFT JOIN `tbl_unit4digit` ON `tbl_hm`.`unit_day` = `tbl_unit4digit`.`id` 

                WHERE `date`='$tanggal'  AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82') AND total_stb_day NOT in ('0') AND total_stb_night NOT in ('0') group by unit_day )as inner_value

                ");



        return $query->result();
    }

    public function detail_avg_stb($tanggal)

    {

        $query = $this->db->query("SELECT unit_day as unit,total_stb_day,total_stb_night ,ROUND(`total_stb_day`+total_stb_night,2) as total_stb FROM `tbl_hm` 

        LEFT JOIN `tbl_unit4digit` ON `tbl_hm`.`unit_day` = `tbl_unit4digit`.`id` 

        WHERE `date`='$tanggal'  AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82') AND total_stb_day NOT in ('0') AND total_stb_night NOT in ('0') group by unit_day order by total_stb DESC

                ");



        return $query->result();
    }

    public function avg_bd($tanggal)

    {

        $query = $this->db->query(" SELECT ROUND(AVG(total_bd),2)as total_bd FROM(

            SELECT unit_day as unit,total_bd_day,total_bd_night ,ROUND(`total_bd_day`+total_bd_night,2) as total_bd FROM `tbl_hm` 

                LEFT JOIN `tbl_unit4digit` ON `tbl_hm`.`unit_day` = `tbl_unit4digit`.`id` 

                WHERE `date`='$tanggal'  AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82') AND total_bd_day NOT in ('0') AND total_bd_night NOT in ('0') group by unit_day )as inner_value

                ");



        return $query->result();
    }

    public function detail_avg_bd($tanggal)

    {

        $query = $this->db->query("SELECT unit_day as unit,total_bd_day,total_bd_night ,ROUND(`total_bd_day`+total_bd_night,2) as total_bd FROM `tbl_hm` 

        LEFT JOIN `tbl_unit4digit` ON `tbl_hm`.`unit_day` = `tbl_unit4digit`.`id` 

        WHERE `date`='$tanggal'  AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82') AND total_bd_day NOT in ('0') AND total_bd_day NOT in ('0') group by unit_day order by total_bd DESC

                ");



        return $query->result();
    }

    public function last_date_update_highlight()

    {

        $hsl = $this->db->query("SELECT DATE_FORMAT(date, '%e %M %Y') as date FROM `tbl_highlight`  

        ORDER BY `tbl_highlight`.`id` DESC");



        return $hsl->result_array();
    }

    public function last_date_update_hm()

    {

        $hsl = $this->db->query("SELECT DATE_FORMAT(date, '%e %M %Y') as date FROM `tbl_hm`  

        ORDER BY `tbl_hm`.`id` DESC");



        return $hsl->result_array();
    }

    public function last_date_update_dmbd()

    {

        $hsl = $this->db->query("SELECT DATE_FORMAT(date, '%e %M %Y') as date FROM `tbl_dmbd`  

        ORDER BY `tbl_dmbd`.`id` DESC");



        return $hsl->result_array();
    }
}





/* End of file P_operator_model_model.php and path /application/models/P_operator_model_model.php */
