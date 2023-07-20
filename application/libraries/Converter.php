<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class converter {

    var $secret_key = 'dhaby';
    var $secret_iv = 'ap';

    function __construct() {
        $ci = & get_instance();
    }
    
    function encode($string) {
        if($string != ""):
            $encrypt_method = "AES-256-CBC";
            $key = hash('sha256', $this->secret_key);
            $iv = substr(hash('sha256', $this->secret_iv), 0, 16);
            
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        else:
            $output = "";
        endif;
        
        return $output;
    }

    function decode($string) {
        
        if($string != ""):
            $encrypt_method = "AES-256-CBC";
            $key = hash('sha256', $this->secret_key);
            $iv = substr(hash('sha256', $this->secret_iv), 0, 16);  
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        else:
            $output = "";
        endif;
        
        return $output;
    }

    function calculate_string($mathString) {
        $mathString = trim($mathString);     // trim white spaces
        $mathString = ereg_replace('[^0-9\+-\*\/\(\) ]', '', $mathString);    // remove any non-numbers chars; exception for math operators
        $compute = create_function("", "return (" . $mathString . ");");
        return 0 + $compute();
    }

    function tgl_indo($tgl) {
        $data = explode("-", $tgl);
        $format = $data['2'] . "/" . $data['1'] . "/" . $data['0'];
        return $format;
    }

    function tgl_db($tgl) {
        $data = explode("-", $tgl);
        $format = $data['2'] . "-" . $data['1'] . "-" . $data['0'];
        return $format;
    }

    function encrypt($input) {
        $size = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);
        $input = $this->pkcs5_pad($input, $size);
        $td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_ECB, '');
        $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
        mcrypt_generic_init($td, $this->apikey, $iv);
        $data = mcrypt_generic($td, $input);
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        $data = base64_encode($data);
        return $data;
    }

    function pkcs5_pad($text, $blocksize) {
        $pad = $blocksize - (strlen($text) % $blocksize);
        return $text . str_repeat(chr($pad), $pad);
    }

    function decrypt($sStr) {
        $decrypted = mcrypt_decrypt(
                MCRYPT_RIJNDAEL_128, $this->apikey, base64_decode($sStr), MCRYPT_MODE_ECB
        );
        $dec_s = strlen($decrypted);
        $padding = ord($decrypted[$dec_s - 1]);
        $decrypted = substr($decrypted, 0, -$padding);
        return $decrypted;
    }

    function random($length = 10) {
        $str = '0123456789abcdefghjklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random_word = str_shuffle($str);
        $word = substr($random_word, 0, $length);

        return $word;
    }

    /**
     * Convert any format date to 'Y-m-d' (yyyy-mm-dd) format
     * @param  String $original_date
     * @return String
     */
    function convert_date($original_date) {
        $new_date = date('Y-m-d', strtotime($original_date));

        return $new_date;
    }

    /*
      Convert Data any format date (Y-m-d) to exemple: Kamis, 20 oktober 2014
     * string $original_date
     * return string
     */

    function set_dateName($data) {
        date_default_timezone_set('Asia/Jakarta');
        $day = date('l', strtotime($data));

        list($t, $b, $h) = split('[-]', $data);
        switch ($b) {
            case"01";
                $bln = "Januari";
                break;
            case"02";
                $bln = "Februari";
                break;
            case"03";
                $bln = "Maret";
                break;
            case"04";
                $bln = "April";
                break;
            case"05";
                $bln = "Mei";
                break;
            case"06";
                $bln = "Juni";
                break;
            case"07";
                $bln = "Juli";
                break;
            case"08";
                $bln = "Agustus";
                break;
            case"09";
                $bln = "September";
                break;
            case"10";
                $bln = "Oktober";
                break;
            case"11";
                $bln = "November";
                break;
            case"12";
                $bln = "Desember";
                break;
        }
        switch ($day) {
            case"Sunday";
                $weekday = "Minggu";
                break;
            case"Monday";
                $weekday = "Senin";
                break;
            case"Tuesday";
                $weekday = "Selasa";
                break;
            case"Wednesday";
                $weekday = "Rabu";
                break;
            case"Thursday";
                $weekday = "Kamis";
                break;
            case"Friday";
                $weekday = "Jumat";
                break;
            case"Saturday";
                $weekday = "Sabtu";
                break;
        }

        $tglIndo = " $weekday, $h $bln $t";
        return $tglIndo;
    }

    function set_dayname($data) {
        date_default_timezone_set('Asia/Jakarta');
        $day = date('l', strtotime($data));

        switch ($day) {
            case"Sunday";
                $weekday = "Minggu";
                break;
            case"Monday";
                $weekday = "Senin";
                break;
            case"Tuesday";
                $weekday = "Selasa";
                break;
            case"Wednesday";
                $weekday = "Rabu";
                break;
            case"Thursday";
                $weekday = "Kamis";
                break;
            case"Friday";
                $weekday = "Jumat";
                break;
            case"Saturday";
                $weekday = "Sabtu";
                break;
        }

        $tglIndo = " $weekday";
        return $tglIndo;
    }
	
	function set_monthname($bulan) {
        
        switch ($bulan) {
			case"01";
                $bln = "Januari";
                break;
            case"02";
                $bln = "Februari";
                break;
            case"03";
                $bln = "Maret";
                break;
            case"04";
                $bln = "April";
                break;
            case"05";
                $bln = "Mei";
                break;
            case"06";
                $bln = "Juni";
                break;
            case"07";
                $bln = "Juli";
                break;
            case"08";
                $bln = "Agustus";
                break;
            case"09";
                $bln = "September";
                break;
            case"10";
                $bln = "Oktober";
                break;
            case"11";
                $bln = "November";
                break;
            case"12";
                $bln = "Desember";
                break;
        }

        return $bln;
    }

    function set_dateIndo($data) {
        date_default_timezone_set('Asia/Jakarta');
        $arr = explode(' ', $data);

        list($t, $b, $h) = explode('[-]', $arr[0]);
        switch ($b) {
            case"01";
                $bln = "Januari";
                break;
            case"02";
                $bln = "Februari";
                break;
            case"03";
                $bln = "Maret";
                break;
            case"04";
                $bln = "April";
                break;
            case"05";
                $bln = "Mei";
                break;
            case"06";
                $bln = "Juni";
                break;
            case"07";
                $bln = "Juli";
                break;
            case"08";
                $bln = "Agustus";
                break;
            case"09";
                $bln = "September";
                break;
            case"10";
                $bln = "Oktober";
                break;
            case"11";
                $bln = "November";
                break;
            case"12";
                $bln = "Desember";
                break;
        }

        $tglIndo = "$h $bln $t";
        return $tglIndo;
    }
    
    function set_datename_sort($data) {
        date_default_timezone_set('Asia/Jakarta');
        $arr = explode(' ', $data);

        list($t, $b, $h) = split('[-]', $arr[0]);
        switch ($b) {
            case"01";
                $bln = "Jan";
                break;
            case"02";
                $bln = "Feb";
                break;
            case"03";
                $bln = "Mar";
                break;
            case"04";
                $bln = "Apr";
                break;
            case"05";
                $bln = "May";
                break;
            case"06";
                $bln = "Jun";
                break;
            case"07";
                $bln = "Jul";
                break;
            case"08";
                $bln = "Aug";
                break;
            case"09";
                $bln = "Sep";
                break;
            case"10";
                $bln = "Okt";
                break;
            case"11";
                $bln = "Nov";
                break;
            case"12";
                $bln = "Des";
                break;
        }

        $tglIndo = "$h $bln $t ".$arr[1];
        return $tglIndo;
    }

    function setTanggalNamaTime($data) {
        date_default_timezone_set('Asia/Jakarta');
        $arr = explode(' ', $data);
        $day = date('l', strtotime($arr[0]));

        list($t, $b, $h) = split('[-]', $arr[0]);
        switch ($b) {
            case"01";
                $bln = "Januari";
                break;
            case"02";
                $bln = "Februari";
                break;
            case"03";
                $bln = "Maret";
                break;
            case"04";
                $bln = "April";
                break;
            case"05";
                $bln = "Mei";
                break;
            case"06";
                $bln = "Juni";
                break;
            case"07";
                $bln = "Juli";
                break;
            case"08";
                $bln = "Agustus";
                break;
            case"09";
                $bln = "September";
                break;
            case"10";
                $bln = "Oktober";
                break;
            case"11";
                $bln = "November";
                break;
            case"12";
                $bln = "Desember";
                break;
        }
        switch ($day) {
            case"Sunday";
                $weekday = "Minggu";
                break;
            case"Monday";
                $weekday = "Senin";
                break;
            case"Tuesday";
                $weekday = "Selasa";
                break;
            case"Wednesday";
                $weekday = "Rabu";
                break;
            case"Thursday";
                $weekday = "Kamis";
                break;
            case"Friday";
                $weekday = "Jumat";
                break;
            case"Saturday";
                $weekday = "Sabtu";
                break;
        }

        $tglIndo = " $weekday, $h $bln $t $arr[1]";
        return $tglIndo;
    }

    function set_spiritdate1($data) {
        date_default_timezone_set('Asia/Jakarta');
        $arr = explode(' ', $data);

        list($t, $b, $h) = split('[-]', $arr[0]);
        switch ($b) {
            case"01";
                $bln = "Jan";
                break;
            case"02";
                $bln = "Feb";
                break;
            case"03";
                $bln = "Mar";
                break;
            case"04";
                $bln = "Apr";
                break;
            case"05";
                $bln = "May";
                break;
            case"06";
                $bln = "Jun";
                break;
            case"07";
                $bln = "Jul";
                break;
            case"08";
                $bln = "Aug";
                break;
            case"09";
                $bln = "Sep";
                break;
            case"10";
                $bln = "Oct";
                break;
            case"11";
                $bln = "Nov";
                break;
            case"12";
                $bln = "Dec";
                break;
        }

        $tglIndo = "$h-$bln-$t";
        return $tglIndo;
    }

    function set_spiritdate2($data) {
        date_default_timezone_set('Asia/Jakarta');
        $arr = explode(' ', $data);

        list($t, $b, $h) = split('[-]', $arr[0]);
        switch ($b) {
            case"01";
                $bln = "Jan";
                break;
            case"02";
                $bln = "Feb";
                break;
            case"03";
                $bln = "Mar";
                break;
            case"04";
                $bln = "Apr";
                break;
            case"05";
                $bln = "May";
                break;
            case"06";
                $bln = "Jun";
                break;
            case"07";
                $bln = "Jul";
                break;
            case"08";
                $bln = "Aug";
                break;
            case"09";
                $bln = "Sep";
                break;
            case"10";
                $bln = "Oct";
                break;
            case"11";
                $bln = "Nov";
                break;
            case"12";
                $bln = "Dec";
                break;
        }

        $tglIndo = "$h-$bln-$t, " . substr($arr[count($arr) - 1], 0, 5);
        return $tglIndo;
    }

    function setTanggalNama($data) {
        date_default_timezone_set('Asia/Jakarta');
        $arr = explode(' ', $data);
        $day = date('l', strtotime($arr[0]));

        list($t, $b, $h) = split('[-]', $arr[0]);
        switch ($b) {
            case"01";
                $bln = "Jan";
                break;
            case"02";
                $bln = "Feb";
                break;
            case"03";
                $bln = "Mar";
                break;
            case"04";
                $bln = "Apr";
                break;
            case"05";
                $bln = "Mei";
                break;
            case"06";
                $bln = "jun";
                break;
            case"07";
                $bln = "Jul";
                break;
            case"08";
                $bln = "Aug";
                break;
            case"09";
                $bln = "Sep";
                break;
            case"10";
                $bln = "Okt";
                break;
            case"11";
                $bln = "Nov";
                break;
            case"12";
                $bln = "Des";
                break;
        }
        switch ($day) {
            case"Sunday";
                $weekday = "Minggu";
                break;
            case"Monday";
                $weekday = "Senin";
                break;
            case"Tuesday";
                $weekday = "Selasa";
                break;
            case"Wednesday";
                $weekday = "Rabu";
                break;
            case"Thursday";
                $weekday = "Kamis";
                break;
            case"Friday";
                $weekday = "Jumat";
                break;
            case"Saturday";
                $weekday = "Sabtu";
                break;
        }

        $tglIndo = $weekday . ', ' . $h . ' ' . $bln . ' ' . $t;
        return $tglIndo;
    }

    function set_codeAirport($code) {
        $CI = & get_instance();

        $query = $CI->db->query("select concat(city,' (',airport_code,') ') as code_city from mstr_airport where airport_code='$code'");
        $q = $query->result();
        foreach ($q as $row) {
            return $row->code_city;
        }
    }

    function set_codeToCity($code) {
        $CI = & get_instance();

        $query = $CI->db->query("select city as code_city from mstr_airport where airport_code='$code'");
        $q = $query->result();
        foreach ($q as $row) {
            return $row->code_city;
        }
    }

    function object_to_array(stdClass $Class) {
        # Typecast to (array) automatically converts stdClass -> array.
        $Class = (array) $Class;

        # Iterate through the former properties looking for any stdClass properties.
        # Recursively apply (array).
        foreach ($Class as $key => $value) {
            if (is_object($value) && get_class($value) === 'stdClass') {
                $Class[$key] = self::object_to_array($value);
            }
        }
        return $Class;
    }

    /**
     * Get logo airline
     * @param  String $airline_name [airline name]
     * @return String               [path image]
     */
    function get_image_airline($airline_name) {
        switch (strtolower($airline_name)) {
            case 'airasia': $path = assets_frontend() . "img/icon-flight/logo-airasia-1.png";
                break;
            case 'sriwijaya': $path = assets_frontend() . "img/icon-flight/logo-sriwijaya-1.png";
                break;
            case 'lionair': $path = assets_frontend() . "img/icon-flight/logo-lionair-1.png";
                break;
            case 'citilink': $path = assets_frontend() . "img/icon-flight/logo-citilink-1.png";
                break;
            case 'garuda': $path = assets_frontend() . "img/icon-flight/logo-garuda-1.png";
                break;
            case 'garuda executive': $path = assets_frontend() . "img/icon-flight/logo-garuda-1.png";
                break;
            case 'Garuda corporate': $path = assets_frontend() . "img/icon-flight/logo-garuda-1.png";
                break;
            case 'kalstar': $path = assets_frontend() . "img/icon-flight/logo-kalstar-1.png";
                break;
            case 'xpressAir': $path = assets_frontend() . "img/icon-flight/logo-expressair-1.png";
                break;
            case 'batikair': $path = assets_frontend() . "img/icon-flight/logo-batikair-1.png";
                break;
            case 'wingsair': $path = assets_frontend() . "img/icon-flight/logo-wingsair-1.png";
                break;
            case 'trigana': $path = assets_frontend() . "img/icon-flight/logo-trigana-1.png";
                break;
            case 'transnusa': $path = assets_frontend() . "img/icon-flight/logo-transnusa-1.png";
                break;
        }

        return $path;
    }

    /**
     * Convert format time to AM/PM
     * @param  String $time e.x. 10:16 = !0:16 AM / 12:34 = 12:34 PM
     * @return String       [description]
     */
    function get_am_pm($time) {
        $new_time = date('h:i A', strtotime($time));

        return $new_time;
    }

    /**
     * Get duration in format hours and minutes
     * @param  String $time_start [description]
     * @param  String $time_end   [description]
     * @return String             [description]
     */
    function get_diff_time($time_start, $time_end) {
        $datetime1 = new DateTime($time_start);
        $datetime2 = new DateTime($time_end);
        $interval = $datetime1->diff($datetime2);
        $result = $interval->format('%h') . " j " . $interval->format('%i') . " m";

        return $result;
    }

    function get_diff_time_int($time_start, $time_end) {
        $datetime1 = new DateTime($time_start);
        $datetime2 = new DateTime($time_end);
        $interval = $datetime1->diff($datetime2);
        $result = $interval->format('%h') . "" . $interval->format('%i') . "";

        return $result;
    }

    /**
     * Get the airline name by code airline
     * @param  [String] $code Code airline
     * @return [String]       Airline name
     */
    function get_airport_name($code) {
        $ci = & get_instance();

        $airline_name = $ci->mgeneral->getValue('city', array('airport_code' => $code), 'mstr_airport');

        return $airline_name;
    }

    function potKata($string = '', $jml = '') {
        $ci = & get_instance();

        $result = implode(" ", array_slice(explode(" ", $string), 0, $jml));
        return $result;
    }

    function airlines_id_to_name($airline_id, $fno = "") {
        switch ($airline_id) {
            case '1': $airline_name = "Airasia";
                break;
            case '2': $airline_name = "Citilink";
                break;
            case '3': $airline_name = "Garuda";
                break;
            case '4': $airline_name = "Sriwijaya";
                break;
            case '5':
                $fnomor = substr($fno, 0, 2);
                if ($fnomor == "IW") {
                    $airline_name = "Wingsair";
                } else if ($fnomor == "ID") {
                    $airline_name = "Batikair";
                } else {
                    $airline_name = "Lionair";
                }
                break;
        }

        return $airline_name;
    }

    function set_datetime($datetime) {
        $date = date_create($datetime);
        return date_format($date, 'Y-m-d H:i:s');
    }

    function array_to_object(array $array) {
        # Iterate through our array looking for array values.
        # If found recurvisely call itself.
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $array[$key] = self::array_to_object($value);
            }
        }

        # Typecast to (object) will automatically convert array -> stdClass
        return (object) $array;
    }

    function replace_name($name) {
        $name = preg_replace('/(\'|\.|\,|\")/', '', $name);
        $arr_new = explode(' ', $name);
        $new_name = $arr_new[0];

        for ($i = 1; $i < count($arr_new); $i++) {
            if (strlen($arr_new[$i - 1]) == 1) {
                $new_name .= str_replace(' ', "", $arr_new[$i]);
            } else if (strlen($arr_new[$i]) == 1 && $i == count($arr_new) - 1) {
                $new_name .= str_replace(' ', "", $arr_new[$i]);
            } else {
                $new_name .= " " . str_replace(' ', "", $arr_new[$i]);
            }
        }

        return $new_name;
    }

}

?>