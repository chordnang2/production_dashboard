<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_FMS extends CI_Model
{
    public function get($unit, $date)
    {
        $unit = $this->db->escape_str($unit);
        $date = $this->db->escape_str($date);
        $next_date = date('Y-m-d', strtotime($date . ' +1 day'));

        $exception = [
            "'Side Dump 1_Hopper'",
            "'Side Dump 2_Hopper'",
            "'Side Dump 3_Hopper'",
            "'Side Dump 4_Hopper'",
            "'Side Dump3 5_Hopper'",
            "'Side Dump 1&2'",
            "'Side Dump 5'"
        ];

        $timeframe_in = "$date 07:00:00";
        $timeframe_out = "$next_date 06:59:59";

        // Subquery untuk Tipping sama Loading yang durasi dibawah 5 menit tidak diambil
        $where_subquery = "AND id NOT IN (SELECT id FROM tbl_fms_geofence JOIN 
			tbl_lokasi ON `tbl_fms_geofence`.geofence = `tbl_lokasi`.id_lokasi 
				WHERE tipe IN ('Tipping', 'Loading') AND duration <= '0:05:00');";

        $sql = "SELECT * FROM tbl_fms_geofence JOIN 
			tbl_lokasi 
				ON `tbl_fms_geofence`.geofence = `tbl_lokasi`.id_lokasi 
			WHERE unit LIKE '" . $unit . "' AND 
			(time_in BETWEEN '" . $timeframe_in . "' AND '" . $timeframe_out . "')
			AND id_lokasi NOT IN (" . implode(",", $exception) . ") 
			$where_subquery";

        //AND tipe NOT LIKE 'Travel'

        $temp_model = $this->db->query($sql);
        $model['detail_cycle'] = $temp_model->result_array();

        if (empty($model['detail_cycle'])) {
            return array("unit" => $unit, "message" => "Unit Tidak beroperasi");
        }

        //Unset Variable untuk menghapus data yang sudah digabungkan
        $unset = array();

        //Last Loading
        $last_loading_key = "";

        //Last Index of the array
        end($model['detail_cycle']);
        $last_key = key($model['detail_cycle']);

        //Untuk menggabungkan data bila Tipe dan tempatnya sama dalam 2 baris.
        foreach ($model['detail_cycle'] as $key => $value) { //Open Foreach

            //For ini untuk gabungin data yang sama bila berurutan
            for ($i = 1; $i < 99; $i++) { //Open For
                //Bila $key+$i ada isinya dan belum digabung (Yang ada di variable unset berarti datanya sudah digabung).
                if (isset($model['detail_cycle'][$key + $i]) && !in_array($key, $unset)) {

                    //Buka, Jika tipe dan geofence sama dengan indeks selanjutnya
                    if (
                        $model['detail_cycle'][$key]['tipe'] == $model['detail_cycle'][$key + $i]['tipe'] &&
                        $model['detail_cycle'][$key]['geofence'] == $model['detail_cycle'][$key + $i]['geofence']
                    ) {

                        //Timpah value time_out
                        $model['detail_cycle'][$key]['time_out'] = $model['detail_cycle'][$key + $i]['time_out'];

                        //Ambil data time_in dan time_out yang baru ditimpah
                        $time_in = new DateTime($model['detail_cycle'][$key]['time_in']);
                        $time_out = new Datetime($model['detail_cycle'][$key]['time_out']);

                        //Total waktu dari time_in dan time_out yang baru.
                        $interval = $time_out->diff($time_in);

                        //Timpah value duration
                        $model['detail_cycle'][$key]['duration'] = $interval->format('%H:%I:%S');
                        $model['detail_cycle'][$key]['total_waktu'] = $interval->format('%H:%I:%S');

                        //Timpah value milage
                        $model['detail_cycle'][$key]['mileage'] = $model['detail_cycle'][$key]['mileage'] + $model['detail_cycle'][$key + $i]['mileage'];

                        //Ambil data durasi parkir.
                        $durasi_parkir1 = $model['detail_cycle'][$key]['durasi_parkir'];
                        $durasi_parkir2 = $model['detail_cycle'][$key + $i]['durasi_parkir'];

                        //Timpah value durasi parkir.
                        $model['detail_cycle'][$key]['durasi_parkir'] = $this->addTime($durasi_parkir1, $durasi_parkir2);

                        //Tampung data untuk dibuang $key+$i karena sudah digabung ke data $key sekarang.
                        $unset[] = $key + $i;

                        //Tutup, Jika tipe dan geofence sama dengan indeks selanjutnya
                    } else {
                        break;
                    }
                }
                //Jika Loading tampung ke variable untuk tahu kapan loading terkahir
            } // Close For
            if ($model['detail_cycle'][$key]['tipe'] == "Loading") {
                $last_loading_key = $key;
            }
        } // Close Foreach

        //Hapus data yang sudah digabung
        foreach ($unset as $key => $value) {
            unset($model['detail_cycle'][$value]);
        }

        //Hapus semua data setelah loading terkahir
        for ($i = $last_loading_key + 1; $i <= $last_key; $i++) {
            unset($model['detail_cycle'][$i]);
        }

        //Dibagi per Cycle
        $cyle_data = $this->cycle(array_values($model['detail_cycle']), $date);
        return $cyle_data;
    }

    function cycle($data, $date)
    {
        $cycle_data['unit'] = $data[0]['unit'];
        $cycle_data['all_total_duration'] = "00:00:00";
        $cycle_data['all_total_milage'] = 0;
        $cycle_data['all_total_waktu'] = "00:00:00";
        $cycle_data['all_total_durasiparkir'] = "00:00:00";
        $cycle_data['all_total_loading'] = "00:00:00";
        $cycle_data['all_total_tipping'] = "00:00:00";
        $cycle_data['all_total_travel'] = "00:00:00";
        $cycle_data['all_total_parkingbay'] = "00:00:00";
        $cycle_data['all_total_pitstop'] = "00:00:00";
        $cycle_data['all_total_refuelling'] = "00:00:00";
        $cycle_data['all_total_weighbridge'] = "00:00:00";
        $cycle_data['all_total_workshop'] = "00:00:00";

        //Stanby = Parkingbay + Pitstop + Refuelling + Weighbridge + Workshop
        $cycle_data['all_total_standby'] = "00:00:00";

        $loading_flag = 0;
        $cycle_transaction = array();
        $cycle_summary = array();

        foreach ($data as $key => $value) {
            if ($value['tipe'] == "Loading") {
                if ($loading_flag != 0) {
                    $cycle_transaction[$loading_flag - 1][] = $value;
                }
                $loading_flag++;
            }

            if ($loading_flag != 0) {
                $cycle_transaction[$loading_flag - 1][] = $value;
            }
        }

        //Array Pop untuk hapus array index terakhir
        array_pop($cycle_transaction);
        $cycle_data['total_cycle'] = count($cycle_transaction);

        foreach ($cycle_transaction as $key => $value) {
            $temp_mileage = 0;
            $temp_duration = "0:00:00";
            $temp_waktu = "0:00:00";
            $temp_durasi = "0:00:00";
            $temp_travel = "0:00:00";
            $temp_tipping = "0:00:00";
            $temp_loading = "0:00:00";
            $temp_parkingbay = "0:00:00";
            $temp_pitstop = "0:00:00";
            $temp_refuelling = "0:00:00";
            $temp_weighbridge = "0:00:00";
            $temp_workshop = "0:00:00";
            $temp_standby = "0:00:00";
            $temp_cycle_transaction = array();

            foreach ($value as $key2 => $value2) {
                $temp_duration = $this->addTime($temp_duration, $value2['duration']);
                $temp_mileage += $value2['mileage'];
                $temp_waktu = $this->addTime($temp_waktu, $value2['total_waktu']);
                $temp_durasi = $this->addTime($temp_durasi, $value2['durasi_parkir']);

                if ($value2['tipe'] == "Loading") {
                    $temp_loading = $this->addTime($temp_loading, $value2['duration']);

                    $cycle_summary[$key]['loading'][] = $value2['time_in'];
                } elseif ($value2['tipe'] == "Tipping")
                    $temp_tipping = $this->addTime($temp_tipping, $value2['duration']);
                elseif ($value2['tipe'] == "Travel")
                    $temp_travel = $this->addTime($temp_travel, $value2['duration']);
                elseif ($value2['tipe_inner'] == "Standby") {
                    //Stanby = Parkingbay + Pitstop + Refuelling + Weighbridge + Workshop
                    $temp_standby = $this->addTime($temp_standby, $value2['duration']);

                    if ($value2['tipe'] == "Parking Bay")
                        $temp_parkingbay = $this->addTime($temp_parkingbay, $value2['duration']);
                    elseif ($value2['tipe'] == "Pit Stop")
                        $temp_pitstop = $this->addTime($temp_pitstop, $value2['duration']);
                    elseif ($value2['tipe'] == "Refueling")
                        $temp_refuelling = $this->addTime($temp_refuelling, $value2['duration']);
                    elseif ($value2['tipe'] == "Weighbridge")
                        $temp_weighbridge = $this->addTime($temp_weighbridge, $value2['duration']);
                    elseif ($value2['tipe'] == "Workshop")
                        $temp_workshop = $this->addTime($temp_workshop, $value2['duration']);
                }
            }

            $cycle_summary[$key]['unit'] = $cycle_data['unit'];
            $cycle_summary[$key]['date'] = $date;
            $cycle_summary[$key]['total_duration'] = $temp_duration;
            $cycle_summary[$key]['total_milage'] = $temp_mileage;
            $cycle_summary[$key]['total_waktu'] = $temp_waktu;
            $cycle_summary[$key]['total_durasiparkir'] = $temp_durasi;
            $cycle_summary[$key]['total_loading'] = $temp_loading;
            $cycle_summary[$key]['total_tipping'] = $temp_tipping;
            $cycle_summary[$key]['total_travel'] = $temp_travel;
            $cycle_summary[$key]['total_parkingbay'] = $temp_parkingbay;
            $cycle_summary[$key]['total_pitstop'] = $temp_pitstop;
            $cycle_summary[$key]['total_refuelling'] = $temp_refuelling;
            $cycle_summary[$key]['total_weighbridge'] = $temp_weighbridge;
            $cycle_summary[$key]['total_workshop'] = $temp_workshop;

            //Stanby = Parkingbay + Pitstop + Refuelling + Weighbridge + Workshop
            $cycle_summary[$key]['total_standby'] = $temp_standby;

            //Implode all transaction ID
            $temp_cycle_transaction[] = $value[0]['id'];
            $temp_cycle_transaction[] = end($value)['id'];
            $cycle_summary[$key]['cycle_transaction'] = implode("-", $temp_cycle_transaction);

            $cycle_data['all_total_duration'] = $this->addTime($cycle_data['all_total_duration'], $temp_duration);
            $cycle_data['all_total_milage'] += $temp_mileage;
            $cycle_data['all_total_waktu'] = $this->addTime($cycle_data['all_total_waktu'], $temp_waktu);
            $cycle_data['all_total_durasiparkir'] = $this->addTime($cycle_data['all_total_durasiparkir'], $temp_durasi);
            $cycle_data['all_total_loading'] = $this->addTime($cycle_data['all_total_loading'], $temp_loading);
            $cycle_data['all_total_tipping'] = $this->addTime($cycle_data['all_total_tipping'], $temp_tipping);
            $cycle_data['all_total_travel'] = $this->addTime($cycle_data['all_total_travel'], $temp_travel);
            $cycle_data['all_total_parkingbay'] = $this->addTime($cycle_data['all_total_parkingbay'], $temp_parkingbay);
            $cycle_data['all_total_pitstop'] = $this->addTime($cycle_data['all_total_pitstop'], $temp_pitstop);
            $cycle_data['all_total_refuelling'] = $this->addTime($cycle_data['all_total_refuelling'], $temp_refuelling);
            $cycle_data['all_total_weighbridge'] = $this->addTime($cycle_data['all_total_weighbridge'], $temp_weighbridge);
            $cycle_data['all_total_workshop'] = $this->addTime($cycle_data['all_total_workshop'], $temp_workshop);
            $cycle_data['all_total_standby'] = $this->addTime($cycle_data['all_total_standby'], $temp_standby);
        }

        $cycle_data['cycle_summary'] = $cycle_summary;
        $cycle_data['cycle_transaction'] = $cycle_transaction;

        return $cycle_data['cycle_summary'];
    }

    function getUnitperDate($date)
    {
        $date = $this->db->escape_str($date);
        $sql = "SELECT unit, time_in 
				FROM tbl_fms_geofence 
				WHERE DATE_FORMAT(time_in,'%Y-%m-%d')='$date'
				GROUP BY unit ORDER BY unit ASC";
        $model = $this->db->query($sql);
        $model = $model->result_array();
        return $model;
    }

    function insertToCycleSummary($data)
    {
        $column = array();
        $column[] = "loading_in";
        $column[] = "loading_out";
        $sql = array();

        foreach ($data[0] as $key => $value) {
            if ($key != "loading")
                $column[] = $key;
        }

        foreach ($data as $key => $value) {
            $value_sql = array();
            $update_sql = array();
            foreach ($value as $key2 => $value2) {
                if ($key2 == "loading") {
                    $value_sql[] = "'" . $value2[0] . "'";
                    $value_sql[] = "'" . $value2[1] . "'";
                    $update_sql[] = "loading_in='" . $value2[0] . "'";
                    $update_sql[] = "loading_out='" . $value2[1] . "'";
                } else {
                    $value_sql[] = "'" . $value2 . "'";
                    $update_sql[] = $key2 . "='" . $value2 . "'";
                }
            }

            $implode_column = "(" . implode(",", $column) . ")";
            $implode_value = "(" . implode(",", $value_sql) . ")";
            $implode_update = implode(",", $update_sql);
            $sql[] = "INSERT INTO cycle_summary $implode_column 
			VALUES $implode_value 
			ON DUPLICATE KEY UPDATE $implode_update;";
        }

        $this->db->trans_start();
        foreach ($sql as $key => $value) {
            $this->db->query($value);
            echo "<pre>";
            print_r($value);
            echo "</pre>";
        }
        $this->db->trans_complete();
    }

    function addTime($time1, $time2)
    {
        $times = array($time1, $time2);
        $seconds = 0;
        foreach ($times as $time) {
            list($hour, $minute, $second) = explode(':', $time);
            $seconds += $hour * 3600;
            $seconds += $minute * 60;
            $seconds += $second;
        }

        $hours = floor($seconds / 3600);
        $seconds -= $hours * 3600;
        $minutes  = floor($seconds / 60);
        $seconds -= $minutes * 60;
        if ($seconds < 9)
            $seconds = "0" . $seconds;
        if ($minutes < 9)
            $minutes = "0" . $minutes;
        if ($hours < 9)
            $hours = "0" . $hours;

        return "{$hours}:{$minutes}:{$seconds}";
    }
}
