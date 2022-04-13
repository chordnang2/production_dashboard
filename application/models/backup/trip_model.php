<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trip_model extends CI_Model 
{
    public function unitSchedule() {
        $unit = "MHA PM-829";
        $exception = [  "'Side Dump 1_Hopper'", 
                        "'Side Dump 2_Hopper'", 
                        "'Side Dump 3_Hopper'", 
                        "'Side Dump 4_Hopper'", 
                        "'Side Dump 5_Hopper'",
                        "'Side Dump 1&2'",
                        "'Side Dump 5'"];

        $exception_in = implode(",", $exception);

        $sql = "SELECT `fms`.unit, `fms`.geofence, `fms`.time_in, `fms`.time_out, `tbl_lokasi`.tipe FROM tbl_fms_geofence fms
                JOIN tbl_lokasi ON `fms`.geofence = `tbl_lokasi`.id_lokasi
                WHERE `tbl_lokasi`.tipe IN ('Loading', 'Tipping') AND `fms`.unit LIKE '$unit' AND `fms`.geofence NOT IN($exception_in) 
                ORDER BY `fms`.unit, `fms`.time_in ASC";

        $model = $this->db->query($sql);
        $model = $model->result_array();

        $final_data = [];
        $current_type = "";

        foreach ($model as $key => $value) {
            if($current_type == "" || $value["tipe"] != $current_type)
                $current_type = $value["tipe"];

            //Bila $final_data masi kosong, masukin datanya ke $final_data
            if($current_type == "Loading" && empty($final_data))
                $final_data[] = $value;

            //Bila sekarang Loading dan sebelumnya juga Loading, Skip
            elseif($current_type == "Loading" && $value["tipe"] == end($final_data)["tipe"])
                continue;

            elseif ($current_type == "Loading")
                $final_data[] = $value;

            elseif ($current_type == "Tipping") 
            {
                //Bila setelah Tipping, Tipping juga, Skip
                if(isset($model[$key+1]) && $model[$key+1]["tipe"] == "Tipping")
                    continue;

                else
                    $final_data[] = $value;
            }
        }

        // echo "<pre>";
        // print_r($final_data);
        // echo "</pre>";
        // echo "Jumlah Trip : ".count($final_data)/2;
        // die();

        return $final_data;
    }
}

?>