<?php
ini_set("display_errors", "On"); 
error_reporting(E_ALL & ~E_NOTICE);

require "info_to_array.php";

$target = "https://onepiece.nchu.edu.tw/cofsys/plsql/crseqry_home";

$data_array['v_year']   = $_POST['v_year'];
$data_array['v_career'] = $_POST['v_career'];
$data_array['v_dept']   = $_POST['v_dept'];
$data_array['v_level']  = $_POST['v_level'];
$data_array['v_text']   = "";
$data_array['v_teach']  = "";
$data_array['v_week']   = "";
$data_array['v_mtg']    = "";
$data_array['v_lang']   = "";

echo '<pre>';
print_r(info_to_array($target, $data_array)); 
echo '</pre>';