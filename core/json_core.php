<?php

function json_core() {

    $class_type = $_POST['class_type'];

    if ($class_type == 'normal') {
        $input_name = array('v_year', 'v_career', 'v_dept', 'v_level', 
                            'v_text', 'v_teach', 'v_week', 'v_mtg', 'v_lang');

        foreach ($input_name as $key => $value) {
            $data_array[$value]   = isset($_POST[$value])   ? $_POST[$value]   : '';
        }
    }
    else if ($class_type == 'liberal') {
        $input_name = array('v_year', 'v_subject', 'v_group', 'v_check',);

        foreach ($input_name as $key => $value) {
            $data_array[$value]   = isset($_POST[$value])   ? $_POST[$value]   : '';
        }
    } 
    else {
        exit("課程型別錯誤！");
    }

    echo '<pre>';
    echo json_encode(class_parse($class_type, $data_array)); 
    echo '</pre>';    
}
