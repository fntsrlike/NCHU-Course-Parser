<?php

function json_core() {
    $target = "https://onepiece.nchu.edu.tw/cofsys/plsql/crseqry_home";

    $input_name = array('v_year', 'v_career', 'v_dept', 'v_level', 
                        'v_text', 'v_teach', 'v_week', 'v_mtg', 'v_lang');

    foreach ($input_name as $key => $value) {
        $data_array[$value]   = isset($_POST[$value])   ? $_POST[$value]   : '';
    }

    echo '<pre>';
    print_r(parse($target, $data_array)); 
    echo '</pre>';    
}
