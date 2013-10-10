<?php

function json_core() {
    $target = "normal";

    $input_name = array('v_year', 'v_career', 'v_dept', 'v_level', 
                        'v_text', 'v_teach', 'v_week', 'v_mtg', 'v_lang');

    foreach ($input_name as $key => $value) {
        $data_array[$value]   = isset($_POST[$value])   ? $_POST[$value]   : '';
    }

    echo '<pre>';
    print_r(class_parse($target, $data_array)); 
    echo '</pre>';    
}
