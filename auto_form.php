<?php
ini_set("display_errors", "On"); 
error_reporting(E_ALL & ~E_NOTICE);

require "info_to_array.php";

$target = "https://onepiece.nchu.edu.tw/cofsys/plsql/crseqry_home";

$input_name = array('v_year', 'v_career', 'v_dept', 'v_level', 
                    'v_text', 'v_teach', 'v_week', 'v_mtg', 'v_lang');

foreach ($input_name as $key => $value) {
    $data_array[$value]   = isset($_POST[$value])   ? $_POST[$value]   : '';
}


echo '<pre>';
print_r(info_to_array($target, $data_array)); 
echo '</pre>';